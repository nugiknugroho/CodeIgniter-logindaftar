<?php 

defined('BASEPATH') OR exit('No direct script allowed');

class M_daftaradmin extends CI_Model
{

	function __construct()
	{

		parent::__construct();

	}

	function tambah_data($data)
	{
		$this->db->query("insert into user(namalengkap, nama, password) values(?,?,md5(?))", array($data['namalengkap'], $data['nama'], $data['password']));

		unset($data); 
	}

}

 ?>