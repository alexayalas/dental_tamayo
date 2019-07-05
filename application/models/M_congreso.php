<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_congreso extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('congreso');
        parent::setAlias('c');
        parent::setTabla_id('idcongreso');
    }

    public function get_query() {
        $this->CI->db->select("c.*");
        $this->CI->db->from($this->tabla . " c");
    }

}
