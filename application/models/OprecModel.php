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

    public function getCalasPerDivisiPerRegion($region, $divisi)
    {
        $this->db->select('tb_peserta.*, tb_jurusan.jurusan AS nama_jurusan');
        $this->db->from('tb_peserta');

        ($region == "Depok") ? $this->db->where_not_in('region', 'Kalimalang') : $this->db->where('region', $region);

        $this->db->where('penempatan', $divisi);
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
        // Menghapus semua isi dari tabel tb_period
        $result_period = $this->db->empty_table('tb_period');

        // Menghapus semua isi dari tabel tb_hasil
        $result_hasil = $this->db->empty_table('tb_hasil');

        // Menghapus semua file yang terkait dengan setiap nama file dalam folder assets/uploads/oprec/result
        $path = FCPATH . 'assets/uploads/oprec/result/';
        $files = glob($path . '*'); // Mengambil semua file dalam folder
        $result_files = true; // Defaultnya true, karena belum ada file yang gagal dihapus

        foreach ($files as $file) {
            if (is_file($file)) {
                if (!unlink($file)) { // Menghapus file
                    $result_files = false; // Mengubah nilai result jika ada file yang gagal dihapus
                }
            }
        }

        // Mengembalikan nilai berdasarkan keberhasilan semua proses
        return ($result_period && $result_hasil && $result_files) ? true : false;
    }
    public function getHasilSeleksi()
    {
        $this->db->select('tb_hasil.*, tb_hasil.id AS hasil_id, tb_hasil.is_active AS hasil_active, tb_hasil.period_id AS hasil_period_id, tb_period.*');
        $this->db->from('tb_hasil');
        $this->db->join('tb_period', 'tb_hasil.period_id = tb_period.id');
        return $this->db->get()->result_array();
    }
    public function getHasilSeleksiActive()
    {
        $this->db->select('tb_hasil.*, tb_hasil.id AS hasil_id, tb_hasil.is_active AS hasil_active, tb_hasil.period_id AS hasil_period_id, tb_period.*');
        $this->db->from('tb_hasil');
        $this->db->where('tb_hasil.is_active', 1);
        $this->db->join('tb_period', 'tb_hasil.period_id = tb_period.id');
        return $this->db->get()->result_array();
    }
    public function save_hasil_seleksi($data)
    {
        $data['is_active'] = 1;
        $result = $this->db->insert('tb_hasil', $data);

        return $result ? true : false;
    }
    public function changeIsActiveHasil($id)
    {
        $hasil_sebelumnya = $this->db->get_where('tb_hasil', ['id' => $id])->row();
        $is_active_sebelumnya = $hasil_sebelumnya->is_active;

        $new_is_active = ($is_active_sebelumnya == 1) ? 0 : 1;

        $result = $this->db->update('tb_hasil', ['is_active' => $new_is_active], ['id' => $id]);

        return $result ? true : false;
    }
    public function fixLastPeriod()
    {
        $existingEndPeriod = $this->db->get_where('tb_period', ['title' => 'end'])->row();

        if ($existingEndPeriod) {
            $result = $this->db->delete('tb_period', ['id' => $existingEndPeriod->id]);

            $lastPeriod = $this->db->order_by('id', 'DESC')->get('tb_period', 1)->row();

            if ($lastPeriod) {
                $this->db->update('tb_period', ['is_active' => 1], ['id' => $lastPeriod->id]);
            }
        } else {
            $this->db->update('tb_period', ['is_active' => 0]);

            $data = [
                'period_id' => 2,
                'title' => 'end',
                'description' => 'end',
                'date_start' => '-',
                'date_end' => '-',
                'is_active' => 1
            ];
            $result = $this->db->insert('tb_period', $data);
        }
        return $result ? true : false;
    }
}
