<?php

class M_detail_menu extends CI_Model {
	protected $_table = 'user_sub_menu';

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function lihat_id($id){
		return $this->db->get_where($this->_table, ['menu_id' => $id])->result();
	}

	public function lihat($id){
		return $this->db->get_where($this->_table, ['menu_id' => $id])->row();
	}

	public function hapus($id){
		return $this->db->delete($this->_table, ['id' => $id]);
	}
}