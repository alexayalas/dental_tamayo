<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_sede extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('sede');
        parent::setAlias('s');
        parent::setTabla_id('idsede');
    }

    public function get_query() {
        $this->CI->db->select("s.idsede, s.codigo, s.nombre, s.direccion, s.telefono, s.fecha_registro, s.fecha_modificacion, "
                            ." s.latitud, s.longitud ,s.idorigen, s.idusuario, s.oculto, o.nombre as origen, s.directo, s.joz, s.folder");
        $this->CI->db->from($this->tabla . " s");
        $this->CI->db->join("origen o", "o.idorigen = s.idorigen", "inner");
    }

}