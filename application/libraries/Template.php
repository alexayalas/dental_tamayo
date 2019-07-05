<?php

class Template {

    var $ci;

    function Template() {
        $this->ci = & get_instance();
    }

    function web($contenido, $data = array()) {
        $this->ci->smarty_tpl->view('web/structure/header', $data);
        $this->ci->smarty_tpl->view('web/structure/inter_header', $data);
        $this->ci->smarty_tpl->view('web/view/' . $contenido, $data);
        $this->ci->smarty_tpl->view('web/structure/inter_footer', $data);
        $this->ci->smarty_tpl->view('web/structure/footer', $data);
    }

    function web_2($contenido, $data = array()) {
        $this->ci->smarty_tpl->view('web/structure/header', $data);
        $this->ci->smarty_tpl->view('web/structure/inter_header2', $data);
        $this->ci->smarty_tpl->view('web/view/' . $contenido, $data);
        $this->ci->smarty_tpl->view('web/structure/inter_footer', $data);
        $this->ci->smarty_tpl->view('web/structure/footer', $data);
    }
	
	function web_3($contenido, $data = array()) {
        $this->ci->smarty_tpl->view('web/structure/header', $data);
        $this->ci->smarty_tpl->view('web/view/' . $contenido, $data);
        $this->ci->smarty_tpl->view('web/structure/footer', $data);
    }


    function admin($contenido, $data = array()) {
        $this->ci->smarty_tpl->view('admin/structure/header', $data);
        $this->ci->smarty_tpl->view('admin/structure/inter_header', $data);
        $this->ci->smarty_tpl->view('admin/view/' . $contenido, $data);
        $this->ci->smarty_tpl->view('admin/structure/inter_footer', $data);
        $this->ci->smarty_tpl->view('admin/structure/footer', $data);
    }

    function admin_login($contenido, $data = array()) {
        $this->ci->smarty_tpl->view('admin/structure/header', $data);
        $this->ci->smarty_tpl->view('admin/view/' . $contenido, $data);
        $this->ci->smarty_tpl->view('admin/structure/footer', $data);
    }

    function view_test($contenido, $data = array()) {
        $this->ci->smarty_tpl->view('web/structure/header', $data);
        $this->ci->smarty_tpl->view('web/view/' . $contenido, $data);
        $this->ci->smarty_tpl->view('web/structure/footer', $data);
    }

}
