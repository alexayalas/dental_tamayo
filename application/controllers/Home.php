<?php
defined('BASEPATH') OR exit('No direct script access allowed');

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('smarty_tpl');
        $helper = array('url');
        $model = array();
        $this->load->library($library);
        $this->load->helper($helper);
        $this->load->model($model);

        /* Configuración personalizada */

        $this->items['base_url'] = base_url();
        
    }

    public function index() {
        //var_dump(base_url());
        redirect("site");
    }

}
