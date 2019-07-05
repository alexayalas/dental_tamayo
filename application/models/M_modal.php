<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_modal extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('modal');
        parent::setAlias('m');
        parent::setTabla_id('idmodal');
    }

    public function get_query() {
        $this->CI->db->select("m.idmodal, m.titulo, m.imagen, m.url, m.fecha_registro, m.fecha_modificacion,"
                            ." m.fecha_vencimiento, m.idusuario, m.oculto");
        $this->CI->db->from($this->tabla . " m");
    }

}
