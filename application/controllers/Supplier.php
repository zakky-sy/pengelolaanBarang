<?php

use Dompdf\Dompdf;

class Supplier extends CI_Controller{
	public function __construct(){
		parent::__construct();
    logindanrole();
		$this->load->model('M_supplier', 'm_supplier');
		$this->load->model('M_toko', 'm_toko');
		$this->data['aktif'] = 'supplier';
		$this->data['toko'] = $this->m_toko->lihat();
	}

	public function index(){
		$this->data['title'] = 'Data Supplier';
		$this->data['all_supplier'] = $this->m_supplier->lihat();
		$this->data['no'] = 1;
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('supplier/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Supplier';
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('supplier/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
		];

		if($this->m_supplier->tambah($data)){
			$this->session->set_flashdata('success', 'Data Supplier <strong>Berhasil</strong> Ditambahkan!');
			redirect('supplier');
		} else {
			$this->session->set_flashdata('error', 'Data Supplier <strong>Gagal</strong> Ditambahkan!');
			redirect('supplier');
		}
	}

	public function ubah($kode){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Supplier';
		$this->data['supplier'] = $this->m_supplier->lihat_id($kode);
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('supplier/ubah', $this->data);
	}

	public function proses_ubah($kode){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
		];

		if($this->m_supplier->ubah($data, $kode)){
			$this->session->set_flashdata('success', 'Data Supplier <strong>Berhasil</strong> Diubah!');
			redirect('supplier');
		} else {
			$this->session->set_flashdata('error', 'Data Supplier <strong>Gagal</strong> Diubah!');
			redirect('supplier');
		}
	}

	public function hapus($kode){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}
		
		if($this->m_supplier->hapus($kode)){
			$this->session->set_flashdata('success', 'Data Supplier <strong>Berhasil</strong> Dihapus!');
			redirect('supplier');
		} else {
			$this->session->set_flashdata('error', 'Data Supplier <strong>Gagal</strong> Dihapus!');
			redirect('supplier');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		$this->data['all_supplier'] = $this->m_supplier->lihat();
		$this->data['title'] = 'Laporan Data Supplier';
		$this->data['no'] = 1;
		$this->data['toko'] = $this->m_toko->lihat_toko();

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('supplier/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Supplier Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}