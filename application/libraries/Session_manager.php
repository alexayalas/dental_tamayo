<?php

class Session_manager {

    public function __construct() {
        $this->ci = & get_instance();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('session', 'alerta', 'fecha', 'url_comp');
        $helper = array();
        $model = array('m_usuario','m_usuario_datos', 'm_personal');
        $this->ci->load->library($library);
        $this->ci->load->helper($helper);
        $this->ci->load->model($model);
        /*
         * Configuración personalizada
         */
        $this->_session = $this->datos_usuario('user_data');
		$this->_session_personal = $this->datos_usuario('personal_data');
    }

    public function datos_usuario_logueado() {
        /*
         * Información de la sesion
         */
        if (isset($this->_session->sys_id) === FALSE) {
            $this->destruir_session('user_data');
            echo $this->ci->alerta->location_href(base_url() . 'admin');
            EXIT;
        } else {
            /*
             * Información de la base de datos
             */
            $where = array('u.idusuario' => $this->_session->sys_id, 'u.oculto' => 0);
            $info = $this->ci->m_usuario->mostrar($where);
            if (empty($info)) {
                $this->destruir_session('user_data');
                echo $this->ci->url_comp->direccionar(base_url() . 'admin', TRUE);
                EXIT;
            }
            $datos = $this->ci->m_usuario_datos->mostrar(array('ud.idusuario' => $info['idusuario']));
            $image = ($datos['imagen'] != '') ? $datos['imagen'] : 'empty.png';
            $data['emp_id'] = $this->_session->sys_id;
            $data['emp_imagen'] = base_url() . 'thumbs/150/150/usuario_' . $image;
            $data['emp_fullname'] = $datos['nombres'] . ' ' . $datos['apellidos'];
            $data['emp_regdate'] = $datos['fecha_registro'];
            $data['emp_grade'] = $info['idnivel'];
            $data['emp_gdescription'] = $info['nivel'];
            $data['emp_today'] = $this->ci->fecha->convertir_tiempo_fecha(time(), 4);
        }
        return $data;
    }
	
	public function datos_personal_logueado() {
        /*
         * Información de la sesion
         */
        if (isset($this->_session_personal->sys_id) === FALSE) {
            $this->destruir_session('personal_data');
            echo $this->ci->alerta->location_href(base_url());
            EXIT;
        } else {
            /*
             * Información de la base de datos
             */
            $where = array('p.idpersonal' => $this->_session_personal->sys_id, 'p.oculto' => 0);
            $info = $this->ci->m_personal->mostrar($where);
            if (empty($info)) {
                $this->destruir_session('personal_data');
                echo $this->ci->url_comp->direccionar(base_url(), TRUE);
                EXIT;
            }

            $data['per_id'] = $this->_session_personal->sys_id;
			$data['per_nombre'] = $this->_session_personal->sys_nombre;

        }
        return $data;
    }

    public function verificar_logueo() {
        /*
         * Información de la sesion
         */
        if (isset($this->_session->sys_id) === TRUE) {
            echo $this->ci->alerta->location_href(base_url() . 'admin/home');
            exit;
        }
    }
	
	public function verificar_logueo_personal() {
        /*
         * Información de la sesion
         */
        if (isset($this->_session_personal->sys_id) === TRUE) {
            echo $this->ci->alerta->location_href(base_url() . 'site/streaming');
            exit;
        }
    }

    public function datos_usuario($array = 'user_data') {
        $session = $this->ci->session->all_userdata();
        if (isset($session[$array]) && is_array($session[$array])) {
            $data = new stdClass();
            foreach ($session[$array] as $key => $value) {
                $data->$key = $value;
            }
            return $data;
        } else {
            return FALSE;
        }
    }

    public function destruir_session($array = 'user_data') {
        $session = $this->ci->session->all_userdata();
        if (isset($session[$array]) && is_array($session[$array])) {
            $this->ci->session->unset_userdata($array);
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
