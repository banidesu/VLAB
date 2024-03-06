<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_model 
{
	public function getloginasisten($u,$p) 
	{
			$this->db->where('username',$u);
			$this->db->where('password',$p);
			$query = $this->db->get('tbasisten');
			if ( $query->num_rows()>0 )
			{
				$row 	= $query->row();
				$sess 	= array('kd_asisten' => $row->kd_asisten,
								'npm' => $row->npm,
								'kelas' => $row->kelas,
								'username' => $row->username,
								'password' => $row->password,
								'nama_lengkap' => $row->nama_lengkap,
								'status' => $row->status,
								'foto' => $row->foto,
								'asisten' => true);
				$this->session->set_userdata($sess);
				redirect('beranda');
			}
			else
			{
				$this->session->set_flashdata('info_a','username atau password salah !!!');
				redirect('login');
			}
	}

 	public function getloginpraktikan($username,$password) 
 	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('tbpraktikan');
			if ($query->num_rows()>0)
			{
				$row 	= $query->row();
				$sess 	= array('npm' => $row->npm,
								'nama' => $row->nama,
								'username' => $row->username,
								'password' => $row->password,
								'kelas' => $row->kelas,
								'foto' => $row->foto,
								'praktikan' => true);
				$this->session->set_userdata($sess);
				redirect('beranda');
			}
			else
			{
				$this->session->set_flashdata('info_p','username atau password salah !!!');
				redirect('beranda');
			}
	}

	public function getloginadmin($username,$password) 
 	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('tbadmin');
			if ($query->num_rows()>0)
			{
				$row 	= $query->row();
				$sess 	= array('kd_admin' => $row->kd_admin,
								'nama' => $row->nama,
								'username' => $row->username,
								'password' => $row->password,
								'foto' => $row->foto,
								'admin' => true);
				$this->session->set_userdata($sess);
				redirect('beranda');
			}
			else
			{
				$this->session->set_flashdata('info_p','username atau password salah !!!');
				redirect('login/admin');
			}
	}
}
