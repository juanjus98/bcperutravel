<?php
class Crud_model extends CI_Model {

  function __construct() {
     parent::__construct();
  }

  public function set_post($data,$sessionName) {
     if ($data) {
         $this->session->set_userdata($sessionName, $data);
         return $data;
     } elseif ($this->session->userdata($sessionName)) {
         $data = $this->session->userdata($sessionName);
         return $data;
     } else {
         $data = "";
         return $data;
     }
  }

 /**
 * Trae registros.
 * Consulta los registro de una tabla.
 *
 * @package Crud_model
 * @license http://www.webapu.com
 * @copyright webApu.com
 * @author Juan Julio Sandoval <juanjus98@gmail.com>
 * @since 2017-01-05
 * @version 0.1
 * @param array $data
 * @return array
 */
 function getRows($data) {
   $result = $this->db->select($data['columns'])
   ->where($data['where'])
   ->order_by($data['order_by'])
   ->get($data['table'])
   ->result_array();
   return $result;
}

 /**
 * Trae registros de una fila.
 * Consulta un registro de una tabla.
 *
 * @package Crud_model
 * @license http://www.webapu.com
 * @copyright webApu.com
 * @author Juan Julio Sandoval <juanjus98@gmail.com>
 * @since 2017-01-05
 * @version 0.1
 * @param array $data
 * @return array
 */
 function getRow($data) {
   $result = $this->db->select($data['columns'])
   ->where($data['where'])
   ->get($data['table'])
   ->row_array();
   return $result;
}

 /**
 * Insertar una nuevo registro.
 * Inserta un nuevo registro en una tabla.
 *
 * @package Crud_model
 * @license http://www.webapu.com
 * @copyright webApu.com
 * @author Juan Julio Sandoval <juanjus98@gmail.com>
 * @since 2017-01-05
 * @version 0.1
 * @param array $data
 * @return bool
 */

 function insertRow($data) {
     $result = $this->db->insert($data['table'], $data['columns']);
     return $result;
 }

 /**
 * Actualizar registro.
 * Actualiza un registro en una tabla.
 *
 * @package Crud_model
 * @license http://www.webapu.com
 * @copyright webApu.com
 * @author Juan Julio Sandoval <juanjus98@gmail.com>
 * @since 2017-01-05
 * @version 0.1
 * @param array $data
 * @return bool
 */

 function updateRow($data) {
    $this->db->where($data['where']);
    $result = $this->db->update($data['table'], $data['columns']);
    return $result;
}


/**
 * Url key
 */
function get_urlkey($data){
  $tipo = $data['tipo'];
  $urlkey = $data['urlkey'];
  $urlkey = url_title(convert_accented_characters($urlkey),'-', TRUE);
  $data['urlkey'] = $urlkey;
  $rand_str = strtolower(random_string('alpha', 2));
  //Validamos que el codigo no exista en la tabla urlkey
  if(!$this->valida_urlkey($data)){
    $result = $urlkey;
  }else{
    $result = $urlkey . "-" .$rand_str;
  }
  return $result;
}

function valida_urlkey($data){
  $where['tipo'] = $data['tipo'];
  $where['urlkey'] = $data['urlkey'];

  $result = $this->db->select("*")
   ->where($where)
   ->get('urlkey')
   ->row_array();
   if(!empty($result)){
    return true;
   }else{
    return false;
   }
}

/**
 * Paises
 */
function getPaises(){
  $jsonPaises = json_decode(file_get_contents('https://restcountries.eu/rest/v2/all'));
  return $jsonPaises;
}

/**
 * Ubigeo peru
 */
function getUbigeoPeru(){
  $json_file = 'assets/json/ubigeo/ubigeo-peru.json';
  $jsonResult = json_decode(file_get_contents($json_file));
  return $jsonResult; 
}

/**
 * Ubigeo Departamentos y provincias
 */
function getUbigeoDP(){
  $result = $this->getUbigeoPeru();
  $departamentos = array();
  $provincias = array();

  foreach ($result as $key => $value) {
    if($value->provincia == '00'){
      $departamentos[$value->departamento] = $value; 
      $resultado[$value->departamento] = $value;
    } 

    if($value->distrito == '00' && $value->provincia != '00'){
      $departamento = $departamentos[$value->departamento];
      $value->nombre = $departamento->nombre . ', ' . $value->nombre;
      $provincias[$value->departamento . $value->provincia] = $value;
      $resultado[$value->departamento . $value->provincia] = $value;
    }

  }

  return $resultado;

}

}