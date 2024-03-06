<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_scurity extends CI_model {

	
	public function getscurityasisten()
	{
		$username = $this->session->userdata('username');
			if(empty($username))
			{
				$this->session->sess_destroy();
				redirect('login');

			}
		}

	public function getscuritypraktikan()
	{
		$npm = $this->session->userdata('npm');
		if(empty($npm))
		{
			$this->session->sess_destroy();
			redirect('beranda');
		}
	}

}
