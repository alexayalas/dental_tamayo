<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_configuracion extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('configuracion');
        parent::setAlias('c');
        parent::setTabla_id('id');
    }

    public function get_query() {
        $this->CI->db->select("c.id,c.campo,c.valor,c.oculto");
        $this->CI->db->from($this->tabla . " c");
        //$this->CI->db->order_by("c.id", "desc");
    }

}
