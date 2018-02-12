<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('dashboard_m');
		$this->load->library('encrypt');
	}

	public function index()
	{
		$this->load->view('dashboard');
	}

	public function users()
	{
		$data['users'] = $this->dashboard_m->getUsers();
		$this->load->view('users', $data);
	}

	public function user_edit($id)
	{
		if ($id == "action") {
			// upload gambar
			$config['upload_path'] = 'assets/img/users/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config); 
			$this->upload->do_upload('img');
			// upload data
			$key = $this->input->post('id');
			$username = $this->input->post('username');
			$nama = $this->input->post('nama');
			$password = $this->encrypt->encode($this->input->post('password'));
			$foto = $this->upload->data('file_name');
			$data = array(
				'username' => $username,
				'nama_lengkap' => $nama,
				'password' => $password,
				'foto' => $foto
			);
			$where = array(
				'id' => $key
			);	
			$this->dashboard_m->editUser($where,$data,'user');
			if ($this->session->userdata('id') == $key) {
				$data_session = array(
					'id' => $key,
					'username' => $username,
					'nama' => $nama,
					'foto' => $foto,
					'status' => true
				);
				$this->session->set_userdata($data_session);
			}
			redirect(base_url('dashboard/users'));
		} else{
			$where = array('id' => $id);
			$data['user'] = $this->dashboard_m->getUser($where,'user');
			$this->load->view('user_edit', $data);	
		}
	}

	public function user_hapus($id)
	{
		$where = array('id' => $id);
		$this->dashboard_m->hapusUser($where,'user');
		header('Location:'.base_url('dashboard/users'));
	}

	public function user_tambah($act)
	{
		if ($act == "action") {
			$id = $this->input->post('id');
			$username = $this->input->post('username');
			$nama = $this->input->post('nama');
			$password = $this->encrypt->encode($this->input->post('password'));
			$data = array(
				'id' => $id,
				'username' => $username,
				'nama_lengkap' => $nama,
				'password' => $password,
			);
			$this->dashboard_m->tambahUser('user', $data);
			redirect(base_url('dashboard/users'));
		}else {
			$this->load->view('user_tambah');
		}
	}
}
