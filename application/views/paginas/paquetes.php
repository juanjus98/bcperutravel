<?php
/*echo "<pre>";
print_r($dias);
echo "</pre>";*/
?>
<!--Cabecera-->
<div class="container-cabecera" style="background: url('assets/images/slide-5.jpg') fixed no-repeat">

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
        <div class="col-md-3">
          <?php $this->load->view('paginas/iside');?>
        </div>

        <div class="col-md-9">
          <div class="cont-titulos">
            <h1 class="titulo_opciones">Paquetes encontrados. <span><?php echo $retVal = (!empty($total_paquetes)) ? $total_paquetes : '' ; ?></span></h1>
          </div>
          <div class="cont-thumbnails">
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

                $nombre_paquete = trim($paquete['nombre_largo']);
                $url_paquete = base_url('paquete-tour/' . $paquete['url_key']);
                $urlImagen = (!empty($paquete['imagen_2'])) ? base_url($this->config->item('upload_path') . $paquete['imagen_2']) : base_url('assets/images/no-image.jpg') ;
                ?>
                <div class="listado-item">
                  <div class="row">
                    <div class="col-sm-12 col-md-4">
                      <figure>
                        <a href="<?php echo $url_paquete;?>" title="<?php echo $nombre_paquete;?>" class="titulo-imagen">
                          <img src="<?php echo $urlImagen;?>" class="img-responsive img-item" alt="<?php echo $nombre_paquete;?>">
                        </a>
                      </figure>
                    </div>
                    <div class="col-sm-12 col-md-5">
                      <h4 class="titulo-item">
                        <a href="<?php echo $url_paquete;?>" title="<?php echo $nombre_paquete;?>">
                          <?php echo $nombre_paquete;?>
                        </a>
                      </h4>
                      <p><?php echo $paquete['resumen'];?></p>
                      <span class="info">
                        info
                      </span>
                    </div>
                    <div class="col-sm-12 col-md-3">
                      Botones y precio
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
    </div>
  </div>

</section>
<!-- //section .wrapper