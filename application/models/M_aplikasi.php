<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_aplikasi extends CI_Model
{
	function __construct()
	{
		parent::__construct(); 
	}

	function tambah_guru($data)
	{
		$this->db->query("INSERT INTO teacher(namateacher, pendidikan, id_jenjang, id_mapel, alamat, no_telp, hargaperjam) values(?,?,?,?,?,?)", array($data['namateacher'], $data['pendidikan'], $data['id_jenjang'], $data['id_mapel'], $data['alamat'], $data['no_telp'], $data['hargaperjam']));

		unset($data);

	}

	function data_duru()
	{

		$query = $this->db->query("SELECT namateacher, pendidikan, jenjang, mapel, alamat, no_telp, hargaperjam , id_teacher FROM teacher, jenjang, mapel WHERE jenjang.id_jenjang=teacher.id_jenjang AND mapel.id_mapel=teacher.id_mapel");

		return $query;

		$query = null;

	}


	function putus_koneksi()
	{
		$this->db =null;
	}



}

 ?>