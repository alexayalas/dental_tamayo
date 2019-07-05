<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_nivel extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('nivel_usuario');
        parent::setAlias('n');
        parent::setTabla_id('idnivel');
    }

    public function get_query() {
        $this->CI->db->select("n.idnivel, n.nombre,n.oculto");
        $this->CI->db->from($this->tabla . " n");
    }

}
