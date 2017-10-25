<?php
$meses = $this->listado_meses;
$numero_noches = $this->numero_noches;
/*echo "<pre>";
print_r($meses);
echo "</pre>";*/
?>
<!--Carousel-->
<div id="carousel-home" class="carousel slide" data-ride="carousel">
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src="<?php echo base_url('assets/images/slide-1.jpg');?>" alt="Slide 1">
		</div>
		<div class="item">
			<img src="<?php echo base_url('assets/images/slide-2.jpg');?>" alt="Slide 2">
		</div>
		<div class="item">
			<img src="<?php echo base_url('assets/images/slide-3.jpg');?>" alt="Slide 3">
		</div>
	</div>

	<div class="general-caption wow bounceInDown">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Disfruta de una experiencia perfecta</h1>
					<p>Encuentra los mejores tours al mejor precio.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="cont-busqueda wow bounceIn">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="tab" role="tabpanel">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#seccion-1" aria-controls="paquetes-turisticos" role="tab" data-toggle="tab">Paquetes turísticos</a>
							</li>
							<li role="presentation">
								<a href="#seccion-2" aria-controls="pasajes" role="tab" data-toggle="tab">Pasajes</a>
							</li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="seccion-1">
								<form name="form-paquetes" method="post" action="<?php echo base_url('buscar');?>">
									<input type="hidden" name="tipo" value="paquetes">
									<div class="row">
										<div class="col-md-3 mrg-bottom-15">
											<label>Ciudad.</label>
											<input type="text" name="country" id="country_search_1" class="form-control" autocomplete="off" placeholder="Ciudad">
											<input type="hidden" name="destino_id" id="destino_id" value="">
										</div>

										<div class="col-md-3 mrg-bottom-15">
											<label>Mes de salida.</label>
											<select name="mes_salida" id="mes_salida" class="form-control chosen-select" data-placeholder="Mes de salida">
												<option value=""></option>
												<?php
												if(!empty($meses)){
													foreach ($meses as $key => $value) {
														echo '<option value="' . $key . '">' . $value . '</option>';
													}
												}
												?>
											</select>
										</div>

										<div class="col-md-3 mrg-bottom-15">
											<label>N° de noches.</label>
											<div class="input-group" data-trigger="spinner">
												<span class="input-group-btn">
													<button class="btn btn-default" type="button" data-spin="down">
														<i class="fa fa-minus" aria-hidden="true"></i>
													</button>
												</span>
												<input type="text" name="numero_noches" class="form-control text-center" data-rule="quantity" data-min="1" data-max="15">
												<span class="input-group-btn">
													<button class="btn btn-default" type="button" data-spin="up">
														<i class="fa fa-plus" aria-hidden="true"></i>
													</button>
												</span>
											</div><!-- /input-group -->
										</div>

										<div class="col-md-2 mrg-bottom-15">
											<label>&nbsp;</label>
											<div class="clearfix"></div>
											<button type="submit" class="btn btn-primary-1"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
										</div>
									</div>
								</form>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="seccion-2">
								<form name="form-pasajes" method="post" action="<?php echo base_url('buscar');?>">
									<input type="hidden" name="tipo" value="pasajes">
									<div class="row">
										<div class="col-md-3 mrg-bottom-15">
											<label>Ciudad de origen.</label>
											<input type="text" name="ciudad_origen" id="country_search_2" class="form-control" autocomplete="off" placeholder="Ciudad de origen">
											<input type="hidden" name="ciudad_origen_id" id="ciudad_origen_id" value="">
										</div>

										<div class="col-md-3 mrg-bottom-15">
											<label>Ciudad de destino.</label>
											<input type="text" name="ciudad_destino" id="country_search_3" class="form-control" autocomplete="off" placeholder="Ciudad de destino">
											<input type="hidden" name="ciudad_destino_id" id="ciudad_destino_id" value="">
										</div>

										<div class="col-md-2 mrg-bottom-15">
											<label>Fecha de salida:</label>
											<input type="text" class="form-control" name="partida" id="pasajes_partida" placeholder="Fecha de salida">
										</div>

										<div class="col-md-2 mrg-bottom-15">
											<label>Fecha de retorno:</label>
											<input type="text" class="form-control" name="retorno" id="pasajes_retorno" placeholder="Fecha de retorno">
										</div>

										<div class="col-md-2 mrg-bottom-15">
											<label>&nbsp;</label>
											<div class="clearfix"></div>
											<button type="submit" class="btn btn-block btn-primary-1"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>
<!-- //Carousel-->

