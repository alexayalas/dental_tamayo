<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_suscriptor extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('suscriptor');
        parent::setAlias('s');
        parent::setTabla_id('idsuscriptor');
    }

    public function get_query() {
        $this->CI->db->select("s.idsuscriptor, s.nombre, s.email, s.codigo, s.procedencia, s.fecha_registro, s.ip,"
                            ." s.fecha_confirmacion, s.confirmar, s.oculto");
        $this->CI->db->from($this->tabla . " s");
    }

}
