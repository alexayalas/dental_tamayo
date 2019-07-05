<?php

class Url_comp {

    public function direccionar($url) {
        $string = '<script>location.href="';
        $string .= $url;
        $string .= '"</script>';
        return $string;
    }

    public function actualizar() {
        $string = '<script>';
        $string .= 'parent.location.reload()';
        $string .= '</script>';
        return $string;
    }

    public function actualizar_tiempo($tiempo = 3000) {
        $string = '<script>';
        $string .= 'setTimeout(function(){ parent.location.reload() }, ' . $tiempo . ');';
        $string .= '</script>';
        return $string;
    }

    public function direccionar_tiempo($url, $tiempo = 3000) {
        $string = '<script>';
        $string .= 'setTimeout(function(){ parent.location.href="';
        $string .= $url;
        $string .='" }, ' . $tiempo . ');';
        $string .= '</script>';
        return $string;
    }

//    public function eliminar_imagen($documento, $direccion) {
//        if (!file_exists('./'.$direccion.'/'.$documento)) {
//            return FALSE;
//        } else {
//            @unlink('./'.$direccion.'/'.$documento);
//            return TRUE;
//        }
//    }

    public static function convertir_url($string) {
        $url = strtolower($string);
        $b = array("á", "Á", "é", "É", "í", "Í", "ó", "Ó", "ú", "Ú", "ñ", "Ñ");
        $c = array("a", "a", "e", "e", "i", "i", "o", "o", "u", "u", "n", "n");
        $string = str_replace($b, $c, $url);
        $spacer = "-";
        $string = trim($string);
        $string = strtolower($string);
        $string = trim(@ereg_replace("[^ A-Za-z0-9_]", " ", $string));
        $string = @ereg_replace("[ \t\n\r]+", "-", $string);
        $string = str_replace(" ", $spacer, $string);
        $string = @ereg_replace("[ -]+", "-", $string);
        return $string;
    }

//     public function validar_email($email) {
//        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//            return TRUE;
//        } else {
//            return FALSE;
//        }
//    }
}
