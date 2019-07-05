<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_formulario_franquicia extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('formulario_franquicias');
        parent::setAlias('ff');
        parent::setTabla_id('idformulariofranquicia');
    }

    public function get_query() {
        $this->CI->db->select("ff.*");
        $this->CI->db->from($this->tabla . " ff");
        
    }


}