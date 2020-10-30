<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Panjar extends CI_Controller {
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
			"btnBg" => "success",
			"btnFa" => "keyboard"	
		);
		$card['title'] = "Panjar <span>> Input Panjar</span>";
		$data['bidang'] = $this->db->get('ref_bidang')->result();
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('panjar/input-panjar', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}

    public function tambah()//masuk ke db panjar
    {
		$id = date("Ymdhis").$this->input->post('bidang_id');
		$objek = array(
			'panjar_id' => $id,
			'tanggal_panjar' =>date("Y-m-d"),
			'jam_panjar' =>date("h:i:s"),
			'bidang_id' => $this->input->post('bidang_id'),
			'kegiatan_id' =>$this->input->post('kegiatan_id'),
			'nominal' =>$this->input->post('nominal'),
			'status_lunas' =>'N');
		$this->common->insert('panjar', $objek);
        redirect('Panjar/berhasil/'.$id);
    }
    public function berhasil($id)
    {
		$menu = array(
			"title" => $this->title,
			// "btnBg" => "success",
			"btnFa" => "keyboard"
		);
		$data['kode'] = $id;
		$card['title'] = "Panjar <span>> Kode Panjar</span>";
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('panjar/berhasil', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
    }
	
	public function getkegiatan()
    {
    	$bidang_id = $_POST['bidang_id'];
    	if ($bidang_id == '') {
    	}else{
    		$query = $this->db->query("SELECT * FROM ref_kegiatan WHERE bidang_id = '$bidang_id' ORDER BY kegiatan_id ASC")->result();
    		foreach ($query as $q) {
    			echo '<option value="'.$q->kegiatan_id.'">'.$q->nama_kegiatan.'</option>';
			}
		}
	}
}