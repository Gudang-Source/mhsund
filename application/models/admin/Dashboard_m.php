<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard_m extends CI_Model {

	public function getuser($id_user){

		$this->db->where("id_user", $id_user);
		$sdf = $this->db->get('user');
		return $sdf->row();
	}
	public function detail_mahasiswa($id){
		$this->db->select('mahasiswa_pt.*,mahasiswa.*,sms.*,mahasiswa_pt.id AS idmhspt');
		$this->db->where('mahasiswa.id',$id);
		$this->db->join('mahasiswa_pt', 'mahasiswa_pt.id_pd_siakad = mahasiswa.id');
		$this->db->join('sms', 'sms.kode_prodi = mahasiswa_pt.kode_sms');
		$query = $this->db->get('mahasiswa');
		return $query->row();
	}
	public function detail_dosen($id){
		$this->db->where('dosen.id',$id);
		$query = $this->db->get('dosen');
		return $query->row();
	}
}
