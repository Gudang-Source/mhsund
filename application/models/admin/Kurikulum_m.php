<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kurikulum_m extends CI_Model
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
    function count_kurikulum_prodi($prodi,$string){
        if (!empty($string)) {
            $this->db->like('nm_kurikulum_sp',$string);
        }
        $this->db->join('sms', 'sms.id_sms = kurikulum.id_sms');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        $this->db->where('kurikulum.id_sms',$prodi);
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
    public function select_all_kurikulum_prodi($prodi,$sampai,$dari,$string){
        $this->db->select('kurikulum.*,semester.*,sms.nm_lemb,jenjang_pendidikan.nm_jenj_didik,kurikulum.id AS idkur');
        if (!empty($string)) {
            $this->db->like('nm_kurikulum_sp',$string);
        }
        $this->db->join('sms', 'sms.id_sms = kurikulum.id_sms');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        $this->db->join('semester', 'semester.id_smt = kurikulum.id_smt');
        $this->db->where('kurikulum.id_sms',$prodi);
        $this->db->order_by('kurikulum.id','desc');
        $query = $this->db->get('kurikulum',$sampai,$dari);
        return $query->result();
    }
    public function detail_kurikulum($idkur) {
        $this->db->join('sms', 'sms.id_sms = kurikulum.id_sms');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        $this->db->where('kurikulum.id', $idkur);
        $query = $this->db->get('kurikulum');
        return $query->row();
    }
    public function mk_by_pord($idkur){
        $this->db->select('mata_kuliah_kurikulum.*,mata_kuliah.id,mata_kuliah.kode_mk,mata_kuliah.nm_mk,mata_kuliah_kurikulum.id AS idkur');
        $this->db->join('mata_kuliah', 'mata_kuliah.id = mata_kuliah_kurikulum.id_mk_siakad');
        $this->db->where('mata_kuliah_kurikulum.id_kurikulum_siakad',$idkur);
        $this->db->order_by('smt,sks_mk');
        $sdf = $this->db->get('mata_kuliah_kurikulum');
        return $sdf->result();
    }
}