<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Satuan_pend extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
    }
    public function index(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $info = $this->Admin_m->info_pt(1);
                $sp = $this->Admin_m->detail_data('satuan_pendidikan','id_sp',$info->kode_info_pt);
                $data['title'] = $sp->nm_lemb;
                $data['infopt'] = $info;
                $data['brand'] = 'asset/img/lembaga/'.$info->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/satuan-pend-v';
                // pagging setting
                $data['hasil'] = $sp;
                // echo "<pre>";print_r($data['hasil']);echo "<pre/>";exit();
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