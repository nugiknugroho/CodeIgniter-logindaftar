<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanguru extends CI_Model
{
	function __construct()
	{
		parent::__construct();  
	}

	function tambah_pemesan($data)
	{
		$this->db->query("INSERT INTO pemesanan(pemesan, id_mapel, id_jenjang, jumlahpertemuan, alamat, waktupengajaran, durasi) values(?,?,?,?,?,?,?)", array($data['pemesan'], $data['id_mapel'], $data['id_jenjang'], $data['jumlahpertemuan'], $data['alamat'], $data['waktupengajaran'], $data['durasi']));

		unset($data);

	} 

	function daftar_pemesan()
	{

		// $query = $this->db->query("SELECT namateacher, pendidikan, jenjang, mapel, alamat, no_telp, hargaperjam , id_teacher FROM teacher, jenjang, mapel WHERE jenjang.id_jenjang=teacher.id_jenjang AND mapel.id_mapel=teacher.id_mapel");

		$query = $this->db->query("SELECT * FROM pemesanan");

		return $query;

		$query = null;

	}

	function cari_pemesan($data)
	{
		$query = $this->db->query("SELECT * FROM pemesanan WHERE id_jenjang like ? OR id_mapel like ? ORDER BY id_pemesan ASC", array('%'.$data.'%', '%'.$data.'%'));

		return $query; 
		$query = null;
	}

	function data_pemesan($id_pemesan)
	{
		$query = $this->db->query("SELECT * FROM pemesanan WHERE id_pemesan= ?", array($id_pemesan));

		return $query; 
		$query = null;
		unset($id_pemesan);
	}

	function ubah_pemesan($id_pemesan, $data)
	{
		$this->db->query("update pemesanan set pemesan = ?, id_mapel=?, id_jenjang=?, jumlahpertemuan=?, alamat=?, waktupengajaran=?, durasi=? where id_pemesan = ?", array($data['pemesan'], $data['id_mapel'], $data['id_jenjang'], $data['jumlahpertemuan'], $data['alamat'], $data['waktupengajaran'], $data['durasi'], $id_pemesan));

		unset($id_pemesan, $data);
	}

	function hapus_pemesan($id_pemesan)
	{
		$this->db->query("delete from pemesanan where id_pemesan =?", array($id_pemesan));
		unset($id_pemesan);
	}



	function putus_koneksi()
	{
		$this->db =null;
	}



}

 ?>