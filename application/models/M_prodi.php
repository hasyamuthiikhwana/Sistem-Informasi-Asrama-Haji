<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class M_prodi extends CI_Model { 
 
    // Fungsi untuk mengambil seluruh data dari tabel mahasiswa 
    public function get_all_data_prodi2() { 
        // Sama dengan query: SELECT * FROM mahasiswa 
        $query = $this->db->get('prodi');  
        return $query->result_array(); 
    } 
} 