<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Formulario extends CI_Controller {

    private $items = array();

    public function __construct() {
        parent::__construct();
        /*
         * Configuración para librerias, helpers y modelos
         */
        $library = array('parser','sendmail','session_manager','email');
        $helper = array('url', 'captcha_helper', 'string_helper');
        $model = array('m_suscriptor', 'm_formulario_web', 'm_sede', 'm_sede_correo', 'm_especialidad', 'm_referencia', 'm_semefa', 'm_personal', 'm_control', 'm_formulario_helpingdent', 'm_plan_dental', 'm_coctel', 'm_congreso');
        $this->load->library($library);
        $this->load->helper($helper);
        $this->load->model($model);
        /*
         * Configuración personalizada
         */
        $this->items['base_url'] = base_url();
        $this->correoPrincipal = $this->m_configuracion->mostrar(array('c.campo'=>'correo'));
		$this->_session_personal = $this->session_manager->datos_usuario('personal_data');
    }



    public function suscripcion() {
        $nombre = $this->input->post('nombre');
        $email = $this->input->post('email');
        $uri = $this->input->post('uri');
		$terminos = $this->input->post('terminos');
	
        //VALIDACION DE CAMPOS
        $error = '';
        $error .= $this->mantenimiento->validacion($nombre, 'required|alphaspecial', 'Nombre');
        $error .= $this->mantenimiento->validacion($email, 'required|email', 'E-mail');

        if ($error != '') {
            echo $this->alerta->swal_error($error);
            EXIT;
        }
		
		if(!isset($terminos)){
            $ms= 'Debe de aceptar las condiciones';
            echo $this->alerta->swal_error($ms);
            EXIT;
        }

        if($this->m_suscriptor->existe_campo('email',$email)){
            echo $this->alerta->swal_error('Este <b>E-mail</b> ya se encuentra registrado...', TRUE);
            EXIT;
        }
	$tmpCode = $this->archivo->aleatorio(15);
        $datos['nombre'] = $nombre;
        $datos['email'] = $email;
        $datos['codigo'] = $tmpCode;
        $datos['procedencia'] = $uri;
        $datos['fecha_registro'] = date("Y-m-d H:i:s");
        $datos['ip'] = $this->input->ip_address();
        $result = $this->m_suscriptor->insertar($datos);
        
        if($result){
            $data = array(
                    'name' => 'Multident News',
                    'email' => 'hola@multident.pe',
                    'subject' => 'Bienvenido a Multident News',
                    /* Datos SMTP: en caso se necesiten */
                    'smtp_secure' => '', // ssl - tls
                    'smtp_host' => 'mail.multident.pe',
                    'smtp_port' => 25, // ssl: 465 - tls: 587
                    'smtp_username' => 'informacion@multident.pe',
                    'smtp_password' => 'Secreto_1234',
                    /* Datos adicionales */
                    'nombre' => $nombre,
                    'ip' => $this->input->ip_address(),
                    'pagina' => $uri,
                    'fecha' => date("d-m-Y H:i:s"),
                    'link' => base_url() . 'formulario/confirmar?codekey='.$tmpCode
            );
            /* ------MAIL DE ATERRIZAJE------- */
            $list_email = array(
                $nombre => $email,
            );     

            $this->sendmail->load($data, 'confirmar_suscripcion');
            $this->sendmail->success_sendmail2($list_email);
        
            echo $this->url_comp->direccionar(base_url() . 'site/suscripcion_gracias');
            EXIT;
        }else{
            echo $this->alerta->swal_error('Hubo Problemas Internos...', TRUE);
            EXIT;  
        }

    }

    public function accion_cita() {
        $nombre = $this->input->post('nombre');
        $email = $this->input->post('email');
        $telefono = $this->input->post('telefono');
        $referencia = $this->input->post('referencia');
        $especialidad = $this->input->post('especialidad');
        //$sede = $this->input->post('sede');
        $fecha = $this->input->post('fecha');
        $hora = $this->input->post('hora');
        $comentario = $this->input->post('comentario');
        $origen = $this->input->post('origen');
		$uri = $this->input->post('uri');
		$u = base64_decode($this->input->post('u'));
		$terminos = $this->input->post('terminos');
		//$captcha = $this->input->post('g-recaptcha-response');
        //var_dump($this->correoPrincipal['valor']); exit;

        //VALIDACION DE CAMPOS
        $error = '';
        $error .= $this->mantenimiento->validacion($nombre, 'required|alphaspecial', 'Nombres y Apellidos');
        $error .= $this->mantenimiento->validacion($email, 'required|email', 'E-mail');
        $error .= $this->mantenimiento->validacion($telefono, 'required|maxlenght[9]', 'Telefono o Celular');
        $error .= $this->mantenimiento->validacion($referencia, 'required|numeric', 'Como se entero');
        $error .= $this->mantenimiento->validacion($especialidad, 'required|numeric', 'Seleccione una especialidad');
        //$error .= $this->mantenimiento->validacion($sede, 'required|numeric', 'Seleccione una sede');
        $error .= $this->mantenimiento->validacion($fecha, 'required|date', 'Fecha');
        $error .= $this->mantenimiento->validacion($hora, 'required', 'Hora');
		//$error .= $this->mantenimiento->validacion($captcha, 'required', 'verificar captcha');

        if ($error != '') {
            echo $this->alerta->swal_error($error);
            EXIT;
        }
		
		if(!isset($terminos)){
            $ms= 'Debe de aceptar las condiciones';
            echo $this->alerta->swal_error($ms);
            EXIT;
        }
		
        $newFecha = $fecha .' '. $hora;

        $datos['nombre'] = $nombre;
        $datos['email'] = $email;
        $datos['telefono'] = $telefono;
        $datos['idreferencia'] = $referencia;
        $datos['idespecialidad'] = $especialidad;
		$datos['url'] = $uri;
        //$datos['idsede'] = $sede;
        $datos['idorigen'] = $origen;
        $datos['fecha_cita'] = date("Y-m-d H:i:s", strtotime($newFecha));
        $datos['fecha_registro'] = date("Y-m-d H:i:s");
        $datos['comentario'] = $comentario;
		$datos['link_procedencia'] = $u;
        $datos['ip'] = $this->input->ip_address();

        $result = $this->m_formulario_web->insertar($datos);
        
        if($result !== FALSE){
            //$tmpSede = $this->m_sede->mostrar(array('s.idsede' => $sede));
            $tmpEspecialidad = $this->m_especialidad->mostrar(array('e.idespecialidad' => $especialidad));
            $tmpReferencia = $this->m_referencia->mostrar(array('r.idreferencia' => $referencia));
			
			$newHora = str_replace(':', '', $hora);
        
            $data = array(
                'from' => $email,
                'to' => $this->correoPrincipal['valor'],
                'subject' => 'Solicitud de Cita desde la web',
                'nombre' => $nombre,
                'correo' => $email,
                'telefono' => $telefono,
                'comentario' => $comentario,
                'referencia' => $tmpReferencia['nombre'] ,
                'especialidad' => $tmpEspecialidad['nombre'] ,
                'fecha' => $newFecha
            );   
            
            $this->sendmail->load($data, 'solicitud_cita');
            $this->sendmail->success_send_email($data);
            
            echo $this->alerta->swal_success('Se registro su solicitud de cita, en breve nos  estaremos comunicando contigo para confirmar la fecha y hora de la cita...');
            echo $this->url_comp->actualizar_tiempo('4000');  
            EXIT;
        

        }else{
            echo $this->alerta->swal_error('Hubo Problemas Internos...', TRUE);
            EXIT;  
        }

    }
	
	
	public function accion_on_cita() {
        $nombre = $this->input->post('nombre');
        $email = $this->input->post('email');
        $telefono = $this->input->post('telefono');
        $referencia = $this->input->post('referencia');
        $especialidad = $this->input->post('especialidad');
        $sede = $this->input->post('sede');
        $fecha = $this->input->post('fecha');
        $hora = $this->input->post('hora');
        $comentario = $this->input->post('comentario');
        $origen = $this->input->post('origen');
		$uri = $this->input->post('uri');
		$u = base64_decode($this->input->post('u'));
		$terminos = $this->input->post('terminos');
        //var_dump($this->correoPrincipal['valor']); exit;

        //VALIDACION DE CAMPOS
        $error = '';
        $error .= $this->mantenimiento->validacion($nombre, 'required|alphaspecial', 'Nombres y Apellidos');
        $error .= $this->mantenimiento->validacion($email, 'required|email', 'E-mail');
        $error .= $this->mantenimiento->validacion($telefono, 'required|maxlenght[9]', 'Telefono o Celular');
        $error .= $this->mantenimiento->validacion($especialidad, 'required|numeric', 'Seleccione una especialidad');
        $error .= $this->mantenimiento->validacion($sede, 'required|numeric', 'Seleccione una sede');
        $error .= $this->mantenimiento->validacion($fecha, 'required|date', 'Fecha');
        $error .= $this->mantenimiento->validacion($hora, 'required', 'Hora');

        if ($error != '') {
            echo $this->alerta->swal_error2($error);
            EXIT;
        }
		
		if(!isset($terminos)){
            $ms= 'Debe de aceptar las condiciones';
            echo $this->alerta->swal_error($ms);
            EXIT;
        }
		
        $newFecha = $fecha .' '. $hora;

        $datos['nombre'] = $nombre;
        $datos['email'] = $email;
        $datos['telefono'] = $telefono;
        $datos['idreferencia'] = $referencia;
        $datos['idespecialidad'] = $especialidad;
		$datos['url'] = $uri;
        $datos['idsede'] = $sede;
        $datos['idorigen'] = $origen;
        $datos['fecha_cita'] = date("Y-m-d H:i:s", strtotime($newFecha));
        $datos['fecha_registro'] = date("Y-m-d H:i:s");
        $datos['comentario'] = $comentario;
		$datos['link_procedencia'] = $u;
        $datos['ip'] = $this->input->ip_address();

        $result = $this->m_formulario_helpingdent->insertar($datos);
        
        if($result !== FALSE){
            $tmpSede = $this->m_sede->mostrar(array('s.idsede' => $sede));
            $tmpEspecialidad = $this->m_especialidad->mostrar(array('e.idespecialidad' => $especialidad));
            $tmpReferencia = $this->m_referencia->mostrar(array('r.idreferencia' => $referencia));
			
			$newHora = str_replace(':', '', $hora);

            $data = array(
                    'name' => $nombre,
                    'email' => $email,
                    'subject' => 'Solicitud de Cita desde la web',
                    /* Datos SMTP: en caso se necesiten */
                    'smtp_secure' => '', // ssl - tls
                    'smtp_host' => 'mail.multident.pe',
                    'smtp_port' => 25, // ssl: 465 - tls: 587
                    'smtp_username' => 'informacion@multident.pe',
                    'smtp_password' => 'Secreto_1234',
                    /* Datos adicionales */
                    'nombre' => $nombre,
                    'correo' => $email,
                    'telefono' => $telefono,
                    'comentario' => $comentario,
                    'sede' => $tmpSede['nombre'],
					'direccion' => $tmpSede['direccion'],
                    'referencia' => $tmpReferencia['nombre'] ,
                    'especialidad' => $tmpEspecialidad['nombre'] ,
                    'fecha' => $newFecha
            );
            /* ------MAIL DE ATERRIZAJE------- */
            $list_email = array(
                'name' => $this->correoPrincipal['valor'],
            );
            $list_email2 = array();

            if($tmpSede['directo'] == '1'){
                $correos = $this->m_sede_correo->mostrar_cuando(array('sc.idsede' => $sede));
                if(!empty($correos)){
                    $v = 1;
                    foreach ($correos as $item) {
                        $list_email2['name'.$v] = $item['correo'];
                        $v++;
                    }
                }
				$urlApi = 'http://multident.pe/callcenter/ci.php/api/registro?key=c275b7779ed98fbb782b965f0b48b4df&paciente='.urlencode($nombre).'&correo='.urlencode($email).'&celular='.urlencode($telefono).'&sede='.$tmpSede['codigo'].'&captacion='.urlencode($tmpReferencia['nombre']).'&especialidad='.urlencode($tmpEspecialidad['nombre']).'&fecha='.$fecha.'&hora='.$newHora.'&comentario='.urlencode($comentario);
            $api = file_get_contents($urlApi);
				
				
            }
            $final = array_merge($list_email, $list_email2);
            

            $this->sendmail->load($data, 'solicitud_cita');
            //$this->sendmail->success_sendmail2($final);

            echo $this->alerta->reset_form('4000'); 
            echo $this->alerta->swal_success2('Se registro su solicitud de cita, en breve nos  estaremos comunicando contigo para confirmar la fecha y hora de la cita...');
            EXIT;
        

        }else{
            echo $this->alerta->swal_error('Hubo Problemas Internos...', TRUE);
            EXIT;  
        }

    }
	
    public function accion_consulta() {
        $nombre = $this->input->post('nombre');
        $email = $this->input->post('email');
        $asunto = $this->input->post('asunto');
        $mensaje = $this->input->post('mensaje');
        $origen = $this->input->post('origen');
		$uri = $this->input->post('uri');
		$u = base64_decode($this->input->post('u'));
		$terminos = $this->input->post('terminos');        

        //VALIDACION DE CAMPOS
        $error = '';
        $error .= $this->mantenimiento->validacion($nombre, 'required|alphaspecial', 'Nombres y Apellidos');
        $error .= $this->mantenimiento->validacion($email, 'required|email', 'E-mail');
        $error .= $this->mantenimiento->validacion($asunto, 'required|alphaspecial', 'Asunto');
        $error .= $this->mantenimiento->validacion($mensaje, 'required|alphaspecial', 'Mensaje');        

        if ($error != '') {
            echo $this->alerta->swal_error($error);
            EXIT;
        }
		
		if(!isset($terminos)){
            $ms= 'Debe de aceptar las condiciones';
            echo $this->alerta->swal_error($ms);
            EXIT;
        }

        $datos['nombre'] = $nombre;
        $datos['email'] = $email;
		$datos['url'] = $uri;
        //$datos['idsede'] = $sede;
        $datos['idorigen'] = $origen;
        //$datos['fecha_cita'] = date("Y-m-d H:i:s", strtotime($newFecha));
        $datos['fecha_registro'] = date("Y-m-d H:i:s");
        $datos['comentario'] = $asunto.' '.$mensaje;
		$datos['link_procedencia'] = $u;
        $datos['ip'] = $this->input->ip_address();

        $result = $this->m_formulario_web->insertar($datos);
        
        if($result !== FALSE){
            //$tmpSede = $this->m_sede->mostrar(array('s.idsede' => $sede));
            //$tmpEspecialidad = $this->m_especialidad->mostrar(array('e.idespecialidad' => $especialidad));
            //$tmpReferencia = $this->m_referencia->mostrar(array('r.idreferencia' => $referencia));
			
			//$newHora = str_replace(':', '', $hora);
        
            $data = array(
                'from' => $email,
                'to' => $this->correoPrincipal['valor'],
                'subject' => 'Envio de Consulta desde la web',
                'nombre' => $nombre,
                'correo' => $email,
                'asunto' => $asunto,
                'mensaje' => $mensaje,
                'fecha' => date("Y-m-d H:i:s")
            );   
            
            $this->sendmail->load($data, 'consulta_contactenos');
            $this->sendmail->success_send_email($data);
            
            echo $this->alerta->swal_success('Se registro su consulta en nuestra web, en breve nos estaremos comunicando contigo para atender tu consulta.');
            echo $this->url_comp->actualizar_tiempo('4000');  
            EXIT;
        

        }else{
            echo $this->alerta->swal_error('Hubo Problemas Internos...', TRUE);
            EXIT;  
        }

    }	

    public function accion_especialidad() {
        $nombre = $this->input->post('nombre');
        $email = $this->input->post('email');
        $telefono = $this->input->post('telefono');
        $referencia = $this->input->post('referencia');
        $sede = $this->input->post('sede');
        $fecha = $this->input->post('fecha');
        $hora = $this->input->post('hora');
        $comentario = $this->input->post('comentario');
        $origen = $this->input->post('origen');
        $especialidad = $this->input->post('espec');
		$uri = $this->input->post('uri');
		$u = base64_decode($this->input->post('u'));
		$captcha = $this->input->post('g-recaptcha-response');
        $terminos = $this->input->post('terminos');

        //VALIDACION DE CAMPOS
        $error = '';
        $error .= $this->mantenimiento->validacion($nombre, 'required|alphaspecial', 'Nombres y Apellidos');
        $error .= $this->mantenimiento->validacion($email, 'required|email', 'E-mail');
        $error .= $this->mantenimiento->validacion($telefono, 'required|maxlenght[9]', 'Telefono o Celular');
        $error .= $this->mantenimiento->validacion($referencia, 'required|numeric', 'Como se entero');
        $error .= $this->mantenimiento->validacion($sede, 'required|numeric', 'Seleccione una sede');
        $error .= $this->mantenimiento->validacion($fecha, 'required|date', 'Fecha');
        $error .= $this->mantenimiento->validacion($hora, 'required', 'Hora');
		$error .= $this->mantenimiento->validacion($captcha, 'required', 'verificar captcha');

        if ($error != '') {
            echo $this->alerta->swal_error($error);
            EXIT;
        }
	
		if(!isset($terminos)){
            $msg = 'Debe de aceptar los terminos y condiciones';
            echo $this->alerta->swal_error($msg);
            EXIT;
        }

        if(isset($captcha) && !empty($captcha)){
            $secret = '6LeizisUAAAAAFJCIoexHQUXQcTm6kzQvYswyJQS';
            $ip = $this->input->ip_address();
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip";
            $result = file_get_contents($url);

            $_var = json_decode($result, TRUE);

            if($_var['success'] == FALSE){
                $msg = 'validación incorrecta';
                echo $this->alerta->reset_form();
                echo $this->alerta->swal_error($msg);
                EXIT;
            }
            //var_dump($_var); exit;
        }
		
        $newFecha = $fecha .' '. $hora;

        $datos['nombre'] = $nombre;
        $datos['email'] = $email;
        $datos['telefono'] = $telefono;
        $datos['idreferencia'] = $referencia;
        $datos['idespecialidad'] = $especialidad;
        $datos['idsede'] = $sede;
		$datos['url'] = $uri;
		$datos['link_procedencia'] = $u;
        $datos['idorigen'] = $origen;
        $datos['fecha_cita'] = date("Y-m-d H:i:s", strtotime($newFecha));
        $datos['fecha_registro'] = date("Y-m-d H:i:s");
        $datos['comentario'] = $comentario;
        $datos['ip'] = $this->input->ip_address();

        $result = $this->m_formulario_web->insertar($datos);
        
        if($result !== FALSE){
            $tmpSede = $this->m_sede->mostrar(array('s.idsede' => $sede));
            $tmpEspecialidad = $this->m_especialidad->mostrar(array('e.idespecialidad' => $especialidad));
            $tmpReferencia = $this->m_referencia->mostrar(array('r.idreferencia' => $referencia));
			
			$newHora = str_replace(':', '', $hora);

            $data = array(
                    'name' => $nombre,
                    'email' => $email,
                    'subject' => 'Solicitud de Cita desde la web',
                    /* Datos SMTP: en caso se necesiten */
                    'smtp_secure' => '', // ssl - tls
                    'smtp_host' => 'mail.multident.pe',
                    'smtp_port' => 25, // ssl: 465 - tls: 587
                    'smtp_username' => 'informacion@multident.pe',
                    'smtp_password' => 'Secreto_1234',
                    /* Datos adicionales */
                    'nombre' => $nombre,
                    'correo' => $email,
                    'telefono' => $telefono,
                    'comentario' => $comentario,
                    'sede' => $tmpSede['nombre'],
					'direccion' => $tmpSede['direccion'],
                    'referencia' => $tmpReferencia['nombre'] ,
                    'especialidad' => $tmpEspecialidad['nombre'] ,
                    'fecha' => $newFecha
            );
            /* ------MAIL DE ATERRIZAJE------- */
            $list_email = array(
                'name' => $this->correoPrincipal['valor'],
            );
            $list_email2 = array();

            if($tmpSede['directo'] == '1'){
                $correos = $this->m_sede_correo->mostrar_cuando(array('sc.idsede' => $sede));
                if(!empty($correos)){
                    $v = 1;
                    foreach ($correos as $item) {
                        $list_email2['name'.$v] = $item['correo'];
                        $v++;
                    }
                }
				
				$urlApi = 'http://multident.pe/callcenter/ci.php/api/registro?key=c275b7779ed98fbb782b965f0b48b4df&paciente='.urlencode($nombre).'&correo='.urlencode($email).'&celular='.urlencode($telefono).'&sede='.$tmpSede['codigo'].'&captacion='.urlencode($tmpReferencia['nombre']).'&especialidad='.urlencode($tmpEspecialidad['nombre']).'&fecha='.$fecha.'&hora='.$newHora.'&comentario='.urlencode($comentario);
                $api = file_get_contents($urlApi);
				
            }
            $final = array_merge($list_email, $list_email2);
            

            $this->sendmail->load($data, 'solicitud_cita');
            $this->sendmail->success_sendmail2($final);

            
            echo $this->alerta->swal_success('Se registro su solicitud de cita, en breve nos  estaremos comunicando contigo para confirmar la fecha y hora de la cita...');
            echo $this->url_comp->actualizar_tiempo('5000');  
            EXIT;
        

        }else{
            echo $this->alerta->swal_error('Hubo Problemas Internos...', TRUE);
            EXIT;  
        }

    }

    public function accion_franquicia() {
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $sexo = $this->input->post('sexo');
        $email = $this->input->post('email');
        $telefono = $this->input->post('telefono');
        $celular = $this->input->post('celular');
        $direccion = $this->input->post('direccion');
        $ciudad = $this->input->post('ciudad');
        $departamento = $this->input->post('departamento');
        $pais = $this->input->post('pais');
        $profesion = $this->input->post('profesion');
        $ubicacion = $this->input->post('ubicacion');
        $propio = $this->input->post('propio');
        $metros = $this->input->post('metros');
        $empezar = $this->input->post('empezar');
        $suscripcion = $this->input->post('suscripcion');
        $comentario = $this->input->post('comentario');
		$captcha = $this->input->post('g-recaptcha-response');
        $terminos = $this->input->post('terminos');

        //var_dump($this->correoPrincipal['valor']); exit;

        //VALIDACION DE CAMPOS
        $error = '';
        $error .= $this->mantenimiento->validacion($nombre, 'required|alphaspecial', 'Nombres');
        $error .= $this->mantenimiento->validacion($apellido, 'required|alphaspecial', 'Apellidos');
        $error .= $this->mantenimiento->validacion($sexo, 'required', 'Sexo');
        $error .= $this->mantenimiento->validacion($email, 'required|email', 'E-mail');
        $error .= $this->mantenimiento->validacion($telefono, 'required', 'Telefono');
        $error .= $this->mantenimiento->validacion($direccion, 'required|', 'Direccion');
        $error .= $this->mantenimiento->validacion($ciudad, 'required|alphaspecial', 'Ciudad');
        $error .= $this->mantenimiento->validacion($departamento, 'required|alphaspecial', 'Departamento');
        $error .= $this->mantenimiento->validacion($pais, 'required|alphaspecial', 'Pais');
        $error .= $this->mantenimiento->validacion($profesion, 'required|alphaspecial', 'Profesion');
        $error .= $this->mantenimiento->validacion($ubicacion, 'required', '¿Dónde desea ubicar su negocio?');
        $error .= $this->mantenimiento->validacion($propio, 'required|numeric', '¿Posee un local propio para ubicar su franquicia?');
        $error .= $this->mantenimiento->validacion($empezar, 'required|numeric', '¿Cuándo desea empezar');
        $error .= $this->mantenimiento->validacion($suscripcion, 'required|numeric', '¿Desea suscribirse a nuestra lista de correos?');
		$error .= $this->mantenimiento->validacion($captcha, 'required', 'verificar captcha');

        if ($error != '') {
            echo $this->alerta->swal_error($error);
            EXIT;
        }
		
		if(!isset($terminos)){
            $msg = 'Debe de aceptar los terminos y condiciones';
            echo $this->alerta->swal_error($msg);
            EXIT;
        }

        if(isset($captcha) && !empty($captcha)){
            $secret = '6LeizisUAAAAAFJCIoexHQUXQcTm6kzQvYswyJQS';
            $ip = $this->input->ip_address();
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip";
            $result = file_get_contents($url);

            $_var = json_decode($result, TRUE);

            if($_var['success'] == FALSE){
                $msg = 'validación incorrecta';
                echo $this->alerta->reset_form();
                echo $this->alerta->swal_error($msg);
                EXIT;
            }
            //var_dump($_var); exit;
        }

        if($empezar == '1'){
            $newEmpezar = 'AHORA';
        }elseif($empezar == '2'){
            $newEmpezar = 'DENTRO DE 1 MES';
        }elseif($empezar == '3'){
            $newEmpezar = 'DENTRO DE 3 MES';
        }elseif($empezar == '4'){
            $newEmpezar = 'DENTRO DE 6 MES';
        }elseif($empezar == '5'){
            $newEmpezar = 'DENTRO DE 1 AÑO';
        }elseif($empezar == '6'){
            $newEmpezar = 'INDEFINIDO';
        }elseif($empezar == '7'){
            $newEmpezar = 'SOLO CONSULTA';
        }

        if($suscripcion == '1'){
            $tmpSuscriptor = $this->m_suscriptor->existe_campo('email',$email);
            if(!($tmpSuscriptor)){
                $datosSuscriptor['nombre'] = $nombre . ' '. $apellido;
                $datosSuscriptor['email'] = $email;
                $datosSuscriptor['fecha_registro'] = date("Y-m-d H:i:s");
                $datosSuscriptor['ip'] = $this->input->ip_address();
                $result = $this->m_suscriptor->insertar($datosSuscriptor);
            }
        }

        $data = array(
            'name' => $nombre . ' '. $apellido,
            'email' => $email,
            'subject' => 'Solicitud para Franquicia desde la web',
            /* Datos SMTP: en caso se necesiten */
            'smtp_secure' => '', // ssl - tls
            'smtp_host' => 'mail.multident.pe',
            'smtp_port' => 25, // ssl: 465 - tls: 587
            'smtp_username' => 'informacion@multident.pe',
            'smtp_password' => 'Secreto_1234',
            /* Datos adicionales */
            'nombre' => $nombre . ' '. $apellido,
            'sexo' => $sexo == 'M' ? 'MASCULINO' : 'FEMENINO',
            'correo' => $email,
            'telefono' => $telefono,
            'celular' => $celular,
            'direccion' => $direccion,
            'ciudad' => $ciudad,
            'departamento' => $departamento,
            'pais' => $pais,
            'profesion' => $profesion,
            'ubicacion' => $ubicacion,
            'localpro' => $propio == '1' ? 'SI' : 'NO',
            'metros' => $metros,
            'empezar' => $newEmpezar,
            'telefono' => $telefono,
            'comentario' => $comentario,
        );
        /* ------MAIL DE ATERRIZAJE------- */
        $list_email = array(
            'Director Medico' => 'directormedico@multident.pe',
            'Diana Mori' => 'dmori@multident.pe',
			'Franquicias Multident' => 'franquicias@multident.pe'
        );           

        $this->sendmail->load($data, 'solicitud_franquicia');
        $this->sendmail->success_smtp_2($list_email);
            
        echo $this->alerta->swal_success('Se registro correctamente su solicitud, en breve nos  estaremos comunicando contigo...');
        echo $this->url_comp->actualizar_tiempo('4000');  
        EXIT;
    }
    
    public function confirmar(){
        $code = $this->input->get('codekey');
        
        $tmpSuscriptor = $this->m_suscriptor->mostrar(array('s.codigo' => $code));
        if(!empty($tmpSuscriptor)){
            $datos['confirmar'] = '1';
            $datos['fecha_confirmacion'] = date("Y-m-d H:i:s");
            $this->m_suscriptor->actualizar($datos, 'idsuscriptor', $tmpSuscriptor['idsuscriptor']);
            echo $this->url_comp->direccionar(base_url(). 'site/confirmacion');
            EXIT;
        }else{
            echo $this->url_comp->direccionar(base_url());
            EXIT;
        }
    }
	
	public function accion_semefa() {
        $documento = $this->input->post('documento');

        //VALIDACION DE CAMPOS
        $error = '';
        $error .= $this->mantenimiento->validacion($documento, 'required', 'Documento de Identidad');

        if ($error != '') {
            echo $this->alerta->swal_error($error);
            EXIT;
        }

        $semefa = $this->m_semefa->mostrar(array('se.num_documento' => $documento));

        if($semefa){
            $contenido = "<p>Se encuentra afiliado al <b>SEMEFA</b></p>"
                        ."<hr>"
                        ."<p style='font-size: 12px;text-align: left;'>Apellidos y Nombres: <b>".$semefa['afiliado']."</b></p>"
                        ."<p style='font-size: 12px;text-align: left;'>Parentesco: <b>".strtoupper($semefa['vf'])."</b></p>"
                        ;


            echo $this->alerta->swal_success2($contenido, TRUE);
            EXIT;
        }else{
            echo $this->alerta->swal_error('No se encuentra afiliado al <b>SEMEFA</b>', TRUE);
            EXIT;  
        }

    }
	
	public function login() {
        $username = $this->input->post('correo');
        $password = $this->input->post('password');
        $error = '';

        //mantenimiento 
        $error .= $this->mantenimiento->validacion($username, 'required|trim|minlenght[3]', 'Correo');
        $error .= $this->mantenimiento->validacion($password, 'required|trim|minlenght[5]', 'Contraseña');

        if ($error != '') {
            echo $this->alerta->swal_error($error, TRUE);
            EXIT;
        }elseif ($this->m_personal->existe_campo('correo', $username) === FALSE) {
            echo $this->alerta->swal_error('El correo no se encuentra registrado...');
            EXIT;
        }

        $info = $this->m_personal->mostrar(array('p.correo' => $username, 'p.password' => md5($password)));
        //var_dump($info); exit;
        if (!empty($info)) {
            $data = array(
                'personal_data' => array(
                    'sys_id' => $info['idpersonal'],
                    'sys_nombre' => $info['nombre_personal'],
                    'sys_correo' => $info['correo'],
                    'sys_password' => $info['password'],
                )
            );
            $this->session->set_userdata($data);
            
            $user['logeado'] = '1';
            $this->m_personal->actualizar($user, 'idpersonal', $info['idpersonal']);

            $datos['ip'] = $this->input->ip_address();
            $datos['accion'] = '1';
            $datos['idpersonal'] = $info['idpersonal'];
            $datos['fecha_registro'] = date("Y-m-d H:i:s");
            $this->m_control->insertar($datos); 

            

        } else {
            echo $this->alerta->swal_error('Datos incorrectos, o el usuario ya inicio sesion en otro dispositivo');
            EXIT;
        }
        echo $this->alerta->location_href(base_url() . 'site/streaming');
        EXIT;
    }

    public function salir() {
        // PARA HISTORIAL DE ACCESO
        $datos['ip'] = $this->input->ip_address();
        $datos['accion'] = '2';
        $datos['idpersonal'] = $this->_session_personal->sys_id;
        $datos['fecha_registro'] = date("Y-m-d H:i:s") ;
        $this->m_control->insertar($datos);

        $user['logeado'] = '0';
        $this->m_personal->actualizar($user, 'idpersonal', $this->_session_personal->sys_id);
        
        $this->session_manager->destruir_session('personal_data');
        echo $this->alerta->location_href(base_url(), TRUE);
        EXIT;
    }
	
	public function change_password() {
        $password = $this->input->post('password');
        $newpassword = $this->input->post('newpassword');
        $confirmarpassword = $this->input->post('confirmarpassword');
        $error = '';

        //mantenimiento 
        $error .= $this->mantenimiento->validacion($password, 'required|trim|minlenght[5]', 'Contraseña Actual');
        $error .= $this->mantenimiento->validacion($newpassword, 'required|trim|minlenght[5]', 'Nueva Contraseña');
        $error .= $this->mantenimiento->validacion($confirmarpassword, 'required|trim|minlenght[5]', 'Confirmar Contraseña');

        if ($error != '') {
            echo $this->alerta->swal_error($error, TRUE);
            EXIT;
        }

        $tmpDatos = $this->m_personal->mostrar(array('p.idpersonal' => $this->_session_personal->sys_id, 'p.password' => md5($password)));
        if(empty($tmpDatos)){
            echo $this->alerta->swal_error('La Contraseña Actual no es la correcta...', TRUE);
            EXIT;
        }

        if($newpassword != $confirmarpassword){
            echo $this->alerta->swal_error('La Contraseñas no coinciden...', TRUE);
            EXIT;
        }else{
            $datos['password'] = md5($newpassword);
            $this->m_personal->actualizar($datos, 'idpersonal', $this->_session_personal->sys_id);
            echo $this->alerta->swal_success2('Se actualizo la contraseñan correctamente...', TRUE);
            EXIT;
        }

    }
	
	public function accion_plan_dental() {
        $documento = $this->input->post('documento');

        //VALIDACION DE CAMPOS
        $error = '';
        $error .= $this->mantenimiento->validacion($documento, 'required', 'Documento de Identidad');

        if ($error != '') {
            echo $this->alerta->swal_error($error);
            EXIT;
        }

        $plan = $this->m_plan_dental->mostrar(array('pp.numero_documento' => $documento));

        if($plan){
            $_nombres = $plan['ape_paterno']. ' '. $plan['ape_materno']. ' '. $plan['nombres'];
            $_fecha = $plan['fecha_afiliacion'];
			// $_fecha = date('d/m/y', strtotime($plan['fecha_afiliacion']));
            $contenido = "<p>Se encuentra afiliado al <b>PLAN DENTAL</b></p>"
                        ."<hr>"
                        ."<p style='font-size: 12px;text-align: left;'>Apellidos y Nombres: <b>".$_nombres."</b></p>"
                        ."<p style='font-size: 12px;text-align: left;'>Fecha de Afiliación: <b>".$_fecha."</b></p>"
                        ;


            echo $this->alerta->swal_success2($contenido, TRUE);
            EXIT;
        }else{
            echo $this->alerta->swal_error('No se encuentra afiliado al <b>PLAN DENTAL</b>', TRUE);
            EXIT;  
        }

    }
	
	

    public function accion_plan_dental_bkp() {
        $documento = $this->input->post('documento');

        //VALIDACION DE CAMPOS
        $error = '';
        $error .= $this->mantenimiento->validacion($documento, 'required', 'Documento de Identidad');

        if ($error != '') {
            echo $this->alerta->swal_error($error);
            EXIT;
        }

        $api = 'http://198.199.69.176/sistema-multident/ci.php/api/plandental/verificar_cobertura?token=685bd470f0abdfd40b224aacadd1cdf4&docu='.$documento;

        $datos = file_get_contents($api);

        $_datos = json_decode($datos, TRUE);

        if($_datos['type'] == '200'){
            $entidad = $_datos['entidad'];
            //echo "<pre>";print_r($_datos['entidad']);exit;
            $_nombres = $entidad['ape_paterno']. ' '. $entidad['ape_materno']. ' '. $entidad['nombres'];
            $_fecha = date('d/m/Y', strtotime($entidad['fecha_afiliacion']));
            $contenido = "<p>Se encuentra afiliado al <b>PLAN DENTAL</b></p>"
                        ."<hr>"
                        ."<p style='font-size: 12px;text-align: left;'>Apellidos y Nombres: <b>".$_nombres."</b></p>"
                        ."<p style='font-size: 12px;text-align: left;'>Fecha de Afiliación: <b>".$_fecha."</b></p>"
                        ;

            echo $this->alerta->swal_success2($contenido, TRUE);
            EXIT;
        }else{
            echo $this->alerta->swal_error($_datos['message'], TRUE);
            EXIT;  
        }


    }


    public function marcar_asistencia() {
        $id = $this->input->post("id");
        $asistio = $this->input->post("estado");

        if($asistio == 0){
            $_datos['asistio'] = 1;
            $_datos['fecha_asistencia'] = date('Y-m-d H:i:s');

            $result = $this->m_coctel->actualizar($_datos, 'idcoctel', $id);

            echo 1;

        }elseif($asistio == 1){
            $_datos['asistio'] = 0;
            $_datos['fecha_asistencia'] = '';

            $result = $this->m_coctel->actualizar($_datos, 'idcoctel', $id);

            echo 0;

        }

    }


    public function marcar_asistencia_congreso() {
        $id = $this->input->post("id");
        $asistio = $this->input->post("estado");

        if($asistio == 0){
            $_datos['asistio'] = 1;
            $_datos['fecha_asistencia'] = date('Y-m-d H:i:s');

            $result = $this->m_congreso->actualizar($_datos, 'idcongreso', $id);

            echo 1;

        }elseif($asistio == 1){
            $_datos['asistio'] = 0;
            $_datos['fecha_asistencia'] = '';

            $result = $this->m_congreso->actualizar($_datos, 'idcongreso', $id);

            echo 0;

        }

    }



}