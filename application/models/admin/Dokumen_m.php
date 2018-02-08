<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dokumen_m extends CI_Model
{
	function jumlah($string){
		if (!empty($string)) {
			$this->db->like('judul_dokumen',$string);
		}
		return $this->db->get('dokumen')->num_rows();
	}
	public function searcing_data($sampai,$dari,$cari){
		if (!empty($cari)) {
			$this->db->like('judul_dokumen',$cari);
		}
		$query = $this->db->get('dokumen',$sampai,$dari);
		return $query->result();
	}
	function insert_dokumen($data){
		$this->db->insert('dokumen', $data);
	}
	function update_dokumen($id,$data){
		$this->db->where('id_dokumen',$id);
		$this->db->update('dokumen', $data);
	}
	public function detail_dokumen($id){
		$this->db->where('id_dokumen',$id);
		$query = $this->db->get('dokumen');
		return $query->row();
	}
	public function cek_dokumen($id){
		$this->db->where('id_dokumen',$id);
		$query = $this->db->get('dokumen');
		return $query->row();
	}
	public function delete_dokumen($id){
		$this->db->where('id_dokumen', $id);
		$this->db->delete('dokumen');
	}
	public function all_kategori(){
		$query = $this->db->get('kategori_dokumen');
		return $query->result();
	}
	public function get_kat($id){
		$this->db->select('nama_kategori_dokumen');
		$this->db->where('id_kategori_dokumen', $id);
		$query = $this->db->get('kategori_dokumen');
		return $query->row();
	}
	// kategori dokumen
	function jumlahkadok($string){
		if (!empty($string)) {
			$this->db->like('nama_kategori',$string);
		}
		return $this->db->get('kategori_dokumen')->num_rows();
	}
	public function searcing_data_dokumen($sampai,$dari,$cari){
		if (!empty($cari)) {
			$this->db->like('nama_kategori_dokumen',$cari);
		}
		$query = $this->db->get('kategori_dokumen',$sampai,$dari);
		return $query->result();
	}
	function insert_kategori_dokumen($data){
		$this->db->insert('kategori_dokumen', $data);
	}
	function update_kategori_dokumen($id,$data){
		$this->db->where('id_kategori_dokumen',$id);
		$this->db->update('kategori_dokumen', $data);
	}
	public function detail_kategori_dokumen($id){
		$this->db->where('id_kategori_dokumen',$id);
		$query = $this->db->get('kategori_dokumen');
		return $query->row();
	}
	public function cek_kategori_dokumen($id){
		$this->db->where('id_kategori_dokumen',$id);
		$query = $this->db->get('kategori_dokumen');
		return $query->row();
	}
	public function delete_kategori_dokumen($id){
		$this->db->where('id_kategori_dokumen', $id);
		$this->db->delete('kategori_dokumen');
	}
}
