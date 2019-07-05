<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Popup extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * DECLARACION DE LIBRERIAS, HELPERS Y MODELOS
         */
        $library = array('session_manager', 'archivo');
        $helper = array('base64_url');
        $model = array('m_usuario','m_modal');
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
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Listado de Convenios';
        /* -------------------------------------------------------------------- */
        
        $lista = $this->m_modal->mostrar_activos();        
        if (!empty($lista)) {
            $i = 1;
            foreach ($lista AS $items) {
                $accion = $this->mantenimiento->accion($items['idmodal'], 'editar2', 'popup', $items['oculto']);
                    $data['lista'][] = array(
                        'id' => $items['idmodal'],
                        'numero' => $i,
                        'titulo' => $items['titulo'],
                        'imagen' => $items['imagen'],
                        'url' => $items['url'],
                        'f_vencimiento' => date("d-m-Y", strtotime($items['fecha_vencimiento'])),
                        'accion' => $accion,
                    );
                    $i++;
                }
            }

        /* ------------------------------------------------------------------ */
        $data['titulo'] = 'Listado de Popup';
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("listar_popup", $data);
    }

    public function agregar(){
        $login = $this->session_manager->datos_usuario_logueado();
        $data = array();

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view('admin/view/modal_convenio', $data, TRUE);
        $datos['titulo'] = "Agregar Convenio";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }

    public function editar($id = '') {
        $login = $this->session_manager->datos_usuario_logueado();
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/popup/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $where = array('m.idmodal' => $id, 'm.oculto' => 0);
        $tmp = $this->m_modal->mostrar($where);
        if (!empty($tmp)) {
            $data['id'] = $tmp['idmodal'];
            $data['titulo'] = $tmp['titulo'];
            $data['imagen'] = $tmp['imagen'];
            $data['f_vencimiento'] = date("d-m-Y", strtotime($tmp['fecha_vencimiento']));
        } else {
            echo $this->url_comp->direccionar(base_url() . 'admin/popup/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view("admin/view/modal_popup", $data, TRUE);
        $datos['titulo'] = "Editar Popup";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }


    public function accion() {
        $id = $this->input->post('id');
        $titulo = $this->input->post('titulo');
        $f_vencimiento = $this->input->post('f_vencimiento');
        $imagen = $this->archivo->archivo_1('imagen', 'single');
        
        $error = '';
        $error .= $this->mantenimiento->validacion($titulo, 'required', 'Titulo');
        $error .= $this->mantenimiento->validacion($f_vencimiento, 'required', 'Fecha de Vencimiento');

        if ($error != '') {
            echo $this->alerta->swal_error($error, TRUE);
            EXIT;
        }

        if ($id == '') {  
            if ($imagen !== FALSE){
                $mark = array('marca' => '', 'tipo' => 'string');
                $newImagen = $this->archivo->guardar_imagen($imagen, 'public/imagen/popup', $mark, 1600, $this->items['proyecto']);

            }else{
                echo $this->alerta->swal_error('Debe Elegir una Imagen...', TRUE);
                EXIT;
            }

            $datos['nombre'] = $nombre;
            $datos['imagen'] = $newImagen;
            $datos['fecha_registro'] = date("Y-m-d H:i:s");
            $datos['fecha_modificacion'] = date("Y-m-d H:i:s");
            $datos['idusuario'] = $this->_session->sys_id;
            $result = $this->m_modal->insertar($datos);
            if($result){
                echo $this->alerta->swal_success('Se registro correctamente...');
                echo $this->url_comp->actualizar_tiempo('1500');                   
                EXIT;
            }else{
                echo $this->alerta->swal_error('Hubo problemas...', TRUE);
                EXIT;
            }
            
        } else { //EDITAR
            $where = array('m.idmodal' => $id, 'm.oculto' => 0);
            $modal = $this->m_modal->mostrar($where);
            if (!empty($modal)){

                if ($imagen !== FALSE){
                    $mark = array('marca' => '', 'tipo' => 'string');
                    $newImagen = $this->archivo->guardar_imagen($imagen, 'public/imagen/popup', $mark, 1600, $this->items['proyecto']);
                    $this->archivo->eliminar_imagen($modal['imagen'], 'public/imagen/popup');
                }else{
                    $newImagen = $modal['imagen'];
                }  

                $today = date("d-m-Y");
                $newVencimiento = date("Y-m-d H:i:s", strtotime($f_vencimiento));

                if(strtotime($newVencimiento) < strtotime($today)){
                    echo $this->alerta->swal_error('La fecha de vencimiento no puede ser menor a la fecha actual...', TRUE);
                    EXIT;
                }

                $datos['titulo'] = $titulo;
                $datos['imagen'] = $newImagen;
                $datos['fecha_modificacion'] = date("Y-m-d H:i:s");
                $datos['fecha_vencimiento'] = date("Y-m-d H:i:s", strtotime($f_vencimiento));
                $datos['idusuario'] = $this->_session->sys_id;
                $result = $this->m_modal->actualizar($datos, 'idmodal', $modal['idmodal']);
                if ($result) {
                    $bitacora['descripcion'] = 'Modificó: ' . $titulo;
                    $bitacora['modulo'] = 'popup';
                    $bitacora['tipo'] = '2';
                    $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
                    $bitacora['idusuario'] = $this->_session->sys_id;
                    $this->m_bitacora->insertar($bitacora);

                    echo $this->alerta->swal_success('Se ha editado correctamente...');
                    echo $this->url_comp->actualizar_tiempo('2000');
                    EXIT;
                }
            } else {
                echo $this->url_comp->direccionar(base_url() . 'admin/popup/listar', TRUE);
                EXIT;
            }
        }
    }

    public function accion_denegar($id = '') {
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/popup/listar', TRUE);
            EXIT;
        }
        $where = array('m.idmodal' => $id, 'm.oculto' => 0);
        $resultSet = $this->m_modal->exists($where);
        if ($resultSet == 0) {
            echo $this->url_comp->direccionar(base_url() . 'admin/popup/listar', TRUE);
        } else {
            $this->m_modal->ocultar($id);
            echo $this->url_comp->direccionar(base_url() . 'admin/popup/listar', TRUE);
        }
    }

    public function verificar($url = '') {
        $url = $this->input->post('dato');
        //var_dump($url); exit;
        $rspta = array();
        $tmp = $this->m_modal->mostrar(array('m.url' => $url, 'm.oculto' => 0));
        if(!empty($tmp)){
            $today = date("Y-m-d");
            $f_vencimiento = date("Y-m-d", strtotime($tmp['fecha_vencimiento']));
            if(strtotime($today) <= strtotime($f_vencimiento)){
                $rspta = $tmp['imagen'];
            }
        }

        echo json_encode($rspta);
    }
}

