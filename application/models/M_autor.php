<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_autor extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('autor');
        parent::setAlias('a');
        parent::setTabla_id('idautor');
    }

    public function get_query() {
        $this->CI->db->select("a.idautor, a.nombre, a.descripcion, a.imagen, a.fecha_registro, a.fecha_modificacion, a.idusuario, a.oculto");
        $this->CI->db->from($this->tabla . " a");
    }

}
