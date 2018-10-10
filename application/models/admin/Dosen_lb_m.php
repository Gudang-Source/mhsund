<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dosen_lb_m extends CI_Model
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
	function count_dosen_lb($string){
		$this->db->select('dosen_lb.*,agama.nm_agama,agama.id AS idagm');
        if (!empty($string)) {
        	$this->db->like('dosen_lb.nm_dsn_lb',$string);
        	$this->db->or_like('dosen_lb.noreg_dsn_lb',$string);
        }
        $this->db->join('agama', 'agama.id_agama = dosen_lb.id_agama');
        return $this->db->get('dosen_lb')->num_rows();
    }
    public function select_all_dosen_lb($sampai,$dari,$string){
    	$this->db->select('dosen_lb.*,agama.nm_agama,agama.id AS idagm');
        if (!empty($string)) {
         $this->db->like('dosen_lb.nm_dsn_lb',$string);
            $this->db->or_like('dosen_lb.noreg_dsn_lb',$string);
        }
        $this->db->order_by('dosen_lb.nm_dsn_lb','asc');
        $this->db->join('agama', 'agama.id_agama = dosen_lb.id_agama');
        $query = $this->db->get('dosen_lb',$sampai,$dari);
        return $query->result();
    }
    function count_dosen_lb_tgs($string,$prodi){
		$this->db->select('dosen_lb_pt.*,dosen_lb.nm_dsn_lb,dosen_lb.noreg_dsn_lb,sms.id AS idsms,sms.nm_lemb,sms.kode_prodi');
        if (!empty($string)) {
        	$this->db->like('dosen_lb.nm_dsn_lb',$string);
            $this->db->or_like('dosen_lb.noreg_dsn_lb',$string);
        }
        if (!empty($prodi)) {
            $this->db->where('dosen_lb_pt.id_sms',$prodi);
        }
        $this->db->join('dosen_lb', 'dosen_lb.id_dosen_lb = dosen_lb_pt.id_dosen_lb');
        $this->db->join('sms', 'sms.id_sms = dosen_lb_pt.id_sms');
        return $this->db->get('dosen_lb_pt')->num_rows();
    }
    public function select_all_dosen_lb_tgs($sampai,$dari,$string,$prodi){
    	$this->db->select('dosen_lb_pt.*,dosen_lb.nm_dsn_lb,dosen_lb.noreg_dsn_lb,sms.id AS idsms,sms.nm_lemb,sms.kode_prodi,tahun_ajaran.nm_thn_ajaran,jenjang_pendidikan.nm_jenj_didik');
        if (!empty($string)) {
         $this->db->like('dosen_lb.nm_dsn_lb',$string);
        $this->db->or_like('dosen_lb.noreg_dsn_lb',$string);
        }
        if (!empty($prodi)) {
            $this->db->where('dosen_lb_pt.id_sms',$prodi);
        }
        $this->db->order_by('dosen_lb_pt.id_thn_ajaran','desc');
        $this->db->join('dosen_lb', 'dosen_lb.id_dosen_lb = dosen_lb_pt.id_dosen_lb');
        $this->db->join('sms', 'sms.id_sms = dosen_lb_pt.id_sms');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        $this->db->join('tahun_ajaran', 'tahun_ajaran.id_thn_ajaran = dosen_lb_pt.id_thn_ajaran');
        $query = $this->db->get('dosen_lb_pt',$sampai,$dari);
        return $query->result();
    }
    function count_dosen_lb_tgs_by($id){
        $this->db->select('dosen_lb_pt.*,dosen_lb.nm_sdm,dosen_lb_pt.id AS iddsnpt,dosen_lb.nidn,sms.id AS idsms,sms.nm_lemb,sms.kode_prodi');
         $this->db->where('dosen_lb_pt.id_dosen_lb',$id);
        $this->db->join('dosen_lb', 'dosen_lb.id_dosen_lb = dosen_lb_pt.id_dosen_lb');
        $this->db->join('sms', 'sms.id_sms = dosen_lb_pt.id_sms');
        return $this->db->get('dosen_lb_pt')->num_rows();
    }
    public function select_alldosen_lb_tgs_by($sampai,$dari,$id){
        // $this->db->select('dosen_lb_pt.*,dosen_lb.nm_sdm,dosen_lb.id,dosen_lb_pt.id AS iddsnpt,dosen_lb.nidn,sms.id AS idsms,sms.nm_lemb,sms.kode_prodi,tahun_ajaran.nm_thn_ajaran');
        $this->db->where('dosen_lb_pt.id_dosen_lb',$id);
        // $this->db->order_by('dosen_lb_pt.id_thn_ajaran','desc');
        // $this->db->join('dosen_lb', 'dosen_lb.id = dosen_lb_pt.id_dosen_lb_siakad');
        // $this->db->join('sms', 'sms.id_sms = dosen_lb_pt.id_sms');
        // $this->db->join('tahun_ajaran', 'tahun_ajaran.id_thn_ajaran = dosen_lb_pt.id_thn_ajaran');
        $query = $this->db->get('dosen_lb_pt',$sampai,$dari);
        return $query->result();
    }
    public function get_prodi(){
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
        $query = $this->db->get('sms');
        return $query->result();
    }
     public function detail_dosen_lb($id){
        // $this->db->select('dosen_lb_pt.*,dosen_lb.*,dosen_lb_pt.id AS iddsnpt,dosen_lb.nidn,sms.id AS idsms,sms.nm_lemb,sms.kode_prodi,tahun_ajaran.nm_thn_ajaran');
        $this->db->where('dosen_lb.id_dosen_lb',$id);
        // $this->db->join('dosen_lb_pt', 'dosen_lb_pt.id_dosen_lb_siakad = dosen_lb.id');
        // $this->db->join('sms', 'sms.id_sms = dosen_lb_pt.id_sms');
        // $this->db->join('tahun_ajaran', 'tahun_ajaran.id_thn_ajaran = dosen_lb_pt.id_thn_ajaran');
        $query = $this->db->get('dosen_lb');
        return $query->row();
    }
    public function det_dosen_lb_pt($id){
        // $this->db->select('dosen_lb_pt.*,dosen_lb.*,dosen_lb_pt.id AS iddsnpt,dosen_lb.nidn,sms.id AS idsms,sms.nm_lemb,sms.kode_prodi,tahun_ajaran.nm_thn_ajaran');
        $this->db->where('dosen_lb_pt.id_dosen_lb',$id);
        $this->db->join('dosen_lb', 'dosen_lb.id = dosen_lb_pt.id_dosen_lb');
        // $this->db->join('sms', 'sms.id_sms = dosen_lb_pt.id_sms');
        // $this->db->join('tahun_ajaran', 'tahun_ajaran.id_thn_ajaran = dosen_lb_pt.id_thn_ajaran');
        $query = $this->db->get('dosen_lb_pt');
        return $query->row();
    }
    function count_ajar_dosen_lb_pt($id){
        $this->db->where('dosen_lb_pt.id_dosen_lb_siakad',$id);
        $this->db->join('dosen_lb_pt', 'dosen_lb_pt.id = ajar_dosen_lb.id_dosen_lb_pt_siakad');
        return $this->db->get('ajar_dosen_lb')->num_rows();
    }
    public function res_ajar_dosen_lb($sampai,$dari,$id){
        $this->db->where('dosen_lb_pt.id_dosen_lb_siakad',$id);
        $this->db->join('dosen_lb_pt', 'dosen_lb_pt.id = ajar_dosen_lb.id_dosen_lb_pt_siakad');
        $this->db->join('kelas_kuliah', 'kelas_kuliah.id = ajar_dosen_lb.id_kls_siakad');
        $this->db->join('sms', 'sms.id_sms = kelas_kuliah.id_sms');
        // $this->db->join('mata_kuliah', 'tahun_ajaran.id_thn_ajaran = dosen_lb_pt.id_thn_ajaran');
        $query = $this->db->get('ajar_dosen_lb',$sampai,$dari);
        return $query->result();
    }
}