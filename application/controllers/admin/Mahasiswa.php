<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Mahasiswa_m');
        $this->load->model('admin/Profil_m');
    }
    public function index(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $data['title'] = 'Mahasiswa - '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/admin';
                $data['page'] = 'admin/mahasiswa/main-v';
                // config paging
                $config['base_url'] = base_url('index.php/admin/mahasiswa/index');
                $config['total_rows'] = $this->Mahasiswa_m->count_data_mahasiswa(@$post['string'],@$post['prodi']); //total row
                $config['per_page'] = 10;  //show record per halaman
                $config["uri_segment"] = 4;  // uri parameter
                // style pagging
                $config['first_link']       = 'Pertama';
                $config['last_link']        = 'Terakhir';
                $config['next_link']        = 'Selanjutnya';
                $config['prev_link']        = 'Sebelumnya';
                $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination pagination-sm justify-content-center">';
                $config['full_tag_close']   = '</ul></nav></div>';
                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tagl_close']  = '</span>Next</li>';
                $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                $config['first_tagl_close'] = '</span></li>';
                $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['last_tagl_close']  = '</span></li>';
                $this->pagination->initialize($config);
                $data['offset'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                $data['prodi'] = $this->Mahasiswa_m->get_prodi();
                $data['hasil'] = $this->Mahasiswa_m->select_all_data_mahasiswa($config["per_page"], $data['offset'],@$post['string'],@$post['prodi']);
                $data['pagination'] = $this->pagination->create_links();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
     public function detail($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $idmhs = $this->Profil_m->detail_mahasiswa($id);
                $post = $this->input->get();
                $data['title'] = strtoupper($idmhs->nm_pd);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/mahasiswa/detail-v';
                $data['datamhs'] = $idmhs;
                $data['pendidikan'] = $this->Admin_m->select_data('jenjang_pendidikan'); 
                $data['pekerjaan'] = $this->Admin_m->select_data('pekerjaan'); 
                $data['penghasilan'] = $this->Admin_m->select_data('penghasilan'); 
                // echo "<pre>";print_r($idmhs);echo "<pre/>";exit();
                $data['hasil'] = $this->Profil_m->detail_mahasiswa($id);
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function nilai($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->load->model('admin/Nilai_m');
                $idmhs = $this->Profil_m->detail_mahasiswa($id);
                $data['title'] = 'Nilai '.strtoupper($idmhs->nm_pd);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['page'] = 'admin/mahasiswa/nilai-v';
                $data['datamhs'] = $idmhs;
                // pagging setting
                $data['hasil'] = $this->Nilai_m->daftar_nilai($idmhs->idmhspt);
                // echo "<pre>";print_r( $data['hasil']);echo "<pre/>";exit();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function histori_pendidikan($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $idmhs = $this->Profil_m->detail_mahasiswa($id);
                $data['title'] = 'Nilai '.strtoupper($idmhs->nm_pd);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['page'] = 'admin/mahasiswa/histori-pendidikan-v';
                $data['datamhs'] = $idmhs;
                // pagging setting
                $data['hasil'] = $this->Admin_m->select_data_order('mahasiswa_pt','id_pd_siakad',$id);
                // echo "<pre>";print_r( $id);echo "<pre/>";exit();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
     public function krs($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $idmhs = $this->Profil_m->detail_mahasiswa($id);
                $data['title'] = 'Nilai '.strtoupper($idmhs->nm_pd);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['page'] = 'admin/mahasiswa/khs-mhs-v';
                $data['datamhs'] = $idmhs;
                $smtlat = $this->Mahasiswa_m->lastsmt($idmhs->idmhspt);
                // pagging setting
                $data['hasil'] = $this->Mahasiswa_m->krs($idmhs->idmhspt,$smtlat->id_smt);
                // echo "<pre>";print_r($data['hasil']);echo "<pre/>";exit();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function kuliah_mahasiswa($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->load->model('admin/Aktivitas_m');
                $post = $this->input->get();
                $idmhs = $this->Profil_m->detail_mahasiswa($id);
                $data['title'] = 'Kuliah Mahasiswa';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['page'] = 'admin/mahasiswa/aktivitas-v';
                $data['datamhs'] = $idmhs;
                // pagging setting
                $data['hasil'] = $this->Aktivitas_m->aktivitas_kuliah($id);
                // echo "<pre>";print_r($data['hasil']);echo "<pre/>";exit();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function dtmhs(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                // $mhs = $this->Admin_m->select_data('mahasiswa');
                $this->load->library('datatables');
                echo "<pre>";print_r($this->load->library('datatables'));echo "<pre/>";exit();
                $this->datatables->select('*');
                $this->datatables->from('mahasiswa');
                return print_r($this->datatables->generate());

            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    function datatables_ajax()
    {
        /** AJAX Handle */
        if( $this->input->is_ajax_request() )  {
            $this->load->model('admin/Mahasiswa_m');
            /**
             * Mengambil Parameter dan Perubahan nilai dari setiap 
             * aktifitas pada table
             *
             */
            $datatables  = $_POST;
            $datatables['table']    = 'mahasiswa';
            $datatables['id-table'] = 'id';
            
            /**
             * Kolom yang ditampilkan
             */
            $datatables['col-display'] = array(
                           'nm_pd',
                           'nim',
                           'jk',
                           'id_agama',
                           'tmpt_lahir',
                           'tgl_lahir',
                           'id_agama',
                         );
            /**
            * menggunakan table join
            */
            $datatables['join']    = 'INNER JOIN position ON position = id_position';
            $this->M_Karyawan->Datatables($datatables);
        }
        return;
    }
    public function tambah_mhs(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $data['title'] = 'Tambah Mahasiswa';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['page'] = 'admin/mahasiswa/tambah-v';
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function tmbh_mhs_pmb(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                if (empty($this->input->post('string'))) {
                    $val = 'A';
                }else{
                    $val = $this->input->post('string');
                }
                $this->input->post();
                $data['title'] = 'Tambah Mahasiswa dari penerimaan mahasiswa baru';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['page'] = 'admin/mahasiswa/tambah-pmb-v';
                $url = 'http://pmb.unidayan.ac.id/index.php/kampus/get_data/'.@$val;
                $ressult = json_decode(file_get_contents($url));
                $data['hasil'] = $ressult;
                // echo "<pre>";print_r($ressult);echo "<pre/>";exit();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function detail_mhs_pmb($idpmb){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $url = 'http://pmb.unidayan.ac.id/index.php/kampus/get_detail_pmb/'.@$idpmb;
                $url2 = 'http://pmb.unidayan.ac.id/index.php/kampus/get_dt_jurusan/'.@$idpmb;
                $ressult = json_decode(file_get_contents($url));
                $ressult2 = json_decode(file_get_contents($url2));
                $data['title'] = 'Tambah '.$ressult->nama_mhs;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['page'] = 'admin/mahasiswa/detail-pmb-v';
                $data['hasil'] = $ressult;
                $data['jurusan'] = $ressult2;
                // echo "<pre>";print_r($this->Admin_m->acakangkahuruf(5));echo "<pre/>";exit();
                // echo "<pre>";print_r($ressult);echo "<pre/>";exit();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function create_mahasiswa($idpmb){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $url = 'http://pmb.unidayan.ac.id/index.php/kampus/get_detail_pmb/'.@$idpmb;
                $url2 = 'http://pmb.unidayan.ac.id/index.php/kampus/get_pil_jurusan/'.@$this->input->post('id_pilihan');
                $mhsdt = $url;
                $ressult = json_decode(file_get_contents($url));
                $ressult2 = json_decode(file_get_contents($url2));
                $dtsms = $this->Admin_m->detail_data('sms','kode_prodi',$ressult2->kode_prodi);
                // echo "<pre>";print_r($dtsms);echo "<pre/>";exit();
                // echo $ressult->id_mhs;
                if ($ressult == TRUE) {
                    $datamhss = array(
                        'nm_pd'      => $ressult->nama_mhs,
                        'id_mhs_pt'      => $ressult->noreg,
                        'nim'      => $this->input->post('nim'),
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
                        'kode_sms' =>$dtsms->kode_prodi,
                        'id_sp'      => $this->Admin_m->info_pt(1)->kode_info_pt,
                        'id_sms' => $dtsms->id_sms,
                        'nipd' => trim($this->input->post('nim')),
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
                    $username = trim($this->input->post('nim'));
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
                    // alih lokasi
                    $getttd = $this->Admin_m->detail_data('mahasiswa_pt','nipd',trim($this->input->post('nim')));
                    $pesan = 'Mahasiswa Baru dengan NIM :'.trim($this->input->post('nim')).' berhasil ditambahkan';
                    $this->session->set_flashdata('message', $pesan );
                    redirect(base_url('index.php/admin/mahasiswa/buktitandaregis/'.$getttd->id));
                }
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function buktitandaregis($idmhspt){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $ressult = $this->Mahasiswa_m->det_mhs($idmhspt);
                echo "<pre>";print_r($ressult);echo "<pre/>";exit();
                $data['title'] = 'Tambah ';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['page'] = 'admin/mahasiswa/bukti-regis-v';
                $data['hasil'] = $ressult;
                // echo "<pre>";print_r($this->Admin_m->acakangkahuruf(5));echo "<pre/>";exit();
                // echo "<pre>";print_r($ressult);echo "<pre/>";exit();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
}
?>