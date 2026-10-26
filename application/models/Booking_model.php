<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function generate_kode() {
        return 'BK' . date('Ymd') . strtoupper(substr(md5(uniqid()), 0, 5));
    }

    public function insert($data) {
        $this->db->insert('booking', $data);
        return $this->db->insert_id();
    }

    public function insert_detail($data) {
        return $this->db->insert('booking_detail', $data);
    }

    public function get_by_user($user_id) {
        return $this->db->where('user_id', $user_id)
            ->order_by('created_at', 'DESC')
            ->get('booking')->result();
    }

    public function get_by_id($id) {
        return $this->db->where('id', $id)->get('booking')->row();
    }

    public function get_detail($booking_id) {
        return $this->db->select('bd.*, f.nama as nama_fasilitas, f.tipe, f.kapasitas')
            ->from('booking_detail bd')
            ->join('fasilitas f', 'f.id = bd.fasilitas_id')
            ->where('bd.booking_id', $booking_id)
            ->get()->result();
    }

    public function get_all($status = null) {
        $this->db->select('b.*, u.username, u.nama as nama_user, GROUP_CONCAT(f.nama SEPARATOR ", ") as nama_fasilitas')
            ->from('booking b')
            ->join('users u', 'u.id = b.user_id')
            ->join('booking_detail bd', 'bd.booking_id = b.id', 'left')
            ->join('fasilitas f', 'f.id = bd.fasilitas_id', 'left')
            ->group_by('b.id');
        if ($status) {
            $this->db->where('b.status', $status);
        }
        return $this->db->order_by('b.created_at', 'DESC')->get()->result();
    }

    public function update_status($id, $status) {
        return $this->db->where('id', $id)->update('booking', ['status' => $status]);
    }

    public function cancel($id, $user_id) {
        return $this->db->where('id', $id)
            ->where('user_id', $user_id)
            ->where('status', 'pending')
            ->update('booking', ['status' => 'cancelled']);
    }

    public function count_by_status($status) {
        return $this->db->where('status', $status)->count_all_results('booking');
    }

    public function count_by_user($user_id) {
        return $this->db->where('user_id', $user_id)->count_all_results('booking');
    }

    public function get_active_by_user($user_id) {
        return $this->db->where('user_id', $user_id)
            ->where_in('status', ['pending', 'confirmed'])
            ->order_by('tanggal_checkin', 'ASC')
            ->get('booking')->result();
    }
}
