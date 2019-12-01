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

        print "Escolha o Campeonato\n";

        /*$list = array();
        $list = $obj->getCampeonatos();

        for($i = 0; $i <= count($list); $i++)
        {
            print $list[$i];
        } 
        */

        print "1) Campeonato Serie A\n";
        print "2) Campeonato Serie B\n";

        $id_camp = Input::getSingleChar();

        switch($opc)
        {
            case 1:
                $action->classificacao($id_camp);
                break;
            case 2:
                $action->insereResultado($id_camp);
                break;
            default:
                print "Ação não encontrada.";
        }
    }

}
