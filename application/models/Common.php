<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Model {

    public function insert($tb,$values)
    {
        $this->db->insert($tb,$values);
    }

    public function update($tb,$values,$filter)
    {
        $this->db->update($tb,$values,$filter);
    }

    public function logout($date, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $date);
    }

    function hapus($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    // public function delete($tb,$filter)
    // {
    //     $this->db->delete($tb,$filter);
    // }

    public function getData($select,$tb,$join,$filter,$order)
    {
        $sql = $this->db->select($select);

        if($join!="") {
            for($i=0;$i<count($join);$i++){
                if($i%2!=0){
                    $sql = $this->db->join($join[$i-1],$join[$i]);
                }
            }
        }

        if($order!=""){
            $sql = $this->db->order_by($order[0],$order[1]);
        }
        if($filter!=""){
            $sql = $this->db->where($filter);
        }

        if(is_array($tb)){
            if(count($tb)==2){
                $sql = $this->db->get($tb[0],$tb[1]);
            }
            else{
                $sql = $this->db->get($tb[0],$tb[1],$tb[2]);
            }
        }
        else{
            $sql = $this->db->get($tb);
        }


        return $sql->result_array();
    }

    public function gaji()
    {
        $sql = $this->db->select("tentor.nama_tentor,pembayaran_gaji.*");
        $sql = $this->db->from("pembayaran_gaji");
        $sql = $this->db->join("tentor","pembayaran_gaji.kode_tentor = tentor.kode_tentor");
        return $this->db->get()->result_array();
    }

    public function req_jadwal() 
    {
        $sql = $this->db->select("req_perubahan_jadwal.id_req, req_perubahan_jadwal.ke_hari, req_perubahan_jadwal.ke_minggu, req_perubahan_jadwal.ke_jam, req_perubahan_jadwal.status, siswa.kode_siswa, siswa.kode_group, jadwal.id_jadwal, jadwal.hari, jadwal.jam_mulai, jadwal.jam_slesai,jadwal.minggu_ke");
        $sql = $this->db->from("req_perubahan_jadwal");
        $sql = $this->db->join("siswa", "req_perubahan_jadwal.kode_siswa = siswa.kode_siswa");
        $sql = $this->db->join("jadwal", "req_perubahan_jadwal.id_jadwal = jadwal.id_jadwal");

        return $this->db->get()->result_array();
    }
    public function detail_data_siswa($filter){
        $sql = $this->db->select("siswa.kode_siswa, siswa.nama_siswa, siswa.tgl_lahir, siswa.jk, siswa.alamat, siswa.no_hp, group_siswa.kode_group, ortu.nama_ortu, siswa.tgl_daftar, siswa.cicilan, siswa.kelas, ortu.no_hp");
        $sql = $this->db->from("siswa");
        $sql = $this->db->join("group_siswa", "siswa.kode_group = group_siswa.kode_group");
        $sql = $this->db->join("ortu", "ortu.id_ortu = siswa.id_ortu");
        $sql = $this->db->where($filter);

        return $this->db->get()->result_array();
    }

    public function edit_siswa($filter) {
        $sql = $this->db->select("siswa.kode_siswa, siswa.nama_siswa, siswa.tgl_lahir, siswa.jk, siswa.alamat, siswa.no_hp, siswa.kelas, siswa.cicilan, group_siswa.nama_group, group_siswa.kode_group, siswa.tgl_daftar, ortu.nama_ortu, ortu.no_hp");
        $sql = $this->db->from("siswa");
        $sql = $this->db->join("group_siswa", "siswa.kode_group = group_siswa.kode_group");
        $sql = $this->db->join("ortu", "siswa.id_ortu = ortu.id_ortu");
        $sql = $this->db->where($filter);

        return $this->db->get()->result_array();
    }
    public function ambil_where($where, $table){
        return $this->db->get_where($table, $where);
    }
}
