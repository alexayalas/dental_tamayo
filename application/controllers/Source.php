<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Source extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('crop');
        $helper = array('url');
        $model = array();
        $this->load->library($library);
        $this->load->helper($helper);
        $this->load->model($model);
       
    }
    
    public function cropimage($image_width, $image_height, $image_directory){
        $items = explode('_', $image_directory);
        $directory = base_url().'public/imagen/'.$items[0].'/'.$items[1];
        echo $this->crop->ready($directory, $image_width, $image_height, 'FFFFFF', '', 100);
    }

    public function cropimage2($image_width, $image_height, $image_directory){
        $items = explode('_', $image_directory);
        if($items[0] == 'blog'){
            $directory = file_get_contents('http://clubfranquiciaperu.com/blogs/fotos-boger-post/'.$items[1]);
        }
        echo $this->crop->ready($directory, $image_width, $image_height, 'FFFFFF', '', 100);
    }
    
}
