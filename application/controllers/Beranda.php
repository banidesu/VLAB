<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Beranda extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->model('model_data','person');
	}

	public function index()
	{
		if($this->session->userdata('asisten') || $this->session->userdata('praktikan') || $this->session->userdata('admin'))
		{
			redirect('home');
		}
		else
		{
			$data['User'] = "Praktikan";
			$this->load->view('home/login', $data);
		}
	}

}

?>
