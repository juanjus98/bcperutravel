<?php
class Menus_model extends CI_Model {

  function __construct() {
   parent::__construct();
}

function listado($limit, $start, $data = NULL) {

    $where_array = array('t1.estado != ' => 0);

    if (!empty($data['nombre'])) {
        $where_array["t1.nombre"] = $data['nombre'];
    }

   if (!empty($data['campo'])) {
       $like[$data['campo']] = $data['busqueda'];
   } else {
       $like['t1.nombre'] = "";
   }

        //ORDENAR POR
    if (!empty($data['ordenar_por'])) {
        $order_by = $data['ordenar_por'] . ' ' . $data['ordentipo'];
    } else {
        $order_by = 't1.orden ASC';
    }

    if ($start > 0) {
        $start = ($start - 1) * $limit;
    }

    $resultado = $this->db->select("t1.*")
    ->where($where_array)
    ->like($like)
    ->order_by($order_by)
    ->limit($limit, $start)
    ->get("menu_web as t1")
    ->result_array();

//       echo $this->db->last_query();

    return $resultado;
}


function total_registros($data = NULL) {
    $where_array = array('t1.estado != ' => 0);

    if (!empty($data['nombre'])) {
        $where_array["t1.nombre"] = $data['nombre'];
    }

    if (!empty($data['campo'])) {
        $like[$data['campo']] = $data['busqueda'];
    } else {
        $like['t1.nombre'] = "";
    }

    $resultado = $this->db->select("t1.*")
    ->where($where_array)
    ->like($like)
    ->get("menu_web as t1")
    ->num_rows();

    return $resultado;
}


function get_row($data) {
    $where = array('t1.estado != ' => 0);

    if(!empty($data['id'])){
        $where['t1.id'] = $data['id'];
    }

    if(!empty($data['url_key'])){
        $where['t1.url_key'] = $data['url_key'];
    }

    $resultado = $this->db->select("t1.*")
    ->where($where)
    ->get("menu_web as t1")
    ->row_array();

    return $resultado;
}

/**
 * Listar para categorias solo principales
 */
function listado_principal() {

    $where_array = array(
        't1.parent_id' => 0,
        't1.estado != ' => 0
    );

    //ORDENAR POR
    if (!empty($data['ordenar_por'])) {
        $order_by = $data['ordenar_por'] . ' ' . $data['ordentipo'];
    } else {
        $order_by = 't1.orden ASC';
    }

    $resultado = $this->db->select("t1.*")
    ->where($where_array)
    ->order_by($order_by)
    ->get("menu_web as t1")
    ->result_array();

//       echo $this->db->last_query();

    return $resultado;
}

}