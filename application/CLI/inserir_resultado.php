<?php

foreach ($campeonatos as $campeonato) {
	if($campeonato->id == $idCampeonatoSelected){
		echo "Campeonato: $campeonato->id -> $campeonato->nome" . PHP_EOL;
	}
}

print "Partidas Disponiveis da Rodada $rodada_atual:" . PHP_EOL;

foreach ($partidas as $partida) {
	echo "$partida->id_partida $partida->nome_time_casa x $partida->nome_time_fora" . PHP_EOL;
}

echo PHP_EOL;
echo "Para cadastrar resultado: ". PHP_EOL;
echo "php index.php inserirResultados save [idCampeonato] [idPartida] [golsTimeCasa] [golsTimeFora]" . PHP_EOL;
