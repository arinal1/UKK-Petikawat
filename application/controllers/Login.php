<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('login_m');

	}

	function index(){
		$this->load->view('login');
	}

	function aksi_login(){
		$this->load->library('encrypt');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$get = $this->login_m->cek_login("user",$where);
		$cek = $get->num_rows();
		if($cek > 0){
			foreach ($get->result() as $user) {
				$nama = $user->nama_lengkap;
				$level = $user->level;
				$foto = $user->foto;
			}
			$data_session = array(
				'username' => $username,
				'nama' => $nama,
				'level' => $level,
				'foto' => $foto,
				'status' => true
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("dashboard"));

		}else{
			echo "Username dan password salah ! ". md5($this->input->post('password'));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('home'));
	}

	function signup(){
		$this->load->view('signup');
	}
}