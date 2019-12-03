<?php

echo "Classificação: $campeonato->nome". PHP_EOL;

print "# | Time | Partidas | Pontos | Vitorias | Empates | Derrotas | Saldo de Gols" . PHP_EOL;

$i = 0;
foreach ($classificacao as $time) {

	echo ++$i." | ";
	echo "$time->nome | ";
	echo "$time->partidas | ";
	echo "$time->pontuacao | ";
	echo "$time->vitoria | ";
	echo "$time->empate | ";
	echo "$time->derrota | ";
	echo $time->golsFeitos - $time->golsSofridos;
	echo PHP_EOL;
}