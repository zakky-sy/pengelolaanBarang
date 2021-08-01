<?php

class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['grup_id'] != '2' && $this->session->login['grup_id'] != '1') redirect();
		$this->data['aktif'] = 'dashboard';
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_customer', 'm_customer');
		$this->load->model('M_dashboard', 'm_dashboard');
		$this->load->model('M_supplier', 'm_supplier');
		$this->load->model('M_pengeluaran', 'm_pengeluaran');
		$this->load->model('M_penerimaan', 'm_penerimaan');
		$this->load->model('M_toko', 'm_toko');
		$this->load->model('M_user', 'm_user');
	}

	public function index(){
		$this->data['title'] = 'Halaman Dashboard';
		$this->data['jumlah_barang'] = $this->m_barang->jumlah();
		$this->data['jumlah_customer'] = $this->m_customer->jumlah();
		$this->data['jumlah_supplier'] = $this->m_supplier->jumlah();
		$this->data['jumlah_pengeluaran'] = $this->m_pengeluaran->jumlah();
		$this->data['jumlah_penerimaan'] = $this->m_penerimaan->jumlah();
		$this->data['jumlah_petugas'] = $this->m_user->jumlah_petugas();
		$this->data['toko'] = $this->m_toko->lihat();
    $id = $this->session->login['grup_id'];
		$this->data['grup'] = $this->m_dashboard->lihat($id);
    $this->data['profil'] = $this->db->get_where('user', ['id' => $this->session->login['id']])->row_array();
		$this->load->view('dashboard', $this->data);
	}
}