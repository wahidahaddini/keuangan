<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
		{
			parent::__construct();
			$this->title = $this->common_lib->getTitle();
			if($this->session->userdata("status") != "login")
			{
				redirect(base_url()."login");
			}
			$this->load->library('form_validation');
    }
    
    public function index()
    {
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."user/input_user",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah User"
		);
		$card['title'] = "Pengaturan Akun <span>> List akun</span>";
		$data['users'] = $this->db->get('users')->result();
		//$data['users'] = $this->db->select('*')
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('user/list-user', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
    
    public function input_user()
    {
		$this->form_validation->set_rules('bidang_id', 'bidang', 'required|trim');
		$this->form_validation->set_rules('username', 'username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('aktif', 'Aktif', 'required|trim');
		//$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');
		
		$menu = array(
			"title" => $this->title,
			"btnFa" => "keyboard",
			"btnHref" => base_url()."User/index",
			"btnBg" => "success",
			"btnText" => "List User"
		);
		
		if($this->form_validation->run() == false) {
			$card['title'] = "Input User <span>> Input user</span>";
			$this->load->view('common/menu', $menu);
			$this->load->view('common/card', $card);
			$this->load->view('user/input-user');
			$this->load->view('common/slash-card');
			$this->load->view('common/footer');
		}else {
		$bidang = $this->input->post('bidang_id');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$aktif = $this->input->post('aktif');

		$data = array(
			'bidang_id' => $bidang,
			'username' => $username,
			'password' => md5($password), 
			'aktif' => $aktif
		);
		$this->common->insert('users', $data);
		redirect('User/index');
	}	
		
}
	public function edit($id){

		$menu = array(
            "title" => "Siriang | Dashboard",
        );
		
		$where = array('user_id' => $id);
		$data['users'] = $this->common->ambil_where($where, 'users')->result();
		
			$card['title'] = "Edit <span>> Edit Akun</span>";
	        $this->load->view('common/menu', $menu);
	        $this->load->view('common/card', $card);
			$this->load->view('user/edit-user', $data);
			$this->load->view('common/slash-card');
	        $this->load->view('common/footer');
		}	

	// public function update($id)
	// {

	// 	$filter = array("user_id" => $this->input->post("user_id"));

	// 	$data = array(
	// 		'bidang_id'   => $bidang,
	// 		'username' => $username,
	// 		'password' => $password,
	// 		'aktif' => $aktif	
	// 	);
	// 	if($this->form_validation->run() == false){
	// 	$username = $this->input->post('username');
	// 	$object = array('username' => $username  , 'password' => $password);
	// 	$where = array('user_id' => $id);
	// 	$this->db->update('users',$object,$where);
	// 	redirect('User/index');
	// 	}	
	// }

	public function tambah(){

		$bidang = $this->input->post('bidang_id');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$aktif = $this->input->post('aktif');
		$cek = $this->db->get_where('users', array('username' => $username))->result();
		if (count($cek) > 0) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" rol="alert"> Username telah terpakai!</div>');
			redirect('User/input_user');
		}else{
			$data = array(
			'bidang_id' => $bidang,
			'username' => $username,
			'password' => md5($password),
			'aktif' => $aktif	
		);
		$this->common->insert('users', $data);
		$this->session->set_flashdata('msg', '<div class="alert alert-success" rol="alert"> Input Berhasil!</div>');
		redirect('User/index');
		}
		
	}
	function hapus ($id){
		$where = array('user_id' => $id);
		$this->db->delete('users', $where);
		//$this->common->delete('users' $where);
		redirect('user/index');
	}
	public function update($id)
    {
    	// $password = md5($this->input->post('password'));
    	// $object = array('password' => $password);
    	// $cek = $this->db->get_where('users',$object)->result();
     //    if(count($cek) > 0)
     //    {    
     //        $data_session = array(
     //            'password' => $cek[0]->password,
     //        );
    	if ($this->input->post('password1') == '') {
    		$o = array('username' => $this->input->post('username'));
    		$ins = $this->db->update('users', $o,array('user_id' => $id));
    	}else{
    		$o = array('username' => $this->input->post('username'),'password' => $this->input->post('password1'));
    		$ins = $this->db->update('users', $o,array('user_id' => $id));
    	}
    	if ($ins) {
    		$this->session->set_flashdata('msg', '<div class="alert alert-success" rol="alert"> Update Berhasil!</div>');
    		redirect('User/index'); 
    	}
		
	}
}