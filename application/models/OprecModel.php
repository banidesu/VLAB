<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OprecModel extends CI_Model
{
    public function getAllDataCalas()
    {
        $this->db->select('tb_peserta.*, tb_jurusan.jurusan AS nama_jurusan');
        $this->db->from('tb_peserta');
        $this->db->join('tb_jurusan', 'tb_peserta.jurusan = tb_jurusan.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataCalas($id)
    {
        $this->db->select('tb_peserta.*, tb_jurusan.jurusan AS nama_jurusan');
        $this->db->from('tb_peserta');
        $this->db->where('tb_peserta.id', $id);
        $this->db->join('tb_jurusan', 'tb_peserta.jurusan = tb_jurusan.id');
        $query = $this->db->get();
        return $query->row_array();
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

    public function save_period_data($data)
    {
        return ($this->db->insert('tb_period', $data)) ? true : false;
    }

    public function getAllPeriod()
    {
        return $this->db->get('tb_period')->result_array();
    }

    public function getPeriodActive()
    {
        return $this->db->get_where('tb_period', ['is_active' => 1])->row_array();
    }
    public function changeactiveperiod($id)
    {
        $this->db->update('tb_period', ['is_active' => 0]);

        $result = $this->db->update('tb_period', ['is_active' => 1], ['id' => $id]);

        return $result ? true : false;
    }
    public function closeOprec()
    {
        $result = $this->db->update('tb_period', ['is_active' => 0]);

        return $result ? true : false;
    }
}
