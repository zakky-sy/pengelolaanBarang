<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
    <div class="sidebar-brand-icon">
      <i class="fas fa-desktop"></i>
    </div>
    <div class="sidebar-brand-text mx-3"><?= $toko->nama_toko; ?></div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url('dashboard') ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- QUERY MENU -->
  <?php 
    $grup_id = $this->session->login['grup_id'];
    $queryMenu = "SELECT`user_menu`.`id`, `menu`
                  FROM `user_menu` JOIN `user_access_menu`
                  ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                  WHERE `user_access_menu`.`grup_id` = $grup_id
                  ORDER BY `user_access_menu`.`menu_id` ASC
                  ";
    $menu = $this->db->query($queryMenu)->result_array();
  ?>

  <!-- LOOPING MENU -->
  <?php foreach ($menu as $m) : ?>
    <div class="sidebar-heading">
      <?= $m['menu']; ?>
    </div>

    <!-- Sub Menu -->
    <?php 
      $menuId = $m['id'];
      $querySubMenu = "SELECT *
                      FROM `user_sub_menu`
                      WHERE `menu_id` = $menuId
                      AND `aktif` = 1
                      ";
      $subMenu = $this->db->query($querySubMenu)->result_array();
    ?>

    <!-- Looping Sub Menu -->
    <?php foreach ($subMenu as $sm) : ?>
      <li class="nav-item <?= $aktif == $sm['url'] ? 'active' : '' ?>">
        <a class="nav-link py-2" href="<?= base_url($sm['url']) ?>">
          <i class="<?= $sm['ikon']; ?>"></i>
          <span><?= $sm['judul']; ?></span></a>
      </li>
    <?php endforeach; ?>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
  <?php endforeach ?>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>