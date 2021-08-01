<?php

class Terblokir extends CI_Controller {
  public function index() {
    $this->data['title'] = 'Tidak ada Akses';
    $this->load->model('M_toko', 'm_toko');
		$this->data['toko'] = $this->m_toko->lihat();
    $this->load->view('terblokir', $this->data);
  }
}