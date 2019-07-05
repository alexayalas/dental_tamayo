<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_especialidad extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('especialidad');
        parent::setAlias('e');
        parent::setTabla_id('idespecialidad');
    }

    public function get_query() {
        $this->CI->db->select("e.idespecialidad, e.nombre, e.idusuario, e.oculto");
        $this->CI->db->from($this->tabla . " e");
    }

}
