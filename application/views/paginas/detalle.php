<?php
/*$incluye_list = $this->paquete_incluye_list;*/
$nombre_corto = $producto['nombre_corto'];
$nombre_largo = $producto['nombre_largo'];
$resumen = $producto['resumen'];
$descripcion = $producto['descripcion'];
$url_key = $producto['url_key'];
$precio_moneda = $producto['precio_moneda'];
$precio = $producto['precio'];
$precio_descuento = $producto['precio_descuento'];
$mostrar_descuento = $producto['mostrar_descuento'];
$imagen_1 = $producto['imagen_1'];
$imagen_2 = $producto['imagen_2'];
$keywords = $producto['keywords'];
$ambito = $producto['ambito'];
$paquete_ciudad = $producto['paquete_ciudad'];
$tipo_transporte = $producto['tipo_transporte'];
$transporte_id = $producto['transporte_id'];
$ciudad_origen = $producto['ciudad_origen'];
$ciudad_destino = $producto['ciudad_destino'];
$tipo_ticket = $producto['tipo_ticket'];
$paquete_incluye = $producto['paquete_incluye'];
$paquete_meses = $producto['paquete_meses'];
$paquete_noches = $producto['paquete_noches'];
$categoria_nombre = $producto['categoria_nombre'];
$categoria_key = $producto['categoria_key'];
$wbox_blq = $producto['wbox_blq'];
$especificaciones = $producto['especificaciones'];
//Imagen cabecera
$imgCabecera = (!empty($imagen_1)) ? base_url($this->config->item('upload_path') . $imagen_1) : base_url('assets/images/no-image.jpg') ;
//Imagen principal
$urlImagen = (!empty($imagen_2)) ? base_url($this->config->item('upload_path') . $imagen_2) : base_url('assets/images/no-image.jpg') ;
?>
<!--Cabecera-->
<div class="container-cabecera" style="background-image: url('<?php echo $imgCabecera;?>')">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="cont-titulos">
          <h1><?php echo $nombre_largo = (!empty($nombre_largo)) ? $nombre_largo : 'Nombre del producto.';?></h1>
          <p><?php echo $categoria_nombre = (!empty($categoria_nombre)) ? $categoria_nombre : 'Categoría.' ;?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- //Cabecera-->
