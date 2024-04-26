<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->library('session');
    }

    public function registerPage(){
        $this->load->view('user/register');
    }

    public function register(){
        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        ];

        if($this->UserModel->getByUsername($data['username'])){
            $this->session->set_flashdata('error', 'Username is already registered');
            redirect('user/registerPage');
        } else {
            $inserted = $this->UserModel->insert($data);
        }

        if ($inserted) {
            $this->session->set_flashdata('success', 'Register success');

        } else {
            $this->session->set_flashdata('error', 'Register failed');
        }
        
        redirect('user/loginPage');
    }

    public function loginPage(){
        $this->load->view('user/login');
    }

    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->UserModel->getByUsername($username);
        
        if ($user) {
            if ($password == $user['password']) {
                $this->session->set_userdata('user', $user);
                $this->session->set_flashdata('success', 'Login success');
                redirect('welcome');
            } else {
                $this->session->set_flashdata('error', 'Password is wrong');
                redirect('user/loginPage');
            }
        } else {
            $this->session->set_flashdata('error', 'Username is not registered');
            redirect('user/loginPage');
        }   
    }

    public function logout(){
        $this->session->unset_userdata('user');
        $this->session->set_flashdata('success', 'Logout success');
        redirect('welcome');
    }
}