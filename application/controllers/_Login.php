<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_login');
		if($this->session->userdata('praktikan')){
			redirect('home/praktikan');
		} else if ($this->session->userdata('asisten')){
			redirect('home/asisten');
		}
	}

	public function index()
	{
			$data['User'] = "Asisten";
			$this->load->view('home/login', $data);
		
	}

	public function GetLoginAsisten()
	{
			
			$u = $this->input->post('username');
			$p = $this->input->post('password');
			$this->model_login->getloginasisten($u,$p);
	} 

	public function GetLoginPraktikan()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->model_login->getloginpraktikan($username,$password);
	} 

	public function admin()
	{
		$data['User'] = "Admin";
		$this->load->view('home/login',$data);
	}

	public function GetLoginAdmin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->model_login->getloginadmin($username,$password);
	} 



}


?>