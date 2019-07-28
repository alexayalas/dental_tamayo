<?php
include  APPPATH.'third_party/phpmailer/phpmailer.php';

class Sendmail {
        
    private $_items = array();
    
    public function __construct() {
        $this->ci =& get_instance();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('parser','email');
        $helper = array('url', 'form');
        $model = array();
        $this->ci->load->library($library);
        $this->ci->load->helper($helper);
        $this->ci->load->model($model);
        /*
         * Configuración personalizada
         */
        $this->ci->config->load('exportando', TRUE, TRUE);
    }
    
    public function load($data, $view){
        foreach($data as $key => $value){
            $this->$key = $value;
        }
        $this->_items = $data;
        $this->_view = $view;
    }
    
    public function success_smtp($email, $tmp_name = FALSE, $name = FALSE){
        $phpmailer = new phpmailer();
        $mail = $email;
        $body = $this->ci->smarty_tpl->view('correo/'.$this->_view, $this->_items, TRUE);

        try {
            $phpmailer->IsSMTP();
            $phpmailer->SMTPDebug = 2;
            $phpmailer->SMTPAuth = TRUE;
            $phpmailer->SMTPSecure = $this->smtp_secure;
            $phpmailer->Host = $this->smtp_host;
            $phpmailer->Port = $this->smtp_port;
            $phpmailer->Username = $this->smtp_username;
            $phpmailer->Password = $this->smtp_password;
            //$phpmailer->IsSendmail();
            $i = 0;
            foreach($mail as $key => $value){
                if($i == 0) {
                    $phpmailer->AddAddress($value, $key);
                } else {
                    $phpmailer->AddCC($value, $key);
                }
                $i++;
            }
            $phpmailer->SetFrom($this->email, $this->name);
            $phpmailer->AddReplyTo($this->email, $this->name);
            $phpmailer->Subject = $this->subject;
            $phpmailer->AltBody = 'Si ve este mensaje, por favor use un HTML compatible.';
            $phpmailer->MsgHTML($body);
            $phpmailer->CharSet = 'UTF-8';
            $phpmailer->Send();
            return TRUE;
        } catch (phpmailerException $e) {
            return $e->errorMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function success_smtp_2($email, $tmp_name = FALSE, $name = FALSE){
        $phpmailer = new phpmailer();
        $mail = $email;
        $body = $this->ci->smarty_tpl->view('correo/'.$this->_view, $this->_items, TRUE);

        try {
            $phpmailer->IsSMTP();
            //$phpmailer->SMTPDebug = 2;
            $phpmailer->SMTPAuth = TRUE;
            $phpmailer->SMTPSecure = $this->smtp_secure;
            $phpmailer->Host = $this->smtp_host;
            $phpmailer->Port = $this->smtp_port;
            $phpmailer->Username = $this->smtp_username;
            $phpmailer->Password = $this->smtp_password;
            //$phpmailer->IsSendmail();
            foreach($mail as $key => $value){
                $phpmailer->AddAddress($value, $key);
                $phpmailer->SetFrom($this->email, $this->name);
                $phpmailer->AddReplyTo($this->email, $this->name);
                $phpmailer->Subject = $this->subject;
                $phpmailer->AltBody = 'Si ve este mensaje, por favor use un HTML compatible.';
                $phpmailer->MsgHTML($body);
                $phpmailer->CharSet = 'UTF-8';
                $phpmailer->Send();
                $phpmailer->ClearAllRecipients();
            }
            
            return TRUE;
        } catch (phpmailerException $e) {
            return $e->errorMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    
    public function success_sendmail($email){
        $phpmailer = new phpmailer();
        $mail = $email;
        $body = $this->ci->smarty_tpl->view('correo/'.$this->_view, $this->_items, TRUE);
        try {
            /*$phpmailer->IsSendmail();*/
            $phpmailer->AddReplyTo($this->email, $this->name);
            $i = 0;
            foreach($mail as $key => $value){
                if($i == 0) {
                    $phpmailer->AddAddress($value, $key);
                } else {
                    $phpmailer->AddCC($value, $key);
                }
                $i++;
            }
            $phpmailer->SetFrom($this->email, $this->name);
            $phpmailer->AddReplyTo($this->email, $this->name);
            $phpmailer->Subject = $this->subject;
            $phpmailer->AltBody = 'Si ve este mensaje, por favor use un HTML compatible.';
            $phpmailer->MsgHTML($body);
            $phpmailer->CharSet = 'UTF-8';
            $phpmailer->Send();
            return TRUE;
        } catch (phpmailerException $e) {
            return $e->errorMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function success_sendmail2($email){
        $phpmailer = new phpmailer();
        $mail = $email;
        $body = $this->ci->smarty_tpl->view('correo/'.$this->_view, $this->_items, TRUE);
        try {
            /*$phpmailer->IsSendmail();*/
            foreach($mail as $key => $value){
            	$phpmailer->AddAddress($value, $key);
                $phpmailer->SetFrom($this->email, $this->name);
                $phpmailer->AddReplyTo($this->email, $this->name);
                $phpmailer->Subject = $this->subject;
                $phpmailer->AltBody = 'Si ve este mensaje, por favor use un HTML compatible.';
                $phpmailer->MsgHTML($body);
                $phpmailer->CharSet = 'UTF-8';
                $phpmailer->Send();
                $phpmailer->ClearAllRecipients();
            }
            
            return TRUE;
        } catch (phpmailerException $e) {
            return $e->errorMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function success_send_email($email){
        $config = Array(
            'protocol' => 'smtp',
            //'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_host' => 'rajush.yarkan.net',
            //'smtp_port' => 465,
            'smtp_port' => 25,
            //'smtp_user' => 'alejo.ayala.suncion@gmail.com',
            'smtp_user' => 'noreply@multident.pe',
            //'smtp_pass' => 'Alexis2016',
            'smtp_pass' => 'Secreto_1234',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ); 
        $body = $this->ci->smarty_tpl->view('correo/'.$this->_view, $this->_items, TRUE);         
        try {
            $this->ci->email->initialize($config);              
            //Ponemos la dirección de correo que enviará el email y un nombre
            $this->ci->email->from($email['from']);                     
            /*
            * Ponemos el o los destinatarios para los que va el email
            * en este caso al ser un formulario de contacto te lo enviarás a ti
            * mismo
            */
            //$correos = array('alejo.ayala.suncion@gmail.com');
            $this->ci->email->to($email['to']);   
            //definimos los correo cc
            //$this->email->cc($cc_email_dres);
            //Definimos el asunto del mensaje
            $this->ci->email->subject($email['subject']);                      
            //Definimos el mensaje a enviar
            $this->ci->email->message($body);   
            //Definimos el archivo adjunto (no se le adjunta)
            //$this->email->attach($dirPdf);                
            //Enviamos el email y si se produce bien o mal que avise con una flasdata
            $this->ci->email->send();
            return TRUE;
                                  
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    /*-------------FIN--------------*/
}