<section class="wrapper">
	<div class="container container-principal">
		<div class="divider_border"></div>
		<div class="cont-main">
			<div class="row">
				<div class="col-md-12">
					<div class="titulo-principal">
						<h3>Nuestras <span>Promociones</span></h3>
						<p>Aquí encontraras las mejores promociones en paquetes turísticos, vuelos y pasajes de bus.</p>
					</div>
					<!-- cont-promos-->
					<div class="cont-promos tabbable-line">
						<ul id="carousel-promo-1" class="carousel-promo">
							<li>
								<div class="thumbnail thumbnail-item">
									<div class="discount">25%</div>
									<figure>
										<a href="#">
											<img src="https://unsplash.it/800/600" alt="Alt aquí">
										</a>
										<div class="tg-icons">
											<span class="badge" data-toggle="tooltip" title="Título"><i class="fa fa-plane" aria-hidden="true"></i></span>
											<span class="badge"  data-toggle="tooltip" title="Título"><i class="fa fa-car" aria-hidden="true"></i></span>
										</div>
									</figure>
									<div class="caption">
										<h3><a href="">Titulo INICIO 1</a></h3>
										<h4>
											<i class="fa fa-calendar" aria-hidden="true"></i>4 días.
											&nbsp;&nbsp;&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i>Lima
										</h4>
										<p>Descripción</p>
									</div>
									<div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
										<div class="btn-group" role="group">
											<a href="javascript:;" class="btn btn-precio"><small>desde</small> $200.00</a>
										</div>
										<div class="btn-group" role="group">
											<a href="#" class="btn btn-detalles"><i class="fa fa-plus" aria-hidden="true"></i> Detalles</a>
										</div>
									</div>
								</div>
							</li>

							<li>
								<div class="thumbnail thumbnail-item">
									<div class="discount">60%</div>
									<figure>
										<a href="#">
											<img src="https://unsplash.it/800/600" alt="Alt aquí">
										</a>
										<div class="tg-icons">
											<span class="badge" data-toggle="tooltip" title="Título"><i class="fa fa-plane" aria-hidden="true"></i></span>
											<span class="badge"  data-toggle="tooltip" title="Título"><i class="fa fa-car" aria-hidden="true"></i></span>
										</div>
									</figure>
									<div class="caption">
										<h3><a href="">Titulo INICIO</a></h3>
										<h4><i class="fa fa-clock-o" aria-hidden="true"></i> 4 días.</h4>
										<p>Descripción</p>
									</div>
									<div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
										<div class="btn-group" role="group">
											<a href="javascript:;" class="btn btn-precio"><small>desde</small> $200.00</a>
										</div>
										<div class="btn-group" role="group">
											<a href="#" class="btn btn-detalles"><i class="fa fa-plus" aria-hidden="true"></i> Detalles</a>
										</div>
									</div>
								</div>
							</li>

							<li>
								<div class="thumbnail thumbnail-item">
									<div class="discount">25%</div>
									<figure>
										<a href="#">
											<img src="https://unsplash.it/800/600" alt="Alt aquí">
										</a>
										<div class="tg-icons">
											<span class="badge" data-toggle="tooltip" title="Título"><i class="fa fa-plane" aria-hidden="true"></i></span>
											<span class="badge"  data-toggle="tooltip" title="Título"><i class="fa fa-car" aria-hidden="true"></i></span>
										</div>
									</figure>
									<div class="caption">
										<h3><a href="">Titulo INICIO</a></h3>
										<h4><i class="fa fa-calendar" aria-hidden="true"></i> 4 días.</h4>
										<p>Descripción</p>
									</div>
									<div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
										<div class="btn-group" role="group">
											<a href="javascript:;" class="btn btn-precio"><small>desde</small> $200.00</a>
										</div>
										<div class="btn-group" role="group">
											<a href="#" class="btn btn-detalles"><i class="fa fa-plus" aria-hidden="true"></i> Detalles</a>
										</div>
									</div>
								</div>
							</li>

							<li>
								<div class="thumbnail thumbnail-item">
									<div class="discount">60%</div>
									<figure>
										<a href="#">
											<img src="https://unsplash.it/800/600" alt="Alt aquí">
										</a>
										<div class="tg-icons">
											<span class="badge" data-toggle="tooltip" title="Título"><i class="fa fa-plane" aria-hidden="true"></i></span>
											<span class="badge"  data-toggle="tooltip" title="Título"><i class="fa fa-car" aria-hidden="true"></i></span>
										</div>
									</figure>
									<div class="caption">
										<h3><a href="">Titulo FIN 1</a></h3>
										<h4><i class="fa fa-clock-o" aria-hidden="true"></i> 4 días.</h4>
										<p>Descripción</p>
									</div>
									<div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
										<div class="btn-group" role="group">
											<a href="javascript:;" class="btn btn-precio"><small>desde</small> $200.00</a>
										</div>
										<div class="btn-group" role="group">
											<a href="#" class="btn btn-detalles"><i class="fa fa-plus" aria-hidden="true"></i> Detalles</a>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<!-- //cont-promos-->
				</div>
			</div>
			<!-- //row-->

			<div class="row">
				<div class="col-md-4">
					<?php echo $prom_despegar = $this->load->view('paginas/motores/despegar', '', TRUE);?>
				</div>
				<div class="col-md-4">
					<a href="<?php echo base_url('traslados-actividades-circuitos');?>">
						<img src="assets/images/banner-1.jpg" class="img-responsive">
					</a>
				</div>

				<div class="col-md-4">
					<ul id="bannersHome">
						<li>
							<a href="#">
								<img src="assets/images/bann-1.jpg" class="img-responsive">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="assets/images/bann-2.jpg" class="img-responsive">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="assets/images/bann-3.jpg" class="img-responsive">
							</a>
						</li>
					</ul>
				</div>

			</div>
			<!-- //row-->
		</div>
	</div>

</section>
<!-- //section .wrapper