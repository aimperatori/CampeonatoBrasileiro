<?php

if(count($campeonatos) > 0) {
	foreach ($campeonatos as $campeonato) {
		echo $campeonato->nome . PHP_EOL;
		echo $campeonato->descricao . PHP_EOL;
	}
}