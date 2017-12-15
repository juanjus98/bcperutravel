<?php

class Productos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    /**
     * Total de productos
     *
     * Muestra el total de productos
     *
     * @package		productos
     * @author		Juan Julio Sandoval Layza
     * @copyright   webApu.com 
     * @since		2017-07-07
     * @version		Version 1.0
     */
    function total_registros($data = NULL) {
        //Where
        $where = array('t1.estado != ' => 0);

        //Where
        if (!empty($data['categoria_id'])) {
            $where["t1.categoria_id"] = $data['categoria_id'];
        }

        if(!empty($data['paquete_ciudad'])){
            $where["t1.paquete_ciudad"] = $data['paquete_ciudad'];
        }

        if (!empty($data['ambito'])) {
            $where["t1.ambito"] = $data['ambito'];
        }

        if (!empty($data['destacar'])) {
            $where["t1.destacar"] = $data['destacar'];
        }

        if(!empty($data['publicar'])){
            $where["t1.publicar"] = $data['publicar'];
        }

        //Like
        if (!empty($data['campo']) && !empty($data['busqueda'])) {
            $like[$data['campo']] = $data['busqueda'];
        } else {
            $like["t1.nombre_corto"] = "";
        }

        $resultado = $this->db->select("t1.id")
        /*->join("categoria as t2","t2.id = t1.categoria_id","left")*/
        ->where($where)
        ->like($like)
        ->get("producto as t1")
        ->num_rows();

        return $resultado;
    }

    /**
     * Listado de productos
     *
     * Muestra un listado de todas las productos
     *
     * @package		productos
     * @author		Juan Julio Sandoval Layza
     * @copyright   webApu.com 
     * @since		2017-07-07
     * @version		Version 1.0
     */
    function listado($limit, $start, $data = NULL) {
        //Where
        $where = array('t1.estado != ' => 0);

        //Where
        if (!empty($data['categoria_id'])) {
            $where["t1.categoria_id"] = $data['categoria_id'];
        }

        if (!empty($data['ambito'])) {
            $where["t1.ambito"] = $data['ambito'];
        }

        if (!empty($data['destacar'])) {
            $where["t1.destacar"] = $data['destacar'];
        }

        //Like
        if (!empty($data['campo']) && !empty($data['busqueda'])) {
            $like[$data['campo']] = $data['busqueda'];
        } else {
            $like["t1.nombre_corto"] = "";
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

        $resultado = $this->db->select("t1.*, t2.nombre as categoria_nombre, t2.url_key as categoria_key")
        ->join("categoria as t2","t2.id = t1.categoria_id","left")
        ->where($where)
        ->like($like)
        ->order_by($order_by)
        ->limit($limit, $start)
        ->get("producto as t1")
        ->result_array();

        return $resultado;
    }

    /**
     * Listado de productos tiny
     *
     * Muestra un listado de todas las productos
     *
     * @package     productos
     * @author      Juan Julio Sandoval Layza
     * @copyright   webApu.com 
     * @since       2017-07-07
     * @version     Version 1.0
     */
    function listado_tiny($limit, $start, $data = NULL) {
        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/

        //Where
        $where = array('t1.estado != ' => 0);

        //Where
        if (!empty($data['categoria_id'])) {
            $where["t1.categoria_id"] = $data['categoria_id'];
        }

        if(!empty($data['paquete_ciudad'])){
            /*$value = $data['ciudades'];*/
            $where["t1.paquete_ciudad"] = $data['paquete_ciudad'];
        }

        if(!empty($data['paquete_meses'])){
            $value = $data['paquete_meses'];
            $where["FIND_IN_SET('$value',t1.paquete_meses) !="] = 0;
        }

        if(!empty($data['paquete_noches'])){
            $where["t1.paquete_noches"] = $data['paquete_noches'];
        }

        
        if(!empty($data['ciudad_origen'])){
            $where["t1.ciudad_origen"] = $data['ciudad_origen'];
        }
        
        if(!empty($data['ciudad_destino'])){
            $where["t1.ciudad_destino"] = $data['ciudad_destino'];
        }

        if (!empty($data['ambito'])) {
            $where["t1.ambito"] = $data['ambito'];
        }

        if(!empty($data['publicar'])){
            $where["t1.publicar"] = $data['publicar'];
        }

        if (!empty($data['destacar'])) {
            $where["t1.destacar"] = $data['destacar'];
        }

        //Like
        if (!empty($data['campo']) && !empty($data['busqueda'])) {
            $like[$data['campo']] = $data['busqueda'];
        } else {
            $like["t1.nombre_corto"] = "";
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

        $resultado = $this->db->select("t1.id, t1.categoria_id, t1.nombre_corto, t1.nombre_largo, t1.resumen, t1.url_key, t1.precio_moneda, t1.precio, t1.precio_descuento, t1.mostrar_descuento, t1.imagen_2, t1.paquete_ciudad, t1.paquete_incluye, t1.paquete_noches, t1.ciudad_origen, t1.ciudad_destino, t1.tipo_ticket, t1.tipo_transporte")
        /*->join("categoria as t2","t2.id = t1.categoria_id","left")*/
        ->where($where)
        ->like($like)
        ->order_by($order_by)
        ->limit($limit, $start)
        ->get("producto as t1")
        ->result_array();

        /*echo "<pre>";
        print_r($this->db->last_query());
        echo "</pre>";*/

        return $resultado;
    }

    /**
     * Cosultar producto
     *
     * Trae la información de una categoria
     *
     * @package     productos
     * @author      Juan Julio Sandoval Layza
     * @copyright   webApu.com 
     * @since       2017-07-07
     * @version     Version 1.0
     */
    function get_row($data) {
        $where = array('t1.estado != ' => 0);
        if(!empty($data['id'])){
            $where['t1.id'] = $data['id'];
        }

        if(!empty($data['url_key'])){
            $where['t1.url_key'] = $data['url_key'];
        }

        $result = $this->db->select("t1.*, t2.nombre as categoria_nombre, t2.url_key as categoria_key, t3.nombre as marca_nombre")
        ->join("categoria as t2","t2.id = t1.categoria_id","left")
        ->join("marca as t3","t3.id = t1.marca_id","left")
        ->where($where)
        ->get("producto as t1")
        ->row_array();

        //Consultar bloques y detalles
        $producto_bloques = $this->db->select("t1.*")
        ->where("t1.producto_id =", $result['id'])
        ->where("t1.estado !=", 0)
        ->order_by("t1.id","ASC")
        ->get(" producto_bloque as t1")
        ->result_array();
        if(!empty($producto_bloques)){
            $bloque[1] = array(
                'id' => '', 
                'titulo' => 'Box 1', 
                'descripciones' => array(), 
            );
            foreach ($producto_bloques as $key => $value) {
                //Consultar detalles
                $bloque_detalles = $this->db->select("t1.*")
                ->where("t1.producto_bloque_id =", $value['id'])
                ->where("t1.estado !=", 0)
                ->order_by("t1.id","ASC")
                ->get(" producto_bloque_detalle as t1")
                ->result_array();
                if (!empty($bloque_detalles)) {
                    $descripciones[] = '';
                    foreach ($bloque_detalles as $detalle) {
                        $descripciones[] = $detalle['titulo'];
                    }
                }

                $bloque[$value['id']] = array(
                    'id' => $value['id'], 
                    'titulo' => $value['titulo'], 
                    'descripciones' => $descripciones, 
                );

                unset($descripciones);

            }
        }

        if (!empty($bloque)) {
            $result['wbox_blq'] = $bloque;
        }

        //Caracteristicas
        $producto_caracteristicas = $this->db->select("t1.*")
        ->where("t1.producto_id =", $result['id'])
        ->where("t1.estado !=", 0)
        ->get("producto_caracteristicas as t1")
        ->result_array();
        if (!empty($producto_caracteristicas)) {
            foreach ($producto_caracteristicas as $item) {
                $arr_caracteristicas['titulo'][] = $item['nombre'];
                $arr_caracteristicas['descripcion'][] = $item['descripcion'];
            }
            $result['caracteristicas'] = $arr_caracteristicas;
        }

        //Especificaciones
        $producto_especificaciones = $this->db->select("t1.*")
        ->where("t1.producto_id =", $result['id'])
        ->where("t1.estado !=", 0)
        ->get("producto_especificaciones as t1")
        ->result_array();

        if (!empty($producto_especificaciones)) {
            foreach ($producto_especificaciones as $item) {
                $arr_especificaciones['titulo'][] = $item['nombre'];
                $arr_especificaciones['descripcion'][] = $item['descripcion'];
            }
            $result['especificaciones'] = $arr_especificaciones;
        }


        return $result;
    }

}
