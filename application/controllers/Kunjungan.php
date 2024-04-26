<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('KunjunganModel');
        $this->load->model('PasienModel');
        $this->load->model('DokterModel');
        $this->load->model('PoliModel');
    }

    public function index()
    {
        $kunjungan = $this->KunjunganModel->joinKunjungan();
        $this->load->view('kunjungan/index', ['kunjungans' => $kunjungan]);
    }

    public function create()
    {
        $pasien = $this->PasienModel->getAll();
        $dokter = $this->DokterModel->getAll();
        $poli = $this->PoliModel->get_all();
        $this->load->view('kunjungan/create', ['pasiens' => $pasien, 'dokters' => $dokter, 'polis' => $poli]);
    }

    public function store()
    {
        $data = [
            'id_pasien' => $this->input->post('id_pasien'),
            'id_dokter' => $this->input->post('id_dokter'),
            'id_poli' => $this->input->post('id_poli'),
            'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
            'keluhan' => $this->input->post('keluhan'),
            'id_user' => $this->input->post('id_user')
        ];
        $inserted = $this->KunjunganModel->insert($data);
        if($inserted) {
            $this->session->set_flashdata('success', 'Kunjungan berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Kunjungan gagal ditambahkan');
        }
        redirect('kunjungan');
    }

    public function edit($id)
    {
        $kunjungan = $this->KunjunganModel->getById($id);
        $pasien = $this->PasienModel->getAll();
        $dokter = $this->DokterModel->getAll();
        $poli = $this->PoliModel->get_all();
        $this->load->view('kunjungan/edit', ['kunjungan' => $kunjungan, 'pasiens' => $pasien, 'dokters' => $dokter, 'polis' => $poli]);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $data = [
            'id_pasien' => $this->input->post('id_pasien'),
            'id_dokter' => $this->input->post('id_dokter'),
            'id_poli' => $this->input->post('id_poli'),
            'keluhan' => $this->input->post('keluhan'),
            'id_user' => $this->input->post('id_user')
        ];
        if($this->input->post('tanggal_kunjungan')) {
            $data['tanggal_kunjungan'] = $this->input->post('tanggal_kunjungan');
        }
        $updated = $this->KunjunganModel->update($data, $id);
        if($updated) {
            $this->session->set_flashdata('success', 'Kunjungan berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Kunjungan gagal diubah');
        }
        redirect('kunjungan');
    }

    public function delete($id)
    {
        $deleted = $this->KunjunganModel->delete($id);
        if($deleted) {
            $this->session->set_flashdata('success', 'Kunjungan berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Kunjungan gagal dihapus');
        }
        redirect('kunjungan');
    }
}