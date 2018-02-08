<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Artikel_m extends CI_Model
{
	function jumlah($string){
		if (!empty($string)) {
			$this->db->like('judul_artikel',$string);
		}
		return $this->db->get('artikel')->num_rows();
	}
	public function searcing_data($sampai,$dari,$cari){
		if (!empty($cari)) {
			$this->db->like('judul_artikel',$cari);
		}
		$this->db->order_by('id_artikel','desc');
		$query = $this->db->get('artikel',$sampai,$dari);
		return $query->result();
	}
	function insert_artikel($data){
		$this->db->insert('artikel', $data);
	}
	function update_artikel($id,$data){
		$this->db->where('id_artikel',$id);
		$this->db->update('artikel', $data);
	}
	public function detail_artikel($id){
		$this->db->where('id_artikel',$id);
		$this->db->join('kategori', 'kategori.id_kategori = artikel.id_kategori');
		$query = $this->db->get('artikel');
		return $query->row();
	}
	public function cek_artikel($id){
		$this->db->where('id_artikel',$id);
		$query = $this->db->get('artikel');
		return $query->row();
	}
	public function delete_artikel($id){
		$this->db->where('id_artikel', $id);
		$this->db->delete('artikel');
	}
	public function all_kategori(){
		$query = $this->db->get('kategori');
		return $query->result();
	}
	public function all_slider(){
		$query = $this->db->get('slider');
		return $query->result();
	}
	public function get_kat($id){
		$this->db->select('nama_kategori');
		$this->db->where('id_kategori', $id);
		$query = $this->db->get('kategori');
		return $query->row();
	}
	// slider
	function insert_slider($data){
		$this->db->insert('slider', $data);
	}
	function update_slider($id,$data){
		$this->db->where('id_slider',$id);
		$this->db->update('slider', $data);
	}
	public function detail_slider($id){
		$this->db->where('id_slider', $id);
		$sdf = $this->db->get('slider');
		return $sdf->row();
	}
	public function delete_slider($id){
		$this->db->where('id_slider', $id);
		$this->db->delete('slider');
	}
	public function cek_slider($id){
		$this->db->select('*');
		$this->db->from('slider');
		$this->db->where('id_slider', $id);
		$query = $this->db->get();
		return $query;
	}
	public function edit_galeri($id, $data){
		$this->db->where('id_galeri', $id);
		$this->db->update('galeri', $data);
	}
}
