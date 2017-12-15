<?php
/*echo '<pre>';
print_r($listado);
echo '</pre>';*/
?>
<?php echo msj(); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <form name="frm-buscar" id="frm-buscar" method="post" action="" role="search">
                    <div class="row pad" style="padding-bottom: 0px;">
                        <div class="col-sm-6">
                            <p><b>Listado</b></p>
                        </div>
                        <div class="col-sm-6">
                            <div class="pull-right">

                                <a href="#" class="btn btn-danger btn-sm" id="btn-eliminar" title="Eliminar"><i class="fa fa-ban" aria-hidden="true"></i> Quitar</a>

                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.box-header -->
            <form name="index_form" id="index_form" action="<?php echo $undestacar_url; ?>" method="post">
                <div class="box-body table-responsive">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th><input type="checkbox" id="chkTodo" /></th>
                                <th>Código</th>
                                <th>Nombre producto</th>
                                <th>Categoría</th>
                                <!-- <th>Slug</th> -->
                                <th class="text-center">Orden</th>
                                <th></th>
                            </tr>
                            <?php
                            if(!empty($listado)){
                                foreach ($listado as $key => $item) {
                                    /*echo "<pre>";
                                    print_r($item);
                                    echo "</pre>";*/
                                    $link_web = base_url($item['categoria_key'].'/'.$item['url_key']);
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="items[]" id="eliminarchk-<?php echo $item['id'] ?>" value="<?php echo $item['id'] ?>" class="chk">
                                        </td>
                                        <td><?php echo $item['codigo']; ?></td>
                                        <td><?php echo $item['nombre_corto']; ?></td>
                                        <td><?php echo $item['categoria_nombre']; ?></td>
                                        <!-- <td><?php echo $item['url_key']; ?></td> -->

                                        <td class="text-center" data-controller="<?php echo $detacar_order_url;?>" data-identificador="<?php echo $item['id'];?>">
                                            <div class="box_orden">
                                                <?php echo $item['destacar_orden']; ?>
                                            </div>
                                            <input type="text" name="orden_<?php echo $item['id'];?>" value="<?php echo $item['destacar_orden'];?>" style="display: none; max-width: 40px; margin: 0 auto;" class="form-control input-sm text-center input-order">
                                        </td>

                                        <td class="text-center">
                                            <!-- <a class="btn btn-info btn-xs wapopup" data-width="800" data-height="600" href="<?php echo base_url(); ?>waadmin/productos_itinerario/index/<?php echo $item['id']; ?>" data-toggle="tooltip" title="Intinerario"><i class="fa fa-calendar" aria-hidden="true"></i></a>

                                            <a href="<?php echo $ver_url . $item['id']; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" title="Visualizar"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                                            <a href="<?php echo $link_web; ?>" class="btn btn-success btn-xs" data-toggle="tooltip" title="Link" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="9" class="text-center"><small>No se encontro ningún registro.</small></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div class="pull-right">
                    <?php
                    echo $links;
                    ?>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>