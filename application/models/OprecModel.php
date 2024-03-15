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

    public function getDataDepok()
    {
        $this->db->select('COUNT(*) as count');
        $this->db->from('tb_peserta');
        $this->db->where('region', 'Depok');
        $this->db->join('tb_jurusan', 'tb_peserta.jurusan = tb_jurusan.id');
        $query = $this->db->get();
        return $query->row()->count;
    }

    public function getDataKalmal()
    {
        $this->db->select('COUNT(*) as count');
        $this->db->from('tb_peserta');
        $this->db->where('region', 'Kalimalang');
        $this->db->join('tb_jurusan', 'tb_peserta.jurusan = tb_jurusan.id');
        $query = $this->db->get();
        return $query->row()->count;
    }
    public function getDataSalemba()
    {
        $this->db->select('COUNT(*) as count');
        $this->db->from('tb_peserta');
        $this->db->where('region', 'Salemba');
        $this->db->join('tb_jurusan', 'tb_peserta.jurusan = tb_jurusan.id');
        $query = $this->db->get();
        return $query->row()->count;
    }
    public function getDataKarawaci()
    {
        $this->db->select('COUNT(*) as count');
        $this->db->from('tb_peserta');
        $this->db->where('region', 'Karawaci');
        $this->db->join('tb_jurusan', 'tb_peserta.jurusan = tb_jurusan.id');
        $query = $this->db->get();
        return $query->row()->count;
    }
    public function getDataCengkareng()
    {
        $this->db->select('COUNT(*) as count');
        $this->db->from('tb_peserta');
        $this->db->where('region', 'Cengkareng');
        $this->db->join('tb_jurusan', 'tb_peserta.jurusan = tb_jurusan.id');
        $query = $this->db->get();
        return $query->row()->count;
    }
}
