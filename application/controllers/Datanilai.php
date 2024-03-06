	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datanilai extends CI_Controller {

	public function __construct() 
	 {
		 parent::__construct();
		 $this->load->model('model_data');
	 }

	public function index()
	{
		if(!$this->session->userdata('asisten')){
			redirect('beranda');
		}
		$isi['content'] 		= 'datanilai/DataMatkul';
		$isi['judul']			= 'Data Nilai';
		$isi['subjudul']		= '';
		$isi['dashboard']		= '';
		$isi['matkul']			= '';
		$isi['tentang']			= '';
		$isi['datapraktikan']	= '';
		$isi['soal']			= '';
		$isi['datanilai']		= 'class="active open"';
		$isi['ujian']			= '';
		$isi['data_matkul']		= $this->db->query("SELECT * FROM tbmatkul order by t_ajaran ASC");
		$isi['data_kelas'] = $this->db->query("SELECT * FROM tbaktivasi2 GROUP BY kelas ASC");
		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');
	}

	function DaftarBab( $var_IdMatkul )
	{
		$var_Query = "";
		$var_Query = "
						SELECT
							tbbab.nama_bab
							, tbbab.minggu
							, tbbab.kd_bab
							, tbmatkul.t_ajaran
							, tbmatkul.nama_matkul
							, tbmatkul.kd_matkul
						FROM tbmatkul
							INNER JOIN tbbab 
								ON 
								tbbab.kd_matkul = tbmatkul.kd_matkul
							WHERE tbmatkul.kd_matkul = '".$var_IdMatkul."'
		";
		$isi['data_nilai']		= $this->db->query($var_Query);
		$isi['content'] 		= 'datanilai/Index';
		$isi['judul']			= 'Data Nilai';
		$isi['subjudul']		= '';
		$isi['dashboard']		= '';
		$isi['matkul']			= '';
		$isi['tentang']			= '';
		$isi['datapraktikan']	= '';
		$isi['soal']			= '';
		$isi['datanilai']		= 'class="active"';
		$isi['ujian']			= '';
		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');

	}
	
	function Praktikum()
	{
		$var_QueryTemp = "";
		$var_Judul = "";

		$var_Matkul = isset($_GET['Kd_Matkul']) ? $_GET['Kd_Matkul'] : '' ;
		$var_Bab = isset($_GET['Kd_Bab']) ? $_GET['Kd_Bab'] : '' ;
		$isi['Id_Temp'] = $var_Bab; 

		$var_Query = "
					SELECT 
					tbpraktikan.npm
					, tbpraktikan.nama
					, tbpraktikan.kelas
		";

		switch ( $var_Bab ) 
		{
			case '1':
				$var_Query .= "
					, tbnilai.kehadiran1 Kehadiran
					, tbnilai.al1 AL
					, tbnilai.ta1 TA
				";
			break;
			case '2':
				$var_Query .= "
					, tbnilai.kehadiran2 Kehadiran 
					, tbnilai.al2 AL
					, tbnilai.ta2 TA
				";
			break;
			case '3':
				$var_Query .= "
					, tbnilai.kehadiran3 Kehadiran
					, tbnilai.al3 AL
					, tbnilai.ta3 TA
				";
			break;
			case '4':
				$var_Query .= "
					, tbnilai.kehadiran4 Kehadiran
					, tbnilai.al4 AL
					, tbnilai.ta4 TA
				";
			break;
			case '5':
				$var_Query .= "
					, tbnilai.kehadiran5 Kehadiran
					, tbnilai.al5 AL
					, tbnilai.ta5 TA
							
				";
			break;
			case '6':
				$var_Query .= "
					, tbnilai.kehadiran6 Kehadiran
					, tbnilai.al6 AL
					, tbnilai.ta6 TA
				";
			break;
			case '7':
				$var_Query .= "
					, tbnilai.kehadiran7 Kehadiran
					, tbnilai.al7 AL
					, tbnilai.ta7 TA
				";
			break;
			
			default:
				$var_Query .= "
					, tbnilai.kehadiran Kehadiran
					, tbnilai.al AL
					, tbnilai.ta TA
				";
			break;
		}
		$var_Query .= "
						, tbnilai.ujian
						FROM tbpraktikan
							INNER JOIN tbnilai 
								ON tbpraktikan.npm = tbnilai.npm



		";

		switch ( $var_Matkul ) 
		{

		// 1-4 buat ATA 
			// case 'MM001':
			// 	$var_Judul = "Riset Operasional 2";
			// 	$var_QueryTemp = "
			// 				WHERE tbpraktikan.kelas LIKE '%EA%' 
			// 				OR tbpraktikan.kelas LIKE '%EB%'
			// 	";
			// break;

			// case 'MM002':
			// 	$var_Judul = "Manajemen Keuangan 2";
			// 	$var_QueryTemp = "
			// 				WHERE tbpraktikan.kelas LIKE '2EA%' 
			// 				OR tbpraktikan.kelas LIKE '2EB%'
			// 				OR tbpraktikan.kelas LIKE '2DF%'
			// 				OR tbpraktikan.kelas LIKE '2DA%'
			// 				OR tbpraktikan.kelas LIKE '2DD%'
			// 	";
			// break;

			// case 'MM003':
			// 	$var_Judul = "Internet dan Jaringan";	
			// 	$var_QueryTemp = "WHERE tbpraktikan.kelas LIKE '3DA%' ";
			// break;
			
			// case 'MM004':
			// 	$var_Judul = "E-Commerce";
			// 	$var_QueryTemp = "WHERE tbpraktikan.kelas LIKE '3DD%' ";
			// break;
			
		// ATA


		// PTA	

			case 'MM005':
				$var_Judul = "Manajemen Operasional";
				$var_QueryTemp = "
							WHERE tbpraktikan.kelas LIKE '3EA%' 
							OR tbpraktikan.kelas LIKE '3EB%' 
						";
			break;

			case 'MM006':
				$var_Judul = "Riset Operasional 1";
				$var_QueryTemp = "WHERE tbpraktikan.kelas LIKE '2EA%' ";
			
			break;

			case 'MM007':
				$var_Judul = "Dasar Manajemen Keuangan";
				$var_QueryTemp = "WHERE tbpraktikan.kelas LIKE '2DF%' 
							OR tbpraktikan.kelas LIKE '2DD%' 
							OR tbpraktikan.kelas LIKE '2DA%' ";
			break;

			case 'MM008':
				$var_Judul = "Jasa";
				$var_QueryTemp = "WHERE tbpraktikan.kelas LIKE '3DD%'";
			break;
			
			default:

			break;

		// END PTA
		}

		if ( $var_QueryTemp != '') 
		{
			$var_Query .= $var_QueryTemp;
		}

		$var_Query .= "ORDER BY tbpraktikan.kelas ASC";



		$var_Query_AL = "
						SELECT tbbab.kd_bab 
							FROM tbbab 
								INNER JOIN tbmatkul 
								ON tbbab.kd_matkul = tbmatkul.kd_matkul 
								WHERE tbbab.kd_matkul = '".$var_Matkul."' AND tbbab.minggu = ".$var_Bab." 
		";

		$isi['Bab'] = $this->db->query($var_Query_AL);

		$isi['Kd_Bab'] = $var_Bab;
		$isi['Kd_Matkul'] = $var_Matkul;
		$isi['var_Query'] = $var_Query_AL;
		$isi['data_nilai'] = $this->db->query($var_Query);
		$isi['content'] = 'datanilai/Praktikum';
		$isi['judul'] = 'Data Nilai';
		$isi['subjudul'] = $var_Judul;
		$isi['dashboard'] = '';
		$isi['tentang'] = '';
		$isi['matkul'] = '';
		$isi['datapraktikan'] = '';
		$isi['soal'] = '';	
		$isi['datanilai'] = 'class="active open"';
		$isi['ujian'] = '';
		$isi['data_matkul'] = $this->db->query("SELECT * FROM tbmatkul order by nama_matkul ASC"); // Untuk Menu
		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');
	}

	public function UpdateDatNilai( $Id_Temp )
	{	
		$var_AL =  $this->input->post('al'.$Id_Temp.'');			
		$var_NPM  = $this->input->post('npm');
		$var_Kd_Matkul = $this->input->post('Kd_Matkul');
		$var_Kd_Bab = $this->input->post('Kd_Bab');
		$this->model_data->UpdateDatNilai($Id_Temp, $var_NPM, $var_AL);
		redirect('datanilai/praktikum?Kd_Matkul='.$var_Kd_Matkul.'&Kd_Bab='.$var_Kd_Bab.'');
	}


	public function ViewData() 
	{
		$kelas = $this->input->post('kelas'); 
		$data = array( 'title' => 'Data Nilai',
		'user' => $this->model_data->listing($kelas) , 
		'kelas' => $this->input->post('kelas') );
		$this->load->view('export/excel',$data);
	}

	public function export_excel()
	{
		$kelas = $this->input->post('kelas');
		$this->load->model('model_data');
		$data['title'] = "Data Nilai ".$kelas."";
		$data['user'] = $this->model_data->listing($kelas);
		$this->load->view('export/laporan_excel',$data);
	}

	public function UpdateDatUjian()
	{
		$var_Ujian =  $this->input->post('ujian');			
		$var_NPM  = $this->input->post('npm');
		$var_Kd_Matkul = $this->input->post('Kd_Matkul');
		$var_Kd_Bab = $this->input->post('Kd_Bab');
		$this->model_data->UpdateDatUjian($var_NPM,$var_Ujian);
		redirect('datanilai/praktikum?Kd_Matkul='.$var_Kd_Matkul.'&Kd_Bab='.$var_Kd_Bab.'');
	}


}