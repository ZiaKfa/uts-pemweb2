<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PoliModel');
        $this->load->library('session');
    }

    public function index()
    {
        $poli = $this->PoliModel->get_all();
        $this->load->view('poli/index', ['polis' => $poli]);
    }

    public function create()
    {
        $this->load->view('poli/create');
    }

    public function store()
    {
        $data = [
            'nama' => $this->input->post('nama'),
        ];

        $inserted = $this->PoliModel->insert($data);

        if ($inserted) {
            $this->session->set_flashdata('success', 'Poli berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Poli gagal ditambahkan');
        }

        redirect('poli');
    }

    public function edit($id)
    {
        $data['poli'] = $this->PoliModel->get_by_id($id);
        $this->load->view('poli/edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
        ];

        $updated = $this->PoliModel->update($id, $data);

        if ($updated) {
            $this->session->set_flashdata('success', 'Poli berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Poli gagal diubah');
        }

        redirect('poli');
    }

    public function delete($id)
    {
        $deleted = $this->PoliModel->delete($id);

        if ($deleted) {
            $this->session->set_flashdata('success', 'Poli berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Poli gagal dihapus');
        }

        redirect('poli');
    }
}