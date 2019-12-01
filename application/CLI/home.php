<?php

include "../helpers/Input.php";
include "./Menu.php";

print "Bem-vindo ao CLI do Campeonato Brasileiro\n";
Menu::showMenu();
Menu::doAction(Input::getSingleChar());

die();