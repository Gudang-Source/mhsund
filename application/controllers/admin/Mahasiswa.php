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
                $data['hasil'] = $this->Nilai_m->daftar_nilai($idmhs->id_pd_siakad);
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
}
?>