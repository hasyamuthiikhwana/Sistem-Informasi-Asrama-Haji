<?php
class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        if(!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }
    
    public function index() {
        $keyword = $this->input->get('search');
        
        if (!empty($keyword)) {
            $data['users'] = $this->M_user->search_users($keyword);
            $data['keyword'] = $keyword;
        } else {
            $data['users'] = $this->M_user->get_all_users();
            $data['keyword'] = '';
        }
        
        $this->load->view('dashboard/admin', $data);
    }
    
    public function add() {
        $data['title'] = 'Tambah User';
        $this->load->view('dashboard/add_user', $data);
    }
    
    public function save() {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[50]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,dosen,mahasiswa]');
        
        $this->form_validation->set_message('required', '{field} harus diisi!');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter!');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter!');
        $this->form_validation->set_message('is_unique', '{field} sudah terdaftar!');
        $this->form_validation->set_message('matches', 'Password tidak cocok!');
        $this->form_validation->set_message('in_list', 'Pilih role yang valid!');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('dashboard/add');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role' => $this->input->post('role')
            ];
            
            if ($this->M_user->insert_user($data)) {
                $this->session->set_flashdata('success', 'User berhasil ditambahkan!');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan user!');
                redirect('dashboard/add');
            }
        }
    }
    
    public function edit($id) {
        $data['user'] = $this->M_user->get_user_by_id($id);
        
        if (empty($data['user'])) {
            $this->session->set_flashdata('error', 'User tidak ditemukan!');
            redirect('dashboard');
        }
        
        $data['title'] = 'Edit User';
        $this->load->view('dashboard/edit_user', $data);
    }
    
    public function update($id) {
        $user = $this->M_user->get_user_by_id($id);
        if (empty($user)) {
            $this->session->set_flashdata('error', 'User tidak ditemukan!');
            redirect('dashboard');
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,dosen,mahasiswa]');
        
        if ($this->input->post('password') != '') {
            $this->form_validation->set_rules('password', 'Password', 'min_length[4]');
            $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'matches[password]');
        }
        
        $this->form_validation->set_message('required', '{field} harus diisi!');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter!');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter!');
        $this->form_validation->set_message('matches', 'Password tidak cocok!');
        $this->form_validation->set_message('in_list', 'Pilih role yang valid!');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('dashboard/edit/' . $id);
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'role' => $this->input->post('role')
            ];
            
            if ($this->input->post('password') != '') {
                $data['password'] = md5($this->input->post('password'));
            }
            
            if ($this->M_user->update_user($id, $data)) {
                $this->session->set_flashdata('success', 'User berhasil diupdate!');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate user!');
                redirect('dashboard/edit/' . $id);
            }
        }
    }
    
    /**
 * Hapus user - tanpa JavaScript
 * @param int $id User ID
 */
public function delete($id) {
    // Cek apakah user ada
    $user = $this->M_user->get_user_by_id($id);
    
    if (empty($user)) {
        $this->session->set_flashdata('error', 'User tidak ditemukan!');
        redirect('dashboard');
    }
    
    // Cek jangan sampai menghapus diri sendiri
    if ($id == $this->session->userdata('user_id')) {
        $this->session->set_flashdata('error', 'Tidak bisa menghapus akun sendiri!');
        redirect('dashboard');
    }
    
    // Proses hapus
    if ($this->M_user->delete_user($id)) {
        $this->session->set_flashdata('success', 'User "' . $user->username . '" berhasil dihapus!');
    } else {
        $this->session->set_flashdata('error', 'Gagal menghapus user!');
    }
    
    redirect('dashboard');
}
}