<?php

use Dompdf\Dompdf;

class Submenu extends CI_Controller{
	public function __construct(){
		parent::__construct();
    logindanrole();
    $this->load->library('form_validation');
		$this->data['aktif'] = 'submenu';
		$this->load->model('M_submenu', 'm_submenu');
		$this->load->model('M_toko', 'm_toko');
		$this->data['toko'] = $this->m_toko->lihat();
	}

	public function index(){
		$this->data['title'] = 'Data Sub Menu';
		$this->data['all_submenu'] = $this->m_submenu->lihat();
		$this->data['no'] = 1;
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('submenu/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Sub Menu';
    $this->data['all_submenu'] = $this->m_submenu->lihat();
    $this->data['menu'] = $this->db->get('user_menu')->result_array();
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('submenu/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

    $this->form_validation->set_rules('submenu', 'Sub Menu', 'required|trim', [
      'required' => 'Sub Menu harus diisi!'
    ]);
    $this->form_validation->set_rules('menu', 'Menu', 'required|trim', [
      'required' => 'Menu harus dipilih!'
    ]);
    $this->form_validation->set_rules('url', 'Url', 'required|trim', [
      'required' => 'Url harus diisi!'
    ]);
    $this->form_validation->set_rules('ikon', 'Ikon', 'required|trim', [
      'required' => 'Ikon harus diisi!'
    ]);
    if ($this->form_validation->run() == false) {
      $this->data['title'] = 'Tambah Sub Menu';
      $this->data['all_submenu'] = $this->m_submenu->lihat();
      $this->data['menu'] = $this->db->get('user_menu')->result_array();
      $this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
      $this->load->view('submenu/tambah', $this->data);
    } else {
      $data = [
        'judul' => $this->input->post('submenu'),
        'menu_id' => $this->input->post('menu'),
        'url' => $this->input->post('url'),
        'ikon' => $this->input->post('ikon'),
        'aktif' => $this->input->post('aktif')
      ];
  
      if($this->m_submenu->tambah($data)){
        $this->session->set_flashdata('success', 'Data Menu <strong>Berhasil</strong> Ditambahkan!');
        redirect('submenu');
      } else {
        $this->session->set_flashdata('error', 'Data Menu <strong>Gagal</strong> Ditambahkan!');
        redirect('submenu');
      }      
    }
	}

	public function ubah($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Sub Menu';
    $this->data['menu'] = $this->db->get('user_menu')->result_array();
		$this->data['submenu'] = $this->m_submenu->lihat_id($id);
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('submenu/ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

    $this->form_validation->set_rules('submenu', 'Sub Menu', 'required|trim', [
      'required' => 'Sub Menu harus diisi!'
    ]);
    $this->form_validation->set_rules('menu', 'Menu', 'required|trim', [
      'required' => 'Menu harus dipilih!'
    ]);
    $this->form_validation->set_rules('url', 'Url', 'required|trim', [
      'required' => 'Url harus diisi!'
    ]);
    $this->form_validation->set_rules('ikon', 'Ikon', 'required|trim', [
      'required' => 'Ikon harus diisi!'
    ]);
    if ($this->form_validation->run() == false) {
      $this->data['title'] = 'Ubah Sub Menu';
      $this->data['menu'] = $this->db->get('user_menu')->result_array();
      $this->data['submenu'] = $this->m_submenu->lihat_id($id);
      $this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
      $this->load->view('submenu/ubah', $this->data);
    } else {
      $data = [
        'judul' => $this->input->post('submenu'),
        'menu_id' => $this->input->post('menu'),
        'url' => $this->input->post('url'),
        'ikon' => $this->input->post('ikon'),
        'aktif' => $this->input->post('aktif')
      ];

      if($this->m_submenu->ubah($data, $id)){
        $this->session->set_flashdata('success', 'Data Menu <strong>Berhasil</strong> Diubah!');
        redirect('submenu');
      } else {
        $this->session->set_flashdata('error', 'Data Menu <strong>Gagal</strong> Diubah!');
        redirect('submenu');
      }
    }
	}

	public function hapus($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}

		if($this->m_submenu->hapus($id)){
			$this->session->set_flashdata('success', 'Data Menu <strong>Berhasil</strong> Dihapus!');
			redirect('submenu');
		} else {
			$this->session->set_flashdata('error', 'Data Menu <strong>Gagal</strong> Dihapus!');
			redirect('submenu');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_submenu'] = $this->m_submenu->lihat();
		$this->data['toko'] = $this->m_toko->lihat_toko();
		$this->data['title'] = 'Laporan Data Sub Menu';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('submenu/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Menu Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}