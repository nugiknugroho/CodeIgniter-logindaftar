<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct(); 

		if ($this->session->userdata('userid') and $this->session->userdata('pass')) {
			$this->load->model('m_aplikasi');
		}else
		{
			redirect(base_url('login'));
		}
	}
	public function index()
	{
		$this->load->view('v_aplikasi');
	}

	public function tambah_guru()
	{
		$data['page'] = 'tambah_guru';
		$this->load->view('v_aplikasi', $data);
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
		
		$this->m_daftaradmin->tambah_guru($data);
 
		 redirect(base_url('aplikasi/data_guru'));
		unset($data);
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