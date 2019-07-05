<?php

class Mantenimiento {

    public function accion($id, $data, $controlador, $oculto, $estado = '') {
        $items = explode('|', $data);
        $string = '';
        foreach ($items as $row) {
            switch (trim($row)) {
                case 'ver':
                    $string .= '<a class="btn btn-sm btn-success" href="' . base_url() . 'admin/' . $controlador . '/observar/' . $id . '" data-toggle="tooltip" title="Observar"><i class="fa fa-eye"></i></a>';
                    $string .= '&nbsp;';
                    break;
                case 'ver2':
                    $string .= '<a class="btn btn-sm btn-success observar" data-url="' . base_url() . 'admin/' . $controlador . '/observar/' . $id . '" data-toggle="tooltip" title="Observar"><i class="fa fa-eye"></i></a>';
                    $string .= '&nbsp;';
                    break;
                case 'editar':
                    if ($oculto == 0 || $oculto == 3) {
                        $string .= '<a class="btn btn-sm btn-primary" href="' . base_url() . 'admin/' . $controlador . '/editar/' . $id . '" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i> </a>';
                        $string .= '&nbsp;';
                    }
                    break;
                case 'editar2':
                    if ($oculto == 0 || $oculto == 3) {
                        $string .= '<a class="btn btn-sm btn-primary editar" data-url="' . base_url() . 'admin/' . $controlador . '/editar/' . $id . '" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"></i> </a>';
                        $string .= '&nbsp;';
                    }
                    break;
                case 'correo':
                    if ($oculto == 0 || $oculto == 3) {
                        $string .= '<a class="btn btn-sm btn-success correo" data-url="' . base_url() . 'admin/' . $controlador . '/correo/' . $id . '" data-toggle="tooltip" title="Ver Correos"><i class="fa fa-envelope"></i> </a>';
                        $string .= '&nbsp;';
                    }
                    break;
                case 'aprobar':
                    if ($oculto == 0 || $oculto == 3) {
                        $string .= '<a class="btn btn-sm btn-success aprobar" data-url="' . base_url() . 'admin/' . $controlador . '/aprobar/' . $id . '" data-toggle="tooltip" title="Aprobar"><i class="fa fa-check"></i> </a>';
                        $string .= '&nbsp;';
                    }
                    break;
                case 'rechazar':
                    if ($oculto == 0 || $oculto == 3) {
                        $string .= '<a class="btn btn-sm btn-danger rechazar" data-url="' . base_url() . 'admin/' . $controlador . '/rechazar/' . $id . '" data-toggle="tooltip" title="Rechazar"><i class="fa fa-times"></i> </a>';
                        $string .= '&nbsp;';
                    }
                    break;
                case 'password':
                    if ($oculto == 0 || $oculto == 3) {
                        $string .= '<a class="btn btn-sm btn-success password" data-url="' . base_url() . 'admin/' . $controlador . '/password/' . $id . '" data-toggle="tooltip" title="Cambiar Password"><i class="fa fa-lock"></i> </a>';
                        $string .= '&nbsp;';
                    }
                    break;
                case 'denegar':
                    if ($oculto == 0) {
                        $string .= '<a href="" class="btn btn-sm btn-danger denegar" data-id="' . $controlador . '" data-url="' . base_url() . 'admin/' . $controlador . '/accion_denegar/' . $id . '" data-toggle="tooltip" title="Bloquear"><i class="fa fa-lock"></i> </a>';
                        $string .= '&nbsp;';
                    }
                    break;
                case 'permitir':
                    if ($oculto == 1) {
                        $string .= '<a href="" class="btn btn-sm btn-success permitir" data-url="' . base_url() . 'admin/' . $controlador . '/accion_permitir/' . $id . '"data-toggle="tooltip" title="Desbloquear"><i class="fa fa-unlock"></i></a>';
                        $string .= '&nbsp;';
                    }
                    break;
                case 'subir':
                    if ($oculto == 0) {
                        $string .= '<a  class="btn btn-sm btn-success subir" data-url="' . base_url() . 'admin/' . $controlador . '/subir_posicion" '
                            . 'data-id="' . $id . '" data-toggle="tooltip" title="Subir Posicion"> '
                            . '<i class="glyphicon glyphicon-arrow-up"></i></a>';
                        $string .= '&nbsp;';
                    }
                    
                    break;
                case 'bajar':
                    if ($oculto == 0) {
                        $string .= '<a  class="btn btn-sm btn-success bajar" data-url="' . base_url() . 'admin/' . $controlador . '/bajar_posicion" '
                            . 'data-id="' . $id . '" data-toggle="tooltip" title="Bajar Posicion"> '
                            . '<i class="glyphicon glyphicon-arrow-down"></i></a>';
                        $string .= '&nbsp;';
                    }
                    break;
                case 'eliminar':
                        $string .= '<a href="" class="btn btn-sm btn-danger denegar" data-id="' . $controlador . '" data-url="' . base_url() . 'admin/' . $controlador . '/accion_eliminar/' . $id . '" data-toggle="tooltip" title="Eliminar"><i class="fa fa-times"></i> </a>';
                        $string .= '&nbsp;';
                    break;
                case 'eliminar2':
                    if ($oculto == 0) {
                        $string .= '<a href="" class="btn btn-sm btn-danger denegar" data-id="' . $controlador . '" data-url="' . base_url() . 'admin/' . $controlador . '/accion_denegar/' . $id . '" data-toggle="tooltip" title="Eliminar"><i class="fa fa-times"></i> </a>';
                        $string .= '&nbsp;';
                    }
                    break;
                case 'directo':
                    if ($estado == 1) {
                        $string .= '<a href="" class="btn btn-sm btn-danger directo" data-id="' . $controlador . '" data-url="' . base_url() . 'admin/' . $controlador . '/bloquear_correo/' . $id . '" data-toggle="tooltip" title="Bloquear Correos"><i class="fa fa-lock"></i> </a>';
                        $string .= '&nbsp;';
                    }
                    break;
                case 'indirecto':
                    if ($estado == 0) {
                        $string .= '<a href="" class="btn btn-sm btn-success indirecto" data-url="' . base_url() . 'admin/' . $controlador . '/desbloquear_correo/' . $id . '"data-toggle="tooltip" title="Desbloquear Correos"><i class="fa fa-unlock"></i></a>';
                        $string .= '&nbsp;';
                    }
                    break;
                default:
                    break;
            }
        }
        return $string;
    }

    


