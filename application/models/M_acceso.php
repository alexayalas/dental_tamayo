<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_acceso extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('acceso');
        parent::setAlias('a');
        parent::setTabla_id('idacceso');
    }

    public function get_query() {
        $this->CI->db->select("a.idacceso, a.ip, a.accion, a.fecha_registro, a.idusuario, u.usuario, a.oculto");
        $this->CI->db->from($this->tabla . " a");
        $this->CI->db->join("usuario u", "u.idusuario = a.idusuario", "join");
    }

}
