<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ujian_praktikan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','download'));				
	}

public function index()
	{
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');	
		}
		$isi['content'] = 'ujian/index';
		$isi['judul'] = 'Ujian';
		$isi['subjudul'] = '';
		$isi['dashboard'] = '';
		$isi['lappendahuluan'] = '';
		$isi['tugasakhir'] = '';
		$isi['tentang'] = '';
		$isi['ujian'] = '"class = active"';
		$key = $this->session->userdata('npm');
		$isi['foto'] = $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
		$isi['menu_logic'] = $this->db->query("SELECT kelas FROM tbpraktikan where npm = '".$key."'");
		
		$this->load->view('praktikan/header_praktikan',$isi);
		$this->load->view('praktikan/menu_praktikan',$isi);
		$this->load->view('praktikan/content_praktikan',$isi);
		$this->load->view('praktikan/footer_praktikan');
	}


	public function downloadujian()
	{
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');	
		}
    	$this->load->helper('download');

		$Query = "
									SELECT
										   tbmatkul.nama_matkul 
										   , tbmatkul.kd_matkul

										FROM
										   tbpraktikan 
										   INNER JOIN
										      tbaktivasi2 
										      ON tbpraktikan.kelas = tbaktivasi2.kelas 
										   INNER JOIN
										      tbbab 
										      ON tbaktivasi2.kd_bab = tbbab.kd_bab 
										   INNER JOIN
										      tbmatkul 
										      ON tbbab.kd_matkul = tbmatkul.kd_matkul 
										WHERE
										   tbpraktikan.kelas = '".$this->session->userdata('kelas')."' 
										GROUP BY
										   tbmatkul.nama_matkul";

					$get_kd_matkul = $this->db->query($Query);

					foreach ($get_kd_matkul->result() as $Row) 
					{
						$kd_matkul = $Row->kd_matkul;
						$nama_matkul = $Row->nama_matkul;
					}
    	$name = 'UJIAN.pdf';
    
 		$soal = $this->db->query('SELECT file from tbujian where nama_matkul = "'.$kd_matkul.'" order by rand() limit 1');
 		foreach ($soal->result() as $value) 
 		{
 			$file = $value->file;
 		}
 		$data = file_get_contents('assets/uploads/pdf/'.$file.''); 
 		force_download($name,$data);
    }

}