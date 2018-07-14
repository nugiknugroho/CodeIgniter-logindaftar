<?php 

defined('BASEPATH') OR exit('No direct script access allowed'); 

class Pesanguru extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct(); 

		if ($this->session->userdata('userid') and $this->session->userdata('pass')) {
			$this->load->model('m_pesanguru');
		}else
		{
			redirect(base_url('login'));
		}
	}
	public function index()
	{
		$this->load->view('v_pesanguru');
	}

	public function tambah_pemesan()
	{
		$data['page'] = 'tambah_pemesan';
		$this->load->view('v_pesanguru', $data);
	}

	public function proses_tambah_pemesan()
	{
		$data['pemesan'] = $this->input->post('pemesan');
		$data['id_mapel'] = $this->input->post('id_mapel');
		$data['id_jenjang'] = $this->input->post('id_jenjang');
		$data['jumlahpertemuan'] = $this->input->post('jumlahpertemuan');
		$data['alamat'] = $this->input->post('alamat');
		$data['waktupengajaran'] = $this->input->post('waktupengajaran');
		$data['durasi'] = $this->input->post('durasi');
		
		$this->m_pesanguru->tambah_pemesan($data);
 
		 redirect(base_url('pesanguru/daftar_pemesan'));
		unset($data);
	}

	public function daftar_pemesan()
	{
		$data['page'] = 'daftar_pemesan';

		if (!empty($this->input->post('cari'))) {
			$cari = $this->input->post('cari');
			$data['cari'] = $cari;
			$data['daftar_pemesan'] = $this->m_pesanguru->cari_pemesan($cari)->result();
			$data['jumlah'] = count($data['daftar_pemesan']);
		}
		else {
			$data['daftar_pemesan'] = $this->m_pesanguru->daftar_pemesan()->result();
		}
	    
		$this->load->view('v_pesanguru', $data);
		unset($data, $cari);
		
	}

	public function ubah_pemesan($id_pemesan)
	{
		$data['page'] = 'ubah_pemesan';
		$data['pemesan'] = $this->m_pesanguru->data_pemesan($id_pemesan)->row();

		$this->load->view('v_pesanguru', $data);
		unset($data);
	}

	public function proses_ubah_pemesan()
	{
		$data['pemesan'] = $this->input->post('pemesan');
		$data['id_mapel'] = $this->input->post('id_mapel');
		$data['id_jenjang'] = $this->input->post('id_jenjang');
		$data['jumlahpertemuan'] = $this->input->post('jumlahpertemuan');
		$data['alamat'] = $this->input->post('alamat');
		$data['waktu_pengajaran'] = $this->input->post('waktu_pengajaran');
		$data['durasi'] = $this->input->post('durasi');
		$id_pemesan = $this->input->post('id_pemesan');

		$this->m_pesanguru->ubah_pemesan($id_pemesan, $data);

		redirect(base_url('pesanguru/daftar_pemesan'));
		unset($id_pemesan, $data);
	}

	public function hapus_pemesan($id_pemesan)
	{
		$this->m_pesanguru->hapus_pemesan($id_pemesan);

		redirect(base_url('pesanguru/daftar_pemesan'));
	}

	public function logout()
	{
		$this->m_aplikasi->putus_koneksi();

		$array_session = $this->session->all_userdata();
		$this->session->unset_userdata($array_session);
		unset($array_session);

		$this->session->sess_destroy();

		redirect(base_url('login'));
	}

}

 ?>