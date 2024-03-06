<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datapraktikan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_data','m');
	}
// ======== CONTROLLER TAMPILAN AWAL=====///
	public function index()
	{
		if(!$this->session->userdata('asisten')){
			redirect('beranda');
		}
		$isi['content'] = 'datapraktikan/index';
		$isi['judul'] = 'Data Praktikan';
		$isi['subjudul'] = '';
		$isi['dashboard'] = '';
		$isi['deviden'] = '';
		$isi['tentang'] = '';
		$isi['datapraktikan'] = 'class="active open"';
		$isi['soal'] = '';
		$isi['matkul'] = '';
		$isi['ujian'] = '';
		$isi['datanilai'] = '';
		$isi['data'] = $this->db->get('tbpraktikan');
		$isi['data_matkul']	= $this->db->query("SELECT * FROM tbmatkul order by nama_matkul ASC");
		$isi['praktikum'] = $this->db->query("SELECT * FROM tbbab WHERE matkul = 'Riset Oprasional 2' ");
		$key = $this->session->userdata('kd_asisten');
		$isi['foto'] = $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");
		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');
	}


	public function ajax_list()
	{
		$list = $this->m->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->npm;
			$row[] = $person->nama;
			$row[] = $person->kelas;
			$row[] = $person->username;
			$row[] = $person->password;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->npm."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->npm."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m->count_all(),
						"recordsFiltered" => $this->m->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($npm)
	{
		$data = $this->m->get_by_id($npm);

		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'npm' => $this->input->post('npm'),
				'nama' => $this->input->post('nama'),
				'kelas' => $this->input->post('kelas'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'foto' => $this->input->post('foto'),
			);
		$data1 = array(
				'npm' => $this->input->post('npm'),
				'kehadiran1' => $this->input->post('kehadiran1'),
				'kehadiran2' => $this->input->post('kehadiran2'),
				'kehadiran3' => $this->input->post('kehadiran3'),
				'kehadiran4' => $this->input->post('kehadiran4'),
				'kehadiran5' => $this->input->post('kehadiran5'),
				'kehadiran6' => $this->input->post('kehadiran6'),
				'kehadiran7' => $this->input->post('kehadiran7'),
				'al1' => $this->input->post('al1'),
				'al2' => $this->input->post('al2'),
				'al3' => $this->input->post('al3'),
				'al4' => $this->input->post('al4'),
				'al5' => $this->input->post('al5'),
				'al6' => $this->input->post('al6'),
				'al7' => $this->input->post('al7'),
				'ta1' => $this->input->post('ta1'),
				'ta2' => $this->input->post('ta2'),
				'ta3' => $this->input->post('ta3'),
				'ta4' => $this->input->post('ta4'),
				'ta5' => $this->input->post('ta5'),
				'ta6' => $this->input->post('ta6'),
				'ta7' => $this->input->post('ta7'),
				'quiz1' => $this->input->post('quiz1'),
				'quiz2' => $this->input->post('quiz1'),
				'ujian' => $this->input->post('ujian'),
			);
		$insert = $this->m->save($data,$data1);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
			'npm' => $this->input->post('npm'),
			'nama' => $this->input->post('nama'),
			'kelas' => $this->input->post('kelas'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'foto' => $this->input->post('foto'),
			);
		$this->m->update(array('npm' => $this->input->post('npm')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($npm)
	{
		$data1 = array(
				'npm' => $this->input->post('npm'),
				'kehadiran1' => $this->input->post('kehadiran1'),
				'kehadiran2' => $this->input->post('kehadiran2'),
				'kehadiran3' => $this->input->post('kehadiran3'),
				'kehadiran4' => $this->input->post('kehadiran4'),
				'kehadiran5' => $this->input->post('kehadiran5'),
				'kehadiran6' => $this->input->post('kehadiran6'),
				'kehadiran7' => $this->input->post('kehadiran7'),
				'al1' => $this->input->post('al1'),
				'al2' => $this->input->post('al2'),
				'al3' => $this->input->post('al3'),
				'al4' => $this->input->post('al4'),
				'al5' => $this->input->post('al5'),
				'al6' => $this->input->post('al6'),
				'al7' => $this->input->post('al7'),
				'ta1' => $this->input->post('ta1'),
				'ta2' => $this->input->post('ta2'),
				'ta3' => $this->input->post('ta3'),
				'ta4' => $this->input->post('ta4'),
				'ta5' => $this->input->post('ta5'),
				'ta6' => $this->input->post('ta6'),
				'ta7' => $this->input->post('ta7'),
				'quiz1' => $this->input->post('quiz1'),
				'quiz2' => $this->input->post('quiz1'),
				'ujian' => $this->input->post('ujian'),
			);
		$this->m->delete_by_id($npm);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('npm') == '')
		{
			$data['inputerror'][] = 'npm';
			$data['error_string'][] = 'NPM harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama') == '')
		{
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'Nama harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('kelas') == '')
		{
			$data['inputerror'][] = 'kelas';
			$data['error_string'][] = 'Kelas harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('username') == '')
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'Username harus diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('password') == '')
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'Password harus diisi';
			$data['status'] = FALSE;
		}
		if($this->input->post('foto') == '')
		{
			$data['inputerror'][] = 'foto';
			$data['error_string'][] = 'Foto harus diisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}
