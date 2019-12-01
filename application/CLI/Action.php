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
        print "Classificação do Campeonato\n";

    }

    public function insereResultado()
    {
        print "Jogos Disponíveis na Rodada\n";

    }

}