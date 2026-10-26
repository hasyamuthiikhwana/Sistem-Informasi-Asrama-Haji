<?php
class Mhs extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_mhs');
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->library('form_validation');
        $this->load->library('upload');
        
        // Cek login
        if(!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }
    
    /**
     * Dashboard Mhs - menampilkan daftar mahasiswa
     */
    public function index() {
        $keyword = $this->input->get('search');
        
        if (!empty($keyword)) {
            $data['mhs'] = $this->M_mhs->search_mhs($keyword);
            $data['keyword'] = $keyword;
        } else {
            $data['mhs'] = $this->M_mhs->get_all_mhs();
            $data['keyword'] = '';
        }
        
        $data['title'] = 'Data Mahasiswa';
        $this->load->view('dashboard/mhs/index', $data);
    }
    
    /**
     * Form tambah mahasiswa
     */
    public function add() {
        $data['title'] = 'Tambah Mahasiswa';
        $this->load->view('dashboard/mhs/add', $data);
    }
    
    /**
     * Proses simpan mahasiswa dengan upload foto
     */
    public function save() {
        // Validasi form
        $this->form_validation->set_rules('nim', 'NIM', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|min_length[3]|max_length[50]');
        
        $this->form_validation->set_message('required', '{field} harus diisi!');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter!');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter!');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('mhs/add');
        } else {
            $nim = $this->input->post('nim');
            
            // Cek NIM duplikat
            if ($this->M_mhs->nim_exists($nim)) {
                $this->session->set_flashdata('error', 'NIM ' . $nim . ' sudah terdaftar!');
                redirect('mhs/add');
            }
            
            // Proses upload foto
            $foto_name = $this->upload_foto($nim);
            
            $data = [
                'nim' => $nim,
                'nama' => $this->input->post('nama'),
                'prodi' => $this->input->post('prodi'),
                'jurusan' => $this->input->post('jurusan'),
                'foto' => $foto_name
            ];
            
            if ($this->M_mhs->insert_mhs($data)) {
                $this->session->set_flashdata('success', 'Data mahasiswa berhasil ditambahkan!');
                redirect('mhs');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data mahasiswa!');
                redirect('mhs/add');
            }
        }
    }
    
    /**
     * Form edit mahasiswa
     * @param string $nim NIM Mahasiswa
     */
    public function edit($nim) {
        $data['mhs'] = $this->M_mhs->get_mhs_by_nim($nim);
        
        if (empty($data['mhs'])) {
            $this->session->set_flashdata('error', 'Data mahasiswa tidak ditemukan!');
            redirect('mhs');
        }
        
        $data['title'] = 'Edit Mahasiswa';
        $this->load->view('dashboard/mhs/edit', $data);
    }
    
    /**
     * Proses update mahasiswa dengan upload foto
     * @param string $nim NIM Mahasiswa
     */
    public function update($nim) {
        // Cek apakah data ada
        $mhs = $this->M_mhs->get_mhs_by_nim($nim);
        if (empty($mhs)) {
            $this->session->set_flashdata('error', 'Data mahasiswa tidak ditemukan!');
            redirect('mhs');
        }
        
        // Validasi form
        $this->form_validation->set_rules('nim', 'NIM', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|min_length[3]|max_length[50]');
        
        $this->form_validation->set_message('required', '{field} harus diisi!');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter!');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter!');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('mhs/edit/' . $nim);
        } else {
            $new_nim = $this->input->post('nim');
            
            // Cek NIM duplikat (jika berubah)
            if ($new_nim != $nim && $this->M_mhs->nim_exists($new_nim)) {
                $this->session->set_flashdata('error', 'NIM ' . $new_nim . ' sudah terdaftar!');
                redirect('mhs/edit/' . $nim);
            }
            
            // Proses upload foto baru
            $foto_name = $this->upload_foto($new_nim, $mhs->foto);
            
            $data = [
                'nim' => $new_nim,
                'nama' => $this->input->post('nama'),
                'prodi' => $this->input->post('prodi'),
                'jurusan' => $this->input->post('jurusan'),
                'foto' => $foto_name
            ];
            
            if ($this->M_mhs->update_mhs($nim, $data)) {
                $this->session->set_flashdata('success', 'Data mahasiswa berhasil diupdate!');
                redirect('mhs');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate data mahasiswa!');
                redirect('mhs/edit/' . $nim);
            }
        }
    }
    
    /**
     * Halaman konfirmasi hapus
     * @param string $nim NIM Mahasiswa
     */
    public function confirm_delete($nim) {
        $data['mhs'] = $this->M_mhs->get_mhs_by_nim($nim);
        
        if (empty($data['mhs'])) {
            $this->session->set_flashdata('error', 'Data mahasiswa tidak ditemukan!');
            redirect('mhs');
        }
        
        $data['title'] = 'Konfirmasi Hapus';
        $this->load->view('dashboard/mhs/confirm_delete', $data);
    }
    
    /**
     * Proses hapus mahasiswa dan hapus foto
     * @param string $nim NIM Mahasiswa
     */
    public function delete($nim) {
        $mhs = $this->M_mhs->get_mhs_by_nim($nim);
        
        if (empty($mhs)) {
            $this->session->set_flashdata('error', 'Data mahasiswa tidak ditemukan!');
            redirect('mhs');
        }
        
        // Hapus foto jika ada
        if (!empty($mhs->foto)) {
            $foto_path = FCPATH . 'uploads/foto/' . $mhs->foto;
            if (file_exists($foto_path)) {
                unlink($foto_path);
            }
        }
        
        if ($this->M_mhs->delete_mhs($nim)) {
            $this->session->set_flashdata('success', 'Data mahasiswa berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data mahasiswa!');
        }
        
        redirect('mhs');
    }
    
    /**
     * Fungsi upload foto
     * @param string $nim NIM Mahasiswa
     * @param string $old_foto Nama foto lama (untuk dihapus)
     * @return string Nama file foto
     */
    private function upload_foto($nim, $old_foto = null) {
        // Cek apakah ada file yang diupload
        if (empty($_FILES['foto']['name'])) {
            return $old_foto; // Jika tidak ada file, return foto lama
        }
        
        // Konfigurasi upload
        $config['upload_path'] = FCPATH . 'uploads/foto/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB
        $config['file_name'] = $nim . '_' . time();
        $config['overwrite'] = true;
        
        // Buat folder jika belum ada
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }
        
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload('foto')) {
            // Upload berhasil
            $upload_data = $this->upload->data();
            $foto_name = $upload_data['file_name'];
            
            // Hapus foto lama jika ada
            if (!empty($old_foto)) {
                $old_path = FCPATH . 'uploads/foto/' . $old_foto;
                if (file_exists($old_path) && $old_foto != $foto_name) {
                    unlink($old_path);
                }
            }
            
            return $foto_name;
        } else {
            // Upload gagal
            $error = $this->upload->display_errors('', '');
            $this->session->set_flashdata('error', 'Upload foto gagal: ' . $error);
            return $old_foto;
        }
    }
}