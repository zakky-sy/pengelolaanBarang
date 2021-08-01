<?php

use Dompdf\Dompdf;

class Pengguna extends CI_Controller {
	public function __construct(){
		parent::__construct();
    logindanrole();
		$this->data['aktif'] = 'pengguna';
		$this->load->model('M_pengguna', 'm_pengguna');
		$this->load->model('M_user', 'm_user');
		$this->load->model('M_toko', 'm_toko');
		$this->data['toko'] = $this->m_toko->lihat();
	}

	public function index(){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Managemen Pengguna hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Data Pengguna';
		$this->data['all_pengguna'] = $this->m_user->lihat_admin();
		$this->data['no'] = 1;
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('pengguna/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Pengguna';
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('pengguna/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'image' => 'default.jpg',
      'grup_id' => '1',
      'tgl_dibuat' => time()
		];

		if($this->m_user->tambah($data)){
			$this->session->set_flashdata('success', 'Data Pengguna <strong>Berhasil</strong> Ditambahkan!');
			redirect('pengguna');
		} else {
			$this->session->set_flashdata('error', 'Data Pengguna <strong>Gagal</strong> Ditambahkan!');
			redirect('pengguna');
		}
	}

	public function ubah($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Pengguna';
		$this->data['pengguna'] = $this->m_user->lihat_id($id);
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('pengguna/ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if($this->m_user->ubah($data, $id)){
			$this->session->set_flashdata('success', 'Data Pengguna <strong>Berhasil</strong> Diubah!');
			redirect('pengguna');
		} else {
			$this->session->set_flashdata('error', 'Data Pengguna <strong>Gagal</strong> Diubah!');
			redirect('pengguna');
		}
	}

	public function hapus($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		if($this->m_user->hapus($id)){
			$this->session->set_flashdata('success', 'Data Pengguna <strong>Berhasil</strong> Dihapus!');
			redirect('pengguna');
		} else {
			$this->session->set_flashdata('error', 'Data Pengguna <strong>Gagal</strong> Dihapus!');
			redirect('pengguna');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_pengguna'] = $this->m_user->lihat_admin();
		$this->data['title'] = 'Laporan Data Pengguna';
		$this->data['toko'] = $this->m_toko->lihat_toko();
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('pengguna/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Pengguna Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}