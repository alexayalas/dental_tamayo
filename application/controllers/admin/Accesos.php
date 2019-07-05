<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Accesos extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * DECLARACION DE LIBRERIAS, HELPERS Y MODELOS
         */
        $library = array('session_manager');
        $helper = array('base64_url');
        $model = array('m_usuario', 'm_acceso');
        $this->load->library($library);
        $this->load->helper($helper);
        $this->load->model($model);
        /*
         * CONFIGURACION PERSONAL
         */
        $this->_session = $this->session_manager->datos_usuario('user_data');
        $proyecto = $this->m_configuracion->mostrar(array('c.campo' => 'proyecto_nombre'));
        $this->items['proyecto'] = $proyecto['valor'];
        $this->items['base_url'] = base_url();
        $favicon = $this->m_configuracion->mostrar(array('c.campo'=>'favicon'));
        $this->items['favicon_logo'] = $favicon['valor'];
        $this->items['logo'] = $this->m_configuracion->mostrar(array('c.campo'=>'logo'));   
        $this->items['seguridad_activo'] = 'active';
    }

    public function listar() {
        $login = $this->session_manager->datos_usuario_logueado();
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Historial de Accesos';
        /* -------------------------------------------------------------------- */
             
        $lista = $this->m_acceso->mostrar_activos(FALSE, FALSE, array("a.fecha_registro" => "desc"));
            if (!empty($lista)) {
                $i = 1;
                foreach ($lista AS $items) {
                    if($items['accion'] == '1'){
                        $accion = 'Inicio sesión';
                    }elseif($items['accion'] == '2'){
                        $accion = 'Cerro sesión';
                    }
                    
                    $data['lista'][] = array(
                        'numero' => $i,
                        'id' => $items['idacceso'],
                        'usuario' => $items['usuario'],
                        'ip' => $items['ip'],
                        'f_registro' => date("d-m-Y H:i:s", strtotime($items['fecha_registro'])),
                        'accion' => $accion,
                        'tipo' => $items['accion']
                    );
                    $i++;
                }
            }

        /* ------------------------------------------------------------------ */
        $data['titulo'] = 'Historial de accesos';
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("listar_historial_accesos", $data);
    }

}
