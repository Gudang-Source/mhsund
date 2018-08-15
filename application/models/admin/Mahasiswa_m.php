<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mahasiswa_m extends CI_Model{
    
    function count_data_mahasiswa($string,$prodi){
        $this->db->select('mahasiswa_pt.*,mahasiswa.id AS idmhs,mahasiswa.nm_pd,mahasiswa.id_agama,mahasiswa.tmpt_lahir,mahasiswa.tgl_lahir,mahasiswa.jk,sms.kode_prodi,sms.nm_lemb,sms.id_jenj_didik,agama.nm_agama,jenjang_pendidikan.nm_jenj_didik');
        $this->db->join('mahasiswa', 'mahasiswa.id = mahasiswa_pt.id_pd_siakad');
        $this->db->join('sms', 'sms.kode_prodi = mahasiswa_pt.kode_sms');
        $this->db->join('agama', 'agama.id_agama = mahasiswa.id_agama');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        if (!empty($string)) {
            $this->db->like('nm_pd',$string);
            $this->db->or_like('nipd',$string);
        }
        if (!empty($prodi)) {
            $this->db->where('mahasiswa_pt.kode_sms',$prodi);
        }
        return $this->db->get('mahasiswa_pt')->num_rows();
    }
    public function select_all_data_mahasiswa($sampai,$dari,$string,$prodi){
        $this->db->select('mahasiswa_pt.*,mahasiswa.id AS idmhs,mahasiswa.nm_pd,mahasiswa.id_agama,mahasiswa.tmpt_lahir,mahasiswa.tgl_lahir,mahasiswa.jk,sms.kode_prodi,sms.nm_lemb,sms.id_jenj_didik,agama.nm_agama,jenjang_pendidikan.nm_jenj_didik');
        $this->db->join('mahasiswa', 'mahasiswa.id = mahasiswa_pt.id_pd_siakad');
        $this->db->join('sms', 'sms.kode_prodi = mahasiswa_pt.kode_sms');
        $this->db->join('agama', 'agama.id_agama = mahasiswa.id_agama');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        if (!empty($string)) {
         $this->db->like('nm_pd',$string);
         $this->db->or_like('nipd',$string);
        }
         if (!empty($prodi)) {
            $this->db->where('mahasiswa_pt.kode_sms',$prodi);
        }
        $this->db->order_by('id','desc');
        $query = $this->db->get('mahasiswa_pt',$sampai,$dari);
        return $query->result();
    }
    public function get_prodi(){
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        $query = $this->db->get('sms');
        return $query->result();
    }
    public function lastsmt($id){
        $this->db->where('id_mhs_pt',$id);
        $this->db->order_by('id_smt','desc');
        $query = $this->db->get('kuliah_mahasiswa');
        return $query->row();
    }
    public function krs($id,$smt){
        $this->db->where('id_mhs_pt',$id);
        $this->db->where('nilai.id_smt',$smt);
        $this->db->join('mata_kuliah', 'mata_kuliah.kode_mk = nilai.kode_mk');
        $this->db->join('kelas_kuliah', 'kelas_kuliah.id = nilai.id_kls_siakad');
        $this->db->group_by('nilai.id_smt,nilai.kode_mk');
        $this->db->order_by('nilai.id','desc');
        $query = $this->db->get('nilai');
        return $query->result();
    }
}
