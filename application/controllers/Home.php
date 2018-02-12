<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->db->order_by('nama','ASC');
		$data['bandara'] = $this->db->get('bandara')->result_array();
		$this->load->view('home', $data);
	}

	public function book_one(){
		$from = $this->input->post('from');
		$to = $this->input->post('to');
		$date = $this->input->post('date');
		$where = array(
			'asal_bandara' => $from,
			'tujuan_bandara' => $to
		);
		$this->db->order_by('id_pesawat','ASC');
		$data['rute'] = $this->db->get_where('rute',$where)->result_array();
		$i = 0;
		foreach ($data['rute'] as $key => $value) {
			$pesawat = $this->db->get_where('pesawat', array('id' => $key['id_pesawat']))->result();
			$data['pesawat'][$i] = $pesawat;
			$i++;
		}

		$this->load->view('search_flights', $data);
	}
}
