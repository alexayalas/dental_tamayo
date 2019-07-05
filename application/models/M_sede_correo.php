<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_sede_correo extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('sede_correo');
        parent::setAlias('sc');
        parent::setTabla_id('idsedecorreo');
    }

    public function get_query() {
        $this->CI->db->select("sc.idsedecorreo, sc.idsede, sc.idcorreo, sc.oculto, c.email as correo, s.nombre as sede");
        $this->CI->db->from($this->tabla . " sc");
        $this->CI->db->join("correo c", "c.idcorreo = sc.idcorreo", "inner");
        $this->CI->db->join("sede s", "s.idsede = sc.idsede", "inner");
    }

}
