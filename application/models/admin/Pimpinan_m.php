<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pimpinan_m extends CI_Model
{
	public function all_pimpinan(){
		$query = $this->db->get('pimpinan_pt');
		return $query->result();
	}
	function insert_pimpinan($data){
		$this->db->insert('pimpinan_pt', $data);
	}
	function update_pimpinan($id,$data){
		$this->db->where('id_pimpinan_pt',$id);
		$this->db->update('pimpinan_pt', $data);
	}
	public function detail_pimpinan($id){
		$this->db->where('id_pimpinan_pt',$id);
		$query = $this->db->get('pimpinan_pt');
		return $query->row();
	}
	public function delete_pimpinan($id){
		$this->db->where('id_pimpinan_pt', $id);
		$this->db->delete('pimpinan_pt');
	}
}
