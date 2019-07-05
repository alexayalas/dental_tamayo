<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Staff extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * DECLARACION DE LIBRERIAS, HELPERS Y MODELOS
         */
        $library = array('session_manager');
        $helper = array('base64_url');
        $model = array('m_usuario', 'm_staff', 'm_sede');
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
        
        if($this->_session->sys_grade == '1' || $this->_session->sys_grade == '2' || $this->_session->sys_grade == '3'){
            $lista = $this->m_staff->mostrar_activos(FALSE, FALSE, ["s.nombre", "asc"]);  
        }elseif($this->_session->sys_grade == '7'){
            $lista = $this->m_staff->mostrar_cuando(array('s.idsede' => $this->_session->sys_idsede), FALSE, FALSE, ["s.nombre", "asc"]);  
        }
              
        if (!empty($lista)) {
            $i = 1;
            foreach ($lista AS $items) {
                $accion = $this->mantenimiento->accion($items['idstaff'], 'editar2|eliminar2', 'staff', $items['oculto']);
                    $data['lista'][] = array(
                        'id' => $items['idstaff'],
                        'numero' => $i,
                        'nombre' => $items['nombre'],
                        'descripcion' => $items['descripcion'],
                        'especialidad' => $items['especialidad'],
                        'sede' => $items['sede'],
                        'imagen' => base_url(). 'public/imagen/staff/'.$items['folder'] .'/'.$items['imagen'],
                        'f_registro' => date("d-m-Y", strtotime($items['fecha_registro'])),
                        'accion' => $accion,
                    );
                    $i++;
                }
            }

        /* ------------------------------------------------------------------ */
        $data['titulo'] = 'Staff Médico';
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("listar_staff", $data);
    }

    public function agregar(){
        $login = $this->session_manager->datos_usuario_logueado();
        $data = array();

        // PARA EL COMBO DE SEDE
        $sede = $this->m_sede->mostrar_cuando(array('s.joz' => '1'),FALSE,FALSE,array('s.nombre','asc'));
        if (!empty($sede)) {
            foreach ($sede as $items) {
                $this->_result[$items['idsede']] = $items['nombre'] . ' - '. $items['direccion'];
            }
            $data['sede'] = $this->documento->generar_dropdown($this->_result, 'sede', '','Selecione un opción');
            unset($this->_result);
        }

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view('admin/view/modal_staff', $data, TRUE);
        $datos['titulo'] = "Agregar Staff";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }

    public function editar($id = '') {
        $login = $this->session_manager->datos_usuario_logueado();
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/staff/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $where = array('s.idstaff' => $id, 's.oculto' => 0);
        $tmp = $this->m_staff->mostrar($where);
        if (!empty($tmp)) {
            $data['id'] = $tmp['idstaff'];
            $data['nombre'] = $tmp['nombre'];
            $data['especialidad'] = $tmp['especialidad'];
            $data['cop'] = $tmp['cop'];
            $data['descripcion'] = $tmp['descripcion'];
            $data['imagen'] = base_url().'public/imagen/staff/'.$tmp['folder']. '/'. $tmp['imagen'];

            // PARA EL COMBO DE SEDE
            $sede = $this->m_sede->mostrar_cuando(array('s.joz' => '1'),FALSE,FALSE,array('s.nombre','asc'));
            if (!empty($sede)) {
                foreach ($sede as $items) {
                    $this->_result[$items['idsede']] = $items['nombre'] . ' - '. $items['direccion'];
                }
                $data['sede'] = $this->documento->generar_dropdown($this->_result, 'sede', $tmp['idsede'],'Selecione un opción');
                unset($this->_result);
            }
        } else {
            echo $this->url_comp->direccionar(base_url() . 'admin/staff/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view("admin/view/modal_staff", $data, TRUE);
        $datos['titulo'] = "Editar Staff";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }


    public function accion() {
        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $especialidad = $this->input->post('especialidad');
        $cop = $this->input->post('cop');
        $sede = $this->input->post('sede');
        $descripcion = $this->input->post('descripcion');
        $imagen = $this->archivo->archivo_1('imagen', 'single');

        $error = '';
        $error .= $this->mantenimiento->validacion($nombre, 'required', 'Nombre');
        $error .= $this->mantenimiento->validacion($especialidad, 'required', 'Especialidad');

        if ($error != '') {
            echo $this->alerta->swal_error($error, TRUE);
            EXIT;
        }

        if ($id == '') {  
            if($this->m_staff->existe_campo('nombre',$nombre)){
                echo $this->alerta->swal_error('Este  especialidad ya se encuentra registrado...', TRUE);
                EXIT;
            }

            if($this->_session->sys_grade == '1' || $this->_session->sys_grade == '2' || $this->_session->sys_grade == '3'){
                $tmpSede = $this->m_sede->mostrar($sede);
                $finalSede = $sede;
            }else{
                $tmpSede = $this->m_sede->mostrar($this->_session->sys_idsede);
                $finalSede = $this->_session->sys_idsede;
            }

            if ($imagen !== FALSE){
                $mark = array('marca' => '', 'tipo' => 'string');
                $dir = 'public/imagen/staff/'.$tmpSede['folder'];
                $newImagen = $this->archivo->guardar_imagen($imagen, $dir, $mark, 1600, $this->items['proyecto']);

            }else{
                echo $this->alerta->swal_error('Debe Elegir una Imagen...', TRUE);
                EXIT;
            }

            $datos['nombre'] = $nombre;
            $datos['especialidad'] = $especialidad;
            $datos['cop'] = $cop;
            $datos['descripcion'] = $descripcion;
            $datos['imagen'] = $newImagen;
            $datos['idsede'] = $finalSede;
            $datos['fecha_registro'] = date("Y-m-d H:i:s");
            $datos['fecha_modificacion'] = date("Y-m-d H:i:s");
            $datos['idusuario'] = $this->_session->sys_id;
            $result = $this->m_staff->insertar($datos);
            if($result){
                $bitacora['descripcion'] = 'Agrego: ' . $nombre;
                $bitacora['modulo'] = 'staff';
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
            $where = array('s.idstaff' => $id, 's.oculto' => 0);
            $staff = $this->m_staff->mostrar($where);
            if (!empty($staff)){
                if($this->m_staff->existe_campo('nombre',$nombre,$id)){
                    echo $this->alerta->swal_error('Este Especialista  ya se encuentra registrado...', TRUE);
                    EXIT;
                }

                if($this->_session->sys_grade == '1' || $this->_session->sys_grade == '2' || $this->_session->sys_grade == '3'){
                    $tmpSede = $this->m_sede->mostrar($sede);
                    $finalSede = $sede;
                }else{
                    $tmpSede = $this->m_sede->mostrar($this->_session->sys_idsede);
                    $finalSede = $this->_session->sys_idsede;
                }

                if ($imagen !== FALSE){
                    $mark = array('marca' => '', 'tipo' => 'string');
                    $dir = 'public/imagen/staff/'.$tmpSede['folder'];
                    $newImagen = $this->archivo->guardar_imagen($imagen, $dir, $mark, 1600, $this->items['proyecto']);
                    $this->archivo->eliminar_imagen($staff['imagen'], $dir);
                }else{
                    $newImagen = $staff['imagen'];
                }                

                $datos['nombre'] = $nombre;
                $datos['especialidad'] = $especialidad;
                $datos['cop'] = $cop;
                $datos['descripcion'] = $descripcion;
                $datos['imagen'] = $newImagen;
                $datos['idsede'] = $finalSede;
                $datos['fecha_modificacion'] = date("Y-m-d H:i:s");
                $datos['idusuario'] = $this->_session->sys_id;

                $result = $this->m_staff->actualizar($datos, 'idstaff', $staff['idstaff']);
                if ($result) {
                    $bitacora['descripcion'] = 'Modificó: ' . $nombre;
                    $bitacora['modulo'] = 'staff';
                    $bitacora['tipo'] = '2';
                    $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
                    $bitacora['idusuario'] = $this->_session->sys_id;
                    $this->m_bitacora->insertar($bitacora);

                    echo $this->alerta->swal_success('Se ha editado correctamente...');
                    echo $this->url_comp->actualizar_tiempo('2000');
                    EXIT;
                }
            } else {
                echo $this->url_comp->direccionar(base_url() . 'admin/staff/listar', TRUE);
                EXIT;
            }
        }
    }

    public function accion_denegar($id = '') {
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/staff/listar', TRUE);
            EXIT;
        }
        $where = array('s.idstaff' => $id, 's.oculto' => 0);
        $resultSet = $this->m_staff->mostrar($where);
        if (empty($resultSet)) {
            echo $this->url_comp->direccionar(base_url() . 'admin/staff/listar', TRUE);
        } else {
            $this->m_staff->ocultar($id);
            $bitacora['descripcion'] = 'Eliminó: ' . $resultSet['nombre'];
            $bitacora['modulo'] = 'staff';
            $bitacora['tipo'] = '3';
            $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
            $bitacora['idusuario'] = $this->_session->sys_id;
            $this->m_bitacora->insertar($bitacora);
            
            echo $this->url_comp->direccionar(base_url() . 'admin/staff/listar', TRUE);
        }
    }
}

