<?php
/*$incluye_list = $this->paquete_incluye_list;*/
$categoria_id = $producto['categoria_id'];
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
$paquete_incluye = explode(',', $producto['paquete_incluye']);
$paquete_meses = $producto['paquete_meses'];
$paquete_noches = $producto['paquete_noches'];
$categoria_nombre = $producto['categoria_nombre'];
$categoria_key = $producto['categoria_key'];

$wbox_blq = $producto['wbox_blq'];
array_shift($wbox_blq);

$especificaciones = $producto['especificaciones'];
//Imagen cabecera
$imgCabecera = (!empty($imagen_1)) ? base_url($this->config->item('upload_path') . $imagen_1) : base_url('assets/images/no-image.jpg') ;
//Imagen principal
$urlImagen = (!empty($imagen_2)) ? base_url($this->config->item('upload_path') . $imagen_2) : base_url('assets/images/no-image.jpg') ;

//Precio
$monedas = array(1 => '$', 2 => 'S/' );
$str_precio = $monedas[$precio_moneda] . $precio;

//Paquete incluye
$paquete_incluye_list = $this->paquete_incluye_list;

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
      /*echo "<pre>";
      print_r($itinerario);
      echo "</pre>";*/

      /*echo "<pre>";
      print_r($paquete_incluye);
      echo "</pre>";*/
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
              <?php
              if(!empty($wbox_blq)){
                /*echo "<pre>";
                print_r($wbox_blq);
                echo "</pre>";*/
                foreach ($wbox_blq as $key => $value) {
                  $descripciones = $value['descripciones'];
                  array_shift($descripciones);
                  ?>
                  <div class="col-md-6">
                    <div class="feature-box">
                      <div class="feature-box-icon">
                        <i class="fa fa-check" aria-hidden="true"></i>
                      </div>
                      <div class="feature-box-info">
                        <h4><?php echo $value['titulo'];?></h4>
                        <?php
                        if (!empty($descripciones)) {
                          foreach ($descripciones as $key => $item) {
                            echo '<p>- '.$item.'</p>';
                          }
                        }
                        ?>
                        <p>
                          Lorem ipsum dolor sit amet, ei per elitr persecuti adipiscing, ne discere temporibus nam.
                        </p>
                      </div>
                    </div>
                  </div>
                  <?php
                } 
              }
              ?>
            </div>
          </div>

          <?php
            //Itinerario
            $data_itinerario['producto_id'] = $producto['id'];
            $total_registros = $this->Productos_itinerario->total_registros($data_itinerario);
            $itinerario = $this->Productos_itinerario->listado($total_registros, 0, $data_itinerario);
            /*echo "<pre>";
            print_r($itinerario);
            echo "</pre>";*/
            if(!empty($itinerario)){
              $i=1;
          ?>
          <hr>
          <div class="cont-itinerario">
            <h3>Itinerario</h3>
            <ul class="cbp_tmtimeline">
              <?php
              foreach ($itinerario as $key => $value) {
                /*echo "<pre>";
            print_r($value);
            echo "</pre>";*/
              ?>
              <li>
                <time class="cbp_tmtime"><span>Lunes 30</span><span><?php echo $value['fecha'];?></span>
                </time>
                <div class="cbp_tmicon"><?php echo $i++;?></div>
                <div class="cbp_tmlabel">
                  <!-- <div class="hidden-xs">
                    <img src="http://themetrademark.com/demo/bestours/wp-content/uploads/2017/03/tour_plan_1.jpg" alt="" class="img-circle thumb_visit">
                  </div> -->
                  <h4><?php echo $value['titulo'];?></h4>
                  <p>
                    <?php echo str_replace("\n", "<br>", $value['descripcion']);?>
                  </p>
                </div>
              </li>
              <?php
              }
              ?>
            </ul>
          </div>
          <?php 
        }
          ?>
          <!-- //Itinerario-->
        </div>
        <div class="col-md-4">
          <div class="box_style_1">
            <div class="price">
              <strong><?php echo $str_precio;?></strong><small class="clearfix">por persona</small>
            </div>
            <ul class="list_ok">
              <?php
              if ($categoria_id == 6) {
                if (!empty($paquete_incluye)) {
                  foreach ($paquete_incluye as $key => $value) {
                    $incluye = $paquete_incluye_list[$value];
                    echo '<li>'.$incluye['title'].'</li>';
                  }
                }
              }
              ?>
            </ul>
            <small>*Precio sujeto a cambio.</small>
          </div>
          <div class="box_style_2">
            <h3>Reservalo ahora!<span>Por favor completa el siguiente formulario.</span></h3>
            <div id="message-booking"></div>
            <!-- <form method="post" action="" id="check_avail" autocomplete="off"  data-toggle="validator"> -->
            <form class="form-vertical" name="form-reservar" id="form-reservar" action="" method="post" data-toggle="validator">
              <input type="hidden" id="url_key" name="url_key" value="<?php echo $url_key;?>">
              <div class="form-group">
                <label>Nombres y Apellidos</label>
                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres y apellidos" required>
              </div>
              <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" data-error="E-mail inválido." required>
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label>Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
              </div>
              <div class="form-group">
                <label>Fecha de viaje</label>
                <input type="text" class="form-control datepicker" id="fecha_viaje" name="fecha_viaje" placeholder="Seleccionar Fecha">
              </div>
              <div class="form-group">
                <input type="submit" value="Reservar" class="btn_full" id="submit-reservar">
              </div>
            </form>
            <hr>
            <a href="#0" class="btn_outline"> o Contáctenos</a>
            <a href="tel://004542344599" id="phone_2"><i class="fa fa-phone" aria-hidden="true"></i> 004542344599</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- //section .wrapper