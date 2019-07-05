<?php

class Archivo {

    public function archivo_1($archivo, $tipo = 'single') {
        switch ($tipo) {
            case 'single':
                if (isset($_FILES[$archivo]['tmp_name']) &&
                        $_FILES[$archivo]['tmp_name'] != '') {
                    $value = $_FILES[$archivo];
                    $result = $this->checked_extention($value['name'], 'jpeg|jpg|png|gif|ico');
                    if ($result === FALSE) {
                        return FALSE;
                    } else {
                        return $value;
                    }
                } else {
                    return FALSE;
                }
                break;
            case 'multiple':
                if (isset($_FILES[$archivo]['tmp_name'][0]) &&
                        $_FILES[$archivo]['tmp_name'][0] != '') {
                    $values = $_FILES[$archivo];
                    for ($i = 0; $i < count($values['tmp_name']); $i++) {
                        $result = $this->checked_extention($values['name'][$i], 'jpeg|jpg|png|gif');
                        if ($result === FALSE) {
                            continue;
                        } else {
                            $data['name'][] = $values['name'][$i];
                            $data['type'][] = $values['type'][$i];
                            $data['tmp_name'][] = $values['tmp_name'][$i];
                            $data['error'][] = $values['error'][$i];
                            $data['size'][] = $values['size'][$i];
                        }
                    }
                    return $data;
                } else {
                    return FALSE;
                }
                break;
            default:
                return FALSE;
        }
    }

    public function generar_dropdown($data, $name, $default = '', $string = 'Seleccione una opción', $type = 'none') {
        //genera los grados de la base de datos en un </select>
        $this->ci = & get_instance();
        $this->ci->load->helper('form');
        switch ($type) {
            case 'search':
                $_type = 'data-live-search="true"';
                break;
            case 'none':
                $_type = '';
                break;
        }
        $option[''] = $string;
        foreach ($data as $key => $value) {
            $option[$key] = $value;
        }

        $extra = 'id="' . $name . '" class="form-control selectpicker" ' . $_type;
        $result = form_dropdown($name, $option, $default, $extra);
        unset($option);
        return $result;
    }

    public function guardar_imagen($documento, $directorio, $marca = array('marca' => '', 'tipo' => 'string'), $tamaño = 1024,$proyecto) {
        $i = 1;
        $this->ci = & get_instance();
        $this->ci->load->library('imagen');
        $this->ci->load->library('url_comp');
        $nomnre_proyecto = $this->ci->url_comp->convertir_url($proyecto);
        $this->ci->imagen->ready_listo($documento['tmp_name'], TRUE);
        $this->ci->imagen->cambiarToancho($tamaño);
        if ($marca['marca'] != '' && $marca['tipo'] == 'string') {
            $this->ci->imagen->stringMarcadeagua($marca['marca'], 70, 'FFFFFF', 'bottom right', 10, 10);
        }
        if ($marca['marca'] != '' && $marca['tipo'] == 'image') {
            $this->ci->imagen->imgenMarcadeagua($marca['marca'], 70, 'bottom right', 10, 10);
        }
        $nombre_completo = explode('.', $documento['name']);
        $nombre = strtolower(current($nombre_completo));
        $option = array(' ','_',',');
        $n_nombre=  $this->ci->url_comp->convertir_url($nombre);
        $extencion = strtolower(end($nombre_completo));
        $resultado = $nomnre_proyecto . '-' . $n_nombre . '-' . time() . '.' . $extencion;
        $this->ci->imagen->guardar('./' . $directorio . '/' . $resultado);
        return $resultado;
    }

