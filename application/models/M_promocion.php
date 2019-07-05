<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_promocion extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('promocion');
        parent::setAlias('p');
        parent::setTabla_id('idpromocion');
    }

    public function get_query() {
        $this->CI->db->select("p.idpromocion, p.nombre, p.imagen, p.fecha_registro, p.idusuario, p.oculto");
        $this->CI->db->from($this->tabla . " p");
    }

}
