<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Kelas_m');
    }
    public function index(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','prodi');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $data['title'] = 'Kelas Kuliah - '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/prodi';
                $data['page'] = 'admin/kelas/main-v';
                // config paging
                $config['base_url'] = base_url('index.php/admin/kelas/index/');
                $config['total_rows'] = $this->Kelas_m->jumlah_kelas_prodi(@$post['matakuliah'],@$post['semester']); //total row
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
                // $data['prodi'] = $this->Mahasiswa_m->get_prodi();
                $data['hasil'] = $this->Kelas_m->all_kelas_prodi($config["per_page"],$data['offset'],@$post['matakuliah'],@$post['semester']);
                // echo "<pre>";print_r($data['hasil']);echo "<pre/>";exit();
                $data['pagination'] = $this->pagination->create_links();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function tmbhmhsbanyak($kls){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','dosen','prodi');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $data['title'] = 'Tambah Mahasiswa Kelas - '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/prodi';
                $data['page'] = 'admin/kelas/tambah-mhs-v';
                // config paging
                $config['base_url'] = base_url('index.php/admin/kelas/index/'.$kls.'/');
                $config['total_rows'] = $this->Kelas_m->jumlah_mhs_prodi(@$post['nama'],@$post['angkatan']); //total row
                $config['per_page'] = 10;  //show record per halaman
                $config["uri_segment"] = 5;  // uri parameter
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
                $data['nmkls'] = $this->Kelas_m->detail_kelas($kls);
                // $data['getprod'] = $this->Kelas_m->detail_prodi($sms)->row();
                $data['offset'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                // $data['prodi'] = $this->Mahasiswa_m->get_prodi();
                $data['hasil'] = $this->Kelas_m->get_mahasiswa($config["per_page"],$data['offset'],@$post['nama'],@$post['angkatan']);
                // echo "<pre>";print_r($data['nmkls']);echo "<pre/>";exit();
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
            $level = array('admin','dosen','prodi');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $detail = $this->Kelas_m->detail_kelas($id);
                $post = $this->input->get();
                $data['title'] = 'Detail Kelas - '.strtoupper($detail->nm_kls);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/prodi';
                $data['page'] = 'admin/kelas/detail-v';
                $data['nmkls'] = $detail;
                $kode_prodi = $this->Kelas_m->get_prodi_by_kel($id)->kode_prodi;
                $data['getprod'] = $this->Kelas_m->detail_prodi($kode_prodi)->row();
                $data['detdosen'] = $this->Kelas_m->dosenkls($id);
                $data['bobotnilai'] = $this->Kelas_m->bobotnilai($detail->id_sms);
                $data['hasil'] = $this->Kelas_m->mahasiwakelas($id);
                // echo "<pre>";print_r($data['getprod']);echo "<pre/>";exit();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function tambah_kelas(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','dosen','prodi');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $data['title'] = 'Tambah Kelas Mengajar';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/prodi';
                $data['page'] = 'admin/kelas/tambah-kelas-v';
                $data['prodi'] = $this->Kelas_m->prodi();
                $data['semester'] = $this->Kelas_m->semester();
                // echo "<pre>";print_r($data['getprod']);echo "<pre/>";exit();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function edit_nilai($kls,$id){
        if ($this->ion_auth->logged_in()){
            $level= array('admin','fakultas','prodi','dosen');
            if (!$this->ion_auth->in_group($level)) {
               $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
               $this->session->set_flashdata('message', $pesan );
               redirect(base_url('index.php/admin/dashboard_c'));
            }else{
                $post = $this->input->post();
                $nindeks = $this->Kelas_m->detail_data('bobot_nilai','nilai_huruf',$post['nilai_huruf'])->nilai_indeks;
                // echo "<pre>";print_r($nindeks);echo "<pre/>";exit();
                $edit = array(
                    'nilai_huruf' => $post['nilai_huruf'],
                    'nilai_indeks' => $nindeks,
                );
                $this->Kelas_m->edit('nilai','id',$id,$edit);
                $pesan = 'Ubah nilai berhasi';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/kelas/detail/'.$kls));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function tampildosen(){
        $nama = $this->input->post('kirimNama');
        $data['hasil_limit']=$this->Kelas_m->tampil_dosen_limit($nama);
        if($nama!=""){
            foreach($data['hasil_limit']->result() as $result)
            {
                echo '<a class="list-group-item" onClick="pilih(\''.$result->id_dosen.'\');">
                <b>'.$result->nidn.'</b> - '.$result->nm_sdm.' ('.$result->id_thn_ajaran.')</a>';
            }
        }else{
           echo "error";        
       }
    }
    public function proses_input_kelas(){
        if ($this->ion_auth->logged_in()){
            $post=$this->input->post();
            $kodemk = $this->Kelas_m->detail_data('mata_kuliah','id',$post['id_mk_siakad']);
             // echo "<pre>";print_r($post['id_mk_siakad']);echo "</pre>";exit();
            $data=array(
                'id_sms' => $post['id_sms'],
                'id_smt' => $post['id_smt'],
                'nm_kls' => $post['nm_kls'],
                'sks_mk' => $kodemk->sks_mk,
                'sks_tm' => $kodemk->sks_mk,
                'sks_prak' => $kodemk->sks_prak,
                'sks_prak_lap' => $kodemk->sks_prak_lap,
                'sks_sim' => $kodemk->sks_sim,
                'bahasan_case' => $post['bahasan_case'],
                'a_selenggara_pditt' => 0,
                'a_pengguna_pditt' => 0,
                'kuota_pditt' => 0,
                'tgl_mulai_koas' => $post['tgl_mulai_koas'],
                'tgl_selesai_koas' => $post['tgl_selesai_koas'],
                'id_mk_siakad' => $post['id_mk_siakad'],
                'id_mk' => $kodemk->id_mk,
            );
            // echo "<pre>";print_r($data);echo "</pre>";exit();
            $this->Kelas_m->insert_data('kelas_kuliah',$data);
            $pesan = 'Kelas '.$post['kelas'].' '.$post['id_smt'].' '.$kodemk->nm_mk.' Berhasil dibuat';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin/kelas/'));
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function proses_tambah_dosen_kelas(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','prodi','dosen');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard_c'));
            }else{
                $post = $this->input->post();
                $dosen = $this->Kelas_m->detail_data('dosen_pt','id',$post['id_dosen']);
                $kelas = $this->Kelas_m->detail_data('kelas_kuliah','id',$post['id_kls_siakad']);
                $datamhs = array(
                    'id_jns_eval'      => 1,
                    'id_dosen_pt_siakad' => $post['id_dosen'],
                    'id_reg_ptk' => $dosen->id_reg_ptk,
                    'id_kls'      => @$kelas->id_kls,
                    'id_kls_siakad'      => $post['id_kls_siakad'],
                    'sks_tm_subst' => $kelas->sks_tm,
                    'sks_prak_subst' => $kelas->sks_prak,
                    'sks_prak_lap_subst' => $kelas->sks_prak_lap,
                    'sks_sim_subst' => $kelas->sks_sim,
                    'sks_subst_tot'      => number_format($post['sks_subst_tot'],2),
                    'jml_tm_renc' => $post['jml_tm_renc'],
                    'jml_tm_real' => $post['jml_tm_real'],
                );
                // echo "<pre>";print_r($datamhs);echo "</pre>";exit();
                $this->Kelas_m->insert_data('ajar_dosen',$datamhs);
                $pesan = 'Dosen Berhasil ditambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/kelas/detail/'.$post['id_kls_siakad']));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function proses_edit_dosen_kelas(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','prodi','dosen');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard_c'));
            }else{
                $post = $this->input->post();
                $datamhs = array(
                    'sks_subst_tot'      => number_format($post['sks_subst_tot'],2),
                    'jml_tm_renc' => $post['jml_tm_renc'],
                    'jml_tm_real' => $post['jml_tm_real'],
                );
                // echo "<pre>";print_r($post);echo "</pre>";exit();
                $this->Kelas_m->edit('ajar_dosen','id',$post['id_ajr_dosen'],$datamhs);
                $pesan = 'Perubahan data dosen berhasil';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/kelas/detail/'.$post['id_kls_siakad']));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
     public function prosesaddmhs($kls){
        if ($this->ion_auth->logged_in()){
            $level= array('admin','fakultas','prodi','dosen');
            if (!$this->ion_auth->in_group($level)) {
               $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
               $this->session->set_flashdata('message', $pesan );
               redirect(base_url('index.php/admin/dashboard_c'));
            }else{
                $dtpilih = $this->input->post('pilih');
                // echo "<pre>";print_r($dtpilih);echo "<pre/>";exit();
                $kelas = $this->Kelas_m->detail_data('kelas_kuliah','id',$kls);
                $matakuliah = $this->Kelas_m->detail_data('mata_kuliah','id',$kelas->id_mk_siakad);
                foreach ($dtpilih as $data) {
                    $cekmhs = $this->Kelas_m->cek_mahasiswa_di_kelas($kls,$data,$kelas->id_smt);
                    // echo "<pre>";print_r($cekmhs);echo "<pre/>";exit();
                    if ($cekmhs == FALSE) {
                        $mahasiswa = $this->Kelas_m->detail_data('mahasiswa_pt','id',$data);
                        $datamhs = array(
                            'id_kls' => @$kelas->id_kls,
                            'id_reg_pd' => @$mahasiswa->id_reg_pd,
                            'id_kls_siakad'=>$kls,
                            'id_mhs_pt' =>$data,
                            'nipd' => $mahasiswa->nipd,
                            'id_smt' => $kelas->id_smt,
                            'kode_mk' => $matakuliah->kode_mk,
                        );
                        // echo "<pre>";print_r($datamhs);echo "<pre/>";exit();
                        $this->Kelas_m->insert_data('nilai',$datamhs);
                    }
                }
                $pesan = 'Mahasiswa berhasil ditambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/kelas/detail/'.$kls));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function delete_kelas($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','prodi','dosen');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard_c'));
            }else{
                $this->Kelas_m->delete_data('kelas_kuliah',$id);
                $pesan = 'Data Berhasil di Hapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/kelas/'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function delete_dosen_kelas($kelas,$id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','prodi','dosen');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard_c'));
            }else{
                $this->Kelas_m->delete_data('ajar_dosen','id',$id);
                $pesan = 'Data Berhasil di Hapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/kelas/detail/'.$kelas));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function getmk(){
        $buah = $_GET["query"];
        $cari = $this->Kelas_m->cari_mk($buah);
        foreach ($cari as $data) {
            $output['suggestions'][] = [
                'value' => $data->kode_mk.' - '.$data->nm_mk,
                'nm_mk'  => $data->nm_mk,
                'idmk'  => $data->id,
                'kode_mk'  => $data->kode_mk
            ];
        }
        if (!empty($output)) {
                    // Encode ke format JSON.
            echo json_encode($output);
        }
    }
    public function create_kls(){
        $post = $this->input->post();
        echo "<pre>";print_r($post);echo "<pre/>";exit();
    }
}
?>