<?php
class Model_data extends CI_Model{


  var $table = 'tbpraktikan';
  var $column_order = array('username','password','nama','kelas','foto',null); //set column field database for datatable orderable
  var $column_search = array('username','nama','kelas','npm'); //set column field database for datatable searchable just firstname , lastname , address are searchable
  var $order = array('npm' => 'desc'); // default order

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  } 

public function showAllDatapraktikan(){
  $query = $this->db->get('tbpraktikan');
  if($query->num_rows() > 0){
    return $query->result();
  }else{
    return false;
  }
}
//==========INI MODEL DATA PRAKTIKAN =========//

    function delete($key){
      // $this->db->where('npm',$key);
      // $this->db->delete('tbpraktikan');
        $this->db->query("DELETE from tbpraktikan where npm = '".$key."'");
        $this->db->query("DELETE from tbnilai where npm = '".$key."'");
    }
    public function getdatapraktikan($key)
    {
      $this->db->where('npm',$key);
      $hasil = $this->db->get('tbpraktikan');
      return $hasil;
    }
    public function getupdate($key,$data)
    {
      $this->db->where('npm',$key);
      $this->db->update('tbpraktikan',$data);
    }
    public function getinsert($data,$data1)
    {
      $this->db->insert('tbpraktikan',$data);
        $this->db->insert('tbnilai',$data1);
    }
// NILAI ACTIVITY LAB


    public function UpdateDatNilai($Id_Temp,$var_NPM, $var_AL)
    {
        $this->db->set('al'.$Id_Temp.'', $var_AL, FALSE);
        $this->db->where('npm', $var_NPM);
        $this->db->update('tbnilai');
    }

    public function UpdateDatUjian($var_NPM,$var_Ujian)
    {
        $this->db->set('ujian', $var_Ujian, FALSE);
        $this->db->where('npm', $var_NPM);
        $this->db->update('tbnilai');
    }

    public function Jawab_AL($filename,$jawaban,$kd_soal,$npm)
    {
        $this->db->query('INSERT INTO tbtemp_al (npm, soal, file, jawaban ) values ("'.$npm.'","'.$kd_soal.'","'.$filename.'","'.$jawaban.'")');
    }

// NILAI TUGAS AKHIR

    public function updatenilaita($var_Nilai,$var_NPM,$var_Pertemuan)
    {
        $this->db->set('ta'.$var_Pertemuan.'', $var_Nilai, FALSE);
        $this->db->where('npm',$var_NPM);
        $this->db->update('tbnilai');
    }

// NILAI KEHADIRAN

    public function updatenilaikehadiran($var_Nilai,$npm,$Mingggu)
    {
        $this->db->set('kehadiran'.$Mingggu.'', $var_Nilai, FALSE);
        $this->db->where('npm', $npm);
        $this->db->update('tbnilai');
    }

  // NILAI QUIZ
  public function updatenilaiquiz1($data,$key){
      $this->db->set('quiz1', $data, FALSE);
      $this->db->where('npm', $key);
      $this->db->update('tbnilai');
  }
  public function updatenilaiquiz2($data,$key){
      $this->db->set('quiz2', $data, FALSE);
      $this->db->where('npm', $key);
      $this->db->update('tbnilai');
  }

// NILAI UJIAN
  public function updatenilaiujian($data,$key){
      $this->db->set('ujian', $data, FALSE);
      $this->db->where('npm', $key);
      $this->db->update('tbnilai');
  }

//==========INI MODEL DATA ASISTEN=========//
    public function getdataasisten($key)
    {
      $this->db->where('id_asisten',$key);
      $hasil = $this->db->get('tbasisten');
      return $hasil;
    }
    public function getupdateasisten($key,$data)
    {
      $this->db->where('id_asisten',$key);
      $this->db->update('tbasisten',$data);
    }
    public function getinsertasisten($data)
    {
      $this->db->insert('tbasisten',$data);
    }
  function deleteasisten($key)
    {
      $this->db->where('id_asisten',$key);
      $this->db->delete('tbasisten');
    }
