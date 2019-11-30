<?php

include "./Action.php";

class Menu 
{

    public static function showMenu()
    {
        echo "\n";
        echo "1) Classificação Atual\n";
        echo "2) Inserir Resultado\n";
        echo "\n";
    }

    public static function doAction($opc)
    {
        switch($opc)
        {
            case 1:
                Action::classificacao();
                break;
            case 2:
                Action::insereResultado();
                break;
            default:
                print "Ação não encontrada.";
        }
    }

}
