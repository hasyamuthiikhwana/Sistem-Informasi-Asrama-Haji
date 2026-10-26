<?php
class M_mhs extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get all mahasiswa
     * @return array List of mahasiswa
     */
    public function get_all_mhs() {
        return $this->db->get('mhs')->result();
    }
    
    /**
     * Search mahasiswa by nim, nama, prodi, or jurusan
     * @param string $keyword Keyword pencarian
     * @return array List of mahasiswa
     */
    public function search_mhs($keyword) {
        $this->db->group_start();
        $this->db->like('nim', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('prodi', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->group_end();
        return $this->db->get('mhs')->result();
    }
    
    /**
     * Get mahasiswa by NIM
     * @param string $nim NIM Mahasiswa
     * @return object Mahasiswa data
     */
    public function get_mhs_by_nim($nim) {
        return $this->db->get_where('mhs', ['nim' => $nim])->row();
    }
    
    /**
     * Insert new mahasiswa
     * @param array $data Mahasiswa data
     * @return boolean
     */
    public function insert_mhs($data) {
        return $this->db->insert('mhs', $data);
    }
    
    /**
     * Update mahasiswa
     * @param string $nim NIM Mahasiswa
     * @param array $data Mahasiswa data
     * @return boolean
     */
    public function update_mhs($nim, $data) {
        $this->db->where('nim', $nim);
        return $this->db->update('mhs', $data);
    }
    
    /**
     * Delete mahasiswa
     * @param string $nim NIM Mahasiswa
     * @return boolean
     */
    public function delete_mhs($nim) {
        $this->db->where('nim', $nim);
        return $this->db->delete('mhs');
    }
    
    /**
     * Count total mahasiswa
     * @return int
     */
    public function count_mhs() {
        return $this->db->count_all('mhs');
    }
    
    /**
     * Check if NIM exists
     * @param string $nim
     * @return boolean
     */
    public function nim_exists($nim) {
        $this->db->where('nim', $nim);
        $query = $this->db->get('mhs');
        return $query->num_rows() > 0;
    }
    
    /**
     * Get mahasiswa by NIM with foto
     * @param string $nim NIM Mahasiswa
     * @return object Mahasiswa data
     */
    public function get_mhs_with_foto($nim) {
        $this->db->select('*');
        $this->db->from('mhs');
        $this->db->where('nim', $nim);
        return $this->db->get()->row();
    }
}