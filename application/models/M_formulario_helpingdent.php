<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_formulario_helpingdent extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('formulario_helpingdent');
        parent::setAlias('fh');
        parent::setTabla_id('idformulariohelping');
    }

    public function get_query() {
        $this->CI->db->select("fh.*, e.nombre as especialidad, s.nombre as sede, s.direccion");
        $this->CI->db->from($this->tabla . " fh");
        $this->CI->db->join("especialidad e", "e.idespecialidad = fh.idespecialidad", "inner");
        $this->CI->db->join("sede s", "s.idsede = fh.idsede", "inner");
    }

    public function select_rango($fi, $ff){
        $sql = "SELECT fh.*, e.nombre as especialidad, r.nombre as referencia, s.nombre as sede, of.nombre as origen, s.direccion
            FROM formulario_helpingdent fh
            JOIN especialidad e ON fh.idespecialidad = e.idespecialidad
            JOIN referencia r ON fh.idreferencia = r.idreferencia
            JOIN sede s ON fh.idsede = s.idsede
            JOIN origen_formulario of ON fh.idorigen = of.idorigenform
            WHERE fh.oculto = 0 AND fh.idorigen = 1 AND DATE(fh.fecha_registro) BETWEEN '".$fi."' AND '".$ff."'
            ORDER BY fh.idformulario DESC";

        $resultSet=  $this->CI->db->query($sql)->result_array();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return false;
        }

        return $data;
    }

}