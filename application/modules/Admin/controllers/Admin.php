<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->module('Template');
		$this->load->helper('url');
		$this->load->model('Admin_m');
	}

	function index()
	{
		$data['nav']='Admin/admin_nav_v';
		$data['sidebar']='Admin/admin_sidebar_v';
		$data['content']='Admin/content_v';
		$data['menu']=null;
		$data['menu2']=null;
		$data['menu3']=null;
		$this->template->call_admin_template($data);
		$this->cek_login();
	}

	function cek_login()
	{
		if(!$this->session->userdata('admin'))
		{
			redirect(base_url());
		}
	}

	function kategori()
	{
		$data['nav']='Admin/admin_nav_v';
		$data['sidebar']='Admin/admin_sidebar_v';
		$data['content']='Admin/admin_kategori_v';
		$data['data']=$this->Admin_m->get_all_kategori();
		$data['menu']="Kategori";
		$data['menu2']=null;
		$data['menu3']=null;
		$this->template->call_admin_template($data);
		$this->cek_login();
	}

	function tambah_kategori()
	{
		$data['data']=$this->Admin_m->get_nomor_kategori();
		$data['nav']='Admin/admin_nav_v';
		$data['sidebar']='Admin/admin_sidebar_v';
		$data['content']='Admin/admin_addkategori_v';
		$data['menu']="Kategori";
		$data['menu2']="Tambah Kategori";
		$data['menu3']=null;
		$this->template->call_admin_template($data);
		$this->cek_login();	
	}

	function add_kategori()
	{
		$data=$this->Admin_m->get_detail_kategori($this->input->post('n_kat'));
		if ($this->input->post('nomor')!=$data['nomor'])
		{
			if ($this->input->post('n_kat')!=$data['n_kat'])
			{
				$this->Admin_m->add_kategori();
				$this->session->set_flashdata('alert', '<div class="alert alert-success">Berhasil menambahkan kategori</div>');
				redirect('admin/kategori');	
			}
			else
			{
				$this->session->set_flashdata('alert', '<div class="alert alert-warning">Nama Kategori sudah ada</div>');
				redirect('admin/tambah_kategori');
			}

		}
		else
		{
			$this->session->set_flashdata('alert', '<div class="alert alert-warning">Nomor Kategori sudah ada</div>');
			redirect('admin/tambah_kategori');
		}

	}

	function delete_kategori($id)
	{
		$this->Admin_m->delete_kategori($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success">Data berhasil dihapus</div>');
		redirect('admin/kategori');
	}

	function create_kategori()
	{
		$data=$this->Admin_m->get_kategori();
		$options="";
		foreach ($data as $row) 
		{
			$options .="<option id='number' value='{$row['id_kat']}'>{$row['n_kat']}</option>";
		}
		return $options;
	}

	function edit_kategori($id)
	{
		$data['data']=$this->Admin_m->get_update_kategori($id);
		$data['nav']='Admin/admin_nav_v';
		$data['sidebar']='Admin/admin_sidebar_v';
		$data['content']='Admin/admin_editkategori_v';
		$data['menu']="Kategori";
		$data['menu2']="Edit Kategori";
		$data['menu3']=null;
		$this->template->call_admin_template($data);
		$this->cek_login();	
	}

	function update_kategori($id)
	{
		$data=$this->Admin_m->get_detail_kategori($this->input->post('n_kat'));
		if ($this->input->post('n_kat')!=$data['n_kat'])
		{
			$this->Admin_m->update_kategori($id);
			$this->session->set_flashdata('alert', '<div class="alert alert-success">kategori berhasil diedit</div>');
			redirect('admin/kategori');	
		}
		else
		{
			$this->session->set_flashdata('alert', '<div class="alert alert-warning">Nama Kategori sama atau sudah ada</div>');
			redirect('admin/edit_kategori/'.$id);
		}
	}

	function nama_doa($id)
	{
		$data['nav']='Admin/admin_nav_v';
		$data['sidebar']='Admin/admin_sidebar_v';
		$data['content']='Admin/admin_namadoa_v';
		$data['data']=$this->Admin_m->get_all_item($id);
		$datauser=array(
						'id_item'=>$id
					);
		$this->session->set_userdata($datauser);
		$data['menu']="Kategori";
		$data['menu2']="Nama Do'a";
		$data['menu3']=null;
		$this->template->call_admin_template($data);
		$this->cek_login();	
	}

	function tambah_nama_doa()
	{
		$data['data']=$this->create_kategori();
		$data['nav']='Admin/admin_nav_v';
		$data['sidebar']='Admin/admin_sidebar_v';
		$data['content']='Admin/admin_addnamadoa_v';
		$data['menu']="Kategori";
		$data['menu2']="Tambah Nama Do'a";
		$data['menu3']=null;
		$this->template->call_admin_template($data);
		$this->cek_login();	
	}

	function add_item()
	{
		$data=$this->Admin_m->get_detail_item($this->input->post('id_kat'));
		if ($this->input->post('nomor')!=$data['nomor']) 
		{
			if ($this->input->post('n_item')!=$data['n_item']) 
			{
				if ($this->input->post('id_kat')!=null) 
				{
					$this->Admin_m->add_item();
					$this->session->set_flashdata('alert', '<div class="alert alert-success">Berhasil menambahkan nama Doa</div>');
					redirect('admin/kategori');	
				}
				else
				{
					$this->session->set_flashdata('alert', '<div class="alert alert-warning">Silahkan pilih Kategori</div>');
					redirect('admin/tambah_nama_doa');
				}
				
			}
			else
			{
				$this->session->set_flashdata('alert', '<div class="alert alert-warning">Nama Doa tersebut sudah ada</div>');
				redirect('admin/tambah_nama_doa');
			}
		}
		else
		{
			$this->session->set_flashdata('alert', '<div class="alert alert-warning">Nomor tersebut sudah ada</div>');
			redirect('admin/tambah_nama_doa');
		}
	}

	function create_namadoa()
	{
		$data=$this->Admin_m->get_item($this->session->userdata('id_item'));
		$options="";
		foreach ($data as $row) 
		{
			$options .="<option id='number' value='{$row['id_item']}'>{$row['n_item']}</option>";
		}
		return $options;
	}

	function edit_namadoa($id)
	{
		$data['data']=$this->Admin_m->get_update_item($id);
		$data['nav']='Admin/admin_nav_v';
		$data['sidebar']='Admin/admin_sidebar_v';
		$data['content']='Admin/admin_editnamadoa_v';
		$data['menu']="Kategori";
		$data['menu2']="Edit Nama Do'a";
		$data['menu3']=null;
		$this->template->call_admin_template($data);
		$this->cek_login();	
	}

	function update_namadoa($id)
	{
		$data=$this->Admin_m->get_update_item($id);
		if ($this->input->post('n_item')!=$data['n_item'])
		{
			$this->Admin_m->update_namadoa($id);
			$this->session->set_flashdata('alert', '<div class="alert alert-success">Nama Doa berhasil diedit</div>');
			redirect('admin/kategori');	
		}
		else
		{
			$this->session->set_flashdata('alert', '<div class="alert alert-warning">Nama Doa sama</div>');
			redirect('admin/edit_namadoa/'.$id);
		}
	}

	function doa($id)
	{
		$data['nav']='Admin/admin_nav_v';
		$data['sidebar']='Admin/admin_sidebar_v';
		$data['content']='Admin/admin_doa_v';
		$data['data']=$this->Admin_m->get_all_doa($id);
		$data['menu']="Kategori";
		$data['menu2']="Nama Do'a";
		$data['menu3']="Do'a";
		$this->template->call_admin_template($data);
		$this->cek_login();	
	}

	function tambah_doa()
	{
		$data['data']=$this->create_namadoa();
		$data['nav']='Admin/admin_nav_v';
		$data['sidebar']='Admin/admin_sidebar_v';
		$data['content']='Admin/admin_adddoa_v';
		$data['menu']="Kategori";
		$data['menu2']="Tambah Do'a";
		$data['menu3']=null;
		$this->template->call_admin_template($data);
		$this->cek_login();	
	}

	function add_doa()
	{
		$data=$this->Admin_m->get_detail_doa($this->input->post('id_item'));
		if ($this->input->post('nomor')!=$data['nomor']) 
		{
			if ($this->input->post('id_item')!=null) 
			{
				$this->Admin_m->add_doa();
				$this->session->set_flashdata('alert', '<div class="alert alert-success">Berhasil menambahkan Doa</div>');
				redirect('admin/kategori');
			}
			else
			{
				$this->session->set_flashdata('alert', '<div class="alert alert-warning">Silahkan Pilih Nama Doa</div>');
				redirect('admin/tambah_doa');
			}
			
		}
		else
		{
			$this->session->set_flashdata('alert', '<div class="alert alert-warning">Nomor tersebut sudah ada</div>');
			redirect('admin/tambah_doa');
		}
	}

	function edit_doa($id)
	{
		$data['data']=$this->Admin_m->get_update_doa($id);
		$data['nav']='Admin/admin_nav_v';
		$data['sidebar']='Admin/admin_sidebar_v';
		$data['content']='Admin/admin_editdoa_v';
		$data['menu']="Kategori";
		$data['menu2']="Edit Do'a";
		$data['menu3']=null;
		$this->template->call_admin_template($data);
		$this->cek_login();	
	}

	function update_doa($id)
	{
		$this->Admin_m->update_doa($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success">Doa berhasil diedit</div>');
		redirect('admin/kategori');
	}

	function kontributor()
	{
		$data['nav']='Admin/admin_nav_v';
		$data['sidebar']='Admin/admin_sidebar_v';
		$data['content']='Admin/admin_kontributor_v';
		$data['data']=$this->Admin_m->get_all_kontributor();
		$data['menu']="Kontributor";
		$data['menu2']=null;
		$data['menu3']=null;
		$this->template->call_admin_template($data);
		$this->cek_login();
	}

	function delete_doa($id)
	{
		$this->Admin_m->delete_doa($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success">Doa berhasil dihapus</div>');
		redirect('admin/kategori');
	}

	function delete_namadoa($id)
	{
		$this->Admin_m->delete_namadoa($id);
		$this->session->set_flashdata('alert', '<div class="alert alert-success">Nama Doa berhasil dihapus</div>');
		redirect('admin/kategori');
	}

	function tambah_kontributor()
	{
		$data['nav']='Admin/admin_nav_v';
		$data['sidebar']='Admin/admin_sidebar_v';
		$data['content']='Admin/admin_addkontributor_v';
		$data['menu']="Kontributor";
		$data['menu2']="Tambah Kontributor";
		$data['menu3']=null;
		$this->template->call_admin_template($data);
		$this->cek_login();	
	}

	function add_kontributor()
	{
		$data=$this->Admin_m->get_username_kontributor($this->input->post('username'));
		if ($this->input->post('username')!=$data['username']) 
		{
			$this->Admin_m->add_kontributor();
			$this->session->set_flashdata('alert', '<div class="alert alert-success">Berhasil menambahkan kontributor</div>');
			redirect('admin/kontributor');
		}
		else
		{
			$this->session->set_flashdata('alert', '<div class="alert alert-warning">username tersebut sudah ada</div>');
			redirect('admin/tambah_kontributor');
		}
	}

	function log()
	{
		$data['nav']='Admin/admin_nav_v';
		$data['sidebar']='Admin/admin_sidebar_v';
		$data['content']='Admin/admin_log_v';
		$data['data']=$this->Admin_m->get_all_log();
		$data['menu']="Log";
		$data['menu2']=null;
		$data['menu3']=null;
		$this->template->call_admin_template($data);
		$this->cek_login();
	}
}