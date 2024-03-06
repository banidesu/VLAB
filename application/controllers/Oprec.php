<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oprec extends CI_Controller {

public function index()
	{
		$data['judul'] = " Operec Mamen 2017";
		$this->load->view('pages/header');
		$this->load->view('pages/navbar');
		$this->load->view('pages/header1',$data);
		$this->load->view('oprec/index');
		$this->load->view('pages/footer');

	}

// // public function asisten()
// // 	{
// // 		$data['judul'] = " Open Recruitment Asisten";
// // 		$this->load->view('pages/header');
// // 		$this->load->view('pages/navbar');
// // 		$this->load->view('pages/header1',$data);
// // 		$this->load->view('oprec/Asisten');
// // 		$this->load->view('pages/footer');

// // 	}


// public function programmer()
// 	{
// 		$data['judul'] = " Open Recruitment Programmer";
// 		$this->load->view('pages/header');
// 		$this->load->view('pages/navbar');
// 		$this->load->view('pages/header1',$data);
// 		$this->load->view('oprec/Programmer');
// 		$this->load->view('pages/footer');

// 	}
// // public function tes_livecoding2017()
// // 	{
// // 		$data['judul'] = " Open Recruitment Programmer";
// // 		$this->load->view('pages/header');
// // 		$this->load->view('pages/navbar');
// // 		$this->load->view('pages/header1',$data);
// // 		$this->load->view('oprec/programmer/Soal_TesLiveCoding');
// // 		$this->load->view('pages/footer');
// // 	}

	public function Asisten()
	{
			$data['User'] = "Asisten";
			$this->load->view('home/login', $data);
	}
	public function Praktikan()
	{
			$data['User'] = "Praktikan";
			$this->load->view('home/login', $data);
	}


}