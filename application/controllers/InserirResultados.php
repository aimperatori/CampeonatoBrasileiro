<?php

use application\models\Campeonato;
use application\models\Rodada;
use application\models\Partida;
use application\models\Classificacao;

defined('BASEPATH') OR exit('No direct script access allowed');

class InserirResultados extends CI_Controller  {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index($id_campeonato = null) {
		if(is_null($id_campeonato)){
			$id_campeonato = $this->input->get('campeonato');
		}

		// pega id campeonato para setar select
		$data['idCampeonatoSelected'] = $id_campeonato;

		// lista todos os campeonatos do usuario
		$data['campeonatos'] = Campeonato::where('id_admin', '=', 1)->get();

		// get rodada atual
		$data['rodada_atual'] = Rodada::getRodadaAtual($id_campeonato);

		$data['partidas'] = Partida::getPartidasNaoDisputadas($id_campeonato, $data['rodada_atual']);

		$this->template->show('inserir_resultado', $data);
	}

	public function save($id_campeonato = null, $id_partida = null, $gols_time_casa = null, $gols_time_fora = null) {
		if(is_null($id_campeonato)){
			$post = $this->input->post();

			$id_campeonato = $post['id_campeonato'];
			$num_rodada = $post['num_rodada'];
			$id_partida = $post['id_partida'];
			$gols_time_casa = $post['gols_time_casa'];
			$gols_time_fora = $post['gols_time_fora'];
		}

		### ATUALIZA A PARTIDA ###

		$data = array(
			'golsTimeCasa' => $gols_time_casa,
			'golsTimeFora' => $gols_time_fora,
			'disputada' => Partida::JA_DISPUTADA
		);

		$partida = Partida::find($id_partida);
		if(is_null($partida)){
			throw new Exception('Partida não encontrada');
		}

		$id_time_casa = $partida->id_time_casa;
		$id_time_fora = $partida->id_time_fora;

		$partida->fill($data);

		$partida->save();

		// ATUALIZA CLASSIFICACAO TIME FORA
		$classificacao = new TabelaClassificacao();
		
		$objCTFora = ClassificacaoTime::find($id_time_fora);
		$objCampeonatoFora = Campeonatos::find($objCTFora->id);
		
		$data = array(
			'pontuacao' => pontosPartida($gols_time_fora, $gols_time_casa) + $objCampeonatoFora->pontuacao,
			'golsSofridos' => $gols_time_casa + $objCampeonatoFora->golsSofridos,
			'golsFeito' => $gols_time_fora + $objCampeonatoFora->golsFeito,
			'id_campeonato' => $id_campeonato,
			'id_rodada' => $num_rodada
		);

		$classificacao->fill($data);
		$classificacao->save();

		$classificacaoTime = new ClassificacaoTime();

		$data = array(
			'id_classificacao' =>  $classificacao->id,
			'id_time' => $id_time_fora
		);

		$classificacaoTime->fill($data);
		$classificacaoTime->save();


		// ATUALIZA CLASSIFICACAO TIME CASA
		$tabelaClassificacao = new TabelaClassificacao();
		
		$objCTCasa = ClassificacaoTime::find($id_time_casa);
		$objCampeonatoCasa = Campeonatos::find($objCTCasa->id);
		
		$data = array(
			'pontuacao' => pontosPartida($gols_time_casa, $gols_time_fora) + $objCampeonatoCasa->pontuacao,
			'golsSofridos' => $gols_time_fora + $objCampeonatoFora->golsSofridos,
			'golsFeito' => $gols_time_casa + $objCampeonatoFora->golsFeito,
			'id_campeonato' => $id_campeonato,
			'id_rodada' => $num_rodada
		);

		$tabelaClassificacao->fill($data);
		$tabelaClassificacao->save();

		$classificacaoTimeCasa = new ClassificacaoTime();

		$data = array(
			'id_classificacao' =>  $tabelaClassificacao->id,
			'id_time' => $id_time_casa
		);

		$classificacaoTimeCasa->fill($data);
		$classificacaoTimeCasa->save();


		header('Location: /inserirResultados?campeonato='.$id_campeonato);
	}

	private static function atualizaTabelaClassificacao($golsFeito, $golsSofrido, $id_time, $id_partida, $id_rodada, $id_campeonato){
		// CLASSIFICACAO TIME
		$classificacao_time = Classificacao::getClassificacaoTime($id_campeonato, $id_time);

		// ADICIONA CLASSIFICACAO

		if(isset($classificacao_time->pontuacao))
			$pontuacao = $classificacao_time->pontuacao;
			else $pontuacao = 0;

			if(isset($classificacao_time->golsFeitos))
				$totalGolsFeitos = $classificacao_time->golsFeitos;
				else $totalGolsFeitos = 0;

				if(isset($classificacao_time->golsSofridos))
					$totalGolsSofridos = $classificacao_time->golsSofridos;
					else $totalGolsSofridos = 0;

					$total_pontos_time_casa = self::pontosPartida($golsFeito, $golsSofrido) + $pontuacao;
					$total_gols_feitos_time_casa = $golsFeito + $totalGolsFeitos;
					$total_gols_sofridos_time_casa = $golsSofrido + $totalGolsSofridos;

					$data = array(
							'pontuacao' => $total_pontos_time_casa,
							'golsFeitos' => $total_gols_feitos_time_casa,
							'golsSofridos' => $total_gols_sofridos_time_casa,
							'id_campeonato' => $id_campeonato,
							'id_rodada' => $id_rodada,
							'status' => 0
					);

					$classificacao = new Classificacao();
					$classificacao->fill($data);
					$classificacao->save();

					// ADICIONA RELACAO CLASSIFICACAO-TIME
					$relacao = array(
							'id_time' => $id_time,
							'id_classificacao' => $classificacao->id
					);

					$classiTime = new ClassificacaoTime();
					$classiTime->fill($relacao);
					$classiTime->save();
	}

	private static function pontosPartida(int $gols_feito, int $gols_sofrido) : int {
		if($gols_feito > $gols_sofrido){
			return Campeonato::VITORIA;
		}elseif($gols_feito == $gols_sofrido){
			return Campeonato::EMPATE;
		}else{
			return Campeonato::DERROTA;
		}
	}

}
