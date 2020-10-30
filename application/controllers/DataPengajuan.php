<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPengajuan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
		if ($this->session->userdata('status') != 'login'){
			redirect('Login/index');
		}
	}

	public function index()
	{
		$menu = array(
            "title" => $this->title,
            "btnBg" => "success",
            "btnFa" => "keyboard"
        );

        $card['title'] = "Data Pengajuan <span>> Lihat Pengajuan</span>";
        $data['bidang']   = $this->db->get('ref_bidang')->result();
        $this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
        $this->load->view('data_pengajuan/data-pengajuan', $data);
        $this->load->view('common/slash-card');
        $this->load->view('common/footer');
	}

}

/* End of file DataPengajuan.php */
/* Location: ./application/controllers/DataPengajuan.php */