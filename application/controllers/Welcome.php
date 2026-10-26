<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function biodata()
	{
		$this->load->view('biodata_saya');
	}

	public function sukses()
	{
		$this->load->view('sukses');
	}
}
