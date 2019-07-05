<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_origen_formulario extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('origen_formulario');
        parent::setAlias('of');
        parent::setTabla_id('idorigenform');
    }

    public function get_query() {
        $this->CI->db->select("of.idorigenform, of.nombre, of.url, of.oculto");
        $this->CI->db->from($this->tabla . " of");
    }

}
