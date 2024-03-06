<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mail extends CI_Controller {


	public function index()
	{
		redirect('Mail/inbox');
	}

	public function sent()
	{
		$isi['status'] = "";
		if(isset($_POST['submit']))
		{
			$var_penerima = $this->input->post('npm_penerima');
			$var_pengirim = $this->session->userdata('npm');
			$var_judul = $this->input->post('judul');
			$var_pesan = $this->input->post('pesan');
			$var_status_pengguna = $this->input->post('status_pengguna');
			$var_status_pesan = 1;
			$var_status_tipe = 1;

			$this->db->query("INSERT INTO tbmail (
													npm_pengirim
													, npm_penerima
													, judul
													, pesan
													, status_pengguna
													, status_pesan
													, status_tipe) 
														values (
																	".$var_pengirim."
																	, ".$var_penerima."
																	, '".$var_judul."'
																	, '".$var_pesan."'
																	, '".$var_status_pengguna."'
																	, ".$var_status_pesan."
																	, ".$var_status_tipe."
																) 
			");

			redirect('mail/sent?status=Terkirim');

		}

		if(isset($_POST['balas']))
		{
			$var_penerima = $this->input->post('npm_penerima');
			$var_pengirim = $this->session->userdata('npm');
			$var_judul = $this->input->post('judul');
			$var_pesan = $this->input->post('pesan');
			$var_status_pengguna = $this->input->post('status_pengguna');
			$var_status_pesan = 1;
			$var_status_tipe = 1;

			$this->db->query("INSERT INTO tbmail (
													npm_pengirim
													, npm_penerima
													, judul
													, pesan
													, status_pengguna
													, status_pesan
													, status_tipe) 
														values (
																	".$var_pengirim."
																	, ".$var_penerima."
																	, '".$var_judul."'
																	, '".$var_pesan."'
																	, '".$var_status_pengguna."'
																	, ".$var_status_pesan."
																	, ".$var_status_tipe."
																) 
			");

			redirect('mail/sent?status=Terbalas');
		}

		if(isset($_GET['status']) == 'Terkirim')
		{
			$isi['status'] = "<div class='alert alert-success'>
								<button type='button' class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
								</button>
								<strong>Pesan Terkirim</strong>
								<br />
							</div>
							";
		}

		if(isset($_GET['status']) == 'Terbalas')
		{
			$isi['status'] = "<div class='alert alert-info'>
								<button type='button' class='close' data-dismiss='alert'>
									<i class='ace-icon fa fa-times'></i>
								</button>
								<strong>Pesan Terbalas</strong>
								<br />
							</div>
							";
		}
		
		$isi['content'] = 'mail/pesan_keluar';
		$isi['judul'] = 'Pesan';
		$isi['subjudul'] = 'Sent';
		$isi['dashboard'] = 'class="active"';

		$isi['data_matkul'] = $this->db->query("SELECT * FROM tbmatkul order by nama_matkul ASC");
		$key = $this->session->userdata('kd_asisten');
		$isi['foto'] = $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");

		if ($this->session->userdata('praktikan')) 
		{
			$isi['lappendahuluan']= '';
			$isi['tugasakhir'] = '';
			$isi['tentang']	= '';
			$isi['ujian'] = '';
			$this->load->view('praktikan/header_praktikan',$isi);
			$this->load->view('praktikan/menu_praktikan',$isi);
			$this->load->view('praktikan/content_praktikan',$isi);
			$this->load->view('praktikan/footer_praktikan');
		}

		if ($this->session->userdata('asisten')) 
		{
			$isi['matkul'] = '';
			$isi['tentang'] = '';
			$isi['datapraktikan'] = '';
			$isi['soal'] = '';
			$isi['ujian'] = '';
			$isi['datanilai']		= '';
			$this->load->view('asisten/header_asisten',$isi);
			$this->load->view('asisten/menu_asisten',$isi);
			$this->load->view('asisten/content_asisten',$isi);
			$this->load->view('asisten/footer_asisten');
		}
	}

	public function inbox()
	{
		$isi['content'] = 'mail/pesan_masuk';
		$isi['judul'] = 'Pesan';
		$isi['subjudul'] = 'Inbox';
		$isi['dashboard'] = 'class="active"';

		$isi['data_matkul'] = $this->db->query("SELECT * FROM tbmatkul order by nama_matkul ASC");
		$key = $this->session->userdata('kd_asisten');
		$isi['foto'] = $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");

		if ($this->session->userdata('praktikan')) 
		{
			$isi['lappendahuluan']= '';
			$isi['tugasakhir'] = '';
			$isi['tentang']	= '';
			$isi['ujian'] = '';
			$this->load->view('praktikan/header_praktikan',$isi);
			$this->load->view('praktikan/menu_praktikan',$isi);
			$this->load->view('praktikan/content_praktikan',$isi);
			$this->load->view('praktikan/footer_praktikan');
		}

		if ($this->session->userdata('asisten')) 
		{
			$isi['matkul'] = '';
			$isi['tentang'] = '';
			$isi['datapraktikan'] = '';
			$isi['soal'] = '';
			$isi['ujian'] = '';
			$isi['datanilai']		= '';
			$this->load->view('asisten/header_asisten',$isi);
			$this->load->view('asisten/menu_asisten',$isi);
			$this->load->view('asisten/content_asisten',$isi);
			$this->load->view('asisten/footer_asisten');
		}
	}

	function create_mail($type)
	{
		$isi['content'] = 'mail/buat_pesan';
		$isi['judul'] = 'Membuat Pesan';
		$isi['subjudul'] = '';	
		$isi['dashboard'] = 'class="active"';
		$isi['data_matkul'] = $this->db->query("SELECT * FROM tbmatkul order by nama_matkul ASC");
		$key = $this->session->userdata('kd_asisten');
		$isi['foto'] = $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");

		if ($this->session->userdata('praktikan') )
		{
			$isi['lappendahuluan']= '';
			$isi['tugasakhir'] = '';
			$isi['tentang']	= '';
			$isi['ujian'] = '';
			$this->load->view('praktikan/header_praktikan',$isi);
			$this->load->view('praktikan/menu_praktikan',$isi);
			$this->load->view('praktikan/content_praktikan',$isi);
			$this->load->view('praktikan/footer_praktikan');
		}

		if ($this->session->userdata('asisten') )
		{
			$isi['matkul'] = '';
			$isi['tentang'] = '';
			$isi['datapraktikan'] = '';
			$isi['soal'] = '';
			$isi['ujian'] = '';
			$isi['datanilai']		= '';
			$this->load->view('asisten/header_asisten',$isi);
			$this->load->view('asisten/menu_asisten',$isi);
			$this->load->view('asisten/content_asisten',$isi);
			$this->load->view('asisten/footer_asisten');
		}
	}

	function reply_mail($id)
	{

		$isi['data_pesan'] = $this->db->query("SELECT * FROM tbmail WHERE id = ".$id." ");

		$isi['content'] = 'mail/balas_pesan';
		$isi['judul'] = 'Membuat Pesan';
		$isi['subjudul'] = '';	
		$isi['dashboard'] = 'class="active"';

		$isi['data_matkul'] = $this->db->query("SELECT * FROM tbmatkul order by nama_matkul ASC");
		$key = $this->session->userdata('kd_asisten');
		$isi['foto'] = $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");
		if ($this->session->userdata('praktikan') )
		{
			$isi['lappendahuluan']= '';
			$isi['tugasakhir'] = '';
			$isi['tentang']	= '';
			$isi['ujian'] = '';
			$this->load->view('praktikan/header_praktikan',$isi);
			$this->load->view('praktikan/menu_praktikan',$isi);
			$this->load->view('praktikan/content_praktikan',$isi);
			$this->load->view('praktikan/footer_praktikan');
		}

		if ($this->session->userdata('asisten') )
		{
			$isi['matkul'] = '';
			$isi['tentang'] = '';
			$isi['datapraktikan'] = '';
			$isi['soal'] = '';
			$isi['ujian'] = '';
			$isi['datanilai']		= '';
			$this->load->view('asisten/header_asisten',$isi);
			$this->load->view('asisten/menu_asisten',$isi);
			$this->load->view('asisten/content_asisten',$isi);
			$this->load->view('asisten/footer_asisten');
		}
	}

	function pesan_masuk($id)
	{
		$var_penerima = $this->session->userdata('npm');
		$isi['content'] = 'mail/lihat_pesan_masuk';
		$isi['judul'] = 'Pesan Masuk';
		$isi['subjudul'] = '';
		$isi['dashboard'] = 'class="active"';
		$isi['data_matkul'] = $this->db->query("SELECT * FROM tbmatkul order by nama_matkul ASC");
		$key = $this->session->userdata('kd_asisten');
		$isi['foto'] = $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");


		if ($this->session->userdata('praktikan'))
		{
			$var_Query1 = "SELECT 
							tbmail.npm_pengirim 
							,tbmail.npm_penerima
							,tbmail.id
							,tbmail.judul
							,tbmail.pesan
							,tbmail.tanggal_pesan
							,tbmail.status_pesan 
							,tbmail.status_tipe
							,tbpraktikan.nama AS namapenerima
                            ,tbasisten.nama_lengkap AS namapengirim
                            ,tbasisten.npm AS npmpengirim
								FROM tbmail 
							INNER JOIN 
								tbasisten 
							ON 
								tbmail.npm_pengirim = tbasisten.npm
                             INNER JOIN tbpraktikan 
                             ON 
                             	tbmail.npm_penerima = tbpraktikan.npm
							WHERE tbmail.npm_penerima = ".$var_penerima."
							AND tbmail.id = ".$id." 
			";
			$isi['lihat_pesan'] = $this->db->query($var_Query1);
			$isi['lappendahuluan']= '';
			$isi['tugasakhir'] = '';
			$isi['tentang']	= '';
			$isi['ujian'] = '';
			$this->load->view('praktikan/header_praktikan',$isi);
			$this->load->view('praktikan/menu_praktikan',$isi);
			$this->load->view('praktikan/content_praktikan',$isi);
			$this->load->view('praktikan/footer_praktikan');
		}
		if ($this->session->userdata('asisten')) 
		{
			$var_Query1 = "SELECT 
							tbmail.npm_pengirim AS npmpengirim
							,tbmail.npm_penerima
							,tbmail.id
							,tbmail.judul
							,tbmail.pesan
							,tbmail.tanggal_pesan
							,tbmail.status_pesan 
							,tbmail.status_tipe
							,tbpraktikan.nama AS namapengirim
								FROM tbmail 
							INNER JOIN 
								tbpraktikan 
							ON 
								tbmail.npm_pengirim = tbpraktikan.npm
                             INNER JOIN tbasisten
                             ON 
                             	tbmail.npm_penerima = tbasisten.npm
							WHERE tbmail.npm_penerima = ".$var_penerima."
							AND tbmail.id = ".$id." 
			";
			$isi['lihat_pesan'] = $this->db->query($var_Query1);
			$isi['matkul'] = '';
			$isi['tentang'] = '';
			$isi['datapraktikan'] = '';
			$isi['soal'] = '';
			$isi['ujian'] = '';
			$isi['datanilai']		= '';
			$this->load->view('asisten/header_asisten',$isi);
			$this->load->view('asisten/menu_asisten',$isi);
			$this->load->view('asisten/content_asisten',$isi);
			$this->load->view('asisten/footer_asisten');
		}

	}

	function pesan_terkirim($id)
	{
		$var_pengirim = $this->session->userdata('npm');
		$isi['content'] = 'mail/lihat_pesan_terkirim';
		$isi['judul'] = 'Pesan Terkirim';
		$isi['subjudul'] = '';
		$isi['dashboard'] = 'class="active"';
		$isi['data_matkul'] = $this->db->query("SELECT * FROM tbmatkul order by nama_matkul ASC");
		$key = $this->session->userdata('kd_asisten');
		$isi['foto'] = $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");


		if ($this->session->userdata('praktikan'))
		{
			$var_Query1 = "SELECT 
							tbmail.npm_pengirim 
							,tbmail.npm_penerima AS npmpenerima
							,tbmail.id
							,tbmail.judul
							,tbmail.pesan
							,tbmail.tanggal_pesan
							,tbmail.status_pesan 
							,tbmail.status_tipe
							,tbpraktikan.nama AS namapengirim
                            ,tbasisten.nama_lengkap AS namapenerima
								FROM tbmail 
							INNER JOIN 
								tbpraktikan 
							ON 
								tbmail.npm_pengirim = tbpraktikan.npm
                             INNER JOIN tbasisten 
                             ON 
                             	tbmail.npm_penerima = tbasisten.npm
							WHERE tbmail.npm_pengirim = ".$var_pengirim."
							AND tbmail.id = ".$id." 
			";
			$isi['lihat_pesan'] = $this->db->query($var_Query1);
			$isi['lappendahuluan']= '';
			$isi['tugasakhir'] = '';
			$isi['tentang']	= '';
			$isi['ujian'] = '';
			$this->load->view('praktikan/header_praktikan',$isi);
			$this->load->view('praktikan/menu_praktikan',$isi);
			$this->load->view('praktikan/content_praktikan',$isi);
			$this->load->view('praktikan/footer_praktikan');
		}
		if ($this->session->userdata('asisten')) 
		{
			$var_Query1 = "SELECT 
							tbmail.npm_pengirim 
							,tbmail.npm_penerima
							,tbmail.id
							,tbmail.judul
							,tbmail.pesan
							,tbmail.tanggal_pesan
							,tbmail.status_pesan 
							,tbmail.status_tipe
							,tbpraktikan.nama AS  namapenerima
                            ,tbpraktikan.npm AS npmpenerima
                            ,tbasisten.nama_lengkap AS namapengirim
								FROM tbmail 
							INNER JOIN 
								tbasisten 
							ON 
								tbmail.npm_pengirim = tbasisten.npm
                             INNER JOIN tbpraktikan 
                             ON 
                             	tbmail.npm_penerima = tbpraktikan.npm
							WHERE tbmail.npm_pengirim = ".$var_pengirim."
							AND tbmail.id = ".$id." 
			";
			$isi['lihat_pesan'] = $this->db->query($var_Query1);
			$isi['matkul'] = '';
			$isi['tentang'] = '';
			$isi['datapraktikan'] = '';
			$isi['soal'] = '';
			$isi['ujian'] = '';
			$isi['datanilai']		= '';
			$this->load->view('asisten/header_asisten',$isi);
			$this->load->view('asisten/menu_asisten',$isi);
			$this->load->view('asisten/content_asisten',$isi);
			$this->load->view('asisten/footer_asisten');
		}

	}

	function hapus($id)
	{
		if ($this->session->userdata('praktikan')) 
		{
			$this->db->query("UPDATE tbmail SET status_pesan = 2 WHERE id = ".$id." ");
		}
		if ($this->session->userdata('asisten')) 
		{
			$this->db->query("DELETE FROM tbmail WHERE id = ".$id." ");
		}
		redirect('mail/sent');
	}

}