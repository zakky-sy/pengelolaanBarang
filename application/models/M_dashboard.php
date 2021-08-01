<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model{
	protected $_table = 'user_grup';

	public function lihat($id){
    // $query = "SELECT `user_grup`.`grup`
    //           FROM `user_grup` JOIN `user`
    //           ON `user_grup`.`id` = `user`.`grup_id`
    //           WHERE `user`.`grup_id` = $id
    //           ";
    // return $this->db->query($query)->row();
    return $this->db->get_where($this->_table, ['id' => $id])->row();
	}
}