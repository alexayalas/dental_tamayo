<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Promocion extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * DECLARACION DE LIBRERIAS, HELPERS Y MODELOS
         */
        $library = array('session_manager', 'archivo');
        $helper = array('base64_url');
        $model = array('m_usuario','m_promocion');
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
        
        $lista = $this->m_promocion->mostrar_activos(FALSE, FALSE, array("p.idpromocion" => "desc"));        
        if (!empty($lista)) {
            $i = 1;
            foreach ($lista AS $items) {
                $accion = $this->mantenimiento->accion($items['idpromocion'], 'editar2|eliminar2', 'promocion', $items['oculto']);
                    $data['lista'][] = array(
                        'id' => $items['idpromocion'],
                        'numero' => $i,
                        'nombre' => $items['nombre'],
                        'imagen' => $items['imagen'],
                        'accion' => $accion,
                    );
                    $i++;
                }
            }

        /* ------------------------------------------------------------------ */
        $data['titulo'] = 'Listado de Promociones';
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("listar_promocion", $data);
    }

    public function agregar(){
        $login = $this->session_manager->datos_usuario_logueado();
        $data = array();

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view('admin/view/modal_promocion', $data, TRUE);
        $datos['titulo'] = "Agregar Promoción";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }

    public function editar($id = '') {
        $login = $this->session_manager->datos_usuario_logueado();
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/promocion/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $where = array('p.idpromocion' => $id, 'p.oculto' => 0);
        $tmp = $this->m_promocion->mostrar($where);
        if (!empty($tmp)) {
            $data['id'] = $tmp['idpromocion'];
            $data['nombre'] = $tmp['nombre'];
            $data['imagen'] = $tmp['imagen'];
        } else {
            echo $this->url_comp->direccionar(base_url() . 'admin/promocion/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view("admin/view/modal_promocion", $data, TRUE);
        $datos['titulo'] = "Editar Promoción";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }


    public function accion() {
        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $imagen = $this->archivo->archivo_1('imagen', 'single');
        
        $error = '';
        $error .= $this->mantenimiento->validacion($nombre, 'required', 'Nombre');

        if ($error != '') {
            echo $this->alerta->swal_error($error, TRUE);
            EXIT;
        }

        if ($id == '') {  
            if($this->m_promocion->existe_campo('nombre',$nombre)){
                echo $this->alerta->swal_error('Esta promoción ya se encuentra registrada...', TRUE);
                EXIT;
            }

            if ($imagen !== FALSE){
                $mark = array('marca' => '', 'tipo' => 'string');
                $newImagen = $this->archivo->guardar_imagen($imagen, 'public/imagen/promocion', $mark, 1600, $this->items['proyecto']);

            }else{
                echo $this->alerta->swal_error('Debe Elegir una Imagen...', TRUE);
                EXIT;
            }

            $datos['nombre'] = $nombre;
            $datos['imagen'] = $newImagen;
            $datos['fecha_registro'] = date("Y-m-d H:i:s");
            $datos['fecha_modificacion'] = date("Y-m-d H:i:s");
            $datos['idusuario'] = $this->_session->sys_id;
            $result = $this->m_promocion->insertar($datos);
            if($result){
                $bitacora['descripcion'] = 'Agrego: ' . $nombre;
                $bitacora['modulo'] = 'promoción';
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
            $where = array('p.idpromocion' => $id, 'p.oculto' => 0);
            $promocion = $this->m_promocion->mostrar($where);
            if (!empty($promocion)){
                if($this->m_promocion->existe_campo('nombre',$nombre,$id)){
                    echo $this->alerta->swal_error('Esta promoción ya se encuentra registrada...', TRUE);
                    EXIT;
                }

                if ($imagen !== FALSE){
                    $mark = array('marca' => '', 'tipo' => 'string');
                    $newImagen = $this->archivo->guardar_imagen($imagen, 'public/imagen/promocion', $mark, 1600, $this->items['proyecto']);
                    $this->archivo->eliminar_imagen($promocion['imagen'], 'public/imagen/promocion');
                }else{
                    $newImagen = $promocion['imagen'];
                }                

                $datos['nombre'] = $nombre;
                $datos['imagen'] = $newImagen;
                $datos['fecha_modificacion'] = date("Y-m-d H:i:s");
                $datos['idusuario'] = $this->_session->sys_id;
                $result = $this->m_promocion->actualizar($datos, 'idpromocion', $promocion['idpromocion']);
                if ($result) {
                    $bitacora['descripcion'] = 'Modificó: ' . $nombre;
                    $bitacora['modulo'] = 'promoción';
                    $bitacora['tipo'] = '2';
                    $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
                    $bitacora['idusuario'] = $this->_session->sys_id;
                    $this->m_bitacora->insertar($bitacora);

                    echo $this->alerta->swal_success('Se ha editado correctamente...');
                    echo $this->url_comp->actualizar_tiempo('2000');
                    EXIT;
                }
            } else {
                echo $this->url_comp->direccionar(base_url() . 'admin/promocion/listar', TRUE);
                EXIT;
            }
        }
    }

    public function accion_denegar($id = '') {
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/promocion/listar', TRUE);
            EXIT;
        }
        $where = array('p.idpromocion' => $id, 'p.oculto' => 0);
        $resultSet = $this->m_promocion->mostrar($where);
        if (empty($resultSet)) {
            echo $this->url_comp->direccionar(base_url() . 'admin/promocion/listar', TRUE);
        } else {
            $this->m_promocion->ocultar($id);
            $bitacora['descripcion'] = 'Elimino: ' . $resultSet['nombre'];
            $bitacora['modulo'] = 'promoción';
            $bitacora['tipo'] = '3';
            $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
            $bitacora['idusuario'] = $this->_session->sys_id;
            $this->m_bitacora->insertar($bitacora);
            echo $this->url_comp->direccionar(base_url() . 'admin/promocion/listar', TRUE);
        }
    }
}

