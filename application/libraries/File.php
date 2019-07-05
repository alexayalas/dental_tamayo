<?php

/*
 * @param String    $archivo            Archivo a manipular
 * @param String    $directorio         Directorio de destino del archivo 
 * @param String    $tipoArchivo        Extensión que identifica el nombre del archivo
 * @param Array     $tipoPermitido     	Arreglo con las extensiones permitidas
 * @param int       $tamanoArchivo      Tamaño del archivo (en bytes)
 * @param String    $tmp                Directorio temporal de localización del archivo
 * @param String    $nombre             Nombre del archivo a manipular
 * @param int       $tamanoMaximo       Máximo tamañoo aceptado 
 */

class File {

    private $archivo;
    private $directorio;
    private $tipoArchivo;
    private $tamanoArchivo;
    private $tmp;
    private $nombre;
    private $tamanoMaximo;

    public function __construct() {
        
    }

    public function loadFile($archivo, $dir, $tamano, $tmp, $nombre = '', $tamPermitido = '') {
        $this->archivo = $archivo;
        $this->directorio = $dir;
        $this->tipoArchivo = $this->getTipoArchivo($archivo);
        $this->tamanoArchivo = $tamano;
        $this->nombre = empty($nombre) ? str_replace("." . $this->tipoArchivo, "", $archivo) : $nombre;
        $this->tamanoMaximo = empty($tamPermitido) ? ini_get('upload_max_filesize') * 1048576 : $tamPermitido * 1048576;
        $this->tmp = $tmp;
    }

    /*
     * Devuelve la extensión de un archivo
     */

    private function getTipoArchivo($archivo) {
        if ($archivo != '') {
            $extension = explode('.', $archivo);
            return end($extension);
        }
    }

    /*
     * Revisa si el archivo es del tamaño permitido
     */

    private function checkSize() {
        if ($this->tamanoArchivo > $this->tamanoMaximo) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*
     * Sube los archivos
     */

    public function uploadFile() {
        if ($this->checkSize() === FALSE) {
            return 'El tamaño es más de ' . round(($this->tamanoMaximo / 1048576), 2) . ' MB.';
        } elseif (file_exists($this->directorio . '/' . $this->archivo)) {
            return 'El archivo ya existe.';
        } else {
            move_uploaded_file($this->tmp, $this->directorio . '/' . $this->nombre . "." . $this->tipoArchivo);
            return $this->nombre . "." . $this->tipoArchivo;
        }
    }

    /*
     * Borra el archivo del servidor
     */

    public function delFile() {
        if (file_exists($this->directorio . '/' . $this->archivo)) {
            unlink($this->directorio . '/' . $this->archivo);
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
