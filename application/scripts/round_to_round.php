<?php
$teams = array('Equipo 1','Equipo 2','Equipo 3','Equipo 4',"Equipo 5", "Equipo 6");
$results = array();

foreach($teams as $k){
	foreach($teams as $j){
		if($k == $j){ break; }

		$z = array($k,$j);
		sort($z);
		if(!in_array($z,$results)){
			$results[] = $z;
		}
	}
}
