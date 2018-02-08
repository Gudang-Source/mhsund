<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Laman_m extends CI_Model
{
	function all_laman(){
		$query = $this->db->get('laman');
		return $query->result();
	}
	function jumlah($string){
		if (!empty($string)) {
			$this->db->like('judul_laman',$string);
		}
		return $this->db->get('laman')->num_rows();
	}
	public function searcing_data($sampai,$dari,$cari){
		if (!empty($cari)) {
			$this->db->like('judul_laman',$cari);
		}
		$query = $this->db->get('laman',$sampai,$dari);
		return $query->result();
	}
	function insert_laman($data){
		$this->db->insert('laman', $data);
	}
	function update_laman($id,$data){
		$this->db->where('id_laman',$id);
		$this->db->update('laman', $data);
	}
	public function detail_laman($alias){
		$this->db->where('alias_laman',$alias);
		$query = $this->db->get('laman');
		return $query->row();
	}
	public function cek_laman($id){
		$this->db->where('id_laman',$id);
		$query = $this->db->get('laman');
		return $query->row();
	}
	public function delete_laman($alias){
		$this->db->where('alias_laman', $alias);
		$this->db->delete('laman');
	}
}
