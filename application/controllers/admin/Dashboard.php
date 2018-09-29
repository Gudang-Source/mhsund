<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Dashboard_m');
    }
    public function index($offset=0){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','dosen','prodi');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $data['title'] = $this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                if ($this->ion_auth->is_admin()) {
                     $data['aside'] = 'nav/admin';
                     $data['page'] = 'admin/beranda-admin-v';
                     $idmhs = $this->Dashboard_m->detail_mahasiswa($this->ion_auth->user()->row()->id_mhs);
                     $data['datamhs'] = $idmhs;
                }elseif ($this->ion_auth->in_group('dosen')) {
                    $this->load->model('admin/Dosen_m');
                    $data['aside'] = 'nav/dosen';
                    $data['page'] = 'admin/beranda-dosen-v';
                    $idmhs = $this->Dosen_m->detail_dosen($this->ion_auth->user()->row()->id_mhs);
                    $data['datamhs'] = $idmhs;
                }elseif ($this->ion_auth->in_group('prodi')) {
                    // $this->load->model('admin/Prodi_m');
                    $data['aside'] = 'nav/prodi';
                    $data['page'] = 'admin/beranda-prodi-v';
                }else{
                 $data['aside'] = 'nav/nav';
                 $data['page'] = 'admin/beranda-v';
                 $idmhs = $this->Dashboard_m->detail_mahasiswa($this->ion_auth->user()->row()->id_mhs);
                 $data['datamhs'] = $idmhs;
                }
                $this->load->view('admin/dashboard-v',$data);
                // pagging setting
                
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
}
?>