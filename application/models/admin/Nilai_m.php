<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Nilai_m extends CI_Model
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
		$this->db->select('mahasiswa_pt.*,mahasiswa.*,sms.*,mahasiswa_pt.id AS idmhspt');
		$this->db->where('mahasiswa.id',$id);
		$this->db->join('mahasiswa_pt', 'mahasiswa_pt.id_pd_siakad = mahasiswa.id');
		$this->db->join('sms', 'sms.kode_prodi = mahasiswa_pt.kode_sms');
		$query = $this->db->get('mahasiswa');
		return $query->row();
	}
	public function daftar_nilai($id){
		$this->db->select('nilai.*,mata_kuliah.id AS idmk,mata_kuliah.nm_mk,mata_kuliah.sks_mk,mata_kuliah.kode_mk');
		$this->db->where('nilai.id_mhs_pt',$id);
		$this->db->join('mata_kuliah', 'mata_kuliah.kode_mk = nilai.kode_mk');
		$this->db->group_by('nilai.id_smt,nilai.kode_mk,nilai_huruf');
		$this->db->order_by('nilai.id_smt','asc');
		$query = $this->db->get('nilai');
		return $query->result();
	}
	public function nilai_semester($id,$smt){
		$this->db->select('nilai.*,mata_kuliah.id,mata_kuliah.id,mata_kuliah.nm_mk,mata_kuliah.sks_mk');
		$this->db->where('nilai.id_mhs_pt',$id);
		$this->db->where('nilai.id_smt',$smt);
		$this->db->join('mata_kuliah', 'mata_kuliah.kode_mk = nilai.kode_mk');
		$this->db->group_by('nilai.kode_mk,nilai.id_smt,nilai.nipd');
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
