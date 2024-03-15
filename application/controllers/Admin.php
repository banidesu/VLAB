<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('OprecModel');
    }

    public function index()
    {
        if (!$this->session->userdata('username')) {
            redirect('login');
        }

        // Ngambil semua data calas
        $data['calas'] = $this->OprecModel->getDataCalas();

        // Ngambil jumlah calas yang dari depok
        $data['depok'] = $this->OprecModel->getDataDepok();
        // Ngambil jumlah calas yang dari kalmal
        $data['kalmal'] = $this->OprecModel->getDataKalmal();
        // Ngambil jumlah calas yang dari salemba
        $data['salemba'] = $this->OprecModel->getDataSalemba();
        // Ngambil jumlah calas yang dari karawaci
        $data['karawaci'] = $this->OprecModel->getDataKarawaci();
        // Ngambil jumlah calas yang dari cengkareng
        $data['cengkareng'] = $this->OprecModel->getDataCengkareng();

        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/templates/sidebar', $data);
        $this->load->view('dashboard/templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('dashboard/templates/footer');
    }
}
