<?php

class Documento {

    public function crear_thumb($avatar, $source, $width, $height, $type = 'resize') {
        $this->ci = & get_instance();
        $this->ci->load->library('image_lib');
        $pre_name = explode('.', $avatar);
        $name = $pre_name[0];
        $extention = end(explode('.', $avatar));
        $new_name = $name . '-' . $width . 'x' . $height . '.' . $extention;
        $config['image_library'] = 'gd2';
        $config['new_image'] = './public/image/' . $source . '/thumbs/' . $new_name;
        $config['source_image'] = './public/image/' . $source . '/' . $name . '.' . $extention;
        $config['thumb_marker'] = '';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['master_dim'] = 'auto';
        $config['quality'] = '100%';
        $this->ci->image_lib->clear();
        if ($type == 'resize') {
            $config['width'] = $width;
            $config['height'] = $height;
            $this->ci->image_lib->initialize($config);
            $this->ci->image_lib->resize();
        } elseif ($type == 'crop') {
            $config['x_axis'] = $width;
            $config['y_axis'] = $height;
            $this->ci->image_lib->initialize($config);
            $this->ci->image_lib->crop();
        }
        return $new_name;
    }

    public function random($length = 40, $lowercase = TRUE, $uppercase = FALSE, $number = TRUE, $specialchar = FALSE) {
        //
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

    public function tipo_documento($file, $type = 'single') {
        //function file
        switch ($type) {
            case 'single':
                if (isset($_FILES[$file]['tmp_name']) &&
                        $_FILES[$file]['tmp_name'] != '') {
                    $value = $_FILES[$file];
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
                if (isset($_FILES[$file]['tmp_name'][0]) &&
                        $_FILES[$file]['tmp_name'][0] != '') {
                    $values = $_FILES[$file];
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

    public function guardar_imagen($documento, $directory, $mark = array('mark' => '', 'type' => 'string'), $resize = 1024) {
        $this->ci = & get_instance();
        $this->ci->load->library('image');
        $this->ci->image->ready($documento['tmp_name'], TRUE);
        $this->ci->image->resizeToWidth($resize);
        if ($mark['mark'] != '' && $mark['type'] == 'string') {
            $this->ci->image->stringWatermark($mark['mark'], 70, 'FFFFFF', 'bottom right', 10, 10);
        }
        if ($mark['mark'] != '' && $mark['type'] == 'image') {
            $this->ci->image->imgWatermark($mark['mark'], 70, 'bottom right', 10, 10);
        }
        $full_name = explode('.', $documento['name']);
        $extencion = strtolower(end($full_name));
        $result = $this->random() . '.' . $extencion;
        $this->ci->image->save('./' . $directory . '/' . $result);
        return $result;
    }

    public function guardar_multiple_imagenes($documento, $direccion, $mark = array('mark' => '', 'type' => 'string'), $resize = 1024) {
        $this->ci = & get_instance();
        $this->ci->load->library('image');
        for ($i = 0; $i < count($documento['tmp_name']); $i++) {
            $this->ci->image->ready($documento['tmp_name'][$i], TRUE);
            $this->ci->image->resizeToWidth($resize);
            if ($mark['mark'] != '' && $mark['type'] == 'string') {
                $this->ci->image->stringWatermark($mark['mark'], 70, 'FFFFFF', 'bottom right', 10, 10);
            }
            if ($mark['mark'] != '' && $mark['type'] == 'image') {
                $this->ci->image->imgWatermark($mark['mark'], 70, 'bottom right', 10, 10);
            }
            $full_name = explode('.', $documento['name'][$i]);
            $extencion = strtolower(end($full_name));
            $result = $this->random() . '.' . $extencion;
            $this->ci->image->save('./' . $direccion . '/' . $result);
            $data[] = $result;
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

    public function save_documento($file, $route, $size = 5) {
        $this->ci = & get_instance();
        $this->ci->load->library('file');
        $this->ci->load->library('url_comp');
        $archive = $file['name'];
        $weight = $file['size'];
        $tmp = $file['tmp_name'];
        $nombre_completo = explode('.', $archive);
        $nombre = strtolower(current($nombre_completo));
        $option = array(' ',',');
        $old_nombre = $this->ci->url_comp->convertir_url($nombre);
        $new_name = $old_nombre . '-' . time();

        $this->ci->file->loadFile($archive, $route, $weight, $tmp, $new_name, $size);
        $result = $this->ci->file->uploadFile();
        return $result;
    }

    public function generar_pdf($titulo='',$subtitulo='',$autor='',$archivo='',$html=''){
        $this->CI = & get_instance();
        $this->CI->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor($autor);
        $pdf->SetTitle($titulo);
        $pdf->SetSubject($subtitulo);
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 
        // datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf -> setHeaderData ('', 0, '', '', array (0, 0, 0), array (255, 255,  255));  
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->setHeaderMargin('10');
 
        // se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
        // se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
 
        // se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
        //relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
 
        // ---------------------------------------------------------
        // establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);
 
        // Establecer el tipo de letra
 
        //Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
        // Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('helvetica', '', 10, '', true);
 
        // Añadir una página
        // Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
 
        //fijar efecto de sombra en el texto
        //$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
  
        // Imprimimos el texto con writeHTMLCell()
        //$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        $pdf->writeHTML($html, true, false, true, false, '');
 
        // ---------------------------------------------------------
        // Cerrar el documento PDF y preparamos la salida
        // Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode($archivo.".pdf");
        $pdf->Output($nombre_archivo, 'I');
    
    }

}
