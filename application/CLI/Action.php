<?php

class Action
{

    public function classificacao($id_camp)
    {
        if($id_camp >= 1 && $id_camp <= 3)
		{
			$list = array();

			// $list = Campeonato::find($_POST['id_campeonato']);

			print "Time | Partidas | Pontos | Vitorias | Derrotas | Empates | Saldo de Gols\n";

			print "Cruzeiro | 35 | 36 | 7 | 15 | 13 | -14\n";
			print "CSA		| 35 | 32 | 8 | 8  | 19 | -29\n";
		}
		else
		{
			print "Campeonato não existente, escolha um válido!\n";
		}
    }

    public function insereResultado($id_camp)
    {
        if($id_camp >= 1 && $id_camp <= 3)
		{
            print "Partidas Disponiveis da Rodada 35:\n";

            print "1) Santos - Chapecoense\n";
            print "2) Vasco da Gama - Cruzeiro\n";
            print "3) Fluminense - Fortaleza\n";

            $id_partida = Input::getSingleChar();

            print "Gols time Casa: ";
            $gols_time_casa = Input::getSingleChar();
            print"\n";
            print "Gols time Fora: ";
            $gols_time_fora = Input::getSingleChar();
            print"\n";

        }
        else
        {
            print "Campeonato não existente, escolha um válido!\n"; 
        }

    }

}