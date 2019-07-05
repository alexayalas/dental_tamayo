<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Especialidad extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * DECLARACION DE LIBRERIAS, HELPERS Y MODELOS
         */
        $library = array('session_manager');
        $helper = array('base64_url');
        $model = array('m_usuario', 'm_especialidad');
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
        
        $lista = $this->m_especialidad->mostrar_activos(FALSE, FALSE, ["e.nombre", "asc"]);        
        if (!empty($lista)) {
            $i = 1;
            foreach ($lista AS $items) {
                $accion = $this->mantenimiento->accion($items['idespecialidad'], 'editar2|eliminar2', 'especialidad', $items['oculto']);
                    $data['lista'][] = array(
                        'id' => $items['idespecialidad'],
                        'numero' => $i,
                        'nombre' => $items['nombre'],
                        'accion' => $accion,
                    );
                    $i++;
                }
            }

        /* ------------------------------------------------------------------ */
        $data['titulo'] = 'Listado de Especialidades';
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("listar_especialidad", $data);
    }

    public function agregar(){
        $login = $this->session_manager->datos_usuario_logueado();
        $data = array();

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view('admin/view/modal_especialidad', $data, TRUE);
        $datos['titulo'] = "Agregar Especialidad";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }

    public function editar($id = '') {
        $login = $this->session_manager->datos_usuario_logueado();
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/especialidad/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $where = array('e.idespecialidad' => $id, 'e.oculto' => 0);
        $tmp = $this->m_especialidad->mostrar($where);
        if (!empty($tmp)) {
            $data['id'] = $tmp['idespecialidad'];
            $data['nombre'] = $tmp['nombre'];
        } else {
            echo $this->url_comp->direccionar(base_url() . 'admin/especialidad/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view("admin/view/modal_especialidad", $data, TRUE);
        $datos['titulo'] = "Editar Especialidad";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }


    public function accion() {
        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        
        $error = '';
        $error .= $this->mantenimiento->validacion($nombre, 'required', 'Nombre');

        if ($error != '') {
            echo $this->alerta->swal_error($error, TRUE);
            EXIT;
        }

        if ($id == '') {  
            if($this->m_especialidad->existe_campo('nombre',$nombre)){
                echo $this->alerta->swal_error('Esta Especialidad ya se encuentra registrada...', TRUE);
                EXIT;
            }

            $datos['nombre'] = $nombre;
            $datos['idusuario'] = $this->_session->sys_id;
            $result = $this->m_especialidad->insertar($datos);
            if($result){
                $bitacora['descripcion'] = 'Agrego: ' . $nombre;
                $bitacora['modulo'] = 'especialidad';
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
            $where = array('e.idespecialidad' => $id, 'e.oculto' => 0);
            $especialidad = $this->m_especialidad->mostrar($where);
            if (!empty($especialidad)){
                if($this->m_especialidad->existe_campo('nombre',$nombre,$id)){
                    echo $this->alerta->swal_error('Esta Especialidad ya se encuentra registrada...', TRUE);
                    EXIT;
                }

                $datos['nombre'] = $nombre;
                $datos['idusuario'] = $this->_session->sys_id;
                $result = $this->m_especialidad->actualizar($datos, 'idespecialidad', $especialidad['idespecialidad']);
                if ($result) {
                    $bitacora['descripcion'] = 'Modifico: ' . $nombre;
                    $bitacora['modulo'] = 'especialidad';
                    $bitacora['tipo'] = '2';
                    $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
                    $bitacora['idusuario'] = $this->_session->sys_id;
                    $this->m_bitacora->insertar($bitacora);

                    echo $this->alerta->swal_success('Se ha editado correctamente...');
                    echo $this->url_comp->actualizar_tiempo('2000');
                    EXIT;
                }
            } else {
                echo $this->url_comp->direccionar(base_url() . 'admin/especialidad/listar', TRUE);
                EXIT;
            }
        }
    }

    public function accion_denegar($id = '') {
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/especialidad/listar', TRUE);
            EXIT;
        }
        $where = array('e.idespecialidad' => $id, 'e.oculto' => 0);
        $resultSet = $this->m_especialidad->mostrar($where);
        if (empty($resultSet)) {
            echo $this->url_comp->direccionar(base_url() . 'admin/especialidad/listar', TRUE);
        } else {
            $this->m_especialidad->ocultar($id);
            $bitacora['descripcion'] = 'Elimino: ' . $resultSet['nombre'];
            $bitacora['modulo'] = 'especialidad';
            $bitacora['tipo'] = '3';
            $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
            $bitacora['idusuario'] = $this->_session->sys_id;
            $this->m_bitacora->insertar($bitacora);
            echo $this->url_comp->direccionar(base_url() . 'admin/especialidad/listar', TRUE);
        }
    }
}
