<?php

class Profil extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_profil', 'm_profil');
		$this->load->model('M_toko', 'm_toko');
		$this->data['aktif'] = 'profil';
    $this->load->library('form_validation');
		$this->data['toko'] = $this->m_toko->lihat();
	}

	public function index(){
		$this->data['title'] = 'Profil Saya';
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('profil/lihat', $this->data);
	}

	public function proses_ubah(){
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
      'required' => 'Nama harus diisi!'
    ]);
    $this->form_validation->set_rules('username', 'Username', 'required|trim', [
      'required' => 'Username harus diisi!'
    ]);

    if ($this->form_validation->run() == false) {
      $this->data['title'] = 'Profil Saya';
      $this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
      $this->load->view('profil/lihat', $this->data);
    } else {
      $id = $this->session->login['id'];
      $nama = $this->input->post('nama');
      $username = $this->input->post('username');

      $upload_foto = $_FILES['foto'];
      if ($upload_foto) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './sb-admin/img/profile/';
        
        $this->load->library('upload', $config);
        $data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();

        if ($this->upload->do_upload('foto')) {
          $foto_lama = $data['profil']['image'];
          if ($foto_lama != 'default.jpg') {
            unlink(FCPATH . 'sb-admin/img/profile/' . $foto_lama);
          }
          $foto_baru = $this->upload->data('file_name');
          $this->db->set('image', $foto_baru);
        } else {
          echo $this->upload->display_errors();
        }
        
      }

      $this->db->set('nama', $nama);
      $this->db->set('username', $username);
      $this->db->where('id', $id);
      if($this->db->update('user')){
        $this->session->set_flashdata('success', 'Profil <strong>Berhasil</strong> Diubah!');
        redirect('profil');
      } else {
        $this->session->set_flashdata('error', 'Profil <strong>Gagal</strong> Diubah!');
        redirect('profil');
      }
    }
	}

  public function lihat_ubah_password() {
    $this->data['title'] = 'Ubah Password';
    $this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
    $this->load->view('profil/ubah_password', $this->data);
  }

	public function ubah_password(){

    $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim', [
      'required' => 'Password Lama harus diisi!'
    ]);
    $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[8]|matches[password_baru2]', [
      'required' => 'Password Baru harus diisi!',
      'min_length' => 'Password minimal 8 karakter!',
      'matches' => 'Password Baru & Ulangi Password Baru harus sama!'
    ]);
    $this->form_validation->set_rules('password_baru2', 'Ulangi Password Baru', 'required|trim|min_length[8]|matches[password_baru]', [
      'required' => 'Ulangi Password Baru harus diisi!',
      'min_length' => 'Password minimal 8 karakter!',
      'matches' => 'Password Baru & Ulangi Password Baru harus sama!'
    ]);

    if ($this->form_validation->run() == false) {
      $this->data['title'] = 'Ubah Password';
      $this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
      $this->load->view('profil/ubah_password', $this->data);
    } else {
      $id = $this->session->login['id'];
      $data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
      $password_lama = $this->input->post('password_lama');
      $password_baru = $this->input->post('password_baru');
      if (!password_verify($password_lama, $data['profil']['password'])) {
        $this->session->set_flashdata('error', '<strong>Password Lama</strong> Salah!');
        redirect('profil/ubah_password');
      } else {
        if ($password_lama == $password_baru) {
          $this->session->set_flashdata('error', 'Password Baru <strong>Sama</strong> Dengan Password Lama!');
          redirect('profil/ubah_password');
        } else {
          $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
          
          $this->db->set('password', $password_hash);
          $this->db->where('id', $id);
          $this->db->update('user');

          $this->session->set_flashdata('success', 'Password <strong>Berhasil</strong> Diubah!');
          redirect('dashboard');
        }
        
      }
      
    }
    
	}
}