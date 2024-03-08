<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oprec extends CI_Controller
{

    public function index()
    {
        $jurusans = $this->db->get("tb_jurusan");
        $data['jurusans'] = $jurusans->result_array();
        // var_dump($data['jurusans']);
        $data['judul'] = "Registrasi Lab Manajemen Menengah";
        $this->load->view('oprec/index', $data);
    }
}
