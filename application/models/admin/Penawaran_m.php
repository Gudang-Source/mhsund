<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Penawaran_m extends CI_Model
{
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
	// khusus
	public function detail_mahasiswa($id){
		$this->db->select('mahasiswa_pt.*,mahasiswa.*,sms.id,sms.id_sms,sms.nm_lemb,sms.kode_prodi,mahasiswa_pt.id_reg_pd,mahasiswa_pt.nipd,mahasiswa_pt.id AS idmhspt,mahasiswa.id AS idmhs,mahasiswa.email AS email_mhs,sms.id AS idsms');
		$this->db->where('mahasiswa.id',$id);
		$this->db->join('mahasiswa_pt', 'mahasiswa_pt.id_pd_siakad = mahasiswa.id');
		$this->db->join('sms', 'sms.kode_prodi = mahasiswa_pt.kode_sms');
		$query = $this->db->get('mahasiswa');
		return $query->row();
	}
	public function aktivitas_kuliah($id){
		$this->db->where('id_mhs_pt',$id);
		$this->db->order_by('id_smt','desc');
		$query = $this->db->get('kuliah_mahasiswa');
		return $query->row();
	}
	public function get_kurikulum($idsms){
		$this->db->where('id_sms',$idsms);
		$this->db->order_by('id','desc');
		$query = $this->db->get('kurikulum');
		return $query->row();
	}
	public function get_mk_kur($kur,$smt,$idmhs,$lastsmt){
		$this->db->where('nilai.id_mhs_pt',$idmhs);
		$this->db->where('nilai.id_smt',$lastsmt);
		$hasil = $this->db->get('nilai');


		$this->db->select('mata_kuliah_kurikulum.*,mata_kuliah.kode_mk,mata_kuliah.nm_mk,mata_kuliah.id_mk,mata_kuliah.id AS idmk');
		foreach ($hasil->result() as $gandd) {
			$this->db->where_not_in('kode_mk',$gandd->kode_mk);
		}
		$this->db->where('id_kurikulum_siakad',$kur);
		$this->db->where('smt',$smt);
		$this->db->join('mata_kuliah', 'mata_kuliah.id = mata_kuliah_kurikulum.id_mk_siakad');
		$this->db->order_by('id','desc');
		$query = $this->db->get('mata_kuliah_kurikulum');
		return $query->result();
	}
	public function get_mk_add($idmhs,$smt){

		$this->db->select('nilai.*,mata_kuliah.nm_mk,mata_kuliah.sks_mk');
		$this->db->where('nilai.id_mhs_pt',$idmhs);
		$this->db->where('nilai.id_smt',$smt);
		$this->db->join('mata_kuliah', 'mata_kuliah.kode_mk = nilai.kode_mk');
		$this->db->group_by('nilai.kode_mk,nilai.id_smt,nilai.nipd');
		$this->db->order_by('nilai.id_smt','desc');
		$query = $this->db->get('nilai');
		return $query->result();
	}
	public function get_smt_mhs($idmhs){
		$this->db->where('id_mhs_pt',$idmhs);
		$this->db->where('id_stat_mhs','A');
		$this->db->order_by('id_smt','desc');
		$query = $this->db->get('kuliah_mahasiswa');
		return $query->num_rows();
	}
}
