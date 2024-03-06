<?php 
class Tentang extends CI_Controller {

	
	public function index()
	{
		if(!$this->session->userdata('asisten')){
			redirect('beranda');
		}
		
	}

	public function asisten()
	{
		if(!$this->session->userdata('asisten')){
			redirect('beranda');
		}
		$isi['content'] 		= 'tentang';
		$isi['judul']			= 'Tentang';
		$isi['subjudul']		= '';
		$isi['dashboard']		= '';
		$isi['matkul']			= '';
		$isi['deviden']			= '';
		$isi['leverage']		= '';
		$isi['sdeviden']		= '';
		$isi['sleverage']		= '';
		$isi['tentang']			= '';
		$isi['datapraktikan']	= '';
		$isi['soal']			= '';
		$isi['ujian']			= '';
		$isi['datanilai']		= '';
		$isi['data_matkul']		= $this->db->query("SELECT * FROM tbmatkul order by nama_matkul ASC");
		$key					= $this->session->userdata('kd_asisten');
		$isi['foto']			= $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");
		$isi['menu_logic']		= $this->db->query("SELECT kelas FROM tbpraktikan where npm = '".$key."'");
		
		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');
	}
	public function praktikan()
	{
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');
		}
		$isi['content'] 		= 'tentang';
		$isi['judul']			= 'Tentang';
		$isi['subjudul']		= '';
		$isi['dashboard']		= '';
		$isi['tentang']			= 'class="active"';
		$isi['lappendahuluan']	= '';
		$isi['lpmk2']			= '';
		$isi['lpor2']			= '';
		$isi['lpinterjar']		= '';
		$isi['lpecom']			= '';
		$isi['tugasakhir']		= '';
		$isi['tamk2']			= '';
		$isi['taro2']			= '';
		$isi['tainterjar']		= '';
		$isi['taecom']			= '';
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

	function admin()
	{
		if(!$this->session->userdata('admin'))
		{
			redirect('dashboard');
		}
		$isi['content'] = 'tentang';
		$isi['judul'] = 'Tentang';
		$isi['subjudul'] = 'Developer';
		$isi['dashboard'] = '';
		$isi['databerita'] = '';
		$isi['datamodul'] = '';
		$isi['dataasisten'] = '';
		$isi['tentang'] = 'class="active"';
		$this->load->view('admin/header_admin',$isi);
		$this->load->view('admin/menu_admin',$isi);
		$this->load->view('admin/content_admin',$isi);
		$this->load->view('admin/footer_admin');
		// echo "success<br>
		// 		<a href='".base_url()."home/logout'>Logout</a>" ;

	}

}
