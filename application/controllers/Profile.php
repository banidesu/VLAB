<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index (){
	}
	public function asisten(){
		if(!$this->session->userdata('asisten')){
			redirect('login');
		}

		$_GET['ubah'] = isset($_GET['ubah']) ? $_GET['ubah'] : "";
		$isi['valid'] = "";
		$key = $this->session->userdata('npm');
		if ( isset($_POST['ubah'])) 
		{
			$config['upload_path'] 		='./assets/uploads/images/asisten';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']			= 10000;
			$config['max_width']  		= 300;
			$config['max_height']  		= 300;
			
			$this->load->library('upload', $config);
			$this->load->model('model_data');
			if ( ! $this->upload->do_upload())
			{
				
				$error = array('error' => $this->upload->display_errors());
				redirect('Profile/asisten?ubah=gagal');
				
			}
			else
			{	
				$data['upload_data'] = $this->upload->data();
				$filename = $data['upload_data']['file_name'];
				$this->db->query("UPDATE tbasisten SET foto = '".$filename."' WHERE npm = '".$key."' ");
				redirect('Profile/asisten?ubah=sukses');
			}
		}

		if (isset($_POST['update'])) 
		{
			$var_nama = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap'] : "";
			$var_username = isset($_POST['username']) ? $_POST['username'] : "";
			$var_password = isset($_POST['password']) ? $_POST['password'] : "";
			$var_Query = "
							UPDATE tbasisten
								SET 
			";
			if ($var_nama != "" ) 
			{
				$var_Query .= "nama_lengkap = '".$var_nama."' ";
			}

			if ($var_username != "" ) 
			{
				$var_Query .= ", username = '".$var_username."' ";
			}

			if ($var_password != "" ) 
			{
				$var_Query .= ", password = '".$var_password."' ";
			}

			$var_Query .= "WHERE npm = '".$key."' ";
			$this->db->query($var_Query);
			redirect('Profile/asisten?ubah=sukses');
		}

		if ($_GET['ubah'] == "sukses") 
		{
			$isi['valid'] = "<div class='alert alert-info'>
								<button type='button' class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
								</button>
								<strong>Sukses!!</strong>
								Data berhasil diubah.
								<br />
							</div>
			";
		}
		if ($_GET['ubah'] == 'gagal') 
		{
			$isi['valid'] = "<div class='alert alert-danger'>
								<button type='button' class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
								</button>
								<strong>Gagal Upload!!</strong>
								Format Foto Salah
								<br />
							</div>
			";
		}

		$isi['content'] 		= 'asisten/profile';
		$isi['judul']			= 'Info Profile' ;
		$isi['subjudul']		= '';
		$isi['dashboard']		= '';
		$isi['matkul']			= '';
		$isi['deviden']			= '';
		$isi['leverage']		= '';
		$isi['sdeviden']		= '';
		$isi['sleverage']		= '';
		$isi['tentang']			= '';
		$isi['datapraktikan']	= '';
		$isi['soal']			= '';
		$isi['ujian']			= '';
		$isi['datanilai']		= '';
		$isi['data_matkul']		= $this->db->query("SELECT * FROM tbmatkul order by nama_matkul ASC");
		$key					= $this->session->userdata('kd_asisten');
		$isi['foto']			= $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");
		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');
	}

	public function praktikan(){
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');
		}
		$_GET['ubah'] = isset($_GET['ubah']) ? $_GET['ubah'] : "";
		$isi['valid'] = "";
		$key = $this->session->userdata('npm');
		if ( isset($_POST['ubah'])) 
		{
			$config['upload_path'] 		='./assets/uploads/images/praktikan';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']			= 10000;
			$config['max_width']  		= 300;
			$config['max_height']  		= 300;
			
			$this->load->library('upload', $config);
			$this->load->model('model_data');
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				redirect('profile/praktikan?ubah=sukses');
				
			}
			else
			{	
				$data['upload_data'] = $this->upload->data();
				$filename = $data['upload_data']['file_name'];
				$this->db->query("UPDATE tbpraktikan SET foto = '".$filename."' WHERE npm = '".$key."' ");
				redirect('Profile/praktikan?ubah=sukses');
			}
		}

		if (isset($_POST['update'])) 
		{
			$var_nama = isset($_POST['nama']) ? $_POST['nama'] : "";
			$var_username = isset($_POST['username']) ? $_POST['username'] : "";
			$var_password = isset($_POST['password']) ? $_POST['password'] : "";
			$var_Query = "
							UPDATE tbpraktikan
								SET 
			";
			if ($var_nama != "" ) 
			{
				$var_Query .= "nama = '".$var_nama."' ";
			}

			if ($var_username != "" ) 
			{
				$var_Query .= ", username = '".$var_username."' ";
			}

			if ($var_password != "" ) 
			{
				$var_Query .= ", password = '".$var_password."' ";
			}

			$var_Query .= "WHERE npm = '".$key."' ";
			$this->db->query($var_Query);
			redirect('Profile/praktikan?ubah=sukses');
		}

		if ($_GET['ubah'] == "sukses") 
		{
			$isi['valid'] = "<div class='alert alert-info'>
								<button type='button' class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
								</button>
								<strong>Sukses!!</strong>
								Data berhasil diubah.
								<br />
							</div>
			";
		}


		if ($_GET['ubah'] == "gagal") 
		{
			$isi['valid'] = "<div class='alert alert-danger'>
								<button type='button' class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
								</button>
								<strong>Gagal Upload!!</strong>
								Format Foto Salah
								<br />
							</div>
			";
		}

		$isi['content'] 		= 'praktikan/profile';
		$isi['judul']			= 'Info Profile';
		$isi['subjudul']		= '';
		$isi['dashboard']		= '';
		$isi['lappendahuluan']	= '';
		$isi['lpmk2']			= '';
		$isi['lpor2']			= '';
		$isi['lpinterjar']		= '';
		$isi['lpecom']			= '';
		$isi['tugasakhir']		= '';
		$isi['tamk2']			= '';
		$isi['taro2']			= '';
		$isi['tainterjar']		= '';
		$isi['taecom']			= '';
		$isi['tentang']			= '';
		$isi['ujian']			= '';
		
		$isi['menu_logic']		= $this->db->query("SELECT kelas FROM tbpraktikan");
		
		$this->load->view('praktikan/header_praktikan',$isi);
		$this->load->view('praktikan/menu_praktikan',$isi);
		$this->load->view('praktikan/content_praktikan',$isi);
		$this->load->view('praktikan/footer_praktikan');
	}

	public function admin()
	{
		if(!$this->session->userdata('asisten')){
			redirect('dashboard');
		}
		$isi['content'] = 'admin/profile';
		$isi['judul'] = 'Info Profile';
		$isi['subjudul'] = '';
		$isi['dashboard'] = 'class="active"';
		$isi['databerita'] = '';
		$isi['datamodul'] = '';
		$isi['dataasisten'] = '';
		$isi['datapraktikum'] = '';
		$isi['tentang'] = '';
		
		$this->load->view('admin/header_admin',$isi);
		$this->load->view('admin/menu_admin',$isi);
		$this->load->view('admin/content_admin',$isi);
		$this->load->view('admin/footer_admin');
	}

	function updateavatarpraktikan()
	{	
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');
		}

		


		$config['upload_path'] 		='C:\xampp\htdocs\pi\assets\uploads\images';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '100000';
		$config['max_width']  		= '2000';
		$config['max_height']  		= '2000';
		$key						= $this->session->userdata('npm');
		$this->load->library('upload', $config);
		$this->load->model('model_data');
		if ( ! $this->upload->do_upload())
		{
		
			$error = array('error' => $this->upload->display_errors());
			$isi['content'] 		= 'praktikan/profile';
			$isi['judul']			= 'Info Profile';
			$isi['subjudul']		= '';
			$isi['dashboard']		= '';
			$isi['lappendahuluan']	= '';
			$isi['tdeviden']		= '';
			$isi['tleverage']		= '';
			$isi['materi']			= '';
			$isi['mdeviden']		= '';
			$isi['mleverage']		= '';
			$isi['software']		= '';
			$isi['sdeviden']		= '';
			$isi['sleverage']		= '';
			$isi['tentang']			= '';
			$isi['ujian']			= '';
			$key					= $this->session->userdata('npm');
			$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
			$this->load->view('praktikan/header_praktikan',$isi);
			$this->load->view('praktikan/menu_praktikan',$isi);
			$this->load->view('praktikan/content_praktikan',$isi);
			$this->load->view('praktikan/footer_praktikan');
		}
		else
		{	
			$data['upload_data'] = $this->upload->data();
			$filename = $data['upload_data']['file_name'];
			$this->model_data->updateavatarpraktikan($filename,$key);
			// $data = array('upload_data' => $this->upload->data());
			//$this->load->view('upload_sukses',$data);
			$isi['content'] 		= 'praktikan/profile';
			$isi['judul']			= 'Info Profile';
			$isi['subjudul']		= '';
			$isi['dashboard']		= '';
			$isi['lappendahuluan']	= '';
			$isi['tdeviden']		= '';
			$isi['tleverage']		= '';
			$isi['materi']			= '';
			$isi['mdeviden']		= '';
			$isi['mleverage']		= '';
			$isi['software']		= '';
			$isi['sdeviden']		= '';
			$isi['sleverage']		= '';
			$isi['tentang']			= '';
			$isi['ujian']			= '';
			$key					= $this->session->userdata('npm');
			$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
			$this->load->view('praktikan/header_praktikan',$isi);
			$this->load->view('praktikan/menu_praktikan',$isi);
			$this->load->view('praktikan/content_praktikan',$isi);
			$this->load->view('praktikan/footer_praktikan');
		}

		
	}


	function updateavatarasisten()
	{	
		if(!$this->session->userdata('asisten')){
			redirect('beranda');
		}
	
		$config['upload_path'] 		='C:\xampp\htdocs\pi\assets\uploads\images';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '100000';
		$config['max_width']  		= '2000';
		$config['max_height']  		= '2000';
		$key						= $this->session->userdata('kd_asisten');
		$this->load->library('upload', $config);
		$this->load->model('model_data');
		if ( ! $this->upload->do_upload())
		{
		
			$error = array('error' => $this->upload->display_errors());
			$isi['content'] 		= 'asisten/profile';
			$isi['judul']			= 'Info Profile';
			$isi['subjudul']		= '';
			$isi['dashboard']		= '';
			$isi['deviden']			= '';
			$isi['leverage']		= '';
			$isi['sdeviden']		= '';
			$isi['sleverage']		= '';
			$isi['tentang']			= '';
			$isi['datapraktikan']	= '';
			$isi['soal']			= '';
			$isi['ujian']			= '';
			$key					= $this->session->userdata('kd_asisten');
			$isi['foto']			= $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");
			$this->load->view('asisten/header_asisten',$isi);
			$this->load->view('asisten/menu_asisten',$isi);
			$this->load->view('asisten/content_asisten',$isi);
			$this->load->view('asisten/footer_asisten');
		}
		else
		{	
			$data['upload_data'] = $this->upload->data();
			$filename = $data['upload_data']['file_name'];
			$this->model_data->updateavatarasisten($filename,$key);
			// $data = array('upload_data' => $this->upload->data());
			//$this->load->view('upload_sukses',$data);
			$isi['content'] 		= 'asisten/profile';
			$isi['judul']			= 'Info Profile';
			$isi['subjudul']		= '';
			$isi['dashboard']		= '';
			$isi['deviden']			= '';
			$isi['leverage']		= '';
			$isi['sdeviden']		= '';
			$isi['sleverage']		= '';
			$isi['tentang']			= '';
			$isi['datapraktikan']	= '';
			$isi['soal']			= '';
			$isi['ujian']			= '';

			$key					= $this->session->userdata('kd_asisten');
			$isi['foto']			= $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");
			$this->load->view('asisten/header_asisten',$isi);
			$this->load->view('asisten/menu_asisten',$isi);
			$this->load->view('asisten/content_asisten',$isi);
			$this->load->view('asisten/footer_asisten');
		}

		
	}
}