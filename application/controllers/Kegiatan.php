<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
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
			"btnHref" => base_url()."kegiatan/input_kegiatan",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Kegiatan Bidang"
		);
		$card['title'] = "Kegiatan Bidang <span>> List Kegiatan Bidang</span>";
		$data['ref_kegiatan'] = $this->db->get('ref_kegiatan')->result();
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('kegiatan/list-kegiatan', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}

	public function input_kegiatan()
	{
		$this->form_validation->set_rules('kegiatan_id', 'Kegiatan', 'required|trim');
		$this->form_validation->set_rules('bidang_id', 'Bidang', 'required|trim');
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required|trim');
		//$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');
		
		$menu = array(
			"title" => $this->title,
			"btnFa" => "keyboard",
			"btnHref" => base_url()."Kegiatan/index",
			"btnBg" => "success",
			"btnText" => "List Kegiatan"
		);
		
		if($this->form_validation->run() == false) {
			$card['title'] = "Input Kegiatan Bidang <span>> Input Kegiatan Bidang</span>";
			$this->load->view('common/menu', $menu);
			$this->load->view('common/card', $card);
			$this->load->view('kegiatan/input-kegiatan');
			$this->load->view('common/slash-card');
			$this->load->view('common/footer');
		}else {
		$kegiatan = $this->input->post('kegiatan_id');
		$bidang = $this->input->post('bidang_id');
		$nama_kegiatan = $this->input->post('nama_kegiatan');

		$data = array(
			'kegiatan' => $kegiatan,
			'bidang' => $bidang_id,
			'nama_kegiatan' => $nama_kegiatan
		);
		$this->common->insert('kegiatan_id', $data);
		redirect('Kegiatan/index');
	}
}

    public function tambah()
    {
		$kegiatan = $this->input->post('kegiatan_id');
		$bidang = $this->input->post('bidang_id');
		$nama_kegiatan = $this->input->post('nama_kegiatan');
		$cek = $this->db->get_where('ref_kegiatan', array('kegiatan_id' => $kegiatan))->result();
		if (count($cek) > 0) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" rol="alert"> Username telah terpakai!</div>');
			redirect('Kegiatan/input_user');
		}else{
			$data = array(
			'kegiatan_id' => $kegiatan,
			'bidang_id' => $bidang,
			'nama_kegiatan' => $nama_kegiatan
		);
		$this->common->insert('ref_kegiatan', $data);
		$this->session->set_flashdata('msg', '<div class="alert alert-success" rol="alert"> Input Berhasil!</div>');
		redirect('Kegiatan/index');
		}
    }
    function hapus ($id){
        $where = array('kegiatan_id' => $id);
        $this->db->delete('kegiatan_id', $where);
        //$this->common->delete($kode_rekening, $id);
        redirect('Kegiatan/index');
    }
}