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
			'username' => $username,
		);
		$get = $this->login_m->cek_login("user",$where);
		$cek = $get->num_rows();
		if($cek > 0){
			foreach ($get->result() as $user) {
				$id = $user->id;
				$pass = $this->encrypt->decode($user->password);
				$nama = $user->nama_lengkap;
				$level = $user->level;
				$foto = $user->foto;
			}
			if ($password == $pass) {
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
				redirect('login?action=fail','refresh');
			}
		} else{
			redirect('login?action=fail','refresh');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url(''));
	}
}