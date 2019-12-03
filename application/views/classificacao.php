<?php $i = 0; ?>
<div class="container">
	<h2><?php echo $campeonato->nome; ?></h2>
	<div class="row">
		<table class="table table-sm table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Time</th>
					<th scope="col">Partidas</th>
					<th scope="col">Pontos</th>
					<th scope="col">Vitórias</th>
					<th scope="col">Empates</th>
					<th scope="col">Derrotas</th>
					<th scope="col">Saldo de Gol</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($classificacao as $time) { ?>
				<tr>
					<th scope="row"><?php echo ++$i ?></th>
					<td><?php echo $time->nome; ?></td>
					<td><?php echo $time->partidas; ?></td>
					<td><?php echo $time->pontuacao ?></td>
					<td><?php echo $time->vitoria; ?></td>
					<td><?php echo $time->empate ?></td>
					<td><?php echo $time->derrota ?></td>
					<td><?php echo $time->golsFeitos - $time->golsSofridos; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>