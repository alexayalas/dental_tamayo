<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Formulario_facebook extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * DECLARACION DE LIBRERIAS, HELPERS Y MODELOS
         */
        $library = array('session_manager');
        $helper = array('base64_url');
        $model = array('m_usuario', 'm_formulario_web');
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
        
        $lista = $this->m_formulario_web->mostrar_cuando(array('f.idorigen' => '2', 'f.oculto' => '0'),FALSE, FALSE, array("f.fecha_registro" => "desc"));        
        if (!empty($lista)) {
            $i = 1;
            foreach ($lista AS $items) {
                $accion = $this->mantenimiento->accion($items['idformulario'], 'ver2|eliminar2', 'formulario_web', $items['oculto']);
                    $data['lista'][] = array(
                        'id' => $items['idformulario'],
                        'numero' => $i,
                        'nombre' => $items['nombre'],
                        'email' => $items['email'],
                        'telefono' => $items['telefono'],
                        'referencia' => $items['referencia'],
                        'especialidad' => $items['especialidad'],
                        'sede' => $items['sede'],
                        'direccion' => $items['direccion'],
                        'origen' => $items['origen'],
                        'f_registro' => date("d-m-Y H:i", strtotime($items['fecha_registro'])),
                        'f_cita' => date("d-m-Y H:i", strtotime($items['fecha_cita'])),
                        'accion' => $accion,
                    );
                    $i++;
                }
            }

        /* ------------------------------------------------------------------ */
        $data['titulo'] = 'Solicitudes de los Formularios Facebook';
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("listar_formulario_facebook", $data);
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
        $resultSet = $this->m_especialidad->exists($where);
        if ($resultSet == 0) {
            echo $this->url_comp->direccionar(base_url() . 'admin/especialidad/listar', TRUE);
        } else {
            $this->m_especialidad->ocultar($id);
            echo $this->url_comp->direccionar(base_url() . 'admin/especialidad/listar', TRUE);
        }
    }
}

