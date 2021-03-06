<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller{
  private $ctr_name;
  private $base_ctr; //Url base del controlodor
  private $primary_table = "producto"; //Tabla principal
  public $base_title = "Productos";

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
        $per_page = 10; //registros por página
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
          $result = $this->Productos->get_row($data_row);
          $row_id = $result['id'];
          $data['post'] = $result;
        }


        if ($this->input->post()) {
          $post= $this->input->post();
          $data['post'] = $post;

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
            ),
            array(
              'field' => 'ambito',
              'label' => 'Ambito',
              'rules' => 'required',
              'errors' => array(
                'required' => 'Campo requerido.',
              )
            ),
            array(
              'field' => 'ciudades[]',
              'label' => 'Ciudades',
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

          $data_form = array(
            "categoria_id" => $post['categoria_id'],
            "nombre_corto" => $post['nombre_corto'],
            "nombre_largo" => $post['nombre_largo'],
            "resumen" => $post['resumen'],
            "descripcion" => $post['descripcion'],
            "precio_moneda" => $post['precio_moneda'],
            "precio" => $post['precio'],
            "keywords" => $post['keywords'],
            "orden" => $post['orden'],
            "destacar" => $destacar,
            "ambito" => $post['ambito']
          );

          if(!empty($post['ciudades'])){
            $ciudades = implode(",", $post['ciudades']);
            $data_form['ciudades'] = $ciudades;
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
          $unidad_id = $this->db->insert_id();
          $this->session->set_userdata('msj_success', "Registro agregado satisfactoriamente.");
        }

          //Editar
        if ($tipo == 'E') {
          $this->db->where('id', $post['id']);
          $this->db->update($this->primary_table, $data_form);
          $unidad_id = $post['id'];
          $this->session->set_userdata('msj_success', "Registros actualizados satisfactoriamente.");
        }

        //Agregar ciudades
        

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