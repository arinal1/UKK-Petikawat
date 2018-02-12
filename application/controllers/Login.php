<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('login_m');
		$this->load->library('encrypt');

	}

	function index(){
		$this->load->view('login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username
		);
		$get = $this->login_m->cek_login("user",$where);
		$cek = $get->num_rows();
		if($cek > 0){
			foreach ($get->result() as $user) {
				$id = $user->id;
				$pass = $user->password;
				$nama = $user->nama_lengkap;
				$level = $user->level;
				$foto = $user->foto;
			}
			if($this->encrypt->decode($pass) == $password){
				$data_session = array(
					'id' => $id,
					'username' => $username,
					'nama' => $nama,
					'level' => $level,
					'foto' => $foto,
					'status' => true
				);
				$this->session->set_userdata($data_session);
				redirect(base_url("dashboard"));	
			}else{
				echo "Username dan password salah ! ". $this->encrypt->encode($this->input->post('password'));	
			}
		}else{
			echo "Username tidak ada! ". $this->input->post('username');
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