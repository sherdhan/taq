<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontributor_m extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	function add_log($doa_sebelum)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data=array(
			'id_kontributor'=>$this->session->userdata('kontributor'),
			'kategori'=>$this->session->userdata('n_kat'),
			'nama_doa'=>$this->session->userdata('n_item'),
			'doa_sebelum'=>$doa_sebelum,
			'doa_sesudah'=>$this->input->post('doa'),
			'waktu'=>date('Y-m-d H:i:s')
		);

		$this->db->insert('log', $data);
		return $this->db->insert_id();
	}

	function get_n_kategori($id)
	{
		$query=$this->db->get_where('kategori', array('id_kat'=>$id));
		return $query->row_array();
	}

	function get_n_item($id)
	{
		$query=$this->db->get_where('item', array('id_item'=>$id));
		return $query->row_array();
	}

	function get_detail_doa($id)
	{
		$query=$this->db->get_where('doa', array('id_doa'=>$id));
		return $query->row_array();
	}	
}