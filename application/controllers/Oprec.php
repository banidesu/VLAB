<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oprec extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $jurusans = $this->db->get("tb_jurusan");
        $data['jurusans'] = $jurusans->result_array();
        $data['judul'] = "Registrasi Lab Manajemen Menengah";

        $rules = [
            [
                'field' => 'name',
                'label' => 'Nama Lengkap',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} harap diisi'
                ]
            ],
            [
                'field' => 'npm',
                'label' => 'NPM',
                'rules' => 'required|trim|numeric|exact_length[8]',
                'errors' => [
                    'required' => '{field} harap diisi',
                    'numeric' => '{field} tidak valid',
                    'exact_length' => '{field} harus {param} digit'
                ]
            ],
            [
                'field' => 'class',
                'label' => 'Kelas',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} harap diisi'
                ]
            ],
            [
                'field' => 'jurusan',
                'label' => 'Jurusan',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} harap diisi'
                ]
            ],
            [
                'field' => 'region',
                'label' => 'Region',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} harap diisi'
                ]
            ],
            [
                'field' => 'placement',
                'label' => 'Penempatan',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} harap diisi'
                ]
            ],
            [
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} harap diisi'
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email',
                'errors' => [
                    'required' => '{field} harap diisi',
                    'valid_email' => 'Alamat {field} tidak valid'
                ]
            ],
            [
                'field' => 'no_telp',
                'label' => 'No HP',
                'rules' => 'required|trim|numeric|min_length[12]|max_length[13]',
                'errors' => [
                    'required' => '{field} harap diisi',
                    'numeric' => '{field} tidak valid',
                    'min_length' => '{field} minimal {param} digit',
                    'max_length' => '{field} maksimal {param} digit'
                ]
            ],
            [
                'field' => 'address',
                'label' => 'Alamat',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} harap diisi'
                ]
            ],
            [
                'field' => 'ttl',
                'label' => 'TTL',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} harap diisi'
                ]
            ],
            [
                'field' => 'sosmed',
                'label' => 'Sosial Media',
                'rules' => 'required|trim|valid_url',
                'errors' => [
                    'required' => '{field} harap diisi',
                    'valid_url' => '{field} URL tidak valid'
                ]
            ],
            // [
            //     'field' => 'cv',
            //     'label' => 'CV',
            //     'rules' => 'required|trim'
            // ],
            // [
            //     'field' => 'krs',
            //     'label' => 'KRS',
            //     'rules' => 'required|trim'
            // ],
            // [
            //     'field' => 'nilai',
            //     'label' => 'Transkrip Nilai',
            //     'rules' => 'required|trim'
            // ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            $this->load->view('oprec/index', $data);
        } else {
            $this->_submitData();
        }
    }

    private function _submitData()
    {
        $jurusans = $this->db->get("tb_jurusan");
        $data['jurusans'] = $jurusans->result_array();
        $data['judul'] = "Registrasi Lab Manajemen Menengah";

        $data2 = [
            'name' => htmlspecialchars($this->input->post('name'), true),
            'npm' => htmlspecialchars($this->input->post('npm', true)),
            'class' => htmlspecialchars($this->input->post('class', true)),
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
            'region' => htmlspecialchars($this->input->post('region', true)),
            'placement' => htmlspecialchars($this->input->post('placement', true)),
            'agama' => htmlspecialchars($this->input->post('agama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
            'address' => htmlspecialchars($this->input->post('address', true)),
            'ttl' => htmlspecialchars($this->input->post('ttl', true)),
        ];

        $cv = $_FILES['cv']['name'];
        $krs = $_FILES['krs']['name'];
        $nilai = $_FILES['nilai']['name'];

        if ($cv && $krs && $nilai) {
            var_dump("OKE");
            die;
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><div class="container-fluid"><div class="alert-icon"><i class="material-icons">error_outline</i></div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button><b>Error Alert:</b> Please upload all required files...</div></div>');
            $this->load->view('oprec/index', $data);
        }
    }

    public function result()
    {
        $this->load->view('result/index');
    }
}
