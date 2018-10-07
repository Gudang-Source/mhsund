<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Setting_m extends CI_Model
{
	function count_user_prodi($string){
		if (!empty($string)) {
			$this->db->like('first_name',$string);
		}
		$this->db->where('lvl','2');
		return $this->db->get('users')->num_rows();
	}
	public function select_user_prodi($sampai,$dari,$string){
		if (!empty($string)) {
			$this->db->like('first_name',$string);
		}
		$this->db->where('lvl','2');
		$this->db->order_by('users.id','desc');
		$this->db->join('sms', 'sms.kode_prodi = users.id_mhs');
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
		$query = $this->db->get('users',$sampai,$dari);
		return $query->result();
	}
	public function all_prodi(){
        $this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
		$query = $this->db->get('sms');
		return $query->result();
	}
	public function lastid(){
		$this->db->order_by('id','desc');
		$query = $this->db->get('users');
		return $query->row();
	}
}
