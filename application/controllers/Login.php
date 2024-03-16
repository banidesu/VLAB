<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('username', 'Nama Pengguna', 'required|trim', [
            'required' => '{field} wajib diisi'
        ]);
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim', [
            'required' => '{field} wajib diisi'
        ]);

        if ($this->form_validation->run() === false) {
            $data['judul'] = 'Login';
            $this->load->view('home/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $user = $this->db->get_where('tb_admin', ['username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><b>Berhasil:</b> Selamat Datang!</div>');

                $data['judul'] = 'Login';
                $this->load->view('home/login', $data);
                
                header('refresh:2;url=admin');
                $this->session->set_userdata('username', $username);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Gagal:</b> Password salah!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Gagal:</b> Username tidak ditemukan!</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><b>Berhasil:</b> Anda telah Log Out!</div>');
        redirect('login');
    }
}
