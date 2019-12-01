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
        $action = new Action();

        switch($opc)
        {
            case 1:
                $action->classificacao();
                break;
            case 2:
                $action->getCampeonatos();
                break;
            default:
                print "Ação não encontrada.";
        }
    }

}