    public function accion_solicitud($id, $data, $controlador, $oculto,$oculto) {
        $items = explode('|', $data);
        $string = '';
        foreach ($items as $row) {
            switch (trim($row)) {
                case 'ver':
                    if ($estado == 2 || $estado == 3) {
                        $string .= '<a class="btn btn-sm btn-success views" data-url="' . base_url() . 'admin/' . $controlador . '/ver/' . $id . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i> </a>';
                        $string .= '&nbsp;';
                    }
                    break;
                case 'aprobar':
                    if ($estado == 1 && $oculto == 0) {
                        $string .= '<a class="btn btn-sm btn-success aprobar" data-url="' . base_url() . 'admin/' . $controlador . '/aprobar/' . $id . '" data-toggle="tooltip" title="Aprobar"><i class="fa fa-check"></i> </a>';
                        $string .= '&nbsp;';
                    }
                    break;
                case 'rechazar':
                    if ($estado == 1 && $oculto == 0) {
                        $string .= '<a class="btn btn-sm btn-danger rechazar" data-url="' . base_url() . 'admin/' . $controlador . '/rechazar/' . $id . '" data-toggle="tooltip" title="Rechazar"><i class="fa fa-ban"></i> </a>';
                        $string .= '&nbsp;';
                    }
                    break;
                default:
                    break;
            }
        }
        return $string;
    }



    public function estado($estado) {
        switch ($estado) {
            case '0':
                $estado = 'Activo';
                return $estado;
            case '1':
                $estado = 'Inactivo';
                return $estado;
            default:
                break;
        }
    }

