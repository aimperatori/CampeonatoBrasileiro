<?php

include "../controllers/Classificacao.php";
include "../controllers/InserirResultado.php";

class Action
{
    private $obj;

    public static function classificacao()
    {
        $obj = new Classificacao();
    }

    public static function insereResultado()
    {
        $obj = new InserirResultados();

        
    }

}