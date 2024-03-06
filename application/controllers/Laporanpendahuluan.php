<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporanpendahuluan extends CI_Controller {


	public function index()
	{
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');
		}
		$isi['content'] 		= 'laporan_pendahuluan/index';
		$isi['judul']			= 'Laporan Pendahuluan';
		$isi['subjudul']		= '';
		$isi['dashboard']		= '';
		$isi['lappendahuluan']	= 'class="open active"';
		$isi['lpmk2']			= '';
		$isi['lpor2']			= '';
		$isi['lpinterjar']		= '';
		$isi['lpecom']			= '';
		$isi['tugasakhir']		= '';
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
		$isi['content'] 		= 'laporan_pendahuluan/bab_activitylab';
		$isi['judul']			= 'Activity Lab';
		$isi['subjudul']		= 'Manajemen Keuangan 2';
		$isi['dashboard']		= '';
		$isi['lappendahuluan']	= 'class="open active"';
		$isi['lpmk2']			= 'class="active"';
		$isi['lpor2']			= '';
		$isi['lpinterjar']		= '';
		$isi['lpecom']			= '';
		$isi['tugasakhir']		= '';
		$isi['tamk2']			= '';
		$isi['taro2']			= '';
		$isi['tainterjar']		= '';
		$isi['taecom']			= '';
		$isi['nama'] 			= $this->session->userdata('nama');
		$isi['tentang']			= '';
		$isi['ujian']			= '';
		$key					= $this->session->userdata('npm');
		$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
		$isi['data']			= $this->db->query("SELECT * FROM tbbab WHERE kd_bab LIKE 'BMK%' ");
		$isi['menu_logic']		= $this->db->query("SELECT kelas FROM tbpraktikan where npm = '".$key."'");
		$this->load->view('praktikan/header_praktikan',$isi);
		$this->load->view('praktikan/menu_praktikan',$isi);
		$this->load->view('praktikan/content_praktikan',$isi);
		$this->load->view('praktikan/footer_praktikan');
	}
	public function ro2(){
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');
		}
		$isi['content'] 		= 'laporan_pendahuluan/bab_activitylab';
		$isi['judul']			= 'Activity Lab';
		$isi['subjudul']		= 'Riset Oprasional 2';
		$isi['dashboard']		= '';
		$isi['lappendahuluan']	= 'class="open active"';
		$isi['lpmk2']			= '';
		$isi['lpor2']			= 'class="active"';
		$isi['lpinterjar']		= '';
		$isi['lpecom']			= '';
		$isi['tugasakhir']		= '';
		$isi['tamk2']			= '';
		$isi['taro2']			= '';
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
		$isi['content'] 		= 'laporan_pendahuluan/bab_activitylab';
		$isi['judul']			= 'Activity Lab';
		$isi['subjudul']		= 'Internet Dan Jaringan ';
		$isi['dashboard']		= '';
		$isi['lappendahuluan']	= 'class="open active"';
		$isi['lpmk2']			= '';
		$isi['lpor2']			= '';
		$isi['lpinterjar']		= 'class="active"';
		$isi['lpecom']			= '';
		$isi['tugasakhir']		= '';
		$isi['tamk2']			= '';
		$isi['taro2']			= '';
		$isi['tainterjar']		= '';
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
		$isi['content'] 		= 'laporan_pendahuluan/bab_activitylab';
		$isi['judul']			= 'Activity Lab';
		$isi['subjudul']		= 'E-Commerce';
		$isi['dashboard']		= '';
		$isi['lappendahuluan']	= 'class="open active"';
		$isi['lpmk2']			= '';
		$isi['lpor2']			= '';
		$isi['lpinterjar']		= '';
		$isi['lpecom']			= 'class="active"';
		$isi['tugasakhir']		= '';
		$isi['tamk2']			= '';
		$isi['taro2']			= '';
		$isi['tainterjar']		= '';
		$isi['taecom']			= '';
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



//Fungsi ini untuk menampilkan data soal dari database



	public function selesai_kb(){
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
				$key 	= $this->session->userdata('npm');
				$data 	= $isi['nilai'];
				$this->load->model('model_data');
				$query 	= $this->model_data->getdatanilai($key);
				if ($query->num_rows()>0)
				{
					$this->model_data->updatenilaita1($data,$key);
				}
		}
		$key							= $this->session->userdata('npm');
		$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
		$this->load->view('selesai',$isi);
	}




}
