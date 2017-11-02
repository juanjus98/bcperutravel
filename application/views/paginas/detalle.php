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
      /*echo "<pre>";
      print_r($producto);
      echo "</pre>";*/
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

        </div>

        <div class="col-md-4">
          FORM
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