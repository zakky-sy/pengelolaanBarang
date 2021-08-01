<?php

use Dompdf\Dompdf;

class Grup extends CI_Controller {
	public function __construct(){
		parent::__construct();
    logindanrole();
		$this->data['aktif'] = 'grup';
		$this->load->model('M_grup', 'm_grup');
		$this->load->model('M_menu', 'm_menu');
		$this->load->model('M_toko', 'm_toko');
		$this->data['toko'] = $this->m_toko->lihat();
	}

	public function index(){

		$this->data['title'] = 'Data Grup';
		$this->data['all_grup'] = $this->m_grup->lihat();
		$this->data['no'] = 1;
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('grup/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Grup';
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('grup/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'grup' => $this->input->post('nama')
		];

		if($this->m_grup->tambah($data)){
			$this->session->set_flashdata('success', 'Data Pengguna <strong>Berhasil</strong> Ditambahkan!');
			redirect('grup');
		} else {
			$this->session->set_flashdata('error', 'Data Pengguna <strong>Gagal</strong> Ditambahkan!');
			redirect('grup');
		}
	}

	public function detail($id){
		$this->data['title'] = 'Detail Grup';
		$this->data['no'] = 1;
		$this->data['grup'] = $this->db->get_where('user_grup', ['id' => $id])->row_array();
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
    $this->data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('grup/detail', $this->data);
	}

	public function ubah($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Grup';
		$this->data['grup'] = $this->m_grup->lihat_id($id);
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('grup/ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'grup' => $this->input->post('nama')
		];

		if($this->m_grup->ubah($data, $id)){
			$this->session->set_flashdata('success', 'Data Grup <strong>Berhasil</strong> Diubah!');
			redirect('grup');
		} else {
			$this->session->set_flashdata('error', 'Data Grup <strong>Gagal</strong> Diubah!');
			redirect('grup');
		}
	}

	public function hapus($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		if($this->m_grup->hapus($id)){
			$this->session->set_flashdata('success', 'Data Grup <strong>Berhasil</strong> Dihapus!');
			redirect('grup');
		} else {
			$this->session->set_flashdata('error', 'Data Grup <strong>Gagal</strong> Dihapus!');
			redirect('grup');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		$this->data['all_grup'] = $this->m_grup->lihat();
		$this->data['title'] = 'Laporan Data Grup';
		$this->data['no'] = 1;
		$this->data['toko'] = $this->m_toko->lihat_toko();
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('grup/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Grup Tanggal ' . date('d F Y'), array("Attachment" => false));
	}

  public function ubahAkses() {
    $menu_id = $this->input->post('menuId');
    
    $grup_id = $this->input->post('grupId');
    $data = [
      'grup_id' => $grup_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);

    if ($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }
    
    $this->session->set_flashdata('success', 'Hak Akses <strong>Berhasil</strong> Diubah!');
  }
}