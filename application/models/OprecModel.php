<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OprecModel extends CI_Model
{
    public function getDataCalas()
    {
        $this->db->select('tb_peserta.*, tb_jurusan.jurusan AS nama_jurusan');
        $this->db->from('tb_peserta');
        $this->db->join('tb_jurusan', 'tb_peserta.jurusan = tb_jurusan.id');
        $query = $this->db->get();
        return $query->result_array();
    }
}
