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

  public $upload_path;

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

    $this->upload_path = $this->config->item('upload_path');
  }


  public function index() {
    //Limpiar session de busqueda ses_search
    unset($_SESSION['ses_search']);
    unset($_SESSION['ses_products']);

    $data['upload_path'] = $this->config->item('upload_path');

    //Consultar ciudades
    /*$this->load->model('ciudades_model', 'Ciudades');
    $total_ciudades = $this->Ciudades->total_registros();
    $ciudades = $this->Ciudades->listado($total_ciudades, 0);
    $data['ciudades'] = $ciudades;*/

    $data['active_link'] = "inicio";

    $data['website'] = $this->Inicio->get_website();
    $data['head_info'] = head_info($data['website']); //siempre

    //Slider
    $data_crud['table'] = "slider as t1";
    $data_crud['columns'] = "t1.*";
    $data_crud['where'] = array("t1.estado !=" => 0);
    $data_crud['order_by'] = "t1.orden Asc";
    $data['slider'] = $this->Crud->getRows($data_crud);

    //Banners
    $data_crud_banner['table'] = "banner as t1";
    $data_crud_banner['columns'] = "t1.*";
    $data_crud_banner['where'] = array("t1.estado !=" => 0);
    $data_crud_banner['order_by'] = "t1.orden Asc";
    $data['banners'] = $this->Crud->getRows($data_crud_banner);

    //Proeductos destacados
    $data['destacados'] = $this->getDestacados(8);

    $this->template->title('Inicio');
    $this->template->build('paginas/index', $data);
  }

  //Productos
  public function productos($categoria_url_key,$arg2=null, $arg3=null) {

    //$uri_segment = (isset($arg2) && is_numeric($arg2)) ? 3 : 4 ;

    if(isset($arg2) && is_numeric($arg2)){
      $uri_segment = 3;
      $base_url = base_url('c/'. $categoria_url_key);
    }else{
      $uri_segment = 4;
      $base_url = base_url('c/'. $categoria_url_key . '/' . $arg2);
    }
   
    /**
      * Listar productos
    */
    $sessionName = 'ses_products';

    //$base_url = base_url('c/'. $categoria_url_key);
    $per_page = 15; //registros por página
    //$uri_segment = 3; //segmento de la url
    $num_links = 4; //número de links
    //Página actual
    $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

    //Consultar Categoría
    $data_categoria = array('url_key' => $categoria_url_key,);
    $categoria = $this->Categorias->get_row($data_categoria);
    $data['categoria'] = $categoria;

    //Setear post
    $data_prod['publicar'] = 1; //Muestra solo las que están publicadas
    $data_prod['categoria_id'] = $categoria['id'];
    $data_prod['ambito'] = (!empty($gets['amb'])) ? strtoupper($gets['amb']) : '';
    $data_prod['paquete_ciudad'] = (!empty($gets['city'])) ? $gets['city'] : '';

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

  //Productos
  public function productos_ambito($categoria_url_key,$arg2=null, $arg3=null) {
    //ambito = NAL, INTL
    $ambito = ($arg2 == 'nacionales') ? 'NAL' : 'INTL';

    if ($arg2 == 'nacionales') {
      $ambito = 'NAL';
      $country = 'Peru';
      $data['subtitulo'] = 'Nacionales';
      $data['ambito'] = 'nacionales';
    }

    if ($arg2 == 'internacionales') {
      $ambito = 'INTL';
      $country = 'ALL';
      $data['subtitulo'] = 'Internacionales';
      $data['ambito'] = 'internacionales';
    }

    if(isset($arg2) && is_numeric($arg2)){
      $uri_segment = 3;
      $base_url = base_url('c/'. $categoria_url_key);
    }else{
      $uri_segment = 4;
      $base_url = base_url('c/'. $categoria_url_key . '/' . $arg2);
    }


    /**
      * Listar productos
    */
    $sessionName = 'ses_products';

    //$base_url = base_url('c/'. $categoria_url_key);
    $per_page = 16; //registros por página
    //$uri_segment = 3; //segmento de la url
    $num_links = 4; //número de links
    //Página actual
    $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

    //Consultar Categoría
    $data_categoria = array('url_key' => $categoria_url_key,);
    $categoria = $this->Categorias->get_row($data_categoria);
    $data['categoria'] = $categoria;

  //Consultar ciudades
    $data_ciudades = array(
      'country' => $country,
      'categoria_id' => 6,
    );

    $total_ciudades = $this->Ciudades->total_registros($data_ciudades);
    $ciudades = $this->Ciudades->listado($total_ciudades, 0, $data_ciudades);
    $data['ciudades'] = $ciudades;

    //Setear post
    $data_prod['publicar'] = 1; //Muestra solo las que están publicadas
    $data_prod['categoria_id'] = $categoria['id'];
    $data_prod['ambito'] = $ambito;
    $data_prod['paquete_ciudad'] = (!empty($gets['city'])) ? $gets['city'] : '';

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

    $this->template->title('Productos');
    $this->template->build('paginas/productos_ambito', $data);
  }

//Productos
  public function productos_ciudad($city_id,$arg2=null, $arg3=null) {
    //Consultar ciudad
    $data_ciudad = array('id' => $city_id, );
    $ciudad = $this->Ciudades->get_row($data_ciudad);

    $data['titulo'] = 'Paquetes Turísticos';
    $data['subtitulo'] = $ciudad['city'];

    if ($ciudad['country'] == 'Peru') {
      $ambito = 'NAL';
      $country = $ciudad['country'];
    }else{
      $ambito = 'INTL';
      $country = 'ALL'; 
      //Internacional
    }

    //Consultar ciudades
    $data_ciudades = array(
      'country' => $country,
      'categoria_id' => 6,
    );
    $total_ciudades = $this->Ciudades->total_registros($data_ciudades);
    $ciudades = $this->Ciudades->listado($total_ciudades, 0, $data_ciudades);
    $data['ciudades'] = $ciudades;
   
    /**
      * Listar productos
    */
    $sessionName = 'ses_products';

    $base_url = base_url('paquetes-nacionales/' . $city_id . '-' . $arg2);
    $per_page = 16; //registros por página
    $uri_segment = 3; //segmento de la url
    $num_links = 4; //número de links
    //Página actual
    $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

    //Consultar Categoría
    /*$data_categoria = array('url_key' => $categoria_url_key,);
    $categoria = $this->Categorias->get_row($data_categoria);
    $data['categoria'] = $categoria;*/

    //Setear post
    $data_prod['publicar'] = 1; //Muestra solo las que están publicadas
    $data_prod['categoria_id'] = 6;    
    $data_prod['ambito'] = $ambito;
    $data_prod['paquete_ciudad'] = $city_id;

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

    $this->template->title('Productos');
    $this->template->build('paginas/productos_ciudad', $data);
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

    if ($this->input->post()) {
      $post= $this->input->post();
      $this->reservar($post, $producto);
      die();
    }

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
    //Consultar ciudades
    /*$this->load->model('ciudades_model', 'Ciudades');*/
    $post_ciudades = array('country' => 'Peru');
    $total_ciudades = $this->Ciudades->total_registros($post_ciudades);
    $ciudades = $this->Ciudades->listado($total_ciudades, 0, $post_ciudades);
    $data['ciudades_peru'] = $ciudades;

    $current_url = current_url();
    $gets = $_GET;

    $data['link_int'] = $current_url . '?amb=intl';
    $data['link_nac'] = $current_url . '?amb=nal';

    $data['active_int'] = ($gets['amb']=='intl') ? 'active' : '' ;
    $data['active_nac'] = ($gets['amb']=='nal') ? 'active' : '' ;
    

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
    $data_prod['publicar'] = 1; //Muestra solo las que están publicadas
    $data_prod['categoria_id'] = $categoria['id'];
    $data_prod['ambito'] = (!empty($gets['amb'])) ? strtoupper($gets['amb']) : '';
    $data_prod['paquete_ciudad'] = (!empty($gets['city'])) ? $gets['city'] : '';

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


/**
 * Reservar
 */
public function reservar_bk()
{
    /*$ema = $this->input->post('txtEmailUsuario');
    $nom = $this->input->post('txtNombreUsuario');
    $tel = $this->input->post('txtTelefonoUsuario');
    $tip = $this->input->post('txtTipoServicio');
    $des = $this->input->post('txtNombrePaqueteSol');
    $mfe = $this->input->post('txtFechaViaje');
    $adu = $this->input->post('txtCantidadAdultos');
    $nin = $this->input->post('txtCantidadNinos');
    $men = $this->input->post('txtMensajeSolicitar');*/

    //$res = $this->Paquetes_model->solicitarPaquete($ema, $nom, $tel, $paq, $ser, $mfe, $adu, $nin, $men);

    $this->load->library('email');
    
    $config['protocol'] = 'sendmail';
    $config['mailpath'] = '/usr/sbin/sendmail';
    $config['charset'] = 'iso-8859-1';
    $config['wordwrap'] = TRUE;
    $config['mailtype'] = 'html';

    $this->email->initialize($config);

    $this->email->from("juanjus98@gmail.com", "bcperutravel Test");
    /*$this->email->to('juanjus98@gmail.com', 'Solicitud - Paquete turistico');*/
    $this->email->to('reservas@bcperutravel.com', 'Solicitud - Paquete turistico');
    $this->email->subject('PRUEBA DE CORREO V3');
    $this->email->message('<h1>PRUEBA ENVIADO POR JUAN JULIO</h1>');
    if ($this->email->send()) {
      $msg = 'ENVIADO PRUEBA!!';
    }
    else {
      $msg = 'NO ENVIADO';
    }

    echo "<br>";

    print_r($this->email->print_debugger());

    echo $msg;
  }

  public function reservar($post,$data) {
/*  echo "<pre>";
  print_r($data);
  echo "</pre>";*/

//Imagen principal
  $imagen_2 = $data['imagen_2'];
  $urlImagen = (!empty($imagen_2)) ? base_url($this->config->item('upload_path') . $imagen_2) : base_url('assets/images/no-image.jpg') ;

//URL
  $categoria_key = $data['categoria_key'];
  $url_key = $data['url_key'];
  $url_servicio = base_url($categoria_key."/".$url_key);

  $servicio_info = array(
    'nombre_servicio' => $data['nombre_largo'],
    'descripcion_servicio' => $data['descripcion'],
    'url_servicio' => $url_servicio,
    'url_imagen' => $urlImagen
  );

  $data_email['servicio'] = $servicio_info;

        //Enviar formulario

            //GUARDAR EN LA BASE DE DATOS LA NUEVA SOLICITUD DE COTIZACIÓN.
  $adultos = (!empty($post['adultos'])) ? strip_tags($post['adultos']) : 0 ;
  $adolecentes = (!empty($post['adolecentes'])) ? strip_tags($post['adolecentes']) : 0 ;
  $ninios = (!empty($post['ninios'])) ? strip_tags($post['ninios']) : 0 ;
  $infantes = (!empty($post['infantes'])) ? strip_tags($post['infantes']) : 0 ;

  $fecha_arribo = (!empty($post['fecha_viaje'])) ? strip_tags($post['fecha_viaje']) : '' ;

  $data_insert = array(
              /*"tipo_info" => strip_tags($post['tipo_info']),
              "id_info" => strip_tags($post['id_info']),
              "date_desde" => strip_tags($post['dateDesde']),
              "date_hasta" => strip_tags($post['dateHasta']),
              "pais_origen" => strip_tags($post['pais_origen']),
              "ciudad" => strip_tags($post['ciudad']),*/
              "fecha_arribo" => $fecha_arribo,
              /*"adultos" => $adultos,
              "adolecentes" => $adolecentes,
              "ninios" => $ninios,
              "infantes" => $infantes,*/
              "nombres" => strip_tags($post['nombres']),
              "telefono" => strip_tags($post['telefono']),
              /*"celular" => strip_tags($post['celular']),*/
              "email" => strip_tags($post['email']),
              /*"mensaje" => strip_tags($post['mensaje']),*/
              "agregar" => date("Y-m-d H:i:s")
            );

            /*$this->db->insert('reservas', $data_insert);
            $reservas_id = $this->db->insert_id();*/

            //Templates Email
            $data_email['post'] = $data_insert;

            //Otros datos para el email
            $data_email['website'] = $this->Inicio->get_website();

            $cabeceras_email = $this->config->item('waemail');
            /*echo "<pre>";
            print_r($cabeceras_email);
            echo "</pre>";*/
            $titulo_email_admin = 'Reservar - '. $data['nombre_largo'];
            $cabeceras_email['titulo_email_admin'] = $titulo_email_admin;
            $data_email['cabeceras'] = $cabeceras_email;

            $data['servicio'] = $data;
            
            //Template user email
            /*$email_user = $this->load->view('paginas/email/tp_reservar_user', $data_email, TRUE);*/

            //Template admin admin
            $email_admin = $this->load->view('paginas/email/tp_reservar', $data_email, TRUE);

            //Enviar email
            $this->load->library('email');
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';

            $this->email->initialize($config);

            $this->email->from('juanjus98@yahoo.com', utf8_decode('Juan Julio'));
            /*$this->email->reply_to($post['email'], utf8_decode($post['nombres']));*/
            $this->email->to('counter@bcperutravel.com', 'Counter');
            $this->email->cc('juanjus98@gmail.com');
            //$this->email->bcc('them@their-example.com');

            $subject_admin = utf8_decode($titulo_email_admin);
            $this->email->subject($subject_admin);
            $this->email->message($email_admin);
            
            if($this->email->send()){
              echo "ENVIADO!!!";
            }else{
              echo "NO ENVIADO!!";
            }
            
            print_r($this->email->print_debugger());
            echo "<hr>";
            die();

            //ENVIAMOS EMAIL DE CONFIRMACIÓN
            $this->email->clear();
            $this->email->initialize($config);

            $this->email->from('juanjus98@gmail.com', utf8_decode('Reservas BC Perú Travel'));
            $this->email->to($post['email'], utf8_decode($post['nombres']));
            $this->email->subject(utf8_decode('Confirmación de reserva.'));
            $this->email->message($email_user);
            $this->email->send();

            $redirect = $url_servicio . '?ack=success';
            redirect($redirect);
          }

  /**
   * Listar productos destacados
   */
  public function getDestacados($limit){   

    /**
     * Listar productos
     */
    $sessionName = 'ses_products_destacados';

    //Setear post
    $data_prod['publicar'] = 1; //Muestra solo las que están publicadas
    /*$data_prod['categoria_id'] = $categoria['id'];*/
    $data_prod['destacar'] = 1;
    $data_prod['ordenar_por'] = 'destacar_orden';
    $data_prod['ordentipo'] = 'ASC';


    $post = $this->Crud->set_post($data_prod,$sessionName);
    $data['post'] = $post;

    //Total de registros por post
    $data['total_registros'] = $this->Productos->total_registros($post);

    //Listado
    $listado = $this->Productos->listado($limit, 0, $post);

    return $listado;
  }



}

/* End of file categorias.php */
/* Location: ./application/controllers/waadmin/categorias.php */