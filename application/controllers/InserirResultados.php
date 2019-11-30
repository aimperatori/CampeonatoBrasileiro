<?php

use application\models\Campeonato;
use application\models\Rodada;
use application\models\Partida;
use application\models\Classificacao;
use application\models\ClassificacaoTime;

defined('BASEPATH') OR exit('No direct script access allowed');

class InserirResultados extends CI_Controller  {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index() {
		$id_campeonato = $this->input->get('campeonato');

		// pega id campeonato para setar select
		$data['idCampeonatoSelected'] = $id_campeonato;

		// lista todos os campeonatos do usuario
		$data['campeonatos'] = Campeonato::where('id_admin', '=', 1)->get();

		// get rodada atual
		$data['rodada_atual'] = Rodada::getRodadaAtual($id_campeonato);

		$data['partidas'] = Partida::getPartidasNaoDisputadas($id_campeonato, $data['rodada_atual']);

		$this->template->show('inserir_resultado', $data);
	}

	public function save() {
		$post = $this->input->post();

		$id_campeonato = $post['id_campeonato'];

		### ATUALIZA A PARTIDA ###

		$data = array(
				'golsTimeCasa' => $post['gols_time_casa'],
				'golsTimeFora' => $post['gols_time_fora'],
				'disputada' => Partida::JA_DISPUTADA
		);

		$partida = Partida::find($post['id_partida']);
		if(is_null($partida)){
			throw new Exception('Partida não encontrada');
		}

		$partida->fill($data);

		$partida->save();


		### ATUALIZA A TABELA DE CLASSIFICACAO ###

		// TIME CASA
		self::atualizaTabelaClassificacao($partida->golsTimeCasa, $partida->golsTimeFora, $partida->id_time_casa, $partida->id, $id_campeonato);

		// TIME FORA
		self::atualizaTabelaClassificacao($partida->golsTimeFora, $partida->golsTimeCasa, $partida->id_time_fora, $partida->id, $id_campeonato);


		// redireciona pro index
		header('Location: /inserirResultados?campeonato='.$post['id_campeonato']);
	}

	private static function atualizaTabelaClassificacao($golsFeito, $golsSofrido, $id_time, $id_partida, $id_campeonato){
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

	private function pontosPartida(int $gols_feito, int $gols_sofrido) : int {
		if($gols_feito > $gols_sofrido){
			return Campeonato::VITORIA;
		}elseif($gols_feito == $gols_sofrido){
			return Campeonato::EMPATE;
		}else{
			return Campeonato::DERROTA;
		}
	}

}
