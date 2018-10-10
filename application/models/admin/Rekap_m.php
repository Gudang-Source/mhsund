<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rekap_m extends CI_Model
{
	public function prodi(){
		$this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
		$query = $this->db->get('sms');
		return $query->result();
	}
	public function detail_prodi($sms){
		$this->db->where('sms.kode_prodi',$sms);
		$this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
		$query = $this->db->get('sms');
		return $query->row();
	}
	public function angkatan(){
		$this->db->order_by('id_thn_ajaran','desc');
		$query = $this->db->get('tahun_ajaran');
		return $query->result();
	}
	public function akun_mhs($prodi,$smt){
		$this->db->select('mahasiswa_pt.nipd,mahasiswa.nm_pd,users.repassword');
		$this->db->where('mahasiswa_pt.kode_sms',$prodi);
		$this->db->like('mahasiswa_pt.mulai_smt',$smt);
		$this->db->join('mahasiswa', 'mahasiswa.id = mahasiswa_pt.id_pd_siakad');
		$this->db->join('users', 'users.id_mhs = mahasiswa_pt.id');
		$this->db->order_by('mahasiswa_pt.nipd','asc');
		$query = $this->db->get('mahasiswa_pt');
		return $query->result();
	}
}