<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rekap_m extends CI_Model
{
	public function prodi(){
		$this->db->join('jenjang_pendidikan', 'jenjang_pendidikan.id_jenj_didik = sms.id_jenj_didik');
		$query = $this->db->get('sms');
		return $query->result();
	}
}