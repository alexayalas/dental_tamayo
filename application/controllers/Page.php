<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Page extends CI_Controller {

    private $items = array();

    public function __construct() {
        parent::__construct();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('parser','session_manager', 'fecha', 'googlemaps');
        $helper = array('url','base64_url');
        $model = array('m_convenio', 'm_referencia', 'm_especialidad', 'm_slider', 'm_tag', 'm_publicacion', 'm_tag_publicacion', 'm_categoria', 'm_sede', 'm_origen_formulario', 'm_promocion');
        $this->load->library($library);
        $this->load->helper($helper);
        $this->load->model($model);

        /*
         * Configuración personalizada
         */
        
        $this->items['proyecto'] = 'Dental Tamayo';
        $this->_session = $this->session_manager->datos_usuario('encuesta_data');
        $this->items['base_url'] = base_url();

        /* PARA EL TAG */
        $tag = $this->m_tag->mostrar_activos(12, FALSE, array("t.visitas", "desc"));
        if (!empty($tag)) {
            foreach ($tag as $item) {
                $this->items['lista_tag'][] = array(
                        'idtag' => $item['idtag'],
                        'nombre' => $item['nombre'],
                        'url' => $item['url'],
                    );
            }
            
        }
        

    }

    public function home() {
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Su Clínica Dental de Confianza';
        $data['descripcion'] = '';

        $data['active1'] = "current-menu-item";

        $slider = $this->m_slider->mostrar_activos(FALSE, FALSE, ["s.posicion", "asc"]);  
        if(!empty($slider)){
            $data['slider'] = $slider;
        }

        $data = array_merge($data, $this->items);
        $this->template->web("home", $data);
    }

    
    /* INTERNAS */
    public function nosotros($url = ''){
        
        if($url == ''){
            $data['active2'] = "current-menu-item";
            $data['titulo_pagina'] = 'Nosotros | ' . $this->items['proyecto'];
            $data['descripcion'] = '';
            $data = array_merge($data, $this->items);
            $this->template->web_2("nosotros", $data);
        
        }elseif($url == 'reconocimientos'){
            $data['active2'] = "current-menu-item";
            $data['titulo_pagina'] = 'Reconocimientos | ' . $this->items['proyecto'];
            $data['descripcion'] = '';
            $data = array_merge($data, $this->items);
            $this->template->web_2("reconocimiento", $data);      
        
        }elseif($url == 'franquicias'){
            $data['active8'] = "current-menu-item";
            $data['titulo_pagina'] = 'Franquicias | ' . $this->items['proyecto'];
            $data['descripcion'] = '';
            $data = array_merge($data, $this->items);
            $this->template->web_2("franquicias", $data); 
        
        }elseif($url == 'convenios'){
            $convenios = $this->m_convenio->mostrar_activos(FALSE,FALSE, ["c.posicion" => "asc"]);
            if(!empty($convenios)){
                $i = 1;
                foreach ($convenios as $item) {
                    $data['convenio'][] = [
                        'numero' => $i,
                        'nombre' => $item['nombre'],
                        'imagen' => $item['imagen']
                    ];
                $i++;
                }
            }

            $data['titulo_pagina'] = 'Convenios | ' . $this->items['proyecto'];
            $data['descripcion'] = '';
            $data = array_merge($data, $this->items);
            $this->template->web_2("convenio", $data); 
        }
        
    }


    public function servicios($url = ''){
        if($url == 'especialidades'){
            $data['active4'] = "current-menu-item";
            $data['titulo_pagina'] = 'Especialidades | ' . $this->items['proyecto'];
            $data['descripcion'] = '';
            $data = array_merge($data, $this->items);
            $this->template->web_2("especialidad", $data);
        
        }elseif($url == 'emergencias'){
            $data['active3'] = "current-menu-item";
            $data['titulo_pagina'] = 'Emergencias 24 horas | ' . $this->items['proyecto'];
            $data['descripcion'] = '';

            $sedes = $this->m_sede->mostrar(array("s.idsede" => '16'));

            if(!empty($sedes)){
                $lista[] = array(
                    "address" => null,
                    "body" => (string)" <p> ". $sedes['direccion'] ."</p>\n",
                    "correctedAddress" => null,
                    "iconid" => null,
                    "point" => array("lat" => $sedes['latitud'],"lng" => $sedes['longitud']),
                    "poly" => null,
                    "kml" => null,
                    "title" => $sedes['nombre'],
                    "type" => null,
                    "viewport" => null,
                    "postid" => null,
                    "url" => null,
                    "html" => "<div class='mapp-iw'><div class='mapp-title'>Multident / ".$sedes['nombre']."</div><div class='mapp-body'><p>".$sedes['direccion']."</p>\n</div><div class='mapp-links'><a href='#' onclick = 'mapp0.openDirections( \"\", mapp0.getPoi(0), 1); return false;'>Como llegar</a>&nbsp;&nbsp;<a href='#' onclick='mapp0.getPoi(0).zoomIn(); return false;'>Zoom</a></div></div>"
                );
                $data['markers'] = json_encode($lista);
                $content = $this->smarty_tpl->view('web/view/content_map_emergencia', $data, TRUE);
                $data['content_map'] = $content; 

            }


            $data = array_merge($data, $this->items);
            $this->template->web_2("emergencia", $data);      
        
        }elseif($url == 'plan-dental'){
            $data['active3'] = "current-menu-item";
            $data['titulo_pagina'] = 'Plan Dental 24 horas | ' . $this->items['proyecto'];
            $data['descripcion'] = '';
            $data = array_merge($data, $this->items);
            $this->template->web_2("plan_dental", $data); 
        
        }elseif($url == 'sonrisa-perfecta'){
            $data['active3'] = "current-menu-item";
            $data['titulo_pagina'] = 'Sonrisa Perfecta | ' . $this->items['proyecto'];
            $data['descripcion'] = '';
            $data = array_merge($data, $this->items);
            $this->template->web_2("sonrisa_perfecta", $data); 
        
        }elseif($url == 'multident-card'){
            $data['active3'] = "current-menu-item";
            $data['titulo_pagina'] = 'Multident Card | ' . $this->items['proyecto'];
            $data['descripcion'] = '';
            $data = array_merge($data, $this->items);
            $this->template->web_2("multident_card", $data); 
        
        }elseif($url == 'multident-kids'){
            $data['active3'] = "current-menu-item";
            $data['titulo_pagina'] = 'Multident Kids | ' . $this->items['proyecto'];
            $data['descripcion'] = '';
            $data = array_merge($data, $this->items);
            $this->template->web_2("multident_kid", $data); 
        
        }elseif($url == 'multident-novias'){
            $data['active3'] = "current-menu-item";
            $data['titulo_pagina'] = 'Multident Novias | ' . $this->items['proyecto'];
            $data['descripcion'] = '';
            $data = array_merge($data, $this->items);
            $this->template->web_2("multident_novia", $data); 
        
        }elseif($url == 'dental-tour-peru'){
            $data['active3'] = "current-menu-item";
            $data['titulo_pagina'] = 'Dental Tour Perú | ' . $this->items['proyecto'];
            $data['descripcion'] = '';
            $data = array_merge($data, $this->items);
            $this->template->web_2("dental_tour_peru", $data); 
        }
        
    }


    public function cita_en_linea(){
        $data['active7'] = "current-menu-item";
        $data['titulo_pagina'] = 'Cita en Línea | ' . $this->items['proyecto'];
        $data['descripcion'] = '';

        $idsede = $this->input->get("sede");
        $idorigen = $this->input->get("form");
        $finalOrigen = '1';

        if(isset($idorigen) && $idorigen != ''){
            $tmpOrigen = $this->m_origen_formulario->mostrar(array('of.url' => $idorigen));
            if(!empty($tmpOrigen)){
                $finalOrigen = $tmpOrigen['idorigenform'];
            }else{
                echo $this->url_comp->direccionar(base_url(), TRUE);
                EXIT;
            }
        }
        

        $referencia = $this->m_referencia->mostrar_activos(FALSE,FALSE,array('r.nombre','asc'));
        if (!empty($referencia)) {
            foreach ($referencia as $items) {
                    $this->_result[$items['idreferencia']] = $items['nombre'];
            }
            $data['referencia'] = $this->documento->generar_dropdown($this->_result, 'referencia', '','--- Como se entero ---');
            unset($this->_result);
        }


        $sede = $this->m_sede->mostrar_activos(FALSE,FALSE,array('s.nombre','asc'));
        if (!empty($sede)) {
            foreach ($sede as $items) {
                    $this->_result[$items['idsede']] = $items['nombre'] . ' -> ' . $items['direccion'];
            }
            if($idsede != null){
                $data['sede'] = $this->documento->generar_dropdown($this->_result, 'sede', $idsede,'--- Seleccione una sede ---');
                unset($this->_result);
            }else{
                $data['sede'] = $this->documento->generar_dropdown($this->_result, 'sede', '','--- Seleccione una sede ---');
                unset($this->_result);  
            }
            
        }

        $especialidad = $this->m_especialidad->mostrar_activos(FALSE,FALSE,array('e.nombre','asc'));
        if (!empty($especialidad)) {
            foreach ($especialidad as $items) {
                    $this->_result[$items['idespecialidad']] = $items['nombre'];
            }
            $data['especialidad'] = $this->documento->generar_dropdown($this->_result, 'especialidad', '','Seleccione una especialidad');
            unset($this->_result);
        }

        $data['origen'] = $finalOrigen;
        $data = array_merge($data, $this->items);
        $this->template->web_2("cita_en_linea", $data);
    }

    public function blanqueamiento_dental(){
        $data['titulo_pagina'] = 'Blanqueamiento Dental | ' . $this->items['proyecto'];
        $data['descripcion'] = '';

        $idorigen = $this->input->get("form");
        $finalOrigen = '1';

        if(isset($idorigen) && $idorigen != ''){
            $tmpOrigen = $this->m_origen_formulario->mostrar(array('of.url' => $idorigen));
            if(!empty($tmpOrigen)){
                $finalOrigen = $tmpOrigen['idorigenform'];
            }else{
                echo $this->url_comp->direccionar(base_url(), TRUE);
                EXIT;
            }
        }
        

        $convenios = $this->m_convenio->mostrar_activos(4,4, ["c.nombre","desc"]);
        if(!empty($convenios)){
            $i = 1;
            foreach ($convenios as $item) {
                $data['convenio'][] = array(
                    'numero' => $i,
                    'nombre' => $item['nombre'],
                    'imagen' => $item['imagen']
                );
            $i++;
            }
        }

        
        $referencia = $this->m_referencia->mostrar_activos(FALSE,FALSE,array('r.nombre','asc'));
        if (!empty($referencia)) {
            foreach ($referencia as $items) {
                    $this->_result[$items['idreferencia']] = $items['nombre'];
            }
            $data['referencia'] = $this->documento->generar_dropdown($this->_result, 'referencia', '','--- Como se entero ---');
            unset($this->_result);
        }

        $sede = $this->m_sede->mostrar_activos(FALSE,FALSE,array('s.nombre','asc'));
        if (!empty($sede)) {
            foreach ($sede as $items) {
                    $this->_result[$items['idsede']] = $items['nombre'] . ' -> ' . $items['direccion'];
            }
            $data['sede'] = $this->documento->generar_dropdown($this->_result, 'sede', '','--- Seleccione una sede ---');
            unset($this->_result);  
        }

        $data['origen'] = $finalOrigen;
        $data = array_merge($data, $this->items);
        $this->template->web_2("blanqueamiento_dental", $data);
    }

    public function blogs(){
        $data['active6'] = "current-menu-item";
        $data['titulo_pagina'] = 'Blog | ' . $this->items['proyecto'] . ' | Su Clínica de Confianza';
        $data['descripcion'] = '';

        $segmento = 3;
        $items = 2;

        $lista = $this->m_publicacion->mostrar_activos($items, $this->uri->segment(3));
        $total = count($this->m_publicacion->mostrar_activos());
        $data['paginacion'] = $this->pagination->generate_pagination(base_url() . "site/blogs", $items, $total, $segmento);
        if (!empty($lista)) {
            foreach ($lista AS $items) {
                $data['blogs'][] = array(
                        'id' => $items['idpublicacion'],
                        'titulo' => $items['titulo'],
                        'visitas' => $items['visitas'],
                        'url' => $items['url'],
                        'f_registro' => $this->fecha->convertir_tiempo_fecha(strtotime($items['fecha_registro']), 3), //
                        'desccorta' => $items['descripcion_corta'],
                        'imagen' => $items['imagen'],
                        
                );
            }
        }

        /* MAS VISTOS*/
        $masVistos = $this->m_publicacion->mostrar_activos(3, FALSE, array("p.visitas", "desc"));
        if(!empty($masVistos)){
            foreach ($masVistos as $mv) {
                $data['masVistos'][] = array(
                        'id' => $mv['idpublicacion'],
                        'titulo' => $mv['titulo'],
                        'url' => $mv['url'],
                        'f_registro' => $this->fecha->convertir_tiempo_fecha(strtotime($mv['fecha_registro']), 3), //
                        'imagen' => $mv['imagen'],
                        
                );
            }
        } 

        /* CATEGORIAS*/
        $data['categorias'] = $categorias = $this->m_categoria->mostrar_activos(5);

        $data = array_merge($data, $this->items);
        $this->template->web_2("blog", $data);
    }

    public function blog($url = ''){
        $data['active6'] = "current-menu-item";

        /* MAS VISTOS*/
        $masVistos = $this->m_publicacion->mostrar_activos(3, FALSE, array("p.visitas", "desc"));
        if(!empty($masVistos)){
            foreach ($masVistos as $mv) {
                $data['masVistos'][] = array(
                        'id' => $mv['idpublicacion'],
                        'titulo' => $mv['titulo'],
                        'url' => $mv['url'],
                        'f_registro' => $this->fecha->convertir_tiempo_fecha(strtotime($mv['fecha_registro']), 3), //
                        'imagen' => $mv['imagen'],
                        
                );
            }
        } 

        /* CATEGORIAS*/
        $data['categorias'] = $categorias = $this->m_categoria->mostrar_activos(5);



        $publicacion = $this->m_publicacion->mostrar(array("p.url" => $url, "p.oculto" => "0"));
        if(!empty($publicacion)){
            $data['titulo_pagina'] = $publicacion['titulo'].' | ' . $this->items['proyecto'];
            $data['descripcion'] = '';

            $data['f_titulo'] = $publicacion['titulo'];
            $data['f_descripcion'] = strip_tags($publicacion['descripcion_corta']);
            $data['f_imagen'] = base_url(). 'public/imagen/publicacion/'.$publicacion['imagen'];
            $data['f_url'] = $publicacion['url'];

            $this->m_publicacion->agregar_visita($publicacion['idpublicacion']);
            $data['titulo'] = $publicacion['titulo'];
            $data['imagen'] = $publicacion['imagen'];
            $data['aimagen'] = $publicacion['aimagen'];
            $data['autor'] = $publicacion['autor'];
            $data['url'] = $publicacion['url'];
            $data['adescripcion'] = $publicacion['adescripcion'];
            $data['categoria'] = $publicacion['categoria'];
            $data['urlcat'] = $publicacion['urlcat'];
            $data['visitas'] = $publicacion['visitas'];
            $data['desccorta'] = $publicacion['descripcion_corta'];
            $data['descgeneral'] = $publicacion['descripcion_general'];
            $data['f_registro'] = $this->fecha->convertir_tiempo_fecha(strtotime($publicacion['fecha_registro']), 3);

            $tag = $this->m_tag_publicacion->mostrar_cuando(array('tp.idpublicacion' => $publicacion['idpublicacion']));
            if(!empty($tag)){
                $data['tags'] = $tag;
                foreach ($tag as $t) {
                    $this->m_tag->agregar_visita($t['idtag']);
                }
            }
        }

        $data = array_merge($data, $this->items);
        $this->template->web_2("blog_detalle", $data);
    }

    public function categoria($url = ''){

        $tmpCategoria = $this->m_categoria->mostrar(array("c.url" => $url));

        $data['active6'] = "current-menu-item";
        $data['titulo_pagina'] = $tmpCategoria['nombre'] .' | ' . $this->items['proyecto'];
        $data['descripcion'] = '';

        $segmento = 2;
        $items = 2;

        $lista = $this->m_publicacion->mostrar_cuando(array("p.idcategoria" => $tmpCategoria['idcategoria'], "p.oculto" => "0"), $items, $this->uri->segment(2));
        $total = count($this->m_publicacion->mostrar_cuando(array("p.idcategoria" => $tmpCategoria['idcategoria'], "p.oculto" => "0")));
        $data['paginacion'] = $this->pagination->generate_pagination(base_url() . "blogs", $items, $total, $segmento);
        if (!empty($lista)) {
            foreach ($lista AS $items) {
                $data['blogs'][] = array(
                        'id' => $items['idpublicacion'],
                        'titulo' => $items['titulo'],
                        'visitas' => $items['visitas'],
                        'url' => $items['url'],
                        'f_registro' => $this->fecha->convertir_tiempo_fecha(strtotime($items['fecha_registro']), 3), //
                        'desccorta' => $items['descripcion_corta'],
                        'imagen' => $items['imagen'],
                        
                );
            }
        }

        /* MAS VISTOS*/
        $masVistos = $this->m_publicacion->mostrar_activos(3, FALSE, array("p.visitas", "desc"));
        if(!empty($masVistos)){
            foreach ($masVistos as $mv) {
                $data['masVistos'][] = array(
                        'id' => $mv['idpublicacion'],
                        'titulo' => $mv['titulo'],
                        'url' => $mv['url'],
                        'f_registro' => $this->fecha->convertir_tiempo_fecha(strtotime($mv['fecha_registro']), 3), //
                        'imagen' => $mv['imagen'],
                        
                );
            }
        } 

        /* CATEGORIAS*/
        $data['categorias'] = $categorias = $this->m_categoria->mostrar_activos(5);
        $data['categoriaActual'] = $tmpCategoria;
        $data = array_merge($data, $this->items);
        $this->template->web_2("categoria", $data);
    }

    public function tag($url = ''){

        $tmpTag = $this->m_tag->mostrar(array("t.url" => $url));

        $data['active6'] = "current-menu-item";
        $data['titulo_pagina'] = $tmpTag['nombre'] .' | ' . $this->items['proyecto'];
        $data['descripcion'] = '';

        $segmento = 2;
        $items = 2;

        $lista = $this->m_tag_publicacion->mostrar_cuando(array("tp.idtag" => $tmpTag['idtag'], "p.oculto" => "0"), $items, $this->uri->segment(2));
        $total = count($this->m_tag_publicacion->mostrar_cuando(array("tp.idtag" => $tmpTag['idtag'], "p.oculto" => "0")));
        $data['paginacion'] = $this->pagination->generate_pagination(base_url() . "blogs", $items, $total, $segmento);
        if (!empty($lista)) {
            foreach ($lista AS $items) {
                $data['blogs'][] = array(
                        'id' => $items['idpublicacion'],
                        'titulo' => $items['titulo'],
                        'visitas' => $items['visitaspub'],
                        'url' => $items['urlpub'],
                        'f_registro' => $this->fecha->convertir_tiempo_fecha(strtotime($items['fechapub']), 3), //
                        'desccorta' => $items['cortapub'],
                        'imagen' => $items['imagen'],
                        
                );
            }
        }

        /* MAS VISTOS*/
        $masVistos = $this->m_publicacion->mostrar_activos(3, FALSE, array("p.visitas", "desc"));
        if(!empty($masVistos)){
            foreach ($masVistos as $mv) {
                $data['masVistos'][] = array(
                        'id' => $mv['idpublicacion'],
                        'titulo' => $mv['titulo'],
                        'url' => $mv['url'],
                        'f_registro' => $this->fecha->convertir_tiempo_fecha(strtotime($mv['fecha_registro']), 3), //
                        'imagen' => $mv['imagen'],
                        
                );
            }
        } 

        /* CATEGORIAS*/
        $data['categorias'] = $categorias = $this->m_categoria->mostrar_activos(5);
        $data['tagActual'] = $tmpTag;
        $data = array_merge($data, $this->items);
        $this->template->web_2("tag", $data);
    }


    public function carillas_porcelana(){
        $data['titulo_pagina'] = 'Carillas de Porcelana | ' . $this->items['proyecto'];
        $data['descripcion'] = '';

        $idorigen = $this->input->get("form");
        $finalOrigen = '1';

        if(isset($idorigen) && $idorigen != ''){
            $tmpOrigen = $this->m_origen_formulario->mostrar(array('of.url' => $idorigen));
            if(!empty($tmpOrigen)){
                $finalOrigen = $tmpOrigen['idorigenform'];
            }else{
                echo $this->url_comp->direccionar(base_url(), TRUE);
                EXIT;
            }
        }
        
        $convenios = $this->m_convenio->mostrar_activos(4,4, ["c.nombre","desc"]);
        if(!empty($convenios)){
            $i = 1;
            foreach ($convenios as $item) {
                $data['convenio'][] = array(
                    'numero' => $i,
                    'nombre' => $item['nombre'],
                    'imagen' => $item['imagen']
                );
            $i++;
            }
        }

        $referencia = $this->m_referencia->mostrar_activos(FALSE,FALSE,array('r.nombre','asc'));
        if (!empty($referencia)) {
            foreach ($referencia as $items) {
                    $this->_result[$items['idreferencia']] = $items['nombre'];
            }
            $data['referencia'] = $this->documento->generar_dropdown($this->_result, 'referencia', '','--- Como se entero ---');
            unset($this->_result);
        }

        $sede = $this->m_sede->mostrar_activos(FALSE,FALSE,array('s.nombre','asc'));
        if (!empty($sede)) {
            foreach ($sede as $items) {
                    $this->_result[$items['idsede']] = $items['nombre'] . ' -> ' . $items['direccion'];
            }
            $data['sede'] = $this->documento->generar_dropdown($this->_result, 'sede', '','--- Seleccione una sede ---');
            unset($this->_result);  
        }

        $data['origen'] = $finalOrigen;
        $data = array_merge($data, $this->items);
        $this->template->web_2("carillas_porcelana", $data);
    }

    public function coronas_dentales(){
        $data['titulo_pagina'] = 'Coronas Dentales | ' . $this->items['proyecto'];
        $data['descripcion'] = '';

        $idorigen = $this->input->get("form");
        $finalOrigen = '1';

        if(isset($idorigen) && $idorigen != ''){
            $tmpOrigen = $this->m_origen_formulario->mostrar(array('of.url' => $idorigen));
            if(!empty($tmpOrigen)){
                $finalOrigen = $tmpOrigen['idorigenform'];
            }else{
                echo $this->url_comp->direccionar(base_url(), TRUE);
                EXIT;
            }
        }

        $convenios = $this->m_convenio->mostrar_activos(4,4, ["c.nombre","desc"]);
        if(!empty($convenios)){
            $i = 1;
            foreach ($convenios as $item) {
                $data['convenio'][] = array(
                    'numero' => $i,
                    'nombre' => $item['nombre'],
                    'imagen' => $item['imagen']
                );
            $i++;
            }
        }
        
        $referencia = $this->m_referencia->mostrar_activos(FALSE,FALSE,array('r.nombre','asc'));
        if (!empty($referencia)) {
            foreach ($referencia as $items) {
                    $this->_result[$items['idreferencia']] = $items['nombre'];
            }
            $data['referencia'] = $this->documento->generar_dropdown($this->_result, 'referencia', '','--- Como se entero ---');
            unset($this->_result);
        }

        $sede = $this->m_sede->mostrar_activos(FALSE,FALSE,array('s.nombre','asc'));
        if (!empty($sede)) {
            foreach ($sede as $items) {
                    $this->_result[$items['idsede']] = $items['nombre'] . ' -> ' . $items['direccion'];
            }
            $data['sede'] = $this->documento->generar_dropdown($this->_result, 'sede', '','--- Seleccione una sede ---');
            unset($this->_result);  
        }

        $data['origen'] = $finalOrigen;
        $data = array_merge($data, $this->items);
        $this->template->web_2("coronas_dentales", $data);
    }

    public function implantes_dentales(){
        $data['titulo_pagina'] = 'Implantes Dentales | ' . $this->items['proyecto'];
        $data['descripcion'] = '';
        
        $idorigen = $this->input->get("form");
        $finalOrigen = '1';

        if(isset($idorigen) && $idorigen != ''){
            $tmpOrigen = $this->m_origen_formulario->mostrar(array('of.url' => $idorigen));
            if(!empty($tmpOrigen)){
                $finalOrigen = $tmpOrigen['idorigenform'];
            }else{
                echo $this->url_comp->direccionar(base_url(), TRUE);
                EXIT;
            }
        }

        $referencia = $this->m_referencia->mostrar_activos(FALSE,FALSE,array('r.nombre','asc'));
        if (!empty($referencia)) {
            foreach ($referencia as $items) {
                    $this->_result[$items['idreferencia']] = $items['nombre'];
            }
            $data['referencia'] = $this->documento->generar_dropdown($this->_result, 'referencia', '','--- Como se entero ---');
            unset($this->_result);
        }

        $sede = $this->m_sede->mostrar_activos(FALSE,FALSE,array('s.nombre','asc'));
        if (!empty($sede)) {
            foreach ($sede as $items) {
                    $this->_result[$items['idsede']] = $items['nombre'] . ' -> ' . $items['direccion'];
            }
            $data['sede'] = $this->documento->generar_dropdown($this->_result, 'sede', '','--- Seleccione una sede ---');
            unset($this->_result);  
        }

        $data['origen'] = $finalOrigen;
        $data = array_merge($data, $this->items);
        $this->template->web_2("implantes_dentales", $data);
    }

    public function tratamiento_ortodoncia(){
        $data['titulo_pagina'] = 'Tratamiento de Ortodoncia | ' . $this->items['proyecto'];
        $data['descripcion'] = '';

        $idorigen = $this->input->get("form");
        $finalOrigen = '1';

        if(isset($idorigen) && $idorigen != ''){
            $tmpOrigen = $this->m_origen_formulario->mostrar(array('of.url' => $idorigen));
            if(!empty($tmpOrigen)){
                $finalOrigen = $tmpOrigen['idorigenform'];
            }else{
                echo $this->url_comp->direccionar(base_url(), TRUE);
                EXIT;
            }
        }

        $convenios = $this->m_convenio->mostrar_activos(4,4, ["c.nombre","desc"]);
        if(!empty($convenios)){
            $i = 1;
            foreach ($convenios as $item) {
                $data['convenio'][] = array(
                    'numero' => $i,
                    'nombre' => $item['nombre'],
                    'imagen' => $item['imagen']
                );
            $i++;
            }
        }
        
        $referencia = $this->m_referencia->mostrar_activos(FALSE,FALSE,array('r.nombre','asc'));
        if (!empty($referencia)) {
            foreach ($referencia as $items) {
                    $this->_result[$items['idreferencia']] = $items['nombre'];
            }
            $data['referencia'] = $this->documento->generar_dropdown($this->_result, 'referencia', '','--- Como se entero ---');
            unset($this->_result);
        }

        $sede = $this->m_sede->mostrar_activos(FALSE,FALSE,array('s.nombre','asc'));
        if (!empty($sede)) {
            foreach ($sede as $items) {
                    $this->_result[$items['idsede']] = $items['nombre'] . ' -> ' . $items['direccion'];
            }
            $data['sede'] = $this->documento->generar_dropdown($this->_result, 'sede', '','--- Seleccione una sede ---');
            unset($this->_result);  
        }

        $data['origen'] = $finalOrigen;
        $data = array_merge($data, $this->items);
        $this->template->web_2("tratamiento_ortodoncia", $data);
    }

    public function sedes(){
        $data['active5'] = "current-menu-item";
        $data['titulo_pagina'] = 'Sedes | ' . $this->items['proyecto'];
        $data['descripcion'] = '';

        $sedes = $this->m_sede->mostrar_activos(FALSE, FALSE, array("o.nombre" => "asc", "s.nombre" => "asc"));

        if(!empty($sedes)){
            $x = 0;
            foreach ($sedes as $item) {
                $point = $item['idsede'] - 1;
                $lista[] = array(
                    "address" => null,
                    "body" => (string)" <p> ". $item['direccion'] ."</p>\n",
                    "correctedAddress" => null,
                    "iconid" => null,
                    "point" => array("lat" => $item['latitud'],"lng" => $item['longitud']),
                    "poly" => null,
                    "kml" => null,
                    "title" => $item['nombre'],
                    "type" => null,
                    "viewport" => null,
                    "postid" => null,
                    "url" => null,
                    "html" => "<div class='mapp-iw'><div class='mapp-title'>Multident / ".$item['nombre']."</div><div class='mapp-body'><p>".$item['direccion']."</p>\n</div><div class='mapp-links'><a href='#' onclick = 'mapp0.openDirections( \"\", mapp0.getPoi(".$point."), 1); return false;'>Como llegar</a>&nbsp;&nbsp;<a href='#' onclick='mapp0.getPoi(".$point.").zoomIn(); return false;'>Zoom</a></div></div>"
                );
                $x++;
            }

        }

        $sedeLima = $this->m_sede->mostrar_cuando(array("s.idorigen" => '1', 's.oculto' => '0'),FALSE, FALSE, array("s.nombre" => "asc"));
        $sedeProvincia = $this->m_sede->mostrar_cuando(array('s.idorigen' => '2', 's.oculto' => '0'),FALSE, FALSE, array('s.nombre' => 'asc'));

        if(!empty($sedeLima)){
            $y = 0;
            foreach ($sedeLima as $sl) {
                $point = $sl['idsede'] - 1;
                $data['sedeLima'][] = array(
                        'idsede' => $sl['idsede'],
                        'nombre' => $sl['nombre'],
                        'direccion' => $sl['direccion'],
                        'telefono' => $sl['telefono'],
                        'orden' => $point
                    );
                $y++;
            }
        }


        if(!empty($sedeProvincia)){
            $y = 0;
            foreach ($sedeProvincia as $sp) {
                $point = $sp['idsede'] - 1;
                $data['sedeProvincia'][] = array(
                        'idsede' => $sl['idsede'],
                        'nombre' => $sp['nombre'],
                        'direccion' => $sp['direccion'],
                        'telefono' => $sp['telefono'],
                        'orden' => $point
                    );
                $y++;
            }
        }
   
        $data['markers'] = json_encode($lista); 
        $content = $this->smarty_tpl->view('web/view/content_map_sedes', $data, TRUE);
        $data['content_map'] = $content; 

        $data = array_merge($data, $this->items);
        $this->template->web_2("sedes", $data);
    }

    public function promociones(){
        $data['titulo_pagina'] = 'Promociones | ' . $this->items['proyecto'];
        $data['descripcion'] = '';

        $promociones = $this->m_promocion->mostrar_activos(FALSE,FALSE, ["p.idpromocion","desc"]);
        if(!empty($promociones)){
            $i = 1;
            foreach ($promociones as $item) {
                $data['promocion'][] = [
                    'numero' => $i,
                    'nombre' => $item['nombre'],
                    'imagen' => $item['imagen']
                ];
                $i++;
            }
        }

        $data = array_merge($data, $this->items);
        $this->template->web_2("promociones", $data);
    }

    public function suscripcion_gracias(){
        $data['titulo_pagina'] = '¡Gracias! | ' . $this->items['proyecto'];
        $data['descripcion'] = '';
        $data = array_merge($data, $this->items);
        $this->template->web_2("gracias_suscripcion", $data);
    }

    public function mapa(){
        $data['titulo_pagina'] = '¡Gracias! | ' . $this->items['proyecto'];
        $data['descripcion'] = '';
        $data = array_merge($data, $this->items);
        $this->parser->parse("mapa", $data);
    }


    public function busqueda($filtro = '') {
        $data['titulo_pagina'] = 'Busqueda | ' . $this->items['proyecto'];
        $data['descripcion'] = '';
        $data['active6'] = "current-menu-item";
        /* ---- Contenido de la interna ---- */
        $filtro = str_replace('-', ' ', $filtro);
        $filtro = str_replace("%C3%B1", "ñ", $filtro);
        $filtro = str_replace("%C3%A1", "á", $filtro);
        $filtro = str_replace("%C3%A9", "é", $filtro);
        $filtro = str_replace("%C3%AD", "í", $filtro);
        $filtro = str_replace("%C3%B3", "ó", $filtro);
        $filtro = str_replace("%C3%BA", "ú", $filtro);
        if ($filtro == '') {
            echo $this->url_comp->direccionar(base_url(), TRUE);
            EXIT;
        } else {
            $like = array('p.titulo' => $filtro, 'c.nombre' => $filtro);
            $publicacion = $this->m_publicacion->buscar($like);
            $data['total'] = count($publicacion);
            $data['filtro'] = $filtro;
            //var_dump(count($noticia));
            
            if (!empty($publicacion)) {
                foreach ($publicacion AS $items) {
                    $data['blogs'][] = array(
                        'id' => $items['idpublicacion'],
                        'titulo' => $items['titulo'],
                        'visitas' => $items['visitas'],
                        'url' => $items['url'],
                        'f_registro' => $this->fecha->convertir_tiempo_fecha(strtotime($items['fecha_registro']), 3), //
                        'desccorta' => $items['descripcion_corta'],
                        'imagen' => $items['imagen'],
                            
                    );
                }
            }
        }

        /* MAS VISTOS*/
        $masVistos = $this->m_publicacion->mostrar_activos(3, FALSE, array("p.visitas", "desc"));
        if(!empty($masVistos)){
            foreach ($masVistos as $mv) {
                $data['masVistos'][] = array(
                        'id' => $mv['idpublicacion'],
                        'titulo' => $mv['titulo'],
                        'url' => $mv['url'],
                        'f_registro' => $this->fecha->convertir_tiempo_fecha(strtotime($mv['fecha_registro']), 3), //
                        'imagen' => $mv['imagen'],
                        
                );
            }
        } 

        /* CATEGORIAS*/
        $data['categorias'] = $categorias = $this->m_categoria->mostrar_activos(5);

        /* ---- Impresión de páginas ---- */
        $data = array_merge($data, $this->items);
        $this->template->web("busqueda", $data);
    }

}