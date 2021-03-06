<?php
/*echo '<pre>';
print_r($post);
echo '</pre>';*/
?>
<div class="row">
 <div class="col-xs-12">
   <div class="box">
     <form class="form-horizontal" name="edit_form" id="edit_form" action="<?php echo $current_url;?>" method="post" role="form" enctype="multipart/form-data">

       <?php if($wa_tipo == 'E'){ ?> <input type="hidden" name="id" value="<?php echo $post['id'];?>"><?php }?>

       <div class="box-header" style="padding-bottom: 0;">
         <h3 class="box-title"><?php echo $tipo; ?></h3>
         <div class="box-tools">
           <div class="pull-right">
             <?php
             if($wa_tipo == 'C' || $wa_tipo == 'E'){
               ?>
               <button class="btn btn-success btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
               <?php
             }
             if($wa_tipo == 'V'){
               ?>
               <a class="btn btn-success btn-sm" title="Editar registro" href="<?php echo $edit_url;?>"><i class="fa fa-pencil" aria-hidden="true"></i> Editar </a>

               <?php }?>

               <a href="<?php echo $back_url;?>" class="btn btn-default btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Cancelar </a>
             </div>
           </div> 
         </div>

         <div class="box-body">
           <div class="row pad" style="padding: 0px;">
             <fieldset <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>>
               <div class="col-sm-12">

                 <table class="table table-bordered">
                   <thead class="thead-default">
                     <tr>
                       <th colspan="4"><i class="fa fa-list"></i> Información</th>
                     </tr>
                   </thead>
                   <tbody>
                    <tr>
                     <td>
                       <div class="form-group" style="margin-bottom: 0px;">
                         <label for="codigo" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Código:</label>
                         <div class="col-sm-4">
                           <input name="codigo" id="codigo" type="text" value="<?php echo $retVal = (!empty($post['codigo'])) ? $post['codigo'] : '';?>" class="form-control input-sm" placeholder="Automático" disabled>
                           <?php echo form_error('codigo', '<div class="error">', '</div>'); ?>
                         </div>
                       </div>
                     </td>
                   </tr>

                   <tr>
                     <td>
                       <div class="form-group" style="margin-bottom: 0px;">
                         <label for="nombre_corto" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Nombre Corto:</label>
                         <div class="col-sm-4">
                           <input name="nombre_corto" id="nombre_corto" type="text" value="<?php echo $retVal = (!empty($post['nombre_corto'])) ? $post['nombre_corto'] : '';?>" class="form-control input-sm" <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>>
                           <?php echo form_error('nombre_corto', '<div class="error">', '</div>'); ?>
                         </div>
                         <label for="nombre_largo" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Nombre largo:</label>
                         <div class="col-sm-4">
                           <input name="nombre_largo" id="nombre_largo" type="text" value="<?php echo $retVal = (!empty($post['nombre_largo'])) ? $post['nombre_largo'] : '';?>" class="form-control input-sm" <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>>
                           <?php echo form_error('nombre_largo', '<div class="error">', '</div>'); ?>
                         </div>
                       </div>
                     </td>
                   </tr>

                   <tr>
                     <td>
                       <div class="form-group" style="margin-bottom: 0px;">
                         <label for="categoria_id" class="col-sm-2 control-label" style="text-align: right;">
                           <span style="color: red; font-weight: bold;">*</span>Categoría:
                         </label>
                         <div class="col-sm-4">
                          <select name="categoria_id" id="categoria_id" class="form-control input-sm categoria_muestra_oculta">
                            <option value=""></option>
                            <?php
                            if(!empty($categorias)){
                              foreach ($categorias as $key => $value) {
                                $selected_categoria = ($value['id'] == $post['categoria_id']) ? 'selected' : '' ;
                                echo '<option value="'.$value['id'].'" ' . $selected_categoria . '>'.$value['nombre'].'</option>';
                              }
                            }
                            ?>
                          </select>
                          <?php echo form_error('categoria_id', '<div class="error">', '</div>'); ?>
                        </div>
                        <label for="url_key" class="col-sm-2 control-label" style="text-align: right;"> Slug:</label>
                        <div class="col-sm-4">
                         <input type="hidden" name="url_key_pre" value="<?php echo $retVal = (!empty($post['url_key'])) ? $post['url_key'] : '' ; ?>">
                         <input name="url_key" id="url_key" type="text" value="<?php echo $retVal = (!empty($post['url_key'])) ? $post['url_key'] : '' ; ?>" class="form-control input-sm" placeholder="Automático" disabled>
                       </div>
                     </div>
                   </td>
                 </tr>

                 <tr>
                   <td>
                     <div class="form-group" style="margin-bottom: 0px;">
                       <label for="resumen" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Resumen:</label>
                       <div class="col-sm-10">
                         <textarea name="resumen" id="resumen" class="form-control" rows="3" <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>><?php echo $retVal = (!empty($post['resumen'])) ? $post['resumen'] : '' ; ?></textarea>
                         <?php echo form_error('resumen', '<div class="error">', '</div>'); ?>
                       </div>
                     </div>
                   </td>
                 </tr>

                   <tr>
                     <td>
                       <div class="form-group" style="margin-bottom: 0px;">
                         <label for="orden" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Orden:</label>
                         <div class="col-sm-4">
                           <input name="orden" id="orden" type="text" value="<?php echo $retVal = (!empty($post['orden'])) ? $post['orden'] : '99';?>" class="form-control input-sm" <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>>
                           <?php echo form_error('orden', '<div class="error">', '</div>'); ?>
                         </div>

                         <label for="destacar" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Destacar:</label>
                         <div class="col-sm-4">
                           <?php
                           $checked = (!empty($post['destacar']) && $post['destacar'] == 1) ? 'checked' : '' ;
                           ?>
                           <input type="checkbox" name="destacar" id="destacar" value="1" <?php echo $checked; ?> <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>> <b>Mostrar en la página principal.</b>
                           <?php echo form_error('destacar', '<div class="error">', '</div>'); ?>
                         </div>
                       </td>
                     </tr>

                     <tr>
                     <td>
                       <div class="form-group" style="margin-bottom: 0px;">
                         <label for="publicar" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Publicar:</label>
                         <div class="col-sm-4">
                           <?php
                           $checked = (!empty($post['publicar']) && $post['publicar'] == 1) ? 'checked' : '' ;
                           ?>
                           <input type="checkbox" name="publicar" id="publicar" value="1" <?php echo $checked; ?> <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>> <b>Publicar en la página.</b>
                           <?php echo form_error('publicar', '<div class="error">', '</div>'); ?>
                         </div>
                       </td>
                     </tr>

                     <tr>
                       <td colspan="4" style="vertical-align: middle;">
                         <div class="form-group" style="margin-bottom: 0px;">
                           <label for="keywords" class="col-sm-2 control-label" style="text-align: right;">Keywords:</label>
                           <div class="col-sm-10">
                             <input type="text" name="keywords" id="keywords" data-role="tagsinput" value="<?php echo $retVal = (!empty($post['keywords'])) ? $post['keywords'] : '' ; ?>" <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>>
                           </div>
                         </div>
                       </td>
                     </tr>

                   </tbody>
                 </table><br>

                 <table class="table table-bordered">
                <thead class="thead-default">
                 <tr>
                   <th>
                     <i class="fa fa-money"></i> Precios.
                   </th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <td>
                     <div class="form-group" style="margin-bottom: 0px;">
                       <label for="precio_moneda" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Moneda:</label>
                       <div class="col-sm-4">
                         <select name="precio_moneda" id="precio_moneda" class="form-control input-sm">
                           <?php
                           $precio_monedas = array(1 => '$USD', 2=> 'S/.' );
                           foreach ($precio_monedas as $key => $value) {
                            $selected_moneda = ($key == $post['precio_moneda']) ? 'selected' : '' ;
                             echo '<option value="'.$key.'" '.$selected_moneda.'>'.$value.'</option>';
                           }
                           ?>
                         </select>
                         <?php echo form_error('precio_moneda', '<div class="error">', '</div>'); ?>
                       </div>

                       <label for="precio" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Precio:</label>
                       <div class="col-sm-4">
                         <input name="precio" id="precio" type="text" value="<?php echo $retVal = (!empty($post['precio'])) ? $post['precio'] : '';?>" class="form-control input-sm" <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>>
                         <?php echo form_error('precio', '<div class="error">', '</div>'); ?>
                       </div>
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <div class="form-group" style="margin-bottom: 0px;">
                         <label for="precio_descuento" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Descuento:</label>
                         <div class="col-sm-4">
                           <input name="precio_descuento" id="precio_descuento" type="text" value="<?php echo $retVal = (!empty($post['precio_descuento'])) ? $post['precio_descuento'] : '';?>" class="form-control input-sm" placeholder="50%" <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>>
                           <?php echo form_error('precio_descuento', '<div class="error">', '</div>'); ?>
                         </div>

                         <label for="mostrar_descuento" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Mostrar descuento:</label>
                         <div class="col-sm-4">
                           <?php
                           $checked = (!empty($post['mostrar_descuento']) && $post['mostrar_descuento'] == 1) ? 'checked' : '' ;
                           ?>
                           <input type="checkbox" name="mostrar_descuento" id="mostrar_descuento" value="1" <?php echo $checked; ?> <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>> <b>Mostrar descuento.</b>
                           <?php echo form_error('mostrar_descuento', '<div class="error">', '</div>'); ?>
                         </div>
                       </td>
                     </tr>
                </tbody>
              </table><br>

                 <table class="table table-bordered">
                  <thead class="thead-default">
                   <tr>
                     <th><i class="fa fa-list"></i> Descripción</th>
                   </tr>
                 </thead>
                 <tbody>
                   <tr>
                     <td>
                       <div class="form-group" style="margin-bottom: 0px;">
                         <div class="col-sm-12">
                          <?php echo form_error('descripcion', '<div class="error">', '</div>'); ?>
                          <?php
                          $descripcion = (!empty($post['descripcion'])) ? $post['descripcion'] : '' ;
                          echo $this->ckeditor->editor('descripcion', $descripcion);
                          ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table><br>
              <table class="table table-bordered table-mostrar-ocultar" id="table-mostrar-6" style="<?php echo $retVal = ($post['categoria_id'] != 6) ? 'display: none;' : '';?>">
                <thead class="thead-default">
                 <tr>
                   <th>
                     <i class="fa fa-plus"></i> Iformación de Paquetes Turísticos.
                   </th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <td>
                     <div class="form-group" style="margin-bottom: 0px;">
                       <label for="orden" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Ámbito:</label>
                       <div class="col-sm-4">
                         <select name="ambito" id="ambito" class="form-control">
                          <option value="">Seleccionar</option>
                          <?php
                          $ambitos = array(
                            'INTL' => 'Internacional', 
                            'NAL' => 'Nacional', 
                          );
                          if(!empty($ambitos)){
                            foreach ($ambitos as $key => $value) {
                              $selected_ambito = ($key == $post['ambito']) ? 'selected' : '' ;
                              echo '<option value="'.$key.'" ' . $selected_ambito . '>'.$value.'</option>';
                            }
                          }
                          ?>
                        </select>
                        <?php echo form_error('ambito', '<div class="error">', '</div>'); ?>
                      </div>

                      <label for="paquete_ciudad" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Ciudad:</label>
                       <div class="col-sm-4">
                         <select name="paquete_ciudad" id="paquete_ciudad" data-placeholder="Seleccionar ciudad" class="chosen-select">
                          <option value=""></option>
                          <?php
                          if(!empty($ciudades)){
/*                            $post_ciudades = $post['ciudades'];
                            $post_ciudades = (is_array($post_ciudades)) ? $post_ciudades : explode(',', $post['ciudades']) ;*/
                            foreach ($ciudades as $key => $value) {
                              $selected_ciudad = ($post['paquete_ciudad'] == $value['id']) ? 'selected' : '' ;
                              $location_name = $value['city'] . ', ' . $value['country'];
                              echo '<option value="'.$value['id'].'" ' . $selected_ciudad . '>'.$location_name.'</option>';
                            }
                          }
                          ?>
                        </select>
                        <?php echo form_error('ciudades[]', '<div class="error">', '</div>'); ?>
                      </div>
                    </td>
                  </tr>


                  <tr>
                   <td>
                     <div class="form-group" style="margin-bottom: 0px;">
                       <label for="paquete_incluye" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Incluye:</label>
                       <div class="col-sm-10">
                         <?php 
                         $paquete_incluye_list = $this->paquete_incluye_list;
                         if (!empty($paquete_incluye_list)) {
                            $post_paquete_incluye = $post['paquete_incluye'];
                            $post_paquete_incluye = (is_array($post_paquete_incluye)) ? $post_paquete_incluye : explode(',', $post['paquete_incluye']) ;
                           foreach ($paquete_incluye_list as $key => $value) {
                            $checked = (in_array($key, $post_paquete_incluye)) ? 'checked' : '' ;
                             ?>
                             <input type="checkbox" name="paquete_incluye[]" id="paquete_incluye" value="<?php echo $key; ?>" <?php echo $checked; ?> <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>> <b style="margin-right: 15px;"><?php echo $value;?></b>
                           <?php echo form_error('paquete_incluye[]', '<div class="error">', '</div>'); ?>
                             <?php
                           }
                         }
                         ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                   <td>
                     <div class="form-group" style="margin-bottom: 0px;">
                       <label for="paquete_meses" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Meses de salida:</label>
                       <div class="col-sm-10">
                         <?php 
                         $meses = $this->listado_meses;
                         if (!empty($meses)) {
                            $post_paquete_meses = $post['paquete_meses'];
                            $post_paquete_meses = (is_array($post_paquete_meses)) ? $post_paquete_meses : explode(',', $post['paquete_meses']) ;
                           foreach ($meses as $key => $value) {
                            $checked = (in_array($key, $post_paquete_meses)) ? 'checked' : '' ;
                             ?>
                             <input type="checkbox" name="paquete_meses[]" id="paquete_meses" value="<?php echo $key; ?>" <?php echo $checked; ?> <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>> <b style="margin-right: 15px;"><?php echo $value;?></b>
                           <?php echo form_error('paquete_meses[]', '<div class="error">', '</div>'); ?>
                             <?php
                           }
                         }
                         ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                     <td>
                       <div class="form-group" style="margin-bottom: 0px;">
                         <label for="paquete_noches" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>N° Noches:</label>
                         <div class="col-sm-4">
                           <input name="paquete_noches" id="paquete_noches" type="text" value="<?php echo $retVal = (!empty($post['paquete_noches'])) ? $post['paquete_noches'] : '';?>" class="form-control input-sm" placeholder="3" <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>>
                           <?php echo form_error('paquete_noches', '<div class="error">', '</div>'); ?>
                         </div>
                       </td>
                     </tr>

                </tbody>
              </table><br>
              <table class="table table-bordered table-mostrar-ocultar" id="table-mostrar-1" style="<?php echo $retVal = ($post['categoria_id'] != 1 && $post['categoria_id'] != 2) ? 'display: none;' : '' ;?>">
                <thead class="thead-default">
                 <tr>
                   <th>
                     <i class="fa fa-plus"></i> Iformación de Tickets.
                   </th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <td>
                     <div class="form-group" id="jq-dynamic-select" style="margin-bottom: 0px;">
                      <label for="tipo_transporte" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Tipo transporte:</label>
                         <div class="col-sm-4">
                           <select name="tipo_transporte" id="tipo_transporte" class="form-control" <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>>
                            <option value="">Seleccionar</option>
                             <?php
                             $transportes = $this->tipos_transporte;
                             if (!empty($transportes)) {
                               foreach ($transportes as $key => $value) {
                                $selected_transporte = ($key == $post['tipo_transporte']) ? 'selected' : '' ;
                                 echo '<option value="'.$key.'" '.$selected_transporte.'>'.$value.'</option>';
                               }
                             }
                             ?>
                           </select>
                           <?php echo form_error('tipo_transporte', '<div class="error">', '</div>'); ?>
                         </div>

                       <label for="orden" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Empresa transporte:</label>
                       <div class="col-sm-4">
                         <select name="transporte_id" id="transporte_id" class="form-control" <?php echo $retVal = (empty($post['tipo_transporte'])) ? 'disabled' : '' ; ?>>
                          <option value="">Seleccionar</option>
                          <?php
                          if(!empty($post['tipo_transporte'])){
                            if(!empty($empresas_transporte)){
                              foreach ($empresas_transporte as $key => $value) {
                                $selected_empresa = ($value['id'] == $post['transporte_id']) ? 'selected' : '' ;
                                echo '<option value="'.$value['id'].'" ' . $selected_empresa . '>'.$value['nombre'].'</option>';
                              }
                            }
                          }
                          ?>
                        </select>
                        <?php echo form_error('transporte_id', '<div class="error">', '</div>'); ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                   <td>
                     <div class="form-group" style="margin-bottom: 0px;">
                       <label for="ciudad_origen" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Ciudad Origen:</label>
                       <div class="col-sm-4">
                         <select name="ciudad_origen" id="ciudad_origen" data-placeholder="Seleccionar ciudad" class="chosen-select">
                          <option value=""></option>
                          <?php
                          if(!empty($ciudades)){
                            foreach ($ciudades as $key => $value) {
                              $selected_ciudad = ($post['ciudad_origen'] == $value['id']) ? 'selected' : '' ;
                              $location_name = $value['city'] . ', ' . $value['country'];
                              echo '<option value="'.$value['id'].'" ' . $selected_ciudad . '>'.$location_name.'</option>';
                            }
                          }
                          ?>
                        </select>
                        <?php echo form_error('ciudad_origen', '<div class="error">', '</div>'); ?>
                      </div>

                      <label for="ciudad_destino" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Ciudad Destino:</label>
                       <div class="col-sm-4">
                         <select name="ciudad_destino" id="ciudad_destino" data-placeholder="Seleccionar ciudad" class="chosen-select">
                          <option value=""></option>
                          <?php
                          if(!empty($ciudades)){
                            foreach ($ciudades as $key => $value) {
                              $selected_ciudad = ($post['ciudad_destino'] == $value['id']) ? 'selected' : '' ;
                              $location_name = $value['city'] . ', ' . $value['country'];
                              echo '<option value="'.$value['id'].'" ' . $selected_ciudad . '>'.$location_name.'</option>';
                            }
                          }
                          ?>
                        </select>
                        <?php echo form_error('ciudad_destino', '<div class="error">', '</div>'); ?>
                      </div>
                    </td>
                  </tr>

                  <tr>
                   <td>
                     <div class="form-group" style="margin-bottom: 0px;">
                       <label for="tipo_ticket" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span>Tipo de ticket:</label>
                       <div class="col-sm-4">
                         <select name="tipo_ticket" id="tipo_ticket" data-placeholder="Seleccionar ciudad" class="form-control">
                          <!-- <option value=""></option> -->
                          <?php
                          $tipos_ticket = $this->tipos_ticket;
                          if(!empty($tipos_ticket)){
                            foreach ($tipos_ticket as $key => $value) {
                              $selected_tipo_ticket = ($post['tipo_ticket'] == $key) ? 'selected' : '' ;
                              echo '<option value="'.$key.'" ' . $selected_tipo_ticket . '>'.$value.'</option>';
                            }
                          }
                          ?>
                        </select>
                        <?php echo form_error('tipo_ticket', '<div class="error">', '</div>'); ?>
                      </div>
                    </td>
                  </tr>

                </tbody>
              </table><br>

              <table class="table table-bordered">
                <thead class="thead-default">
                 <tr>
                   <th>
                     <i class="fa fa-list"></i> Bloques y detalles.
                     <span class="pull-right">
                      <a href="#" class="btn btn-info btn-xs" id="btn-add-box">
                        <i class="fa fa-plus"></i> Agregar bloque.
                      </a>
                    </span>
                  </th>
                </tr>
              </thead>
              <tbody>
               <tr>
                 <td id="wbox-content">
                   <div class="box box-primary wbox-blq" id="wbox-template" style="display: none;">
                    <div class="box-header">
                      <h3 class="box-title">
                        Titulo de bloque
                      </h3>
                      <div class="box-tools pull-right">
                        <a href="#" class="btn btn-info btn-xs btn-wbox-edit"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-xs wbox-delete"><i class="fa fa-times"></i></a>
                      </div>
                      <input type="hidden" name="wbox_blq[1][id]" value="1" class="wbox-id">
                      <input type="hidden" name="wbox_blq[1][titulo]" value="Box 1" class="wbox-title">
                    </div>
                    <div class="box-body wbox-contitems">
                      <div class="input-group input-group-sm winput-group witem-template" style="margin-bottom: 6px; display: none;">
                        <input type="text" name="wbox_blq[1][descripciones][]" value="" class="form-control wbox-item" placeholder="Descripción aquí.">
                        <span class="input-group-btn">
                          <button class="btn btn-danger btn-flat btn-remove-wbox-item" type="button"><i class="fa fa-times"></i></button>
                        </span>
                      </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix no-border">
                      <a href="#" class="btn btn-default pull-right btn-add-item"><i class="fa fa-plus"></i> Add item</a>
                    </div>
                  </div>
                  <div class="text-center"><small>BLOQUES AQUÍ</small></div>
                  <?php 
                  if(count($post['wbox_blq']) > 1){
                    foreach ($post['wbox_blq'] as $key => $wbox_blq) {
                      if($key != 1){
                        /*echo "<pre>";
                        print_r($wbox_blq);
                        echo "</pre>";*/
                        $wbox_id = $wbox_blq['id'];
                        $wbox_titulo = $wbox_blq['titulo'];
                    ?>
                    <div class="box box-primary wbox-blq" id="wbox-<?php echo $wbox_id;?>">
                    <div class="box-header">
                      <h3 class="box-title"><?php echo $wbox_titulo;?></h3>
                      <div class="box-tools pull-right">
                        <a href="#" class="btn btn-info btn-xs btn-wbox-edit"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-xs wbox-delete"><i class="fa fa-times"></i></a>
                      </div>
                      <input type="hidden" name="wbox_blq[<?php echo $wbox_id;?>][id]" value="<?php echo $wbox_id;?>" class="wbox-id">
                      <input type="hidden" name="wbox_blq[<?php echo $wbox_id;?>][titulo]" value="<?php echo $wbox_titulo;?>" class="wbox-title">
                    </div>
                    <div class="box-body wbox-contitems">
                      <div class="input-group input-group-sm winput-group witem-template" style="margin-bottom: 6px; display: none;">
                        <input type="text" name="wbox_blq[<?php echo $wbox_id;?>][descripciones][]" value="" class="form-control wbox-item" placeholder="Descripción aquí.">
                        <span class="input-group-btn">
                          <button class="btn btn-danger btn-flat btn-remove-wbox-item" type="button"><i class="fa fa-times"></i></button>
                        </span>
                      </div>
                      <?php
                      $descripciones = $wbox_blq['descripciones'];
                      foreach ($descripciones as $key => $value) {
                        if ($key > 0) {
                          ?>
                          <div class="input-group input-group-sm winput-group" style="margin-bottom: 6px;">
                            <input type="text" name="wbox_blq[<?php echo $wbox_id;?>][descripciones][]" value="<?php echo $value;?>" class="form-control wbox-item" placeholder="Descripción aquí.">
                            <span class="input-group-btn">
                              <button class="btn btn-danger btn-flat btn-remove-wbox-item" type="button"><i class="fa fa-times"></i></button>
                            </span>
                          </div>
                          <?php
                        }
                      }
                      ?>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix no-border">
                      <a href="#" class="btn btn-default pull-right btn-add-item"><i class="fa fa-plus"></i> Add item</a>
                    </div>
                  </div>
                  <?php
                }
                }
                }
                 ?>
                </td>
              </tr>
            </tbody>
          </table><br>

          <table class="table table-bordered">
           <thead class="thead-default">
             <tr>
               <th colspan="4"><i class="fa fa-list"></i> Información imporante
                 <span class="pull-right">
                  <a href="#" class="btn btn-info btn-xs" id="btn-agregar-especificacion">
                    <i class="fa fa-plus"></i> Agregar.
                  </a>
                </span>
              </th>
            </tr>
          </thead>
          <tbody>
           <tr>
             <td>
               <div class="form-group" style="margin-bottom: 0px;">
                 <div class="col-sm-12">
                   <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Título</th>
                          <th>Descripción</th>
                          <th style="width: 60px;"></th>
                        </tr>
                      </thead>
                      <tbody id="items-especificaciones">
                        <?php
                        /*$especificaciones_titulo = $post['especificaciones']['titulo'];*/
                        $especificaciones_titulo = (!empty($post['especificaciones']['titulo'])) ? $post['especificaciones']['titulo'] : '' ;
                        /*$especificaciones_descripcion = $post['especificaciones']['descripcion'];*/
                        $especificaciones_descripcion = (!empty($post['especificaciones']['descripcion'])) ? $post['especificaciones']['descripcion'] : '' ;
                        if (!empty($especificaciones_titulo)) {
                          foreach ($especificaciones_titulo as $index => $titulo) {
                            ?>
                            <tr class="row-table-rm">
                              <td><input type="text" name="especificaciones[titulo][]" class="form-control input-sm" placeholder="Título" value="<?php echo $especificaciones_titulo[$index]; ?>"></td>
                              <td><input type="text" name="especificaciones[descripcion][]" class="form-control input-sm" placeholder="Descripción" value="<?php echo $especificaciones_descripcion[$index]; ?>"></td>
                              <td class="text-center">
                                <a href="#" class="btn btn-danger btn-xs btn-quitar-tr">Quitar <span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></a>
                              </td>
                            </tr>
                            <?php
                          }
                        } else {
                          ?>
                          <tr>
                            <td><input type="text" name="especificaciones[titulo][]" class="form-control input-sm" placeholder="Título"></td>
                            <td><input type="text" name="especificaciones[descripcion][]" class="form-control input-sm" placeholder="Descripción"></td>
                            <td>
                              <a href="#" class="btn btn-danger btn-xs btn-quitar-tr">Quitar <span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></a>
                            </td>
                          </tr>
                          <?php
                        }
                        ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table><br>

      <table class="table table-bordered">
       <thead class="thead-default">
         <tr>
           <th><i class="fa fa-list"></i> Imagen Slide</th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <td>
             <div class="form-group" style="margin-bottom: 0px;">
               <label for="imagen_1" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span> Imagen:</label>
               <div class="col-sm-10">
                <div class="alert alert-warning" role="alert">
                      Dimensiones: 1300px * 520px
                    </div>
                 <input type="file" name="imagen_1" id="imagen_1" <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>>
                 <?php
                 if(!empty($post['imagen_1'])){
                   ?>
                   <p class="help-block">
                     <a href="<?php echo base_url('assets/images/uploads/' . $post['imagen_1']);?>" class="strip" data-strip-caption="<?php echo $post['nombre_largo']; ?>">
                       <img src="<?php echo base_url('assets/images/uploads/' . $post['imagen_1']);?>" style="max-height: 60px;">
                     </a>
                   </p>
                   <?php }?>
                 </div>
               </div>
             </td>
           </tr>
         </tbody>
       </table><br>

       <table class="table table-bordered">
         <thead class="thead-default">
           <tr>
             <th><i class="fa fa-list"></i> Imagen Principal</th>
           </tr>
         </thead>
         <tbody>
           <tr>
             <td>
               <div class="form-group" style="margin-bottom: 0px;">
                 <label for="imagen_2" class="col-sm-2 control-label" style="text-align: right;"><span style="color: red; font-weight: bold;">*</span> Imagen:</label>
                 <div class="col-sm-10">
                    <div class="alert alert-warning" role="alert">
                      Dimensiones: 820px * 460px
                    </div>
                   <input type="file" name="imagen_2" id="imagen_2" <?php echo $retVal = ($wa_tipo == 'V') ? "disabled" : "";?>>
                   <?php
                   if(!empty($post['imagen_2'])){
                     ?>
                     <p class="help-block">
                       <a href="<?php echo base_url('assets/images/uploads/' . $post['imagen_2']);?>" class="strip" data-strip-caption="<?php echo $post['nombre_largo']; ?>">
                         <img src="<?php echo base_url('assets/images/uploads/' . $post['imagen_2']);?>" style="max-height: 60px;">
                       </a>
                     </p>
                     <?php }?>
                   </div>
                 </div>
               </td>
             </tr>
           </tbody>
         </table><br>
         
       </div>
     </fieldset >
   </div><!--end pad-->
 </div>

 <div class="box-header">
   <div class="row pad" style="padding-top: 0px; padding-bottom: 0px;">
     <div class="col-sm-6">

       <p><span style="color: red; font-weight: bold;"><strong>(*)</strong> Campos obligatorios.</span></p>

     </div>
     <div class="col-sm-6">

       <div class="pull-right">
         <?php
         if($wa_tipo == 'C' || $wa_tipo == 'E'){
           ?>
           <button class="btn btn-success btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
           <?php
         }
         if($wa_tipo == 'V'){
           ?>
           <a class="btn btn-success btn-sm" title="Editar registro" href="#"><i class="fa fa-pencil" aria-hidden="true"></i> Editar </a>

           <?php }?>

           <a href="<?php echo $back_url;?>" class="btn btn-default btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Cancelar </a>
         </div>

       </div>

     </div>
   </div>

 </form>

</div>
</div>
</div>

<!--Modal agregar nuevo bloque-->
<div class="modal fade" id="addBoxModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form name="form-add-bloque" id="form-add-bloque" method="post" action="" data-idtemplate="wbox-template" data-idcontent="wbox-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Agregar bloque.</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Título:</label>
            <input type="text" class="form-control" name="box-title" id="box-title" placeholder="Título">
            <input type="hidden" name="box-idedit" id="box-id-edit" value="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </form>
    </div>
  </div>
</div>