    public function estado_cliente($estado) {
        switch ($estado) {
            case '1':
                $estado = '<span class="label label-warning">Pendiente</span>';
                return $estado;
            case '2':
                $estado = '<span class="label label-info">Vigente</span>';
                return $estado;
            case '3':
                $estado = '<span class="label label-info">Interes / Rubro</span>';
                return $estado;
            case '4':
                $estado = '<span class="label label-success">Cliente</span>';
                return $estado;
            case '5':
                $estado = '<span class="label label-danger">De Baja</span>';
                return $estado;
            default:
                break;
        }
    }

    public function validacion($string, $config, $field) {
        $data = explode('|', $config);
        $message = '';
        foreach ($data as $items) {
            $value = trim($items);
            $new_value = '';
            if (strpos($value, 'minlenght') !== FALSE) {
                $pre_value = str_replace('minlenght', '', $value);
                $pre_value = str_replace('[', '', $pre_value);
                $pre_value = str_replace(']', '', $pre_value);
                $new_value = (int) $pre_value;
            }
            if (strpos($value, 'maxlenght') !== FALSE) {
                $pre_value = str_replace('maxlenght', '', $value);
                $pre_value = str_replace('[', '', $pre_value);
                $pre_value = str_replace(']', '', $pre_value);
                $new_value = (int) $pre_value;
            }
            if (strpos($value, 'size') !== FALSE) {
                $pre_value = str_replace('size', '', $value);
                $pre_value = str_replace('[', '', $pre_value);
                $pre_value = str_replace(']', '', $pre_value);
                $new_value = (int) $pre_value;
            }
            if (strpos($value, 'matched') !== FALSE) {
                $pre_value = str_replace('matched', '', $value);
                $pre_value = str_replace('[', '', $pre_value);
                $pre_value = str_replace(']', '', $pre_value);
                $data = explode('%', $pre_value);
                $data_field = (string) $data[0];
                $data_value = (string) $data[1];
            }
            if (($value == 'trim') && ($string != trim($string))) {
                $message .= "<li style='margin-left: 12px;''>No se permiten espacios en los extremos. Campo: " . $field . "</li>";
            } elseif (($value == 'required') && ($string == '')) {
                $message .= "<li style='list-style: none;'>Es necesario llenar este campo: <b>" . $field . "</b></li>";
            } elseif (($value == 'alpha') && ($string != '') && (!preg_match("/^([[:alpha:]])*$/", $string))) {
                $message .= "<li style='margin-left: 12px;'>Se permiten unicamente carácteres alfabéticos. Campo: " . $field . "</li>";
            } elseif (($value == 'alphanumeric') && ($string != '') && (!preg_match("/^([[:alnum:]])*$/", $string))) {
                $message .= "<li style='margin-left: 12px;'>Se permiten unicamente carácteres alfanuméricos. Campo: " . $field . "</li>";
            } elseif (($value == 'numeric') && ($string != '') && (!preg_match("/^([[:digit:]])*$/", $string))) {
                $message .= "<li style='margin-left: 12px;'>Se permiten unicamente carácteres numéricios. Campo: " . $field . "</li>";
            } elseif (($value == 'alphaspace') && ($string != '') && (!ctype_alpha(str_replace(' ', '', $string)))) {
                $message .= "<li style='margin-left: 12px;list-style: none;'>Se permiten únicamente carácteres alfabéticos y espacios. Campo: <b>" . $field . "</b></li>";
            } elseif (($value == 'decimal') && ($string != '') && (!preg_match("/^[0-9]+(\.[0-9]+)?$/", $string))) {
                $message .= "<li style='margin-left: 12px;'>Se permiten únicamente números enteros y decimales. Campo: " . $field . "</li>";
            } elseif (($value == 'date') && ($string != '') && (!preg_match('/^(\d\d\-\d\d\-\d\d\d\d){1,1}$/', $string))) {
                $message .= "<li style='margin-left: 12px;'>Se permiten únicamente fechas con formato dd-mm-yyyy. Campo: " . $field . "</li>";
            } elseif (($value == 'datetime') && ($string != '') && (!preg_match('/^(\d\d\-\d\d\-\d\d\d\d)+(\d\d\:\d\d){1,1}$/', $string))) {
                $message .= "<li style='margin-left: 12px;'>Se permiten únicamente fechas con formato dd-mm-yyyy. Campo: " . $field . "</li>";
            } elseif (($value == 'alphaspecial') && ($string != '') && (!preg_match('/^[a-zñÑáéíóúÁÉÍÓÚ\d_\s():,&-\/]+$/i', $string))) {
                $message .= "<li style='margin-left: 12px;'>Se permiten únicamente carácteres alfabéticos especiales. Campo: <b>" . $field . "</b></li>";
            } elseif (($value == 'url') && ($string != '') && (!preg_match('/^[http:\/\/|www.|https:\/\/]/i', $string))) {
                $message .= "<li style='margin-left: 12px;'>Se permiten únicamente direcciones url. Campo: " . $field . "</li>";
            } elseif ((strpos($value, 'minlenght') !== FALSE) && ($string != '') && (strlen($string) < $new_value)) {
                $message .= "<li style='margin-left: 12px;'>El texto ingresado es menor a " . $new_value . " carácteres. Campo: " . $field . "</li>";
            } elseif ((strpos($value, 'maxlenght') !== FALSE) && ($string != '') && (strlen($string) > $new_value)) {
                $message .= "<li style='margin-left: 12px;list-style: none;'>El texto ingresado es mayor a <b>" . $new_value . "</b> carácteres. Campo: <b>" . $field . "</b></li>";
            } elseif (($value == 'email') && ($string != '') && (!preg_match('/^[^0-9][.a-zA-Z0-9_-]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,4}$/', $string))) {
                $message .= "<li style='list-style: none;'>Se permiten únicamente direcciones de correo. Campo: <b>" . $field;
            } elseif ((strpos($value, 'size') !== FALSE) && ($string != '') && (strlen($string) != $new_value)) {
                $message .= "<li style='margin-left: 12px;'>El texto ingresado debe tener " . $new_value . " carácteres. Campo: ". $field ."</b>";
            } elseif ((strpos($value, 'matched') !== FALSE) && ($string != '' || $data_value != '') && ($string != $data_value)) {
                $message .= "<li style='margin-left: 12px;'>El campo "
                        . "<span class='label text-white bg-red text-uppercase'>" . $field . "</span> no se relaciona con el campo "
                        . "<span class='label text-white bg-red text-uppercase'>" . $data_field . "</span>.</li>";
            }
        }
        if ($message != '') {
            return $message;
        } else {
            return '';
        }
    }

