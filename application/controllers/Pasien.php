<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PasienModel');
        $this->load->library('session');
    }

    public function create(){
        $this->load->view('pasien/create');
    }

    public function store(){
        $data = [
            'nama' => $this->input->post('nama'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'id_user' => $this->input->post('id_user')
        ];

        $inserted = $this->PasienModel->insert($data);

        if ($inserted) {
            $this->session->set_flashdata('success', 'Pasien berhasil ditambahkan');

        } else {
            $this->session->set_flashdata('error', 'Pasien gagal ditambahkan');
        }
        
        redirect('pasien');
    }

    public function edit($id){
        $data['pasien'] = $this->PasienModel->getById($id);
        $this->load->view('pasien/edit', $data);
    }

    public function update(){
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'id_user' => $this->input->post('id_user')
        ];

        if ($this->input->post('tanggal_lahir')) {
            $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        }

        $updated = $this->PasienModel->update($data, $id);

        if ($updated) {
            $this->session->set_flashdata('success', 'Pasien berhasil diubah');

        } else {
            $this->session->set_flashdata('error', 'Pasien gagal diubah');
        }
        
        redirect('pasien');
    }

    public function delete($id){
        $deleted = $this->PasienModel->delete($id);

        if ($deleted) {
            $this->session->set_flashdata('success', 'Pasien berhasil dihapus');

        } else {
            $this->session->set_flashdata('error', 'Pasien gagal dihapus');
        }
        
        redirect('pasien');
    }

    public function index(){
        $pasiens = $this->PasienModel->getAll();
        $this->load->view('pasien/index', ['pasiens' => $pasiens]);
    }

}