//==========INI MODEL DATA  SOAL TUGAS AKHIR =========////
    public function getdatasoal($var_Kd_Soal)
    {
      $this->db->where('kd_soal',$var_Kd_Soal);
      return $this->db->get('tbsoal');
    }
  public function getinsertsoal($data)
    {
      $this->db->insert('tbsoal',$data);
    }
    public function getupdatesoal($key,$data)
    {
      $this->db->where('kd_soal',$key);
      $this->db->update('tbsoal',$data);
    }
    function deletesoal($var_Kd_Soal)
    {
      $this->db->where('kd_soal',$var_Kd_Soal);
      $this->db->delete('tbsoal');
    }

//==========INI MODEL DATA  SOAL AKTIFITAS LAB =========////
    public function getdatasoal_al($var_Kd_Soal)
    {
      $this->db->where('kd_soal',$var_Kd_Soal);
      return $this->db->get('tbsoal_al');
    }
  public function getinsertsoal_al($data)
    {
      $this->db->insert('tbsoal_al',$data);
    }
    public function getupdatesoal_al($key,$data)
    {
      $this->db->where('kd_soal',$key);
      $this->db->update('tbsoal_al',$data);
    }
    function deletesoal_al($var_Kd_Soal)
    {
      $this->db->where('kd_soal',$var_Kd_Soal);
      $this->db->delete('tbsoal_al');
    }


 //==========INI MODEL DATA  SOAL=========////
      public function getdatanilai($key)
    {
        $this->db->where('npm',$key);
        $hasil = $this->db->get('tbnilai');
        return $hasil;
    }
    public function getupdatenilai($key,$data)
    {
        $this->db->where('npm',$key);
        $this->db->update('tbnilai',$data);
    }
    public function getinsertnilai($data1)
    {
        $this->db->insert('tbnilai',$data1);
    }
    public function getdataphoto($key)
    {
        $this->db->where('npm',$key);
        $hasil = $this->db->get('tbpraktikan');
        return $hasil;
    }
    public function updatephoto($key,$data)
    {
        $this->db->set('photo', $data);
        $this->db->where('npm', $key);
        $this->db->update('tbpraktikan', $data);
    }
    public function updateavatarpraktikan($data1,$key)
    {
        $this->db->query('UPDATE tbpraktikan set foto = "'.$data1.'" WHERE npm = "'.$key.'"');
    }
    public function updateavatarasisten($data1,$key)
    {
        $this->db->query('UPDATE tbasisten set foto = "'.$data1.'" WHERE kd_asisten = "'.$key.'"');
    }
    public function uploadujian($kd_ujian,$nama_matkul,$tipe_soal,$status,$filename)
    {
        $this->db->query('INSERT INTO tbujian ( kd_ujian, nama_matkul, tipe_soal, file , status) values ("'.$kd_ujian.'","'.$nama_matkul.'","'.$tipe_soal.'","'.$filename.'","'.$status.'")');
    }
    function deleteujian($key){
        $this->db->query("DELETE from tbujian where kd_ujian = '".$key."'");
    }

