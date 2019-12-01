<?php

include "../controllers/Console.php";

class Action
{
    private $obj;

    public function __construct()
    {
        $obj = new Console();
    }

    public function classificacao()
    {

        print "Escolha o Campeonato\n";

        $list = array();
        $list = $obj->getCampeonatos();

        for($i = 0; i <= count($list); $i++)
        {
            print $list[$i];
        } 

        $id_camp = Input::getSingleChar();
        //print "Classificação do Campeonato\n";

    }

    public function insereResultado()
    {
        print "Jogos Disponíveis na Rodada\n";

    }

}