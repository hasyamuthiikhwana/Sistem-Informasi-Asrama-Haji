<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Simas_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        // ============================================================
        // PROTEKSI: Jika belum login, redirect ke halaman login
        // ============================================================
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    // ============================================================
    // LANDING PAGE (Halaman Depan) - TIDAK DIPROTEKSI
    // ============================================================
    public function index() {
        $data['total_kamar'] = $this->Simas_model->count_rooms_by_type('standard') + 
                               $this->Simas_model->count_rooms_by_type('vip');
        $data['standar'] = $this->Simas_model->count_rooms_by_type('standard');
        $data['vip'] = $this->Simas_model->count_rooms_by_type('vip');
        $data['tersedia'] = $this->Simas_model->count_rooms_by_status('available');
        
        $this->load->view('simas/landing', $data);
    }

    // ============================================================
    // DASHBOARD ADMIN
    // ============================================================
    public function dashboard() {
        $data['total_kamar'] = $this->Simas_model->count_rooms_by_type('standard') + 
                               $this->Simas_model->count_rooms_by_type('vip');
        $data['standar'] = $this->Simas_model->count_rooms_by_type('standard');
        $data['vip'] = $this->Simas_model->count_rooms_by_type('vip');
        $data['tersedia'] = $this->Simas_model->count_rooms_by_status('available');
        $data['terisi'] = $this->Simas_model->count_rooms_by_status('occupied');
        $data['pendapatan'] = $this->Simas_model->get_total_income();

        // Ambil nama user dari session untuk ditampilkan di navbar
        $data['nama_user'] = $this->session->userdata('nama');

        $this->load->view('simas/dashboard', $data);
    }

    // ============================================================
    // BOOKING KAMAR
    // ============================================================
    public function booking_room() {
        if ($this->input->post()) {
            // Ambil user_id dari session (bukan hardcode 1)
            $user_id = $this->session->userdata('user_id');
            $room_id = $this->input->post('room_id');
            $check_in = $this->input->post('check_in');
            $check_out = $this->input->post('check_out');

            $this->form_validation->set_rules('room_id', 'Kamar', 'required|numeric');
            $this->form_validation->set_rules('check_in', 'Check-in', 'required');
            $this->form_validation->set_rules('check_out', 'Check-out', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['error'] = validation_errors();
                $data['rooms'] = $this->Simas_model->get_all_rooms();
                $data['nama_user'] = $this->session->userdata('nama');
                $this->load->view('simas/booking_room', $data);
                return;
            }

            try {
                $this->db->trans_start();
                $room = $this->Simas_model->get_room_by_id($room_id);
                if (!$room || $room->status != 'available') {
                    throw new Exception('Kamar tidak tersedia.');
                }
                $date1 = new DateTime($check_in);
                $date2 = new DateTime($check_out);
                $nights = $date1->diff($date2)->days;
                if ($nights <= 0) throw new Exception('Minimal 1 malam.');

                $total_price = $room->price_per_night * $nights;
                $booking_data = [
                    'user_id' => $user_id,
                    'booking_type' => 'room',
                    'booking_date' => $check_in,
                    'total_price' => $total_price,
                    'status' => 'pending'
                ];
                $booking_id = $this->Simas_model->insert_booking($booking_data);
                $this->Simas_model->update_room_status($room_id, 'occupied');
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    throw new Exception('Gagal menyimpan data.');
                }
                $data['success'] = "Booking berhasil! Kamar {$room->room_number} untuk $nights malam. Total: Rp " . number_format($total_price, 0, ',', '.');
                $data['rooms'] = $this->Simas_model->get_all_rooms();
                $data['nama_user'] = $this->session->userdata('nama');
                $this->load->view('simas/booking_room', $data);
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $data['error'] = $e->getMessage();
                $data['rooms'] = $this->Simas_model->get_all_rooms();
                $data['nama_user'] = $this->session->userdata('nama');
                $this->load->view('simas/booking_room', $data);
            }
        } else {
            $data['rooms'] = $this->Simas_model->get_all_rooms();
            $data['nama_user'] = $this->session->userdata('nama');
            $this->load->view('simas/booking_room', $data);
        }
    }

    // ============================================================
    // BOOKING AULA KECIL
    // ============================================================
    public function booking_small() {
        if ($this->input->post()) {
            $user_id = $this->session->userdata('user_id');
            $booking_date = $this->input->post('booking_date');
            $duration = (int)$this->input->post('duration');

            // ============================================================
            // ATURAN DURASI AULA KECIL:
            // - 8 jam = 600.000
            // - 9-12 jam = dihitung 12 jam = 780.000
            // - Sewa 1 hari: TIDAK BOLEH DP (DP = 0)
            // ============================================================
            if ($duration > 8 && $duration <= 12) {
                $duration = 12;
            }

            $this->form_validation->set_rules('booking_date', 'Tanggal', 'required');
            $this->form_validation->set_rules('duration', 'Durasi', 'required|in_list[8,12]');

            if ($this->form_validation->run() == FALSE) {
                $data['error'] = validation_errors();
                $data['nama_user'] = $this->session->userdata('nama');
                $this->load->view('simas/booking_small', $data);
                return;
            }

            $price = $this->Simas_model->get_small_hall_price($duration);
            if (!$price) {
                $data['error'] = 'Durasi tidak valid.';
                $data['nama_user'] = $this->session->userdata('nama');
                $this->load->view('simas/booking_small', $data);
                return;
            }

            // DP = 0 karena sewa 1 hari (tidak boleh DP)
            $dp = 0;

            $booking_data = [
                'user_id' => $user_id,
                'booking_type' => 'small_hall',
                'booking_date' => $booking_date,
                'total_price' => $price,
                'status' => 'pending'
            ];
            $this->Simas_model->insert_booking($booking_data);

            $data['success'] = "Booking Aula Kecil berhasil!<br>
                Durasi: $duration Jam<br>
                Total: Rp " . number_format($price, 0, ',', '.') . "<br>
                DP: Rp 0 (Sewa 1 hari, tidak boleh DP)";
            $data['nama_user'] = $this->session->userdata('nama');
            $this->load->view('simas/booking_small', $data);
        } else {
            $data['nama_user'] = $this->session->userdata('nama');
            $this->load->view('simas/booking_small', $data);
        }
    }

    // ============================================================
    // BOOKING AULA BESAR + ADD-ON
    // ============================================================
    public function booking_big() {
        if ($this->input->post()) {
            $user_id = $this->session->userdata('user_id');
            $booking_date = $this->input->post('booking_date');
            $extra_chairs = (int)$this->input->post('extra_chairs');
            $extra_tables = (int)$this->input->post('extra_tables');

            $this->form_validation->set_rules('booking_date', 'Tanggal', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['error'] = validation_errors();
                $data['nama_user'] = $this->session->userdata('nama');
                $this->load->view('simas/booking_big', $data);
                return;
            }

            try {
                $this->db->trans_start();
                $base_price = $this->Simas_model->get_big_hall_base_price(); // 11.600.000
                $dp = $this->Simas_model->get_big_hall_dp(); // 2.100.000

                $addons = $this->Simas_model->get_addon_prices();
                $chair_price = 0;
                $table_price = 0;
                foreach ($addons as $item) {
                    if (strpos($item->item_name, 'Kursi') !== false) $chair_price = $item->extra_price_per_unit;
                    if (strpos($item->item_name, 'Meja') !== false) $table_price = $item->extra_price_per_unit;
                }

                $total_addons = ($extra_chairs * $chair_price) + ($extra_tables * $table_price);
                $grand_total = $base_price + $total_addons;

                $booking_data = [
                    'user_id' => $user_id,
                    'booking_type' => 'big_hall',
                    'booking_date' => $booking_date,
                    'total_price' => $grand_total,
                    'status' => 'pending'
                ];
                $booking_id = $this->Simas_model->insert_booking($booking_data);

                if ($extra_chairs > 0) {
                    $this->Simas_model->insert_big_hall_addon([
                        'booking_id' => $booking_id,
                        'item_name' => 'Kursi Tambahan',
                        'quantity' => $extra_chairs,
                        'unit_price' => $chair_price
                    ]);
                }
                if ($extra_tables > 0) {
                    $this->Simas_model->insert_big_hall_addon([
                        'booking_id' => $booking_id,
                        'item_name' => 'Meja Tambahan',
                        'quantity' => $extra_tables,
                        'unit_price' => $table_price
                    ]);
                }

                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    throw new Exception('Gagal menyimpan data.');
                }

                $data['success'] = "Booking Aula Besar berhasil!<br>
                    Total: Rp " . number_format($grand_total, 0, ',', '.') . "<br>
                    DP yang harus dibayar: Rp " . number_format($dp, 0, ',', '.');
                $data['nama_user'] = $this->session->userdata('nama');
                $this->load->view('simas/booking_big', $data);
            } catch (Exception $e) {
                $this->db->trans_rollback();
                $data['error'] = $e->getMessage();
                $data['nama_user'] = $this->session->userdata('nama');
                $this->load->view('simas/booking_big', $data);
            }
        } else {
            $data['nama_user'] = $this->session->userdata('nama');
            $this->load->view('simas/booking_big', $data);
        }
    }
}