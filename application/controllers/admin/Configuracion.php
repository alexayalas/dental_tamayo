<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Configuracion extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('session_manager', 'complement');
        $helper = array();
        $model = array('m_empleado','m_configuracion');
        $this->load->library($library);
        $this->load->helper($helper);
        $this->load->model($model);
        /*
         * Configuración personalizada
         */
        $this->_session = $this->session_manager->datos_usuario('user_data');
        $proyecto = $this->m_configuracion->mostrar(array('c.campo' => 'proyecto_nombre'));
        $this->items['configuracion_activo'] = 'active';
        $this->items['proyecto'] = $proyecto['valor'];
        $this->items['base_url'] = base_url();
        $favicon = $this->m_configuracion->mostrar(array('c.campo'=>'favicon'));
        $this->items['favicon_logo'] = $favicon['valor'];
        $this->items['logo'] = $this->m_configuracion->mostrar(array('c.campo'=>'logo'));
    }

    public function index() {
        $login = $this->session_manager->datos_usuario_logueado();
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Panel de Configuracion';
        $data['tipo'] = 'agregar';
        $data['titulo'] = 'Panel de Configuracion';

        /* ------------------------------------------------------------------ */
        $data['proyecto_nombre'] = $this->m_configuracion->mostrar(array('c.campo'=>'proyecto_nombre'));
        $data['direccion'] = $this->m_configuracion->mostrar(array('c.campo'=>'direccion'));
        $data['telefono'] = $this->m_configuracion->mostrar(array('c.campo'=>'telefono'));
        $data['celular'] = $this->m_configuracion->mostrar(array('c.campo'=>'celular'));
        $data['correo'] = $this->m_configuracion->mostrar(array('c.campo'=>'correo'));
        $data['map'] = $this->m_configuracion->mostrar(array('c.campo'=>'googlemap'));
        $data['facebook'] = $this->m_configuracion->mostrar(array('c.campo'=>'facebook'));
        $data['youtube'] = $this->m_configuracion->mostrar(array('c.campo'=>'youtube'));
        $data['twitter'] = $this->m_configuracion->mostrar(array('c.campo'=>'twitter'));
        $data['google'] = $this->m_configuracion->mostrar(array('c.campo'=>'google'));
        $data['linkedin'] = $this->m_configuracion->mostrar(array('c.campo'=>'linkedin'));
        $data['logo'] = $this->m_configuracion->mostrar(array('c.campo'=>'logo'));
        $data['favicon'] = $this->m_configuracion->mostrar(array('c.campo'=>'favicon'));
        
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("form_configuracion", $data);
    }


    public function accion() {
        $logo = $this->archivo->archivo_1('logo', 'single');
        $favicon = $this->documento->tipo_documento('favicon', 'single');
        $proyecto = $this->input->post('proyecto');
        $map = $this->input->post('map');
        $facebook = $this->input->post('facebook');
        $twitter = $this->input->post('twitter');
        $google = $this->input->post('google');
        $linked = $this->input->post('linked');
        $youtube = $this->input->post('youtube');
        $direccion = $this->input->post('direccion');
        $telefono = $this->input->post('telefono');
        $celular = $this->input->post('celular');
        $correo = $this->input->post('correo');
        $mensaje = $this->input->post('mensaje');

        //var_dump($favicon); exit;
        $error = '';
        $error .= $this->mantenimiento->validacion($proyecto, 'required', 'Nombre de la Web');
        //$error .= $this->mantenimiento->validacion($map, 'required', 'Script de GoogleMap');
        $error .= $this->mantenimiento->validacion($direccion, 'required', 'Direccion');
        $error .= $this->mantenimiento->validacion($telefono, 'required', 'Telefono');
        $error .= $this->mantenimiento->validacion($correo, 'required', 'Correo de Contacto');
        //$error .= $this->mantenimiento->validacion($mensaje, 'required', 'Mensaje de Bienvenida');
        if ($error != '') {
            echo $this->alerta->mensaje_error($error, TRUE);
            EXIT;
        }
	   if ($logo !== FALSE){
		    $tmp_logo = $this->m_configuracion->mostrar(array('c.campo' => 'logo', 'c.oculto' => 0));
        	$mark = array('marca' => '', 'tipo' => 'string');
                $n_imagen = $this->archivo->guardar_imagen($logo, 'public/imagen/logo', $mark, 1600, $this->items['proyecto']);
                $this->archivo->eliminar_imagen($tmp_logo['valor'], 'public/imagen/logo');
                $data['valor'] = $n_imagen;
                $resultSet = $this->m_configuracion->actualizar($data, array('campo'=>'logo'));
        }
        if ($favicon !== FALSE){
		    $tmp_favicon = $this->m_configuracion->mostrar(array('c.campo' => 'favicon', 'c.oculto' => 0));
        	$mark = array('marca' => '', 'tipo' => 'string');
                $n_imagen = $this->documento->save_documento($favicon, 'public/imagen/favicon', 25);
                $this->archivo->eliminar_imagen($tmp_favicon['valor'], 'public/imagen/favicon');
                $data['valor'] = $n_imagen;
                $resultSet = $this->m_configuracion->actualizar($data, array('campo'=>'favicon'));
        }
        
        $tmp_proyecto['valor'] = $proyecto;
        $this->m_configuracion->actualizar($tmp_proyecto, array('campo'=>'proyecto_nombre'));

        $tmp_map['valor'] = $map;
        $this->m_configuracion->actualizar($tmp_map, array('campo'=>'googlemap'));
        
        $tmp_facebook['valor'] = $facebook;
        $this->m_configuracion->actualizar($tmp_facebook, array('campo'=>'facebook'));
        
        $tmp_twitter['valor'] = $twitter;
        $this->m_configuracion->actualizar($tmp_twitter, array('campo'=>'twitter'));
                
        $tmp_linked['valor'] = $linked;
        $this->m_configuracion->actualizar($tmp_linked, array('campo'=>'linkedin'));
        
        $tmp_direccion['valor'] = $direccion;
        $this->m_configuracion->actualizar($tmp_direccion, array('campo'=>'direccion'));
        
        $tmp_telefono['valor'] = $telefono;
        $this->m_configuracion->actualizar($tmp_telefono, array('campo'=>'telefono'));
                
        $tmp_correo['valor'] = $correo;
        $this->m_configuracion->actualizar($tmp_correo, array('campo'=>'correo'));
        
        $tmp_mensaje['valor'] = $mensaje;
        $this->m_configuracion->actualizar($tmp_mensaje, array('campo'=>'mensaje'));
               
        
        echo $this->alerta->mensaje_exito('Se ha actualizaron los datos correctamente...');
        echo $this->url_comp->direccionar_tiempo(base_url().'admin/configuracion','2000');
        EXIT;

    }

}
