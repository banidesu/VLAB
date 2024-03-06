<?php

class Activity_lab extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('asisten') || $this->session->userdata('praktikan')){
			redirect('home');
		}else{
			$this->load->view('beranda');
		}
	}

	// ============================================= ACTIVITY LAB MANAJEMEN KEUANGAN 2 =================================== //

	public function Mulai($var_Bab)
	{
		if(!$this->session->userdata('praktikan'))
		{
			redirect('beranda');
		}

		$var_Query = "
						SELECT 
							tbbab.link_modvid
							, tbbab.kd_bab
							, tbbab.nama_bab
							, tbmatkul.nama_matkul
								FROM tbbab
									INNER JOIN tbmatkul
										ON 
											tbbab.kd_matkul = tbmatkul.kd_matkul
									INNER JOIN tbaktivasi2
										ON 
											tbbab.kd_bab = tbaktivasi2.kd_bab
									WHERE tbbab.kd_bab = '".$var_Bab."'
									AND tbaktivasi2.status_al = 1
		";	
		$isi['data_modvid'] = $this->db->query($var_Query);
		if ($isi['data_modvid']->num_rows() < 1 ) 
		{
			redirect('beranda');
		}

		$npm = $this->session->userdata('npm');

		$var_TempBab = substr($var_Bab, 0, 5);
		$var_Query = "
						SELECT * FROM tbtemp_al WHERE npm = ".$npm." AND soal LIKE '%".$var_TempBab."%'
		";	
		$Get_ValueTemp = $this->db->query($var_Query);
		if ($Get_ValueTemp->num_rows() > 0) 
		{
			redirect('home');
		}
		else
		{
			$isi['soal_al']	= $this->db->query("SELECT * FROM tbsoal_al where kd_bab = '".$var_Bab."' order by rand() limit 1 ");
			$var_Query = "
							SELECT *
							FROM 
								tbbab
							WHERE
								kd_bab = '".$var_Bab."'
			";
			$Matkul = "";
			$Bab = "";
			$Mingggu = "";
			$MataKuliah = $this->db->query($var_Query);
			foreach ($MataKuliah->result() as $Row) 
			{
				$Matkul = $Row->matkul;
				$Bab = $Row->nama_bab;
				$Mingggu = $Row->minggu;
			}

			$var_Npm = $this->session->userdata('npm');
			$icon = '';
			$var_Nilai	= 40;
			$this->load->model('model_data');
			$query 	= $this->model_data->getdatanilai($var_Npm);
			if ($query->num_rows()>0)
			{
				$this->model_data->updatenilaikehadiran($var_Nilai,$var_Npm,$Mingggu);
			}

			$isi['namamatkul']= $Matkul;
			$isi['judulbab'] = $Bab;
			$isi['foto'] = $this->db->query("SELECT foto from tbpraktikan where npm = '".$var_Npm."'");
			$isi['menu_logic']= $this->db->query("SELECT kelas FROM tbpraktikan where npm = '".$var_Npm."'");
			$this->load->view('activitylab/mulai_activitylab',$isi);
		}
	}


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
							AND tbaktivasi2.status_al = 1
							AND tbmatkul.kd_matkul = '".$var_KdMatkul."'
		";
		$isi['var_Query'] = $var_Query;
		$isi['ListKelas'] = $this->db->query($var_Query);
		$var_TempMatkul = "";
		foreach ($isi['ListKelas']->result() as $Row ) 
		{
			$var_TempMatkul = $Row->nama_matkul;
		}

		$isi['content'] = 'activitylab/Index';
		$isi['judul'] = 'Aktifitas Lab';
		$isi['subjudul'] = $var_TempMatkul;
		$isi['dashboard'] = '';
		$isi['lappendahuluan'] = 'class="open active"';
		$isi['tugasakhir'] = '';
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
								FROM tbbab
									INNER JOIN tbmatkul
										ON 
											tbbab.kd_matkul = tbmatkul.kd_matkul
									INNER JOIN tbaktivasi2
										ON 
											tbbab.kd_bab = tbaktivasi2.kd_bab
									WHERE tbbab.kd_bab = '".$var_BabModvid."'
									AND tbaktivasi2.status_al = 1
		";	
		$isi['data_modvid'] = $this->db->query($var_Query);

		$DataModvid = $this->db->query($var_Query);


		foreach ( $DataModvid->result() as $Row )
		{
			$isi['link_modvid'] = $Row->link_modvid;
			$isi['kd_bab'] = $Row->kd_bab;
			$isi['nama_bab'] = $Row->nama_bab;
			$isi['nama_matkul'] = $Row->nama_matkul;
		}

		
		if ($isi['data_modvid']->num_rows() < 1 ) 
		{
			redirect('beranda');
		}

		$isi['content'] = 'activitylab/Modvid';
		$isi['judul'] = 'Aktifitas Lab';
		$isi['subjudul'] = $isi['nama_bab'];
		$isi['dashboard'] = '';
		$isi['lappendahuluan'] = 'class="open active"';
		$isi['tugasakhir'] = '';
		$isi['tentang'] = '';
		$isi['ujian'] = '';
		
		$this->load->view('praktikan/header_praktikan',$isi);
		$this->load->view('praktikan/menu_praktikan',$isi);
		$this->load->view('praktikan/content_praktikan',$isi);
		$this->load->view('praktikan/footer_praktikan');

	}
}

?>
