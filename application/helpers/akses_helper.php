<?php 

function logindanrole() {
  $ci = get_instance();
  if (!$ci->session->login['username']) {
    redirect();
  } else {
    $grup_id = $ci->session->login['grup_id'];
    $menu = $ci->uri->segment(1);
    $queryMenu = $ci->db->get_where('user_sub_menu', ['url' => $menu])->row_array();
    $menu_id = $queryMenu['menu_id'];
    $userAkses = $ci->db->get_where('user_access_menu', [
      'grup_id' => $grup_id,
      'menu_id' => $menu_id
    ]);
    if ($userAkses->num_rows() < 1) {
      redirect('terblokir');
    }
  }
}

function cek_akses($grup_id, $menu_id) {
  $ci = get_instance();
  $result = $ci->db->get_where('user_access_menu', [
    'grup_id' => $grup_id,
    'menu_id' => $menu_id
  ]);
  if ($result->num_rows() > 0) {
    return "checked='checked'";
  }
}