<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Soal extends CI_Controller {


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
		$isi['content'] = 'soal/DataMatkul';
		$isi['judul'] = 'Soal';
		$isi['subjudul'] = '';
		$isi['dashboard'] = '';
		$isi['matkul'] = '';
		$isi['tentang'] = '';
		$isi['datapraktikan'] = '';
		$isi['soal'] = 'class="active"';
		$isi['ujian'] = '';
		$isi['datanilai'] = '';
		$isi['data_soal']		= $this->db->query("SELECT * FROM tbmatkul ORDER BY t_ajaran ASC");
		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');
	}

	function AktifitasLab( $var_IdMatkul )
	{
		$var_Query = "";
		$var_Query = "
						SELECT
							tbbab.nama_bab
							, tbbab.minggu
							, tbmatkul.t_ajaran
							, tbmatkul.nama_matkul
							, tbmatkul.kd_matkul
							, tbbab.kd_bab
						FROM tbmatkul
							INNER JOIN tbbab 
								ON 
								tbbab.kd_matkul = tbmatkul.kd_matkul
							WHERE tbmatkul.kd_matkul = '".$var_IdMatkul."'
		";
		$isi['data_bab']		= $this->db->query($var_Query);
		$isi['content'] 		= 'soal/DataBab';
		$isi['judul']			= 'Soal Aktifitas Lab';
		$isi['subjudul']		= '';
		$isi['dashboard']		= '';
		$isi['matkul']			= '';
		$isi['tentang']			= '';
		$isi['datapraktikan']	= '';
		$isi['soal']			= 'class="active"';
		$isi['datanilai']		= '';
		$isi['ujian']			= '';
		$isi['Tipe']			= 'AL';
		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');

	}

	function Tugasakhir( $var_IdMatkul )
	{
		$var_Query = "";
		$var_Query = "
						SELECT
							tbbab.nama_bab
							, tbbab.minggu
							, tbmatkul.t_ajaran
							, tbmatkul.nama_matkul
							, tbmatkul.kd_matkul
							, tbbab.kd_bab
						FROM tbmatkul
							INNER JOIN tbbab 
								ON 
								tbbab.kd_matkul = tbmatkul.kd_matkul
							WHERE tbmatkul.kd_matkul = '".$var_IdMatkul."'
		";
		$isi['data_bab']		= $this->db->query($var_Query);
		$isi['content'] 		= 'soal/DataBab';
		$isi['judul']			= 'Soal Tugas Akhir';
		$isi['subjudul']		= '';
		$isi['dashboard']		= '';
		$isi['matkul']			= '';
		$isi['tentang']			= '';
		$isi['datapraktikan']	= '';
		$isi['soal']			= 'class="active"';
		$isi['datanilai']		= '';
		$isi['ujian']			= '';
		$isi['Tipe']			= 'TA';
		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');

	}

	function Praktikum()
	{
		$isi['nama_bab'] = "";	
		$isi['nama_matkul'] = "";	
		$isi['kd_bab'] = "";	
		$isi['kd_matkul'] = "";	
		$var_QueryTemp = "";
		$var_Judul = "";

		$var_Matkul = isset($_GET['Kd_Matkul']) ? $_GET['Kd_Matkul'] : '' ;
		$var_Bab = isset($_GET['Kd_Bab']) ? $_GET['Kd_Bab'] : '' ;
		$var_Tipe = isset($_GET['Tipe']) ? $_GET['Tipe'] : '' ;
		
		if ($var_Tipe == 'TA' ) 
		{
			$var_Query = "
								SELECT 
								tbsoal.*
								, tbbab.nama_bab
								, tbmatkul.nama_matkul
									FROM tbsoal 
										INNER JOIN tbbab
											ON 
												tbsoal.kd_bab = tbbab.kd_bab
										INNER JOIN tbmatkul
											ON 
												tbbab.kd_matkul = tbmatkul.kd_matkul
											WHERE 
												tbsoal.kd_bab = '".$var_Bab."' 
												AND tbsoal.keterangan = '".$var_Tipe."'
											ORDER BY tbsoal.kd_bab ASC 
			";
			$GetMaxCode = $this->db->query("SELECT max(kd_soal) as maxKode FROM tbsoal WHERE kd_bab = '".$var_Bab."'");

		}
		else
		{
			$var_Query = "
								SELECT 
								tbsoal_al.*
								, tbbab.nama_bab
								, tbmatkul.nama_matkul
									FROM tbsoal_al
										INNER JOIN tbbab
											ON 
												tbsoal_al.kd_bab = tbbab.kd_bab
										INNER JOIN tbmatkul
											ON 
												tbbab.kd_matkul = tbmatkul.kd_matkul
											WHERE 
												tbsoal_al.kd_bab = '".$var_Bab."' 
												AND tbsoal_al.keterangan = '".$var_Tipe."'
											ORDER BY tbsoal_al.kd_bab ASC 
			";
			$GetMaxCode = $this->db->query("SELECT max(kd_soal) as maxKode FROM tbsoal_al WHERE kd_bab = '".$var_Bab."'");

		}


		$isi['Data_Soal'] = $this->db->query($var_Query);

		$isi['content'] = 'soal/index_'.$var_Tipe;

		foreach ($isi['Data_Soal']->result() as $Row) 
		{
			$isi['nama_bab'] = $Row->nama_bab;
			$isi['nama_matkul'] = $Row->nama_matkul;
			$isi['kd_bab'] = $Row->kd_bab;
			$isi['kd_matkul'] = $Row->kd_matkul;
		}



		foreach ($GetMaxCode->result() as $Row ) 
		{
			$MaxKodeSoal = $Row->maxKode;
		}

		$var_KodeBab = substr($isi['kd_bab'],1,3);

		$var_KodeSoal = substr($MaxKodeSoal , 3);
		$var_KodeSoal += 1;

		switch (strlen($var_KodeSoal)) 
		{
			case '1':
				$isi['kode_soal'] = $var_KodeBab.'00'.$var_KodeSoal;
			break;
			case '2':
				$isi['kode_soal'] = $var_KodeBab.'0'.$var_KodeSoal;
			break;
			case '3':
				$isi['kode_soal'] = $var_KodeBab.$var_KodeSoal;
			break;			
			default:
				# code...
				break;
		}
		
		if ($var_Tipe == 'TA' ) 
		{
			$var_Judul = 'Tugas Akhir';
		}
		else
		{
			$var_Judul = 'Aktifitas Lab';
		}	

		$isi['judul'] = 'Data Soal '.$var_Judul;
		$isi['subjudul'] = $isi['nama_matkul'];
		$isi['dashboard'] = '';
		$isi['tentang'] = '';
		$isi['matkul'] = '';
		$isi['datapraktikan'] = '';
		$isi['soal'] = 'class="active"';	
		$isi['datanilai'] = '';
		$isi['ujian'] = '';
		$isi['var_type'] = $var_Tipe;
		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');
	}
	

