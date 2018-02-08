<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jadwal_m extends CI_Model
{
	public function select_data($tabel){
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
	// khusus
	public function detail_mahasiswa($id){
		$this->db->where('mahasiswa_pt.id',$id);
		$this->db->join('mahasiswa', 'mahasiswa.id_mhs_pt = mahasiswa_pt.id');
		$this->db->join('sms', 'sms.kode_prodi = mahasiswa_pt.kode_sms');
		$query = $this->db->get('mahasiswa_pt');
		return $query->row();
	}
	public function jadwal_kuliah($id,$smt){
		$this->db->select('nilai.id_smt,nilai.id_kls_siakad,nilai.id_mhs_pt,kelas_kuliah.id,kelas_kuliah.id_mk_siakad,kelas_kuliah.nm_kls,mata_kuliah.id,mata_kuliah.nm_mk,mata_kuliah.sks_mk');
		$this->db->where('nilai.id_mhs_pt',$id);
		$this->db->where('nilai.id_smt',$smt);
		$this->db->join('kelas_kuliah', 'kelas_kuliah.id = nilai.id_kls_siakad');
		$this->db->join('mata_kuliah', 'mata_kuliah.id = kelas_kuliah.id_mk_siakad');
		$this->db->order_by('nilai.id_smt','desc');
		$query = $this->db->get('nilai');
		return $query->result();
	}
	public function aktivitas_kuliah($id){
		$this->db->where('id_mhs_pt',$id);
		$this->db->order_by('id_smt','desc');
		$query = $this->db->get('kuliah_mahasiswa');
		return $query->result();
	}
}
