<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
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
                $data['title'] = $this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/profil-v';
                $idmhs = $this->Profil_m->detail_mahasiswa($this->ion_auth->user()->row()->id_mhs);
                $data['datamhs'] = $idmhs;
                $data['pendidikan'] = $this->Admin_m->select_data('jenjang_pendidikan'); 
                $data['pekerjaan'] = $this->Admin_m->select_data('pekerjaan'); 
                $data['penghasilan'] = $this->Admin_m->select_data('penghasilan'); 
                // echo "<pre>";print_r($idmhs);echo "<pre/>";exit();
                $data['hasil'] = $this->Profil_m->detail_mahasiswa($data['users']->id_mhs);
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function update_dd($id_mahasiswa){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                // echo "<pre>";print_r($post);echo "<pre/>";exit();
                $data = array(
                    'nik'=>$post['nik'],
                    'tmpt_lahir'=>$post['tmpt_lahir'],
                    'tgl_lahir'=>$post['tgl_lahir'],
                    'no_hp'=>$post['no_hp'],
                    'email'=>$post['email'],
                    'rt'=>$post['rt'],
                    'rw'=>$post['rw'],
                );
                $this->Admin_m->update_data('mahasiswa','id',$id_mahasiswa,$data);
                $pesan = 'Data pribadi berhasil di update';
                $this->session->set_flashdata('message', $pesan ); 
                redirect(base_url('index.php/admin/profil'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function update_do($id_mahasiswa){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                // echo "<pre>";print_r($post);echo "<pre/>";exit();
                $data = array(
                    'nm_ibu_kandung'=>$post['nm_ibu_kandung'],
                    'tgl_lahir_ibu'=>$post['tgl_lahir_ibu'],
                    'nik_ibu'=>$post['nik_ibu'],
                    'id_jenjang_pendidikan_ibu'=>$post['id_jenjang_pendidikan_ibu'],
                    'id_pekerjaan_ibu'=>$post['id_pekerjaan_ibu'],
                    'id_penghasilan_ibu'=>$post['id_penghasilan_ibu'],
                    'nm_ayah'=>$post['nm_ayah'],
                    'tgl_lahir_ayah'=>$post['tgl_lahir_ayah'],
                    'nik_ayah'=>$post['nik_ayah'],
                    'id_jenjang_pendidikan_ayah'=>$post['id_jenjang_pendidikan_ayah'],
                    'id_pekerjaan_ayah'=>$post['id_pekerjaan_ayah'],
                    'id_penghasilan_ayah'=>$post['id_penghasilan_ayah']
                );
                $this->Admin_m->update_data('mahasiswa','id',$id_mahasiswa,$data);
                $pesan = 'Data pribadi berhasil di update';
                $this->session->set_flashdata('message', $pesan ); 
                redirect(base_url('index.php/admin/profil'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
     public function update_dw($id_mahasiswa){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                // echo "<pre>";print_r($post);echo "<pre/>";exit();
                $data = array(
                    'nm_wali'=>$post['nm_wali'],
                    'tgl_lahir_wali'=>$post['tgl_lahir_wali'],
                    'id_jenjang_pendidikan_wali'=>$post['id_jenjang_pendidikan_wali'],
                    'id_pekerjaan_wali'=>$post['id_pekerjaan_wali'],
                    'id_penghasilan_wali'=>$post['id_penghasilan_wali']
                );
                $this->Admin_m->update_data('mahasiswa','id',$id_mahasiswa,$data);
                $pesan = 'Data pribadi berhasil di update';
                $this->session->set_flashdata('message', $pesan ); 
                redirect(base_url('index.php/admin/profil'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
}
?>