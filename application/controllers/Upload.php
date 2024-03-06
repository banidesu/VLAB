<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{	
		// if(!$this->session->userdata('asisten')){
		// 	redirect('beranda');
		// }
		
		$this->load->view('upload', array('error' => ' ' ));
	}

	function do_upload_pdf()
	{
		$config['upload_path'] 		='C:\xampp\htdocs\pi\assets\uploads\pdf';
		$config['allowed_types'] 	= 'pdf';
		$config['max_size']			= '100000';
		$config['max_width']  		= '2000';
		$config['max_height']  		= '2000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_sukses', $data);
		}
	}

	function do_upload_img()
	{
	
		$config['upload_path'] 		='C:\xampp\htdocs\pi\assets\uploads\images';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '100000';
		$config['max_width']  		= '2000';
		$config['max_height']  		= '2000';

		$this->load->library('upload', $config);
		$this->load->model('model_data');
		if ( ! $this->upload->do_upload())
		{
		
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload', $error);
		}
		else
		{	
			$data['upload_data'] = $this->upload->data();
			$filename = $data['upload_data']['file_name'];
			$this->model_data->cobaUpload($filename);
			// $data = array('upload_data' => $this->upload->data());
			$this->load->view('upload_sukses',$data);
		}
	}

}
?>