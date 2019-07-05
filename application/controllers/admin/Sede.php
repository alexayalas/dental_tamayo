<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Sede extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * DECLARACION DE LIBRERIAS, HELPERS Y MODELOS
         */
        $library = array('session_manager');
        $helper = array('base64_url');
        $model = array('m_usuario', 'm_sede', 'm_origen', 'm_sede_correo');
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
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Listado de Sedes';
        /* -------------------------------------------------------------------- */
             
        $lista = $this->m_sede->mostrar_activos(FALSE, FALSE, array("o.nombre" => "asc", "s.nombre" => "asc"));
            if (!empty($lista)) {
                $i = $this->uri->segment(4) == '' ? 1 : $this->uri->segment(4)+1;
                foreach ($lista AS $items) {
                    if($this->_session->sys_grade == '4' || $this->_session->sys_grade == '3'){
                        $accion = $this->mantenimiento->accion($items['idsede'], 'editar2|correo|eliminar2', 'sede', $items['oculto'], $items['directo']);
                    }else{
                        $accion = $this->mantenimiento->accion($items['idsede'], 'editar2|correo|directo|indirecto|eliminar2', 'sede', $items['oculto'], $items['directo']);
                    }
                    
                    $data['lista'][] = array(
                        'id' => $items['idsede'],
                        'numero' => $i,
                        'codigo' => $items['codigo'],
                        'nombre' => $items['nombre'],
                        'direccion' => $items['direccion'],
                        'telefono' => $items['telefono'],
                        'origen' => $items['origen'],
                        'directo' => $items['directo'],
                        'f_registro' => date("d-m-Y H:i:s", strtotime($items['fecha_registro'])),
                        'accion' => $accion,
                    );
                    $i++;
                }
            }

        /* ------------------------------------------------------------------ */
        $data['titulo'] = 'Listado de Sedes';
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("listar_sede", $data);
    }

    public function agregar(){
        $login = $this->session_manager->datos_usuario_logueado();
        $data = array();

        // PARA EL COMBO DE ORIGEN
        $origen = $this->m_origen->mostrar_activos(FALSE,FALSE,array('o.nombre','asc'));
        if (!empty($origen)) {
            foreach ($origen as $items) {
                    $this->_result[$items['idorigen']] = $items['nombre'];
            }
            $data['origen'] = $this->documento->generar_dropdown($this->_result, 'origen', '1','Selecione una Opción');
            unset($this->_result);
        }

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view('admin/view/modal_sede', $data, TRUE);
        $datos['titulo'] = "Agregar Sede";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }

    public function editar($id = '') {
        $login = $this->session_manager->datos_usuario_logueado();
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/sede/listar', TRUE);
            EXIT;
        }
        $data['titulo'] = 'Editar Email-Respuesta';
        /* ------------------------------------------------------------ */
        $where = array('s.idsede' => $id, 's.oculto' => 0);
        $tmp = $this->m_sede->mostrar($where);
        if (!empty($tmp)) {
            $data['id'] = $tmp['idsede'];
            $data['codigo'] = $tmp['codigo'];
            $data['nombre'] = $tmp['nombre'];
            $data['direccion'] = $tmp['direccion'];
            $data['telefono'] = $tmp['telefono'];
            $data['longitud'] = $tmp['longitud'];
            $data['latitud'] = $tmp['latitud'];

            // PARA EL COMBO DE ORIGEN
            $origen = $this->m_origen->mostrar_activos(FALSE,FALSE,array('o.nombre','asc'));
            if (!empty($origen)) {
                foreach ($origen as $items) {
                        $this->_result[$items['idorigen']] = $items['nombre'];
                }
                $data['origen'] = $this->documento->generar_dropdown($this->_result, 'origen', $tmp['idorigen'],'Selecione una Opción');
                unset($this->_result);
            }
        } else {
            echo $this->url_comp->direccionar(base_url() . 'admin/sede/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view("admin/view/modal_sede", $data, TRUE);
        $datos['titulo'] = "Editar Sede";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }


    public function accion() {
        $id = $this->input->post('id');
        $codigo = $this->input->post('codigo');
        $nombre = $this->input->post('nombre');
        $direccion = $this->input->post('direccion');
        $origen = $this->input->post('origen');
        $telefono = $this->input->post('telefono');
        $latitud = $this->input->post('latitud');
        $longitud = $this->input->post('longitud');
        
        $error = '';
        $error .= $this->mantenimiento->validacion($origen, 'required|numeric', 'Origen');
        $error .= $this->mantenimiento->validacion($codigo, 'required', 'Codigo Interno');
        $error .= $this->mantenimiento->validacion($nombre, 'required', 'Nombre');
        $error .= $this->mantenimiento->validacion($direccion, 'required', 'Dirección');
        $error .= $this->mantenimiento->validacion($latitud, 'required', 'Latitud');
        $error .= $this->mantenimiento->validacion($longitud, 'required', 'Longitud');

        if ($error != '') {
            echo $this->alerta->swal_error($error, TRUE);
            EXIT;
        }

        if ($id == '') {     
            $datos['codigo'] = $codigo;
            $datos['nombre'] = $nombre;
            $datos['direccion'] = $direccion;
            $datos['telefono'] = $telefono;
            $datos['longitud'] = $longitud;
            $datos['latitud'] = $latitud;
            $datos['idorigen'] = $origen;
            $datos['fecha_registro'] = date("Y-m-d H:i:s");
            $datos['fecha_modificacion'] = date("Y-m-d H:i:s");
            $datos['idusuario'] = $this->_session->sys_id;
            $result = $this->m_sede->insertar($datos);
            if($result){
                $bitacora['descripcion'] = 'Agrego: ' . $nombre;
                $bitacora['modulo'] = 'sede';
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
            $where = array('s.idsede' => $id, 's.oculto' => 0);
            $sede = $this->m_sede->mostrar($where);
            if (!empty($sede)){
                $datos['codigo'] = $codigo;
                $datos['nombre'] = $nombre;
                $datos['direccion'] = $direccion;
                $datos['telefono'] = $telefono;
                $datos['longitud'] = $longitud;
                $datos['latitud'] = $latitud;
                $datos['idorigen'] = $origen;
                $datos['fecha_modificacion'] = date("Y-m-d H:i:s");
                $datos['idusuario'] = $this->_session->sys_id;
                $result = $this->m_sede->actualizar($datos, 'idsede', $sede['idsede']);
                if ($result) {
                    $bitacora['descripcion'] = 'Modificó: ' . $nombre;
                    $bitacora['modulo'] = 'sede';
                    $bitacora['tipo'] = '2';
                    $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
                    $bitacora['idusuario'] = $this->_session->sys_id;
                    $this->m_bitacora->insertar($bitacora);

                    echo $this->alerta->swal_success('Se ha editado correctamente...');
                    echo $this->url_comp->actualizar_tiempo('2000');
                    EXIT;
                }
            } else {
                echo $this->url_comp->direccionar(base_url() . 'admin/profesion/listar', TRUE);
                EXIT;
            }
        }
    }

    public function correo($id = '') {
        $login = $this->session_manager->datos_usuario_logueado();
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/sede/listar', TRUE);
            EXIT;
        }

        $correos = $this->m_sede_correo->mostrar_cuando(array("sc.idsede" => $id), FALSE, FALSE, array("c.email", "asc"));
        if(!empty($correos)){
            $data['listaCorreo'] = $correos;
        }

        $tmpSede = $this->m_sede->mostrar(array("s.idsede" => $id));

        $data['id'] = $id;
        /* ------------------------------------------------------------ */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view("admin/view/modal_correo", $data, TRUE);
        $datos['titulo'] = "Correos de Destino para la Sede: " . "<b>".$tmpSede['nombre']."</b>" ;
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }

    public function bloquear_correo($id = '') {
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/sede/listar', TRUE);
            EXIT;
        }
        $where = array('s.idsede' => $id, 's.oculto' => 0);
        $tmpSede = $this->m_sede->mostrar($where);
        if(!empty($tmpSede)){
            $dato['directo'] = '0';
            $this->m_sede->actualizar($dato, 'idsede', $tmpSede['idsede']);
            echo $this->url_comp->direccionar(base_url() . 'admin/sede/listar', TRUE);
            EXIT;
        }else{
            echo $this->url_comp->direccionar(base_url() . 'admin/sede/listar', TRUE);
            EXIT;
        }
    }

    public function desbloquear_correo($id = '') {
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/sede/listar', TRUE);
            EXIT;
        }
        $where = array('s.idsede' => $id, 's.oculto' => 0);
        $tmpSede = $this->m_sede->mostrar($where);
        if(!empty($tmpSede)){
            $dato['directo'] = '1';
            $this->m_sede->actualizar($dato, 'idsede', $tmpSede['idsede']);
            echo $this->url_comp->direccionar(base_url() . 'admin/sede/listar', TRUE);
            EXIT;
        }else{
            echo $this->url_comp->direccionar(base_url() . 'admin/sede/listar', TRUE);
            EXIT;
        }
    }

    public function accion_denegar($id = '') {
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/sede/listar', TRUE);
            EXIT;
        }
        $where = array('s.idsede' => $id, 's.oculto' => 0);
        $resultSet = $this->m_sede->mostrar($where);
        if (empty($resultSet)) {
            echo $this->url_comp->direccionar(base_url() . 'admin/sede/listar', TRUE);
        } else {
            $this->m_sede->ocultar($id);
            $bitacora['descripcion'] = 'Elimino: ' . $resultSet['nombre'];
            $bitacora['modulo'] = 'sede';
            $bitacora['tipo'] = '3';
            $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
            $bitacora['idusuario'] = $this->_session->sys_id;
            $this->m_bitacora->insertar($bitacora);
            echo $this->url_comp->direccionar(base_url() . 'admin/sede/listar', TRUE);
        }
    }

}
