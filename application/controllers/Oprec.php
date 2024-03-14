<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Oprec extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $jurusans = $this->db->get("tb_jurusan");
        $data['jurusans'] = $jurusans->result_array();
        $data['judul'] = "Registrasi Lab Manajemen Menengah";

        $rules = [
            [
                'field' => 'name',
                'label' => 'Nama Lengkap',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            [
                'field' => 'npm',
                'label' => 'NPM',
                'rules' => 'required|trim|numeric|exact_length[8]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'numeric' => '{field} tidak valid',
                    'exact_length' => '{field} harus {param} digit'
                ]
            ],
            [
                'field' => 'class',
                'label' => 'Kelas',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            [
                'field' => 'jurusan',
                'label' => 'Jurusan',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            [
                'field' => 'region',
                'label' => 'Region',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            [
                'field' => 'placement',
                'label' => 'Penempatan',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            [
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email|is_unique[tb_peserta.email]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'valid_email' => 'Alamat {field} tidak valid',
                    'is_unique' => 'Alamat {field} ini sudah terdaftar!'
                ]
            ],
            [
                'field' => 'no_telp',
                'label' => 'No HP',
                'rules' => 'required|trim|numeric|min_length[11]|max_length[13]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'numeric' => '{field} tidak valid',
                    'min_length' => '{field} minimal {param} digit',
                    'max_length' => '{field} maksimal {param} digit'
                ]
            ],
            [
                'field' => 'address',
                'label' => 'Alamat',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            [
                'field' => 'tempat-lahir',
                'label' => 'Tempat lahir',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            [
                'field' => 'tanggal-lahir',
                'label' => 'Tanggal lahir',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            [
                'field' => 'sosmed',
                'label' => 'Sosial Media',
                'rules' => 'required|trim|valid_url',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'valid_url' => '{field} URL tidak valid'
                ]
            ]
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            $this->load->view('oprec/index', $data);
        } else {
            $this->_submitData();
        }
    }

    private function _submitData()
    {
        $jurusans = $this->db->get("tb_jurusan");
        $data['jurusans'] = $jurusans->result_array();
        $data['judul'] = "Registrasi Lab Manajemen Menengah";

        $data_calas = [
            'nama' => htmlspecialchars(ucwords($this->input->post('name', true))),
            'npm' => htmlspecialchars($this->input->post('npm', true)),
            'kelas' => htmlspecialchars(strtoupper($this->input->post('class', true))),
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
            'region' => htmlspecialchars(ucfirst($this->input->post('region', true))),
            'penempatan' => htmlspecialchars(ucfirst($this->input->post('placement', true))),
            'agama' => htmlspecialchars(ucwords($this->input->post('agama', true))),
            'email' => htmlspecialchars(strtolower($this->input->post('email', true))),
            'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
            'alamat' => htmlspecialchars($this->input->post('address', true)),
            'ttl' => htmlspecialchars(ucwords($this->input->post('tempat-lahir', true))) . ' ' . htmlspecialchars($this->input->post('tanggal-lahir', true)),
            'sosmed' => htmlspecialchars(strtolower($this->input->post('sosmed', true)))
        ];

        $files = ['archive'];
        $upload_errors = [];

        // Load library upload
        $this->load->library('upload');

        // Validate each file individually
        foreach ($files as $file) {
            if (!isset($_FILES[$file]['name'])) {
                $upload_errors[$file] = "File $file is required.";
            } elseif ($_FILES[$file]['size'] > 5 * 1024 * 1024) { // Check file size
                $upload_errors[$file] = "File $file exceeds the maximum allowed size of 5 MB.";
            } else {
                // Configuration for uploading file
                $config['allowed_types'] = 'rar|zip';
                $config['max_size'] = '5120'; // 5 MB
                $config['upload_path'] = './assets/uploads/oprec';
                $config['file_name'] = $data_calas['nama'] . '_' . $data_calas['npm'] . '_' . $data_calas['penempatan'] . '_' . $data_calas['region'] . '_' . uniqid();
                $this->upload->initialize($config);

                if (!$this->upload->do_upload($file)) {
                    $upload_errors[$file] = $this->upload->display_errors();
                }
            }

            // If any errors found, stop further processing
            if ($upload_errors) {
                break;
            }
        }

        if ($upload_errors) {
            foreach ($upload_errors as $file => $error) {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><div class='container-fluid'><div class='alert-icon'><i class='material-icons'>error_outline</i></div><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'><i class='material-icons'>clear</i></span></button><b>Error Alert:</b> $error</div></div>");
            }
            $this->load->view('oprec/index', $data);
        } else {
            // Semua file lulus validasi, lanjutkan dengan upload
            foreach ($files as $file) {
                $upload_data = $this->upload->data();
                $data_calas[$file] = $upload_data['file_name'];
            }

            // Semua data aman, lanjutkan dengan insert database
            if ($this->db->insert('tb_peserta', $data_calas)) {

                // Kirim Email untuk validasi kembali data mereka
                $this->_sendEmail($data_calas['email'], 'oprec');

                $this->session->set_flashdata('message', '<div class="alert alert-success"><div class="container-fluid"><div class="alert-icon"><i class="material-icons">check</i></div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button><b>Berhasil:</b> Silahkan cek email anda untuk memastikan data anda!</div></div>');
                redirect('oprec');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger"><div class="container-fluid"><div class="alert-icon"><i class="material-icons">error_outline</i></div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">clear</i></span></button><b>Error Alert:</b> Terjadi kesalahan...</div></div>');
                redirect('oprec');
            }
        }
    }

    private function _sendEmail($email, $type)
    {
        // Load PHPMailer library
        require_once APPPATH . '../vendor/autoload.php';

        $this->config->load('phpmailer_config');

        $mail = new PHPMailer(TRUE);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = $this->config->item('smtp_host');
            $mail->Port = $this->config->item('smtp_port');
            $mail->SMTPAuth = true;
            $mail->Username = $this->config->item('smtp_user');
            $mail->Password = $this->config->item('smtp_pass');
            $mail->SMTPSecure = $this->config->item('smtp_crypto');
            $mail->CharSet = $this->config->item('charset');

            // Penerima (calas)
            $mail->setFrom('opreclabmamen@gmail.com', 'Open Recruitment Laboratorium Manajemen Menengah');
            $mail->addAddress($email, ucwords($this->input->post('name', true)));

            // Lampirkan PDF
            $pdfContent = $this->_generate_pdf();
            $mail->addStringAttachment($pdfContent, ucwords($this->input->post('name', true)) . '_' . $this->input->post('npm', true) . '_' . ucfirst($this->input->post('penempatan', true)) . '_' . ucfirst($this->input->post('region', true)) . '.pdf');

            // Konten
            $mail->isHTML(true);
            $mail->Subject = 'Terimakasih Telah Mendaftar!';
            $mail->Body = 'Hai <b>' . ucwords($this->input->post('name', true)) . '</b>, Terimakasih telah mendaftarkan diri anda pada lab kami, bersamaan dengan email ini kami beritahukan bahwa berkas anda sudah kami terima. <br>Berikut ini adalah lampiran data yang anda input untuk dapat diperiksa kembali apakah ada kesalahan atau tidak. <br><br>Apabila data dirasa sudah benar, silahkan print file dibawah ini untuk digunakan pada tahap selanjutnya.<br><br>Terimakasih dan pantau terus perkembangan oprec lab kami di website resmi kami : <a href="https://v-lab.gunadarma.ac.id/">Laboratorium Manajemen Menengah</a>';

            // Send email
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            die;
        }
    }

    private function _generate_pdf()
    {
        // Load Dompdf library
        require_once APPPATH . '../vendor/dompdf/autoload.inc.php';

        $html = '<html><body><h1>User Registration Data</h1><p>Name: John Doe<br>Email: john@example.com</p></body></html>';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        return $dompdf->output();
    }

    public function result()
    {
        $this->load->view('result/index');
    }
}
