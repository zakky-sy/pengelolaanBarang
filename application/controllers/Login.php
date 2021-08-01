<?php

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
    $this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_user', 'm_user');
		if($this->session->login) redirect('dashboard');
	}

	public function index(){
    $this->form_validation->set_rules('username', 'Username', 'required|trim', [
      'required' => 'Username harus diisi!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
      'required' => 'Password harus diisi!',
      'min_length' => 'Password minimal 8 karakter'
    ]);

    if ($this->form_validation->run() == false) {
      $data['title'] = 'User Login';
      $this->load->view('login', $data);
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $user = $this->db->get_where('user', ['username' => $username])->row_array();
      
      if ($user) {
        if (password_verify($password, $user['password'])) {
          $data = [
            'id' => $user['id'],
            'kode' => $user['kode'],
            'nama' => $user['nama'],
            'username' => $user['username'],
            'image' => $user['image'],
            'password' => $user['password'],
            'grup_id' => $user['grup_id'],
            'jam_masuk' => date('H:i:s')
          ];
          $this->session->set_userdata('login', $data);
          $this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
          redirect('dashboard');
        } else {
          $this->session->set_flashdata('error', '<strong>Password</strong> salah!');
          redirect();
        }
      } else {
        $this->session->set_flashdata('error', '<strong>Username</strong> salah!');
        redirect();
      }
      
    }
	}
}