// =========== CONTROLLER PERINTAH CRUD DATA SOAL ========//

	public function delete($var_Kd_Soal) // UNTUK SAAT INI MASIH DIGUNAKAN UNTUK TUGAS AKHIR	
	{
		$var_Soal = $this->model_data->getdatasoal($var_Kd_Soal);
		foreach ($var_Soal->result() as $Row ) 
		{
			$var_Kd_Matkul = $Row->kd_matkul;
			$var_Kd_bab = $Row->kd_bab;
		}
		$this->model_data->deletesoal($var_Kd_Soal);
		redirect('Soal/Praktikum?Kd_Matkul='.$var_Kd_Matkul.'&Kd_Bab='.$var_Kd_bab.'&Tipe=TA');
	}

	public function delete_al($var_Kd_Soal) // UNTUK SAAT INI MASIH DIGUNAKAN UNTUK TUGAS AKHIR	
	{
		$var_Soal = $this->model_data->getdatasoal_al($var_Kd_Soal);
		foreach ($var_Soal->result() as $Row ) 
		{
			$var_Kd_Matkul = $Row->kd_matkul;
			$var_Kd_bab = $Row->kd_bab;
		}
		$this->model_data->deletesoal_al($var_Kd_Soal);
		redirect('Soal/Praktikum?Kd_Matkul='.$var_Kd_Matkul.'&Kd_Bab='.$var_Kd_bab.'&Tipe=AL');
	}


	public function simpan_data() // UNTUK SAAT INI MASIH DIGUNAKAN UNTUK TUGAS AKHIR
	{
		$var_tipe = $this->input->post('tipe');

		if ($var_tipe == 'TA' ) 
		{
			$key = $this->input->post('kd_soal');
			$data['kd_matkul'] = $this->input->post('kd_matkul');
			$data['kd_bab'] = $this->input->post('kd_bab');
			$data['kd_soal'] = $this->input->post('kd_soal');
			$data['soal'] = $this->input->post('soal');
			$data['jaw_a'] = $this->input->post('jaw_a');
			$data['jaw_b'] = $this->input->post('jaw_b');
			$data['jaw_c'] = $this->input->post('jaw_c');
			$data['jaw_d'] = $this->input->post('jaw_d');
			$data['kunci_jaw'] = $this->input->post('kunci_jaw');
			$data['keterangan'] = $this->input->post('keterangan');
			
			$var_Soal = $this->model_data->getdatasoal($key);

			if ($var_Soal->num_rows()>0)
			{
				$this->model_data->getupdatesoal($key,$data);
			}
			else
			{
				$this->model_data->getinsertsoal($data);
			}
			
		}
		else
		{
			$key = $this->input->post('kd_soal');
			$data['kd_matkul'] = $this->input->post('kd_matkul');
			$data['kd_bab'] = $this->input->post('kd_bab');
			$data['kd_soal'] = $this->input->post('kd_soal');
			$data['soal'] = $this->input->post('soal');
			$data['keterangan'] = $this->input->post('keterangan');
			$var_Soal = $this->model_data->getdatasoal_al($key);

			if ($var_Soal->num_rows()>0)
			{
				$this->model_data->getupdatesoal_al($key,$data);
			}
			else
			{
				$this->model_data->getinsertsoal_al($data);
			}
		}
		redirect('Soal/Praktikum?Kd_Matkul='.$data['kd_matkul'].'&Kd_Bab='.$data['kd_bab'].'&Tipe='.$data['keterangan'].'');  

	}
	
	public function hapustemp()
	{
		$this->db->query("DELETE from tbtemp");
		redirect('Soal');
	}
	
}
