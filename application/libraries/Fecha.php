<?php

class Fecha {

    //put your code here
    public function convertir_fecha_tiempo($date) {
        return strtotime($date);
    }

    public function dia($dia) {
        switch ($dia) {
            case 1: case 01: return "Lunes";
            case 2: case 02: return "Martes";
            case 3: case 03: return "Miércoles";
            case 4: case 04: return "Jueves";
            case 5: case 05: return "Viernes";
            case 6: case 06: return "Sábado";
            case 7: case 07: return "Domingo";
        }
    }

    public function mes($mes) {
        switch ($mes) {
            case 1: case 01: return "Enero";
            case 2: case 02: return "Febrero";
            case 3: case 03: return "Marzo";
            case 4: case 04: return "Abril";
            case 5: case 05: return "Mayo";
            case 6: case 06: return "Junio";
            case 7: case 07: return "Julio";
            case 8: case 08: return "Agosto";
            case 9: case 09: return "Septiembre";
            case 10: return "Octubre";
            case 11: return "Noviembre";
            case 12: return "Diciembre";
        }
    }

    public function convertir_tiempo_fecha($tiempo, $style = '') {
        date_default_timezone_set('America/Lima');
        $fecha = date('Y-m-d H:i:s a', $tiempo);
        $delimiter = explode(" ", $fecha);
        $date = explode("-", $delimiter[0]);
        $dia = $date[2];
        $mes = $date[1];
        $anio = $date[0];
        $tiempo = explode(":", $delimiter[1]);
        $segundos = $tiempo[2];
        $minuto = $tiempo[1];
        $hora = $tiempo[0];
        $meridiem = strtolower($delimiter[2]);
        if ($style == '') {
            return $fecha;
        } else {
            switch ($style) {
                case '1':
                    $string = $dia . ' de ' . $this->analizar_mes($mes);
                    break;
                case '2':
                    $string = $dia . ' de ' . $this->analizar_mes($mes) . ' del ' . $anio;
                    break;
                case '3':
                    $string = $this->analizar_mes($mes) . ' ' . $dia . ', ' . $anio;
                    break;
                case '4':
                    $string = $dia . ' ' . $this->analizar_mes($mes) . ' ' . $hora . ':' . $minuto . ' ' . $meridiem;
                    break;
                case 'date':
                    $string = $dia . '-' . $mes . '-' . $anio;
                    break;
                case 'datetime':
                    $string = $dia . '-' . $mes . '-' . $anio . ' ' . $hora . ':' . $minuto . ':' . $segundos;
                    break;
                default:
                    return $fecha;
            }
            return $string;
        }
    }

    public function analizar_mes($month) {
        switch ($month) {
            case 1: case 01: return "Enero";
            case 2: case 02: return "Febrero";
            case 3: case 03: return "Marzo";
            case 4: case 04: return "Abril";
            case 5: case 05: return "Mayo";
            case 6: case 06: return "Junio";
            case 7: case 07: return "Julio";
            case 8: case 08: return "Agosto";
            case 9: case 09: return "Septiembre";
            case 10: return "Octubre";
            case 11: return "Noviembre";
            case 12: return "Diciembre";
        }
    }

}
