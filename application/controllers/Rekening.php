<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {
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
            "btnHref" => base_url()."Rekening/input_rekening",
            "btnBg" => "success",
            "btnFa" => "keyboard",
            "btnText" => "Tambah Rekening"
        );
        $card['title'] = "Rekening Baru <span>> List Rekening</span>";
        $data['rekening'] = $this->db->get('kode_rekening')->result();
        $this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
        $this->load->view('rekening/list-rekening', $data);
        $this->load->view('common/slash-card');
        $this->load->view('common/footer');
    }

    public function input_rekening()
    {
        $this->form_validation->set_rules('kode_rekening', 'Rekening', 'required|trim|is_unique[users.username]');
        $this->form_validation->set_rules('nama_rekening', 'Nama Rekening', 'required|trim|is_unique[users.username]');
        
        
        $menu = array(
            "title" => $this->title,
            "btnFa" => "keyboard",
            "btnHref" => base_url()."Rekening/index",
            "btnBg" => "success",
            "btnText" => "List Rekening"
        );
        
        if($this->form_validation->run() == false) {
            $card['title'] = "Input Ref Bidang <span>> Input Ref Bidang</span>";
            $this->load->view('common/menu', $menu);
            $this->load->view('common/card', $card);
            $this->load->view('rekening/input-rekening');
            $this->load->view('common/slash-card');
            $this->load->view('common/footer');
        }else
        {
        $rekening = $this->input->post('kode_rekening');
        $nama_rekening = $this->input->post('nama_rekening');

        $data = array(
            'kode_rekening' => $rekening,
            'nama_rekening' => $nama_rekening
        );
        $this->common->insert('kode_rekening', $data);
        redirect('Rekening/index');
        }
    }

    public function tambah_rek(){
        
        $rekening = $this->input->post('kode_rekening');
        $nama_rekening = $this->input->post('nama_rekening');
        $cek = $this->db->get_where('kode_rekening', array('kode_rekening' => $kode_rekening))->result();
        if (count($cek) > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" rol="alert"> Kode Rekening Sudah Ada</div>');
            redirect('Rekening/input_rekening');
        }else{
            $data = array(
            'kode_rekening' => $rekening,
            'nama_rekening' => $nama_rekening,
            );
        $this->common->insert('kode_rekening', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" rol="alert"> Input Berhasil!</div>');
        redirect('Rekening/index');
        }
    }

    function hapus ($id){
        $where = array('kode_rekening' => $id);
        $this->db->delete('kode_rekening', $where);
        //$this->common->delete($kode_rekening, $id);
        redirect('Rekening/index');
    }
}