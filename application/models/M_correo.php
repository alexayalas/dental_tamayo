<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_correo extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('correo');
        parent::setAlias('c');
        parent::setTabla_id('idcorreo');
    }

    public function get_query() {
        $this->CI->db->select("c.idcorreo, c.email, c.fecha_registro, c.fecha_modificacion, c.oculto");
        $this->CI->db->from($this->tabla . " c");
    }

}
