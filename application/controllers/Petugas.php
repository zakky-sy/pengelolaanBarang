<?php

use Dompdf\Dompdf;

class Petugas extends CI_Controller{
	public function __construct(){
		parent::__construct();
    logindanrole();
    $this->load->library('form_validation');
		$this->data['aktif'] = 'petugas';
		$this->load->model('M_user', 'm_user');
		$this->load->model('M_toko', 'm_toko');
		$this->data['toko'] = $this->m_toko->lihat();
	}

	public function index(){
		$this->data['title'] = 'Data Petugas';
		$this->data['all_petugas'] = $this->m_user->lihat_petugas();
		$this->data['no'] = 1;
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('petugas/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Petugas';
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('petugas/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
      'required' => 'Nama harus diisi!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
      'required' => 'Password harus diisi!',
      'min_length' => 'Password terlalu pendek!'
    ]);
    if ($this->form_validation->run() == false) {
      $this->data['title'] = 'Tambah Petugas';
      $this->load->view('petugas/tambah', $this->data);
    } else {
      $data = [
        'kode' => $this->input->post('kode'),
        'nama' => $this->input->post('nama'),
        'username' => $this->input->post('username'),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'image' => 'default.jpg',
        'grup_id' => '2',
        'tgl_dibuat' => time()
      ];
  
      if($this->m_user->tambah($data)){
        $this->session->set_flashdata('success', 'Data Petugas <strong>Berhasil</strong> Ditambahkan!');
        redirect('petugas');
      } else {
        $this->session->set_flashdata('error', 'Data Petugas <strong>Gagal</strong> Ditambahkan!');
        redirect('petugas');
      }      
    }
	}

	public function ubah($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Petugas';
		$this->data['petugas'] = $this->m_user->lihat_id($id);
		$this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('petugas/ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
      'required' => 'Nama harus diisi!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
      'required' => 'Password harus diisi!',
      'min_length' => 'Password terlalu pendek!'
    ]);
    if ($this->form_validation->run() == false) {
      $this->data['title'] = 'Ubah Petugas';
      $this->data['petugas'] = $this->m_user->lihat_id($id);

      $this->load->view('petugas/ubah', $this->data);
    } else {
      $data = [
        'kode' => $this->input->post('kode'),
        'nama' => $this->input->post('nama'),
        'username' => $this->input->post('username'),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'image' => 'default.jpg'
      ];

      if($this->m_user->ubah($data, $id)){
        $this->session->set_flashdata('success', 'Data Petugas <strong>Berhasil</strong> Diubah!');
        redirect('petugas');
      } else {
        $this->session->set_flashdata('error', 'Data Petugas <strong>Gagal</strong> Diubah!');
        redirect('petugas');
      }
    }
	}

	public function hapus($id){
		if ($this->session->login['grup_id'] == '2'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}

		if($this->m_user->hapus($id)){
			$this->session->set_flashdata('success', 'Data Petugas <strong>Berhasil</strong> Dihapus!');
			redirect('petugas');
		} else {
			$this->session->set_flashdata('error', 'Data Petugas <strong>Gagal</strong> Dihapus!');
			redirect('petugas');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_petugas'] = $this->m_user->lihat_petugas();
		$this->data['toko'] = $this->m_toko->lihat_toko();
		$this->data['title'] = 'Laporan Data Petugas';
		$this->data['no'] = 1;
		$this->data['toko'] = $this->m_toko->lihat_toko();

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('petugas/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Petugas Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}