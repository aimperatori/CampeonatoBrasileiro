<div class="site-blocks-vs site-section bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="h2 text-uppercase text-black font-weight-bold mb-3"><?php echo $campeonato->nome;?></h2>
				<div class="site-block-tab">
					<div>
					<?php if($rodada-1){ ?>
						<a href="/rodada?campeonato=<?php echo $campeonato->id; ?>&rodada=<?php echo $rodada-1; ?>" class="btn btn-info btn-md">Anterior</a>
					<?php } ?>
						<label class="m-3"><?php echo $rodada; ?></label>
					<?php if($rodada+1 <= 38){?>
						<a href="/rodada?campeonato=<?php echo $campeonato->id; ?>&rodada=<?php echo $rodada+1; ?>" class="btn btn-info btn-md">Próximo</a>
					<?php } ?>
					</div>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						<?php foreach ($partidas as $partida) { ?>
							<div class="row align-items-center">
								<div class="col-md-12">
									<div class="row bg-white align-items-center ml-0 mr-0 py-4 match-entry">
										<!-- TIME CASA -->
										<div class="col-md-4 col-lg-4 mb-4 mb-lg-0">
											<div class="text-center text-lg-left">
												<div class="d-block d-lg-flex align-items-center">
													<div class="text">
														<h3 class="h5 mb-0 text-black"><?php echo $partida->nome_time_casa; ?></h3>
														<span class="text-uppercase small country"><?php echo $partida->cidade_time_casa; ?></span>
													</div>
												</div>
											</div>
										</div>
										<!-- END TIME CASA -->

										<!-- RESULTADO -->
										<div class="col-md-4 col-lg-4 text-center mb-4 mb-lg-0">
											<div class="d-inline-block">
												<div
													class="bg-black py-2 px-4 mb-2 text-white d-inline-block rounded">
													<span class="h5"><?php echo $partida->gols_time_casa .' - '. $partida->gols_time_fora; ?></span>
												</div>
											</div>
										</div>
										<!-- END RESULTADO -->

										<!-- TIME FORA -->
										<div class="col-md-4 col-lg-4 text-center text-lg-right">
											<div class="">
												<div class="d-block d-lg-flex align-items-center">
													<div class="text order-1 w-100">
														<h3 class="h5 mb-0 text-black"><?php echo $partida->nome_time_fora; ?></h3>
														<span class="text-uppercase small country"><?php echo $partida->cidade_time_fora; ?></span>
													</div>
												</div>
											</div>
										</div>
										<!-- END TIME FORA -->

									</div>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>