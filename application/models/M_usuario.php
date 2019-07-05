<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_usuario extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('usuario');
        parent::setAlias('u');
        parent::setTabla_id('idusuario');

    }

    public function get_query() {
        $this->CI->db->select("u.idusuario, u.usuario, u.password, u.idnivel, u.conectado, u.desconectado,"
                            ." nu.nombre AS nivel, u.oculto");
        $this->CI->db->from($this->tabla . " u");
        $this->CI->db->join('nivel_usuario nu', 'u.idnivel= nu.idnivel', 'inner');
    }

    public function existe_usuario($usuario, $idusuario = '') {
        if ($idusuario == '') {
            $resultSet = $this->CI->db->select()
                    ->from('usuario')
                    ->where('usuario.usuario', $usuario)
                    ->get()
                    ->result();
        } else {
            $stm = $this->CI->db->select(''
                            . 'usuario.usuario AS e_usuario')
                    ->from('usuario')
                    ->where('usuario.idusuario', $idusuario)
                    ->get()
                    ->result();
            $resultSet = $this->CI->db->select()
                    ->from('usuario')
                    ->where('usuario.usuario !=', $stm[0]->e_usuario)
                    ->where('usuario.usuario', $usuario)
                    ->get()
                    ->result();
        }
        if (count($resultSet) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function success_usuario($username, $password) {
        $resultSet = $this->CI->db->select(''
                        . 'usuario.idusuario AS u_idusuario, '
                        . 'usuario.usuario AS u_usuario, '
                        . 'usuario.password AS u_password, '
                        . 'usuario.idsede AS u_idsede, '
                        . 'usuario.idnivel AS u_nivel')
                ->from('usuario')
                ->where('usuario.usuario', $username)
                ->where('usuario.password', $password)
                ->where('usuario.oculto', '0')
                ->get()
                ->result();
        $data = array(
            'conectado' => date("Y-m-d H:i:s")//date("Y-m-d H:i:s")
        );
        if (count($resultSet) > 0) {
            $this->CI->db->where('usuario', $username)
                    ->where('password', $password)
                    ->update('usuario', $data);
            return $resultSet[0];
        } else {
            return FALSE;
        }
    }

    public function update_disconnect($idusuario) {
        $data = array(
            'desconectado' => date("Y-m-d H:i:s")
        );
        $this->CI->db->where('idusuario', $idusuario)->update('usuario', $data);
    }

}