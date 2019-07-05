<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_formulario_web extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('formulario_web');
        parent::setAlias('f');
        parent::setTabla_id('idformulario');
    }

    public function get_query() {
        $this->CI->db->select("f.*, e.nombre as especialidad,"
                            ." r.nombre as referencia, s.nombre as sede, of.nombre as origen, s.direccion");
        $this->CI->db->from($this->tabla . " f");
        $this->CI->db->join("especialidad e", "e.idespecialidad = f.idespecialidad", "inner");
        $this->CI->db->join("referencia r", "r.idreferencia = f.idreferencia", "inner");
        $this->CI->db->join("sede s", "s.idsede = f.idsede", "inner");
        $this->CI->db->join("origen_formulario of", "of.idorigenform = f.idorigen", "inner");
    }

    public function select_rango($fi, $ff){
        $sql = "SELECT fw.*, e.nombre as especialidad, r.nombre as referencia, s.nombre as sede, of.nombre as origen, s.direccion
            FROM formulario_web fw
            JOIN especialidad e ON fw.idespecialidad = e.idespecialidad
            JOIN referencia r ON fw.idreferencia = r.idreferencia
            JOIN sede s ON fw.idsede = s.idsede
            JOIN origen_formulario of ON fw.idorigen = of.idorigenform
            WHERE fw.oculto = 0 AND fw.idorigen = 1 AND DATE(fw.fecha_registro) BETWEEN '".$fi."' AND '".$ff."'
            ORDER BY fw.idformulario DESC";

        $resultSet=  $this->CI->db->query($sql)->result_array();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return false;
        }

        return $data;
    }

    public function select_rango2($fi, $ff){
        $sql = "SELECT fw.*, e.nombre as especialidad, r.nombre as referencia, s.nombre as sede, of.nombre as origen, s.direccion
            FROM formulario_web fw
            JOIN especialidad e ON fw.idespecialidad = e.idespecialidad
            JOIN referencia r ON fw.idreferencia = r.idreferencia
            JOIN sede s ON fw.idsede = s.idsede
            JOIN origen_formulario of ON fw.idorigen = of.idorigenform
            WHERE fw.oculto = 0 AND fw.idorigen = 2 AND DATE(fw.fecha_registro) BETWEEN '".$fi."' AND '".$ff."'
            ORDER BY fw.idformulario DESC";

        $resultSet=  $this->CI->db->query($sql)->result_array();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return false;
        }

        return $data;
    }

}