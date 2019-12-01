<?php

echo $campeonato->nome .PHP_EOL;
echo "Rodada: $rodada". PHP_EOL.PHP_EOL;

foreach ($partidas as $partida) {
	echo "$partida->nome_time_casa ";
	echo "$partida->gols_time_casa - $partida->gols_time_fora";
	echo " $partida->nome_time_fora" . PHP_EOL;
}

echo PHP_EOL;
echo "Listar rodadas que podem ser inseridas: ". PHP_EOL;
echo "php index.php inserirResultados index [idCampeonato]" . PHP_EOL;
