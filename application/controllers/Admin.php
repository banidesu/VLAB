<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		redirect('beranda');
	}
	
	function berita()
	{
		$data['valid'] = "";

		$_GET['tambah'] = isset($_GET['tambah']) ? $_GET['tambah'] : "";
		$_GET['ubah'] = isset($_GET['ubah']) ? $_GET['ubah'] : "";

		if(!$this->session->userdata('asisten'))
		{
			redirect('dashboard');
		}


		if ( isset($_POST['submit'])) 
		{
			$var_judul = $this->input->post('judul');
			$var_isi = $this->input->post('isi');
			$var_deskripsi = $this->input->post('deskripsi');
			$var_status = $this->input->post('status');
			
			$config['upload_path'] 		='./assets/uploads/images/berita';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']			= 10000;
			$config['max_width']  		= 1024;
			$config['max_height']  		= 768;
			
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
				$tambah_berita = $this->model_data->PostBerita($var_judul, $var_isi , $var_deskripsi, $filename, $var_status);
				redirect('Admin/berita?tambah=sukses');
			}
		}

		if ( isset($_POST['ubah'])) 
		{
			$var_id = $this->input->post('id');
			$var_judul = $this->input->post('judul');
			$var_isi = $this->input->post('isi');
			$var_deskripsi = $this->input->post('deskripsi');

			
			$config['upload_path'] 		='./assets/uploads/images/berita';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']			= 10000;
			$config['max_width']  		= 1024;
			$config['max_height']  		= 768;
			
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
				$tambah_berita = $this->model_data->UpdateBerita($var_id, $var_judul, $var_isi , $var_deskripsi, $filename);
				redirect('Admin/berita?ubah=sukses');
			}
		}

		if ($_GET['tambah'] == "sukses") 
		{
			$data['valid'] = "<div class='alert alert-info'>
								<button type='button' class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
								</button>
								<strong>Sukses!!</strong>
								Data berhasil ditambahkan.
								<br />
							</div>
			";
		}

		if ($_GET['ubah'] == "sukses") 
		{
			$data['valid'] = "<div class='alert alert-info'>
								<button type='button' class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
								</button>
								<strong>Sukses!!</strong>
								Data berhasil diubah.
								<br />
							</div>
			";
		}

		$data['content'] = 'admin/databerita/index';
		$data['judul'] = 'Admin';
		$data['subjudul'] = 'Data Berita';
		$data['dashboard'] = '';
		$data['databerita'] = 'class="active"';
		$data['datamodul'] = '';
		$data['dataasisten'] = '';
		$data['tentang'] = '';
		$data['datapraktikum'] ='';
		$data['DataBerita_Query'] = $this->db->query("SELECT * FROM tbberita ");
		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/menu_admin',$data);
		$this->load->view('admin/content_admin',$data);
		$this->load->view('admin/footer_admin');
	}

	function tambah_berita()
	{
		$data['content'] = 'admin/databerita/tambah_berita';
		$data['judul'] = 'Admin';
		$data['subjudul'] = 'Data Berita';

		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/content_admin',$data);
		$this->load->view('admin/footer_admin');
	}

	function ubah_berita($id)
	{
		$data['data_berita'] = $this->db->query("SELECT * FROM tbberita WHERE id = ".$id." ");

		$data['content'] = 'admin/databerita/ubah_berita';
		$data['judul'] = 'Admin';
		$data['subjudul'] = 'Data Berita';

		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/content_admin',$data);
		$this->load->view('admin/footer_admin');
	}

	function hapus_berita($id)
	{
		$this->db->query("DELETE FROM tbberita WHERE id = ".$id."");
		redirect("Admin/berita");
	}

	function ubah_status_berita()
	{
		$var_id = $this->input->post('id');
		$var_status = $this->input->post('status');
		$this->db->query("UPDATE tbberita SET status = ".$var_status." WHERE id = ".$var_id." ");
		redirect('Admin/berita');
	}

	function modul()
	{
		$data['valid'] = "";

		$_GET['tambah'] = isset($_GET['tambah']) ? $_GET['tambah'] : "";
		$_GET['ubah'] = isset($_GET['ubah']) ? $_GET['ubah'] : "";

		if(!$this->session->userdata('asisten'))
		{
			redirect('dashboard');
		}


		if ( isset($_POST['submit'])) 
		{
			$var_nama = $this->input->post('nama');
			$var_deskripsi = $this->input->post('deskripsi');
			$var_status = $this->input->post('status');

			
			$config['upload_path'] 		= './assets/uploads/pdf/modul';
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
				$tambah_modul = $this->model_data->PostModul($var_nama, $var_deskripsi, $filename, $var_status);
				redirect('Admin/modul?tambah=sukses');
			}
		}

		if ( isset($_POST['ubah'])) 
		{
			$var_id = $this->input->post('id');
			$var_nama = $this->input->post('nama');
			$var_deskripsi = $this->input->post('deskripsi');
			$var_status = $this->input->post('status');

			
			$config['upload_path'] 		= './assets/uploads/pdf/modul';
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
				$ubah_modul = $this->model_data->UpdateModul($var_id, $var_nama, $var_deskripsi, $filename, $var_status );
				redirect('Admin/modul?ubah=sukses');
			}
		}

		if ($_GET['tambah'] == "sukses") 
		{
			$data['valid'] = "<div class='alert alert-info'>
								<button type='button' class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
								</button>
								<strong>Sukses!!</strong>
								Data berhasil ditambahkan.
								<br />
							</div>
			";
		}

		if ($_GET['ubah'] == "sukses") 
		{
			$data['valid'] = "<div class='alert alert-info'>
								<button type='button' class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
								</button>
								<strong>Sukses!!</strong>
								Data berhasil diubah.
								<br />
							</div>
			";
		}

		$data['content'] = 'admin/datamodul/index';
		$data['judul'] = 'Admin';
		$data['subjudul'] = 'Data Modul';
		$data['dashboard'] = '';
		$data['databerita'] = '';
		$data['datamodul'] = 'class="active"';
		$data['dataasisten'] = '';
		$data['datapraktikum'] ='';
		$data['tentang'] = '';
		$data['DataModul_Query'] = $this->db->query("SELECT * FROM tbmodul ORDER BY tanggal_post DESC");
		$data['DataMatkul_Query'] = $this->db->query("SELECT * FROM tbmatkul ORDER BY nama_matkul ASC ");
		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/menu_admin',$data);
		$this->load->view('admin/content_admin',$data);
		$this->load->view('admin/footer_admin');
	}


	function hapus_modul($id)
	{
		$this->db->query("DELETE FROM tbmodul WHERE id = ".$id."");
		redirect("Admin/modul");
	}

	function ubah_status_modul()
	{
		$var_id = $this->input->post('id');
		$var_status = $this->input->post('status');
		$this->db->query("UPDATE tbmodul SET status = ".$var_status." WHERE id = ".$var_id." ");
		redirect('Admin/modul');
	}



	function data_asisten()
	{
		if(!$this->session->userdata('asisten'))
		{
			redirect('dashboard');
		}


		$data['valid'] = "";

		$_GET['tambah'] = isset($_GET['tambah']) ? $_GET['tambah'] : "";
		$_GET['ubah'] = isset($_GET['ubah']) ? $_GET['ubah'] : "";

		if(!$this->session->userdata('asisten'))
		{
			redirect('dashboard');
		}


		if ( isset($_POST['submit'])) 
		{
			$var_kd_asisten = $this->input->post('kd_asisten');
			$var_nama_lengkap = $this->input->post('nama_lengkap');
			$var_kelas = $this->input->post('kelas');
			$var_npm = $this->input->post('npm');
			$var_username = $this->input->post('username');
			$var_password = $this->input->post('password');
			$var_status = $this->input->post('status');

			
			$config['upload_path'] 		= './assets/uploads/images/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']			= 1000;
			$config['max_width']  		= 1024;
			$config['max_height']  		= 768;
			
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
				$tambah_modul = $this->model_data->PostAsisten($var_kd_asisten,$var_nama_lengkap,$var_kelas,$var_npm,$var_username,$var_password,$var_status,$filename);
				redirect('Admin/data_asisten?tambah=sukses');
			}
		}

		if ( isset($_POST['ubah'])) 
		{
			$var_id = $this->input->post('id');
			$var_kd_asisten = $this->input->post('kd_asisten');
			$var_nama_lengkap = $this->input->post('nama_lengkap');
			$var_kelas = $this->input->post('kelas');
			$var_npm = $this->input->post('npm');
			$var_username = $this->input->post('username');
			$var_password = $this->input->post('password');
			$var_status = $this->input->post('status');

			$config['upload_path'] 		= './assets/uploads/images/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']			= 1000;
			$config['max_width']  		= 1024;
			$config['max_height']  		= 768;
			
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
				$ubah_modul = $this->model_data->UpdateAsisten($var_id, $var_kd_asisten,$var_nama_lengkap,$var_kelas,$var_npm,$var_username,$var_password,$var_status,$filename);
				redirect('Admin/data_asisten?ubah=sukses');
			}
		}

		if ($_GET['tambah'] == "sukses") 
		{
			$data['valid'] = "<div class='alert alert-info'>
								<button type='button' class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
								</button>
								<strong>Sukses!!</strong>
								Data berhasil ditambahkan.
								<br />
							</div>
			";
		}

		if ($_GET['ubah'] == "sukses") 
		{
			$data['valid'] = "<div class='alert alert-info'>
								<button type='button' class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
								</button>
								<strong>Sukses!!</strong>
								Data berhasil diubah.
								<br />
							</div>
			";
		}



		$data['content'] = 'admin/dataasisten/index';
		$data['judul'] = 'Admin';
		$data['subjudul'] = 'Data Asisten';
		$data['dashboard'] = '';
		$data['databerita'] = '';
		$data['datamodul'] = '';
		$data['dataasisten'] = 'class="active"';
		$data['tentang'] = '';
		$data['datapraktikum'] ='';
		$data['data_asisten'] = $this->db->query("SELECT * FROM tbasisten  WHERE status = 'Asisten' ORDER BY nama_lengkap ");
		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/menu_admin',$data);
		$this->load->view('admin/content_admin',$data);
		$this->load->view('admin/footer_admin');
	}

	function tambah_asisten()
	{
		if(!$this->session->userdata('asisten'))
		{
			redirect('dashboard');
		}
		$data['content'] = 'admin/dataasisten/tambah_asisten';
		$data['judul'] = 'Admin';
		$data['subjudul'] = 'Tambah Asisten';
		$data['dashboard'] = '';
		$data['databerita'] = '';
		$data['datamodul'] = '';
		$data['dataasisten'] = 'class="active"';
		$data['datapraktikum'] ='';
		$data['tentang'] = '';
		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/menu_admin',$data);
		$this->load->view('admin/content_admin',$data);
		$this->load->view('admin/footer_admin');
	}

	function lihat_asisten($id)
	{
		if(!$this->session->userdata('asisten'))
		{
			redirect('dashboard');
		}
		$data['content'] = 'admin/dataasisten/ubah_asisten';
		$data['judul'] = 'Admin';
		$data['subjudul'] = 'Ubah Asisten';
		$data['dashboard'] = '';
		$data['databerita'] = '';
		$data['datamodul'] = '';
		$data['dataasisten'] = 'class="active"';
		$data['datapraktikum'] ='';
		$data['tentang'] = '';
		$data['data_asisten'] = $this->db->query("SELECT * FROM tbasisten WHERE id = ".$id." ");

		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/menu_admin',$data);
		$this->load->view('admin/content_admin',$data);
		$this->load->view('admin/footer_admin');
	}


	function hapus_asisten($id)
	{
		$this->db->query("DELETE FROM tbasisten WHERE id = ".$id."");
		redirect('Admin/data_asisten');
	}


	function data_praktikum()
	{
		if(!$this->session->userdata('asisten'))
		{
			redirect('dashboard');
		}

		$data['valid'] = "";

		$_GET['tambah'] = isset($_GET['tambah']) ? $_GET['tambah'] : "";
		$_GET['ubah'] = isset($_GET['ubah']) ? $_GET['ubah'] : "";
		$_GET['hapus'] = isset($_GET['hapus']) ? $_GET['hapus'] : "";

		if (isset($_POST['submit'])) 
		{
			$var_kelas = $this->input->post('kelas');
			$var_kd_matkul = $this->input->post('kd_matkul');
			$get_data = $this->db->query("SELECT * FROM tbaktivasi2 WHERE kelas = '".$var_kelas."' ");


			if ($get_data->num_rows() > 0 ) 
			{
				$data['valid'] = "<div class='alert alert-danger'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='ace-icon fa fa-times'></i>
										</button>
										<strong>Gagal!!</strong>
										Kelas sudah terdaftar.
										<br />
									</div>
				";
			}
			else
			{
				$get_kd_bab = $this->db->query("SELECT kd_bab FROM tbbab WHERE kd_matkul = '".$var_kd_matkul."' ");
				foreach ($get_kd_bab->result() as $Row ) 
				{
					$this->db->query("INSERT INTO 
												tbaktivasi2 (kelas , kd_bab, kd_matkul , status_ta, status_al ) 
												values ( '".$var_kelas."'  , '".$Row->kd_bab."', '".$var_kd_matkul."' , 0 , 0 ) ");
					$data['valid'] = "<div class='alert alert-info'>
								<button type='button' class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
								</button>
								<strong>Sukses!!</strong>
								Data berhasil ditambahkan.
								<br />
							</div>
					";
				}


			}

		}

		if ($_GET['hapus'] == 'berhasil') 
		{
			$data['valid'] = "<div class='alert alert-success'>
								<button type='button' class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
								</button>
								<strong>Sukses!!</strong>
								Data berhasil dihapus .
								<br />
							</div>
					";
		}


		$data['data_praktikum'] = $this->db->query("SELECT
													   tbaktivasi2.kelas
                                                       , tbmatkul.nama_matkul 
													   , tbmatkul.kd_matkul
			                                           , tbmatkul.t_ajaran
													FROM
													    tbaktivasi2 
													   INNER JOIN
													      tbbab 
													      ON tbaktivasi2.kd_bab = tbbab.kd_bab 
													   INNER JOIN
													      tbmatkul 
													      ON tbbab.kd_matkul = tbmatkul.kd_matkul
			                                        GROUP BY tbaktivasi2.kelas
		");


		$data['content'] = 'admin/dataaktivasi/index';
		$data['judul'] = 'Admin';
		$data['subjudul'] = 'Data Kelas';
		$data['dashboard'] = '';
		$data['databerita'] = '';
		$data['datamodul'] = '';
		$data['dataasisten'] = '';
		$data['tentang'] = '';
		$data['datapraktikum'] ='class="active"';


		

		$this->load->view('admin/header_admin',$data);
		$this->load->view('admin/menu_admin',$data);
		$this->load->view('admin/content_admin',$data);
		$this->load->view('admin/footer_admin');
	}


	function hapus_praktikum($kelas)
	{
		$this->db->query("DELETE FROM tbaktivasi2 WHERE kelas = '".$kelas."' ");
		redirect('Admin/data_praktikum?hapus=berhasil');	
	}


}