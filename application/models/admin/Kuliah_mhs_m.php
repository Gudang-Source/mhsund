<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kuliah_mhs_m extends CI_Model
{
	function count_ak_mhs($string){
        $this->db->select('kuliah_mahasiswa.*,mahasiswa.nm_pd,mahasiswa_pt.nipd,sms.nm_lemb,jenjang_pendidikan.nm_jenj_didik');
        $this->db->join('mahasiswa_pt', 'mahasiswa_pt.id = kuliah_mahasiswa.id_mhs_pt');
        $this->db->join('mahasiswa', 'mahasiswa.id = mahasiswa_pt.id_pd_siakad');
        $this->db->join('sms', 'sms.kode_prodi = mahasiswa_pt.kode_sms');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        if (!empty($string)) {
         $this->db->like('nm_pd',$string);
         $this->db->or_like('nipd',$string);
        }
        return $this->db->get('kuliah_mahasiswa')->num_rows();
    }
    public function select_akt_mhs($sampai,$dari,$string){
    	$this->db->select('kuliah_mahasiswa.*,mahasiswa.nm_pd,mahasiswa_pt.nipd,sms.nm_lemb,jenjang_pendidikan.nm_jenj_didik');
        $this->db->join('mahasiswa_pt', 'mahasiswa_pt.id = kuliah_mahasiswa.id_mhs_pt');
        $this->db->join('mahasiswa', 'mahasiswa.id = mahasiswa_pt.id_pd_siakad');
        $this->db->join('sms', 'sms.kode_prodi = mahasiswa_pt.kode_sms');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        if (!empty($string)) {
         $this->db->like('nm_pd',$string);
         $this->db->or_like('nipd',$string);
        }
        $this->db->order_by('kuliah_mahasiswa.id','desc');
        $query = $this->db->get('kuliah_mahasiswa',$sampai,$dari);
        return $query->result();
    }
}
