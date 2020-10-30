<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->title = $this->common_lib->getTitle();
        if ($this->session->userdata('status') != 'login') {
			redirect('Login/index');
		}else{
			if ($this->session->userdata('bidang_id') == '1') {
				redirect('Home/index');
			}
        }
        $this->load->model('m_rekening');
    }

    public function index()
    {
        $menu = array(
            "title" => $this->title,
            "btnBg" => "success",
            "btnFa" => "keyboard"
        );
        $card['title']    = "Pengajuan Baru <span>> Input Pengajuan Baru</span>";
        $data['kegiatan'] = $this->db->get_where('ref_kegiatan', array('bidang_id' => $this->session->userdata('bidang_id')))->result();
        $data['gu']       = $this->db->get('gu_panjar')->result();
		$data['bidang']   = $this->db->get('ref_bidang')->result();
		$data['panjar']   = $this->db->get_where('panjar',array('bidang_id' => $this->session->userdata('bidang_id'),'status_lunas' => 'N'))->result();
        $this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
        $this->load->view('pengajuan/input-pengajuan', $data);
        $this->load->view('common/slash-card');
        $this->load->view('common/footer');
    }

    public function rekening()
	{
		if (isset($_GET['term'])) {
            $result = $this->m_rekening->search($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->kode_rekening.'-'.$row->nama_rekening;
                echo json_encode($arr_result);
            }
        } 
	}

    public function tambah()
    {
        $rek = explode('-', $this->input->post('kode_rekening'));
        $id = date("Ymdhis").$this->input->post('bidang_id');
        $objek = array(
            'pengajuan_id' => $id,
            'tanggal' =>date('Y-m-d'),
            'jam' => date('h:i:s'),
            'gu_panjar' => $this->input->post('bidang_id'),
            'panjar_id' => $this->input->post('panjar_id'),
            'kegiatan_id' => $this->input->post('kegiatan_id'),
            'user_id' => $this->session->userdata('user_id'),
            'bidang_id' => $this->session->userdata('bidang_id'),
            'kode_rekening' => $rek[0],
            'uraian' => $this->input->post('uraian'),
            'nominal_kotor' => $this->input->post('nominal_kotor'),
            'pajak' => $this->input->post('pajak'),
            'nominal_bersih' => $this->input->post('nominal_bersih'),
            'status' => 'M',
            'tanggal_status' =>date('Y-m-d'),
            'jam_status' => date('h:i:s')
        );
        $this->common->insert('data_pengajuan', $objek);
        redirect('pengajuan/index');
    }
}