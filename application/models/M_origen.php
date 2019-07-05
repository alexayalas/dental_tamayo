<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_origen extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('origen');
        parent::setAlias('o');
        parent::setTabla_id('idorigen');
    }

    public function get_query() {
        $this->CI->db->select("o.idorigen, o.nombre, o.url, o.oculto");
        $this->CI->db->from($this->tabla . " o");
    }

}
