<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_control extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('control');
        parent::setAlias('c');
        parent::setTabla_id('idcontrol');
    }

    public function get_query() {
        $this->CI->db->select("c.idcontrol, c.ip, c.accion, c.fecha_registro, c.idpersonal, c.oculto, p.nombre_personal, p.correo, p.tipo, "
                            ." s.nombre as sede, s.direccion");
        $this->CI->db->from($this->tabla . " c");
        $this->CI->db->join("personal p", "p.idpersonal = c.idpersonal", "inner");
        $this->CI->db->join("sede s", "s.idsede = p.idsede", "inner");
    }

    public function select_rango($fi, $ff){
        $sql = "SELECT c.*, p.nombre_personal, p.correo, p.tipo, s.nombre as sede, s.direccion
            FROM control c
            JOIN personal p ON c.idpersonal = p.idpersonal
            JOIN sede s ON s.idsede = p.idsede
            WHERE c.oculto = 0  AND DATE(c.fecha_registro) BETWEEN '".$fi."' AND '".$ff."'
            ORDER BY c.idcontrol DESC";

        $resultSet=  $this->CI->db->query($sql)->result_array();
        if (count($resultSet) > 0) {
            return $resultSet;
        } else {
            return false;
        }

        return $data;
    }
}
