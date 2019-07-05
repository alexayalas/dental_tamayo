<?php

@session_cache_limiter('private, must-revalidate');
@header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
@header("Cache-Control: no-store, no-cache, must-revalidate");
@header("Cache-Control: post-check=0, pre-check=0", FALSE);
@header("Pragma: no-cache");

class Correo extends CI_Controller {

    private $_process;
    private $_result;

    public function __construct() {
        parent::__construct();
        /*
         * DECLARACION DE LIBRERIAS, HELPERS Y MODELOS
         */
        $library = array('session_manager');
        $helper = array('base64_url');
        $model = array('m_usuario', 'm_sede', 'm_origen', 'm_correo', 'm_sede_correo');
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
    }

    public function accion() {
        $idsede = $this->input->post('idsede');
        $correo = $this->input->post('fcorreo');
        $idcorreo = $this->input->post('idecorreo');
        $ecorreo = $this->input->post('ecorreo');
        $count = 0;
        //var_dump($correo); exit;
        if($correo == NULL && $idcorreo == NULL){
            echo $this->alerta->swal_error('Deberá ingresar por lo menos un correo...', TRUE);
            EXIT;
        }

        /* VALIDACION DE LOS CORREOS*/
        for ($i=0; $i < count($correo) ; $i++) { 
            $error = '';
            $msg = ' <b>'. $correo[$i] . '</b>';
            $error .= $this->mantenimiento->validacion($correo[$i], 'required|email', $msg);
            if ($error != '') {
                echo $this->alerta->swal_error($error, TRUE);
                EXIT;
            }
        }
        $tmpSede = $this->m_sede->mostrar(array('s.idsede' => $idsede));

        for ($i=0; $i < count($correo); $i++) { 
            $tmpCorreo = $this->m_correo->mostrar(array('c.email' => $correo[$i]));
            if(!empty($tmpCorreo)){
                $datoCorreo['idsede'] = $idsede;
                $datoCorreo['idcorreo'] = $tmpCorreo['idcorreo'];
                $this->m_sede_correo->insertar($datoCorreo);
                
                $bitacora['descripcion'] = 'Agrego el correo: ' . $correo[$i] . ' en la sede: ' . $tmpSede['nombre'];
                $bitacora['modulo'] = 'sede';
                $bitacora['tipo'] = '1';
                $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
                $bitacora['idusuario'] = $this->_session->sys_id;
                $this->m_bitacora->insertar($bitacora);
            }else{
                $dato['email'] = $correo[$i];
                $dato['fecha_registro'] = date("Y-m-d H:i:s");
                $dato['fecha_modificacion'] = date("Y-m-d H:i:s");
                $newId = $this->m_correo->insertar($dato, TRUE);
                if($newId != ''){
                    $datoCorreo['idsede'] = $idsede;
                    $datoCorreo['idcorreo'] = $newId;
                    $this->m_sede_correo->insertar($datoCorreo);

                    $bitacora['descripcion'] = 'Agrego el correo: ' . $correo[$i] . ' en la sede: ' . $tmpSede['nombre'];
                    $bitacora['modulo'] = 'sede';
                    $bitacora['tipo'] = '1';
                    $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
                    $bitacora['idusuario'] = $this->_session->sys_id;
                    $this->m_bitacora->insertar($bitacora);
                }
            }
            $count++;
        }

        for ($i=0; $i < count($idcorreo); $i++) { 
            $tmpCorreo = $this->m_correo->mostrar(array('c.idcorreo' => $idcorreo[$i]));
            if(!empty($tmpCorreo)){
                $actualizarCorreo['email'] = $ecorreo[$i];
                $actualizarCorreo['fecha_modificacion'] = date("Y-m-d H:i:s");
                $this->m_correo->actualizar($actualizarCorreo, 'idcorreo', $tmpCorreo['idcorreo']);
                $bitacora['descripcion'] = 'Modifico el correo: ' . $idcorreo[$i] . ' en la sede: ' . $tmpSede['nombre'];
                $bitacora['modulo'] = 'sede';
                $bitacora['tipo'] = '2';
                $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
                $bitacora['idusuario'] = $this->_session->sys_id;
                $this->m_bitacora->insertar($bitacora);
            }
            $count++;
        }

        if($count != 0){
            echo $this->alerta->swal_success('El correo(s) se registro correctamente...');
            echo $this->url_comp->actualizar_tiempo('1500');                   
            EXIT;
        }    
            
            
        
    }

    public function eliminar_correo($id = ""){
        $tmpCorreoSede = $this->m_sede_correo->mostrar(array("sc.idsedecorreo" => $id));
        //var_dump($tmpCorreoSede); exit;
        if(!empty($tmpCorreoSede)){
            $this->m_sede_correo->eliminar($id);

            $bitacora['descripcion'] = 'Elimino el correo: ' . $tmpCorreoSede['correo'] . ' en la sede: ' . $tmpCorreoSede['sede'];
            $bitacora['modulo'] = 'sede';
            $bitacora['tipo'] = '3';
            $bitacora['fecha_registro'] = date("Y-m-d H:i:s");
            $bitacora['idusuario'] = $this->_session->sys_id;
            $this->m_bitacora->insertar($bitacora);

            echo $this->alerta->swal_success('El correo se elimino correctamente...');
            echo $this->url_comp->direccionar_tiempo(base_url() . 'admin/sede/listar', '2000');
            EXIT;
        }else{
            echo $this->url_comp->direccionar(base_url() . 'admin/sede/listar', TRUE);
            EXIT;
        }
    }



}
