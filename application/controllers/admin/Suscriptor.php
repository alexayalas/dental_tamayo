<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Suscriptor extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * DECLARACION DE LIBRERIAS, HELPERS Y MODELOS
         */
        $library = array('session_manager');
        $helper = array('base64_url');
        $model = array('m_usuario', 'm_suscriptor');
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
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Listado de Suscriptores';
        /* -------------------------------------------------------------------- */
        
        $lista = $this->m_suscriptor->mostrar_activos(FALSE, FALSE, array("s.fecha_registro" => "desc"));        
        if (!empty($lista)) {
            $i = 1;
            foreach ($lista AS $items) {
                $accion = $this->mantenimiento->accion($items['idsuscriptor'], 'ver2|', 'suscriptor', $items['oculto']);
                    $data['lista'][] = array(
                        'id' => $items['idsuscriptor'],
                        'numero' => $i,
                        'nombre' => $items['nombre'],
                        'email' => $items['email'],
                        'ip' => $items['ip'],
                        'confirmar' => $items['confirmar'],
                        'f_registro' => date("d-m-Y H:i", strtotime($items['fecha_registro'])),
                        'f_confirmacion' => date("d-m-Y H:i", strtotime($items['fecha_confirmacion'])),
                        'accion' => $accion,
                    );
                    $i++;
                }
            }

        /* ------------------------------------------------------------------ */
        $data['titulo'] = 'Suscriptores de la web';
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("listar_suscriptor", $data);
    }



    public function observar($id = '') {
        $login = $this->session_manager->datos_usuario_logueado();
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/suscriptor/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $where = array('s.idsuscriptor' => $id, 's.oculto' => 0);
        $tmp = $this->m_suscriptor->mostrar($where);
        if (!empty($tmp)) {
            $data['id'] = $tmp['idsuscriptor'];
            $data['nombre'] = $tmp['nombre'];
            $data['email'] = $tmp['email'];
            $data['ip'] = $tmp['ip'];
            $data['procedencia'] = $tmp['procedencia'];
            $data['f_registro'] = date("d-m-Y H:i:s", strtotime($tmp['fecha_registro']));
            $data['f_confirmacion'] = $tmp['fecha_confirmacion'] != '' ? date("d-m-Y H:i:s", strtotime($tmp['fecha_confirmacion'])) : '';
        } else {
            echo $this->url_comp->direccionar(base_url() . 'admin/suscriptor/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view("admin/view/modal_datos_suscriptor", $data, TRUE);
        //var_dump($contenido); exit;
        $datos['titulo'] = "Datos del Suscriptor";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }

}

