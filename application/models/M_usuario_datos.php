<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_usuario_datos extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('usuario_datos');
        parent::setAlias('ud');
        parent::setTabla_id('idusuariodatos');
        /*
         * Configuraci�n de informaci�n
         */
    }

    public function get_query() {
        $this->CI->db->select("ud.idusuariodatos, ud.nombres, ud.apellidos, ud.fecha_registro, ud.email,"
                            ." ud.idusuario, ud.imagen, u.usuario as usuario, u.idnivel as nivel_id,"
                            ." nu.nombre as nivel, u.idsede, ud.oculto");
        $this->CI->db->from($this->tabla . " ud");
        $this->CI->db->join("usuario u", "u.idusuario = ud.idusuario" ,"inner");
        $this->CI->db->join('nivel_usuario nu', 'u.idnivel= nu.idnivel', 'inner');
        
    }

}

