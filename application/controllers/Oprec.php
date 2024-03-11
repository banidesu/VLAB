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
                'field' => 'tempat-lahir',
                'label' => 'Tempat lahir',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} harap diisi'
                ]
            ],
            [
                'field' => 'tanggal-lahir',
                'label' => 'Tanggal lahir',
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
            ]
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

        $data_calas = [
            'nama' => htmlspecialchars($this->input->post('name'), true),
            'npm' => htmlspecialchars($this->input->post('npm', true)),
            'kelas' => htmlspecialchars($this->input->post('class', true)),
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
            'region' => htmlspecialchars($this->input->post('region', true)),
            'penempatan' => htmlspecialchars($this->input->post('placement', true)),
            'agama' => htmlspecialchars($this->input->post('agama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
            'alamat' => htmlspecialchars($this->input->post('address', true)),
            'ttl' => htmlspecialchars($this->input->post('tempat-lahir', true)) . ' ' . htmlspecialchars($this->input->post('tanggal-lahir', true)),
            'sosmed' => htmlspecialchars($this->input->post('sosmed', true))
        ];

        $files = ['cv', 'krs', 'transkrip_nilai'];
        $upload_errors = [];

        // Load library upload
        $this->load->library('upload');

        if ($_FILES['cv']['name'] && $_FILES['krs']['name'] && $_FILES['transkrip_nilai']['name']) {

            foreach ($files as $file) {
                // Configuration for uploading file
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '1024'; // 1 MB
                $config['upload_path'] = './assets/uploads/pdf/oprec';
                $config['file_name'] = uniqid();
                $this->upload->initialize($config);

                if ($this->upload->do_upload($file)) {
                    // File uploaded successfully
                    $upload_data = $this->upload->data();
                    $data_calas[$file] = $upload_data['file_name'];
                } else {
                    $upload_errors[$file] = $this->upload->display_errors();
                }
            }

            if ($upload_errors) {
                foreach ($upload_errors as $file => $error) {
                    $this->session->set_flashdata('message', "<div class='alert alert-danger'><div class='container-fluid'><div class='alert-icon'><i class='material-icons'>error_outline</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button><b>Error Alert:</b> $error</div></div>");
                }
                redirect('oprec');
            } else {
                if ($this->db->insert('tb_peserta', $data_calas)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success"><div class="container-fluid"><div class="alert-icon"><i class="material-icons">check</i></div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button><b>Berhasil:</b> Tolong cek email anda untuk memastikan data anda!</div></div>');
                    redirect('oprec');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger"><div class="container-fluid"><div class="alert-icon"><i class="material-icons">error_outline</i></div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button><b>Error Alert:</b> Terjadi kesalahan...</div></div>');
                    redirect('oprec');
                }
            }
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
