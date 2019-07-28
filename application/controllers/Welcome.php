<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

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
        
        $this->items['proyecto'] = 'Dental Tamayo';
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

	public function index()
	{
		//$this->load->view('welcome_message');
        //echo "hola mundo";
		//redirect("site");
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
}
