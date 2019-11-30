<?php

include "../helpers/Input.php";
include "../helpers/Menu.php";

print "Bem-vindo ao CLI do Campeonato Brasileiro";
Menu::showMenu();
$opc = Input::getSingleChar();


print "\nYour message is:\n$opc\n"; 