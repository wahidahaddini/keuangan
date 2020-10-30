<?php defined('BASEPATH') or exit('No direct script access allowed');

class Common_lib
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->ci =& get_instance();
        $this->ci->load->library("form_validation");
        $this->ci->form_validation->set_message(
            array(
                'required' => 'Inputan Tidak boleh kosong.',
                'min_length' => 'Minimal {param}',
                'is_unique' => '{field} diatas sudah terdaftar sebelumnya',
                'in_list' => '{field} tidak boleh bernilai selain {param}',
                'max_length' => 'Maksimal {param} digit / karakter',
                'numeric' => "Gunakan angka untuk {field}"
                )
        );
    }

    public function indoDay($d)
    {
        $arr = array(
            "Sun" => "Minggu",
            "Mon" => "Senin",
            "Tue" => "Selasa",
            "Wed" => "Rabu",
            "Thu" => "Kamis",
            "Fri" => "Jumat",
            "Sat" => "Sabtu",
        );

        return $arr[$d];
    }

    public function hariKe($d)
    {
        $arr = array(
            "Sun" => 7,
            "Mon" => 1,
            "Tue" => 2,
            "Wed" => 3,
            "Thu" => 4,
            "Fri" => 5,
            "Sat" => 6,
        );

        return $arr[$d];
    }
    public function indoMonth($m)
    {
        $arr = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

        return $arr[(int)$m];
    }

    public function getTitle()
    {
        $countUri = count($this->ci->uri->segment_array());
        $title = "";
        for ($i=1; $i <= $countUri ; $i++) {
            $glue = (($i+1) <= $countUri) ? " | " : "";
            $title.=$this->ci->uri->segment($i).$glue;
        }
        $this->title = "Siriang ".ucwords(str_replace("-", " ", $title)."");
        return $this->title;
    }
    public function pagination($url, $count, $per_page)
    {
        $this->ci->load->library("pagination");
        $config['base_url'] = $url;
        $config['total_rows'] = $count;
        $config['per_page'] = $per_page;
        $config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] 	= '</ul></nav></div>';
        $config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] 	= '</span></li>';
        $config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] 	= '</span></li>';
        $config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] 	= '</span></li>';
        $config['page_query_string'] = true;

        $this->ci->pagination->initialize($config);
    }

    public function validation_divisi($unique="")
    {
        if ($unique!="") {
            $is_unique = $unique!=$this->ci->input->post('kode_divisi') ? "|is_unique[divisi.kode_divisi]" : "";
        } else {
            $is_unique = "|is_unique[divisi.kode_divisi]";
        }

        $config = array(
            array(
                "field" => "kode_divisi",
                "label" => "Kode Divisi",
                "rules" => "trim|required".$is_unique,
            ),
            array(
                "field" => "nama",
                "label" => "Nama Divisi",
                "rules" => "trim|required",
            ),
        );
        $this->ci->form_validation->set_rules($config);
    }
}
