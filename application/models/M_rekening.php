<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekening extends CI_Model {

        function search($title)
        {
                $this->db->like('kode_rekening', $title , 'both');
                $this->db->or_like('nama_rekening', $title , 'both');
                $this->db->order_by('kode_rekening', 'ASC');
                $this->db->limit(10);
                
                return $this->db->get('kode_rekening')->result();
        }

}