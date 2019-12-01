<?php

class Console
{

	public function getClassificacao()
	{
		$list = array();

		$list = Campeonato::find($_POST['id_campeonato']);

		return $list;
	}

	public function getCampeonatos()
	{
		$list = array();

		$list = Campeonato::all();

		return $list;
	}


}
