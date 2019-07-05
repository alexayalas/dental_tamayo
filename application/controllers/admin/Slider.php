<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Slider extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * DECLARACION DE LIBRERIAS, HELPERS Y MODELOS
         */
        $library = array('session_manager', 'archivo', 'orden');
        $helper = array('base64_url');
        $model = array('m_usuario','m_slider');
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
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Slider';
        /* -------------------------------------------------------------------- */
        
        $lista = $this->m_slider->mostrar_activos(FALSE, FALSE, array("s.posicion"=>"asc"));        
        if (!empty($lista)) {
            $i = 1;
            foreach ($lista AS $items) {
                $accion = $this->mantenimiento->accion($items['idslider'], 'editar|eliminar|subir|bajar', 'slider', $items['oculto']);
                    $data['lista'][] = array(
                        'id' => $items['idslider'],
                        'numero' => $i,
                        'titulo' => $items['titulo1'] . ' '. '<b>'.$items['titulo2'].'</b>',
                        'subtitulo' => $items['subtitulo'],
                        'imagen' => $items['imagen'],
                        'orden' => $items['posicion'],
                        'f_registro' => date("d-m-Y H:i:s", strtotime($items['fecha_registro'])),
                        'accion' => $accion,
                    );
                    $i++;
                }
            }

        /* ------------------------------------------------------------------ */
        $data['titulo'] = 'Imagenes para el Slider';
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("listar_slider", $data);
    }

    public function agregar(){
        $login = $this->session_manager->datos_usuario_logueado();
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Agregar imagen para Slider';

        $data['tipo'] = 'agregar';
        $data['titulo'] = 'Agregar Imagen para el Slider';
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("form_slider", $data);
    }

    public function editar($id = '') {
        $login = $this->session_manager->datos_usuario_logueado();
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Editar imagen para Slider';

        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/slider/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $where = array('s.idslider' => $id, 's.oculto' => 0);
        $tmp = $this->m_slider->mostrar($where);
        if (!empty($tmp)) {
            $data['id'] = $tmp['idslider'];
            $data['titulo1'] = $tmp['titulo1'];
            $data['titulo2'] = $tmp['titulo2'];
            $data['subtitulo'] = $tmp['subtitulo'];
            $data['imagen'] = $tmp['imagen'];
        } else {
            echo $this->url_comp->direccionar(base_url() . 'admin/slider/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        $data['tipo'] = 'agregar';
        $data['titulo'] = 'Editar Imagen para el Slider';
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("form_slider", $data);
    }


    public function accion() {
        $id = $this->input->post('id');
        $titulo1 = $this->input->post('titulo1');
        $titulo2 = $this->input->post('titulo2');
        $subtitulo = $this->input->post('subtitulo');
        $imagen = $this->archivo->archivo_1('imagen', 'single');
        
        $tituloFinal = $titulo1 . ''. $titulo2;

        $error = '';
        $error .= $this->mantenimiento->validacion($tituloFinal, 'required|maxlenght[50]', 'Titulo');
        $error .= $this->mantenimiento->validacion($subtitulo, 'required|maxlenght[50]', 'Subtitulo');

        if ($error != '') {
            echo $this->alerta->swal_error($error, TRUE);
            EXIT;
        }

        if ($id == '') {  

            if ($imagen !== FALSE){
                $mark = array('marca' => '', 'tipo' => 'string');
                $newImagen = $this->archivo->guardar_imagen($imagen, 'public/imagen/slider', $mark, 1600, $this->items['proyecto']);

            }else{
                echo $this->alerta->swal_error('Debe Elegir una Imagen...', TRUE);
                EXIT;
            }

            $datos['titulo1'] = $titulo1;
            $datos['titulo2'] = $titulo2;
            $datos['subtitulo'] = $subtitulo;
            $datos['imagen'] = $newImagen;
            $datos['fecha_registro'] = date("Y-m-d H:i:s");
            $datos['fecha_modificacion'] = date("Y-m-d H:i:s");
            $datos['idusuario'] = $this->_session->sys_id;

            $result = $this->m_slider->insertar_posicion($datos);
            if($result){
                echo $this->alerta->swal_success('Se registro correctamente...');
                echo $this->url_comp->direccionar_tiempo(base_url() . 'admin/slider/listar', '1500');                   
                EXIT;
            }else{
                echo $this->alerta->swal_error('Hubo problemas...', TRUE);
                EXIT;
            }
            
        } else { //EDITAR
            $where = array('s.idslider' => $id, 's.oculto' => 0);
            $slider = $this->m_slider->mostrar($where);
            if (!empty($slider)){
                
                if ($imagen !== FALSE){
                    $mark = array('marca' => '', 'tipo' => 'string');
                    $newImagen = $this->archivo->guardar_imagen($imagen, 'public/imagen/slider', $mark, 1600, $this->items['proyecto']);
                    $this->archivo->eliminar_imagen($slider['imagen'], 'public/imagen/slider');
                }else{
                    $newImagen = $slider['imagen'];
                }                

                $datos['titulo1'] = $titulo1;
                $datos['titulo2'] = $titulo2;
                $datos['subtitulo'] = $subtitulo;
                $datos['imagen'] = $newImagen;
                $datos['fecha_modificacion'] = date("Y-m-d H:i:s");
                $datos['idusuario'] = $this->_session->sys_id;
                $result = $this->m_slider->actualizar($datos, 'idslider', $slider['idslider']);
                if ($result) {
                    echo $this->alerta->swal_success('Se ha editado correctamente...');
                    echo $this->url_comp->direccionar_tiempo(base_url() . 'admin/slider/listar', '1500');
                    EXIT;
                }
            } else {
                echo $this->url_comp->direccionar(base_url() . 'admin/slider/listar', TRUE);
                EXIT;
            }
        }
    }

    public function subir_posicion() {
        $id = $this->input->post('id');
        $resultSet = $this->m_slider->exists(array('s.idslider' => $id, 's.oculto' => 0));
        if (!empty($resultSet)) {
            $imagen = $this->m_slider->mostrar(array('s.idslider' => $id, 's.oculto' => 0));
            $lista_imagen = $this->m_slider->mostrar_todo();
            $data = array();
            foreach ($lista_imagen as $items) {
                $data[] = (int) $items['posicion'];
            }
            $result = $this->orden->subir($data, $imagen['posicion']);
            $this->m_slider->ordenar_posicion($result);
            echo $this->url_comp->actualizar();
            EXIT;
        } else {
            echo $this->alerta->mensaje_error('Hubo problemas', TRUE);
            EXIT;
        }
    }

    public function bajar_posicion() {
        $id = $this->input->post('id');
        $resultSet = $this->m_slider->exists(array('s.idslider' => $id, 's.oculto' => 0));
        if (!empty($resultSet)) {
            $imagen = $this->m_slider->mostrar(array('s.idslider' => $id, 's.oculto' => 0));
            $lista_imagen = $this->m_slider->mostrar_todo();
            $data = array();
            foreach ($lista_imagen as $items) {
                $data[] = (int) $items['posicion'];
            }
            $result = $this->orden->bajar($data, $imagen['posicion']);
            $this->m_slider->ordenar_posicion($result);
            echo $this->url_comp->actualizar();
            EXIT;
        } else {
            echo $this->alerta->mensaje_error('Hubo problemas', TRUE);
            EXIT;
        }
    }


    public function accion_eliminar($id = '') {
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/slider/listar', TRUE);
            EXIT;
        }
        $where = array('s.idslider' => $id, 's.oculto' => 0);
        $resultSet = $this->m_slider->exists($where);
        if ($resultSet === FALSE) {
            echo $this->url_comp->direccionar(base_url() . 'admin/slider/listar', TRUE);
            EXIT;
        }
        $imagen = $this->m_slider->mostrar($where);
        $this->archivo->eliminar_imagen($imagen['imagen'], 'public/imagen/slider');
        $this->m_slider->eliminar($id);
        $list = $this->m_slider->mostrar_todo();
        $result = array();
        for ($i = 0; $i < count($list); $i++) {
            $result[] = $i + 1;
        }
        $this->m_slider->ordenar_posicion($result);
        echo $this->url_comp->actualizar_tiempo('1200');
        EXIT;
    }


}

