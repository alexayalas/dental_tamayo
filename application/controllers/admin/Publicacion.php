<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Publicacion extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * DECLARACION DE LIBRERIAS, HELPERS Y MODELOS
         */
        $library = array('session_manager');
        $helper = array('base64_url');
        $model = array('m_usuario', 'm_publicacion', 'm_categoria', 'm_autor', 'm_tag', 'm_tag_publicacion');
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

        /* PARA EL TAG */
        $tag = $this->m_tag->mostrar_activos();
        if (!empty($tag)) {
            foreach ($tag as $item) {
                $lista[] = $item['nombre'];
            }
        } else {
            $lista[] = array();
        }
        $this->items['list_tags'] = json_encode($lista);
    }

    public function listar() {
        $login = $this->session_manager->datos_usuario_logueado();
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Listado de Publicaciones';
        /* -------------------------------------------------------------------- */
        
        $lista = $this->m_publicacion->mostrar_activos();        
        if (!empty($lista)) {
            $i = 1;
            foreach ($lista AS $items) {
                $accion = $this->mantenimiento->accion($items['idpublicacion'], 'editar|eliminar2', 'publicacion', $items['oculto']);
                    $data['lista'][] = array(
                        'id' => $items['idpublicacion'],
                        'numero' => $i,
                        'titulo' => $items['titulo'],
                        'imagen' => $items['imagen'],
                        'categoria' => $items['categoria'],
                        'autor' => $items['autor'],
                        'visitas' => $items['visitas'],
                        'f_registro' => date("d-m-Y", strtotime($items['fecha_registro'])),
                        'accion' => $accion,
                    );
                    $i++;
                }
            }

        /* ------------------------------------------------------------------ */
        $data['titulo'] = 'Listado de Publicaciones';
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("listar_publicacion", $data);
    }

    public function agregar(){
        $login = $this->session_manager->datos_usuario_logueado();
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Agregar Publicacion';
        $data['tipo'] = 'agregar';
        $data['titulo2'] = 'Agregar Publicacion';
        /* -------------------------------------------------------------------- */
        // PARA EL COMBO DE CATEGORIA
        $categoria = $this->m_categoria->mostrar_activos(FALSE,FALSE,array('c.nombre','asc'));
        if (!empty($categoria)) {
            foreach ($categoria as $items) {
                    $this->_result[$items['idcategoria']] = $items['nombre'];
            }
            $data['categoria'] = $this->documento->generar_dropdown($this->_result, 'categoria', '','Selecione una Opción');
            unset($this->_result);
        }

         // PARA EL COMBO DE AUTOR
        $autor = $this->m_autor->mostrar_activos(FALSE,FALSE,array('a.nombre','asc'));
        if (!empty($autor)) {
            foreach ($autor as $items) {
                    $this->_result[$items['idautor']] = $items['nombre'];
            }
            $data['autor'] = $this->documento->generar_dropdown($this->_result, 'autor', '','Selecione una Opción');
            unset($this->_result);
        }

        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("form_publicacion", $data);
    }

    public function editar($id = '') {
        $login = $this->session_manager->datos_usuario_logueado();
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/publicacion/listar', TRUE);
            EXIT;
        }
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Editar Publicacion';
        $data['tipo'] = 'editar';
        $data['titulo2'] = 'Editar Publicacion';
        /* ------------------------------------------------------------ */
        $where = array('p.idpublicacion' => $id, 'p.oculto' => 0);
        $tmp = $this->m_publicacion->mostrar($where);
        if (!empty($tmp)) {
            $data['id'] = $tmp['idpublicacion'];
            $data['titulo'] = $tmp['titulo'];
            $data['desccorta'] = $tmp['descripcion_corta'];
            $data['descgeneral'] = $tmp['descripcion_general'];
            $data['imagen'] = $tmp['imagen'];

            // PARA EL COMBO DE CATEGORIA
            $categoria = $this->m_categoria->mostrar_activos(FALSE,FALSE,array('c.nombre','asc'));
            if (!empty($categoria)) {
                foreach ($categoria as $items) {
                        $this->_result[$items['idcategoria']] = $items['nombre'];
                }
                $data['categoria'] = $this->documento->generar_dropdown($this->_result, 'categoria', $tmp['idcategoria'],'Selecione una Opción');
                unset($this->_result);
            }

             // PARA EL COMBO DE AUTOR
            $autor = $this->m_autor->mostrar_activos(FALSE,FALSE,array('a.nombre','asc'));
            if (!empty($autor)) {
                foreach ($autor as $items) {
                        $this->_result[$items['idautor']] = $items['nombre'];
                }
                $data['autor'] = $this->documento->generar_dropdown($this->_result, 'autor', $tmp['idautor'],'Selecione una Opción');
                unset($this->_result);
            }

            // PARA LOS TAGS
            $tag = $this->m_tag_publicacion->mostrar_cuando(array('tp.idpublicacion' => $id));
            if(!empty($tag)){
                $descTag = '';
                foreach ($tag as $it) {
                    $descTag .= $it['tag'] .',';
                }
                $data['tag'] = $descTag;
            }


        } else {
            echo $this->url_comp->direccionar(base_url() . 'admin/publicacion/listar', TRUE);
            EXIT;
        }
        /* ------------------------------------------------------------ */
        /* Impresión de páginas */
        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->admin("form_publicacion", $data);
    }


    public function accion() {
        $id = $this->input->post('id');
        $titulo = $this->input->post('titulo');
        $titulo_seo = $this->input->post('titulo_seo');
        $desccorta = $this->input->post('desccorta');
        $descgeneral = $this->input->post('descgeneral');
        $categoria = $this->input->post('categoria');
        $autor = $this->input->post('autor');
        $tag = $this->input->post('tag_publicacion');
        $imagen = $this->archivo->archivo_1('imagen', 'single');

        $arrayTag = explode(',', $tag);
        
        $error = '';
        $error .= $this->mantenimiento->validacion($categoria, 'required|numeric', 'Categoria');
        $error .= $this->mantenimiento->validacion($autor, 'required|numeric', 'Autor');
        $error .= $this->mantenimiento->validacion($titulo, 'required', 'Titulo');
        $error .= $this->mantenimiento->validacion($titulo_seo, 'required', 'Titulo para SEO');
        $error .= $this->mantenimiento->validacion($desccorta, 'required', 'Descripcion Corta');
        $error .= $this->mantenimiento->validacion($descgeneral, 'required', 'Descripcion General');
        $error .= $this->mantenimiento->validacion($tag, 'required', 'Tags');

        if ($error != '') {
            echo $this->alerta->swal_error($error, TRUE);
            EXIT;
        }

        if ($id == '') {  
            if($this->m_publicacion->existe_campo('titulo',$titulo)){
                echo $this->alerta->swal_error('El titulo de la publicación ya se encuentra registrado...', TRUE);
                EXIT;
            }

            if ($imagen !== FALSE){
                $mark = array('marca' => '', 'tipo' => 'string');
                $newImagen = $this->archivo->guardar_imagen($imagen, 'public/imagen/publicacion', $mark, 1600, $this->items['proyecto']);

            }else{
                echo $this->alerta->swal_error('Debe Elegir una Imagen...', TRUE);
                EXIT;
            }

            $datos['titulo'] = $titulo;
            $datos['titulo_seo'] = $titulo_seo;
            $datos['url'] = $this->url_comp->convertir_url($titulo);
            $datos['descripcion_corta'] = $desccorta;
            $datos['descripcion_general'] = $descgeneral;
            $datos['imagen'] = $newImagen;
            $datos['idautor'] = $autor;
            $datos['idcategoria'] = $categoria;
            $datos['fecha_registro'] = date("Y-m-d H:i:s");
            $datos['fecha_modificacion'] = date("Y-m-d H:i:s");
            $datos['idusuario'] = $this->_session->sys_id;
            $result = $this->m_publicacion->insertar($datos, TRUE);
            if($result != NULL){
                for ($i=0; $i <count($arrayTag) ; $i++) { 
                    $tmpTag = $this->m_tag->mostrar(array("t.nombre" => $arrayTag[$i]));
                    if(!empty($tmpTag)){
                        $dato['idtag'] = $tmpTag['idtag'];
                        $dato['idpublicacion'] = $result;
                        $this->m_tag_publicacion->insertar($dato);
                    }else{
                        $datosTag['nombre'] = $arrayTag[$i];
                        $datosTag['url'] = $this->url_comp->convertir_url($arrayTag[$i]);
                        $datosTag['fecha_registro'] = date("Y-m-d H:i:s");
                        $newTag = $this->m_tag->insertar($datosTag, TRUE);
                        if($newTag != NULL){
                            $dato['idtag'] = $newTag;
                            $dato['idpublicacion'] = $result;
                            $this->m_tag_publicacion->insertar($dato);
                        }

                    }
                    
                }

                $bitacora['descripcion'] = 'Agrego: ' . $titulo;
                $bitacora['modulo'] = 'publicación';
                $bitacora['tipo'] = '1';
                $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
                $bitacora['idusuario'] = $this->_session->sys_id;
                $this->m_bitacora->insertar($bitacora);

                echo $this->alerta->swal_success('Se registro correctamente...');
                echo $this->url_comp->direccionar_tiempo(base_url().'admin/publicacion/listar', '1500');                   
                EXIT;

            }else{
                echo $this->alerta->swal_error('Hubo problemas...', TRUE);
                EXIT;
            }
            
        } else { //EDITAR
            $where = array('p.idpublicacion' => $id, 'p.oculto' => 0);
            $publicacion = $this->m_publicacion->mostrar($where);
            if (!empty($publicacion)){
                if($this->m_publicacion->existe_campo('titulo',$titulo,$id)){
                    echo $this->alerta->swal_error('El titulo de la publicación ya se encuentra registrado...', TRUE);
                    EXIT;
                }

                if ($imagen !== FALSE){
                    $mark = array('marca' => '', 'tipo' => 'string');
                    $newImagen = $this->archivo->guardar_imagen($imagen, 'public/imagen/publicacion', $mark, 1600, $this->items['proyecto']);
                    $this->archivo->eliminar_imagen($publicacion['imagen'], 'public/imagen/publicacion');
                }else{
                    $newImagen = $publicacion['imagen'];
                }                

                $datos['titulo'] = $titulo;
                $datos['titulo_seo'] = $titulo_seo;
                $datos['url'] = $this->url_comp->convertir_url($titulo);
                $datos['descripcion_corta'] = $desccorta;
                $datos['descripcion_general'] = $descgeneral;
                $datos['imagen'] = $newImagen;
                $datos['idautor'] = $autor;
                $datos['idcategoria'] = $categoria;
                $datos['fecha_modificacion'] = date("Y-m-d H:i:s");
                $datos['idusuario'] = $this->_session->sys_id;

                $result = $this->m_publicacion->actualizar($datos, 'idpublicacion', $publicacion['idpublicacion']);
                if ($result) {
                    $this->m_tag_publicacion->eliminar(array('idpublicacion' => $id));
                    for ($i=0; $i <count($arrayTag) ; $i++) { 
                        $tmpTag = $this->m_tag->mostrar(array('t.nombre' => $arrayTag[$i]));
                        if(empty($tmpTag)){
                            $datosTag['nombre'] = $arrayTag[$i];
                            $datosTag['url'] = $this->url_comp->convertir_url($arrayTag[$i]);
                            $datosTag['fecha_registro'] = date("Y-m-d H:i:s");
                            $newTag = $this->m_tag->insertar($datosTag, TRUE);
                            if($newTag != NULL){
                                $dato['idtag'] = $newTag;
                                $dato['idpublicacion'] = $id;
                                $this->m_tag_publicacion->insertar($dato);
                            }
                        }else{
                            $datoTp['idtag'] = $tmpTag['idtag'];
                            $datoTp['idpublicacion'] = $id;
                            $this->m_tag_publicacion->insertar($datoTp);
                        }
                    }

                    $bitacora['descripcion'] = 'Modificó: ' . $titulo;
                    $bitacora['modulo'] = 'publicación';
                    $bitacora['tipo'] = '2';
                    $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
                    $bitacora['idusuario'] = $this->_session->sys_id;
                    $this->m_bitacora->insertar($bitacora);

                    echo $this->alerta->swal_success('Se ha editado correctamente...');
                    echo $this->url_comp->actualizar_tiempo('2000');
                    EXIT;
                }
            } else {
                echo $this->url_comp->direccionar(base_url() . 'admin/publicacion/listar', TRUE);
                EXIT;
            }
        }
    }

    public function accion_denegar($id = '') {
        if ($id == '') {
            echo $this->url_comp->direccionar(base_url() . 'admin/publicacion/listar', TRUE);
            EXIT;
        }
        $where = array('p.idpublicacion' => $id, 'p.oculto' => 0);
        $resultSet = $this->m_publicacion->mostrar($where);
        if (empty($resultSet)) {
            echo $this->url_comp->direccionar(base_url() . 'admin/publicacion/listar', TRUE);
        } else {
            $this->m_publicacion->ocultar($id);
            $this->m_tag_publicacion->ocultar(array('idpublicacion' => $id));
            
            $bitacora['descripcion'] = 'Eliminó: ' . $resultSet['titulo'];
            $bitacora['modulo'] = 'publicación';
            $bitacora['tipo'] = '3';
            $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
            $bitacora['idusuario'] = $this->_session->sys_id;
            $this->m_bitacora->insertar($bitacora);

            echo $this->url_comp->direccionar(base_url() . 'admin/publicacion/listar', TRUE);
        }
    }
}

