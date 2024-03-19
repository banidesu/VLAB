<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('OprecModel');
	}

	public function index()
	{
		$var_Data['activePeriode'] = $this->OprecModel->getPeriodActive();
		$var_Data['Judul'] = "Laboratorium Manajemen Menengah";
		$this->load->view('home/index', $var_Data);
		// $this->load->view('pages/header');
		// $this->load->view('pages/navbar');
		// $this->load->view('pages/slider');
		// $this->load->view('pages/content');
		// $this->load->view('pages/content1');
		// $this->load->view('pages/footer');

	}


	// public function v1()
	// {
	// 	// $var_Data['Judul'] = "Laboratorium Manajemen Menengah";
	// 	// $this->load->view('home/index',$var_Data);
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/slider');
	// 	$this->load->view('pages/content');
	// 	$this->load->view('pages/content1');
	// 	$this->load->view('pages/footer');

	// }
	// public function gamlab()
	// {
	// 	$data['judul']	= 'Gambaran Umum Laboratorium';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/gambaranumum');
	// 	$this->load->view('pages/footer');

	// }
	// public function vislab()
	// {
	// 	$data['judul']	= 'Visi & Misi';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/visi');
	// 	$this->load->view('pages/footer');

	// }
	// public function aktlab()
	// {
	// 	$data['judul']	= 'Aktivitas';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/aktivitas');
	// 	$this->load->view('pages/footer');

	// }
	// public function strlab()
	// {
	// 	$data['judul']	= 'Struktur Organisasi';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/struktur');
	// 	$this->load->view('pages/footer');

	// }
	// public function perlab()
	// {
	// 	$data['judul']	= 'Personalia';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/personalia');
	// 	$this->load->view('pages/footer');

	// }
	// public function infjar()
	// {
	// 	$data['judul']	= 'Infrastruktur Jaringan';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/strukturjaringan');
	// 	$this->load->view('pages/footer');

	// }
	// public function hirjar()
	// {
	// 	$data['judul']	= 'Hirarki Jaringan';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/hirarkijaringan');
	// 	$this->load->view('pages/footer');
	// }
	// public function denlab()
	// {
	// 	$data['judul']	= 'Denah Laboratorium';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/denah');
	// 	$this->load->view('pages/footer');
	// }
	// public function perprak()
	// {
	// 	$data['judul']	= 'Peraturan Praktikum';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/peraturan');
	// 	$this->load->view('pages/footer');
	// }
	// public function orgasis()
	// {
	// 	$data['judul']	= 'Organisasi Asisten';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/teamasisten');
	// 	$this->load->view('pages/footer');

	// }
	// public function kewasis()
	// {
	// 	$data['judul']	= 'Kewajiban Asisten';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/kewajiban');
	// 	$this->load->view('pages/footer');
	// }
	// public function hakasis()
	// {
	// 	$data['judul']	= 'Hak dan Wewenang Asisten';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/hak');
	// 	$this->load->view('pages/footer');

	// }
	// public function ketasis()
	// {
	// 	$data['judul']	= 'Keterlambatan Asisten';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/keterlambatan');
	// 	$this->load->view('pages/footer');
	// }

	// public function jadprak()
	// {
	// 	$data['judul']	= 'Jadwal Praktikum';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/jadwal');
	// 	$this->load->view('pages/footer');
	// }

	// public function donprak()
	// {
	// 	$data['judul']	= 'Download ';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/download');
	// 	$this->load->view('pages/footer');

	// }
	// public function contact()
	// {
	// 	$data['judul']	= 'Hubungi Kami';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/contact');
	// 	$this->load->view('pages/footer');


	// }

	// public function matprak()
	// {
	// 	$data['judul']	= 'Hubungi Kami';
	// 	$this->load->view('pages/header');
	// 	$this->load->view('pages/navbar');
	// 	$this->load->view('pages/header1',$data);
	// 	$this->load->view('pages/materi');
	// 	$this->load->view('pages/footer');


	// }


}
