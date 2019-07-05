<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_semefa extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('semefa');
        parent::setAlias('se');
        parent::setTabla_id('idsemefa');
    }

    public function get_query() {
        $this->CI->db->select("*");
        $this->CI->db->from($this->tabla . " se");
    }

}
