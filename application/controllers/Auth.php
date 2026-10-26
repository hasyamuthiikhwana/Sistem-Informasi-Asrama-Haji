<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            if ($this->session->userdata('role') == 'admin') {
                redirect('admin/dashboard');
            }
            redirect('booking');
        }
        $this->load->view('auth/login');
    }

    public function proses_login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
            return;
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->login($username, $password);

        if ($user) {
            $session_data = array(
                'user_id' => $user->id,
                'username' => $user->username,
                'nama' => isset($user->nama) ? $user->nama : $user->username,
                'role' => $user->role,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
            
            if ($user->role == 'admin') {
                redirect('admin/dashboard');
            }
            redirect('booking');
        } else {
            $data['error'] = 'Username atau Password salah!';
            $this->load->view('auth/login', $data);
        }
    }

    public function register() {
        if ($this->session->userdata('logged_in')) {
            redirect('booking');
        }
        $this->load->view('auth/register');
    }

    public function proses_register() {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'No. HP', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
            return;
        }

        if ($this->User_model->is_username_exists($this->input->post('username'))) {
            $data['error'] = 'Username sudah digunakan!';
            $this->load->view('auth/register', $data);
            return;
        }

        $user_data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => 'mahasiswa'
        );

        if ($this->User_model->register($user_data)) {
            $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
            redirect('auth');
        } else {
            $data['error'] = 'Registrasi gagal, coba lagi.';
            $this->load->view('auth/register', $data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}