<?php

class Ciudades_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    /**
     * Total de ciudades
     *
     * Muestra el total de ciudades
     *
     * @package		ciudades
     * @author		Juan Julio Sandoval Layza
     * @copyright   webApu.com 
     * @since		2017-07-07
     * @version		Version 1.0
     */
    function total_registros($data = NULL) {
        //Where
        $where = array(
            't1.estado != ' => 0,
            't2.estado != ' => 0,
            't2.publicar' => 1,
        );

        if (!empty($data['country'])) {
            if($data['country'] == 'ALL'){
                $where["t1.country !="] = 'Peru';
            }else{
                $where["t1.country"] = $data['country'];
            }
        }

        if (!empty($data['categoria_id'])) {
            $where["t2.categoria_id"] = $data['categoria_id'];
        }

        //Like
        if (!empty($data['campo']) && !empty($data['busqueda'])) {
            $like[$data['campo']] = $data['busqueda'];
        } else {
            $like["t1.city"] = "";
        }

        $resultado = $this->db->select("t1.*")
        ->join('producto as t2','t2.paquete_ciudad = t1.id')
        ->where($where)
        ->like($like)
        ->group_by('t1.id')
        ->get("ciudades as t1")
        ->num_rows();

        return $resultado;
    }

    /**
     * Listado de ciudades
     *
     * Muestra un listado de todas las ciudades
     *
     * @package		ciudades
     * @author		Juan Julio Sandoval Layza
     * @copyright   webApu.com 
     * @since		2017-07-07
     * @version		Version 1.0
     */
    function listado($limit, $start, $data = NULL) {
        //Where
        $where = array(
            't1.estado != ' => 0,
            't2.estado != ' => 0,
            't2.publicar' => 1,
        );

        if (!empty($data['country'])) {
            if($data['country'] == 'ALL'){
                $where["t1.country !="] = 'Peru';
            }else{
                $where["t1.country"] = $data['country'];
            }
        }

        if (!empty($data['categoria_id'])) {
            $where["t2.categoria_id"] = $data['categoria_id'];
        }

        //Like
        if (!empty($data['campo']) && !empty($data['busqueda'])) {
            $like[$data['campo']] = $data['busqueda'];
        } else {
            $like["t1.city"] = "";
        }

        //ORDENAR POR
        if (!empty($data['ordenar_por'])) {
            $order_by = $data['ordenar_por'] . ' ' . $data['ordentipo'];
        } else {
            $order_by = 't1.agregar DESC';
        }

        if ($start > 0) {
            $start = ($start - 1) * $limit;
        }

        $resultado = $this->db->select("t1.*, count(t2.id) As n_productos")
        ->join('producto as t2','t2.paquete_ciudad = t1.id')
        ->where($where)
        ->like($like)
        ->group_by('t1.id')
        ->order_by('t1.city', 'Asc')
        ->limit($limit, $start)
        ->get("ciudades as t1")
        ->result_array();

        /*echo $this->db->last_query();
        die();*/

        return $resultado;
    }

/**
     * Listado de ciudades
     *
     * Muestra un listado de todas las ciudades
     *
     * @package     ciudades
     * @author      Juan Julio Sandoval Layza
     * @copyright   webApu.com 
     * @since       2017-07-07
     * @version     Version 1.0
     */
    function listado_all($data = NULL) {
        //Where
        $where = array('t1.estado != ' => 0);

        //Where
        if (!empty($data['country'])) {
            $where["t1.country"] = $data['country'];
        }

        //Like
        if (!empty($data['campo']) && !empty($data['busqueda'])) {
            $like[$data['campo']] = $data['busqueda'];
        } else {
            $like["t1.city"] = "";
        }

        //ORDENAR POR
        if (!empty($data['ordenar_por'])) {
            $order_by = $data['ordenar_por'] . ' ' . $data['ordentipo'];
        } else {
            $order_by = 't1.city ASC';
        }

        $resultado = $this->db->select("t1.id, t1.country, t1.city as name")
        ->where($where)
        ->like('city', $data['busqueda'])
        ->order_by($order_by)
        ->get("ciudades as t1")
        ->result_array();


        /*echo $this->db->last_query();*/

        return $resultado;
    }


    /**
     * Cosultar ciudades
     *
     * Trae la información de una categoria
     *
     * @package		ciudades
     * @author		Juan Julio Sandoval Layza
     * @copyright   webApu.com 
     * @since		2017-07-07
     * @version		Version 1.0
     */
    function get_row($data) {
        $where = array('t1.estado != ' => 0);

        if(!empty($data['id'])){
            $where['t1.id'] = $data['id'];
        }

        if(!empty($data['country'])){
            $where['t1.country'] = $data['country'];
        }

        $result = $this->db->select("t1.*")
        ->where($where)
        ->get("ciudades as t1")
        ->row_array();

        return $result;
    }

}
