<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Autor extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * DECLARACION DE LIBRERIAS, HELPERS Y MODELOS
         */
        $library = array('session_manager');
        $helper = array('base64_url');
        $model = array('m_usuario', 'm_autor');
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
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Listado de Autores';
        /* -------------------------------------------------------------------- */
        
        $lista = $this->m_autor->mostrar_activos(FALSE, FALSE, ["a.nombre", "asc"]);        
        if (!empty($lista)) {
            $i = 1;
            foreach ($lista AS $items) {
                $accion = $this->mantenimiento->accion($items['idautor'], 'editar2|eliminar2', 'autor', $items['oculto']);
                    $data['lista'][] = array(
                        'id' => $items['idautor'],
                        'numero' => $i,
                        'nombre' => $items['nombre'],
                        'descripcion' => $items['descripcion'],
                        'imagen' => $items['imagen'],
                        'f_registro' => date("d-m-Y", strtotime($items['fecha_registro'])),
                        'accion' => $accion,
                    );
                    $i++;
                }
            }

        /* ------------------------------------------------------------------ */
        $data['titulo'] = 'Listado de Autores';
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("listar_autor", $data);
    }

    public function agregar(){
        $login = $this->session_manager->datos_usuario_logueado();
        $data = array();

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view('admin/view/modal_autor', $data, TRUE);
        $datos['titulo'] = "Agregar Autor";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }

    public function editar($id = '') {
        $login = $this->session_manager->datos_usuario_logueado();
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/categoria/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $where = array('a.idautor' => $id, 'a.oculto' => 0);
        $tmp = $this->m_autor->mostrar($where);
        if (!empty($tmp)) {
            $data['id'] = $tmp['idautor'];
            $data['nombre'] = $tmp['nombre'];
            $data['descripcion'] = $tmp['descripcion'];
            $data['imagen'] = $tmp['imagen'];
        } else {
            echo $this->url_comp->direccionar(base_url() . 'admin/autor/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view("admin/view/modal_autor", $data, TRUE);
        $datos['titulo'] = "Editar Autor";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }


    public function accion() {
        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $imagen = $this->archivo->archivo_1('imagen', 'single');
        
        $error = '';
        $error .= $this->mantenimiento->validacion($nombre, 'required', 'Nombre');
        $error .= $this->mantenimiento->validacion($descripcion, 'required', 'Descripcion');

        if ($error != '') {
            echo $this->alerta->swal_error($error, TRUE);
            EXIT;
        }

        if ($id == '') {  
            if($this->m_autor->existe_campo('nombre',$nombre)){
                echo $this->alerta->swal_error('Este autor ya se encuentra registrado...', TRUE);
                EXIT;
            }

            if ($imagen !== FALSE){
                $mark = array('marca' => '', 'tipo' => 'string');
                $newImagen = $this->archivo->guardar_imagen($imagen, 'public/imagen/autor', $mark, 1600, $this->items['proyecto']);

            }else{
                echo $this->alerta->swal_error('Debe Elegir una Imagen...', TRUE);
                EXIT;
            }

            $datos['nombre'] = $nombre;
            $datos['descripcion'] = $descripcion;
            $datos['imagen'] = $newImagen;
            $datos['fecha_registro'] = date("Y-m-d H:i:s");
            $datos['fecha_modificacion'] = date("Y-m-d H:i:s");
            $datos['idusuario'] = $this->_session->sys_id;
            $result = $this->m_autor->insertar($datos);
            if($result){
                $bitacora['descripcion'] = 'Agrego: ' . $nombre;
                $bitacora['modulo'] = 'autor';
                $bitacora['tipo'] = '1';
                $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
                $bitacora['idusuario'] = $this->_session->sys_id;
                $this->m_bitacora->insertar($bitacora);

                echo $this->alerta->swal_success('Se registro correctamente...');
                echo $this->url_comp->actualizar_tiempo('1500');                   
                EXIT;
            }else{
                echo $this->alerta->swal_error('Hubo problemas...', TRUE);
                EXIT;
            }
            
        } else { //EDITAR
            $where = array('a.idautor' => $id, 'a.oculto' => 0);
            $autor = $this->m_autor->mostrar($where);
            if (!empty($autor)){
                if($this->m_autor->existe_campo('nombre',$nombre,$id)){
                    echo $this->alerta->swal_error('Este autor ya se encuentra registrado...', TRUE);
                    EXIT;
                }

                if ($imagen !== FALSE){
                    $mark = array('marca' => '', 'tipo' => 'string');
                    $newImagen = $this->archivo->guardar_imagen($imagen, 'public/imagen/autor', $mark, 1600, $this->items['proyecto']);
                    $this->archivo->eliminar_imagen($autor['imagen'], 'public/imagen/autor');
                }else{
                    $newImagen = $autor['imagen'];
                }                

                $datos['nombre'] = $nombre;
                $datos['descripcion'] = $descripcion;
                $datos['imagen'] = $newImagen;
                $datos['fecha_modificacion'] = date("Y-m-d H:i:s");
                $datos['idusuario'] = $this->_session->sys_id;
                $result = $this->m_autor->actualizar($datos, 'idautor', $autor['idautor']);
                if ($result) {
                    $bitacora['descripcion'] = 'Modificó: ' . $nombre;
                    $bitacora['modulo'] = 'autor';
                    $bitacora['tipo'] = '2';
                    $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
                    $bitacora['idusuario'] = $this->_session->sys_id;
                    $this->m_bitacora->insertar($bitacora);

                    echo $this->alerta->swal_success('Se ha editado correctamente...');
                    echo $this->url_comp->actualizar_tiempo('2000');
                    EXIT;
                }
            } else {
                echo $this->url_comp->direccionar(base_url() . 'admin/autor/listar', TRUE);
                EXIT;
            }
        }
    }

    public function accion_denegar($id = '') {
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/autor/listar', TRUE);
            EXIT;
        }
        $where = array('a.idautor' => $id, 'a.oculto' => 0);
        $resultSet = $this->m_autor->mostrar($where);
        if (empty($resultSet)) {
            echo $this->url_comp->direccionar(base_url() . 'admin/autor/listar', TRUE);
        } else {
            $this->m_autor->ocultar($id);
            $bitacora['descripcion'] = 'Eliminó: ' . $resultSet['nombre'];
            $bitacora['modulo'] = 'autor';
            $bitacora['tipo'] = '3';
            $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
            $bitacora['idusuario'] = $this->_session->sys_id;
            $this->m_bitacora->insertar($bitacora);
            
            echo $this->url_comp->direccionar(base_url() . 'admin/autor/listar', TRUE);
        }
    }
}

