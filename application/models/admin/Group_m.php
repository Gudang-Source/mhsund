<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Group_m extends CI_Model
{
	function jumlah($string){
		if (!empty($string)) {
			$this->db->like('nama_groups',$string);
		}
		return $this->db->get('groups')->num_rows();
	}
	public function searcing_data($sampai,$dari,$cari){
		if (!empty($cari)) {
			$this->db->like('name',$cari);
			$this->db->or_like('description',$cari);
		}
		$query = $this->db->get('groups',$sampai,$dari);
		return $query->result();
	}
	function insert_groups($data){
		$this->db->insert('groups', $data);
	}
	function update_groups($id,$data){
		$this->db->where('id',$id);
		$this->db->update('groups', $data);
	}
	public function detail_groups($id){
		$this->db->where('id',$id);
		$query = $this->db->get('groups');
		return $query->row();
	}
	public function cek_groups($id){
		$this->db->where('id',$id);
		$query = $this->db->get('groups');
		return $query->row();
	}
	public function delete_groups($id){
		$this->db->where('id', $id);
		$this->db->delete('groups');
	}
}
