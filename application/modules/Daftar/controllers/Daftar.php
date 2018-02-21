<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends MX_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Daftar_m');
	}

	function index()
	{
		$this->load->view('daftar_v');
	}

}