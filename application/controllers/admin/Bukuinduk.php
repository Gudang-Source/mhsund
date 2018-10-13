<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bukuinduk extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Bukuinduk_m');
    }
    public function index(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','prodi');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                // $post = $this->input->get();
                // $idmhs = $this->Aktivitas_m->detail_mahasiswa($this->ion_auth->user()->row()->id_mhs);
                $data['title'] = $this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/bukuinduk/main-v';
                // $data['datamhs'] = $idmhs;
                // pagging setting
                $data['prodi'] = $this->Bukuinduk_m->prodi();
                $data['angkatan'] = $this->Bukuinduk_m->angkatan();
                // $data['hasil'] = $this->Aktivitas_m->aktivitas_kuliah($idmhs->idmhspt);
                // echo "<pre>";print_r($data['hasil']);echo "<pre/>";exit();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin/login'));
        }
    }
    public function cetak_bukuinduk(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','prodi');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $detprod = $this->Bukuinduk_m->detail_prodi($post['prodi']);
                $data['title'] = 'Buku Induk Mahasiswa Program Studi ' .$detprod->nm_jenj_didik.' - '.$detprod->nm_lemb.' Angkatan '.$post['angkatan'].' '.$this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                // $data['datamhs'] = $idmhs;
                // pagging setting
                $data['prodi'] = $this->Bukuinduk_m->prodi();
                $data['angkatan'] = $this->Bukuinduk_m->angkatan();
                $data['hasil'] = $this->Bukuinduk_m->akun_mhs($post['prodi'],$post['angkatan']);
                // echo "<pre>";print_r($data['hasil']);echo "<pre/>";exit();
                $this->load->view('admin/bukuinduk/cetak-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin/login'));
        }
    }
}
?>