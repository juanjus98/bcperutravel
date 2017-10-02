<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Paquetes extends CI_Controller {
  public $website_info;

  function __construct() {
    parent::__construct();
    $this->template->set_layout('website.php');

    $this->load->model('inicio_model', 'Inicio');

    $this->load->model('productos_model', 'Productos');
    $this->load->model("crud_model","Crud");

    /**
     * Información del website
     */
    $this->website_info = $this->Inicio->get_website();
  }

  public function index() {
    $data['active_link'] = "inicio";

    $data['website'] = $this->Inicio->get_website();
    $data['head_info'] = head_info($data['website']); //siempre

    $data['paquetes'] = $this->Productos->listado(10,0);


    $this->template->title('Paquetes');
    $this->template->build('paginas/paquetes', $data);
  }

}

  /* End of file categorias.php */
/* Location: ./application/controllers/Paquetes.php */