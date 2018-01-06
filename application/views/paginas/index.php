<?php
$meses = $this->listado_meses;
$numero_noches = $this->numero_noches;

$incluye_list = $this->paquete_incluye_list;
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
								<a href="#seccion-2" aria-controls="pasajes" role="tab" data-toggle="tab">Vuelos y Pasajes de Bus</a>
							</li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="seccion-1">
								<form name="form-paquetes" method="post" action="<?php echo base_url('buscar');?>">
									<input type="hidden" name="categoria_id" value="6">

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
											<div class="btn-group btn-group-xs btn-group-justified" data-toggle="buttons">
												<label class="btn btn-default active">
													<input type="radio" name="categoria_id" id="tipo_transporte_1" autocomplete="off" value="1" checked> VUELOS
												</label>
												<label class="btn btn-default">
													<input type="radio" name="categoria_id" id="tipo_transporte_2" autocomplete="off" value="2"> PASAJES DE BUS
												</label>
											</div>
										</div>
										<div class="col-md-3 mrg-bottom-15">
											<div class="btn-group btn-group-xs btn-group-justified" data-toggle="buttons">
												<label class="btn btn-default active">
													<input type="radio" name="ida_vuelta" id="ida_vuelta_1" autocomplete="off" value="1" checked> IDA Y VUELTA
												</label>
												<label class="btn btn-default">
													<input type="radio" name="ida_vuelta" id="ida_vuelta_2" autocomplete="off" value="2"> SOLO IDA
												</label>
											</div>
										</div>
									</div>
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
						<?php 
						if(!empty($destacados)){
						?>
						<ul id="carousel-promo-1" class="carousel-promo">
							<?php
							foreach ($destacados as $key => $item) {

				$nombreItem = trim($item['nombre_corto']);
                $urlLink = base_url($item['categoria_key'] . '/' . $item['url_key']);

                $urlImagen = (!empty($item['imagen_2'])) ? base_url($this->config->item('upload_path') . $item['imagen_2']) : base_url('assets/images/no-image.jpg') ;

                $precio_descuento = $item['precio_descuento'];

                $badges='';

                switch ($item['categoria_id']) {
                  case 1:
                  case 2:
                    $ciudad_origen = ($item['ciudad_origen'] != 0) ? $this->Ciudades->get_row(array('id' => $item['ciudad_origen'])) : '';
                    $ciudad_destino = ($item['ciudad_destino'] != 0) ? $this->Ciudades->get_row(array('id' => $item['ciudad_destino'])) : '';

                    //Tipo de Ticket
                    $tipo_ticket = ($item['tipo_ticket'] == 1) ? 'IDA Y VUELTA' : 'SOLO IDA' ;
                    $tipo_ticket_icon = ($item['tipo_ticket'] == 1) ? 'fa-exchange' : 'fa-long-arrow-right' ;

                    //Tipo de transporte
                    $tipos_transporte = $this->tipos_transporte;
                    $tipo_transporte = $tipos_transporte[$item['tipo_transporte']];
                    if(!empty($tipo_transporte)){
                      $badges .= '<span class="badge" data-toggle="tooltip" title="'.$tipo_transporte['title'].'"><i class="fa '.$tipo_transporte['fa-icon'].'" aria-hidden="true"></i></span>';
                    }

                    $badges .= '<span class="badge" data-toggle="tooltip" title="'.$tipo_ticket.'"><i class="fa '.$tipo_ticket_icon.'" aria-hidden="true"></i></span>';

                    $city_label = $ciudad_origen['city'] . ', ' . $ciudad_origen['country'] .  ' - ' . $ciudad_destino['city'] . ', ' . $ciudad_destino['country'];

                    $labels = '<span class="label"><i class="fa fa-map-marker" aria-hidden="true"></i>'.$city_label.'</span>';
                    break;
                  case 6:
                    //Incluye
                    $paquete_incluye = explode(',', $item['paquete_incluye']);
                    if(!empty($paquete_incluye)){
                      foreach ($paquete_incluye as $key => $value) {
                        $incluye = $incluye_list[$value];
                        $badges .= '<span class="badge" data-toggle="tooltip" title="'.$incluye['title'].'"><i class="fa '.$incluye['fa-icon'].'" aria-hidden="true"></i></span>';
                      }
                    }

                    $paquete_ciudad = ($item['paquete_ciudad'] != 0) ? $this->Ciudades->get_row(array('id' => $item['paquete_ciudad'])) : '';

                    /*$badges = '<span class="badge" data-toggle="tooltip" title="'.$tipo_ticket.'"><i class="fa '.$tipo_ticket_icon.'" aria-hidden="true"></i></span>';*/

                    $labels = '<span class="label"><i class="fa fa-calendar" aria-hidden="true"></i>'.$item['paquete_noches'].' Noches.</span>';
                    $city_label = $paquete_ciudad['city'] . ', ' . $paquete_ciudad['country'];
                    $labels .= '<span class="label"><i class="fa fa-map-marker" aria-hidden="true"></i>' . $city_label . '</span>';
                    break;
                  
                  default:
                    # code...
                    break;
                }

							?>
							<li>
								<div class="thumbnail thumbnail-item">
                    <?php echo $retVal = ($item['mostrar_descuento']==1) ? '<div class="discount">'.$precio_descuento.'</div>' : '' ; ?>
                    <!-- <div class="discount">25%</div> -->
                    <figure>
                      <a href="<?php echo $urlLink;?>">
                        <img src="<?php echo $urlImagen;?>" alt="<?php echo $nombreItem;?>">
                      </a>
                      <div class="tg-icons">
                        <?php echo $badges;?>
                        <!-- <span class="badge" data-toggle="tooltip" title="Título"><i class="fa fa-plane" aria-hidden="true"></i></span>
                        <span class="badge"  data-toggle="tooltip" title="Título"><i class="fa fa-car" aria-hidden="true"></i></span> -->
                      </div>
                    </figure>
                    <div class="caption">
                      <h3><a href="<?php echo $urlLink;?>" title="<?php echo $nombreItem;?>"><?php echo character_limiter($nombreItem,30);?></a></h3>
                      <h4>
                        <?php echo $labels;?>
                        <!-- <span class="label"><i class="fa fa-calendar" aria-hidden="true"></i>4 días.</span>
                        <span class="label"><i class="fa fa-map-marker" aria-hidden="true"></i>Lima</span> -->
                      </h4>
                      <p><?php echo $item['resumen'];?></p>
                    </div>
                    <div class="btn-group btn-group-justified" role="group">
                      <?php
                      $precio_moneda = ($item['precio_moneda'] == 1) ? '$' : 'S/' ;
                      $precio = (!empty($item['precio'])) ? $item['precio'] : '' ;
                      ?>
                      <a href="javascript:;" class="btn btn-precio" role="button"><small><?php echo $precio_moneda;?></small> <?php echo $precio;?></a>
                      <a href="<?php echo $urlLink;?>" class="btn btn-detalles" role="button" title="<?php echo $nombreItem;?>"><i class="fa fa-plus" aria-hidden="true"></i> Detalles</a>
                    </div>
                  </div>
							</li>
							<?php } //End foreach?>

							<!-- <li>
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
							</li> -->
						</ul>
						<?php } //Endif?>
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
						<img src="<?php echo base_url('assets/images/banner-1.jpg" class="img-responsive');?>">
					</a>
				</div>

				<div class="col-md-4">
					<?php 
					if(!empty($banners)){
					?>
					<ul id="bannersHome">
						<?php 
						foreach ($banners as $key => $value) {
							$banner_imagen = base_url($upload_path . $value['imagen_1']);
							$banner_url = $value['url'];
							$banner_target = $value['target'];
							$banner_titulo = $value['titulo1'];
							?>
						<li>
							<a href="<?php echo $banner_url;?>" target="<?php echo $banner_target;?>" title="<?php echo $banner_titulo;?>">
								<img src="<?php echo $banner_imagen;?>" alt="<?php echo $banner_titulo;?>" class="img-responsive" >
							</a>
						</li>
						<?php } ?>
						<!-- <li>
							<a href="#">
								<img src="<?php echo base_url('assets/images/bann-2.jpg" class="img-responsive');?>">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="<?php echo base_url('assets/images/bann-3.jpg" class="img-responsive');?>">
							</a>
						</li> -->
					</ul>
				<?php
					}
				?>
				</div>

			</div>
			<!-- //row-->
		</div>
	</div>

</section>
<!-- //section .wrapper