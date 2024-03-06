<?php 
class Matakuliah extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Model_data');
	}

	public function index()
	{
		if(!$this->session->userdata('asisten')){
			redirect('beranda');
		}
		redirect('Matakuliah/AktifasiPraktikum');	
	}

	public function AktifasiPraktikum()
	{
		$var_Query =  "";
		$var_Query = "
						SELECT 
							tbaktivasi2.kelas
							, tbmatkul.nama_matkul
							, tbbab.nama_bab
							, tbaktivasi2.status_ta 
							, tbaktivasi2.status_al 
							, tbaktivasi2.kd_bab 
							FROM tbaktivasi2
								INNER JOIN tbbab 										
									ON 
										tbaktivasi2.kd_bab = tbbab.kd_bab
								INNER JOIN tbmatkul
									ON
										tbbab.kd_matkul = tbmatkul.kd_matkul
		";
		$var_Kelas = isset($_GET['kelas']) ? $_GET['kelas'] : "";
		if ( $var_Kelas != "" ) 
		{
			$var_Query .= "WHERE kelas = '".$var_Kelas."'";
		}
		$isi['data_aktivasi'] = $this->db->query($var_Query);

		$isi['content'] = 'matkul/TestActivasi';
		$isi['judul'] = 'Aktivasi';
		$isi['subjudul'] = 'Sesi Praktikum';
		$isi['dashboard'] = '';
		$isi['tentang'] = '';
		$isi['matkul'] = 'class="active"';
		$isi['datapraktikan'] = '';
		$isi['soal'] = '';
		$isi['ujian'] = '';
		$isi['datanilai'] = '';
		$isi['data_matkul'] = $this->db->query("SELECT * FROM tbmatkul");
		$isi['data_kelas'] = $this->db->query("SELECT * FROM tbaktivasi2 GROUP BY kelas ASC");

		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');
	}


	function UbahStatus( $var_kd_bab )
	{
		$var_TempKelas = $this->input->post('kelas');
		$var_Query = "";
		$var_Status_al = isset($_POST['status_al']) ? $_POST['status_al'] : "";
		$var_Status_ta = isset($_POST['status_ta']) ? $_POST['status_ta'] : "";
		$var_Query = "
					UPDATE tbaktivasi2
		";
		if ($var_Status_al != "") 
		{
			$var_Query .= "
							SET status_al = ".$var_Status_al."
			";
		}
		if ($var_Status_ta != "" ) 
		{
			$var_Query .= "
							SET status_ta = ".$var_Status_ta."
			";
		}
		$var_Query .= "
					WHERE kd_bab = '". $var_kd_bab."'
					AND kelas = '".$var_TempKelas."'
		";
		$this->db->query($var_Query);
		redirect('Matakuliah/AktifasiPraktikum?kelas='.$var_TempKelas.'');
	}


}
