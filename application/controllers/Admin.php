<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Booking_model');
        $this->load->model('Fasilitas_model');
        $this->load->model('User_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
        
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
    }

    public function index() {
        redirect('admin/dashboard');
    }

    public function dashboard() {
        $data['title'] = 'Admin Dashboard';
        $data['active_menu'] = 'admin_dashboard';
        $data['pending'] = $this->Booking_model->count_by_status('pending');
        $data['confirmed'] = $this->Booking_model->count_by_status('confirmed');
        $data['completed'] = $this->Booking_model->count_by_status('completed');
        $data['cancelled'] = $this->Booking_model->count_by_status('cancelled');
        $data['total_fasilitas'] = $this->Fasilitas_model->count_all();
        $data['recent_bookings'] = $this->Booking_model->get_all();
        
        $this->load->view('layout/booking/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('layout/booking/footer');
    }

    public function bookings($status = null) {
        $data['title'] = 'Kelola Booking';
        $data['active_menu'] = 'admin_bookings';
        $data['bookings'] = $this->Booking_model->get_all($status);
        $data['current_status'] = $status;
        
        $this->load->view('layout/booking/header', $data);
        $this->load->view('admin/bookings', $data);
        $this->load->view('layout/booking/footer');
    }

    public function update_status($id) {
        $status = $this->input->post('status');
        $valid = ['confirmed', 'cancelled', 'completed'];
        
        if (in_array($status, $valid)) {
            $this->Booking_model->update_status($id, $status);
            $this->session->set_flashdata('success', 'Status booking berhasil diupdate.');
        } else {
            $this->session->set_flashdata('error', 'Status tidak valid.');
        }
        redirect('admin/bookings');
    }

    public function fasilitas() {
        $data['title'] = 'Kelola Fasilitas';
        $data['active_menu'] = 'admin_fasilitas';
        $data['fasilitas'] = $this->Fasilitas_model->get_all();
        
        $this->load->view('layout/booking/header', $data);
        $this->load->view('admin/fasilitas', $data);
        $this->load->view('layout/booking/footer');
    }

    public function add_fasilitas() {
        $data['title'] = 'Tambah Fasilitas';
        $data['active_menu'] = 'admin_fasilitas';
        
        $this->load->view('layout/booking/header', $data);
        $this->load->view('admin/form_fasilitas', $data);
        $this->load->view('layout/booking/footer');
    }

    public function save_fasilitas() {
        $this->form_validation->set_rules('nama', 'Nama Fasilitas', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|numeric');
        $this->form_validation->set_rules('harga_per_hari', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->add_fasilitas();
            return;
        }

        $fas_data = array(
            'nama' => $this->input->post('nama'),
            'tipe' => $this->input->post('tipe'),
            'kapasitas' => $this->input->post('kapasitas'),
            'harga_per_hari' => $this->input->post('harga_per_hari'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => 'tersedia'
        );

        $this->Fasilitas_model->insert($fas_data);
        $this->session->set_flashdata('success', 'Fasilitas berhasil ditambahkan.');
        redirect('admin/fasilitas');
    }

    public function edit_fasilitas($id) {
        $data['title'] = 'Edit Fasilitas';
        $data['active_menu'] = 'admin_fasilitas';
        $data['fasilitas'] = $this->Fasilitas_model->get_by_id($id);
        
        if (!$data['fasilitas']) {
            redirect('admin/fasilitas');
        }
        
        $this->load->view('layout/booking/header', $data);
        $this->load->view('admin/form_fasilitas', $data);
        $this->load->view('layout/booking/footer');
    }

    public function update_fasilitas($id) {
        $this->form_validation->set_rules('nama', 'Nama Fasilitas', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|numeric');
        $this->form_validation->set_rules('harga_per_hari', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_fasilitas($id);
            return;
        }

        $fas_data = array(
            'nama' => $this->input->post('nama'),
            'tipe' => $this->input->post('tipe'),
            'kapasitas' => $this->input->post('kapasitas'),
            'harga_per_hari' => $this->input->post('harga_per_hari'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status')
        );

        $this->Fasilitas_model->update($id, $fas_data);
        $this->session->set_flashdata('success', 'Fasilitas berhasil diupdate.');
        redirect('admin/fasilitas');
    }

    public function delete_fasilitas($id) {
        $this->Fasilitas_model->delete($id);
        $this->session->set_flashdata('success', 'Fasilitas berhasil dihapus.');
        redirect('admin/fasilitas');
    }
}
