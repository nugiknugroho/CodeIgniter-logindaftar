<?php 

defined('BASEPATH') OR exit('No direct script allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	} 
	public function index()
	{
		if ($this->session->userdata('userid') and $this->session->userdata('pass')) 
		{
			redirect(base_url('Aplikasi'));
		}else
		{
			$this->load->view('v_login');
		}
	}

	public function filter($data)
	{
		$data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
		return $data;
		unset($data);
	}
	public function cek_login()
	{
		//input userid dan password hanya angka dan huruf saja
		$userid = $this->input->post('userid');
		$userid = $this->filter($userid);

		$password = $this->input->post('password');
		$password = $this->filter($password);

		//mengambil data dari model m_login function db_cek_login
		//dengan paramter $userid dan $password
		$cek = $this->M_login->db_cek_login($userid, $password)->row();
		$jumlah = count($cek); 

		//echo $userid." >> ".$password." >> ".$jumlah;
		
		if ($jumlah>0) {
			$array_session = array('userid' => $cek->nama, 'pass' => $cek->password, 'nama' => $cek->namalengkap, 'sukses_login' => true);
			$this->session->set_userdata($array_session);
			redirect(base_url('aplikasi'));
		}else{
			//kalau data tidak ada maka redirect ke laman login
			redirect(base_url('login/login_gagal'));
			echo "GAGAl"; 
		}
		

		unset($userid, $password, $cek, $jumlah, $array_session);
	}
	public function login_gagal()
	{
		$data['gagal'] = 'Anda Gagal Login';
		$this->load->view('v_login', $data);
	}
}



 ?>