<?php

require_once APPPATH . 'libraries/Modelo_DB.php';

class M_tag_publicacion extends Modelo_DB {

    public function __construct() {
        parent::__construct();
        parent::setTabla('tag_publicacion');
        parent::setAlias('tp');
        parent::setTabla_id('idtagpublicacion');
    }

    public function get_query() {
        $this->CI->db->select("tp.idtagpublicacion, tp.idtag, tp.idpublicacion, tp.oculto, t.nombre as tag, t.url"
                            ." as urltag, p.titulo, p.visitas as visitaspub, p.url as urlpub, p.imagen, p.fecha_registro"
                            ." as fechapub, p.descripcion_corta as cortapub");
        $this->CI->db->from($this->tabla . " tp");
        $this->CI->db->join("tag t", "t.idtag = tp.idtag", "inner");
        $this->CI->db->join("publicacion p", "p.idpublicacion = tp.idpublicacion", "inner");
    }

}
