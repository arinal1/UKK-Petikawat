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
		$menu['id'] = 1;
		$this->load->view('dashboard/template/sidebar', $menu);
		$this->load->view('dashboard/template/header');
		$this->load->view('dashboard/index');
		$this->load->view('dashboard/template/footer');
	}

	public function users()
	{
		$data['users'] = $this->dashboard_m->getUsers();
		$menu['id'] = 2;
		$this->load->view('dashboard/template/sidebar', $menu);
		$this->load->view('dashboard/template/header');
		$this->load->view('dashboard/users', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function user_edit($id = null)
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
			$level = $this->input->post('level');
			$password = $this->encrypt->encode($this->input->post('password'));
			$foto = $this->upload->data('file_name');
			if($foto == ""){$foto = $this->input->post('img-ori');}
			$data = array(
				'username' => $username,
				'nama_lengkap' => $nama,
				'password' => $password,
				'foto' => $foto,
				'level' => $level
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
					'level' => $level,
					'status' => true
				);
				$this->session->set_userdata($data_session);
			}
			redirect(base_url('dashboard/users'));
		} else{
			$where = array('id' => $id);
			$data['user'] = $this->dashboard_m->getUser($where,'user');
			$menu['id'] = 2;
			$this->load->view('dashboard/template/sidebar', $menu);
			$this->load->view('dashboard/template/header');
			$this->load->view('dashboard/user_edit', $data);
			$this->load->view('dashboard/template/footer');
			
		}
	}

	public function user_hapus()
	{
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete('user');
		redirect('dashboard/users','refresh');
	}

	public function user_tambah($act = null)
	{
		if ($act == "action") {
			// upload gambar
			$config['upload_path'] = 'assets/img/users/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config); 
			$this->upload->do_upload('img');
			//insert
			$id = $this->input->post('id');
			$username = $this->input->post('username');
			$nama = $this->input->post('nama');
			$level = $this->input->post('level');
			$password = $this->encrypt->encode($this->input->post('password'));
			$foto = $this->upload->data('file_name');
			$data = array(
				'id' => $id,
				'username' => $username,
				'nama_lengkap' => $nama,
				'password' => $password,
				'level' => $level,
				'foto' => $foto
			);
			$this->dashboard_m->tambahUser('user', $data);
			redirect(base_url('dashboard/users'));
		}else {
			$menu['id'] = 2;
			$this->load->view('dashboard/template/sidebar', $menu);
			$this->load->view('dashboard/template/header');
			$this->load->view('dashboard/user_tambah');
			$this->load->view('dashboard/template/footer');
		}
	}

	public function pemesanan(){
		$data['pemesanan'] = $this->db->get('pemesan');
		$menu['id'] = 3;
		$this->load->view('dashboard/template/sidebar', $menu);
		$this->load->view('dashboard/template/header');
		$this->load->view('dashboard/pemesanan', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function detail_pemesanan($id = null){
		$data['pemesan'] = $this->db->get_where('pemesan', array('id'=>$id));
		$data['pemesanan'] = $this->db->get_where('pemesanan', array('id_pemesan'=>$id));
		if ($data['pemesan']->num_rows()>0) {
			$this->db->select("*, DATE_FORMAT(jam_berangkat, '%H:%i') brgkt, DATE_FORMAT(jam_sampai, '%H:%i') dtg, pesawat.nama pesawat");
			$this->db->from('rute');
			$this->db->where('rute.id', $data['pemesan']->result()[0]->id_rute);
			$this->db->join('pesawat', 'pesawat.id = rute.id_pesawat');
			$data['rute'] = $this->db->get();
			$data['asal'] = $this->db->get_where('bandara', array('id'=>$data['rute']->result()[0]->asal_bandara))->result()[0]->nama;
			$data['tujuan'] = $this->db->get_where('bandara', array('id'=>$data['rute']->result()[0]->tujuan_bandara))->result()[0]->nama;
		}
		$this->load->view('dashboard/template/sidebar');
		$this->load->view('dashboard/template/header');
		$this->load->view('dashboard/detail_pemesanan', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function aksi_pemesanan($stat){
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->update('pemesan', array('status'=>$stat));
		redirect('dashboard/pemesanan','refresh');
	}

	public function rute(){
		$this->db->select("*,rute.id id, DATE_FORMAT(jam_berangkat, '%H:%i') brgkt, DATE_FORMAT(jam_sampai, '%H:%i') dtg, pesawat.nama pesawat");
		$this->db->from('rute');
		$this->db->join('pesawat', 'pesawat.id = rute.id_pesawat');
		$data['rute'] = $this->db->get();
		$i = 0;
		foreach ($data['rute']->result() as $value) {
			$data['asal'][$i] = $this->db->get_where('bandara', array('id' => $value->asal_bandara))->result()[0]->nama;
			$data['tujuan'][$i] = $this->db->get_where('bandara', array('id' => $value->tujuan_bandara))->result()[0]->nama;
			$i++;
		}
		$menu['id'] = 4;
		$this->load->view('dashboard/template/sidebar', $menu);
		$this->load->view('dashboard/template/header');
		$this->load->view('dashboard/rute', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function rute_tambah($act = null){
		if ($act == "action") {
			$asal = $this->input->post('asal');
			$tujuan = $this->input->post('tujuan');
			$brgkt = $this->input->post('brgkt');
			$dtg = $this->input->post('dtg');
			$harga = $this->input->post('harga');
			$id_pesawat = $this->input->post('pesawat');
			$data = array(
				'asal_bandara' => $asal,
				'tujuan_bandara' => $tujuan,
				'jam_berangkat' => $brgkt,
				'jam_sampai' => $dtg,
				'harga' => $harga,
				'id_pesawat' => $id_pesawat
			);
			$this->db->insert('rute', $data);
			redirect('dashboard/rute');
		}else {
			$data['bandara'] = $this->db->get('bandara')->result_array();
			$data['pesawat'] = $this->db->get('pesawat')->result_array();
			$menu['id'] = 4;
			$this->load->view('dashboard/template/sidebar', $menu);
			$this->load->view('dashboard/template/header');
			$this->load->view('dashboard/rute_tambah', $data);
			$this->load->view('dashboard/template/footer');
		}
	}

	public function rute_hapus(){
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete('rute');
		redirect('dashboard/rute','refresh');
	}

	public function rute_edit($id = null){
		if ($id == "action") {
			$id = $this->input->post('id');
			$asal = $this->input->post('asal');
			$tujuan = $this->input->post('tujuan');
			$brgkt = $this->input->post('brgkt');
			$dtg = $this->input->post('dtg');
			$harga = $this->input->post('harga');
			$id_pesawat = $this->input->post('pesawat');
			$data = array(
				'asal_bandara' => $asal,
				'tujuan_bandara' => $tujuan,
				'jam_berangkat' => $brgkt,
				'jam_sampai' => $dtg,
				'harga' => $harga,
				'id_pesawat' => $id_pesawat
			);
			$this->db->where('id', $id);
			$this->db->update('rute', $data);
			redirect('dashboard/rute');
		}else {
			$this->db->select("*, rute.id id, DATE_FORMAT(jam_berangkat, '%H:%i') brgkt, DATE_FORMAT(jam_sampai, '%H:%i') dtg, pesawat.id id_pesawat");
			$this->db->from('rute');
			$this->db->where('rute.id', $id);
			$this->db->join('pesawat', 'pesawat.id = rute.id_pesawat');
			$data['rute'] = $this->db->get();
			$r = $data['rute']->result()[0];
			$data['asal'] = $this->db->get_where('bandara', array('id' => $r->asal_bandara))->result()[0]->id;
			$data['tujuan'] = $this->db->get_where('bandara', array('id' => $r->tujuan_bandara))->result()[0]->id;
			$data['bandara'] = $this->db->get('bandara')->result();
			$data['pesawat'] = $this->db->get('pesawat')->result();
			$menu['id'] = 4;
			$this->load->view('dashboard/template/sidebar', $menu);
			$this->load->view('dashboard/template/header');
			$this->load->view('dashboard/rute_edit', $data);
			$this->load->view('dashboard/template/footer');
		}
	}

	public function bandara(){
		$data['bandara'] = $this->db->get('bandara')->result();
		$menu['id'] = 5;
		$this->load->view('dashboard/template/sidebar', $menu);
		$this->load->view('dashboard/template/header');
		$this->load->view('dashboard/bandara', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function bandara_tambah($act = null){
		if ($act == "action") {
			$kode = $this->input->post('kode');
			$nama = $this->input->post('nama');
			$kota = $this->input->post('kota');
			$data = array(
				'kode' => $kode,
				'nama' => $nama,
				'kota' => $kota
			);
			$this->db->insert('bandara', $data);
			redirect('dashboard/bandara');
		}else {
			$menu['id'] = 5;
			$this->load->view('dashboard/template/sidebar', $menu);
			$this->load->view('dashboard/template/header');
			$this->load->view('dashboard/bandara_tambah');
			$this->load->view('dashboard/template/footer');
		}
	}

	public function bandara_hapus(){
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete('bandara');
		redirect('dashboard/bandara','refresh');
	}

	public function bandara_edit($id = null){
		if ($id == "action") {
			$id = $this->input->post('id');
			$kode = $this->input->post('kode');
			$nama = $this->input->post('nama');
			$kota = $this->input->post('kota');
			$data = array(
				'kode' => $kode,
				'nama' => $nama,
				'kota' => $kota
			);
			$this->db->where('id', $id);
			$this->db->update('bandara', $data);
			redirect('dashboard/bandara');
		}else {
			$this->db->where('id', $id);
			$data['bandara'] = $this->db->get('bandara');
			$menu['id'] = 5;
			$this->load->view('dashboard/template/sidebar', $menu);
			$this->load->view('dashboard/template/header');
			$this->load->view('dashboard/bandara_edit', $data);
			$this->load->view('dashboard/template/footer');
		}
	}

	public function pesawat(){
		$data['pesawat'] = $this->db->get('pesawat')->result();
		$menu['id'] = 6;
		$this->load->view('dashboard/template/sidebar', $menu);
		$this->load->view('dashboard/template/header');
		$this->load->view('dashboard/pesawat', $data);
		$this->load->view('dashboard/template/footer');
	}

	public function pesawat_tambah($act = null){
		if ($act == "action") {
			$nama = $this->input->post('nama');
			$kursi = $this->input->post('kursi');
			$deskripsi = $this->input->post('deskripsi');
			$data = array(
				'nama' => $nama,
				'jumlah_kursi' => $kursi,
				'deskripsi' => $deskripsi
			);
			$this->db->insert('pesawat', $data);
			redirect('dashboard/pesawat');
		}else {
			$menu['id'] = 6;
			$this->load->view('dashboard/template/sidebar', $menu);
			$this->load->view('dashboard/template/header');
			$this->load->view('dashboard/pesawat_tambah');
			$this->load->view('dashboard/template/footer');
		}
	}

	public function pesawat_hapus(){
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		$this->db->delete('pesawat');
		redirect('dashboard/pesawat','refresh');
	}

	public function pesawat_edit($id = null){
		if ($id == "action") {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$kursi = $this->input->post('kursi');
			$deskripsi = $this->input->post('deskripsi');
			$data = array(
				'nama' => $nama,
				'jumlah_kursi' => $kursi,
				'deskripsi' => $deskripsi
			);
			$this->db->where('id', $id);
			$this->db->update('pesawat', $data);
			redirect('dashboard/pesawat');
		}else {
			$this->db->where('id', $id);
			$data['pesawat'] = $this->db->get('pesawat');
			$menu['id'] = 6;
			$this->load->view('dashboard/template/sidebar', $menu);
			$this->load->view('dashboard/template/header');
			$this->load->view('dashboard/pesawat_edit', $data);
			$this->load->view('dashboard/template/footer');
		}
	}

	public function cek_user(){
		$u = $this->input->post('username');
		$this->db->from('user');
		$this->db->where('username', $u);
		echo $this->db->get()->num_rows();
	}
}