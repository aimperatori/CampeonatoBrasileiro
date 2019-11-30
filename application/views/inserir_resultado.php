<script>
function mudaCampeonato(){
	var id_campeonato = document.getElementById('id_campeonato').value;
	window.location.href = '/inserirResultados?campeonato='+id_campeonato;
}
</script>

<form action="/inserirResultados/save" method="POST">
	<div class="site-blocks-vs site-section bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-4 mx-auto">
					<select onchange="mudaCampeonato();" class="form-control" id="id_campeonato" name="id_campeonato">
						<option value="0">Selecione um Campeonato</option>
						<?php foreach ($campeonatos as $campeonato) { ?>
						<option <?php echo $campeonato->id == $idCampeonatoSelected ? 'selected' : '' ?> value="<?php echo $campeonato->id; ?>"><?php echo $campeonato->nome; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 mx-auto mt-5">
					<h1>Rodada Atual: <?php echo $rodada_atual; ?></h1>
					<input name="num_rodada" type="hidden" value="<?php echo $rodada_atual; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 mx-auto m-5">
					<div class="form-inline">
					    <label>Partida: </label>
					    <select class="form-control" id="id_partida" name="id_partida">
					    	<option value="0">Selecione uma patida</option>
					    	<?php foreach ($partidas as $partida) { ?>
							<option value="<?php echo $partida->id_partida; ?>"><?php echo $partida->nome_time_casa ?> x <?php echo $partida->nome_time_fora; ?></option>
					    	<?php } ?>
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
					<a class="btn btn-secondary" href="/home">Cancelar</a>
				</div>
			</div>

		</div>
	</div>
</form>

