<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bukutamu_m extends CI_Model
{
	function jumlah($string){
		if (!empty($string)) {
			$this->db->like('nama_bukutamu',$string);
		}
		return $this->db->get('bukutamu')->num_rows();
	}
	public function searcing_data($sampai,$dari,$cari){
		if (!empty($cari)) {
			$this->db->like('nama_bukutamu',$cari);
		}
		$this->db->order_by('id_bukutamu','desc');
		$query = $this->db->get('bukutamu',$sampai,$dari);
		return $query->result();
	}
	public function all_bukutamu(){
		$query = $this->db->get('bukutamu');
		return $query->result();
	}
	public function detail_bukutamu($id){
		$this->db->where('id_bukutamu', $id);
		$query = $this->db->get('bukutamu');
		return $query->row();
	}
	function insert_bukutamu($data){
		$this->db->insert('bukutamu', $data);
	}
	public function delete_bukutamu($id){
		$this->db->where('id_bukutamu', $id);
		$this->db->delete('bukutamu');
	}
}
