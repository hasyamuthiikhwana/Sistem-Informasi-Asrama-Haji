<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // ============================================================
    // KAMAR
    // ============================================================
    public function get_all_rooms() {
        $this->db->order_by('type DESC, floor, room_number');
        return $this->db->get('rooms')->result();
    }

    public function get_room_by_id($id) {
        return $this->db->get_where('rooms', ['id' => $id])->row();
    }

    public function update_room_status($id, $status) {
        $this->db->where('id', $id);
        return $this->db->update('rooms', ['status' => $status]);
    }

    public function count_rooms_by_status($status) {
        $this->db->where('status', $status);
        return $this->db->count_all_results('rooms');
    }

    public function count_rooms_by_type($type) {
        $this->db->where('type', $type);
        return $this->db->count_all_results('rooms');
    }

    // ============================================================
    // BOOKING
    // ============================================================
    public function insert_booking($data) {
        $this->db->insert('bookings', $data);
        return $this->db->insert_id();
    }

    public function insert_big_hall_addon($data) {
        $this->db->insert('booking_big_hall_addons', $data);
        return $this->db->insert_id();
    }

    public function get_total_income() {
        $this->db->select_sum('total_price');
        $this->db->where('status', 'confirmed');
        $query = $this->db->get('bookings');
        $result = $query->row();
        return $result ? $result->total_price : 0;
    }

    // ============================================================
    // AULA KECIL
    // ============================================================
    public function get_small_hall_price($duration) {
        $this->db->where('duration_hours', $duration);
        $row = $this->db->get('small_hall_pricing')->row();
        return $row ? $row->price : 0;
    }

    // ============================================================
    // AULA BESAR
    // ============================================================
    public function get_big_hall_base_price() {
        $this->db->where('setting_key', 'big_hall_base_price');
        $row = $this->db->get('settings')->row();
        return $row ? (int)$row->setting_value : 11600000; // Default 11.600.000
    }

    // ============================================================
    // FUNGSI INI DITAMBAHKAN UNTUK MENGAMBIL DP AULA BESAR
    // ============================================================
    public function get_big_hall_dp() {
        $this->db->where('setting_key', 'big_hall_dp');
        $row = $this->db->get('settings')->row();
        return $row ? (int)$row->setting_value : 2100000; // Default 2.100.000
    }

    public function get_addon_prices() {
        $this->db->where('extra_price_per_unit >', 0);
        return $this->db->get('big_hall_inventory')->result();
    }
}