// BERITA 

    public function PostBerita($var_judul, $var_isi , $var_deskripsi, $filename, $var_status)
    {
      $this->db->query(" INSERT INTO tbberita ( judul , isi , deskripsi , gambar , status ) 
                         values ( '".$var_judul."', '".$var_isi."' , '".$var_deskripsi."' , '".$filename."' , ".$var_status.")" );
    }    


    public function UpdateBerita($var_id, $var_judul, $var_isi , $var_deskripsi, $filename)
    {
      $this->db->query(" UPDATE tbberita SET judul = '".$var_judul."', isi = '".$var_isi."' , deskripsi = '".$var_deskripsi."' , gambar = '".$filename."' WHERE id = ".$var_id." ");
    }


// MODUL 

    public function PostModul($var_nama, $var_deskripsi, $filename, $var_status)
    {
      $this->db->query(" INSERT INTO tbmodul ( nama, deskripsi , file , status ) 
                         values ( '".$var_nama."' , '".$var_deskripsi."' , '".$filename."' , ".$var_status.")" );
    }    

    public function UpdateModul($var_id, $var_nama, $var_deskripsi, $filename, $var_status )
    {
      $this->db->query(" UPDATE tbmodul SET nama = '".$var_nama."' , deskripsi = '".$var_deskripsi."' , file = '".$filename."' , status = ".$var_status." WHERE id = ".$var_id." ");
    }


// ASISTEN

    public function PostAsisten($var_kd_asisten,$var_nama_lengkap,$var_kelas,$var_npm,$var_username,$var_password,$var_status,$filename)
    {
      $this->db->query(" INSERT INTO tbasisten ( kd_asisten, nama_lengkap , kelas , npm, username, password , status, foto  ) 
                         values ( '".$var_kd_asisten."' , '".$var_nama_lengkap."' , '".$var_kelas."' , '".$var_npm."', '".$var_username."' , '".$var_password."' , '".$var_status."' , '".$filename."' )" );
    }    

    public function UpdateAsisten($var_id, $var_kd_asisten,$var_nama_lengkap,$var_kelas,$var_npm,$var_username,$var_password,$var_status,$filename)
    {
      $this->db->query(" UPDATE tbasisten SET kd_asisten = '".$var_kd_asisten."' , nama_lengkap = '".$var_nama_lengkap."' , kelas = '".$var_kelas."' , npm = ".$var_npm." , username = '".$var_username."', password = '".$var_password."' , status = '".$var_status."' , foto = '".$filename."'   WHERE id = ".$var_id." ");
    }




    function UbahStatus( $kd_bab, $var_TempKelas, $var_TempStatus )
    {
        $this->db->set('status', $var_TempStatus, FALSE);
        $this->db->where('kd_bab', $kd_bab);
        $this->db->where('kelas', $var_TempKelas);
        $this->db->update('tbaktivasi2');
    }



 // AJAX CRUD


    private function _get_datatables_query()
    {

      $this->db->from($this->table);

      $i = 0;

      foreach ($this->column_search as $item) // loop column
      {
        if($_POST['search']['value']) // if datatable send POST for search
        {

          if($i===0) // first loop
          {
            $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
            $this->db->like($item, $_POST['search']['value']);
          }
          else
          {
            $this->db->or_like($item, $_POST['search']['value']);
          }

          if(count($this->column_search) - 1 == $i) //last loop
            $this->db->group_end(); //close bracket
        }
        $i++;
      }

      if(isset($_POST['order'])) // here order processing
      {
        $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      }
      else if(isset($this->order))
      {
        $order = $this->order;
        $this->db->order_by(key($order), $order[key($order)]);
      }
    }

    function get_datatables()
    {
      $this->_get_datatables_query();
      if($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
      $query = $this->db->get();
      return $query->result();
    }

    function count_filtered()
    {
      $this->_get_datatables_query();
      $query = $this->db->get();
      return $query->num_rows();
    }

    public function count_all()
    {
      $this->db->from($this->table);
      return $this->db->count_all_results();
    }

    public function get_by_id($npm)
    {
      $this->db->from($this->table);
      $this->db->where('npm',$npm);
      $query = $this->db->get();

      return $query->row();
    }

    public function save($data,$data1)
    {
      $this->db->insert($this->table, $data);
      $this->db->insert('tbnilai', $data1);
      return $this->db->insert_id();
    }

    public function update($where, $data)
    {
      $this->db->update($this->table, $data, $where);
      return $this->db->affected_rows();
    }

    public function delete_by_id($npm)
    {
      $this->db->where('npm', $npm);
      $this->db->delete($this->table);
      $this->db->delete('tbnilai', array('npm' => $npm));
    }

    public function listing( $kelas )
    {
      $query = $this->db->query("SELECT 
                                    tbpraktikan.nama
                                    , tbpraktikan.kelas
                                    , tbnilai.*
                                    FROM tbpraktikan 
                                    LEFT JOIN tbnilai 
                                    ON tbpraktikan.npm = tbnilai.npm 
                                    WHERE tbpraktikan.kelas = '".$kelas."' 
                                    ORDER BY nama ASC");
      return $query->result();
    }
}
