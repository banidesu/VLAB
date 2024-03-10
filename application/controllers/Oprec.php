<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oprec extends CI_Controller
{

    public function index()
    {
        $jurusans = $this->db->get("tb_jurusan");
        $data['jurusans'] = $jurusans->result_array();
        $data['judul'] = "Registrasi Lab Manajemen Menengah";

        $rules = [
            [
                'field' => 'name',
                'label' => 'Nama Lengkap',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'npm',
                'label' => 'NPM',
                'rules' => 'required|trim|numeric|exact_length[8]'
            ],
            [
                'field' => 'class',
                'label' => 'Kelas',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'jurusan',
                'label' => 'Jurusan',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'region',
                'label' => 'Region',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'placement',
                'label' => 'Penempatan',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email'
            ],
            [
                'field' => 'no_telp',
                'label' => 'No HP',
                'rules' => 'required|trim|numeric|min_length[12]|max_length[13]'
            ],
            [
                'field' => 'address',
                'label' => 'Alamat',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'ttl',
                'label' => 'TTL',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'cv',
                'label' => 'CV',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'krs',
                'label' => 'KRS',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'nilai',
                'label' => 'Transkrip Nilai',
                'rules' => 'required|trim'
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            $this->load->view('oprec/index', $data);
        } else {
            echo "yeaa";
        }
    }

    public function SubmitData()
    {
        var_dump($this->input->post());
    }
}
