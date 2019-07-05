<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Usuario extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('session_manager');
        $helper = array();
        $model = array('m_usuario','m_usuario_datos','m_nivel', 'm_sede');
        $this->load->library($library);
        $this->load->helper($helper);
        $this->load->model($model);
        /*
         * Configuración personalizada
         */
        $this->_session = $this->session_manager->datos_usuario('user_data');
        $proyecto = $this->m_configuracion->mostrar(array('c.campo' => 'proyecto_nombre'));
        $this->items['proyecto'] = $proyecto['valor'];
        $this->items['base_url'] = base_url();
        $favicon = $this->m_configuracion->mostrar(array('c.campo'=>'favicon'));
        $this->items['logo'] = $this->m_configuracion->mostrar(array('c.campo'=>'logo'));
        $this->items['favicon_logo'] = $favicon['valor'];

    }

    public function listar() {
        $login = $this->session_manager->datos_usuario_logueado();
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Lista de Usuarios';
        $data['tipo'] = 'agregar';
        /* -------------------------------------------------------------------- */
        $lista = $this->m_usuario_datos->mostrar_activos();
        var_dump($lista);
        $total = count($this->m_usuario_datos->mostrar_activos());
        if (!empty($lista)) {
            $i = 1;
            foreach ($lista AS $items) {
                $accion = $this->mantenimiento->accion($items['idusuario'], 'editar2|password|eliminar2', 'usuario', $items['oculto']);
                $estado = $this->mantenimiento->estado($items['oculto']);
                if($items['nivel_id'] != '1' && $items['nivel_id'] != '2' && $items['nivel_id'] != '3'){
                    $data['lista'][] = array(
                        'id' => $items['idusuario'],
                        'numero' => $i,
                        'nombre' => $items['nombres'],
                        'usuario' => $items['usuario'],
                        'nivel' => $items['nivel'],
                        'f_registro' => date("d-m-Y H:i:s", strtotime($items['fecha_registro'])),
                        'estado' => $estado,
                       'accion' => $accion
                    );
                }
                $i++;
            }
        }
        /* ------------------------------------------------------------------ */
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("listar_usuario", $data);
    }


    public function agregar(){
        $login = $this->session_manager->datos_usuario_logueado();
        $data = array();
        $data['tipo'] = 'agregar';

        // PARA EL COMBO DE NIVEL DE USUARIO
        $nivel = $this->m_nivel->mostrar_activos(FALSE,FALSE,array('n.nombre','asc'));
        if (!empty($nivel)) {
            foreach ($nivel as $items) {
                if($items['idnivel'] != '1' && $items['idnivel'] != '2'){
                    $this->_result[$items['idnivel']] = $items['nombre'];
                }
            }
            $data['nivel'] = $this->documento->generar_dropdown($this->_result, 'nivel', '','Selecione un opción');
            unset($this->_result);
        }
		
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
        $contenido = $this->smarty_tpl->view('admin/view/modal_usuario', $data, TRUE);
        $datos['titulo'] = "Agregar Usuario";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }


    public function editar($id = '') {
        $login = $this->session_manager->datos_usuario_logueado();
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/usuario/listar', TRUE);
            EXIT;
        }
        $data['tipo'] = 'editar';
        
        /* ------------------------------------------------------------ */
        $where = array('ud.idusuariodatos' => $id, 'ud.oculto' => 0);
        $user = $this->m_usuario_datos->mostrar($where);
        if (!empty($user)) {
            $data['id'] = $user['idusuariodatos'];
            $data['nombre'] = $user['nombres'];
            $data['usuario'] = $user['usuario'];

            // PARA EL COMBO DE NIVEL DE USUARIO
            $nivel = $this->m_nivel->mostrar_activos(FALSE,FALSE,array('n.nombre','asc'));
            if (!empty($nivel)) {
                foreach ($nivel as $items) {
                    if($items['idnivel'] != '1'){
                        $this->_result[$items['idnivel']] = $items['nombre'];
                    }
                }
                $data['nivel'] = $this->documento->generar_dropdown($this->_result, 'nivel', $user['nivel_id'],'Selecione un opción');
                unset($this->_result);
            }

        } else {
            echo $this->url_comp->direccionar(base_url() . 'admin/usuario/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $datos['titulo'] = "Agregar Usuario";
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view("admin/view/modal_usuario", $data, TRUE);
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }

    public function password($id = '') {
        $login = $this->session_manager->datos_usuario_logueado();
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/usuario/listar', TRUE);
            EXIT;
        }
        
        /* ------------------------------------------------------------ */
        $where = array('ud.idusuariodatos' => $id, 'ud.oculto' => 0);
        $user = $this->m_usuario_datos->mostrar($where);
        if (!empty($user)) {
            $data['id'] = $user['idusuario'];
            $data['usuario'] = $user['usuario'];

        } else {
            echo $this->url_comp->direccionar(base_url() . 'admin/usuario/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $datos['titulo'] = "Cambiar Password";
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view("admin/view/modal_password", $data, TRUE);
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }

    public function form_password() {
        $login = $this->session_manager->datos_usuario_logueado();


        $where = array('u.idusuario' => $this->_session->sys_id, 'u.oculto' => 0);
        $user = $this->m_usuario->mostrar($where);
        if (!empty($user)) {
            $data['id'] = $user['idusuario'];
            $data['usuario'] = $user['usuario'];

        } else {
            echo $this->url_comp->direccionar(base_url() . 'admin/usuario/listar', TRUE);
            EXIT;
        }

        /* ------------------------------------------------------------ */
        $datos['titulo'] = "Cambiar Password";
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view("admin/view/modal_password", $data, TRUE);
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }

    public function accion() {
        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $sede = $this->input->post('sede');
        $nivel = $this->input->post('nivel');
        $usuario = $this->input->post('usuario');
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');

        
        $error = '';
        $error .= $this->mantenimiento->validacion($nombre, 'required|maxlenght[255]', 'Nombres');
        $error .= $this->mantenimiento->validacion($usuario, 'required|maxlenght[255]', 'Usuario');
        if($id == ''){
            $error .= $this->mantenimiento->validacion($password, 'required|maxlenght[255]', 'Password');
            $error .= $this->mantenimiento->validacion($repassword, 'required|maxlenght[255]', 'Confirmar Password');
        }        
        $error .= $this->mantenimiento->validacion($nivel, 'required|numeric', 'Nivel de Usuario');
        
        if ($error != '') {
            echo $this->alerta->swal_error($error, TRUE);
            EXIT;
        }
        if ($id == '') {
            if($this->m_usuario->existe_campo('usuario',$usuario)){
                echo $this->alerta->swal_error('El usuario ya se encuentra registrado...', TRUE);
                EXIT;
            }else {  
                if($password != $repassword){
                    echo $this->alerta->swal_error('Las contraseñas no coinciden...', TRUE);
                    EXIT;   
                }

                $user['usuario'] = $usuario;
                $user['password'] = base64_encode($password);
                $user['conectado'] = date("Y-m-d H:i:s");
                $user['desconectado'] = date("Y-m-d H:i:s");
                $user['idnivel'] = $nivel;
                if($sede != ''){
                   $user['idsede'] = $sede;
                }
              
                $resultSet = $this->m_usuario->insertar($user, TRUE);
                if ($resultSet != NULL) {
                    $detalle['nombres'] = $nombre;
                    $detalle['fecha_registro'] = date("Y-m-d H:i:s");
                    $detalle['idusuario'] = $resultSet;
                    $this->m_usuario_datos->insertar($detalle);
                    echo $this->alerta->swal_success('Se ha registrado correctamente...');
                    echo $this->url_comp->direccionar_tiempo(base_url().'admin/usuario/listar','1500');
                    EXIT;
                }
            }
        } else { //EDITAR
            $where = array('ud.idusuariodatos' => $id, 'ud.oculto' => 0);
            $tmpDatos = $this->m_usuario_datos->mostrar($where); 
            if (!empty($tmpDatos)) {
                $tmpUser = $this->m_usuario->mostrar(array('u.idusuario' => $tmpDatos['idusuario']));
                if($this->m_usuario->existe_campo('usuario',$usuario,$tmpUser['idusuario'])){
                    echo $this->alerta->swal_error('El usuario ya se encuentra registrado...', TRUE);
                    EXIT;

                }else {
                    $user['usuario'] = $usuario;
                    $user['idnivel'] = $nivel;

                    $resultSet = $this->m_usuario->actualizar($user, 'idusuario', $tmpDatos['idusuario']);
                    if ($resultSet === TRUE) {
                        $detalle['nombres'] = $nombre;
                        $this->m_usuario_datos->actualizar($detalle, 'idusuariodatos', $id);
                        echo $this->alerta->swal_success('Se ha editado correctamente...');
                        echo $this->url_comp->direccionar_tiempo(base_url().'admin/usuario/listar','1500');
                        EXIT;
                    }
                }
            } else {
                echo $this->url_comp->direccionar(base_url() . 'admin/usuario/listar', TRUE);
                EXIT;
            }
        }
        if ($resultSet === FALSE) {
            echo $this->alerta->mensaje_error('Ocurrieron algunos errores...');
            EXIT;
        }
    }

    public function accion_password() {
        $id = $this->input->post('id');
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');

        
        $error = '';
        $error .= $this->mantenimiento->validacion($password, 'required|maxlenght[255]', 'Password');
        $error .= $this->mantenimiento->validacion($repassword, 'required|maxlenght[255]', 'Confirmar Password');

        
        if ($error != '') {
            echo $this->alerta->swal_error($error, TRUE);
            EXIT;
        }
            
        $user = $this->m_usuario->mostrar(array('u.idusuario' => $id));
        
        if (!empty($user)) {
            if($password != $repassword){
                echo $this->alerta->swal_error('Las contraseñas no coinciden...', TRUE);
                EXIT;   
            }
            $datos['password'] = base64_encode($password);
            $resultSet = $this->m_usuario->actualizar($datos, 'idusuario', $id);
            if ($resultSet === TRUE) {
                echo $this->alerta->swal_success('Se ha editado correctamente...');
                echo $this->url_comp->direccionar_tiempo(base_url().'admin/usuario/listar','1500');
                EXIT;
            }

        }else{
            echo $this->url_comp->direccionar(base_url() . 'admin/usuario/listar', TRUE);
            EXIT;
        }
       
    }

    public function accion_denegar($id = '') {
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/usuario/listar', TRUE);
            EXIT;
        }
        $where = array('ud.idusuariodatos' => $id, 'ud.oculto' => 0);
        $resultSet = $this->m_usuario_datos->exists($where);
        if ($resultSet == 0) {
            echo $this->url_comp->direccionar(base_url() . 'admin/usuario/listar', TRUE);
        } else {
            $tmpDatos = $this->m_usuario_datos->mostrar(array('ud.idusuariodatos' => $id));
            $this->m_usuario_datos->ocultar($id);
            $this->m_usuario->ocultar($tmpDatos['idusuario']);
            echo $this->url_comp->direccionar(base_url() . 'admin/usuario/listar', TRUE);
        }
    }

    public function accion_permitir($id = '') {
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/usuario/listar', TRUE);
            EXIT;
        }
        $where = array('ud.id' => $id, 'ud.oculto' => 1);
        $resultSet = $this->m_usuario_datos->exists($where);
        if ($resultSet === FALSE) {
            echo $this->url_comp->direccionar(base_url() . 'admin/usuario/listar', TRUE);
        } else {
            $tmpDatos = $this->m_usuario_datos->mostrar(array('ud.id' => $id));
            $this->m_usuario_datos->permitir($id);
            $this->m_usuario->permitir($tmpDatos['usuario_id']);
            echo $this->url_comp->direccionar(base_url() . 'admin/usuario/listar', TRUE);
        }
    }

}