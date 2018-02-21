<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_all_item($id)
	{
		// $this->db->order_by('nomor', 'asc');
		// $query=$this->db->get_where('item', array('id_kat'=>$id));
		// return $query->result_array();
		$sql="SELECT count(item.id_item) AS jumlah,n_item,doa.id_item, item.nomor FROM item,doa WHERE item.id_item=doa.id_item AND item.id_kat=".$id." GROUP BY item.id_item ORDER BY nomor ASC";
		$query=$this->db->query($sql);
		return $query->result_array();	
	}

	function get_detail_item($id)
	{
		$query=$this->db->get_where('item', array('id_kat'=>$id));
		return $query->row_array();
	}

	function get_update_item($id)
	{
		$query=$this->db->get_where('item', array('id_item'=>$id));
		return $query->row_array();
	}

	function get_all_doa($id)
	{
		$this->db->order_by('nomor', 'asc');
		$query=$this->db->get_where('doa', array('id_item'=>$id));
		return $query->result_array();
	}

	function get_detail_doa($id)
	{
		$query=$this->db->get_where('doa', array('id_item'=>$id));
		return $query->row_array();
	}

	function get_update_doa($id)
	{
		$query=$this->db->get_where('doa', array('id_doa'=>$id));
		return $query->row_array();
	}

	function get_all_kategori()
	{
		$sql="SELECT count(kategori.id_kat) as jumlah,n_kat,kategori.id_kat FROM kategori,item WHERE kategori.id_kat=item.id_kat GROUP BY kategori.id_kat";
		$query=$this->db->query($sql);
		return $query->result_array();
	}

	function get_detail_kategori($kat)
	{
		$query=$this->db->get_where('kategori', array('n_kat'=>$kat));
		return $query->row_array();
	}

	function get_update_kategori($id)
	{
		$query=$this->db->get_where('kategori', array('id_kat'=>$id));
		return $query->row_array();
	}

	function get_kategori()
	{
		$this->db->order_by('nomor', 'asc');
		$query=$this->db->get('kategori');
		return $query->result_array();
	}

	function get_item($id)
	{
		$this->db->order_by('nomor', 'asc');
		$query=$this->db->get_where('item', array('id_kat'=>$id));
		return $query->result_array();
	}

	// function get_sidebar()
	// {
	// 	foreach ($this->get_all_kategori() as $row ) 
	// 	{
	// 		echo '<li class="nav-item nav-dropdown"><a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-list-ul"></i>'.$row['n_kat'].'</a>';
 //            foreach ($this->get_detail_item($row['id_kat']) as $row) 
 //            {
 //            	echo '<ul class="nav-dropdown-items">
 //              <li class="nav-item">
 //                <a class="nav-link" href="#"><i class="fa fa-book"></i>'.$row['nomor'].'. '.$row['n_item'].'</a>
 //              </li></ul>';
 //            }
 //            echo '</li>';
	// 	}
	// }

	function get_nomor_kategori()
	{
		$sql="SELECT max(nomor) AS number FROM kategori";
		$query=$this->db->query($sql);
		return $query->row_array();
	}

	function add_kategori()
	{
		$this->db->insert('kategori', $this->input->post());
		return $this->db->insert_id();
	}

	function add_item()
	{
		$this->db->insert('item', $this->input->post());
		return $this->db->insert_id();
	}

	function delete_kategori($id)
	{
		return $this->db->delete('kategori', array('id_kat'=>$id));
	}

	function add_doa()
	{
		$this->db->insert('doa', $this->input->post());
		return $this->db->insert_id();
	}

	function update_kategori($id)
	{
		$data=array(
			'nomor'=>$this->input->post('nomor'),
			'n_kat'=>$this->input->post('n_kat')
		);

		$this->db->where('id_kat', $id);
		return $this->db->update('kategori', $data);
	}

	function update_namadoa($id)
	{
		$data=array(
			'n_item'=>$this->input->post('n_item')
		);

		$this->db->where('id_item', $id);
		return $this->db->update('item', $data);
	}

	function update_doa($id)
	{
		$data=array(
			'nomor'=>$this->input->post('nomor'),
			'doa'=>$this->input->post('doa'),
			'arti'=>$this->input->post('arti'),
			'indo'=>$this->input->post('indo'),
			'kali'=>$this->input->post('kali'),
			'sumber'=>$this->input->post('sumber')
		);

		$this->db->where('id_doa', $id);
		return $this->db->update('doa', $data);
	}

	function delete_doa($id)
	{
		return $this->db->delete('doa', array('id_doa'=>$id));
	}

	function delete_namadoa($id)
	{
		return $this->db->delete('item', array('id_item'=>$id));
	}

	function add_kontributor()
	{
		$data=array(
			'username'=>$this->input->post('username'),
			'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT, ['cost'=>10]),
			'email'=>$this->input->post('email'),
			'fullname'=>$this->input->post('fullname'),
			'alamat'=>$this->input->post('alamat')
		);

		$this->db->insert('kontributor', $data);
		return $this->db->insert_id();
	}

	function get_all_kontributor()
	{
		$query=$this->db->get('kontributor');
		return $query->result_array();
	}

	function get_username_kontributor($username)
	{
		$query=$this->db->get_where('kontributor', array('username'=>$username));
		return $query->row_array();
	}

	function get_all_log()
	{
		$query=$this->db->get('log');
		return $query->result_array();
	}
}