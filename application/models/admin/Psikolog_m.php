<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Psikolog_m extends CI_Model
{
	public function daftar_psikolog(){
		$query = $this->db->get('psikolog',10);
		return $query->result();
	}
}
