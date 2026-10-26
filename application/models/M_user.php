<?php
class M_user extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get all users
     * @return array List of users
     */
    public function get_all_users() {
        return $this->db->get('users')->result();
    }
    
    /**
     * Search users by username
     * @param string $keyword Keyword pencarian
     * @return array List of users
     */
    public function search_users($keyword) {
        $this->db->like('username', $keyword);
        return $this->db->get('users')->result();
    }
    
    /**
     * Get user by ID
     * @param int $id User ID
     * @return object User data
     */
    public function get_user_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row();
    }
    
    /**
     * Get user by username
     * @param string $username Username
     * @return object User data
     */
    public function get_user_by_username($username) {
        return $this->db->get_where('users', ['username' => $username])->row();
    }
    
    /**
     * Insert new user
     * @param array $data User data
     * @return boolean
     */
    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }
    
    /**
     * Update user
     * @param int $id User ID
     * @param array $data User data
     * @return boolean
     */
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }
    
    /**
     * Delete user
     * @param int $id User ID
     * @return boolean
     */
    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
    
    /**
     * Count total users
     * @return int
     */
    public function count_users() {
        return $this->db->count_all('users');
    }
    
    /**
     * Check if username exists
     * @param string $username
     * @return boolean
     */
    public function username_exists($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }
}