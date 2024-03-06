<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tugas_akhir extends CI_Controller {


	public function index()
	{
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');
		}
		$isi['content'] 		= 'tugas_akhir/index';
		$isi['judul']			= 'Laporan Pendahuluan';
		$isi['subjudul']		= '';
		$isi['dashboard']		= '';
		$isi['lappendahuluan']	= '';
		$isi['lpmk2']			= '';
		$isi['lpor2']			= '';
		$isi['lpinterjar']		= '';
		$isi['lpecom']			= '';
		$isi['tugasakhir']		= 'class="open active"';
		$isi['tamk2']			= '';
		$isi['taro2']			= '';
		$isi['tainterjar']		= '';
		$isi['taecom']			= '';
		$isi['nama'] 			= $this->session->userdata('nama');
		$isi['tentang']			= '';
		$isi['ujian']			= '';
		$key					= $this->session->userdata('npm');
		$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
		$isi['menu_logic']		= $this->db->query("SELECT kelas FROM tbpraktikan where npm = '".$key."'");


		$this->load->view('praktikan/header_praktikan',$isi);
		$this->load->view('praktikan/menu_praktikan',$isi);
		$this->load->view('praktikan/content_praktikan',$isi);
		$this->load->view('praktikan/footer_praktikan');
	}


	public function mk2(){
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');
		}
		$isi['content'] 		= 'tugasakhir/bab_tugasakhir';
		$isi['judul']			= 'Tugas Akhir';
		$isi['subjudul']		= 'Manajemen Keuangan 2';
		$isi['dashboard']		= '';
		$isi['lappendahuluan']	= '';
		$isi['lpmk2']			= '';
		$isi['lpor2']			= '';
		$isi['lpinterjar']		= '';
		$isi['lpecom']			= '';
		$isi['tugasakhir']		= 'class="open active"';
		$isi['tamk2']			= 'class="active"';
		$isi['taro2']			= '';
		$isi['tainterjar']		= '';
		$isi['taecom']			= '';
		$isi['nama'] 			= $this->session->userdata('nama');
		$isi['tentang']		= '';
		$isi['ujian']			= '';
		$key							= $this->session->userdata('npm');
		$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
		$isi['menu_logic']= $this->db->query("SELECT kelas FROM tbpraktikan where npm = '".$key."'");
		$isi['data']			= $this->db->query("SELECT * FROM tbbab WHERE kd_bab LIKE 'BMK%' ");
		$this->load->view('praktikan/header_praktikan',$isi);
		$this->load->view('praktikan/menu_praktikan',$isi);
		$this->load->view('praktikan/content_praktikan',$isi);
		$this->load->view('praktikan/footer_praktikan');
	}
	public function ro2(){
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');
		}
		$isi['content'] 		= 'tugasakhir/bab_tugasakhir';
		$isi['judul']			= 'Tugas Akhir';
		$isi['subjudul']		= 'Riset Oprasional 2';
		$isi['dashboard']		= '';
		$isi['lappendahuluan']	= '';
		$isi['lpmk2']			= '';
		$isi['lpor2']			= '';
		$isi['lpinterjar']		= '';
		$isi['lpecom']			= '';
		$isi['tugasakhir']		= 'class="open active"';
		$isi['tamk2']			= '';
		$isi['taro2']			= 'class="active"';
		$isi['tainterjar']		= '';
		$isi['taecom']			= '';
		$isi['nama'] 			= $this->session->userdata('nama');
		$isi['tentang']			= '';
		$isi['ujian']			= '';
		$key					= $this->session->userdata('npm');
		$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
		$isi['data']			= $this->db->query("SELECT * FROM tbbab WHERE kd_bab LIKE 'BRO%' ");
		$isi['menu_logic']		= $this->db->query("SELECT kelas FROM tbpraktikan where npm = '".$key."'");


		$this->load->view('praktikan/header_praktikan',$isi);
		$this->load->view('praktikan/menu_praktikan',$isi);
		$this->load->view('praktikan/content_praktikan',$isi);
		$this->load->view('praktikan/footer_praktikan');
	}
	public function interjar(){
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');
		}
		$isi['content'] 		= 'tugasakhir/bab_tugasakhir';
		$isi['judul']			= 'Tugas Akhir';
		$isi['subjudul']		= 'Internet Dan Jaringan ';
		$isi['dashboard']		= '';
		$isi['lappendahuluan']	= '';
		$isi['lpmk2']			= '';
		$isi['lpor2']			= '';
		$isi['lpinterjar']		= '';
		$isi['lpecom']			= '';
		$isi['tugasakhir']		= 'class="open active"';
		$isi['tamk2']			= '';
		$isi['taro2']			= '';
		$isi['tainterjar']		= 'class="active"';
		$isi['taecom']			= '';
		$isi['nama'] 			= $this->session->userdata('nama');
		$isi['tentang']			= '';
		$isi['ujian']			= '';
		$key					= $this->session->userdata('npm');
		$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
		$isi['data']			= $this->db->query("SELECT * FROM tbbab WHERE kd_bab LIKE 'BIJ%' ");
		$isi['menu_logic']		= $this->db->query("SELECT kelas FROM tbpraktikan where npm = '".$key."'");


		$this->load->view('praktikan/header_praktikan',$isi);
		$this->load->view('praktikan/menu_praktikan',$isi);
		$this->load->view('praktikan/content_praktikan',$isi);
		$this->load->view('praktikan/footer_praktikan');
	}
	public function ecom(){
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');
		}
		$isi['content'] 		= 'tugasakhir/bab_tugasakhir';
		$isi['judul']			= 'Tugas Akhir';
		$isi['subjudul']		= 'E-Commerce';
		$isi['dashboard']		= '';
		$isi['lappendahuluan']	= '';
		$isi['lpmk2']			= '';
		$isi['lpor2']			= '';
		$isi['lpinterjar']		= '';
		$isi['lpecom']			= '';
		$isi['tugasakhir']		= 'class="open active"';
		$isi['tamk2']			= '';
		$isi['taro2']			= '';
		$isi['tainterjar']		= '';
		$isi['taecom']			= 'class="active"';
		$isi['nama'] 			= $this->session->userdata('nama');
		$isi['tentang']			= '';
		$isi['ujian']			= '';
		$key					= $this->session->userdata('npm');
		$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
		$isi['data']			= $this->db->query("SELECT * FROM tbbab WHERE kd_bab LIKE 'BEC%' ");
		$isi['menu_logic']		= $this->db->query("SELECT kelas FROM tbpraktikan where npm = '".$key."'");


		$this->load->view('praktikan/header_praktikan',$isi);
		$this->load->view('praktikan/menu_praktikan',$isi);
		$this->load->view('praktikan/content_praktikan',$isi);
		$this->load->view('praktikan/footer_praktikan');
	}



}
