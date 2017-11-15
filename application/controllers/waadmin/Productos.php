<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller{
  private $ctr_name;
	private $base_ctr; //Url base del controlodor
	private $primary_table = "producto"; //Tabla principal
	public $base_title = "Productos";

  public $tipos_transporte = array(
    1 => 'Terrestre', 
    2 => 'Aéreo',
    3 => 'Marino',
    4 => 'Fluvial',
  );

  public $tipos_ticket = array(
    1 => 'IDA Y VUELTA', 
    2 => 'SOLO IDA',
  );

  public $paquete_incluye_list = array(
    1 => 'Vuelo', 
    2 => 'Traslados',
    3 => 'Estadia',
  );

  public $listado_meses = array(
    1 => 'ENE', 
    2 => 'FEB',
    3 => 'MAR',
    4 => 'ABR',
    5 => 'MAY',
    6 => 'JUN',
    7 => 'JUL',
    8 => 'AGO',
    9 => 'SET',
    10 => 'OCT',
    11 => 'NOV',
    12 => 'DIC'
  );

  public  $user_info;

  function __construct(){
    parent::__construct();
    $this->template->set_layout('waadmin/intranet.php');

		/**
		 * Verficamos si existe una session activa
		 */
		$this->auth->logged_in();

		$this->load->model("crud_model","Crud");
		$this->load->model("productos_model","Productos");
    $this->load->model("categorias_model","Categorias");
    $this->load->model("transportes_model","Transportes");

    $this->ctr_name = $this->router->fetch_class();
    //Base del controlador
    $this->base_ctr = $this->config->item('admin_path') . '/' . $this->ctr_name;

		//Información del usuario que ha iniciado session
    $this->user_info = $this->auth->user_profile();

    $this->load->library("imaupload");
  }

  function index(){
    /*$data['wa_tipo'] = $tipo;*/
    $data['wa_modulo'] = 'Listado';
    $data['wa_menu'] = $this->base_title;

		//URLS
    $controlador = $this->base_ctr;
    $data['agregar_url'] = base_url($controlador . '/editar/C');
		$data['ver_url'] = base_url($controlador . '/editar/V/'); //Adicionar ID
		$data['editar_url'] = base_url($controlador . '/editar/E/'); //Adicionar ID
		$data['eliminar_url'] = base_url($controlador . '/eliminar');
		$data['refresh_url'] = base_url($controlador . '/index?refresh');

    $data['order_url'] = base_url($controlador . '/uporden');

		//BUSQUEDA
    $data['campos_busqueda'] = array(
     't1.codigo' => 'Código',
     't1.nombre_largo' => 'Nombre producto'
   );

		$sessionName = 's_' . $this->primary_table; //Session name

    //Categorías
    $total_categorias = $this->Categorias->total_registros();
    $categorias = $this->Categorias->listado($total_categorias, 0);
    $data['categorias'] = $categorias;

		//Paginacion
    $base_url = base_url($this->base_ctr . '/index');
        $per_page = 30; //registros por página
        $uri_segment = 4; //segmento de la url
        $num_links = 4; //número de links
        //Página actual
        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

        if (isset($_GET['refresh'])) {
        	$this->session->unset_userdata($sessionName);
        }

        //Setear post
        $post = $this->Crud->set_post($this->input->post(),$sessionName);
        $data['post'] = $post;

        //Total de registros por post
        $data['total_registros'] = $this->Productos->total_registros($post);

        //Listado
        $data['listado'] = $this->Productos->listado($per_page, $page, $post);

        //Paginacion
        $total_rows = $data['total_registros'];

        $set_paginacion = set_paginacion($base_url, $per_page, $uri_segment, $num_links, $total_rows);

        $this->pagination->initialize($set_paginacion);
        $data["links"] = $this->pagination->create_links();


        if ($this->session->userdata("mensaje")) {
        	$data["mensaje"] = $this->session->userdata("mensaje");
        	$this->session->unset_userdata("mensaje");
        }

        $this->template->title('Listado ' . $this->base_title);
        $this->template->build($this->base_ctr . '/index', $data);
      }

      function editar($tipo='C',$id=NULL){
        $path = '../../../../assets/plugins/ckfinder';
        $width = 'auto';
        $ckEditor = $this->editor($path, $width);

        //Categorías
        $total_categorias = $this->Categorias->total_registros();
        $categorias = $this->Categorias->listado($total_categorias, 0);
        $data['categorias'] = $categorias;

        //Consultar ciudades
        $this->load->model('ciudades_model', 'Ciudades');
        $total_ciudades = $this->Ciudades->total_registros();
        $ciudades = $this->Ciudades->listado($total_ciudades, 0);
        $data['ciudades'] = $ciudades;

        $data['current_url'] = base_url(uri_string());
        $data['back_url'] = base_url($this->base_ctr . '/index');

        if(isset($id)){
          $data['edit_url'] = base_url($this->base_ctr . '/editar/E/' . $id);
        }

        switch ($tipo) {
          case 'C':
          $data['tipo'] = 'Agregar';
          break;
          case 'E':
          $data['tipo'] = 'Editar';
          break;
          case 'V':
          $data['tipo'] = 'Visualizar';
          break;
        }

        $data['wa_tipo'] = $tipo;
        $data['wa_modulo'] = $data['tipo'];
        $data['wa_menu'] = 'Producto';


        if($tipo == 'E' || $tipo == 'V'){
          $data_row = array('id' => $id);
          $post = $this->Productos->get_row($data_row);
          $row_id = $post['id'];
          $data['post'] = $post;


        //Empresas de transporte
          $data_empresas = array(
            'tipo_transporte' => $post['tipo_transporte'],
            'ordenar_por' => 'nombre',
            'ordentipo' => 'ASC',
          );

          $total_empresas = $this->Transportes->total_registros($data_empresas);
          $listado_empresas = $this->Transportes->listado($total_empresas, 0, $data_empresas);
          $data['empresas_transporte'] = $listado_empresas;
        }

        if ($this->input->post()) {
          $post= $this->input->post();
          $data['post'] = $post;

          /*echo "<pre>";
          print_r($post);
          echo "</pre>";
          die();*/

          $config = array(
            array(
              'field' => 'nombre_corto',
              'label' => 'Nombre corto',
              'rules' => 'required',
              'errors' => array(
               'required' => 'Campo requerido.',
             )
            ),
            array(
              'field' => 'nombre_largo',
              'label' => 'Nombre largo',
              'rules' => 'required',
              'errors' => array(
               'required' => 'Campo requerido.',
             )
            ),
            array(
              'field' => 'categoria_id',
              'label' => 'Categoría',
              'rules' => 'required',
              'errors' => array(
               'required' => 'Campo requerido.',
             )
            ),
            array(
              'field' => 'resumen',
              'label' => 'Resumen',
              'rules' => 'required',
              'errors' => array(
                'required' => 'Campo requerido.',
              )
            ),
            array(
              'field' => 'precio',
              'label' => 'Precio',
              'rules' => 'required',
              'errors' => array(
                'required' => 'Campo requerido.',
              )
            )
          );

          $this->form_validation->set_rules($config);
          $this->form_validation->set_error_delimiters('<p class="text-red text-error">', '</p>');

          if ($this->form_validation->run() == FALSE){
           /*Error*/
           $data['post'] = $post;
         }else{
          $destacar = (isset($post['destacar'])) ? $post['destacar'] : 0 ;
          $mostrar_descuento = (isset($post['mostrar_descuento'])) ? $post['mostrar_descuento'] : 0 ;

          $categoria_id = $post['categoria_id'];

          $data_form = array(
            "categoria_id" => $categoria_id,
            "nombre_corto" => $post['nombre_corto'],
            "nombre_largo" => $post['nombre_largo'],
            "resumen" => $post['resumen'],
            "descripcion" => $post['descripcion'],
            "precio_moneda" => $post['precio_moneda'],
            "precio" => $post['precio'],
            "precio_descuento" => $post['precio_descuento'],
            "mostrar_descuento" => $mostrar_descuento,
            "keywords" => $post['keywords'],
            "orden" => $post['orden'],
            "destacar" => $destacar,
          );

          //Paquetes turisticos
          if($categoria_id == 6){
            $data_form['ambito'] = $post['ambito'];
            
              if(!empty($post['paquete_meses'])){
                $paquete_meses = implode(",", $post['paquete_meses']);
                $data_form['paquete_meses'] = $paquete_meses;
              }

              $data_form['paquete_ciudad'] = $post['paquete_ciudad'];
              $data_form['paquete_noches'] = $post['paquete_noches'];

              if(!empty($post['paquete_incluye'])){
                $paquete_incluye = implode(",", $post['paquete_incluye']);
                $data_form['paquete_incluye'] = $paquete_incluye;
              }
            }

          //Tickets
            if ($categoria_id == 1 || $categoria_id == 2) {
              $data_form['tipo_transporte'] = $post['tipo_transporte'];
              $data_form['transporte_id'] = $post['transporte_id'];
              $data_form['ciudad_origen'] = $post['ciudad_origen'];
              $data_form['ciudad_destino'] = $post['ciudad_destino'];
              $data_form['tipo_ticket'] = $post['tipo_ticket'];
            }

          //Cargar Imagenes
            $upload_path = $this->config->item('upload_path');
            if($_FILES["imagen_1"]){
              $imagen_info1 = $this->imaupload->do_upload($upload_path, "imagen_1");
            }

            if($_FILES["imagen_2"]){
              $imagen_info2 = $this->imaupload->do_upload($upload_path, "imagen_2");
            }

            if (!empty($imagen_info1['upload_data'])) {
              $data_form['imagen_1'] = $imagen_info1['upload_data']['file_name'];
            }

            if (!empty($imagen_info2['upload_data'])) {
              $data_form['imagen_2'] = $imagen_info2['upload_data']['file_name'];
            }

            if(empty($post['url_key_pre'])){
             $data_urlkey = array('tipo' => 'p', 'urlkey' => $post['nombre_largo']);
             $url_key = $this->Crud->get_urlkey($data_urlkey);
             $data_form['url_key'] = $url_key;

           //Actualizamos la tabla urlkey
             $data_urlkey_insert = array('tipo' => 'p', 'urlkey' => $url_key);
             $this->db->insert("urlkey",$data_urlkey_insert);
           }

          //Agregar
           if($tipo == 'C'){
            $codigo = strtoupper(random_string('alnum',5));
            $data_form['codigo'] = $codigo;

            $this->db->insert($this->primary_table, $data_form);
            $producto_id = $this->db->insert_id();
            $this->session->set_userdata('msj_success', "Registro agregado satisfactoriamente.");
          }

          //Editar
          if ($tipo == 'E') {
            $this->db->where('id', $post['id']);
            $this->db->update($this->primary_table, $data_form);
            $producto_id = $post['id'];
            $this->session->set_userdata('msj_success', "Registros actualizados satisfactoriamente.");
          }

        //Agregar bloques y detalles
          $wbox_blq = $post['wbox_blq'];
          $this->db->where('producto_id', $producto_id);
          $this->db->delete('producto_bloque');

          $this->db->where('producto_id', $producto_id);
          $this->db->delete('producto_bloque_detalle');

          if(count($wbox_blq) > 1){
            $row_1 = array_shift($wbox_blq);
            foreach ($wbox_blq as $key => $value) {
              $descripciones = $value['descripciones'];
              $data_wbox = array(
                "producto_id" => $producto_id,
                "titulo" => $value['titulo']
              );
              $this->db->insert('producto_bloque', $data_wbox);
              $producto_bloque_id = $this->db->insert_id();

              if(count($descripciones)>1){
                $row_0 = array_shift($descripciones);
                foreach ($descripciones as $key => $value) {
                  $data_desc = array(
                    "producto_id" => $producto_id,
                    "producto_bloque_id" => $producto_bloque_id,
                    "titulo" => $value
                  );
                  $this->db->insert('producto_bloque_detalle', $data_desc);
                }
              }

            }
          }

                //INSERTAMOS CARACTERISTICAS
          $this->db->where('producto_id', $producto_id);
          $this->db->delete('producto_caracteristicas');
          if (!empty($post['caracteristicas'])) {
            $caracteristicas = $post['caracteristicas'];
            foreach ($caracteristicas['titulo'] as $index => $titulo) {
              $descripcion = $caracteristicas['descripcion'][$index];
              $data_insert_caracteristica = array(
                "producto_id" => $producto_id,
                "nombre" => $titulo,
                "descripcion" => $descripcion
              );
              $this->db->insert('producto_caracteristicas', $data_insert_caracteristica);
            }
          }

                //INSERTAMOS ESPECIFICACIONES
          $this->db->where('producto_id', $producto_id);
          $this->db->delete('producto_especificaciones');
          if (!empty($post['especificaciones'])) {
            $especificaciones = $post['especificaciones'];
            foreach ($especificaciones['titulo'] as $index => $titulo) {
              $descripcion = $especificaciones['descripcion'][$index];
              $data_insert_especificacion = array(
                "producto_id" => $producto_id,
                "nombre" => $titulo,
                "descripcion" => $descripcion
              );
              $this->db->insert('producto_especificaciones', $data_insert_especificacion);
            }
          }


          redirect($this->base_ctr . '/index');
        }

      }

      $this->template->title($data['tipo'] . ' Producto');
      $this->template->build($this->base_ctr.'/editar', $data);
    }

/**
 * Eliminar
 *
 *
 * @package     Unidades
 * @author      Juan Julio Sandoval Layza
 * @copyright webApu.com 
 * @since       26-02-2015
 * @version     Version 1.0
 */
public function eliminar() {
 if ($this->input->post()) {
   $items = $this->input->post('items');
   if (!empty($items)) {
     foreach ($items as $item) {
       $eliminar = date("Y-m-d H:i:s");
       $data_eliminar = array(
         "eliminar" => $eliminar,
         "estado" => 0
       );
       $this->db->where('id', $item);
       $this->db->update($this->primary_table, $data_eliminar);
     }
     $this->session->set_userdata('msj_success', "Registros eliminados satisfactoriamente.");
     redirect($this->base_ctr . "/index");
   } else {
     $this->session->set_userdata('msj_error', "Debe seleccionar al menos un registro.");
     redirect($this->base_ctr . "/index");
   }
 } else {
   $this->session->set_userdata('msj_error', "Debe seleccionar al menos un registro.");
   redirect($this->base_ctr . "/index");
 }

 $this->template->title('Eliminar.');
 $this->template->build('inicio');
}

function editor($path, $width) {

 //Loading Library For Ckeditor

 $this->load->library('ckeditor');

 $this->load->library('ckfinder');

 //configure base path of ckeditor folder 

 $this->ckeditor->basePath = base_url('assets/plugins/ckeditor/');

 $this->ckeditor->config['toolbar'] = 'Full';

 $this->ckeditor->config['language'] = 'es';

 $this->ckeditor->config['width'] = $width;

 //configure ckfinder with ckeditor config 

 $this->ckfinder->SetupCKEditor($this->ckeditor, $path);
}

 /**
 * Ajax actualizar orden
 */
 public function uporden(){
  if($this->input->post()){
    $post = $this->input->post();
    $data_form = array('orden' => $post['orden']);
    $this->db->where('id', $post['id']);
    $this->db->update($this->primary_table, $data_form);
    echo "Orden actualizado.";
  }
}

}