<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Kelas_m');
    }
    public function index(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','prodi');
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
                $data['aside'] = 'nav/admin';
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
     public function detail($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin');
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
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/kelas/detail-v';
                $data['nmkls'] = $detail;
                $kode_prodi = $this->Kelas_m->get_prodi_by_kel($id)->kode_prodi;
                $data['getprod'] = $this->Kelas_m->detail_prodi($kode_prodi)->row();
                $data['detdosen'] = $this->Kelas_m->dosenkls($id);
                $data['bobotnilai'] = $this->Kelas_m->bobotnilai($detail->id_sms);
                $data['hasil'] = $this->Kelas_m->mahasiwakelas($id);
                // echo "<pre>";print_r($data['hasil']);echo "<pre/>";exit();
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
            $level= array('admin','fakultas','prodi');
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
}
?>