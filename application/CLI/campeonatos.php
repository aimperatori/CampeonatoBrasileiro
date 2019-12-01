<?php

echo "Campeonatos:" . PHP_EOL;

if(count($campeonatos) > 0) {
	foreach ($campeonatos as $campeonato) {
		echo "$campeonato->id -> $campeonato->nome - $campeonato->descricao ". PHP_EOL;
	}
}

echo PHP_EOL;
echo "Para visualizar a tabela de classificação: ". PHP_EOL;
echo "php index.php classificacao [idCampeonato]" . PHP_EOL; // ver certo

echo PHP_EOL;

echo "Para visualizar uma rodada: ". PHP_EOL;
echo "php index.php rodada index [idCampeonato] [rodada]" . PHP_EOL;
