<?php

$campeonatos = array(
		['id' => 1,
		'nome' => 'campeonato brasileiro Serie A'],
		['id' => 2,
		'nome' => 'campeonato brasileiro Serie B'],
);


?>

<form action="/inserirResultados/save" method="POST">
	<div class="site-blocks-vs site-section bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-4 mx-auto">
					<select class="form-control" id="id_campeonato" name="id_campeonato">
						<?php foreach ($campeonatos as $campeonato) { ?>
						<option value="<?php echo $campeonato['id']; ?>"><?php echo $campeonato['nome']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 mx-auto mt-5">
					<h1>Rodada Atual: <span id="num_rodada"></span></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 mx-auto m-5">
					<div class="form-inline">
					    <label>Partida: </label>
					    <select class="form-control" id="partida" name="partida">
					    	<option value="0">Selecione uma patida</option>
					    	<option value="2">Grêmio x Internacional</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row ">
				<div class="mx-auto">
					<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Gols Time Casa: </label>
					<input class="my-1 mr-sm-2" type="number" id="gols_time_casa" name="gols_time_casa">

					<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Gols Time Fora: </label>
					<input class="my-1 mr-sm-2" type="number" id="gols_time_fora" name="gols_time_fora">
				</div>
			</div>

			<div class="row">
				<div class="mx-auto mt-5">
					<button type="submit" class="btn btn-success" id="btn-salvar">Salvar</button>
					<a class="btn btn-secondary" href="/home">Calcelar</a>
				</div>
			</div>

		</div>
	</div>
</form>

