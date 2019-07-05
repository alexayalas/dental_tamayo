<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_tag extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('tag');
        parent::setAlias('t');
        parent::setTabla_id('idtag');
    }

    public function get_query() {
        $this->CI->db->select("t.idtag, t.nombre, t.url, t.fecha_registro, t.visitas, t.oculto");
        $this->CI->db->from($this->tabla . " t");
    }

    public function agregar_visita($id) {
        $stm = $this->CI->db->select(''
                        . 'tag.visitas AS p_visit')
                ->from('tag')
                ->where('tag.idtag', $id)
                ->get()
                ->result();
        $data = array(
            'visitas' => $stm[0]->p_visit + 1
        );
        if ($this->CI->db->where('tag.idtag', $id)->update('tag', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
