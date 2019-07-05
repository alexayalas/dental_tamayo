<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_categoria extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('categoria');
        parent::setAlias('c');
        parent::setTabla_id('idcategoria');
    }

    public function get_query() {
        $this->CI->db->select("c.idcategoria, c.nombre, c.url, c.fecha_registro, c.fecha_modificacion, c.idusuario, c.oculto");
        $this->CI->db->from($this->tabla . " c");
    }

}
