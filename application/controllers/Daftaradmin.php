<?php 

defined('BASEPATH') OR exit('No direct script allowed');

Class Daftaradmin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_daftaradmin');
	}

	public function index()
	{

		$this->load->view('v_daftaradmin');
	}

		public function tambah_data()
	{
		$data['page'] = 'tambah_data';
		$this->load->view('v_daftaradmin', $data);
		unset($data);
	}
	public function proses_tambah_data()
	{
		$data['namalengkap'] = $this->input->post('namalengkap');
		$data['nama'] = $this->input->post('nama');
		$data['password'] = $this->input->post('password');
		
		$this->m_daftaradmin->tambah_data($data);
 
		 redirect(base_url('login'));
		unset($data);
	}

}

 ?>