<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ciudades_json extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ciudades_model', 'Ciudades');
	}

	function index($busqueda) 
	{
		$data_search = array(
			'campo' => 'city',
			'busqueda' => str_replace("%20", " ", $busqueda), 
		);

		$ciudades = $this->Ciudades->listado_all($data_search);

		return $this->output
        ->set_content_type('application/json')
        ->set_status_header(500)
        ->set_output(json_encode($ciudades));
	}

	function filter() 
	{
		
		$data_search = array(
			'campo' => 'city',
			'busqueda' => str_replace("%20", " ", $busqueda), 
		);

		$ciudades = $this->Ciudades->listado_all($data_search);

		return $this->output
        ->set_content_type('application/json')
        ->set_status_header(500)
        ->set_output(json_encode($ciudades));
	}

}

/* End of file images.php */
/* Location: ./application/controllers/Ciudades_json.php */