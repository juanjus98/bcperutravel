<?php
$incluye_list = $this->paquete_incluye_list;

/*echo "<pre>";
print_r($categoria);
echo "</pre>";*/
//Background header
$upload_path = $this->upload_path;
$categoria_imagen = ($categoria['imagen'] != 'no-imagen.jpg') ? $upload_path . $categoria['imagen'] : 'assets/images/slide-4.jpg' ;
?>
<!--Cabecera-->
<div class="container-cabecera" style="background-image: url('<?php echo base_url($categoria_imagen);?>')">

  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="cont-titulos">
          <h1><?php echo $categoria['nombre'];?></h1>
          <p><?php echo $subtitulo;?></p>
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

      <div class="row">
        <div class="col-md-3">
          <div class="cont-sidebar">
          <h4>Ciudades</h4>
          <nav class="nav-sidebar">
            <ul class="nav">
              <?php
              if (!empty($ciudades)) {
                foreach ($ciudades as $key => $value) {
                  $city_id = $value['id'];
                  $city = url_title(convert_accented_characters($value['city']),'-', TRUE);
                  $url_key = base_url('p/'. $city_id . '-' . $city);
                  echo '<li><a href="' . $url_key . '">'.$value['city'].' ('.$value['n_productos'].')</a></li>';
                }
              }
              ?>
            </ul>
          </nav>
        </div>
        </div>
        <div class="col-md-9">
          <?php
          if(!empty($listado)) {
            foreach ($listado as $key => $item) {
              $nombreItem = trim($item['nombre_corto']);
              /*$urlLink = base_url($categoria['url_key'] . '/' . $item['url_key']);*/
              $urlLink = base_url('s/' . $item['url_key']);

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

              <div class="col-sm-12 col-md-6">
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
                  </div>
                  <?php 
                }
              }
              ?>

              <div class="row">
            <div class="col-md-12">
              <div class="pull-right">
              <?php echo $links;?>
              </div>
            </div>
          </div>
            </div>

          </div>

        </div>
      </div>

    </section>
<!-- //section .wrapper