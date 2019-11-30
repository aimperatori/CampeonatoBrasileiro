<?php




?>

<div class="container">
	<h2><?php echo $campeonato; ?></h2>
	<div class="row">
		<table class="table table-sm table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Time</th>
					<th scope="col">Partidas</th>
					<th scope="col">Vitórias</th>
					<th scope="col">Empates</th>
					<th scope="col">Derrotas</th>
					<th scope="col">Pontos</th>
					<th scope="col">Saldo de Gol</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<?php foreach ($classificacao as $time) { ?>
					<th scope="row"><?php echo $time->posicao ?></th>
					<td><?php echo $time->time_nome; ?></td>
					<td><?php echo $time->partidas; ?></td>
					<td><?php echo $time->vitorias; ?></td>
					<td><?php echo $time->empates ?></td>
					<td><?php echo $time->derrotas ?></td>
					<td><?php echo $time->pontos ?></td>
					<td><?php echo $time->saldo_gol ?></td>
				<?php } ?>
				</tr>
			</tbody>
		</table>
	</div>
</div>