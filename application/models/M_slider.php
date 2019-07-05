<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_slider extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('slider');
        parent::setAlias('s');
        parent::setTabla_id('idslider');
    }

    public function get_query() {
        $this->CI->db->select("s.idslider, s.titulo1 , s.titulo2, s.subtitulo, s.imagen, s.fecha_registro,"
                            ." s.fecha_modificacion, s.posicion, s.idusuario, s.oculto");
        $this->CI->db->from($this->tabla . " s");
    }

    public function ordenar_posicion($order) {
        $images = $this->CI->db->select(''
                        . 'slider.posicion AS posicion, '
                        . 'slider.idslider AS s_id')
                ->from('slider')
                ->order_by('slider.posicion', 'asc')
                ->get()
                ->result();
        $i = 0;
        foreach ($images as $items) {
            $data = array(
                'posicion' => $order[$i]
            );
            $this->CI->db->where('idslider', $items->s_id)->update('slider', $data);
            $i++;
        }
    }

}
