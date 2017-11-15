<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Paginas extends CI_Controller {
  public $website_info;

  public $listado_meses = array(
    1 => 'Enero', 
    2 => 'Febrero',
    3 => 'Marzo',
    4 => 'Abril',
    5 => 'Mayo',
    6 => 'Junio',
    7 => 'Julio',
    8 => 'Agosto',
    9 => 'Setiembre',
    10 => 'Octubre',
    11 => 'Noviembre',
    12 => 'Diciembre'
  );

  public $tipos_transporte = array(
    1 => array('title' => 'Terrestre', 'fa-icon' => 'fa-bus'), 
    2 => array('title' => 'Aéreo', 'fa-icon' => 'fa-plane'),
    3 => array('title' => 'Marino', 'fa-icon' => 'fa-ship'),
    4 => array('title' => 'Fluvial', 'fa-icon' => 'fa-ship'),
  );

  public $paquete_incluye_list = array(
    1 => array('title' => 'Todo incluido.', 'fa-icon' => 'fa-bel'), 
    2 => array('title' => 'Traslados.', 'fa-icon' => 'fa-plane'),
    3 => array('title' => 'Alimentación.', 'fa-icon' => 'fa-cutlery'),
    4 => array('title' => 'Alojamiento.', 'fa-icon' => 'fa-bed'),
    5 => array('title' => 'Tarjetas de asistencia.', 'fa-icon' => 'fa-id-card-o'),
    6 => array('title' => 'Tours.', 'fa-icon' => 'fa-male'),
  );


  function __construct() {
    parent::__construct();
    $this->template->set_layout('website.php');

    $this->load->model('inicio_model', 'Inicio');
    $this->load->model('paginas_model', 'Paginas');

    $this->load->model("categorias_model","Categorias");
    $this->load->model('productos_model', 'Productos');
    $this->load->model('productos_itinerario_model', 'Productos_itinerario');

    $this->load->model('ciudades_model', 'Ciudades');

    $this->load->model("crud_model","Crud");

    /**
     * Información del website
     */
    $this->website_info = $this->Inicio->get_website();
  }


  public function index() {
    //Limpiar session de busqueda ses_search
    unset($_SESSION['ses_search']);
    unset($_SESSION['ses_products']);

    //Consultar ciudades
    $this->load->model('ciudades_model', 'Ciudades');
    $total_ciudades = $this->Ciudades->total_registros();
    $ciudades = $this->Ciudades->listado($total_ciudades, 0);
    $data['ciudades'] = $ciudades;

    $data['active_link'] = "inicio";

    $data['website'] = $this->Inicio->get_website();
    $data['head_info'] = head_info($data['website']); //siempre

    //Slider
    $data_crud['table'] = "slider as t1";
    $data_crud['columns'] = "t1.*";
    $data_crud['where'] = array("t1.estado !=" => 0);
    $data_crud['order_by'] = "t1.orden Asc";
    $data['slider'] = $this->Crud->getRows($data_crud);
    
    $this->template->title('Inicio');
    $this->template->build('paginas/index', $data);
  }

  /**
   * Página
   */
  public function pagina() {
    $categoria_url_key = ($this->uri->segment(1)) ? $this->uri->segment(1) : '';
    $producto_url_key = ($this->uri->segment(2)) ? $this->uri->segment(2) : '';

    /**
     * Verificar session de busqueda ses_search
     */
    if($this->session->userdata('ses_search')){
      $data_prod = $this->session->userdata('ses_search');
      $this->session->unset_userdata('ses_search');
    }

    /*if(empty($data_prod)){
      $data_row = array('url_key' => $categoria_url_key);
      $categoria = $this->Categorias->get_row($data_row);
      $categoria_id = $categoria['id'];
      $data_prod = array('categoria_id' => $categoria_id);
    }*/

    if(!empty($producto_url_key) && !is_numeric($producto_url_key)){
      $this->detalle($producto_url_key);
    }else{
      $this->listar($categoria_url_key, $data_prod);
    }

    /*$this->template->title('Inicio');
    $this->template->build('paginas/index', $data);*/
  }

  /**
   * Detalles del producto
   */
  public function detalle($url_key){
    //Consultar producto
    $data_prod = array('url_key' => $url_key);
    $producto = $this->Productos->get_row($data_prod);
    $data['producto'] = $producto;

    $data['active_link'] = "inicio";
    $data['website'] = $this->Inicio->get_website();
    $data['head_info'] = head_info($data['website']); //siempre

    $this->template->title('Inicio');
    $this->template->build('paginas/detalle', $data);
  }


  /**
   * Listar productos
   */
  public function listar($categoria_url_key, $data_prod){
    /**
     * Listar productos
     */
    $sessionName = 'ses_products';

    $base_url = base_url($categoria_url_key);
    $per_page = 15; //registros por página
    $uri_segment = 2; //segmento de la url
    $num_links = 4; //número de links
    //Página actual
    $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

    //Consultar Categoría
    $data_categoria = array('url_key' => $categoria_url_key,);
    $categoria = $this->Categorias->get_row($data_categoria);
    $data['categoria'] = $categoria;

    //Setear post
    $data_prod['categoria_id'] = $categoria['id'];
    $post = $this->Crud->set_post($data_prod,$sessionName);
    $data['post'] = $post;

    //Total de registros por post
    $data['total_registros'] = $this->Productos->total_registros($post);

    //Listado
    $data['listado'] = $this->Productos->listado_tiny($per_page, $page, $post);

    //Paginacion
    $total_rows = $data['total_registros'];

    $set_paginacion = set_paginacion($base_url, $per_page, $uri_segment, $num_links, $total_rows);

    $this->pagination->initialize($set_paginacion);
    $data["links"] = $this->pagination->create_links();

    $data['active_link'] = "inicio";
    $data['website'] = $this->Inicio->get_website();
    $data['head_info'] = head_info($data['website']); //siempre

    $this->template->title('Inicio');
    $this->template->build('paginas/productos', $data);
  }

  /**
   * Buscar
   */
  public function buscar(){
    $data_search = array();
    if ($this->input->post()) {
      $post = $this->input->post();
      $categoria_id = $post['categoria_id'];

      /**
       * Consultar categoría
       */
      $data_row = array('id' => $categoria_id);
      $categoria = $this->Categorias->get_row($data_row);
      $categoria_url_key = $categoria['url_key'];

      $data_search['categoria_id'] = $categoria_id;
      $data_search['categoria_url_key'] = $categoria_url_key;

      switch ($categoria_id) {
        case 1:
        case 2:
        $data_search['ciudad_origen'] = (!empty($post['ciudad_origen_id'])) ? $post['ciudad_origen_id'] : '' ;
        $data_search['ciudad_destino'] = (!empty($post['ciudad_destino_id'])) ? $post['ciudad_destino_id'] : '' ;
        break;

        case 6:
        $data_search['paquete_ciudad'] = (!empty($post['destino_id'])) ? $post['destino_id'] : '' ;
        $data_search['paquete_meses'] = (!empty($post['mes_salida'])) ? $post['mes_salida'] : '' ;
        $data_search['paquete_noches'] = (!empty($post['numero_noches'])) ? $post['numero_noches'] : '' ;
        break;
        
        default:
          # code...
        break;
      }

    }

    $this->session->set_userdata('ses_search', $data_search);

    redirect(base_url($categoria_url_key));
  }

/*  public function paquetes($args=null) {
    $data['dias'] = $this->Paquetes->listadoDias();
    
    $data_busqueda = array();
    $nroDias = 0;
    if(isset($args)){
      $_hasta = explode('hasta_', $args);
      if(count($_hasta) > 1){
        $_desde = explode('desde_',$_hasta[0]);
        $strDesde =  substr($_desde[1], 4,4) . "-". substr($_desde[1], 2,2) . "-" . substr($_desde[1], 0,2);
        $strHasta =  substr($_hasta[1], 4,4) . "-". substr($_hasta[1], 2,2) . "-" . substr($_hasta[1], 0,2);
        $fechaDesde = date('Y-m-d', strtotime($strDesde));
        $fechaHasta = date('Y-m-d', strtotime($strHasta));
        $dateDiff = strtotime($strHasta) - strtotime($strDesde);
        $nroDias = floor($dateDiff / (60 * 60 * 24)) + 1;
        $data_busqueda['fechaDesde'] = date("d-m-Y", strtotime($fechaDesde));
        $data_busqueda['fechaHasta'] = date("d-m-Y", strtotime($fechaHasta));
      }

      $_dias = explode('dias', $args);
      if(count($_dias) > 1){
        $nroDias = $_dias[0];
      }
    }

    $data['active_link'] = "paquetes-tours";
    $data['website'] = $this->Inicio->get_website();
    $data['head_info'] = head_info($this->website_info); //siempre

    //Paquetes
    $data_paquetes = array('ordenar_por' => 't1.orden', 'ordentipo' => 'ASC');
    if($nroDias > 0){
      $data_paquetes['nro_dias'] = $nroDias;
      $data_busqueda['nroDias'] = $nroDias;
    }

    $total_paquetes = $this->Paquetes->total_registros($data_paquetes);
    $data['paquetes'] = $this->Paquetes->listado($total_paquetes,0,$data_paquetes);

    //Información de busqueda
    $data['busqueda'] = $data_busqueda;

    $this->template->title('Paquetes');
    $this->template->build('paginas/paquetes', $data);
  }

  public function paquete($url_key) {
    if(isset($args)){
      $_hasta = explode('hasta_', $args);
      if(count($_hasta) > 1){
        $_desde = explode('desde_',$_hasta[0]);
        $strDesde =  substr($_desde[1], 4,4) . "-". substr($_desde[1], 2,2) . "-" . substr($_desde[1], 0,2);
        $strHasta =  substr($_hasta[1], 4,4) . "-". substr($_hasta[1], 2,2) . "-" . substr($_hasta[1], 0,2);
        $fechaDesde = date('Y-m-d', strtotime($strDesde));
        $fechaHasta = date('Y-m-d', strtotime($strHasta));
        $dateDiff = strtotime($strHasta) - strtotime($strDesde);
        $nroDias = floor($dateDiff / (60 * 60 * 24));
      }

      $_dias = explode('dias', $args);
      if(count($_dias) > 1){
        $nroDias = $_dias[0];
      }
    }

    //Consultar Paquete
    $data_paquete = array('url_key' => $url_key);
    $paquete = $this->Paquetes->get_row($data_paquete);
    $data['paquete'] = $paquete;

    $data['active_link'] = "paquetes-tours";
    $data['website'] = $this->Inicio->get_website();
    $data['head_info'] = head_info($paquete, 'paquete'); //siempre

    //Formas de pago (página)
    if(!empty($paquete['formas_pago_id'])){
      $data_pagina = array('id' => $paquete['formas_pago_id']);
      $data['formas_pago'] = $this->Paginas->get_row($data_pagina);
    }

    //Paises
    $data['paises'] = $this->Crud->getPaises();

    $this->template->title('Paquete');
    $this->template->build('paginas/paquete', $data);
  }*/


  public function contactanos() {
    $this->template->title('Contáctanos');
    $data['active_link'] = "contactanos";
        $data['website'] = $this->Inicio->get_website(); //siempre
        $data['head_info'] = head_info($data['website']); //siempre

        //Enviar formulario
        if($this->input->post()){
          $post = $this->input->post();
          $config = array(
           array(
             'field' => 'nombre',
             'label' => 'Nombres',
             'rules' => 'required',
             'errors' => array(
               'required' => 'Campo requerido.',
             )
           ),
           array(
             'field' => 'email',
             'label' => 'E-mail',
             'rules' => 'required|valid_email',
             'errors' => array(
               'required' => 'Campo requerido.',
               'valid_email' => 'E-mail inválido.'
             )
           ),
           array(
             'field' => 'telefono',
             'label' => 'Teléfono',
             'rules' => 'required',
             'errors' => array(
               'required' => 'Campo requerido.',
             )
           )
         );

          $this->form_validation->set_rules($config);
          $this->form_validation->set_error_delimiters('<p class="text-red text-error">', '</p>');

          if ($this->form_validation->run() == FALSE)
          {
            $data['post'] = $post;
          }else{
            //GUARDAR EN LA BASE DE DATOS LA NUEVA SOLICITUD DE COTIZACIÓN.
            $data_insert = array(
              "nombres" => strip_tags($post['nombre']),
              "telefono" => strip_tags($post['telefono']),
              "email" => strip_tags($post['email']),
              "mensaje" => strip_tags($post['mensaje']),
              "agregar" => date("Y-m-d H:i:s")
            );

            /*$this->db->insert('contactos', $data_insert);
            $contactos_id = $this->db->insert_id();*/

            //Templates Email
            $data_email['post'] = $data_insert;

            //Otros datos para el email
            $data_email['website'] = $this->Inicio->get_website();
            $data_email['cabeceras'] = $this->config->item('waemail');
            
            //Template user email
            $email_user = $this->load->view('paginas/email/tp_contacto_user', $data_email, TRUE);

            //Template admin admin
            $email_admin = $this->load->view('paginas/email/tp_contacto', $data_email, TRUE);

            //Enviar email
            $this->load->library('email');

            $config['useragent']           = "CodeIgniter";
            /*$config['protocol'] = 'sendmail';*/
            $config['protocol']            = "smtp";
            $config['smtp_host']           = "localhost";
            $config['smtp_port']           = "25";

            $config['mailpath'] = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';

            $this->email->initialize($config);

            $this->email->from('informes@consorciobongourmet.com', utf8_decode('Informes Bon Gourmet Eventos y Convenciones'));
            $this->email->reply_to($post['email'], utf8_decode($post['nombre']));
            $this->email->to('juanjus98@gmail.com'); //Email destino (quién recibe el correo)
            /*$this->email->cc('epropesco@hotmail.com');*/
            //$this->email->bcc('them@their-example.com');

            $this->email->subject(utf8_decode('Nuevo contacto.'));
            $this->email->message($email_admin);
            $this->email->send(); //Envia email al administrador
            /*echo $this->email->print_debugger();*/

            //ENVIAMOS EMAIL DE CONFIRMACIÓN
            $this->email->clear();
            $this->email->initialize($config);

            $this->email->from('informes@consorciobongourmet.com', utf8_decode('Informes Bon Gourmet Eventos y Convenciones'));
            $this->email->to($post['email'], utf8_decode($post['nombre']));
            $this->email->subject(utf8_decode('Gracias por contáctarnos - Bon Gourmet Eventos y Convenciones'));
            $this->email->message($email_user);
            $this->email->send();
            $this->email->print_debugger(array('headers'));

            redirect("confirmacion");
          }
        } //Post


        $this->template->build('paginas/contactanos', $data);
      }

    //Mensaje de confirmación
      public function confirmacion($token='') {
        $data['active_link'] = "inicio";
        $data['website'] = $this->Inicio->get_website();
      $data['head_info'] = head_info($data['website']); //siempre

      $this->template->title('Confirmación');
      $this->template->build('paginas/confirmacion', $data);
    }


    public function servicio($url_key=null) {
      $data['active_link'] = "servicios";
      $data['active_gallery'] = true;

      $data['website'] = $this->Inicio->get_website();
      
      //Consultar salón
      $data_crud['table'] = "servicio as t1";
      $data_crud['columns'] = "t1.*";
      $data_crud['where'] = array("t1.url_key" => $url_key, "t1.estado !=" => 0);
      $servicio = $this->Crud->getRow($data_crud);
      $data['servicio'] = $servicio;

      //Consultar servicio_detalle
      $data_crud['table'] = "servicio_detalle as t1";
      $data_crud['columns'] = "t1.*";
      $data_crud['where'] = array("t1.servicio_id" => $servicio['id'], "t1.estado !=" => 0);
      $data_crud['order_by'] = "t1.id ASC";
      $servicio_detalle = $this->Crud->getRows($data_crud);
      $data['servicio_detalle'] = $servicio_detalle;

      $data['head_info'] = head_info($servicio,'servicio'); //siempre
      $this->template->title('Servicio');
      $this->template->build('paginas/servicio', $data);
    }

    /**
     * Carrusel travel
     */
    function carrusel(){
      $this->load->view('paginas/motores/carrusel_travel');
    }

    /**
     * Carrusel travel
     */
    function carrusellist(){
      $this->load->view('paginas/motores/carrusellist');
    }

    /**
     * Despegar
     */
    function despegar(){
      $this->load->view('paginas/motores/despegar');
    }



  }

  /* End of file categorias.php */
/* Location: ./application/controllers/waadmin/categorias.php */