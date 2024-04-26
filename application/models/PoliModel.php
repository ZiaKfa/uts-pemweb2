<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PoliModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all()
    {
        return $this->db->get('poli')->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('poli', ['id' => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('poli', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('poli', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('poli', ['id' => $id]);
    }
}