<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Login extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('session_manager');
        $helper = array();
        $model = array('m_usuario', 'm_captcha', 'm_usuario_datos', 'm_acceso');
        $this->load->library($library);
        $this->load->helper($helper);
        $this->load->model($model);
        /*
         * Configuración personalizada
         */
        $this->_session = $this->session_manager->datos_usuario('user_data');
    }

    public function ingresar() {
        $username = $this->input->post('usuario');
        $password = $this->input->post('password');
        $error = '';

        //mantenimiento 
        $error .= $this->mantenimiento->validacion($username, 'required|trim|minlenght[3]|maxlenght[15]', 'Usuario');
        $error .= $this->mantenimiento->validacion($password, 'required|trim|minlenght[5]|maxlenght[15]', 'Contraseña');

        if ($error != '') {
            echo $this->alerta->swal_error($error, TRUE);
            EXIT;
        }elseif ($this->m_usuario->existe_usuario($username) === FALSE) {
            echo $this->alerta->swal_error('El usuario no existe.');
            EXIT;
        }

        $info = $this->m_usuario->success_usuario($username, base64_encode($password));
        //var_dump($info); exit;
        if ($info !== FALSE) {
            $data = array(
                'user_data' => array(
                    'sys_id' => $info->u_idusuario,
                    'sys_grade' => $info->u_nivel,
                    'sys_username' => $info->u_usuario,
                    'sys_password' => $info->u_password,
                    'sys_idsede' => $info->u_idsede
                )
            );
            $this->session->set_userdata($data);

            // PARA HISTORIAL DE ACCESO
            if($info->u_nivel != '1'){
                $datos['ip'] = $this->input->ip_address();
                $datos['accion'] = '1';
                $datos['idusuario'] = $info->u_idusuario;
                $datos['fecha_registro'] = date("Y-m-d H:i:s");
                $this->m_acceso->insertar($datos);    
            }

        } else {
            echo $this->alerta->swal_error('Datos incorrectos.');
            EXIT;
        }
        echo $this->alerta->location_href(base_url() . 'admin/home');
        EXIT;
    }

    public function salir() {
        // PARA HISTORIAL DE ACCESO
        if ($this->_session->sys_grade != '1') {
            $datos['ip'] = $this->input->ip_address();
            $datos['accion'] = '2';
            $datos['idusuario'] = $this->_session->sys_id;
            $datos['fecha_registro'] = date("Y-m-d H:i:s") ;
            $this->m_acceso->insertar($datos);
        }
        $this->session_manager->destruir_session('user_data');
        echo $this->alerta->location_href(base_url() . 'admin', TRUE);
        EXIT;
    }

}
