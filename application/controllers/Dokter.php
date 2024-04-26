<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DokterModel');
        $this->load->library('session');
    }

    public function create(){
        $this->load->view('dokter/create');
    }

    public function store(){
        $data = [
            'nama' => $this->input->post('nama'),
        ];

        $inserted = $this->DokterModel->insert($data);

        if ($inserted) {
            $this->session->set_flashdata('success', 'Dokter berhasil ditambahkan');

        } else {
            $this->session->set_flashdata('error', 'Dokter gagal ditambahkan');
        }
        
        redirect('dokter');
    }

    public function edit($id){
        $data['dokter'] = $this->DokterModel->getById($id);
        $this->load->view('dokter/edit', $data);
    }

    public function update(){
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
        ];

        $updated = $this->DokterModel->update($data, $id);

        if ($updated) {
            $this->session->set_flashdata('success', 'Dokter berhasil diubah');

        } else {
            $this->session->set_flashdata('error', 'Dokter gagal diubah');
        }
        
        redirect('dokter');
    }

    public function delete($id){
        $deleted = $this->DokterModel->delete($id);

        if ($deleted) {
            $this->session->set_flashdata('success', 'Dokter berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Dokter gagal dihapus');
        }

        redirect('dokter');
    }

    public function index(){
        $dokters = $this->DokterModel->getAll();
        $this->load->view('dokter/index', ['dokters' => $dokters]);
    }

}