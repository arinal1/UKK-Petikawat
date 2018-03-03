<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->unset_data_pesan();
		$this->db->order_by('nama','ASC');
		$data['bandara'] = $this->db->get('bandara')->result_array();
		$this->load->view('template/header');
		$this->load->view('home', $data);
		$this->load->view('template/footer');
	}

	public function cek_pemesanan($kode = null){
		$data['kode'] = $kode;
		$data['pemesan'] = $this->db->get_where('pemesan', array('kode'=>$kode));
		$this->load->view('template/header');
		$this->load->view('cek_pemesanan', $data);
		$this->load->view('template/footer');
	}

	public function upload_bukti($kode){
		$config['upload_path'] = 'assets/img/bukti/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config); 
		if(!$this->upload->do_upload('img')){
			$error = array('error' => $this->upload->display_errors());
			foreach ($error as $val) {
				echo $val;
			}
		}
		$foto = $this->upload->data('file_name');
		$this->db->where('kode', $kode);
		$this->db->update('pemesan', array('status'=>1, 'bukti'=>$foto));
		redirect('home/cek_pemesanan/'.$kode,'refresh');
	}

	public function unset_data_pesan(){
		$this->session->unset_userdata('from');
		$this->session->unset_userdata('to');
		$this->session->unset_userdata('tanggal');
		$this->session->unset_userdata('kursi');
		$this->session->unset_userdata('id_rute');
		$this->session->unset_userdata('id_pesawat');
		$this->session->unset_userdata('harga');
		$this->session->unset_userdata('nama_pemesan');
		$this->session->unset_userdata('telepon_pemesan');
		$this->session->unset_userdata('alamat_pemesan');
	}
}
