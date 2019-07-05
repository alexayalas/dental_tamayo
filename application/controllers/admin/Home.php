<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('session_manager');
        $helper = array();
        $model = array('m_configuracion', 'm_usuario');
        $this->load->library($library);
        $this->load->helper($helper);
        $this->load->model($model);

        /* Configuración personalizada */

        $this->items['base_url'] = base_url();
        $this->_session = $this->session_manager->datos_usuario('user_data');
        $proyecto = $this->m_configuracion->mostrar(array('c.campo' => 'proyecto_nombre'));
        $this->items['proyecto'] = $proyecto['valor'];
        $favicon = $this->m_configuracion->mostrar(array('c.campo'=>'favicon'));
        $this->items['favicon_logo'] = $favicon['valor'];
        $this->items['logo'] = $this->m_configuracion->mostrar(array('c.campo'=>'logo'));

        //var_dump(urlencode(('1523')));
    }

    public function index() {
        $login = $this->session_manager->datos_usuario_logueado();
        $data['titulo_pagina'] = $this->items['proyecto'] .' | Inicio';

        
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("home", $data);
    }

    public function login() {
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Login';
        $login = $this->session_manager->verificar_logueo();
        $captcha = $this->generar_captcha->captcha();
        $data['captcha'] = $captcha['image'];

        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $this->template->admin_login("login", $data);

    }


    public function recaptcha(){
        $captcha = $this->generar_captcha->captcha();
        echo $captcha['image'];
    }

}

