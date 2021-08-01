<?php

use Dompdf\Dompdf;

class Menu extends CI_Controller{
	public function __construct(){
		parent::__construct();
    logindanrole();
    $this->load->library('form_validation');
		$this->data['aktif'] = 'menu';
		$this->load->model('M_menu', 'm_menu');
		$this->load->model('M_toko', 'm_toko');
		$this->data['toko'] = $this->m_toko->lihat();
	}

	public function index(){
		$this->data['title'] = 'Data Menu';
		$this->data['all_menu'] = $this->m_menu->lihat();
		$this->data['no'] = 1;
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('menu/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Menu';
    $this->data['all_menu'] = $this->m_menu->lihat();
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('menu/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

    $this->form_validation->set_rules('menu', 'Menu', 'required|trim', [
      'required' => 'Menu harus diisi!'
    ]);
    if ($this->form_validation->run() == false) {
      $this->data['title'] = 'Tambah Menu';
      $this->load->view('menu/tambah', $this->data);
    } else {
      $data = [
        'menu' => $this->input->post('menu')
      ];
  
      if($this->m_menu->tambah($data)){
        $this->session->set_flashdata('success', 'Data Menu <strong>Berhasil</strong> Ditambahkan!');
        redirect('menu');
      } else {
        $this->session->set_flashdata('error', 'Data Menu <strong>Gagal</strong> Ditambahkan!');
        redirect('menu');
      }      
    }
	}

	public function ubah($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Menu';
		$this->data['menu'] = $this->m_menu->lihat_id($id);
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('menu/ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

    $this->form_validation->set_rules('menu', 'Menu', 'required|trim', [
      'required' => 'Menu harus diisi!'
    ]);
    if ($this->form_validation->run() == false) {
      $this->data['title'] = 'Ubah Menu';
      $this->data['menu'] = $this->m_menu->lihat_id($id);

      $this->load->view('menu/ubah', $this->data);
    } else {
      $data = [
        'menu' => $this->input->post('menu')
      ];

      if($this->m_menu->ubah($data, $id)){
        $this->session->set_flashdata('success', 'Data Menu <strong>Berhasil</strong> Diubah!');
        redirect('menu');
      } else {
        $this->session->set_flashdata('error', 'Data Menu <strong>Gagal</strong> Diubah!');
        redirect('menu');
      }
    }
	}

	public function hapus($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}

		if($this->m_menu->hapus($id)){
      // $this->m_menu->hapus_submenu($id);
			$this->session->set_flashdata('success', 'Data Menu <strong>Berhasil</strong> Dihapus!');
			redirect('menu');
		} else {
			$this->session->set_flashdata('error', 'Data Menu <strong>Gagal</strong> Dihapus!');
			redirect('menu');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_menu'] = $this->m_menu->lihat();
		$this->data['toko'] = $this->m_toko->lihat_toko();
		$this->data['title'] = 'Laporan Data Menu';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('menu/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Menu Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}