<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_bitacora extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('bitacora');
        parent::setAlias('b');
        parent::setTabla_id('idbitacora');
    }

    public function get_query() {
        $this->CI->db->select("b.idbitacora, b.descripcion, b.tipo, b.fecha_registro, b.idusuario, b.oculto, u.usuario,"
                            ." b.modulo");
        $this->CI->db->from($this->tabla . " b");
        $this->CI->db->join("usuario u", "u.idusuario = b.idusuario", "inner");
    }

}
