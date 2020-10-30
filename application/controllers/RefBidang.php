<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class RefBidang extends CI_Controller {
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
			"btnHref" => base_url()."RefBidang/input_ref",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Bidang"
		);
		$card['title'] = "Ref Bidang <span>> List Ref Bidang</span>";
		$data['bidang'] = $this->db->get('ref_bidang')->result();
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('ref_bidang/list-bidang', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
}
    public function input_ref()
    {	
		$menu = array(
			"title" => $this->title,
			"btnFa" => "keyboard",
			"btnHref" => base_url()."RefBidang/index",
			"btnBg" => "success",
			"btnText" => "List Bidang"
		);

			$card['title'] = "Input Ref Bidang <span>> Input Ref Bidang</span>";
			$this->load->view('common/menu', $menu);
			$this->load->view('common/card', $card);
			$this->load->view('ref_bidang/input-ref');
			$this->load->view('common/slash-card');
			$this->load->view('common/footer');
 
	}
	public function tambah()
	{
		$bidang = $this->input->post('bidang_id');
		$nama = $this->input->post('nama_bidang');
		$cek = $this->db->get_where('ref_bidang', array('bidang_id' => $bidang))->result();

		if (count($cek) > 0) {
				$this->load->view("common/alert",["alert" => "success", "msg" => $this->session->flashdata('success')]);
				redirect('RefBidang/index');
		}else{
			$object = array('nama_bidang' => $this->input->post('nama_bidang'),
						'bidang_id' => $this->input->post('bidang_id'));
			$ins = $this->db->insert('ref_bidang', $object);
			if ($ins) {
				$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
				redirect('RefBidang/index');
			}else{
				$this->session->set_flashdata('success', '
				<div class="alert alert-danger">
					<b>Gagal</b> Data gagal ditambahkan
				</div>
				');
				redirect('RefBidang/index');
			}
		}
	}

	public function edit($id){

		$menu = array(
			"title" => $this->title,
			"btnFa" => "keyboard",
			"btnHref" => base_url()."RefBidang/index",
			"btnBg" => "success",
			"btnText" => "List Bidang"
		);
		
		$where = array('bidang_id' => $id);
		$data['ref_bidang'] = $this->common->ambil_where($where, 'ref_bidang')->result();
		
			$card['title'] = "Edit <span>> Edit Bidang</span>";
	        $this->load->view('common/menu', $menu);
	        $this->load->view('common/card', $card);
			$this->load->view('ref_bidang/edit-bidang', $data);
			$this->load->view('common/slash-card');
	        $this->load->view('common/footer');
		}	
		//update data
	public function update($id)
    {
	$filter = array("nama_bidang" => $this->input->post("nama_bidang"));
	$upd = $this->db->update("ref_bidang", $filter, array("bidang_id" => $id));
		if ($upd) {
			$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
			redirect('RefBidang','index');
		}else{
			$this->session->set_flashdata('success', 'Data gagal diupdate');
			redirect('RefBidang/index');
		}
	}

	function hapus ($id){
		$where = array('bidang_id' => $id);
		$this->common->hapus($where, 'ref_bidang');
		//$this->common->delete('users' $where);
		// print_r($id);exit();
		redirect('RefBidang/index');
	}
}