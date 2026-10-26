<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class M_mahasiswa extends CI_Model { 
 
    // Fungsi untuk mengambil seluruh data dari tabel mahasiswa 
    public function get_all_data() { 
        // Sama dengan query: SELECT * FROM mahasiswa 
        $query = $this->db->get('mahasiswa');  
        return $query->result_array(); 
    } 
} 