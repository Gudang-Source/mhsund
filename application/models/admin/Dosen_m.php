<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dosen_m extends CI_Model
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
	function count_data_dosen($string){
		$this->db->select('dosen.*,agama.nm_agama,agama.id AS idagm');
        if (!empty($string)) {
        	$this->db->like('nm_sdm',$string);
        	$this->db->or_like('nidn',$string);
        }
        $this->db->join('agama', 'agama.id_agama = dosen.id_agama');
        return $this->db->get('dosen')->num_rows();
    }
    public function select_all_data_dosen($sampai,$dari,$string){
    	$this->db->select('dosen.*,agama.nm_agama,agama.id AS idagm');
        if (!empty($string)) {
         $this->db->like('nm_sdm',$string);
         $this->db->or_like('nidn',$string);
        }
        $this->db->order_by('dosen.nm_sdm','asc');
        $this->db->join('agama', 'agama.id_agama = dosen.id_agama');
        $query = $this->db->get('dosen',$sampai,$dari);
        return $query->result();
    }
    function count_data_dosen_tgs($string,$prodi){
		$this->db->select('dosen_pt.*,dosen.nm_sdm,dosen_pt.id AS iddsnpt,dosen.nidn,sms.id AS idsms,sms.nm_lemb,sms.kode_prodi');
        if (!empty($string)) {
        	$this->db->like('nm_sdm',$string);
        	$this->db->or_like('nidn',$string);
        }
        if (!empty($prodi)) {
            $this->db->where('dosen_pt.id_sms',$prodi);
        }
        $this->db->join('dosen', 'dosen.id = dosen_pt.id_dosen_siakad');
        $this->db->join('sms', 'sms.id_sms = dosen_pt.id_sms');
        return $this->db->get('dosen_pt')->num_rows();
    }
    public function select_all_data_dosen_tgs($sampai,$dari,$string,$prodi){
    	$this->db->select('dosen_pt.*,dosen.nm_sdm,dosen.id,dosen_pt.id AS iddsnpt,dosen.nidn,sms.id AS idsms,sms.nm_lemb,sms.kode_prodi,tahun_ajaran.nm_thn_ajaran');
        if (!empty($string)) {
         $this->db->like('nm_sdm',$string);
         $this->db->or_like('nidn',$string);
        }
        if (!empty($prodi)) {
            $this->db->where('dosen_pt.id_sms',$prodi);
        }
        $this->db->order_by('dosen_pt.id_thn_ajaran','desc');
        $this->db->join('dosen', 'dosen.id = dosen_pt.id_dosen_siakad');
        $this->db->join('sms', 'sms.id_sms = dosen_pt.id_sms');
        $this->db->join('tahun_ajaran', 'tahun_ajaran.id_thn_ajaran = dosen_pt.id_thn_ajaran');
        $query = $this->db->get('dosen_pt',$sampai,$dari);
        return $query->result();
    }
    public function get_prodi(){
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        $query = $this->db->get('sms');
        return $query->result();
    }
     public function detail_dosen($id){
        // $this->db->select('dosen_pt.*,dosen.*,dosen_pt.id AS iddsnpt,dosen.nidn,sms.id AS idsms,sms.nm_lemb,sms.kode_prodi,tahun_ajaran.nm_thn_ajaran');
        $this->db->where('dosen.id',$id);
        // $this->db->join('dosen_pt', 'dosen_pt.id_dosen_siakad = dosen.id');
        // $this->db->join('sms', 'sms.id_sms = dosen_pt.id_sms');
        // $this->db->join('tahun_ajaran', 'tahun_ajaran.id_thn_ajaran = dosen_pt.id_thn_ajaran');
        $query = $this->db->get('dosen');
        return $query->row();
    }
}
