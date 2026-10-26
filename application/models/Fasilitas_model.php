<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all() {
        return $this->db->order_by('tipe', 'ASC')->order_by('sub_tipe', 'ASC')->order_by('nama', 'ASC')->get('fasilitas')->result();
    }

    public function get_by_tipe($tipe) {
        return $this->db->where('tipe', $tipe)->where('status', 'tersedia')->order_by('sub_tipe', 'DESC')->order_by('nama', 'ASC')->get('fasilitas')->result();
    }

    public function get_by_id($id) {
        return $this->db->where('id', $id)->get('fasilitas')->row();
    }

    public function get_kamar_by_subtipe($sub_tipe) {
        return $this->db->where('tipe', 'kamar')->where('sub_tipe', $sub_tipe)->where('status', 'tersedia')->order_by('lantai', 'ASC')->order_by('nama', 'ASC')->get('fasilitas')->result();
    }

    public function get_tersedia($tipe, $checkin, $checkout) {
        $booked_ids = $this->db->select('bd.fasilitas_id')
            ->from('booking_detail bd')
            ->join('booking b', 'b.id = bd.booking_id')
            ->where('b.status !=', 'cancelled')
            ->group_start()
                ->where('b.tanggal_checkin <', $checkout)
                ->where('b.tanggal_checkout >', $checkin)
            ->group_end()
            ->get()->result_array();
        
        $booked = array_column($booked_ids, 'fasilitas_id');
        
        $this->db->where('tipe', $tipe);
        $this->db->where('status', 'tersedia');
        if (!empty($booked)) {
            $this->db->where_not_in('id', $booked);
        }
        return $this->db->order_by('sub_tipe', 'DESC')->order_by('nama', 'ASC')->get('fasilitas')->result();
    }

    public function insert($data) {
        return $this->db->insert('fasilitas', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('fasilitas', $data);
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete('fasilitas');
    }

    public function count_by_tipe($tipe) {
        return $this->db->where('tipe', $tipe)->where('status', 'tersedia')->count_all_results('fasilitas');
    }

    public function count_kamar_by_subtipe($sub_tipe) {
        return $this->db->where('tipe', 'kamar')->where('sub_tipe', $sub_tipe)->where('status', 'tersedia')->count_all_results('fasilitas');
    }

    public function count_all() {
        return $this->db->count_all('fasilitas');
    }
}
