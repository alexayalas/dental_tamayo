<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_personal extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('personal');
        parent::setAlias('p');
        parent::setTabla_id('idpersonal');
    }

    public function get_query() {
        $this->CI->db->select("p.idpersonal, p.nombre_personal, p.correo, p.password, p.logeado, p.fecha_registro, p.idsede, p.oculto, p.tipo");
        $this->CI->db->from($this->tabla . " p");
    }

}
