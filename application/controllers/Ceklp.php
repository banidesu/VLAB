<?php
class Ceklp extends CI_Controller {
	public function index(){
	}
				public function cek()
				{
				$kd_bab = $this->input->post('kd_bab');

				$minggu = $this->db->query("SELECT minggu FROM tbbab WHERE kd_bab = '".$kd_bab."' ");

				foreach ($minggu->result() as $Row ) 
				{
					$var_Temp_Minggu = $Row->minggu;
				}

				$jawab1 = $this->input->post('jawab1');
				$jawab2 = $this->input->post('jawab2');
				$jawab3 = $this->input->post('jawab3');
				$jawab4 = $this->input->post('jawab4');
				$jawab5 = $this->input->post('jawab5');
				$this->db->where('npm', $this->session->userdata('npm'));
				$this->db->update('tbtemp', array(	'jawab1' => $jawab1 ,
													'jawab2' => $jawab2 ,
													'jawab3' => $jawab3 ,
													'jawab4' => $jawab4 ,
													'jawab5' => $jawab5 ));
				redirect('tugasakhir/selesai/'.$var_Temp_Minggu);
				}

				public function al()
				{

					if(!$this->session->userdata('praktikan'))
					{
						redirect('beranda');
					}

					$config['upload_path'] 		='./assets/uploads/jawabanAL';
					$config['allowed_types'] 	= 'pdf';
					$config['max_size']			= '1000000';
					$config['max_width']  		= '2000';
					$config['max_height']  		= '2000';

					$this->load->library('upload', $config);
					$this->load->model('model_data');
					if ( ! $this->upload->do_upload())
					{
						echo "Gagal Upload";
						$error = array('error' => $this->upload->display_errors());
					}
					else
					{	
						$data['upload_data'] = $this->upload->data();
						$filename = $data['upload_data']['file_name'];
						$jawaban = $this->input->post('jawaban');
						$kd_soal = $this->input->post('kd_soal');
						$npm = $this->session->userdata('npm');

						$var_IdTemp = substr($kd_soal, 0, 4);

						$var_Nilai = 40;
						$var_Query = "
										SELECT minggu FROM tbbab WHERE kd_bab = '".$var_IdTemp."'
						";

						$Get_Valeu_Minggu = $this->db->query($var_Query);

						foreach ($Get_Valeu_Minggu->result() as $Row ) 
						{
							$Id_Temp_Minggu = $Row->minggu;
						}

						$this->model_data->updatenilaikehadiran($var_Nilai,$npm,$Id_Temp_Minggu);
						$this->model_data->Jawab_AL($filename,$jawaban,$kd_soal,$npm);
						redirect('home');
					}	
				}
}
?>
