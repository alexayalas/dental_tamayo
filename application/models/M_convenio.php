<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_convenio extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('convenio');
        parent::setAlias('c');
        parent::setTabla_id('idconvenio');
    }

    public function get_query() {
        $this->CI->db->select("c.idconvenio, c.nombre, c.imagen, c.fecha_registro, c.fecha_modificacion, c.idusuario, c.posicion, c.oculto");
        $this->CI->db->from($this->tabla . " c");
    }

    public function ordenar_posicion($order) {
        $images = $this->CI->db->select(''
                        . 'convenio.posicion AS posicion, '
                        . 'convenio.idconvenio AS s_id')
                ->from('convenio')
                ->order_by('convenio.posicion', 'asc')
                ->get()
                ->result();
        $i = 0;
        foreach ($images as $items) {
            $data = array(
                'posicion' => $order[$i]
            );
            $this->CI->db->where('idconvenio', $items->s_id)->update('convenio', $data);
            $i++;
        }
    }

}
