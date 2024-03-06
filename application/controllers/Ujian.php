<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ujian extends CI_Controller {

public function index()
	{
		if(!$this->session->userdata('asisten')){
			redirect('beranda');	
		}
		$isi['content'] 		= 'uploadujian/ujian';
		$isi['judul']			= 'Upload Soal Ujian';
		$isi['subjudul']		= '';
		$isi['dashboard']		= '';
		$isi['matkul']			= '';
		$isi['deviden']			= '';
		$isi['sdeviden']		= '';
		$isi['leverage']		= '';
		$isi['sleverage']		= '';
		$isi['tentang']			= '';
		$isi['datapraktikan']	= '';
		$isi['soal']			= '';
		$isi['ujian']			= 'class="active"';
		$isi['datanilai']		= '';
		$isi['data_matkul']		= $this->db->query("SELECT * FROM tbmatkul order by nama_matkul ASC");
		$isi['dataujian']		= $this->db->query("SELECT tbujian.kd_ujian, tbujian.status , tbujian.tipe_soal , tbmatkul.nama_matkul FROM
														tbujian INNER JOIN tbmatkul ON tbujian.nama_matkul = tbmatkul.kd_matkul");
		$key					= $this->session->userdata('kd_asisten');
		$isi['foto']			= $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");

		
		$isi['doc']	 = $_SERVER['DOCUMENT_ROOT'];
		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');


	}	



	function upload()
	{	
		if(!$this->session->userdata('asisten')){
			redirect('beranda');
		}
	
		$config['upload_path'] 		='./assets/uploads/pdf';
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
			$data['upload_data'] 	= $this->upload->data();
			$filename 				= $data['upload_data']['file_name'];
			$kd_ujian				= $this->input->post('kd_ujian');
			$nama_matkul			= $this->input->post('nama_matkul');
			$tipe_soal				= $this->input->post('tipe_soal');
			$status					= $this->input->post('status');
			$this->model_data->uploadujian($kd_ujian,$nama_matkul,$tipe_soal,$status,$filename);
			redirect('ujian');
		}

		
	}

	public function delete()
	{
		$key = $this->uri->segment(3);
		$this->db->where('kd_ujian',$key);
		$query = $this->db->get('tbujian');
		$this->load->model('model_data');
		$this->model_data->deleteujian($key);
		redirect ('ujian');
	}


	function aktifasi_soal()
	{
		if(!$this->session->userdata('asisten')){
			redirect('beranda');	
		}

		$status = $this->input->post('status');
		$kd_ujian = $this->input->post('kd_ujian');
		$this->db->query("UPDATE tbujian SET status = ".$status." WHERE kd_ujian = '".$kd_ujian."' ");
		redirect('ujian');
}
	function aktifasi_ujian()
	{
		if(!$this->session->userdata('asisten')){
			redirect('beranda');	
		}

		$status = $this->input->post('status');
		$kd_matkul = $this->input->post('kd_matkul');
		$this->db->query("UPDATE tbmatkul SET status = '".$status."' WHERE kd_matkul = '".$kd_matkul."' ");
		redirect('ujian');
}

}