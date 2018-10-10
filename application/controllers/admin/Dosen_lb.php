<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen_lb extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Dosen_lb_m');
        $this->load->model('admin/Dosen_m');
    }
    public function index(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','prodi','dosen');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $data['title'] = 'Dosen LB - '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/prodi';
                $data['page'] = 'admin/dosen_lb/main-v';
                // config paging
                $config['base_url'] = base_url('index.php/admin/dosen_lb/index/');
                if (!$this->ion_auth->in_group('prodi')) {
                    $config['total_rows'] = $this->Dosen_lb_m->count_dosen_lb(@$post['string'],@$post['prodi']);
                }else{
                    $config['total_rows'] = $this->Dosen_lb_m->count_dosen_lb(@$post['string'],$data['users']->id_mhs);
                }
                $config['per_page'] = 20;  //show record per halaman
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
                if (!$this->ion_auth->in_group('prodi')) {
                    $data['hasil'] = $this->Dosen_lb_m->select_all_dosen_lb($config["per_page"], $data['offset'],@$post['string'],@$post['prodi']);
                }else{
                    $data['hasil'] = $this->Dosen_lb_m->select_all_dosen_lb($config["per_page"], $data['offset'],@$post['string'],$data['users']->id_mhs);
                }
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
    public function penugasan(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','dosen','prodi');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $data['title'] = 'Penugasan Dosen LB - '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/prodi';
                $data['page'] = 'admin/dosen_lb/penugasan-v';
                // config paging
                $config['base_url'] = base_url('index.php/admin/dosen_lb/penugasan/');
                if (!$this->ion_auth->in_group('prodi')) {
                    $config['total_rows'] = $this->Dosen_lb_m->count_dosen_lb_tgs(@$post['string'],@$post['prodi']);
                }else{
                    $config['total_rows'] = $this->Dosen_lb_m->count_dosen_lb_tgs(@$post['string'],$data['users']->id_mhs);
                }
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
                $data['prodi'] = $this->Dosen_m->get_prodi();
                if (!$this->ion_auth->in_group('prodi')) {
                    $data['hasil'] = $this->Dosen_lb_m->select_all_dosen_lb_tgs($config["per_page"], $data['offset'],@$post['string'],@$post['prodi']);
                }else{
                    $data['hasil'] = $this->Dosen_lb_m->select_all_dosen_lb_tgs($config["per_page"], $data['offset'],@$post['string'],$data['users']->id_mhs);
                }
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
    public function detail($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','prodi','dosen');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $idmhs = $this->Dosen_lb_m->detail_dosen_lb($id);
                $data['title'] = strtoupper($idmhs->nm_dsn_lb);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/dosen';
                $data['page'] = 'admin/dosen_lb/detail-dosen-v';
                $data['datamhs'] = $idmhs;
                // $data['pendidikan'] = $this->Admin_m->select_data('jenjang_pendidikan'); 
                // $data['pekerjaan'] = $this->Admin_m->select_data('pekerjaan'); 
                // $data['penghasilan'] = $this->Admin_m->select_data('penghasilan'); 
                // echo "<pre>";print_r($idmhs);echo "<pre/>";exit();
                $data['hasil'] = $idmhs;
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function detail_penugasan($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','prodi','dosen');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $result = $this->Dosen_lb_m->detail_dosen_lb($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['datamhs'] = $result;
                $data['title'] = 'Penugasan Dosen - '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/dosen';
                $data['page'] = 'admin/dosen_lb/detail-penugasan-v';
                // config paging
                $config['base_url'] = base_url('index.php/admin/dosen/detail_penugasan/'.$id.'/');
                $config['total_rows'] = $this->Dosen_m->count_data_dosen_tgs_by($id); //total row
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
                $data['offset'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                $data['detail'] = $result;
                $data['hasil'] = $this->Dosen_m->select_all_data_dosen_tgs_by($config["per_page"], $data['offset'],$id);
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
    public function aktivitas($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','prodi','dosen');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $detail = $this->Dosen_lb_m->det_dosen_lb_pt($id);

                $post = $this->input->get();
                $data['title'] = 'Aktivitas Mengajar - '.$detail->nm_sdm;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/dosen';
                $data['page'] = 'admin/dosen_lb/aktivitas-v';
                // config paging
                $config['base_url'] = base_url('index.php/admin/dosen_lb/aktivitas/'.$id.'/');
                $config['total_rows'] = $this->Dosen_m->count_ajar_dosen_lb_pt($id); //total row
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
                $data['offset'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                $data['jumlah'] = $config['total_rows'];
                $data['datamhs'] = $detail;
                $data['hasil'] = $this->Dosen_lb_m->res_ajar_dosen_lb($config["per_page"],$data['offset'],$id);
                // echo "<pre>";print_r( $data['hasil']);echo "<pre/>";exit();
                $data['pagination'] = $this->pagination->create_links();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
}
?>