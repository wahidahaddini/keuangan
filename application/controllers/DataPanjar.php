<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPanjar extends CI_Controller {
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
		$this->load->view('data_panjar/data-panjar', $data);
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
        redirect('DataPanjar/berhasil/'.$id);
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
	public function data()
	{
		$data['title'] = 'SIRIANG | Data Panjar';
		$data['bidang'] = $this->db->get('ref_bidang')->result();
		$this->load->view('panjar/data', $data);
	}
	public function lihat($id)
	{
		$menu = array(
			"title" => $this->title,
			"btnBg" => "success",
			"btnFa" => "keyboard"	
		);
		$sql="SELECT * FROM panjar left join ref_bidang on panjar.bidang_id = ref_bidang.bidang_id left join ref_kegiatan on panjar.kegiatan_id = ref_kegiatan.kegiatan_id where panjar_id = '$id'"; 
        $data['panjar'] = $this->db->query($sql)->result();

        $sqll="SELECT * FROM data_pengajuan left join ref_bidang on data_pengajuan.bidang_id = ref_bidang.bidang_id left join kode_rekening on data_pengajuan.kode_rekening = kode_rekening.kode_rekening left join gu_panjar on data_pengajuan.gu_panjar = gu_panjar.gu_panjar_id left join ref_kegiatan on data_pengajuan.kegiatan_id = ref_kegiatan.kegiatan_id where panjar_id='$id'"; 
		$data['spj'] = $this->db->query($sqll)->result();
		$card['title'] = "Panjar <span>> Input Panjar</span>";
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('data_panjar/lihat', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
	public function lunas($id)
	{
		$object	= array(
			'pengembalian_id' => date("Ymdhis").rand(1,9999), 
			'panjar_id' => $id, 
			'nominal' => $this->input->post('nominal'), 
			'tanggal_pelunasan' => date("Y-m-d"), 
			'jam_pelunasan' => date("h:i:s")
		);
		$this->db->insert('pengembalian_panjar', $object);
		$this->db->update('panjar', array('status_lunas' => 'Y'),array('panjar_id' => $id));
		echo "
		<script>
			alert('Pelunasan Berhasil');
			window.close();
		</script>
		";
	}
}