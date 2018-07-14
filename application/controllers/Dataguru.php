<?php 

defined('BASEPATH') OR exit('No direct script access allowed'); 

class Dataguru extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct(); 

		if ($this->session->userdata('userid') and $this->session->userdata('pass')) {
			$this->load->model('m_dataguru');
		}else
		{
			redirect(base_url('login')); 
		}
	}
	public function index()
	{
		$this->load->view('v_dataguru');
	}

	public function tambah_guru()
	{
		$data['page'] = 'tambah_guru';
		$this->load->view('v_dataguru', $data);
	}

	public function proses_tambah_guru()
	{
		$data['namateacher'] = $this->input->post('namateacher');
		$data['pendidikan'] = $this->input->post('pendidikan');
		$data['id_jenjang'] = $this->input->post('id_jenjang');
		$data['id_mapel'] = $this->input->post('id_mapel');
		$data['alamat'] = $this->input->post('alamat');
		$data['no_telp'] = $this->input->post('no_telp');
		$data['hargaperjam'] = $this->input->post('hargaperjam');
		
		$this->m_dataguru->tambah_guru($data);
 
		 redirect(base_url('dataguru/daftar_guru'));
		unset($data);
	}

	public function daftar_guru()
	{
		$data['page'] = 'daftar_guru';

		if (!empty($this->input->post('cari'))) {
			$cari = $this->input->post('cari');
			$data['cari'] = $cari;
			$data['daftar_guru'] = $this->m_dataguru->cari_guru($cari)->result();
			$data['jumlah'] = count($data['daftar_guru']);
		}
		else {
			$data['daftar_guru'] = $this->m_dataguru->daftar_guru()->result();
		}
	    
		$this->load->view('v_dataguru', $data);
		unset($data, $cari);
		
	}

	public function ubah_guru($id_teacher)
	{
		$data['page'] = 'ubah_guru';
		$data['guru'] = $this->m_dataguru->data_guru($id_teacher)->row();

		$this->load->view('v_dataguru', $data);
		unset($data);
	}

	public function proses_ubah_guru()
	{
		$data['namateacher'] = $this->input->post('namateacher');
		$data['pendidikan'] = $this->input->post('pendidikan');
		$data['id_jenjang'] = $this->input->post('id_jenjang');
		$data['id_mapel'] = $this->input->post('id_mapel');
		$data['alamat'] = $this->input->post('alamat');
		$data['no_telp'] = $this->input->post('no_telp');
		$data['hargaperjam'] = $this->input->post('hargaperjam');
		$id_teacher = $this->input->post('id_teacher');

		$this->m_dataguru->ubah_guru($id_teacher, $data);

		redirect(base_url('dataguru/daftar_guru'));
		unset($id_teacher, $data);
	}

	public function hapus_guru($id_teacher)
	{
		$this->m_dataguru->hapus_guru($id_teacher);

		redirect(base_url('dataguru/daftar_guru'));
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