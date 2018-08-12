<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_m extends CI_Model
{
	public function info_pt($id){
		$this->db->where('id_info_pt', $id);
		$query = $this->db->get('info_pt');
		return $query->row();
	}
	public function cek_pt($id){
		$this->db->where('id_info_pt', $id);
		$query = $this->db->get('info_pt');
		return $query;
	}
	public function Update_pt($id,$data){
		$this->db->where('id_info_pt', $id);
		$this->db->update('info_pt',$data);
	}
	public function all_link(){
		$this->db->join('kategori_link', 'kategori_link.id_kategori_link = link.id_kategori_link');
		$query = $this->db->get('link');
		return $query->result();
	}
	public function all_kat_link(){
		$query = $this->db->get('kategori_link');
		return $query->result();
	}
	public function detail_link($id){
		$this->db->join('kategori_link', 'kategori_link.id_kategori_link = link.id_kategori_link');
		$this->db->where('id_link', $id);
		$query = $this->db->get('link');
		return $query->row();
	}
	public function detail_kategori_link($id){
		$this->db->where('id_kategori_link', $id);
		$query = $this->db->get('kategori_link');
		return $query->row();
	}
	public function detail_data($table,$field,$id){
		$this->db->where($field, $id);
		$query = $this->db->get($table);
		return $query->row();
	}
	function insert_link($data){
		$this->db->insert('link', $data);
	}
	function insert_kategori_link($data){
		$this->db->insert('kategori_link', $data);
	}
	function update_link($id,$data){
		$this->db->where('id_link',$id);
		$this->db->update('link', $data);
	}
	function update_kategori_link($id,$data){
		$this->db->where('id_kategori_link',$id);
		$this->db->update('kategori_link', $data);
	}
	public function delete_link($id){
		$this->db->where('id_link', $id);
		$this->db->delete('link');
	}
	public function cek_link_by_katelink($id){
		$this->db->where('id_kategori_link', $id);
		$query = $this->db->get('link');
		return $query->result();
	}
	public function delete_kategori_link($id){
		$this->db->where('id_kategori_link', $id);
		$this->db->delete('kategori_link');
	}
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
}
