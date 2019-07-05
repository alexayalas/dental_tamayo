<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Streaming extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * DECLARACION DE LIBRERIAS, HELPERS Y MODELOS
         */
        $library = array('session_manager');
        $helper = array('base64_url');
        $model = array('m_personal', 'm_control');
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
    }

    public function listar() {
        $login = $this->session_manager->datos_usuario_logueado();
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Listado de Especialidades';
        /* -------------------------------------------------------------------- */
        
        $lista = $this->m_control->mostrar_activos(FALSE, FALSE, array("c.fecha_registro" => "desc"));        
        if (!empty($lista)) {
            $i = 1;
            foreach ($lista AS $items) {
                $tipo = $items['tipo'] == '1' ? 'Doctor' : 'Administrativo';
                $descrip = $items['accion'] == '1' ? 'Inicio Sesion' : 'Cerro Session';
                $accion = $this->mantenimiento->accion($items['idcontrol'], 'eliminar2', 'streaming', $items['oculto']);
                    $data['lista'][] = array(
                        'idcontrol' => $items['idcontrol'],
                        'numero' => $i,
                        'personal' => $items['nombre_personal'],
                        'correo' => $items['correo'],
                        'sede' => $items['sede'] . ' / '. $items['direccion'],
                        'ip' => $items['ip'],
                        'f_registro' => date("d-m-Y H:i", strtotime($items['fecha_registro'])),
                        'tipo' => $tipo,
                        'registro' => $items['accion'], 
                        'descrip' => $descrip, 
                        'accion' => $accion,
                    );
                    $i++;
                }
            }

        /* ------------------------------------------------------------------ */
        $data['titulo'] = 'Registro de PArticipantes del Streaming';
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("listar_streaming", $data);
    }


    public function accion_denegar($id = '') {
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/formulario_web/listar', TRUE);
            EXIT;
        }
        $where = array('f.idformulario' => $id, 'f.oculto' => 0);
        $resultSet = $this->m_formulario_web->exists($where);
        if ($resultSet == 0) {
            echo $this->url_comp->direccionar(base_url() . 'admin/formulario_web/listar', TRUE);
        } else {
            $this->m_formulario_web->ocultar($id);
            echo $this->url_comp->direccionar(base_url() . 'admin/formulario_web/listar', TRUE);
        }
    }
}

