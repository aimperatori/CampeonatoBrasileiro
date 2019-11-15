<?php

class GeraPartidasCampeonato {

	private $conn;

	public function __construct(){
// @todo ver como fazer pegando as configs do codeegniter
// 		require_once APPPATH . 'config/database.php';
// 		$drive = $db['default']['dbdriver'];
// 		$host = $db['default']['hostname'];
// 		$dbname = $db['default']['database'];
// 		$user = $db['default']['username'];
// 		$password = $db['default']['password'];
// 		$this->conn = new PDO("$drive:host=$host;dbname=$dbname", $user, $password);

		$this->conn = new PDO('mysql:host=localhost;dbname=campeonato_brasileiro', 'root', 'ander123');
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	/**
	 * Cria partidas para todos os campeonatos que ainda nao possuem partidas
	 */
	public function createAll(){
		$sql = "SELECT
				    c.id, c.dataInicio, c.nome AS nome
				FROM
				    campeonato c
				    LEFT JOIN rodada r ON c.id = r.id_campeonato
				WHERE
					r.id IS NULL
		";

		$campeonatos = $this->conn->query($sql);

		foreach ($campeonatos as $campeonato){
			echo 'Criando partidas do campeonato: '. $campeonato['nome'] . PHP_EOL;
			$this->add_partidas_campeonato($campeonato['id'], $campeonato['dataInicio']);
		}
	}

	/**
	 * Gera as rodadas e as partidas
	 * @param int $id_campeonato
	 */
	private function add_partidas_campeonato($id_campeonato, $data_inicio_campeonato){

		$this->insert_rodadas($id_campeonato, $data_inicio_campeonato);

		$this->build_partidas($id_campeonato);
	}


	/**
	 * Adiciona as 38 rodadas em um campeonato
	 * @param int $id_campeonato
	 */
	private function insert_rodadas(int $id_campeonato, string $data_inicio_campeonato){

		$data_rodada = self::encontraQuartaOUDomingo($data_inicio_campeonato);

		$i = 0;
		while (++$i <= 38) {

			$dia_semana_rodada = date('N', strtotime($data_rodada));

			// 7 = Domingo
			// 3 = Quarta
			if($dia_semana_rodada == 3){
				$data_rodada = date('Y-m-d 15:00:00', strtotime('+4 days', strtotime($data_rodada)));
			}else{
				$data_rodada = date('Y-m-d 21:i:s', strtotime('+3 days', strtotime($data_rodada)));
			}

			$this->conn->query("INSERT INTO `rodada` (`num`, `data`, `id_campeonato`) VALUES ($i, '$data_rodada', $id_campeonato);");
		}
	}

	/**
	 * Adiciona partida e relação com a rodada
	 * @param int $id_campeonato
	 * @param int $id_rodada
	 * @param int $id_time_casa
	 * @param int $id_time_fora
	 */
	private function add_partida($id_campeonato, $id_rodada, $id_time_casa, $id_time_fora){

		// adiciona partida
		$sql = "INSERT INTO `partida` (`golsTimeCasa`, `golsTimeFora`, `id_time_casa`, `id_time_fora`) VALUES (0, 0, $id_time_casa, $id_time_fora);";
		$this->conn->query($sql);
		$id_partida = $this->conn->lastInsertId();

		// adiciona relacao entre rodada e partida
		$sql = "INSERT INTO `rodadaPartida` (`id_partida`, `id_rodada`) VALUES ($id_partida, $id_rodada)";
		$this->conn->query($sql);
	}

	/**
	 * Constroi as partidas do campeonato
	 *
	 * MUST CALL THIS METHOD AFTER CALLED insert_rodadas()
	 *
	 * @param int $id_campeonato
	 */
	private function build_partidas($id_campeonato){

		// GET 20 TIMES ALEATORIAMENTE
		$times = $this->conn->query('SELECT id FROM time ORDER BY RAND() LIMIT 20')->fetchAll();

		$members = [];
		foreach ($times as $time) {
			$members[] = $time['id'];
		}

		// algoritmo gerador dos confrontos
		$schedule = @self::scheduler($members);

		// dobra o array para fazer 1 e 2 turno
		$schedule = array_merge_recursive($schedule, $schedule);

		foreach($schedule as $round => $games){

			// get id da rodada
			$sql = "SELECT id FROM rodada WHERE id_campeonato = {$id_campeonato} AND num = ".($round+1);
			$id_rodada = $this->conn->query($sql)->fetchColumn();

			// 1 turno ate a 19 rodada, apos muda o mando de campo
			if($round < 19){
				foreach($games AS $play){
					$this->add_partida($id_campeonato, $id_rodada, $play["Home"], $play["Away"]);
				}
			}else{
				foreach($games AS $play){
					$this->add_partida($id_campeonato, $id_rodada, $play["Away"], $play["Home"]);
				}
			}
		}
	}

	/**
	 * Encontra a primeira quarta ou domingo de uma data
	 * @param string $data DateTime
	 * @return string
	 */
	private static function encontraQuartaOUDomingo($data){
		$data_aux = date('Y-m-d', strtotime($data));

		while (date('N', strtotime($data_aux)) != 7 && date('N', strtotime($data_aux)) != 3) {
			$data_aux = date('Y-m-d', strtotime('next day', strtotime($data_aux)));
		}

		return $data_aux;
	}

	/**
	 * @author D.D.M. van Zelst
	 * @copyright 2012
	 */
	private static function scheduler($teams){
		if (count($teams)%2 != 0){
			array_push($teams, "bye");
		}
		$away = array_splice($teams,(count($teams)/2));
		$home = $teams;
		for ($i=0; $i < count($home)+count($away)-1; $i++){
			for ($j=0; $j<count($home); $j++){
				$round[$i][$j]['Home'] = $home[$j];
				$round[$i][$j]['Away'] = $away[$j];
			}
			if(count($home)+count($away)-1 > 2){
				array_unshift($away, array_shift(array_splice($home, 1, 1)));
				array_push($home, array_pop($away));
			}
		}
		return $round;
	}

}
