<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Widget_m extends CI_Model
{
	function jumlah($string){
		if (!empty($string)) {
			$this->db->like('nama_widget',$string);
		}
		return $this->db->get('widget')->num_rows();
	}
	public function searcing_data($sampai,$dari,$cari){
		if (!empty($cari)) {
			$this->db->like('nama_widget',$cari);
		}
		$this->db->order_by('id_widget','desc');
		$query = $this->db->get('widget',$sampai,$dari);
		return $query->result();
	}
	public function all_widget(){
		$query = $this->db->get('widget');
		return $query->result();
	}
	public function detail_widget($id){
		$this->db->where('id_widget', $id);
		$query = $this->db->get('widget');
		return $query->row();
	}
	function insert_widget($data){
		$this->db->insert('widget', $data);
	}
	function edit_widget($id,$data){
		$this->db->where('id_widget', $id);
		$this->db->update('widget', $data);
	}
	public function delete_widget($id){
		$this->db->where('id_widget', $id);
		$this->db->delete('widget');
	}
}
