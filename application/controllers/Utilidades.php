<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Utilidades extends CI_Controller {
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

  function __construct() {
    parent::__construct();
    $this->load->model('inicio_model', 'Inicio');

    $this->load->model("crud_model","Crud");

    /**
     * Información del website
     */
    $this->website_info = $this->Inicio->get_website();
  }


  public function index() {
    $this->logos();
  }

  /**
   * Logos
   */
  public function logos() {
    $data['listado'] = array();
    $this->load->view('utilidades/logos', $data);
  }


}

/* End of file categorias.php */
/* Location: ./application/controllers/Utilidades.php */