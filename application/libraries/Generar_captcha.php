<?php 

class Generar_captcha
{
	
	function __construct()
	{
		$this->ci = & get_instance();
        /*
         * cargar librerias, modelos, helpers.
         */
        $library = array('');
        $helper = array('url','captcha','captcha_helper','string_helper');
        $model = array('m_captcha');
        $this->ci->load->library($library);
        $this->ci->load->helper($helper);
        $this->ci->load->model($model);
        $this->rand = random_string('alnum',4); 

	}


	public function captcha(){
		//configuramos el captcha
        $data = array(
            'word'   => $this->rand,
            'img_path' => './public/captcha/',
            'img_url' =>  base_url().'public/captcha/',
            'font_path' => './public/fonts/Skranji-Regular.ttf',
            'img_width' => '225',
            'img_height' => '60', 
            //decimos que pasados 10 minutos elimine todas las imágenes
            //que sobrepasen ese tiempo
            'expiration' => 600 
        );
        //guardamos la info del captcha en $cap
        $cap = create_captcha($data);
        //pasamos la info del captcha al modelo para 
        //insertarlo en la base de datos
        $this->ci->m_captcha->insert_captcha($cap);        
        //devolvemos el captcha para utilizarlo en la vista
        return $cap;

	}

}

?>