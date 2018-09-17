<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kelas_m extends CI_Model
{
	public function select_data($tabel,$field,$id){
		$query = $this->db->get($tabel);
		return $query->result();
	}
	public function select_data_batch($tabel){
		$query = $this->db->get($tabel);
		return $query->result();
	}
	function insert_data($tabel,$data){
		$this->db->insert($tabel, $data);
	}
	public function delete_data($tabel,$field,$id){
		$this->db->where($field, $id);
		$this->db->delete($tabel);
	}
	public function update_data($tabel,$field,$id,$data){
		$this->db->where($field, $id);
		$this->db->update($tabel,$data);
	}
	// 
	function count_kurikulum($string){
        if (!empty($string)) {
        	$this->db->like('nm_kurikulum_sp',$string);
        }
        $this->db->join('sms', 'sms.id_sms = kurikulum.id_sms');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        return $this->db->get('kurikulum')->num_rows();
    }
    public function select_all_kurikulum($sampai,$dari,$string){
        $this->db->select('kurikulum.*,semester.*,sms.nm_lemb,jenjang_pendidikan.nm_jenj_didik,kurikulum.id AS idkur');
    	if (!empty($string)) {
            $this->db->like('nm_kurikulum_sp',$string);
        }
        $this->db->join('sms', 'sms.id_sms = kurikulum.id_sms');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        $this->db->join('semester', 'semester.id_smt = kurikulum.id_smt');
        $this->db->order_by('kurikulum.id','desc');
        $query = $this->db->get('kurikulum',$sampai,$dari);
        return $query->result();
    }
    function jumlah_kelas_prodi($string,$string2){
        if (!empty($string)) {
            $this->db->like('mata_kuliah.nm_mk',$string);
        }
        if (!empty($string2)) {
            $this->db->where('kelas_kuliah.id_smt',$string2);
        }
        // $this->db->where('kelas_kuliah.id_sms',$id);
        $this->db->join('mata_kuliah', 'mata_kuliah.id = kelas_kuliah.id_mk_siakad');
        return $this->db->get('kelas_kuliah')->num_rows();
    }
    public function all_kelas_prodi($limit,$start,$string,$string2){
        $this->db->select('kelas_kuliah.*,mata_kuliah.*,sms.nm_lemb,jenjang_pendidikan.nm_jenj_didik,kelas_kuliah.id AS id_kelas');
        if (!empty($string)) {
            $this->db->like('mata_kuliah.nm_mk',$string);
        }
        if (!empty($string2)) {
            $this->db->where('kelas_kuliah.id_smt',$string2);
        }
        $this->db->join('mata_kuliah', 'mata_kuliah.id = kelas_kuliah.id_mk_siakad');
        $this->db->join('sms', 'sms.id_sms = kelas_kuliah.id_sms');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        $this->db->order_by('kelas_kuliah.id_smt,kelas_kuliah.id','desc');
        $query = $this->db->get('kelas_kuliah',$limit,$start);
        return $query->result();
    }
}