<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kelas_m extends CI_Model
{
	public function select_data($tabel,$field,$id){
		$query = $this->db->get($tabel);
		return $query->result();
	}
	public function prodi(){
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
		$query = $this->db->get('sms');
		return $query->result();
	}
    public function semester(){
        $this->db->order_by('id_smt','desc');
        $query = $this->db->get('semester');
        return $query->result();
    }
	function insert_data($tabel,$data){
		$this->db->insert($tabel, $data);
	}
	public function delete_data($tabel,$field,$id){
		$this->db->where($field, $id);
		$this->db->delete($tabel);
	}
	public function edit($tabel,$field,$id,$data){
		$this->db->where($field, $id);
		$this->db->update($tabel,$data);
	}
	// 
    public function detail_data($tabel,$field,$id) {
        $this->db->where($field, $id);
        $query = $this->db->get($tabel);
        return $query->row();
    }
    function tampil_dosen_limit($nama){
        $this->db->select('dosen.nm_sdm,dosen.id,dosen.nidn,dosen_pt.id_dosen_siakad,dosen_pt.id_thn_ajaran,dosen_pt.id_sms,dosen_pt.id AS id_dosen,sms.id_sms,sms.nm_lemb');
        $this->db->join('dosen', 'dosen.id = dosen_pt.id_dosen_siakad');
        $this->db->join('sms', 'sms.id_sms = dosen_pt.id_sms');
        $this->db->like('dosen.nm_sdm',$nama);
        $this->db->limit('8');
        $query = $this->db->get('dosen_pt');
        return $query;
    }
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
    public function detail_kelas($id){
        $this->db->select('mata_kuliah.*,kelas_kuliah.*,kelas_kuliah.id AS id_kelas');
        $this->db->join('mata_kuliah', 'mata_kuliah.id = kelas_kuliah.id_mk_siakad');
        $this->db->where('kelas_kuliah.id', $id);
        $query = $this->db->get('kelas_kuliah');
        return $query->row();
    }
    public function get_prodi_by_kel($id) {
        $this->db->select('kelas_kuliah.id,kelas_kuliah.id_kls,kelas_kuliah.id_sms,sms.id_sms,sms.kode_prodi');
        $this->db->join('sms', 'sms.id_sms = kelas_kuliah.id_sms');
        $this->db->where('.kelas_kuliah.id', $id);
        $query = $this->db->get('kelas_kuliah');
        return $query->row();
    }
    public function detail_prodi($kode) {
        $this->db->where('kode_prodi', $kode);
        $query = $this->db->get('sms');
        return $query;
    }
    public function mahasiwakelas($id){
        $this->db->select('nilai.*,mahasiswa.nm_pd,mahasiswa.id_mhs_pt,nilai.id as idnilai');
        $this->db->join('mahasiswa_pt', 'mahasiswa_pt.id = nilai.id_mhs_pt');
        $this->db->join('mahasiswa', 'mahasiswa.id = mahasiswa_pt.id_pd_siakad');
        // $this->db->order_by('nipd','asc');
        $this->db->where('id_kls_siakad', $id);
        $query = $this->db->get('nilai');
        return $query->result();
    }
    public function bobotnilai($id){
        $this->db->where('id_sms', $id);
        $this->db->order_by('nilai_huruf','asc');
        $this->db->group_by('nilai_huruf');
        $rs = $this->db->get('bobot_nilai');
        return $rs->result();
    }
    public function dosenkls($id){
        $this->db->select('ajar_dosen.*,dosen_pt.id,dosen_pt.id_dosen_siakad,dosen.id,dosen.nm_sdm,dosen.nidn,ajar_dosen.id AS id_ajr_dosen');
        $this->db->where('id_kls_siakad',$id);
        $this->db->join('dosen_pt', 'dosen_pt.id = ajar_dosen.id_dosen_pt_siakad');
        $this->db->join('dosen', 'dosen_pt.id_dosen_siakad = dosen.id');
        $query = $this->db->get('ajar_dosen');
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
    public function jumlah_mhs_prodi($nama,$angkatan){
        $this->db->select('mahasiswa_pt.*,mahasiswa.nm_pd,mahasiswa.id_mhs_pt');
        if (!empty($nama)) {
            $this->db->like('mahasiswa.nm_pd', $nama);
            $this->db->or_like('nipd',$nama);
        }
        if (!empty($angkatan)) {
            $this->db->where('mahasiswa_pt.mulai_smt', $angkatan);
        }
        $this->db->join('mahasiswa', 'mahasiswa.id_mhs_pt = mahasiswa_pt.id');
        // $this->db->where('kode_sms', $id_prodi);
        $this->db->from('mahasiswa_pt');
        $rs = $this->db->count_all_results();
        return $rs;
    }
    public function get_mahasiswa($limit,$start,$nama,$angkatan) {
        $this->db->select('mahasiswa_pt.*,mahasiswa.nm_pd,mahasiswa.tmpt_lahir,mahasiswa.tgl_lahir,mahasiswa.id_mhs_pt');
        if (!empty($nama)) {
            $this->db->like('mahasiswa.nm_pd', $nama);
            $this->db->or_like('nipd',$nama);
        }
        if (!empty($angkatan)) {
            $this->db->where('mahasiswa_pt.mulai_smt', $angkatan);
        }
        $this->db->join('mahasiswa', 'mahasiswa.id = mahasiswa_pt.id_pd_siakad');
        // $this->db->where('mahasiswa_pt.kode_sms', $sms);
        $this->db->order_by('mahasiswa_pt.mulai_smt','desc');
        $query = $this->db->get('mahasiswa_pt',$limit,$start);
        return $query->result();
    }
}