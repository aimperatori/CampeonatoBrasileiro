
<div class="container">
	<div class="row">
	
	<?php foreach ($campeonatos as $campeonato) { ?>
	
		<div class="col-sm-3">
			<div class="card">
				<div class="card-body">
					<h3 class="card-title"><?php echo $campeonato['nome']; ?></h3>
					<p class="card-text">
						<?php echo $campeonato['descricao']; ?>
					</p>
					<a href="rodadas" class="btn btn-primary">Ver classificaçao</a>
				</div>
			</div>
		</div>
		
	<?php } ?>
	
	</div>
</div>