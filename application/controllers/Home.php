<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
		if ($this->session->userdata('status') != 'login') 
		{
			redirect('Login/index');
		}
	}
	public function index()
	{
		$page = array(
            "title" => "Siriang | Dashboard",
        );

		$this->load->view("common/menu", $page);
		$this->load->view("dashboard");
		$this->load->view("common/footer");
	}

}