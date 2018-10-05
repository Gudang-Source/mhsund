<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Matakuliah_m extends CI_Model
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
	public function detail_data($id){
		$this->db->where('id_mk_siakad', $id);
		$this->db->order_by('id','desc');
		$query = $this->db->get('mata_kuliah_kurikulum');
		return $query->row();
	}
	public function get_prodi(){
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        $query = $this->db->get('sms');
        return $query->result();
    }
	public function detail_mk($id){
		$this->db->where('mata_kuliah.id', $id);
		$this->db->join('sms', 'sms.id_sms = mata_kuliah.id_sms');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
		$query = $this->db->get('mata_kuliah');
		return $query->row();
	}
	// khusus
	function count_data_mk($string){
        $this->db->select('mata_kuliah.*,sms.nm_lemb,sms.id_sms,jenjang_pendidikan.nm_jenj_didik,sms.id AS idsms, jenjang_pendidikan.id AS idjenj');
        if (!empty($string)) {
            $this->db->like('nm_mk',$string);
            $this->db->or_like('kode_mk',$string);
        }
        $this->db->join('sms', 'sms.id_sms = mata_kuliah.id_sms');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        // $this->db->join('mata_kuliah_kurikulum', 'mata_kuliah_kurikulum.id_mk_siakad = mata_kuliah.id');
        return $this->db->get('mata_kuliah')->num_rows();
    }
    function count_data_mk_prodi($prodi,$string){
        $this->db->select('mata_kuliah.*,sms.nm_lemb,sms.id_sms,jenjang_pendidikan.nm_jenj_didik,sms.id AS idsms, jenjang_pendidikan.id AS idjenj');
        if (!empty($string)) {
            $this->db->like('nm_mk',$string);
            $this->db->or_like('kode_mk',$string);
        }
        $this->db->where('mata_kuliah.id_sms',$prodi);
        $this->db->join('sms', 'sms.id_sms = mata_kuliah.id_sms');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        // $this->db->join('mata_kuliah_kurikulum', 'mata_kuliah_kurikulum.id_mk_siakad = mata_kuliah.id');
        return $this->db->get('mata_kuliah')->num_rows();
    }
    public function select_all_data_mk($sampai,$dari,$string){
        $this->db->select('mata_kuliah.*,sms.nm_lemb,sms.id_sms,jenjang_pendidikan.nm_jenj_didik,sms.id AS idsms, jenjang_pendidikan.id AS idjenj');
        if (!empty($string)) {
         $this->db->like('nm_mk',$string);
         $this->db->or_like('kode_mk',$string);
        }
        $this->db->join('sms', 'sms.id_sms = mata_kuliah.id_sms');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        $this->db->order_by('mata_kuliah.id','desc');
        $query = $this->db->get('mata_kuliah',$sampai,$dari);
        return $query->result();
    }
    public function select_all_data_mk_prodi($prodi,$sampai,$dari,$string){
        $this->db->select('mata_kuliah.*,sms.nm_lemb,sms.id_sms,jenjang_pendidikan.nm_jenj_didik,sms.id AS idsms, jenjang_pendidikan.id AS idjenj');
        if (!empty($string)) {
         $this->db->like('nm_mk',$string);
         $this->db->or_like('kode_mk',$string);
        }
        $this->db->join('sms', 'sms.id_sms = mata_kuliah.id_sms');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        $this->db->where('mata_kuliah.id_sms',$prodi);
        $this->db->order_by('mata_kuliah.id','desc');
        $query = $this->db->get('mata_kuliah',$sampai,$dari);
        return $query->result();
    }
}
