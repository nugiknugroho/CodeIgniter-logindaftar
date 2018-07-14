<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_dataguru extends CI_Model
{
	function __construct()
	{
		parent::__construct();  
	}

	function tambah_guru($data)
	{
		$this->db->query("INSERT INTO teacher(namateacher, pendidikan, id_jenjang, id_mapel, alamat, no_telp, hargaperjam) values(?,?,?,?,?,?,?)", array($data['namateacher'], $data['pendidikan'], $data['id_jenjang'], $data['id_mapel'], $data['alamat'], $data['no_telp'], $data['hargaperjam']));

		unset($data);

	} 

	function daftar_guru()
	{

		// $query = $this->db->query("SELECT namateacher, pendidikan, jenjang, mapel, alamat, no_telp, hargaperjam , id_teacher FROM teacher, jenjang, mapel WHERE jenjang.id_jenjang=teacher.id_jenjang AND mapel.id_mapel=teacher.id_mapel");

		$query = $this->db->query("SELECT * FROM teacher");

		return $query;

		$query = null;

	}

	function cari_guru($data)
	{
		$query = $this->db->query("SELECT * FROM teacher WHERE id_jenjang like ? OR id_mapel like ? ORDER BY id_teacher ASC", array('%'.$data.'%', '%'.$data.'%'));

		return $query; 
		$query = null;
	}

	function data_guru($id_teacher)
	{
		$query = $this->db->query("SELECT * FROM teacher WHERE id_teacher= ?", array($id_teacher));

		return $query; 
		$query = null;
		unset($id_teacher);
	}

	function ubah_guru($id_teacher, $data)
	{
		$this->db->query("update teacher set namateacher = ?, pendidikan=?, id_jenjang=?, id_mapel=?, alamat=?, no_telp=?, hargaperjam=? where id_teacher = ?", array($data['namateacher'], $data['pendidikan'], $data['id_jenjang'], $data['id_mapel'], $data['alamat'], $data['no_telp'], $data['hargaperjam'], $id_teacher));

		unset($id_teacher, $data);
	}

	function hapus_guru($id_teacher)
	{
		$this->db->query("delete from teacher where id_teacher =?", array($id_teacher));
		unset($nim);
	}



	function putus_koneksi()
	{
		$this->db =null;
	}



}

 ?>