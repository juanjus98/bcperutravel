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
								<a href="#seccion-2" aria-controls="tickets" role="tab" data-toggle="tab">Tickets</a>
							</li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="seccion-1">
								<form class="form-inline">
									<div class="form-group">
										<label class="sr-only" for="origen">Origen</label>
										<input type="text" class="form-control" name="origen" id="origen" placeholder="Origen">
									</div>
									<div class="form-group">
										<label class="sr-only" for="destino">Origen</label>
										<input type="text" class="form-control" name="destino" id="destino" placeholder="Destino">
									</div>

									<div class="form-group">
										<label class="sr-only" for="partida">Partida</label>
										<input type="text" class="form-control" name="partida" id="partida" placeholder="Partida">
									</div>

									<div class="form-group">
										<label class="sr-only" for="regreso">Regreso</label>
										<input type="text" class="form-control" name="regreso" id="regreso" placeholder="Regreso">
									</div>

									<button type="submit" class="btn btn-primary-1">Buscar</button>
								</form>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="seccion-2">

								<form class="form-inline">
									<div class="form-group">
										<label class="sr-only" for="origen">Origen</label>
										<input type="text" class="form-control" name="origen" id="origen" placeholder="Origen">
									</div>
									<div class="form-group">
										<label class="sr-only" for="destino">Origen</label>
										<input type="text" class="form-control" name="destino" id="destino" placeholder="Destino">
									</div>

									<div class="form-group">
										<label class="sr-only" for="partida">Partida</label>
										<input type="text" class="form-control" name="partida" id="partida" placeholder="Partida">
									</div>

									<div class="form-group">
										<label class="sr-only" for="regreso">Regreso</label>
										<input type="text" class="form-control" name="regreso" id="regreso" placeholder="Regreso">
									</div>

									<button type="submit" class="btn btn-primary-1">Buscar</button>
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

		<div>
			<iframe src="http://lineafacil.com/es/microsite/bc-perutravel" frameborder="0" height="1000" width="100%"></iframe>
		</div>

			<div class="titulo-principal wow bounceInRight">
				<h3>Nuestras <span>Promociones</span></h3>
				<p>Aquí encontraras las mejores promociones en paquetes turísticos, vuelos y pasajes de bus.</p>
			</div>
			<!--Contenido website cada página-->
			<div class="cont-promos tabbable-line">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs nav-justified" role="tablist">
					<li role="presentation" class="active">
						<a href="#tab-promo-1" class="tab-promo-1" aria-controls="tab-promo-1" role="tab" data-toggle="tab">Paquetes turísticos</a>
					</li>
					<li role="presentation">
						<a href="#tab-promo-2" class="tab-promo-2" aria-controls="tab-promo-2" role="tab" data-toggle="tab">Tickets</a>
					</li>
					<li role="presentation">
						<a href="#tab-promo-3" class="tab-promo-3" aria-controls="tab-promo-3" role="tab" data-toggle="tab">Año nuevo</a>
					</li>
					<li role="presentation">
						<a href="#tab-promo-4" class="tab-promo-4" aria-controls="tab-promo-4" role="tab" data-toggle="tab">Tours</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="tab-promo-1">
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
					<div role="tabpanel" class="tab-pane fade active" id="tab-promo-2">
						<ul id="carousel-promo-2" class="carousel-promo">
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
										<h3><a href="">Titulo INICIO 2</a></h3>
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
										<h3><a href="">Titulo FIN 2</a></h3>
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
					<div role="tabpanel" class="tab-pane fade active" id="tab-promo-3">
						<ul id="carousel-promo-3" class="carousel-promo">
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
										<h3><a href="">Titulo INICIO 3</a></h3>
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
										<h3><a href="">Titulo FIN 3</a></h3>
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
					<div role="tabpanel" class="tab-pane fade active" id="tab-promo-4">
						<ul id="carousel-promo-4" class="carousel-promo">
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
										<h3><a href="">Titulo INICIO 4</a></h3>
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
										<h3><a href="">Titulo FIN 4</a></h3>
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
				</div>

			</div>
		</div>
	</div>
</section>
<!-- //section .wrapper