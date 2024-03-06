<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mulai_ta extends CI_Controller {


public function BMK21(){
		$npm			= $this->session->userdata('npm');
		$kehadiran1 	= 40;
		$data			= $this->db->query("SELECT * FROM tbtemp where npm = '$npm' ");
		if ($data -> num_rows > 0 ){
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
				$isi['soal']			= $this->db->query("SELECT * FROM tbsoal where kd_soal = 'BMK21' order by rand() limit 5");
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
				$this->db->query ("INSERT INTO  `tbtemp` ('npm`,`soal1`,`soal2`,`soal3`,`soal4`,`soal5`,`jawab1`,`jawab2`,`jawab3`,`jawab4`,`jawab5`)
													VALUES ('$npm',  $value, NULL , NULL , NULL , NULL , NULL)");
												}
				$key 	= $this->session->userdata('npm');
				$icon 	= '';
				$data 	= $kehadiran1 ;
				$this->load->model('model_data');
				$query 	= $this->model_data->getdatanilai($key);
				if ($query->num_rows()>0)
				{
					$this->model_data->updatenilaikehadiran1($data,$key);
				}
				$key					= $this->session->userdata('npm');
				$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
				$this->load->view('tp_kb',$isi);

	}
}
