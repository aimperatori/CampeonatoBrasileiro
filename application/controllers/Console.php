<?php

class Console
{

	public function getClassificacao()
	{
		$list = array();

		// $list = Campeonato::find($_POST['id_campeonato']);

		print "Time | Partidas | Pontos | Vitorias | Derrotas | Empates | Saldo de Gols";

		print "Cruzeiro | 35 | 36 | 7 | 15 | 13 | -14";
		print "CSA		| 35 | 32 | 8 | 8  | 19 | -29";

	}

	public function getCampeonatos()
	{
		$list = array();

		$list[0] = "1) Brasileiro Serie A\n";
		$lista[1] = "2) Brasileiro Serie B\n";

		return $list;
	}

	public function getPartidasDisponiveis($id_campeonato)
	{

		$list = array();

		$list[0] = "Santos - Chapecoense";
		$list[1] = "Vasco da Gama - Cruzeiro";
		$list[2] = "Fluminense - Fortaleza";

		return $list;
	}


}