    public function guardar_multiple_imagenes($documento, $directorio, $marca = array('marca' => '', 'tipo' => 'string'), $tamaño = 1024) {
        $i = 1;
        $this->ci = & get_instance();
        $this->ci->load->library('imagen');
        $this->ci->config->load('exportando', TRUE, TRUE);
        $nomnre_proyecto = str_replace(' ', '_', strtolower($this->ci->config->item('proyecto', 'exportando')));
        for ($i = 0; $i < count($documento['tmp_name']); $i++) {
            $this->ci->imagen->ready_listo($documento['tmp_name'][$i], TRUE);
            $this->ci->imagen->cambiarToancho($tamaño);
            if ($marca['marca'] != '' && $marca['tipo'] == 'string') {
                $this->ci->imagen->stringMarcadeagua($marca['marca'], 70, 'FFFFFF', 'bottom right', 10, 10);
            }
            if ($marca['marca'] != '' && $marca['tipo'] == 'image') {
                $this->ci->imagen->imgenMarcadeagua($marca['marca'], 70, 'bottom right', 10, 10);
            }
            $nombre_completo = explode('.', $documento['name'][$i]);
            $nombre = strtolower(current($nombre_completo));
            $n_nombre=  str_replace(' ', '-', $nombre);
            $extencion = strtolower(end($nombre_completo));
            $resultado = $nomnre_proyecto . '-' . $n_nombre . '-' . $n_ni . '.' . $extencion;
            if (file_exists($directorio . '/' . $resultado)) {
                $pos = strpos($resultado, '.');
                $ni = (int) substr($resultado, $pos - 1, 1);
                $n_ni = $ni + 1;
                $resultado = $nomnre_proyecto . '-' . $n_nombre . '-' . $n_ni . '.' . $extencion;
            }
            $this->ci->imagen->guardar('./' . $directorio . '/' . $resultado);
            $data[] = $resultado;
        }

        return $data;
    }

    public function estructura($array, $value = FALSE) {
        //function structure
        if ($value === FALSE) {
            echo "<pre>";
            print_r($array);
            echo "</pre>";
        } else {
            var_dump($array);
        }
    }

    public function checked_extention($file, $extention = 'jpeg|jpg|png|gif') {
        $file_name = strtolower($file);
        $data = explode('|', $extention);
        $ext = array();
        foreach ($data as $items) {
            $ext[] = trim($items);
        }
        $list_white = $ext;
        $list_black = array('php', 'php3', 'php4', 'phtml', 'exe');
        $tmp = explode('.', $file_name);
        $file_extention = strtolower(end($tmp));
        if (!in_array($file_extention, $list_white)) {
            return FALSE;
        } elseif (in_array($file_extention, $list_black)) {
            return FALSE;
        }
        return TRUE;
    }

    public function eliminar_imagen($archivo, $directorio) {
        if (!file_exists('./' . $directorio . '/' . $archivo)) {
            return FALSE;
        } else {
            @unlink('./' . $directorio . '/' . $archivo);
            return TRUE;
        }
    }

    public function aleatorio($longitud = 40, $lowercase = TRUE, $uppercase = FALSE, $numero = TRUE, $caracter_especuial = FALSE) {
        $source = '';
        if ($lowercase === TRUE) {
            $source .= 'abcdefghijklmnopqrstuvwxyz';
        }
        if ($uppercase === TRUE) {
            $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($numero === TRUE) {
            $source .= '1234567890';
        }
        if ($caracter_especuial === TRUE) {
            $source .= '|@#~$%()=^*+[]{}-_';
        }
        if ($longitud > 0) {
            $rstr = "";
            $source = str_split($source, 1);
            for ($i = 1; $i <= $longitud; $i++) {
                mt_srand((double) microtime() * 1000000);
                $num = mt_rand(1, count($source));
                $rstr .= $source[$num - 1];
            }
        }
        return $rstr;
    }

    public static function youtube($url) {
        $dato = parse_url($url);
        $query = @explode("=", $dato['query']);
        if (isset($query[1]) && $query[1] != "") {
            return $query[1];
        }
        return false;
    }

    public function getSubString($string, $length=NULL){
        //Si no se especifica la longitud por defecto es 50
        if ($length == NULL)
            $length = 50;
        //Primero eliminamos las etiquetas html y luego cortamos el string
        $stringDisplay = substr(strip_tags($string), 0, $length);
        //Si el texto es mayor que la longitud se agrega puntos suspensivos
        if (strlen(strip_tags($string)) > $length)
            $stringDisplay .= ' ...';
        return $stringDisplay;
    }

}