    public function aleatorio($length = 40, $lowercase = TRUE, $uppercase = FALSE, $number = TRUE, $specialchar = FALSE) {
        $source = '';
        if ($lowercase === TRUE) {
            $source .= 'abcdefghijklmnopqrstuvwxyz';
        }
        if ($uppercase === TRUE) {
            $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($number === TRUE) {
            $source .= '1234567890';
        }
        if ($specialchar === TRUE) {
            $source .= '|@#~$%()=^*+[]{}-_';
        }
        if ($length > 0) {
            $rstr = "";
            $source = str_split($source, 1);
            for ($i = 1; $i <= $length; $i++) {
                mt_srand((double) microtime() * 1000000);
                $num = mt_rand(1, count($source));
                $rstr .= $source[$num - 1];
            }
        }
        return $rstr;
    }

    public function porcentaje($total = 0,$obtenido = ''){
        $porcent = '0%';
        if($obtenido != ''){
            $porcent = ($obtenido * 100) / $total;
            $resto = ($obtenido * 100) % $total;
            if($resto != 0){
                $porcent = number_format($porcent,'2');
                return $porcent.'%';
            }else{
                return $porcent.'%';
            }
        }else{
            return $porcent;
        }
    }

    public function tipo_porcentaje($porcent = ''){
        $tipo = '';
        $pos = strpos($porcent, '%');
        $tmpPorcent = substr($porcent, 0,$pos);
        if(0 <= $tmpPorcent && $tmpPorcent <= 25){
            return 'danger';
            exit;
        }elseif (26 <= $tmpPorcent && $tmpPorcent <= 50) {
            return 'warning';
            exit;
        }elseif(51 <= $tmpPorcent && $tmpPorcent <= 100){
            return 'success';
            exit;
        }
    }

}
