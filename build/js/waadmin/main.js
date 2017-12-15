$(function() {
 "use strict";
 moment.locale('es');
 /*console.log(moment().format('LL'));*/

 //Bootstrap datepicker solo una fecha
$('.datepicker').datepicker({
    language: "es",
    autoclose: true,
    todayHighlight: true,
    /*startDate: '+1d',*/
});


 //Chosen select
 $(".chosen-select").chosen({
     no_results_text: "Oops, sin resultados!",
     width: "100%",
     search_contains: true
 });

 /**
  * Select categoría muestra/oculta bloques
  */
 $(document).on("change", ".categoria_muestra_oculta", function() {
    var id = $(this).val();
    id = (id == 2) ? 1 : id;
    $('.table-mostrar-ocultar').hide();
    $('#table-mostrar-' + id).show();
    return false;
 });

 /**
 * jQuery Cascading Dropdown empresas de transporte
 */
 $(document).on("change", "#tipo_transporte", function() {
     var ajaxUrl = base_url + '/json/transportes';
     var q = $(this).val();
     var dataSearch = { q: q };

     var contDropdown = $("#transporte_id");

     if (q == '') {
         contDropdown.empty();
         var item = '<option value="">Seleccionar</option>';
         contDropdown.append( item );
         contDropdown.prop( "disabled", true );
     }else{

         $.ajax({
             method: "POST",
             url: ajaxUrl,
             data: dataSearch,
             dataType : 'json',
             beforeSend: function(){
               console.log("Cargando registros de empresas de transporte...");
           }
       })
         .done(function( result ) {
             contDropdown.empty();
             var item = '<option value="">Seleccionar</option>';

             $.each(result, function( index, value ) {
                 item += '<option value="'+ value.id +'">'+ value.nombre +'</option>';
             });
             contDropdown.append( item );
             contDropdown.prop( "disabled", false );
         });

     } 

     return false;
 });

 /**
 * Editar en lista box_orden
 */
 $(document).on("click", ".box_orden", function() {
     $(this).hide();
     var tdparent = $(this).parents('td');
     tdparent.find('input').show().focus().select();
     return false;
 });

 $("td input.input-order").focusout(function(){
     $(this).hide();
     var tdparent = $(this).parents('td');
     /*var url = base_url + tdparent.data('controller');*/
     var url = tdparent.data('controller');
     var id = tdparent.data('identificador');
     var orden = $(this).val();
     tdparent.find('.box_orden').show().text(orden).show();

 //Update
 var data = { id: id, orden: orden };
 $.ajax({
     method: "POST",
     url: url,
     data: data
 })
 .done(function( msg ) {
     console.log(msg);
 });

});

 /**
 * Bloques y detalles
 */
 $(document).on("click", "#btn-add-box", function() {
     $('#box-title').val('');
     $('#box-id-edit').val('');
     $('#addBoxModal').modal({
         backdrop: false,
         show:true,
     });
     return false;
 });

 $(document).on("click", ".btn-wbox-edit", function() {
     var wbox_blq = $(this).parents('.wbox-blq');
     var wbox_id = wbox_blq.find('.wbox-id').val();
     var wbox_title = wbox_blq.find('.wbox-title').val();

     $("#box-id-edit").val(wbox_id);
     $("#box-title").val(wbox_title);

     $('#addBoxModal').modal({
         backdrop: false,
         show:true,
     });

     return false;
 });

 $('#addBoxModal').on('shown.bs.modal', function () {
     $('#box-title').focus();
 });

 $(document).on("submit", "#form-add-bloque", function() {
     var titulo = $(this).find("input[name=box-title]").val();
     var box_idedit = $(this).find("input[name=box-idedit]").val();
     if(box_idedit == ''){
         var idtemplate = $(this).data('idtemplate');
         var idcontent = $(this).data('idcontent');
         var box_sufix = moment().unix();
         var clone = $('#' + idtemplate).clone();
         clone.css("display", "block");
         clone.attr('id', 'wbox-' + box_sufix);
         var box_id_name = 'wbox_blq[' + box_sufix + '][id]';
         var box_title_name = 'wbox_blq[' + box_sufix + '][titulo]';
         var box_item_name = 'wbox_blq[' + box_sufix + '][descripciones][]';

         clone.find('.wbox-id').attr('name', box_id_name).val(box_sufix);
         clone.find('.wbox-title').attr('name', box_title_name).val(titulo);
         clone.find('.box-header > .box-title').html(titulo);
         clone.find('.wbox-item').attr('name', box_item_name).val('');

         $('#' + idcontent).append(clone);

     }else{
         var boxedit = $('#wbox-' + box_idedit);
         boxedit.find('.wbox-title').val(titulo);
         boxedit.find('.box-header > .box-title').html(titulo);
     }

     $('#addBoxModal').modal('hide');
     $('#box-id-edit').val('');

     return false;
 });

 //Eliminar bloque
 $(document).on("click", ".wbox-delete", function() {
     var box = $(this).parents('.wbox-blq');
     box.fadeOut().remove();
     return false;
 });

 //Agregar item
 $(document).on("click", ".btn-add-item", function() {
     console.log('Agregar item');
     var clone_item = $(this).parents('.wbox-blq').find('.witem-template').clone();
     clone_item.removeClass('witem-template');
     clone_item.css("display", "");
     console.log(clone_item);
     $(this).parents('.wbox-blq').find('.wbox-contitems').append(clone_item);
     return false;
 });

 $(document).on("click", ".btn-remove-wbox-item", function() {
     var witem = $(this).parents('.winput-group');
     witem.fadeOut().remove();
     return false;
 });

 /**
 * Fin Bloques y detalles
 */

 //Submit Eliminar 
 $(document).on("click", "#btn-eliminar", function() {
     if (confirm("Realemente desea aliminar?")) {
         $("#index_form").submit();
     } else {
         return false;
     }
     return false;
 });

  //Submit Quitar de destacados 
 $(document).on("click", "#btn-quitar-destacados", function() {
     if (confirm("Realemente desea quitar de destacados?")) {
         $("#index_form").submit();
     } else {
         return false;
     }
     return false;
 });

 //QUITAR ITEM TR
 $(document).on("click", ".btn-quitar-tr", function() {
     $(this).parents("tr.row-table-rm").hide().remove();
     return false;
 });

 //AGREGAR CARACTERISTICA DE UN PRODUCTO
 $(document).on("click", "#btn-agregar-caracteristica", function() {
     var html = '<tr class="row-table-rm"> <td><input type="text" name="caracteristicas[titulo][]" class="form-control input-sm" placeholder="Título"></td><td><input type="text" name="caracteristicas[descripcion][]" class="form-control input-sm" placeholder="Descripción"></td><td> <a href="#" class="btn btn-danger btn-xs btn-quitar-tr">Quitar <span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></a> </td></tr>';
     $("#items-caracteristicas").append(html);
     return false;
 });

 //AGREGAR ESPECIFICACIONES DE UN PRODUCTO
 $(document).on("click", "#btn-agregar-especificacion", function() {
     var html = '<tr class="row-table-rm"> <td><input type="text" name="especificaciones[titulo][]" class="form-control input-sm" placeholder="Título"></td><td><input type="text" name="especificaciones[descripcion][]" class="form-control input-sm" placeholder="Descripción"></td><td class="text-center"> <a href="#" class="btn btn-danger btn-xs btn-quitar-tr">Quitar <span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></a> </td></tr>';
     $("#items-especificaciones").append(html);
     return false;
 });

 //AGREGAR DETALLES DE UN SERVICIO
 $(document).on("click", "#btn-agregar-detalle-servicio", function() {
     var html = '<tr class="row-table-rm"> <td><input type="text" name="detalles[titulo][]" class="form-control input-sm" placeholder="Título"></td><td><textarea name="detalles[descripcion][]" rows="3" class="form-control input-sm" placeholder="Descripción"></textarea></td><td> <a href="#" class="btn btn-danger btn-xs btn-quitar-tr">Quitar <span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></a> </td></tr>';
     $("#items-servicio").append(html);
     return false;
 });

 //Cargar popup
 $(document).on("click", ".wapopup", function() {
     var url = $(this).attr('href');
     var title = $(this).attr('title');
     var height = $(this).data('height');
     var width = $(this).data('width');
     popupCenter(url,title,width,height);
     return false;

 });

 // -------- Toggle navbar Muestra/Oculta
 $(document).on("click", "#wa-togle", function() {
     var left_side = $(".left-side");
     if(left_side.hasClass("collapse-left")){
 Cookies.set('collpase_cookie', '2'); //2:Menu oculto
}else{
 Cookies.set('collpase_cookie', '1'); //0,1:Menu visible
}
return false;
});

 // -------- MENU MODULOS Mostrar/Ocultar
 $(document).on("click", ".wa-modulo", function() {
     var id_modulo = $(this).data('idmodulo');
     var treeview_active = $(this).parent("li.treeview"); 
     if(treeview_active.hasClass("active")){
 Cookies.set(id_modulo, '1'); //1:Activo
}else{
 Cookies.set(id_modulo, '2'); //2:Inactivo
}
return false;
});

 //Enable sidebar toggle
 $("[data-toggle='offcanvas']").click(function(e) {
     e.preventDefault();

 //If window is small enough, enable sidebar push menu
 if ($(window).width() <= 992) {
     $('.row-offcanvas').toggleClass('active');
     $('.left-side').removeClass("collapse-left");
     $(".right-side").removeClass("strech");
     $('.row-offcanvas').toggleClass("relative");
 } else {
 //Else, enable content streching
 $('.left-side').toggleClass("collapse-left");
 $(".right-side").toggleClass("strech");
}
});

 //Add hover support for touch devices
 $('.btn').bind('touchstart', function() {
     $(this).addClass('hover');
 }).bind('touchend', function() {
     $(this).removeClass('hover');
 });

 //Activate tooltips
 $("[data-toggle='tooltip']").tooltip();

 /* 
 * Add collapse and remove events to boxes
 */
 $("[data-widget='collapse']").click(function() {
 //Find the box parent 
 var box = $(this).parents(".box").first();
 //Find the body and the footer
 var bf = box.find(".box-body, .box-footer");
 if (!box.hasClass("collapsed-box")) {
     box.addClass("collapsed-box");
     bf.slideUp();
 } else {
     box.removeClass("collapsed-box");
     bf.slideDown();
 }
});

 /*
 * ADD SLIMSCROLL TO THE TOP NAV DROPDOWNS
 * ---------------------------------------
 */
 $(".navbar .menu").slimscroll({
     height: "200px",
     alwaysVisible: false,
     size: "3px"
 }).css("width", "100%");

 /*
 * INITIALIZE BUTTON TOGGLE
 * ------------------------
 */
 $('.btn-group[data-toggle="btn-toggle"]').each(function() {
     var group = $(this);
     $(this).find(".btn").click(function(e) {
         group.find(".btn.active").removeClass("active");
         $(this).addClass("active");
         e.preventDefault();
     });

 });

 $("[data-widget='remove']").click(function() {
 //Find the box parent 
 var box = $(this).parents(".box").first();
 box.slideUp();
});

 /* Sidebar tree view */
 $(".sidebar .treeview").tree();

 //Fire upon load
 _fix();
 //Fire when wrapper is resized
 $(".wrapper").resize(function() {
     _fix();
     fix_sidebar();
 });

 //Fix the fixed layout sidebar scroll bug
 fix_sidebar();

 /*
 * We are gonna initialize all checkbox and radio inputs to 
 * iCheck plugin in.
 * You can find the documentation at http://fronteed.com/iCheck/
 */
 $("input[type='checkbox'], input[type='radio']").iCheck({
     checkboxClass: 'icheckbox_minimal',
     radioClass: 'iradio_minimal'
 });

 // -------- Checkbox All
 $("input#chkTodo").on('ifChecked', function(event){
 //$(".chk").prop("checked",true);
 $(".chk").iCheck('check');
});

 $("input#chkTodo").on('ifUnchecked', function(event){
 //$(".chk").prop("checked",false);
 $(".chk").iCheck('uncheck');
});

 /**
 * Cambiar contraseña
 */
 $("input#ck_cambiar_pass").on('ifChecked', function(event){
     console.log("Activado");
     $("#cont-passwords").show();
 //$(".chk").prop("checked",true);
 /*$(".chk").iCheck('check');*/
});

 $("input#ck_cambiar_pass").on('ifUnchecked', function(event){
     console.log("Desactivado");
     $("#cont-passwords").hide();
 //$(".chk").prop("checked",false);
 /*$(".chk").iCheck('uncheck');*/
});

});