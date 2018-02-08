<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Galeri_m extends CI_Model {

	function jumlah($string){
		if (!empty($string)) {
			$this->db->like('nama_galeri',$string);
		}
		return $this->db->get('galeri')->num_rows();
	}
	public function searcing_data($sampai,$dari,$cari){
		if (!empty($cari)) {
			$this->db->like('nama_galeri',$cari);
		}
		$this->db->order_by('id_galeri','desc');
		$query = $this->db->get('galeri',$sampai,$dari);
		return $query->result();
	}
	function update_galeri($id,$data){
		$this->db->where('id_galeri',$id);
		$this->db->update('galeri', $data);
	}
	public function getallgaleri(){

		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->order_by('id_galeri', 'desc');
		$sdf = $this->db->get();
		return $sdf->result();
	}
	public function getLastIDgaleri() {
		$this->db->select('id_galeri');
		$this->db->from('galeri');
		$this->db->order_by('id_galeri', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	function insert_galeri($data){
		$this->db->insert('galeri', $data);
	}
	public function delete_galeri($id){
		$this->db->where('id_galeri', $id);
		$this->db->delete('galeri');
	}
	public function cek_galeri($id){
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where('id_galeri', $id);
		$query = $this->db->get();
		return $query;
	}
	public function detailgaleri($id){
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where('id_galeri', $id);
		$sdf = $this->db->get();
		return $sdf->row();
	}
	public function edit_galeri($id, $data){
		$this->db->where('id_galeri', $id);
		$this->db->update('galeri', $data);
	}
}
