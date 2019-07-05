<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_referencia extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('referencia');
        parent::setAlias('r');
        parent::setTabla_id('idreferencia');
    }

    public function get_query() {
        $this->CI->db->select("r.idreferencia, r.nombre, r.idusuario, r.oculto");
        $this->CI->db->from($this->tabla . " r");
    }

}