<section class="wrapper">
  <div class="container container-principal">
    <div class="divider_border"></div>
    <div class="cont-main">
      <?php
      echo "<pre>";
      print_r($producto);
      echo "</pre>";
      /*die();*/
      ?>
      <div class="row">
        <div class="col-md-8">
          <div class="cont-gallery">
            <img src="<?php echo $urlImagen;?>" alt="<?php echo $nombre_largo;?>" class="img-responsive">
          </div>
          <div class="clearfix"></div>
          <div class="cont-descripcion">
            <?php echo $descripcion;?>
          </div>
          <div class="cont-wboxes">
            <div class="row">
              <div class="col-md-6">
                <div class="feature-box">
                  <div class="feature-box-icon">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </div>
                  <div class="feature-box-info">
                    <h4>Fabulous (Based on 34 reviews)</h4>
                    <p>
                      Lorem ipsum dolor sit amet, ei per elitr persecuti adipiscing, ne discere temporibus nam.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="feature-box">
                  <div class="feature-box-icon">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </div>
                  <div class="feature-box-info">
                    <h4>Fabulous (Based on 34 reviews)</h4>
                    <p>
                      Lorem ipsum dolor sit amet, ei per elitr persecuti adipiscing, ne discere temporibus nam.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="feature-box">
                  <div class="feature-box-icon">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </div>
                  <div class="feature-box-info">
                    <h4>Fabulous (Based on 34 reviews)</h4>
                    <p>
                      Lorem ipsum dolor sit amet, ei per elitr persecuti adipiscing, ne discere temporibus nam.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="feature-box">
                  <div class="feature-box-icon">
                    <i class="fa fa-check" aria-hidden="true"></i>
                  </div>
                  <div class="feature-box-info">
                    <h4>Fabulous (Based on 34 reviews)</h4>
                    <p>- Lorem ipsum dolor sit amet, ei per elitr persecuti adipiscing, ne discere temporibus nam.</p>
                    <p>- Lorem ipsum dolor sit amet, ei per elitr persecuti adipiscing, ne discere temporibus nam.</p>
                    <p>- Lorem ipsum dolor sit amet, ei per elitr persecuti adipiscing, ne discere temporibus nam.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="cont-itinerario">
            <h3>Itinerario</h3>
            <ul class="cbp_tmtimeline">
              <li>
                <time class="cbp_tmtime" datetime="09:30"><span>30 min</span><span>09:30</span>
                </time>
                <div class="cbp_tmicon">
                  1
                </div>
                <div class="cbp_tmlabel">
                  <div class="hidden-xs">
                    <img src="http://themetrademark.com/demo/bestours/wp-content/uploads/2017/03/tour_plan_1.jpg" alt="" class="img-circle thumb_visit">
                  </div>
                  <h4>Augue invidunt has</h4>
                  <p>
                    Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius diam vivendo ne.
                  </p>
                </div>
              </li>
              <li>
                <time class="cbp_tmtime" datetime="11:30"><span>2 hours</span><span>11:30</span>
                </time>
                <div class="cbp_tmicon">
                  2
                </div>
                <div class="cbp_tmlabel">
                  <div class="hidden-xs">
                    <img src="http://themetrademark.com/demo/bestours/wp-content/uploads/2017/03/tour_plan_1.jpg" alt="" class="img-circle thumb_visit">
                  </div>
                  <h4>An eirmod doctus admodum</h4>
                  <p>
                    Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius diam vivendo ne.
                  </p>
                </div>
              </li>
              <li>
                <time class="cbp_tmtime" datetime="13:30"><span>1 hour</span><span>13:30</span>
                </time>
                <div class="cbp_tmicon">
                  3
                </div>
                <div class="cbp_tmlabel">
                  <div class="hidden-xs">
                    <img src="http://themetrademark.com/demo/bestours/wp-content/uploads/2017/03/tour_plan_1.jpg" alt="" class="img-circle thumb_visit">
                  </div>
                  <h4>Eos aeque fuisset</h4>
                  <p>
                    Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius diam vivendo ne.
                  </p>
                </div>
              </li>
              <li>
                <time class="cbp_tmtime" datetime="14:30"><span>2 hours</span><span>14:30</span>
                </time>
                <div class="cbp_tmicon">
                  4
                </div>
                <div class="cbp_tmlabel">
                  <div class="hidden-xs">
                    <img src="http://themetrademark.com/demo/bestours/wp-content/uploads/2017/03/tour_plan_1.jpg" alt="" class="img-circle thumb_visit">
                  </div>
                  <h4>No affert timeam mea</h4>
                  <p>
                    Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius diam vivendo ne.
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box_style_1">
            <div class="price">
              <strong>$630</strong><small>por persona</small>
            </div>
            <ul class="list_ok">
              <li>Item 1</li>
              <li>Item 2</li>
              <li>Item 3</li>
              <li>Item 4</li>
            </ul>
            <small>*Precio sujeto a cambio.</small>
          </div>
          <div class="box_style_2">
            <h3>Reservalo ahora!<span>Por favor completa el siguiente formulario.</span></h3>
            <div id="message-booking"></div>
            <form method="post" action="" id="check_avail" autocomplete="off">
              <input type="hidden" id="tour_name" name="tour_name" value="Berlin">              
              <div class="form-group">
                <label>Nombres y Apellidos</label>
                <input type="text" class="form-control" id="name_lastname_booking" name="name_lastname_booking" placeholder="Name and Lastname">
              </div>
              <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" id="email_booking" name="email_booking" placeholder="E-mail">
              </div>
              <div class="form-group">
                <label>Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
              </div>
              <div class="form-group">
                <label>Fecha de viaje</label>
                <input type="text" class="form-control" id="fecha_viaje" name="fecha_viaje" placeholder="Seleccionar Fecha">
              </div>
              <div class="form-group">
                <input type="submit" value="Reservar" class="btn_full" id="submit-reservar">
              </div>
            </form>
            <hr>
            <a href="#0" class="btn_outline"> or Contáctenos</a>
            <a href="tel://004542344599" id="phone_2"><i class="icon_set_1_icon-91"></i>004542344599</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php echo $links;?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- //section .wrapper