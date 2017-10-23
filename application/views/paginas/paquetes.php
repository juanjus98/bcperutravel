<?php
/*echo "<pre>";
print_r($dias);
echo "</pre>";*/
?>
<!--Cabecera-->
<div class="container-cabecera" style="background-image: url('assets/images/slide-4.jpg')">

  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="cont-titulos">
          <h1>Disfruta de una experiencia perfecta</h1>
          <p>Encuentra los mejores tours al mejor precio.</p>
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
        <?php
        if(!empty($paquetes)) {
          foreach ($paquetes as $key => $paquete) {
                /*echo "<pre>";
                print_r($paquete);
                echo "</pre>";*/
                //Consultar itinerario
                $data_post = array('id_tblpaquete' => $paquete['id']);
                /*$total_itinerario = $this->Paquetes_galeria->total_registros($data_post);*/
                /*$itinerarios = $this->Paquetes_galeria->listado($total_itinerario, 0, $data_post);*/

                $nombre_paquete = trim($paquete['nombre_corto']);
                $url_paquete = base_url('paquete-tour/' . $paquete['url_key']);
                $urlImagen = (!empty($paquete['imagen_2'])) ? base_url($this->config->item('upload_path') . $paquete['imagen_2']) : base_url('assets/images/no-image.jpg') ;
                ?>

                <div class="col-sm-12 col-md-4">
                  <div class="thumbnail thumbnail-item">
                    <div class="discount">25%</div>
                    <figure>
                      <a href="<?php echo $url_paquete;?>">
                        <img src="<?php echo $urlImagen;?>" alt="<?php echo $nombre_paquete;?>">
                      </a>
                      <div class="tg-icons">
                        <span class="badge" data-toggle="tooltip" title="Título"><i class="fa fa-plane" aria-hidden="true"></i></span>
                        <span class="badge"  data-toggle="tooltip" title="Título"><i class="fa fa-car" aria-hidden="true"></i></span>
                      </div>
                    </figure>
                    <div class="caption">
                      <h3><a href="#"><?php echo $nombre_paquete;?></a></h3>
                      <h4>
                        <i class="fa fa-calendar" aria-hidden="true"></i>4 días.
                        &nbsp;&nbsp;&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i>Lima
                      </h4>
                      <p><?php echo $paquete['resumen'];?></p>
                    </div>
                    <div class="btn-group btn-group-justified" role="group">
                      <?php
                      $precio_moneda = ($paquete['precio_moneda'] == 1) ? '$' : 'S/' ;
                      $precio = (!empty($paquete['precio'])) ? $paquete['precio'] : '' ;
                      ?>
                      <a href="javascript:;" class="btn btn-precio" role="button"><small><?php echo $precio_moneda;?></small> <?php echo $precio;?></a>
                      <a href="#" class="btn btn-detalles" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Detalles</a>
                    </div>
                  </div>
                </div>
                <?php 
              }
            }
            ?>
          </div>
        </div>
      </div>

    </section>
<!-- //section .wrapper