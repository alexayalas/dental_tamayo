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
        $library = array('parser','session_manager', 'fecha', 'googlemaps', 'browser');
        $helper = array('url','base64_url');
        $model = array('m_convenio', 'm_referencia', 'm_especialidad', 'm_slider', 'm_tag', 'm_publicacion', 'm_tag_publicacion', 'm_categoria', 'm_sede', 'm_origen_formulario', 'm_promocion', 'm_staff', 'm_coctel', 'm_congreso');
        $this->load->library($library);
        $this->load->helper($helper);
        $this->load->model($model);

        /*
         * Configuración personalizada
         */
        
        $this->items['proyecto'] = 'Multident';
        $this->_session = $this->session_manager->datos_usuario('encuesta_data');
        $this->_session_doctor = $this->session_manager->datos_usuario('personal_data');
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

        $query = $_SERVER['QUERY_STRING'];
        if(!empty($query)){
            $this->items['uriActual'] = current_url().'?'.$query;
        }else{
            $this->items['uriActual'] = current_url();
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

        if(isset($_SERVER['HTTP_REFERER'])){
            $uri = $_SERVER['HTTP_REFERER'];
            //var_dump($uri);        
        }else{
            //var_dump('no hay procedente');
        }
        

        $data = array_merge($data, $this->items);
        $this->template->web("home", $data);
    }

    public function staff() {
        $data['titulo_pagina'] = $this->items['proyecto'] . ' | Su Clínica Dental de Confianza';
        $data['descripcion'] = '';

        $data['active1'] = "current-menu-item";


        $data = array_merge($data, $this->items);
        $this->template->web("staff", $data);
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
        }else{
            show_404();
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
        $re = '';

        if(isset($_SERVER['HTTP_REFERER'])){
            $query = $_SERVER['QUERY_STRING'];
            if(!empty($query)){
                $uri = $_SERVER['HTTP_REFERER'] . '?'. $query; 
            }else{
               $uri = $_SERVER['HTTP_REFERER']; 
            }
            
        }else{
            $uri = 'sin procedencia';
        }
        //var_dump($uri);

        $query = $_SERVER['QUERY_STRING'];
        if($query != ''){
            $adword = strpos($query, 'gclid=');
            if($adword !== FALSE){
                $re = '2';
            }
        }

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
            $data['referencia'] = $this->documento->generar_dropdown($this->_result, 'referencia', $re,'--- Como se entero ---');
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

        $data['uri'] = base64_encode($uri);
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
            $data['titulo_pagina'] = $publicacion['titulo_seo'];
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
            $x = 1;
            foreach ($sedes as $item) {
                //$point = $item['idsede'] - 1;
                $point = $x - 1;
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
                    "html" => "<div class='mapp-iw'><div class='mapp-title'>Multident / ".$item['nombre']."</div><div class='mapp-body'><p>".$item['direccion']."</p>\n<p>".$item['telefono']."</p>\n</div><div class='mapp-links'><a href='#' onclick = 'mapp0.openDirections( \"\", mapp0.getPoi(".$point."), 1); return false;'>Como llegar</a>&nbsp;&nbsp;<a href='#' onclick='mapp0.getPoi(".$point.").zoomIn(); return false;'>Zoom</a></div></div>"
                );
                $x++;
            }
        }
        //echo '<pre>';
        //print_r($sedes);

        $sedeLima = $this->m_sede->mostrar_cuando(array("s.idorigen" => '1', 's.oculto' => '0'),FALSE, FALSE, array("o.nombre" => "desc", "s.nombre" => "asc"));
        $sedeProvincia = $this->m_sede->mostrar_cuando(array('s.idorigen' => '2', 's.oculto' => '0'),FALSE, FALSE, array('o.nombre' => 'asc', 's.nombre' => 'asc'));
        //echo '<pre>';
        //print_r($sedes);
        if(!empty($sedeLima)){
            $y = 1;
            foreach ($sedeLima as $sl) {
                //$point1 = $sl['idsede'] - 1;
                $point1 = $y - 1;
                $data['sedeLima'][] = array(
                        'idsede' => $sl['idsede'],
                        'nombre' => $sl['nombre'],
                        'direccion' => $sl['direccion'],
                        'telefono' => $sl['telefono'],
                        'orden' => $point1
                    );
                $y++;
            }
        }


        if(!empty($sedeProvincia)){
            //$y = 0;
            $y = count($sedeLima) + 1;
            foreach ($sedeProvincia as $sp) {
                //$point3 = $sp['idsede'] - 1;
                $point3 = $y- 1;
                $data['sedeProvincia'][] = array(
                        'idsede' => $sp['idsede'],
                        'nombre' => $sp['nombre'],
                        'direccion' => $sp['direccion'],
                        'telefono' => $sp['telefono'],
                        'orden' => $point3
                    );
                $y++;
            }
        }
        //echo '<pre>';
        //print_r($data['sedeProvincia']);
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

    public function confirmacion(){
        $data['titulo_pagina'] = '¡Confirmación! | ' . $this->items['proyecto'];
        $data['descripcion'] = '';
        $data = array_merge($data, $this->items);
        $this->template->web_2("confirmar_suscripcion", $data);
    }


    public function semefa(){
        $data['titulo_pagina'] = 'Semefa | ' . $this->items['proyecto'];
        $data['descripcion'] = '';
        $data = array_merge($data, $this->items);
        $this->template->web_3("semefa", $data);
    }

    public function login_streaming(){
        $data['titulo_pagina'] = 'Login Streaming | ' . $this->items['proyecto'];
        $login = $this->session_manager->verificar_logueo_personal();
        $data['descripcion'] = '';
        $data = array_merge($data, $this->items);
        //$data = array_merge($data, $login);
        $this->template->web_3("login_streaming", $data);
    }


    public function streaming(){
        $login = $this->session_manager->datos_doctor_logueado();
        $data['titulo_pagina'] = 'Streaming | ' . $this->items['proyecto'];
        $data['descripcion'] = '';
        $data['active1'] = 'active';


        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->web_3("streaming", $data);
    }

    public function galeria_videos(){
        $login = $this->session_manager->datos_doctor_logueado();
        $data['titulo_pagina'] = 'Streaming | ' . $this->items['proyecto'];
        $data['descripcion'] = '';
        $data['active2'] = 'active';


        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $this->template->web_3("galeria_video", $data);
    }

    public function change_password(){
        $login = $this->session_manager->datos_doctor_logueado();
        $data = array();

        $data = array_merge($data, $this->items);
        $data = array_merge($data, $login);
        $contenido = $this->smarty_tpl->view('web/view/modal_password', $data, TRUE);
        $datos['titulo'] = "Cambiar Contraseña";
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }

    public function staff_medico($id = ''){

        $data = array();

        $lista = $this->m_staff->mostrar_cuando(array('s.idsede' => $id));


        if(!empty($lista)){
            $x = 1;
            foreach ($lista as $items) {
                $data['staff'][] = array(
                    'num' => $x,
                    'doctor' => $items['nombre'],
                    'especialidad' => $items['especialidad'],
                    'cop' => $items['cop'],
                    'descripcion' => $items['descripcion'] . '<p>Horario: <br>'. $items['horario'] .'</p>',
                    'imagen' => base_url() . 'public/imagen/staff/'. $items['folder'] . '/'. $items['imagen'],
                ); 
                $x++; 
            }

        }

        $data = array_merge($data, $this->items);
        $contenido = $this->smarty_tpl->view('web/view/modal_staff', $data, TRUE);
        $datos['contenido'] = $contenido;
        echo json_encode($datos);
    }


    public function cita_on_linea(){
        $data['active7'] = "current-menu-item";
        $data['titulo_pagina'] = 'Cita en Línea | ' . $this->items['proyecto'];
        $data['descripcion'] = '';
        $re = '';

        if(isset($_SERVER['HTTP_REFERER'])){
            $query = $_SERVER['QUERY_STRING'];
            if(!empty($query)){
                $uri = $_SERVER['HTTP_REFERER'] . '?'. $query; 
            }else{
               $uri = $_SERVER['HTTP_REFERER']; 
            }
            
        }else{
            $uri = 'sin procedencia';
        }
        //var_dump($uri);

        $query = $_SERVER['QUERY_STRING'];
        if($query != ''){
            $adword = strpos($query, 'gclid=');
            if($adword !== FALSE){
                $re = '2';
            }
        }

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
            $data['referencia'] = $this->documento->generar_dropdown($this->_result, 'referencia', $re,'--- Como se entero ---');
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

        $data['uri'] = base64_encode($uri);
        $data['origen'] = $finalOrigen;
        $data = array_merge($data, $this->items);

        $this->smarty_tpl->view('web/structure/header', $data);
        $this->smarty_tpl->view('web/view/cita_on_linea', $data);
        $this->smarty_tpl->view('web/structure/footer', $data);


    }


    public function coberturas_mltd(){
        $data['titulo_pagina'] = 'Coberturas Mltd | ' . $this->items['proyecto'];
        $data['descripcion'] = '';
        $data = array_merge($data, $this->items);
        $this->template->web_3("coberturas_mltd", $data);
    }


    public function politicas_privacidad(){
        $data['titulo_pagina'] = 'Politicias de Privacidad | ' . $this->items['proyecto'];
        $data['descripcion'] = '';
        $data = array_merge($data, $this->items);
        $this->template->web_2("politicas_privacidad", $data);
    }


    public function coctel(){
        $data['titulo_pagina'] = 'Coctel Mltd | ' . $this->items['proyecto'];
        $data['descripcion'] = '';

        $invitados = $this->m_coctel->mostrar_activos();
        $i = 1;
        foreach ($invitados as $key => $value) {
            $invitados[$key]['item'] = $i;
            $i++;
        }

        $data['lista'] = $invitados;

        $data = array_merge($data, $this->items);
        $this->template->web_3("coctel", $data);
    }
	
	public function congreso(){
        $data['titulo_pagina'] = 'Congreso Mltd | ' . $this->items['proyecto'];
        $data['descripcion'] = '';

        $invitados = $this->m_congreso->mostrar_activos(FALSE, FALSE, ['c.entidad' => 'ASC']);
        $i = 1;
        foreach ($invitados as $key => $value) {
            $invitados[$key]['item'] = $i;
            $i++;
        }

        $data['lista'] = $invitados;

        $data = array_merge($data, $this->items);
        $this->template->web_3("congreso", $data);
    }

}