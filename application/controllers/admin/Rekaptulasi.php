<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekaptulasi extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Rekap_m');
        $this->load->model('admin/Export_m');
        $this->load->library('Excel');
    }
    public function index($offset=0){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $data['title'] = 'Dashboard - '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/psikolog-v';
                $data['hasil'] = $this->Psikolog_m->daftar_psikolog();
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function akun_mahasiswa(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $data['title'] = 'Cetak Akun Mahasiswa - '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/rekaptulasi/rekap-akun-v';
                $data['prodi'] = $this->Rekap_m->prodi();
                $data['angkatan'] = $this->Rekap_m->angkatan();
                // pagging setting
                // $data['hasil'] = $this->Aktivitas_m->aktivitas_kuliah($idmhs->idmhspt);
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function cetak_akun_mhs(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $data['title'] = 'Cetak Akun Mahasiswa - '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                // pagging setting
                $data['hasil'] = $this->Rekap_m->akun_mhs($post['prodi'],$post['angkatan']);
                $data['detail'] = $this->Rekap_m->detail_prodi($post['prodi']);
                $data['angkatan'] = $post['angkatan'];
                // echo "<pre>";print_r($data['hasil']);echo "<pre/>";exit();
                // pagging setting
                $this->load->view('admin/rekaptulasi/cetak-akun-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function export_mahasiswa(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $data['title'] = 'Export Data Mahasiswa - '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/rekaptulasi/rekap-mahasiswa-v';
                $data['prodi'] = $this->Rekap_m->prodi();
                $data['angkatan'] = $this->Rekap_m->angkatan();
                // pagging setting
                // $data['hasil'] = $this->Aktivitas_m->aktivitas_kuliah($idmhs->idmhspt);
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function export_excel_mhs(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','prodi');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $data['title'] = 'Daftar Calon Peserta Mahasiswa Baru';
                    // $data['page'] = 'admin/export-v';
                    // $data['nav'] = 'nav/nav-admin';
                    // $data['dtadm'] = $this->ion_auth->user()->row();
                              // setting web server
                $file = new PHPExcel ();
                $file->getProperties ()->setCreator ( "Goblooge" );
                $file->getProperties ()->setLastModifiedBy ( "www.pmb.unidayan.ac.id" );
                $file->getProperties ()->setTitle ( "List Calon Peserta sudah membayar" );
                $file->getProperties ()->setSubject ( "Daftar Calon Peserta" );
                $file->getProperties ()->setDescription ( "Daftar Calon Peserta" );
                $file->getProperties ()->setKeywords ( "Daftar Calon Peserta" );
                $file->getProperties ()->setCategory ( "Calon Peserta" );
                /*end - BLOCK PROPERTIES FILE EXCEL*/

                /*start - BLOCK SETUP SHEET*/
                $file->createSheet ( NULL,0);
                $file->setActiveSheetIndex ( 0 );
                $sheet = $file->getActiveSheet ( 0 );
                //memberikan title pada sheet
                $sheet->setTitle ( "Daftar Dosen" );
                /*end - BLOCK SETUP SHEET*/

                /*start - BLOCK HEADER*/
                $sheet->setCellValue ( "A1", "No" );
                $sheet->setCellValue ( "B1", "NIM" );
                $sheet->setCellValue ( "C1", "Nama" );
                $sheet->setCellValue ( "D1", "No KTP" );
                $sheet->setCellValue ( "E1", "Email" );
                $sheet->setCellValue ( "F1", "No Hp" );
                $sheet->setCellValue ( "G1", "L/P" );
                $sheet->setCellValue ( "H1", "Agama" );
                $sheet->setCellValue ( "I1", "Tgl Lhr" );
                $sheet->setCellValue ( "J1", "Tmp Lhr" );
                $sheet->setCellValue ( "K1", "Nama Ibu Kandung" );
                $sheet->setCellValue ( "L1", "Tgl Lahir Ibu Kandung" );
                $sheet->setCellValue ( "M1", "Pendidikan Ibu Kandung" );
                $sheet->setCellValue ( "N1", "Pekerjaan Ibu Kandung" );
                $sheet->setCellValue ( "O1", "Penghasilan Ibu Kandung" );
                $sheet->setCellValue ( "P1", "Nama Ayah" );
                $sheet->setCellValue ( "Q1", "Tgl Lahir Ayah" );
                $sheet->setCellValue ( "R1", "Pendidikan Ayah" );
                $sheet->setCellValue ( "S1", "Pekerjaan Ayah" );
                $sheet->setCellValue ( "T1", "Penghasilan Ayah" );
                $sheet->setCellValue ( "U1", "Program Studi" );
                $sheet->setCellValue ( "V1", "Semester Mulai" );
                $sheet->setCellValue ( "W1", "Passowrd" );
                /*end - BLOCK HEADER*/

                /* start - BLOCK MEMASUKAN DATABASE*/
                $nomor = 1;
                $nocel = 2;
                $prodi = $this->Rekap_m->detail_prodi($post['prodi']);
                $hasil = $this->Rekap_m->data_mhs($post['prodi'],$post['angkatan']);
                // echo "<pre>";print_r($prodi);echo "</pre>";exit();
                foreach ($hasil as $data) {
                    if ($data->id_agama == TRUE) {
                        $agama = $data->nm_agama;
                    }else{
                        $agama = 'Tidak Diisi';
                    }
                    $sheet->setCellValue ( "A".$nocel, $nomor );
                    $sheet->setCellValue ( "B".$nocel, $data->nipd );
                    $sheet->setCellValue ( "C".$nocel, strtoupper($data->nm_pd) );
                    $sheet->setCellValue ( "D".$nocel, "'".@$data->nik);
                    $sheet->setCellValue ( "E".$nocel, $data->email);
                    $sheet->setCellValue ( "F".$nocel, $data->no_hp);
                    $sheet->setCellValue ( "G".$nocel, $data->jk);
                    $sheet->setCellValue ( "H".$nocel, strtoupper($agama));
                    $sheet->setCellValue ( "I".$nocel, $data->tgl_lahir);
                    $sheet->setCellValue ( "J".$nocel, strtoupper($data->tmpt_lahir));
                    $sheet->setCellValue ( "K".$nocel, strtoupper($data->nm_ibu_kandung));
                    $sheet->setCellValue ( "L".$nocel, $data->tgl_lahir_ibu);
                    $sheet->setCellValue ( "M".$nocel, @$this->Admin_m->detail_data('jenjang_pendidikan','id_jenj_didik',$data->id_jenjang_pendidikan_ibu)->nm_jenj_didik);
                    $sheet->setCellValue ( "N".$nocel, $this->Admin_m->detail_data('pekerjaan','id_pekerjaan',$data->id_pekerjaan_ibu)->nm_pekerjaan);
                    $sheet->setCellValue ( "O".$nocel, @$this->Admin_m->detail_data('penghasilan','id_penghasilan',$data->id_penghasilan_ibu)->nm_penghasilan);
                    $sheet->setCellValue ( "P".$nocel, strtoupper($data->nm_ayah));
                    $sheet->setCellValue ( "Q".$nocel, $data->tgl_lahir_ayah);
                    $sheet->setCellValue ( "R".$nocel, @$this->Admin_m->detail_data('jenjang_pendidikan','id_jenj_didik',@$data->id_jenjang_pendidikan_ayah)->nm_jenj_didik);
                    // echo "<pre>";print_r();echo "</pre>";exit();
                    $sheet->setCellValue ( "S".$nocel, @$this->Admin_m->detail_data('pekerjaan','id_pekerjaan',$data->id_pekerjaan_ayah)->nm_pekerjaan);
                    $sheet->setCellValue ( "T".$nocel, @$this->Admin_m->detail_data('penghasilan','id_penghasilan',$data->id_penghasilan_ayah)->nm_penghasilan);
                    $sheet->setCellValue ( "U".$nocel, $data->nm_jenj_didik.' - '.$data->nm_lemb);
                    $sheet->setCellValue ( "V".$nocel, $data->mulai_smt);
                    $sheet->setCellValue ( "W".$nocel, $data->repassword);
                    $nomor++;
                    $nocel++;
                }
                // echo "<pre>";print_r($sheet);echo "</pre>";exit();
                /* end - BLOCK MEMASUKAN DATABASE*/

                /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                header ( 'Content-Type: application/vnd.ms-excel' );
                //namanya adalah keluarga.xls
                header ( 'Content-Disposition: attachment;filename='.'"Daftar Mahasiswa '.$prodi->nm_jenj_didik.' - '.$prodi->nm_lemb.' '.$post['angkatan'].'.xls"' ); 
                header ( 'Cache-Control: max-age=0' );
                $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
                $writer->save ( 'php://output' );
                /* start - BLOCK MEMBUAT LINK DOWNLOAD*/
                              // pagging setting
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    function proses_update_data_mhs2(){
    // $post = $this->input->post();
    // echo "<pre>";print_r($post);echo "<pre/>";exit();
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
          if ($val[0]!='') {
            // echo "<pre>";print_r($val[1]);echo "<pre/>";exit();
            // $mhs = $this->Export_m->getmhs(filter_var($val[0], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));
            $mhs = $this->Export_m->cekdata(filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));
            // echo "<pre>";print_r($mhs);echo "<pre/>";exit();
            if (!empty($mhs)) {
              $check = $mhs;
              if ($check==true) {
                // data
                $datamhss = array(
                    'nm_pd'      => trim(filter_var($val[2], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    // 'id_mhs_pt'      => $ressult->noreg,
                    // 'nim'      => $this->input->post('nim'),
                    'jk'      => trim(filter_var($val[3], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nik' => trim(filter_var($val[8], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tmpt_lahir' => trim(filter_var($val[4], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir' => trim(filter_var($val[5], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nm_ayah' => trim(filter_var($val[27], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir_ayah' => trim(filter_var($val[28], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    // 'nik_ayah' => NULL,
                    // 'id_jenjang_pendidikan_ayah' => $ressult->id_jenjang_pendidikan_ayah,
                    // 'id_pekerjaan_ayah' => $ressult->id_pekerjaan_ayah,
                    // 'id_penghasilan_ayah' => $ressult->id_penghasilan_ayah,
                    // 'id_kebutuhan_khusus_ayah' => NULL,
                    'nm_ibu_kandung' => trim(filter_var($val[7], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir_ibu' => trim(filter_var($val[23], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    // 'nik_ibu' => NULL,
                    // 'id_jenjang_pendidikan_ibu' => $ressult->id_jenjang_pendidikan_ibu,
                    // 'id_pekerjaan_ibu' => $ressult->id_pekerjaan_ibu,
                    // 'id_penghasilan_ibu' => $ressult->id_penghasilan_ibu,
                    // 'id_kebutuhan_khusus_ibu' => NULL,
                    'no_hp' => trim(filter_var($val[20], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    // 'email' => trim(filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    // 'a_terima_kps' => 0,
                    // 'no_kps' => NULL,
                    // 'npwp' => NULL,
                    // 'id_wil' => '999999',
                    // 'id_jns_tinggal' => NULL,
                    // 'id_agama' => $ressult->id_agama,
                    // 'id_alat_transport' => NULL,
                    // 'kewarganegaraan' => 'ID',
                    );
                    $this->Admin_m->update_data('mahasiswa','id',$mhs->id_pd_siakad,$datamhss);
                    // data end
                    $error_count++;
                    $error[] = $val[1]." ".$val[2]." Berhasil di update";
                    // echo "<pre>";print_r($datamhss);echo "<pre/>";exit();
                }
              }
            }else{
              $sukses++;
              $url = 'http://pmb.unidayan.ac.id/index.php/kampus/get_detail_pmb_noreg/'.@filter_var($val[32], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
                // $url2 = 'http://pmb.unidayan.ac.id/index.php/kampus/get_pil_jurusan/'.@$this->input->post('id_pilihan');
              $mhsdt = $url;
              $ressult = json_decode(file_get_contents($url));
                // echo "<pre>";print_r($mhsdt);echo "<pre/>";exit();
                // $ressult2 = json_decode(file_get_contents($url2));
              $dtsms = $this->Admin_m->detail_data('sms','kode_prodi',trim(filter_var($val[13], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)));
                // echo "<pre>";print_r($ressult);echo "<pre/>";exit();
                // echo $ressult->id_mhs;
              if ($ressult == TRUE) {
                $datamhss = array(
                    'nm_pd'      => trim(filter_var($val[2], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'id_mhs_pt'      => $ressult->noreg,
                    'nim'      => trim(filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'jk'      => trim(filter_var($val[3], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nik' => trim(filter_var($val[8], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tmpt_lahir' => trim(filter_var($val[4], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir' => trim(filter_var($val[5], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nm_ayah' => trim(filter_var($val[27], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir_ayah' => $ressult->tgl_lahir_ayah,
                    'nik_ayah' => NULL,
                    'id_jenjang_pendidikan_ayah' => $ressult->id_jenjang_pendidikan_ayah,
                    'id_pekerjaan_ayah' => $ressult->id_pekerjaan_ayah,
                    'id_penghasilan_ayah' => $ressult->id_penghasilan_ayah,
                    'id_kebutuhan_khusus_ayah' => NULL,
                    'nm_ibu_kandung' => trim(filter_var($val[7], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir_ibu' => @trim(filter_var($val[23], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nik_ibu' => NULL,
                    'id_jenjang_pendidikan_ibu' => @$ressult->id_jenjang_pendidikan_ibu,
                    'id_pekerjaan_ibu' => @$ressult->id_pekerjaan_ibu,
                    'id_penghasilan_ibu' => @$ressult->id_penghasilan_ibu,
                    'id_kebutuhan_khusus_ibu' => NULL,
                    'no_hp' => @$ressult->no_hp_mhs,
                    'email' => @$ressult->email_mhs,
                    'a_terima_kps' => 0,
                    'no_kps' => NULL,
                    'npwp' => NULL,
                    'id_wil' => '999999',
                    'id_jns_tinggal' => NULL,
                    'id_agama' => @$ressult->id_agama,
                    'id_alat_transport' => NULL,
                    'kewarganegaraan' => 'ID',
                );
                $this->Admin_m->insert_data('mahasiswa',$datamhss);
                    // 
                $datamhs = array(
                    'id_pd_siakad' => $this->Admin_m->last_id_mhs($ressult->noreg)->id,
                    'kode_sms' =>filter_var($val[13], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
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
                    'id_mhs' =>$this->Admin_m->last_id_mhs_pt($username)->id,
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
            }else{
                $datamhss = array(
                    'nm_pd'      => trim(filter_var($val[2], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'id_mhs_pt'      => trim(filter_var($val[32], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nim'      => trim(filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'jk'      => trim(filter_var($val[3], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nik' => trim(filter_var($val[8], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tmpt_lahir' => trim(filter_var($val[4], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir' => trim(filter_var($val[5], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nm_ayah' => trim(filter_var($val[27], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir_ayah' => NULL,
                    'nik_ayah' => NULL,
                    'id_jenjang_pendidikan_ayah' => NULL,
                    'id_pekerjaan_ayah' => NULL,
                    'id_penghasilan_ayah' => NULL,
                    'id_kebutuhan_khusus_ayah' => NULL,
                    'nm_ibu_kandung' => trim(filter_var($val[7], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir_ibu' => trim(filter_var($val[23], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nik_ibu' => NULL,
                    'id_jenjang_pendidikan_ibu' => NULL,
                    'id_pekerjaan_ibu' => NULL,
                    'id_penghasilan_ibu' => NULL,
                    'id_kebutuhan_khusus_ibu' => NULL,
                    'no_hp' => NULL,
                    'email' => NULL,
                    'a_terima_kps' => 0,
                    'no_kps' => NULL,
                    'npwp' => NULL,
                    'id_wil' => '999999',
                    'id_jns_tinggal' => NULL,
                    'id_agama' => NULL,
                    'id_alat_transport' => NULL,
                    'kewarganegaraan' => 'ID',
                );
                $this->Admin_m->insert_data('mahasiswa',$datamhss);
                    // 
                $datamhs = array(
                    'id_pd_siakad' => $this->Admin_m->last_id_mhs(trim(filter_var($val[32], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)))->id,
                    'kode_sms' =>filter_var($val[13], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
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
                    'mulai_smt' => trim(filter_var($val[15], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)).'1',
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
                $email = 'peserta@unidayan.ac.id';
                $password = $this->Admin_m->acakangkahuruf(5);
                $group = array('2');
                $additional_data = array(
                    'first_name' => trim(filter_var($val[2], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'id_mhs' => $this->Admin_m->last_id_mhs_pt($username)->id,
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
      unlink("asset/upload/mahasiswa/".$_FILES['semester']['name']);
      $msg = '';
      if (($sukses>0) || ($error_count>0)) {
        $msg =  "<div class=\"alert alert-warning bts-ats2 alert-dismissible\" role=\"alert\" >
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
      redirect(base_url('index.php/admin/rekaptulasi/export_mahasiswa/'));
  }
  function proses_update_data_mhs(){
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
            // 
            $datamhss = array(
                'nm_pd'      => trim(filter_var($val[2], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    // 'id_mhs_pt'      => $ressult->noreg,
                    // 'nim'      => $this->input->post('nim'),
                'jk'      => trim(filter_var($val[3], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                'nik' => trim(filter_var($val[8], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                'tmpt_lahir' => trim(filter_var($val[4], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                'tgl_lahir' => trim(filter_var($val[5], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                'nm_ayah' => trim(filter_var($val[27], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                'tgl_lahir_ayah' => trim(filter_var($val[28], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    // 'nik_ayah' => NULL,
                    // 'id_jenjang_pendidikan_ayah' => $ressult->id_jenjang_pendidikan_ayah,
                    // 'id_pekerjaan_ayah' => $ressult->id_pekerjaan_ayah,
                    // 'id_penghasilan_ayah' => $ressult->id_penghasilan_ayah,
                    // 'id_kebutuhan_khusus_ayah' => NULL,
                'nm_ibu_kandung' => trim(filter_var($val[7], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                'tgl_lahir_ibu' => trim(filter_var($val[23], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    // 'nik_ibu' => NULL,
                    // 'id_jenjang_pendidikan_ibu' => $ressult->id_jenjang_pendidikan_ibu,
                    // 'id_pekerjaan_ibu' => $ressult->id_pekerjaan_ibu,
                    // 'id_penghasilan_ibu' => $ressult->id_penghasilan_ibu,
                    // 'id_kebutuhan_khusus_ibu' => NULL,
                'no_hp' => trim(filter_var($val[20], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    // 'email' => trim(filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    // 'a_terima_kps' => 0,
                    // 'no_kps' => NULL,
                    // 'npwp' => NULL,
                    // 'id_wil' => '999999',
                    // 'id_jns_tinggal' => NULL,
                    // 'id_agama' => $ressult->id_agama,
                    // 'id_alat_transport' => NULL,
                    // 'kewarganegaraan' => 'ID',
            );
            $this->Admin_m->update_data('mahasiswa','id',$check->id_pd_siakad,$datamhss);
                    // data end
            $error_count++;
            $error[] = $val[1]." ".$val[2]." Berhasil di update";
            //
          } else {
            $sukses++;
            //new
            $url = 'http://pmb.unidayan.ac.id/index.php/kampus/get_detail_pmb_noreg/'.@filter_var($val[32], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
            // $url2 = 'http://pmb.unidayan.ac.id/index.php/kampus/get_pil_jurusan/'.@$this->input->post('id_pilihan');
            $mhsdt = $url;
            $ressult = json_decode(file_get_contents($url));
            // echo "<pre>";print_r($mhsdt);echo "<pre/>";exit();
            // $ressult2 = json_decode(file_get_contents($url2));
            $dtsms = $this->Admin_m->detail_data('sms','kode_prodi',trim(filter_var($val[13], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)));
            // echo "<pre>";print_r($ressult);echo "<pre/>";exit();
            // echo $ressult->id_mhs;
            if ($ressult == TRUE) {
                $datamhss = array(
                    'nm_pd'      => trim(filter_var($val[2], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'id_mhs_pt'      => $ressult->noreg,
                    'nim'      => trim(filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'jk'      => trim(filter_var($val[3], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nik' => trim(filter_var($val[8], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tmpt_lahir' => trim(filter_var($val[4], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir' => trim(filter_var($val[5], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nm_ayah' => trim(filter_var($val[27], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir_ayah' => trim(filter_var($val[28], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nik_ayah' => NULL,
                    'id_jenjang_pendidikan_ayah' => @$ressult->id_jenjang_pendidikan_ayah,
                    'id_pekerjaan_ayah' => @$ressult->id_pekerjaan_ayah,
                    'id_penghasilan_ayah' => @$ressult->id_penghasilan_ayah,
                    'id_kebutuhan_khusus_ayah' => NULL,
                    'nm_ibu_kandung' => trim(filter_var($val[7], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir_ibu' => trim(filter_var($val[23], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nik_ibu' => NULL,
                    'id_jenjang_pendidikan_ibu' => @$ressult->id_jenjang_pendidikan_ibu,
                    'id_pekerjaan_ibu' => @$ressult->id_pekerjaan_ibu,
                    'id_penghasilan_ibu' => @$ressult->id_penghasilan_ibu,
                    'id_kebutuhan_khusus_ibu' => NULL,
                    'no_hp' => @$ressult->no_hp_mhs,
                    'email' => @$ressult->email_mhs,
                    'a_terima_kps' => 0,
                    'no_kps' => NULL,
                    'npwp' => NULL,
                    'id_wil' => '999999',
                    'id_jns_tinggal' => NULL,
                    'id_agama' => @$ressult->id_agama,
                    'id_alat_transport' => NULL,
                    'kewarganegaraan' => 'ID',
                );
                $this->Admin_m->insert_data('mahasiswa',$datamhss);
                // 
                $datamhs = array(
                    'id_pd_siakad' => $this->Admin_m->last_id_mhs($ressult->noreg)->id,
                    'kode_sms' =>filter_var($val[13], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
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
                    'id_mhs' =>$this->Admin_m->last_id_mhs_pt($username)->id,
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
            }else{
                $datamhss = array(
                    'nm_pd'      => trim(filter_var($val[2], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'id_mhs_pt'      => filter_var($val[32], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
                    'nim'      => trim(filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'jk'      => trim(filter_var($val[3], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nik' => trim(filter_var($val[8], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tmpt_lahir' => trim(filter_var($val[4], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir' => trim(filter_var($val[5], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nm_ayah' => trim(filter_var($val[27], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir_ayah' => trim(filter_var($val[28], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'nik_ayah' => NULL,
                    'nm_ibu_kandung' => trim(filter_var($val[7], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'tgl_lahir_ibu' => trim(filter_var($val[23], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'no_hp' => trim(filter_var($val[20], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'email' => 'peserta',
                    'a_terima_kps' => 0,
                    'no_kps' => NULL,
                    'npwp' => NULL,
                    'id_wil' => '999999',
                    'id_jns_tinggal' => NULL,
                    'id_alat_transport' => NULL,
                    'kewarganegaraan' => 'ID',
                );
                $this->Admin_m->insert_data('mahasiswa',$datamhss);
                // 
                $datamhs = array(
                    'id_pd_siakad' => $this->Admin_m->last_id_mhs(filter_var($val[32], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH))->id,
                    'kode_sms' =>filter_var($val[13], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH),
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
                    'mulai_smt' => trim(filter_var($val[15], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)).'1',
                    'sks_diakui' => 0,
                    'ipk' => 0,
                    'id_jns_daftar' => trim(filter_var($val[16], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'id_jns_keluar' => NULL,
                    'id_jalur_masuk' => 8,
                    'id_pembiayaan' => 1,
                );
                // echo "<pre>";print_r($datamhs);echo "</pre>";exit();
                $this->Admin_m->insert_data('mahasiswa_pt',$datamhs);
                // buat akun
                $username = trim(filter_var($val[1], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));
                $email = 'peserta@unidayan.ac.id';
                $password = $this->Admin_m->acakangkahuruf(5);
                $group = array('2');
                $additional_data = array(
                    'first_name' => trim(filter_var($val[2], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)),
                    'id_mhs' =>$this->Admin_m->last_id_mhs_pt($username)->id,
                    'last_name' => $this->Admin_m->info_pt(1)->nama_info_pt,
                    'company' => $this->Admin_m->info_pt(1)->nama_info_pt,
                    'phone' => '123456789',
                    'repassword' => $password,
                    );
                $this->ion_auth->register($username, $password, $email, $additional_data, $group);
                // buat aktifitas mahasiswa
                $aktvkul = array(
                    'id_smt' => trim(filter_var($val[15], FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH)).'1',
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
    redirect(base_url('index.php/admin/rekaptulasi/export_mahasiswa/'));
  }
}
?>