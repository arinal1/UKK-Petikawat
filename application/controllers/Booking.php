<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('booking_m');
	}

	public function index(){
		if ($this->input->post('from') == null){
			if ($this->session->userdata('kursi') < 1) {
				redirect(base_url(),'refresh');
			}
			$from = $this->session->userdata('from');
			$to = $this->session->userdata('to');
			$tanggal = $this->session->userdata('tanggal');
			$kursi = $this->session->userdata('kursi');
		}else {
			$from = $this->input->post('from');
			$to = $this->input->post('to');
			$tanggal = $this->input->post('date');
			$kursi = $this->input->post('kursi-dewasa');
			$this->session->set_userdata(array('tanggal'=>$tanggal, 'kursi' => $kursi, 'from' => $from, 'to' => $to));
		}

		$this->db->select("*, DATE_FORMAT(jam_berangkat, '%H:%i') brgkt, DATE_FORMAT(jam_sampai, '%H:%i') dtg, pesawat.nama pesawat, pesawat.jumlah_kursi jml_kursi");
		$this->db->from('rute');
		$this->db->where('rute.asal_bandara', $from);
		$this->db->where('rute.tujuan_bandara', $to);
		$this->db->join('pesawat', 'pesawat.id = rute.id_pesawat');
		$data['rute'] = $this->db->get();
		if ($data['rute']->num_rows() > 0) {
			$i = 0;
			foreach ($data['rute']->result() as $value) {
				$where = array(
					'id_rute' => $data['rute']->result()[0]->id,
					'tanggal' => $tanggal
				);
				$idPemesan = $this->db->get_where('pemesan', $where);
				$count = 0;
				if ($idPemesan->num_rows() > 0) {
					foreach ($idPemesan->result() as $value) {
						$count = $count + $this->db->get_where('pemesanan', array('id_pemesan', $value->id))->num_rows();
					}	
				}
				$data['reserved'][$i] = $count;
				$i++;
			}
		}
		$this->load->view('template/header');
		$this->load->view('booking/index', $data);
		$this->load->view('template/footer');
	}

	public function data()
	{
		if ($this->session->userdata('kursi') < 1) {
			redirect(base_url(),'refresh');
		}
		$id_rute =  $this->input->post('id-rute');
		$id_pesawat =  $this->input->post('id-pesawat');
		$harga =  $this->input->post('harga');
		$this->session->set_userdata(array('id_rute'=>$id_rute, 'id_pesawat' => $id_pesawat, 'harga' => $harga));
		$this->load->view('template/header');
		$this->load->view('booking/data');
		$this->load->view('template/footer');
	}

	public function konfirmasi(){
		$data['nama_penumpang'] = $this->input->post('nama_penumpang');
		$data['id_penumpang'] = $this->input->post('id');
		$data['id_seat'] = $this->input->post('seat');

		$data['pesawat'] = $this->db->get_where('pesawat', array('id' => $this->session->userdata('id_pesawat')))->result();
		$query = "SELECT *, DATE_FORMAT(jam_berangkat, '%H:%i') brgkt, DATE_FORMAT(jam_sampai, '%H:%i') dtg FROM rute WHERE id = ".$this->session->userdata('id_rute');
		$data['rute'] = $this->db->query($query)->result();
		foreach ($data['rute'] as $value) {
			$data['asal'] = $this->db->get_where('bandara', array('id' => $value->asal_bandara))->result();
			$data['tujuan'] = $this->db->get_where('bandara', array('id' => $value->tujuan_bandara))->result();
		}

		$this->load->view('template/header');
		$this->load->view('booking/konfirmasi', $data);
		$this->load->view('template/footer');	
	}

	public function seat()
	{
		if ($this->input->post('nama-penumpang') == null) {
			redirect(base_url(),'refresh');
		}
		$data['nama_penumpang'] = $this->input->post('nama-penumpang');
		$data['id_penumpang'] = $this->input->post('id');

		$nama_pemesan = $this->input->post('nama-pemesan');
		$telepon = $this->input->post('telepon');
		$alamat = $this->input->post('alamat');

		$this->session->set_userdata(array('nama_pemesan' => $nama_pemesan, 'telepon_pemesan' => $telepon, 'alamat_pemesan' => $alamat));

		$pesawat = $this->db->get_where('pesawat',array('id' => $this->session->userdata('id_pesawat')))->result();
		foreach ($pesawat as $val) {
			$data['jml_seat'] = $val->jumlah_kursi;
		}
		$where = array(
			'id_rute' => $this->session->userdata('id_rute'),
			'tanggal' => $this->session->userdata('tanggal')
		);
		$data['reserved'] = $this->db->get_where('pemesan',$where);
		if ($data['reserved']->num_rows() > 0) {
			$i = 0;
			foreach ($data['reserved']->result() as $value) {
				$this->db->from('pemesanan');
				$this->db->where('id_pemesan', $value->id);
				$pemesan = $this->db->get();
				if ($pemesan->num_rows() > 0 ) {
					foreach ($pemesan->result() as $v) {
						$data['booked_seat'][$i] = $v->no_kursi;
						$i++;
					}
				}
			}
		} else{
			$data['booked_seat'][0]= '';
		}
		$this->load->view('template/header');
		$this->load->view('booking/seat', $data);
		$this->load->view('template/footer');
	}

	public function sukses(){
		if ($this->input->post('nama_penumpang') == null) {
			redirect(base_url(),'refresh');
		}
		if ($this->session->userdata('kursi') < 1 ) {
			redirect(base_url(),'refresh');
		}
		$nama_penumpang = $this->input->post('nama_penumpang');
		$id_penumpang = $this->input->post('id_penumpang');
		$id_seat = $this->input->post('seat_penumpang');
		$id_pemesan = $this->db->get('pemesan')->num_rows() + 1;
		$kode = random_string('alnum', 9);
		$harga = $this->session->userdata('harga') * $this->session->userdata('kursi');
		$data = array(
			'id' => $id_pemesan,
			'kode' => $kode,
			'nama' => $this->session->userdata('nama_pemesan'),
			'alamat' => $this->session->userdata('alamat_pemesan'),
			'telepon' => $this->session->userdata('telepon_pemesan'),
			'id_rute' => $this->session->userdata('id_rute'),
			'tanggal' => $this->session->userdata('tanggal'),
			'harga' => $harga
		);
		$this->db->insert('pemesan', $data);
		for ($i=0; $i < $this->session->userdata('kursi'); $i++) { 
			$data = array(
				'nama' => $nama_penumpang[$i],
				'no_identitas' => $id_penumpang[$i],
				'id_pemesan' => $id_pemesan,
				'no_kursi' => $id_seat[$i]
			);
			$this->db->insert('pemesanan', $data);
		}

		$data['kode'] = $kode;
		$data['harga'] = $harga;
		$this->unset_data_pesan();

		$this->load->view('template/header');
		$this->load->view('booking/sukses', $data);
		$this->load->view('template/footer');	
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
?>