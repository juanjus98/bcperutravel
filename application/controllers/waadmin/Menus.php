<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller{
  private $ctr_name;
	private $base_ctr; //Url base del controlodor
	private $primary_table = "menu_web"; //Tabla principal
	public $base_title = "Menus";

	public  $user_info;

	function __construct(){
		parent::__construct();
		$this->template->set_layout('waadmin/intranet.php');

		/**
		 * Verficamos si existe una session activa
		 */
		$this->auth->logged_in();

		$this->load->model("crud_model","Crud");
		$this->load->model("menus_model","Menus");

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
			't1.nombre' => 'Nombre'
			);

		$sessionName = 's_' . $this->primary_table; //Session name

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
        $data['total_registros'] = $this->Menus->total_registros($post);

        //Listado
        $data['listado'] = $this->Menus->listado($per_page, $page, $post);

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

      $data['categorias'] = $this->Menus->listado_principal();

    	$data['current_url'] = base_url(uri_string());
    	$data['back_url'] = base_url($this->base_ctr . '/index');
      
    	if(isset($id)){
    		$data['editar_url'] = base_url($this->base_ctr . '/editar/E/' . $id);
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
    	$data['wa_menu'] = 'Menú';


    	if($tipo == 'E' || $tipo == 'V'){
    		$data_row = array('id' => $id);
        $result = $this->Menus->get_row($data_row);
        $row_id = $result['id'];
    		$data['post'] = $result;
    	}     

    	if ($this->input->post()) {
    		$post= $this->input->post();
    		$data['post'] = $post; 

    		$config = array(
    			array(
    				'field' => 'parent_id',
    				'label' => 'Categoría',
    				'rules' => 'required',
    				'errors' => array(
    					'required' => 'Campo requerido.',
    					)
    				),
          array(
            'field' => 'nombre',
            'label' => 'Nombre',
            'rules' => 'required',
            'errors' => array(
              'required' => 'Campo requerido.',
              )
            ),
          array(
            'field' => 'url',
            'label' => 'URL',
            'rules' => 'required',
            'errors' => array(
              'required' => 'Campo requerido.',
              )
            ),
          array(
            'field' => 'orden',
            'label' => 'Orden',
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


          $publico = (isset($post['publico'])) ? $post['publico'] : 0 ;

    			$data_form = array(
    				"parent_id" => $post['parent_id'],
            "nombre" => $post['nombre'],
    				"descripcion" => $post['descripcion'],
            "url" => $post['url'],
            "orden" => $post['orden'],
            "publico" => $publico,
    				);

          //Agregar
    			if($tipo == 'C'){
    				$this->db->insert($this->primary_table, $data_form);
    				$row_id = $this->db->insert_id();
    				$this->session->set_userdata('msj_success', "Registro agregado satisfactoriamente.");
    			}

          		//Editar
    			if ($tipo == 'E') {
    				$this->db->where('id', $post['id']);
    				$this->db->update($this->primary_table, $data_form);
    				$row_id = $post['id'];
    				$this->session->set_userdata('msj_success', "Registros actualizados satisfactoriamente.");
    			}

    			redirect($this->base_ctr . '/index');
    		}

    	}

    	$this->template->title($data['tipo'] . ' Menú');
    	$this->template->build($this->base_ctr.'/editar', $data);
    }

/**
 * Eliminar
 *
 *
 * @package     Menus
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