<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_coctel extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('coctel');
        parent::setAlias('c');
        parent::setTabla_id('idcoctel');
    }

    public function get_query() {
        $this->CI->db->select("c.*");
        $this->CI->db->from($this->tabla . " c");
    }

}
