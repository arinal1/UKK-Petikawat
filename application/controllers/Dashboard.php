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
			$key = $this->input->post('id');
			$username = $this->input->post('username');
			$nama = $this->input->post('nama');
			$password = md5($this->input->post('password'));
			$foto = $this->input->post('foto');
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
			$password = md5($this->input->post('password'));
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
