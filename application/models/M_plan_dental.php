<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_plan_dental extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('plan_dental');
        parent::setAlias('pp');
        parent::setTabla_id('idplandental');
    }

    public function get_query() {
        $this->CI->db->select("*");
        $this->CI->db->from($this->tabla . " pp");
    }

}
