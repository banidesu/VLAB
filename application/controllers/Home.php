<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

	function __construct(){
    parent::__construct();

  $this->load->model('model_data','person');

	}

	function index()
	{
		if($this->session->userdata('status') == 'Asisten' )
		{
			$this->asisten();
		}
		if($this->session->userdata('status') == 'Programmer' )
		{
			$this->admin();
		}
		elseif($this->session->userdata('praktikan'))
		{
			$this->praktikan();
		}
		elseif($this->session->userdata('admin'))
		{
			$this->admin();
		}

	}

	function asisten(){

		if(!$this->session->userdata('asisten')){
			redirect('beranda');
		}

		$isi['DataVlab'] = $this->db->query("
												SELECT
												(SELECT COUNT(*) FROM tbpraktikan ) as JmlPraktikan,
												(SELECT COUNT(*) FROM tbsoal_al ) as JmlSoal_AL,
												(SELECT COUNT(*) FROM tbsoal) as JmlSoal_TA,
												(SELECT COUNT(*) FROM tbmatkul ) as JmlMatkul,
												(SELECT COUNT(*) FROM tbujian  ) as JmlUjian
		");
		$isi['content'] = 'asisten/beranda';
		$isi['judul'] = 'Beranda';
		$isi['subjudul'] = '';
		$isi['dashboard'] = 'class="active"';
		$isi['matkul'] = '';
		$isi['tentang'] = '';
		$isi['datapraktikan'] = '';
		$isi['soal'] = '';
		$isi['ujian'] = '';
		$isi['datanilai']		= '';
		$isi['data_matkul'] = $this->db->query("SELECT * FROM tbmatkul order by nama_matkul ASC");
		$key = $this->session->userdata('kd_asisten');
		$isi['foto'] = $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");
		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');

	}

	function praktikan(){
		if(!$this->session->userdata('praktikan'))
		{
			redirect('beranda');
		}
		$isi['content'] = 'praktikan/beranda';
		$isi['judul'] = 'Beranda';
		$isi['subjudul'] = 'Data Nilai ';
		$isi['dashboard'] = 'class="active"';
		$isi['lappendahuluan']= '';
		$isi['tugasakhir'] = '';
		$isi['tentang']	= '';
		$isi['ujian'] = '';
		$npm = $this->session->userdata('npm');
		$isi['datanilai'] = $this->db->query("SELECT * from tbnilai where npm = '$npm'");
		$key = $this->session->userdata('npm');
		$isi['foto'] = $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
		
		$kelas 	= $this->session->userdata('kelas');
		$con = substr($kelas,0,3);
		switch ($con) {
			case '3EA':
			$isi['bab'] 	= $this->db->query("SELECT minggu FROM tbbab WHERE kd_matkul = 'MM005' ");
			break;
			case '2EA':
			$isi['bab'] 	= $this->db->query("SELECT minggu FROM tbbab WHERE kd_matkul = 'MM006' ");
			break;
			case '2DA':
			$isi['bab'] 	= $this->db->query("SELECT minggu FROM tbbab WHERE kd_matkul = 'MM007' ");
			break;
			case '2DD':
			$isi['bab'] 	= $this->db->query("SELECT minggu FROM tbbab WHERE kd_matkul = 'MM007' ");
			break;
			case '2DF':
			$isi['bab'] 	= $this->db->query("SELECT minggu FROM tbbab WHERE kd_matkul = 'MM007' ");
			break;
			case '3DD':
			$isi['bab'] 	= $this->db->query("SELECT minggu FROM tbbab WHERE kd_matkul = 'MM008' ");
			break;
			default:
			break; 
		}

		//$kelas 	= $this->session->userdata('kelas');
		//$con = substr($kelas,0,3);
		//switch ($con) {
		// 	case '2EA':
		// 	$isi['bab'] 	= $this->db->query("SELECT minggu FROM tbbab WHERE matkul = 'Manajemen Keuangan 2' ");
		// 	break;
		// 	case '2EB':
		// 	$isi['bab'] 	= $this->db->query("SELECT minggu FROM tbbab WHERE matkul = 'Manajemen Keuangan 2' ");
		// 	break;
		// 	case '2DA':
		// 	$isi['bab'] 	= $this->db->query("SELECT minggu FROM tbbab WHERE matkul = 'Manajemen Keuangan 2' ");
		// 	break;
		// 	case '2DD':
		// 	$isi['bab'] 	= $this->db->query("SELECT minggu FROM tbbab WHERE matkul = 'Manajemen Keuangan 2' ");
		// 	break;
		// 	case '2DF':
		// 	$isi['bab'] 	= $this->db->query("SELECT minggu FROM tbbab WHERE matkul = 'Manajemen Keuangan 2' ");
		// 	break;
		// 	case '3DA':
		// 	$isi['bab'] 	= $this->db->query("SELECT minggu FROM tbbab WHERE matkul = 'Internet dan Jaringan' ");
		// 	break;
		// 	case '3DD':
		// 	$isi['bab'] 	= $this->db->query("SELECT minggu FROM tbbab WHERE matkul = 'E-Commerce' ");
		// 	break;
		// 	default:
		// 	break; 
		// }
		// $isi['databab']					= $this->db->query("SELECT * FROM tbbab ");
		$this->load->view('praktikan/header_praktikan',$isi);
		$this->load->view('praktikan/menu_praktikan',$isi);
		$this->load->view('praktikan/content_praktikan',$isi);
		$this->load->view('praktikan/footer_praktikan');
	}

	function admin()
	{
		if(!$this->session->userdata('asisten'))
		{
			redirect('dashboard');
		}
		$isi['DataVlab'] = $this->db->query("
												SELECT
												(SELECT COUNT(*) FROM tbpraktikan ) as JmlPraktikan, 
												(SELECT COUNT(*) FROM tbasisten ) as JmlAsisten,
												(SELECT COUNT(*) FROM tbmodul ) as JmlModul,
												(SELECT COUNT(*) FROM tbberita ) as JmlBerita,
												(SELECT COUNT(*) FROM tbbab WHERE tbbab.kd_matkul = 'MM002' ) as JmlModulVideo
		");


		$isi['content'] = 'admin/beranda';
		$isi['judul'] = 'Beranda';
		$isi['subjudul'] = 'Beranda';
		$isi['dashboard'] = 'class="active"';
		$isi['databerita'] = '';
		$isi['datamodul'] = '';
		$isi['dataasisten'] = '';
		$isi['datapraktikum'] = '';
		$isi['tentang'] = '';
		$this->load->view('admin/header_admin',$isi);
		$this->load->view('admin/menu_admin',$isi);
		$this->load->view('admin/content_admin',$isi);
		$this->load->view('admin/footer_admin');
		// echo "success<br>
		// 		<a href='".base_url()."home/logout'>Logout</a>" ;

	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('dashboard');
		session_destroy();

	}




}
?>
