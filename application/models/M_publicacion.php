<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_publicacion extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('publicacion');
        parent::setAlias('p');
        parent::setTabla_id('idpublicacion');
    }

    public function get_query() {
        $this->CI->db->select("p.idpublicacion, p.titulo, p.url, p.descripcion_corta, p.descripcion_general, p.imagen,"
                            ." p.visitas, p.idautor, p.idcategoria, p.fecha_registro, p.fecha_modificacion, p.idusuario,"
                            ." p.oculto, c.nombre as categoria, a.nombre as autor, a.imagen as aimagen, a.descripcion "
                            ." as adescripcion, c.url as urlcat, p.titulo_seo");
        $this->CI->db->from($this->tabla . " p");
        $this->CI->db->join("categoria c", "c.idcategoria = p.idcategoria", "inner");
        $this->CI->db->join("autor a", "a.idautor = p.idautor", "inner");
    }

    public function agregar_visita($id) {
        $stm = $this->CI->db->select(''
                        . 'publicacion.visitas AS p_visit')
                ->from('publicacion')
                ->where('publicacion.idpublicacion', $id)
                ->get()
                ->result();
        $data = array(
            'visitas' => $stm[0]->p_visit + 1
        );
        if ($this->CI->db->where('publicacion.idpublicacion', $id)->update('publicacion', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
