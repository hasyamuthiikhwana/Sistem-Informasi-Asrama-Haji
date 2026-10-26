<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $user = $query->row();

        if ($user) {
            // Try bcrypt first
            if (password_verify($password, $user->password)) {
                return $user;
            }
            // Fallback: try MD5 for legacy passwords
            if ($user->password === md5($password)) {
                // Upgrade to bcrypt
                $this->db->where('id', $user->id)->update('users', [
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ]);
                return $user;
            }
        }
        return false;
    }

    public function get_user_by_id($id) {
        return $this->db->where('id', $id)->get('users')->row();
    }

    public function register($data) {
        return $this->db->insert('users', $data);
    }

    public function is_username_exists($username) {
        return $this->db->where('username', $username)->count_all_results('users') > 0;
    }

    public function update_user($id, $data) {
        return $this->db->where('id', $id)->update('users', $data);
    }
}