<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Booking_model');
        $this->load->model('Fasilitas_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
        
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['title'] = 'Dashboard Booking';
        $data['active_menu'] = 'dashboard';
        $data['active_bookings'] = $this->Booking_model->get_active_by_user($user_id);
        $data['total_booking'] = $this->Booking_model->count_by_user($user_id);
        $data['fasilitas_aula_besar'] = $this->Fasilitas_model->count_by_tipe('aula_besar');
        $data['fasilitas_aula_kecil'] = $this->Fasilitas_model->count_by_tipe('aula_kecil');
        $data['fasilitas_kamar'] = $this->Fasilitas_model->count_by_tipe('kamar');
        
        $this->load->view('layout/booking/header', $data);
        $this->load->view('booking/dashboard', $data);
        $this->load->view('layout/booking/footer');
    }

    public function fasilitas($tipe = 'aula_besar') {
        $valid_types = ['aula_besar', 'aula_kecil', 'kamar'];
        if (!in_array($tipe, $valid_types)) $tipe = 'aula_besar';
        
        $data['title'] = 'Pilih Fasilitas';
        $data['active_menu'] = 'fasilitas_' . $tipe;
        $data['tipe'] = $tipe;
        $data['tipe_label'] = $this->get_tipe_label($tipe);
        $data['fasilitas'] = $this->Fasilitas_model->get_by_tipe($tipe);
        
        if ($tipe == 'kamar') {
            $data['count_standard'] = $this->Fasilitas_model->count_kamar_by_subtipe('standard');
            $data['count_vip'] = $this->Fasilitas_model->count_kamar_by_subtipe('vip');
        }
        
        $this->load->view('layout/booking/header', $data);
        $this->load->view('booking/fasilitas', $data);
        $this->load->view('layout/booking/footer');
    }

    public function create($id_fasilitas) {
        $fasilitas = $this->Fasilitas_model->get_by_id($id_fasilitas);
        if (!$fasilitas) {
            $this->session->set_flashdata('error', 'Fasilitas tidak ditemukan.');
            redirect('booking');
        }
        
        $data['title'] = 'Form Booking - ' . $fasilitas->nama;
        $data['active_menu'] = 'fasilitas_' . $fasilitas->tipe;
        $data['fasilitas'] = $fasilitas;
        
        $this->load->view('layout/booking/header', $data);
        $this->load->view('booking/form_booking', $data);
        $this->load->view('layout/booking/footer');
    }

    public function proses_booking() {
        $this->form_validation->set_rules('fasilitas_id', 'Fasilitas', 'required');
        $this->form_validation->set_rules('tanggal_checkin', 'Tanggal Check-in', 'required');
        $this->form_validation->set_rules('tanggal_checkout', 'Tanggal Check-out', 'required');

        if ($this->form_validation->run() == FALSE) {
            $fasilitas_id = $this->input->post('fasilitas_id');
            if ($fasilitas_id) {
                $this->create($fasilitas_id);
            } else {
                redirect('booking');
            }
            return;
        }

        $fasilitas_id = $this->input->post('fasilitas_id');
        $checkin = $this->input->post('tanggal_checkin');
        $checkout = $this->input->post('tanggal_checkout');
        $catatan = $this->input->post('catatan');

        $fasilitas = $this->Fasilitas_model->get_by_id($fasilitas_id);
        if (!$fasilitas) {
            $this->session->set_flashdata('error', 'Fasilitas tidak ditemukan.');
            redirect('booking');
            return;
        }

        // Calculate days
        $date1 = new DateTime($checkin);
        $date2 = new DateTime($checkout);
        $jumlah_hari = $date2->diff($date1)->days;
        if ($jumlah_hari < 1) $jumlah_hari = 1;

        $harga_satuan = $fasilitas->harga_per_hari;
        $extra_kursi = 0;
        $extra_meja = 0;
        $extra_total = 0;
        $dp_amount = 0;
        $durasi_jam = null;

        // === AULA BESAR ===
        if ($fasilitas->tipe == 'aula_besar') {
            $extra_kursi = intval($this->input->post('extra_kursi'));
            $extra_meja = intval($this->input->post('extra_meja'));
            $extra_total = ($extra_kursi * 7000) + ($extra_meja * 10000);
            $dp_amount = $fasilitas->harga_dp;
        }

        // === AULA KECIL ===
        if ($fasilitas->tipe == 'aula_kecil') {
            $durasi_jam = intval($this->input->post('durasi_jam'));
            if ($durasi_jam >= 9) {
                $durasi_jam = 12;
                $harga_satuan = $fasilitas->harga_12jam;
            } else {
                $durasi_jam = 8;
                $harga_satuan = $fasilitas->harga_per_hari;
            }
            // DP rules: 1 hari tidak boleh DP, 2+ hari boleh DP
            if ($jumlah_hari >= 2) {
                $dp_amount = $harga_satuan; // DP = 1 hari
            }
        }

        $subtotal = $harga_satuan * $jumlah_hari;
        $total_harga = $subtotal + $extra_total;
        $sisa_bayar = $total_harga - $dp_amount;
        if ($sisa_bayar < 0) $sisa_bayar = 0;

        // Insert booking
        $booking_data = array(
            'user_id' => $this->session->userdata('user_id'),
            'kode_booking' => $this->Booking_model->generate_kode(),
            'tanggal_checkin' => $checkin,
            'tanggal_checkout' => $checkout,
            'durasi_jam' => $durasi_jam,
            'total_harga' => $total_harga,
            'dp_amount' => $dp_amount,
            'sisa_bayar' => $sisa_bayar,
            'extra_kursi' => $extra_kursi,
            'extra_meja' => $extra_meja,
            'extra_total' => $extra_total,
            'status' => 'pending',
            'catatan' => $catatan
        );

        $booking_id = $this->Booking_model->insert($booking_data);

        // Insert detail
        $detail_data = array(
            'booking_id' => $booking_id,
            'fasilitas_id' => $fasilitas_id,
            'jumlah_hari' => $jumlah_hari,
            'harga_satuan' => $harga_satuan,
            'subtotal' => $subtotal
        );

        $this->Booking_model->insert_detail($detail_data);

        $this->session->set_flashdata('success', 'Booking berhasil! Kode booking Anda: ' . $booking_data['kode_booking']);
        redirect('booking/detail/' . $booking_id);
    }

    public function detail($id) {
        $booking = $this->Booking_model->get_by_id($id);
        $user_id = $this->session->userdata('user_id');
        $role = $this->session->userdata('role');
        
        if (!$booking || ($booking->user_id != $user_id && $role != 'admin')) {
            $this->session->set_flashdata('error', 'Booking tidak ditemukan.');
            redirect('booking');
        }
        
        $data['title'] = 'Detail Booking';
        $data['active_menu'] = 'riwayat';
        $data['booking'] = $booking;
        $data['details'] = $this->Booking_model->get_detail($id);
        
        $this->load->view('layout/booking/header', $data);
        $this->load->view('booking/detail', $data);
        $this->load->view('layout/booking/footer');
    }

    public function riwayat() {
        $user_id = $this->session->userdata('user_id');
        $data['title'] = 'Riwayat Booking';
        $data['active_menu'] = 'riwayat';
        $data['bookings'] = $this->Booking_model->get_by_user($user_id);
        
        $this->load->view('layout/booking/header', $data);
        $this->load->view('booking/riwayat', $data);
        $this->load->view('layout/booking/footer');
    }

    public function cancel($id) {
        $user_id = $this->session->userdata('user_id');
        if ($this->Booking_model->cancel($id, $user_id)) {
            $this->session->set_flashdata('success', 'Booking berhasil dibatalkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal membatalkan booking.');
        }
        redirect('booking/riwayat');
    }

    private function get_tipe_label($tipe) {
        $labels = [
            'aula_besar' => 'Aula Besar',
            'aula_kecil' => 'Aula Kecil',
            'kamar' => 'Kamar Penginapan'
        ];
        return isset($labels[$tipe]) ? $labels[$tipe] : $tipe;
    }
}
