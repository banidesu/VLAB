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
        $data['calas'] = $this->OprecModel->getAllDataCalas();

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

        $data['periode_active'] = $this->OprecModel->getPeriodActive();

        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/templates/sidebar', $data);
        $this->load->view('dashboard/templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('dashboard/templates/footer');
    }

    public function show($id)
    {
        if (!$this->session->userdata('username')) {
            redirect('login');
        }

        $data['judul'] = 'Show';
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['calas'] = $this->OprecModel->getDataCalas($id);

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/templates/sidebar', $data);
        $this->load->view('dashboard/templates/topbar', $data);
        $this->load->view('dashboard/show', $data);
        $this->load->view('dashboard/templates/footer');
    }

    public function period()
    {
        if (!$this->session->userdata('username')) {
            redirect('login');
        }


        if ($this->input->is_ajax_request()) {

            // Set validation rules
            $this->form_validation->set_rules('title', 'Judul', 'required', [
                'required' => '{field} harus diisi.'
            ]);
            $this->form_validation->set_rules('description', 'Deskripsi', 'required', [
                'required' => '{field} harus diisi.'
            ]);
            $this->form_validation->set_rules('period_id', 'Kategori', 'required', [
                'required' => '{field} harus diisi.'
            ]);
            $this->form_validation->set_rules('date1', 'Periode Mulai', 'required', [
                'required' => '{field} harus diisi.'
            ]);
            $this->form_validation->set_rules('date2', 'Periode Berakhir', 'required', [
                'required' => '{field} harus diisi.'
            ]);

            // Run validation
            if ($this->form_validation->run() == FALSE) {
                // Validation failed
                $errors = [
                    'title' => form_error('title'),
                    'description' => form_error('description'),
                    'period_id' => form_error('period_id'),
                    'date1' => form_error('date1'),
                    'date2' => form_error('date2')
                ];
                echo json_encode(['status' => 'error', 'message' => $errors]);
                return;
            } else {
                $title = htmlspecialchars($this->input->post('title', true));
                $description = htmlspecialchars($this->input->post('description', true));
                $period_id = $this->input->post('period_id', true);
                $date1 = date_create($this->input->post('date1', true));
                $date2 = date_create($this->input->post('date2', true));

                $data = [
                    'title' => $title,
                    'description' => $description,
                    'description' => $period_id,
                    'date_start' => date_format($date1, 'd M Y'),
                    'date_end' => date_format($date2, 'd M Y'),
                    'is_active' => 0
                ];

                $result = $this->OprecModel->save_period_data($data);

                if ($result) {
                    // Data saved successfully
                    echo json_encode(['status' => 'success', 'message' => 'Data periode berhasil ditambahkan']);
                } else {
                    // Failed to save data
                    echo json_encode(['status' => 'error', 'message' => 'Failed to save data']);
                }
                return;
            }
        }

        $data['judul'] = 'Periode';
        $data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['periodes'] = $this->OprecModel->getAllPeriod();

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/templates/sidebar', $data);
        $this->load->view('dashboard/templates/topbar', $data);
        $this->load->view('dashboard/period', $data);
        $this->load->view('dashboard/templates/footer');
    }

    public function changeactiveperiod()
    {
        $id = $this->input->post('id');
        $result = $this->OprecModel->changeactiveperiod($id);

        if ($result) {
            // Data updated successfully
            echo json_encode(['status' => 'success', 'message' => 'Data periode berhasil diaktifkan']);
        } else {
            // Failed to update data
            echo json_encode(['status' => 'error', 'message' => 'Failed to update data']);
        }
        return;
    }
}
