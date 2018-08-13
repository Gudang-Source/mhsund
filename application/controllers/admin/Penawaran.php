<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penawaran extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Penawaran_m');
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
                $idmhs = $this->Penawaran_m->detail_mahasiswa($this->ion_auth->user()->row()->id_mhs);
                $data['title'] = $this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/penawaran-v';
                $data['datamhs'] = $idmhs;
                // pagging setting
                $aksmt = $this->Penawaran_m->get_smt_mhs($idmhs->idmhspt);
                $kuri = $this->Penawaran_m->get_kurikulum($idmhs->id_sms);
                $lastsmt = $this->Penawaran_m->aktivitas_kuliah($idmhs->idmhspt);
                $data['lastsmt'] =$lastsmt;
                $data['aksmt'] =  $aksmt;
                $data['kuri'] =  $kuri->id;
                // $data['mkkur'] = $this->Penawaran_m->get_mk_kur($kuri->id,$aksmt,$idmhs->idmhspt,$lastsmt->id_smt);
                // $data['mkadd'] = $this->Penawaran_m->get_mk_add($idmhs->idmhspt,$lastsmt->id_smt);
                $data['smt'] = $aksmt;
                // echo "<pre>";print_r($data['mkadd']);echo "<pre/>";exit();
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function listmk($idmhs,$smt,$kuri,$aksmt){
        $datamk = $this->Penawaran_m->get_mk_kur($kuri,$aksmt,$idmhs,$smt);
        $detail = $this->Penawaran_m->detail_mahasiswa($idmhs);
        // echo "<pre/>";print_r($datamk);echo "<pre/>";exit();
        if ($datamk == TRUE) {
            foreach ($datamk as $data) {
                 echo '
                 <div class="card mt-2" style="font-size: 13px;">
                        <div class="card-body">
                            <table width="100%">
                                <tr>
                                    <td class="text-left"><span class="border border-info rounded text-info p-1"><i class="fa fa-tag"></i> '.$data->kode_mk.'</span> - '.$data->nm_mk.'</td>
                                    <td class="float-right">
                                        <form id="inputan'.$data->id.'">
                                            <input type="hidden" name="id_mhs_pt" value="'.$detail->idmhspt.'">
                                            <input type="hidden" name="id_reg_pd" value="'.$detail->id_reg_pd.'">
                                            <input type="hidden" name="nipd" value="'.$detail->nipd.'">
                                            <input type="hidden" name="id_smt" value="'.$smt.'">
                                            <input type="hidden" name="kode_mk" value="'.$data->kode_mk.'">
                                            <button type="button" class="btn btn-success btn-sm float-left" style="font-size: 12px" onclick="ambilmk('.$data->id.')"><i class="fa fa-shopping-cart"></i> Ambil</button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                 ';
            }
        }else{
            echo '<div class="card mt-1"><div class="card-body p-2" style="font-size: 13px;"><div class="float-left">Belum memilih matakuliah</div><div class="float-right"><a href="#"><i class="fa fa-trash text-danger"></i></a></div></div></div>';
        }
        
    }
    public function showmkadd($idmhs,$smt){
        $mkadd = $this->Penawaran_m->get_mk_add($idmhs,$smt);
        // echo "<pre/>";print_r($mkadd);echo "<pre/>";exit();
        if ($mkadd == TRUE) {
            foreach ($mkadd as $data) {
                 echo '<div class="card mt-1"><div class="card-body p-2" style="font-size: 13px;"><table width="100%"><tr><td>'.$data->nm_mk.'</td><td class="text-right"><button class="btn btn-sm btn-outline-danger" onclick="deletemk('.$data->id.')"><i class="fa fa-trash"></i></button></td></tr></table></div></div>';
            }
           
        }else{
            echo '<div class="card mt-1"><div class="card-body p-2" style="font-size: 13px;"><div class="float-left">Belum memilih matakuliah</div><div class="float-right"><a href="#"><i class="fa fa-trash text-danger"></i></a></div></div></div>';
        }
        
    }
    public function inputmk(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $data = array(
                    'id_mhs_pt' => $post['id_mhs_pt'],
                    'id_reg_pd' => $post['id_reg_pd'],
                    'nipd' => $post['nipd'],
                    'id_smt' => $post['id_smt'],
                    'kode_mk' => $post['kode_mk']
                );
                $this->Admin_m->insert_data('nilai',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function hapusmk($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Admin_m->delete_data('nilai','id',$id);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
}
?>