<?php

foreach ($partidas as $partida) {
	echo "$partida->nome_time_casa ";
	echo "$partida->gols_time_casa - $partida->gols_time_fora";
	echo " $partida->nome_time_fora" . PHP_EOL;
}
