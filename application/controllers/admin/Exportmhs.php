<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exportmhs extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Admin_m');
    $this->load->model('admin/Export_m');
    $this->load->library('Excel');
  }

  function index(){
    $post = $this->input->post();
    if (!is_dir('asset/upload/mahasiswa')) {
      mkdir('asset/upload/mahasiswa');
    }
    if (!preg_match("/.(xls|xlsx)$/i", $_FILES["semester"]["name"]) ) {

      echo "pastikan file yang anda pilih xls|xlsx";
      exit();

    } else {
      move_uploaded_file($_FILES["semester"]["tmp_name"],'asset/upload/mahasiswa/'.$_FILES['semester']['name']);
      $semester = array("semester"=>$_FILES["semester"]["name"]);

    }
    $objPHPExcel = PHPExcel_IOFactory::load('asset/upload/mahasiswa/'.$_FILES['semester']['name']);
    $data = $objPHPExcel->getActiveSheet()->toArray();
    $error_count = 0;
    $error = array();
    $sukses = 0;
    foreach ($data as $key => $val) {
      if ($key>0) {
        if ($val[1]!='') {
            // 
          $check = $this->Export_m->cekdata(filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));
          if ($check==true) {
            $error_count++;
            $error[] = $val[1]." ".$val[2]." Sudah Ada";
          } else {
            $sukses++;
            //new
            $url = 'http://pmb.unidayan.ac.id/index.php/kampus/get_detail_pmb_noreg/'.@filter_var($val[3], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
            // $url2 = 'http://pmb.unidayan.ac.id/index.php/kampus/get_pil_jurusan/'.@$this->input->post('id_pilihan');
            $mhsdt = $url;
            $ressult = json_decode(file_get_contents($url));
            // echo "<pre>";print_r($mhsdt);echo "<pre/>";exit();
            // $ressult2 = json_decode(file_get_contents($url2));
            $dtsms = $this->Admin_m->detail_data('sms','kode_prodi',trim(filter_var($val[4], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)));
            // echo "<pre>";print_r($ressult);echo "<pre/>";exit();
            // echo $ressult->id_mhs;
            if ($ressult == TRUE) {
                $datamhss = array(
                    'nm_pd'      => $ressult->nama_mhs,
                    'id_mhs_pt'      => $ressult->noreg,
                    'nim'      => trim(filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'jk'      => $ressult->gender_mhs,
                    'nik' => $ressult->nik,
                    'tmpt_lahir' => $ressult->tmpt_lahir,
                    'tgl_lahir' => $ressult->tgl_lhr_mhs,
                    'nm_ayah' => $ressult->nama_ot_mhs,
                    'tgl_lahir_ayah' => $ressult->tgl_lahir_ayah,
                    'nik_ayah' => NULL,
                    'id_jenjang_pendidikan_ayah' => $ressult->id_jenjang_pendidikan_ayah,
                    'id_pekerjaan_ayah' => $ressult->id_pekerjaan_ayah,
                    'id_penghasilan_ayah' => $ressult->id_penghasilan_ayah,
                    'id_kebutuhan_khusus_ayah' => NULL,
                    'nm_ibu_kandung' => $ressult->nm_ibu_kandung,
                    'tgl_lahir_ibu' => $ressult->tgl_lahir_ibu,
                    'nik_ibu' => NULL,
                    'id_jenjang_pendidikan_ibu' => $ressult->id_jenjang_pendidikan_ibu,
                    'id_pekerjaan_ibu' => $ressult->id_pekerjaan_ibu,
                    'id_penghasilan_ibu' => $ressult->id_penghasilan_ibu,
                    'id_kebutuhan_khusus_ibu' => NULL,
                    'no_hp' => $ressult->no_hp_mhs,
                    'email' => $ressult->email_mhs,
                    'a_terima_kps' => 0,
                    'no_kps' => NULL,
                    'npwp' => NULL,
                    'id_wil' => '999999',
                    'id_jns_tinggal' => NULL,
                    'id_agama' => $ressult->id_agama,
                    'id_alat_transport' => NULL,
                    'kewarganegaraan' => 'ID',
                );
                $this->Admin_m->insert_data('mahasiswa',$datamhss);
                // 
                $datamhs = array(
                    'id_pd_siakad' => $this->Admin_m->last_id_mhs($ressult->noreg)->id,
                    'kode_sms' =>filter_var($val[4], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                    'id_sp'      => $this->Admin_m->info_pt(1)->kode_info_pt,
                    'id_sms' => $dtsms->id_sms,
                    'nipd' => trim(filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_masuk_sp'      => date('Y-m-d'),
                    'tgl_keluar'      => NULL,
                    'ket'      => NULL,
                    'skhun' => NULL,
                    'a_pernah_paud' => 0,
                    'a_pernah_tk' => 0,
                    'tgl_create' => date('Y-m-d'),
                    'mulai_smt' => $ressult->angkatan.'1',
                    'sks_diakui' => 0,
                    'ipk' => 0,
                    'id_jns_daftar' => 1,
                    'id_jns_keluar' => NULL,
                    'id_jalur_masuk' => 8,
                    'id_pembiayaan' => 1,
                );
                // echo "<pre>";print_r($datamhs);echo "</pre>";exit();
                $this->Admin_m->insert_data('mahasiswa_pt',$datamhs);
                // buat akun
                $username = trim(filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));
                $email = $ressult->email_mhs;
                $password = $this->Admin_m->acakangkahuruf(5);
                $group = array('2');
                $additional_data = array(
                    'first_name' => $ressult->nama_mhs,
                    'id_mhs' =>$this->Admin_m->last_id_mhs($ressult->noreg)->id,
                    'last_name' => $this->Admin_m->info_pt(1)->nama_info_pt,
                    'company' => $this->Admin_m->info_pt(1)->nama_info_pt,
                    'phone' => '123456789',
                    'repassword' => $password,
                    );
                $this->ion_auth->register($username, $password, $email, $additional_data, $group);
                // buat aktifitas mahasiswa
                $aktvkul = array(
                    'id_smt' => $ressult->angkatan.'1',
                    'id_mhs_pt' =>$this->Admin_m->last_id_mhs_pt($username)->id,
                    'id_stat_mhs' => 'A',
                    'ips' => 0,
                    'sks_smt' => 0,
                    'ipk' => 0,
                    'sks_total' => 0
                    );
                $this->Admin_m->insert_data('kuliah_mahasiswa',$aktvkul);
            }
          }
        }
      }
    }
    unlink("asset/upload/mahasiswa/".$_FILES['semester']['name']);
    $msg = '';
    if (($sukses>0) || ($error_count>0)) {
      $msg =  "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\" >
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
      <font color=\"#3c763d\">".$sukses." data Mahasiswa baru berhasil di import</font><br />
      <font color=\"#ce4844\" >".$error_count." data tidak bisa ditambahkan </font>";
      if (!$error_count==0) {
        $msg .= "<a data-toggle=\"collapse\" href=\"#collapseExample\" aria-expanded=\"false\" aria-controls=\"collapseExample\">Detail error</a>";
      }
                  //echo "<br />Total: ".$i." baris data";
      $msg .= "<div class=\"collapse\" id=\"collapseExample\">";
      $i=1;
      foreach ($error as $pesan) {
        $msg .= "<div class=\"bs-callout bs-callout-danger\">".$i.". ".$pesan."</div><br />";
        $i++;
      }
      $msg .= "</div>
      </div>";
    }
    $this->session->set_flashdata('export', $msg);
    redirect(base_url('index.php/admin/mahasiswa/tmbh_mhs_pmb/'));
  }
}
?>