<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Setting_m');
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
                $data['title'] = 'Setting - '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                // $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/setting/main-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function user_prodi(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $data['title'] = 'Daftar Akun Program Studi - '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/admin';
                $data['page'] = 'admin/setting/user-prodi-v';
                // config paging
                $config['base_url'] = base_url('index.php/admin/setting/user_prodi/');
                $config['total_rows'] = $this->Setting_m->count_user_prodi(@$post['string']); //total row
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
                $data['prodi'] = $this->Setting_m->all_prodi();
                $data['hasil'] = $this->Setting_m->select_user_prodi($config["per_page"],$data['offset'],@$post['string']);
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
    public function create_akun_prodi(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->form_validation->set_rules('first_name', 'Nama Lengkap', 'trim|alpha_dash|required');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[16]');
                $this->form_validation->set_rules('id_mhs', 'Program Studi', 'trim|required');
                $this->form_validation->set_rules('repassword', 'Ulangi Password', 'trim|required|matches[password]');
                if ($this->form_validation->run() == FALSE)
                {
                    $pesan = validation_errors();
                    // echo "<pre>";print_r($pesan);echo "<pre/>";exit();
                    $this->session->set_flashdata('gagalkirim',$pesan);
                    redirect(base_url('index.php/admin/setting/user_prodi'));
                }
                else
                {
                    $idakhir = $this->Setting_m->lastid()->id+1;
                    $username = trim(str_pad($idakhir, 8, 0, STR_PAD_LEFT));
                    $email = 'info@unidayan.ac.id';
                    $password = $this->input->post('password');
                    $group = array($this->Admin_m->detail_data('groups','name','prodi')->id);
                                    // validasi
                    $additional_data = array(
                        'first_name' => trim($this->input->post('first_name')),
                        'id_mhs' =>trim($this->input->post('id_mhs')),
                        'last_name' => $this->Admin_m->info_pt(1)->nama_info_pt,
                        'company' => $this->Admin_m->info_pt(1)->nama_info_pt,
                        'phone' => '123456789',
                        'lvl' => '2',
                        'repassword' => $password,
                    );
                    $this->ion_auth->register($username, $password, $email, $additional_data, $group);
                    $pesan = 'Admin Prodi berhasil dibuat';
                    $this->session->set_flashdata('message', $pesan );
                    redirect(base_url('index.php/admin/setting/user_prodi'));
                }
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function detail_adm_prodi($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $detail = $this->Admin_m->detail_data('users','id',$id);
                $data['title'] = 'Setting - '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                // $data['aside'] = 'nav/nav';
                $data['akun'] = $detail;
                $data['page'] = 'admin/setting/detail-adm-prodi-v';
                // pagging setting
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
