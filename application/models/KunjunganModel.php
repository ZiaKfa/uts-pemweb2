<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KunjunganModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert($data){
        return $this->db->insert('kunjungan', $data);
    }

    public function update($data, $id){
        return $this->db->update('kunjungan', $data, ['id' => $id]);
    }

    public function delete($id){
        return $this->db->delete('kunjungan', ['id' => $id]);
    }

    public function getAll(){
        return $this->db->get('kunjungan')->result_array();
    }

    public function getById($id){
        return $this->db->get_where('kunjungan', ['id' => $id])->row_array();
    }

    public function joinKunjungan(){
        $this->db->select('kunjungan.id, pasien.nama as nama_pasien, dokter.nama as nama_dokter, poli.nama as nama_poli, kunjungan.tanggal_kunjungan, kunjungan.keluhan, user.username as user_input');
        $this->db->from('kunjungan');
        $this->db->join('user', 'user.id = kunjungan.id_user');
        $this->db->join('pasien', 'pasien.id = kunjungan.id_pasien');
        $this->db->join('dokter', 'dokter.id = kunjungan.id_dokter');
        $this->db->join('poli', 'poli.id = kunjungan.id_poli');
        return $this->db->get()->result_array();
    }
}