<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_submenu extends CI_Model{
	protected $_table = 'user_sub_menu';

	public function lihat(){
    $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
              FROM `user_sub_menu` JOIN `user_menu`
              ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
              ORDER BY `user_menu`.`id`
              ";
    return $this->db->query($query)->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_id($id){
		$query = $this->db->get_where($this->_table, ['id' => $id]);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function ubah($data, $id){
		$query = $this->db->set($data);
		$query = $this->db->where(['id' => $id]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($id){
		return $this->db->delete($this->_table, ['id' => $id]);
	}
}