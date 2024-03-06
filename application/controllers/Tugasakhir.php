<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tugasakhir extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('asisten') || $this->session->userdata('praktikan')){
			redirect('home');
		}else{
			$this->load->view('beranda');
		}
	}

	// ============================================= Tugas Akhir MANAJEMEN KEUANGAN 2 =================================== //

	function DaftarMateri($var_KdMatkul)
	{	
		if(!$this->session->userdata('praktikan')){
		redirect('beranda');
		}
		$var_TempNPM = $this->session->userdata('npm');
		$var_KelasID = $this->session->userdata('kelas');
		$var_Query = "
						SELECT 
							tbbab.nama_bab
							, tbaktivasi2.status_ta
							, tbaktivasi2.status_al
							, tbaktivasi2.kd_bab
							, tbmatkul.nama_matkul

						FROM tbpraktikan
							INNER JOIN tbaktivasi2
								ON
									tbpraktikan.kelas = tbaktivasi2.kelas
							INNER JOIN tbbab 
								ON 
									tbaktivasi2.kd_bab = tbbab.kd_bab
							INNER JOIN tbmatkul
								ON 
									tbbab.kd_matkul = tbmatkul.kd_matkul
							WHERE 
							tbpraktikan.kelas = '".$var_KelasID."'
							AND tbpraktikan.npm = '".$var_TempNPM."'
							AND tbaktivasi2.status_ta = 1
							AND tbmatkul.kd_matkul = '".$var_KdMatkul."'
		";
		$isi['var_Query'] = $var_Query;
		$isi['ListKelas'] = $this->db->query($var_Query);
		$var_TempMatkul = "";
		foreach ($isi['ListKelas']->result() as $Row ) 
		{
			$var_TempMatkul = $Row->nama_matkul;
		}

		$isi['content'] = 'tugasakhir/Index';
		$isi['judul'] = 'Tugas Akhir';
		$isi['subjudul'] = $var_TempMatkul;
		$isi['dashboard'] = '';
		$isi['lappendahuluan'] = '';
		$isi['tugasakhir'] = 'class="open active"';
		$isi['tentang'] = '';
		$isi['ujian'] = '';
		
		$this->load->view('praktikan/header_praktikan',$isi);
		$this->load->view('praktikan/menu_praktikan',$isi);
		$this->load->view('praktikan/content_praktikan',$isi);
		$this->load->view('praktikan/footer_praktikan');
	}


	function VeiwModvid($var_BabModvid)
	{
		if(!$this->session->userdata('praktikan')){
		redirect('beranda');
		}
		$var_Query = "
						SELECT 
							tbbab.link_modvid
							, tbbab.kd_bab
							, tbbab.nama_bab
							, tbmatkul.nama_matkul
							, tbmatkul.kd_matkul
								FROM tbbab
									INNER JOIN tbmatkul
										ON 
											tbbab.kd_matkul = tbmatkul.kd_matkul
									INNER JOIN tbaktivasi2
										ON 
											tbbab.kd_bab = tbaktivasi2.kd_bab
									WHERE tbbab.kd_bab = '".$var_BabModvid."'
									AND tbaktivasi2.status_ta = 1
		";	

		$isi['data_modvid'] = $this->db->query($var_Query);
		$DataModvid = $this->db->query($var_Query);

		foreach ( $DataModvid->result() as $Row )
		{
			$isi['link_modvid'] = $Row->link_modvid;
			$isi['kd_bab'] = $Row->kd_bab;
			$isi['nama_bab'] = $Row->nama_bab;
			$isi['nama_matkul'] = $Row->nama_matkul;
			$isi['kd_matkul'] = $Row->kd_matkul;
		}
		
		if ($isi['data_modvid']->num_rows() < 1 ) 
		{
			redirect('beranda');
		}





		$isi['content'] = 'tugasakhir/Modvid';
		$isi['judul'] = 'Tugas Akhir';
		$isi['subjudul'] = $isi['nama_bab'];
		$isi['dashboard'] = '';
		$isi['lappendahuluan'] = '';
		$isi['tugasakhir'] = 'class="open active"';
		$isi['tentang'] = '';
		$isi['ujian'] = '';
		
		$this->load->view('praktikan/header_praktikan',$isi);
		$this->load->view('praktikan/menu_praktikan',$isi);
		$this->load->view('praktikan/content_praktikan',$isi);
		$this->load->view('praktikan/footer_praktikan');

	}

	public function Mulai($var_bab)
	{
		if(!$this->session->userdata('praktikan')){
		redirect('beranda');
		}

		$var_Query = "
						SELECT 
							tbbab.link_modvid
							, tbbab.kd_bab
							, tbbab.nama_bab
							, tbmatkul.nama_matkul
							, tbmatkul.kd_matkul
								FROM tbbab
									INNER JOIN tbmatkul
										ON 
											tbbab.kd_matkul = tbmatkul.kd_matkul
									INNER JOIN tbaktivasi2
										ON 
											tbbab.kd_bab = tbaktivasi2.kd_bab
									WHERE tbbab.kd_bab = '".$var_bab."'
									AND tbaktivasi2.status_ta = 1
		";	
		$isi['data_modvid'] = $this->db->query($var_Query);
		if ($isi['data_modvid']->num_rows() < 1 ) 
		{
			redirect('beranda');
		}


		$var_TempBab = substr($var_bab, 0, 5);

		$Get_IdTemp_Nilai = $this->db->query("SELECT minggu FROM tbbab WHERE kd_bab = '".$var_TempBab."' ");

		foreach ( $Get_IdTemp_Nilai->result() as $Row ) 
		{
			$var_Id_No = $Row->minggu;
		}

		$npm			= $this->session->userdata('npm');
		$cek 			= $this->db->query("SELECT kehadiran".$var_Id_No." AS kehadiran, ta".$var_Id_No." AS tugasakhir FROM tbnilai WHERE npm = '".$npm."' ");
		foreach ($cek->result() as $key ) {
			$var_Kehadiran = $key->kehadiran;
			$var_Tugasakhir = $key->tugasakhir;
		}
		if ( $var_Tugasakhir > 0 ) {
			redirect('beranda');
		}
		else
		{
			$data = $this->db->query("SELECT * FROM tbtemp where npm = '$npm' ");
			if (!$data->result() == 0 ){
					$getcode				= $this->db->query(" SELECT soal1, soal2, soal3, soal4, soal5 FROM tbtemp where npm = '$npm' ");
					$value 					= "";
					$row 					= $getcode->row();
					for ($i = 0; $i < 5 ; $i++) {
						if($i == 0){$value= $value."'".$row->soal1."'";}
						if($i == 1){$value= $value.",'".$row->soal2."'";}
						if($i == 2){$value= $value.",'".$row->soal3."'";}
						if($i == 3){$value= $value.",'".$row->soal4."'";}
						if($i == 4){$value= $value.",'".$row->soal5."'";}
					}
					$isi['soal']			= $this->db->query("SELECT * FROM tbsoal where kd_soal in ($value)");
			} else{
					$isi['soal']			= $this->db->query("SELECT * FROM tbsoal where kd_bab = '".$var_bab."' order by rand() limit 5");
					$value 					= "";
					$loop					= 1;
					foreach ($isi['soal'] ->result() as $row) {
						if($loop == 1){
							$value= $value."'".$row->kd_soal."'";
						}else{
							$value= $value.",'".$row->kd_soal."'";
						}
						$loop++;
					}
					$this->db->query ("INSERT INTO  `tbtemp` (
																`npm` ,
																`soal1` ,
																`soal2` ,
																`soal3` ,
																`soal4` ,
																`soal5` ,
																`jawab1` ,
																`jawab2` ,
																`jawab3` ,
																`jawab4` ,
																`jawab5`
																)
																VALUES (
																'$npm',  $value, NULL , NULL , NULL , NULL , NULL
																)");
			}
			$icon 	= '';
			$key					= $this->session->userdata('npm');
			$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");





			$this->load->view('tugasakhir/mulai_tugasakhir',$isi);
		}

	}

	public function selesai($var_Pertemuan)
	{
			$npm		= $this->session->userdata('npm');
			$data		= $this->db->query("SELECT * FROM tbtemp where npm = '$npm' ");
			if ($data->num_rows() > 0 ){
					$value1 					= "";
					$value2 					= "";
					$value3 					= "";
					$value4 					= "";
					$value5 					= "";
					$row 					= $data->row();
					for ($i = 0; $i < 5 ; $i++) {
						if($i == 0){
							$value1 = $row->soal1;
						}
						if($i == 1){
							$value2 = $row->soal2;
						}
						if($i == 2){
							$value3 = $row->soal3;
						}
						if($i == 3){
							$value4 = $row->soal4;
						}
						if($i == 4){
							$value5 = $row->soal5;
						}
					}
					$isi['soal']			= $this->db->query("SELECT * FROM tbsoal where kd_soal in ('$value1',
																'$value2','$value3','$value4','$value5')
																ORDER BY
																	CASE kd_soal
																		when '$value1' then 1
																		when '$value2' then 2
																		when '$value3' then 3
																		when '$value4' then 4
																		when '$value5' then 5
																		else 6
																	END");
					$isi['cek']				= array();
					$isi['jawab']			= array();
					$isi['nilai']			= 0;
					$isi['symbol']			= array();
					$i = 0;
					foreach ($isi['soal']->result() as $rows) {
						if($i == 0){
							if($row->jawab1 == $rows->kunci_jaw){$isi['nilai'] += 4; array_push($isi['cek'], 'Benar');}
							else {array_push($isi['cek'],'Salah');}
							if($row->jawab1 =='jaw_a') {
								array_push($isi['jawab'],array('checked', 'disabled', 'disabled', 'disabled') );
							}
							else if($row->jawab1 =='jaw_b') {
								array_push($isi['jawab'],array('disabled', 'checked', 'disabled', 'disabled') );
							}
							else if($row->jawab1 =='jaw_c') {
								array_push($isi['jawab'],array('disabled', 'disabled', 'checked', 'disabled') );
							}
							else if($row->jawab1 =='jaw_d') {
								array_push($isi['jawab'],array('disabled', 'disabled', 'disabled', 'checked') );
							}
							else array_push($isi['jawab'],array('disabled', 'disabled', 'disabled', 'disabled') );
						}
						if($i == 1){
							if($row->jawab2 == $rows->kunci_jaw){$isi['nilai'] += 4; array_push($isi['cek'], 'Benar');}
							else {array_push($isi['cek'],'Salah');}
							if($row->jawab2 =='jaw_a') {
								array_push($isi['jawab'],array('checked', 'disabled', 'disabled', 'disabled') );
							}
							else if($row->jawab2 =='jaw_b') {
								array_push($isi['jawab'],array('disabled', 'checked', 'disabled', 'disabled') );
							}
							else if($row->jawab2 =='jaw_c') {
								array_push($isi['jawab'],array('disabled', 'disabled', 'checked', 'disabled') );
							}
							else if($row->jawab2 =='jaw_d') {
								array_push($isi['jawab'],array('disabled', 'disabled', 'disabled', 'checked') );
							}
							else array_push($isi['jawab'],array('disabled', 'disabled', 'disabled', 'disabled') );
						}
						if($i == 2){
							if($row->jawab3 == $rows->kunci_jaw){$isi['nilai'] += 4; array_push($isi['cek'], 'Benar');}
							else {array_push($isi['cek'],'Salah');}
							if($row->jawab3 =='jaw_a') {
								array_push($isi['jawab'],array('checked', 'disabled', 'disabled', 'disabled') );
							}
							else if($row->jawab3 =='jaw_b') {
								array_push($isi['jawab'],array('disabled', 'checked', 'disabled', 'disabled') );
							}
							else if($row->jawab3 =='jaw_c') {
								array_push($isi['jawab'],array('disabled', 'disabled', 'checked', 'disabled') );
							}
							else if($row->jawab3 =='jaw_d') {
								array_push($isi['jawab'],array('disabled', 'disabled', 'disabled', 'checked') );
							}
							else array_push($isi['jawab'],array('disabled', 'disabled', 'disabled', 'disabled') );
						}
						if($i == 3){
							if($row->jawab4 == $rows->kunci_jaw){$isi['nilai'] += 4; array_push($isi['cek'], 'Benar');}
							else {array_push($isi['cek'],'Salah');}
							if($row->jawab4 =='jaw_a') {
								array_push($isi['jawab'],array('checked', 'disabled', 'disabled', 'disabled') );
							}
							else if($row->jawab4 =='jaw_b') {
								array_push($isi['jawab'],array('disabled', 'checked', 'disabled', 'disabled') );
							}
							else if($row->jawab4 =='jaw_c') {
								array_push($isi['jawab'],array('disabled', 'disabled', 'checked', 'disabled') );
							}
							else if($row->jawab4 =='jaw_d') {
								array_push($isi['jawab'],array('disabled', 'disabled', 'disabled', 'checked') );
							}
							else array_push($isi['jawab'],array('disabled', 'disabled', 'disabled', 'disabled') );
						}
						if($i == 4){
							if($row->jawab5 == $rows->kunci_jaw){$isi['nilai'] += 4; array_push($isi['cek'], 'Benar');}
							else {array_push($isi['cek'],'Salah');}

							if($row->jawab5 =='jaw_a') {
								array_push($isi['jawab'],array('checked', 'disabled', 'disabled', 'disabled') );

							}
							else if($row->jawab5 =='jaw_b') {
								array_push($isi['jawab'],array('disabled', 'checked', 'disabled', 'disabled') );
							}
							else if($row->jawab5 =='jaw_c') {
								array_push($isi['jawab'],array('disabled', 'disabled', 'checked', 'disabled') );
							}
							else if($row->jawab5 =='jaw_d') {
								array_push($isi['jawab'],array('disabled', 'disabled', 'disabled', 'checked') );
							}
							else array_push($isi['jawab'],array('disabled', 'disabled', 'disabled', 'disabled') );
						}
					$i++;
					}

					$kehadiran1 = 40;
					$var_NPM	= $this->session->userdata('npm');
					$var_Nilai 	= $isi['nilai'];

					if ($var_Nilai == 0 )  
					{
						$var_Nilai = 2;
					}

					$this->load->model('model_data');
					$query 	= $this->model_data->getdatanilai($var_NPM);
					if ($query->num_rows()>0)
					{
						$this->model_data->updatenilaita($var_Nilai,$var_NPM,$var_Pertemuan);
					}

					// $this->db->query("DELETE tbtemp WHERE npm = '".$var_NPM."'");
			}
			
			$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$var_NPM."'");
			$this->load->view('tugasakhir/selesai_tugasakhir',$isi);
	}


}


?>
