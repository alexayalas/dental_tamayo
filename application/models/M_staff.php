<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_staff extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('staff');
        parent::setAlias('s');
        parent::setTabla_id('idstaff');
    }

    public function get_query() {
        $this->CI->db->select("s.idstaff, s.nombre, s.especialidad, s.cop, s.descripcion, s.imagen, s.idsede, s.fecha_registro, s.fecha_modificacion, s.idusuario, s.oculto, se.folder, se.nombre as sede");
        $this->CI->db->from($this->tabla . " s");
        $this->CI->db->join("sede se", "se.idsede = s.idsede");
    }

}
