<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">

  <div id="wrapper" style="height: 100vh;">

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content" class="my-5">

              <!-- Begin Page Content -->
              <div class="container-fluid">

                  <!-- 404 Error Text -->
                  <div class="text-center">
                      <div class="error mx-auto" data-text="403">403</div>
                      <p class="lead text-gray-800 mb-5">Gak Boleh Kesini Bos</p>
                      <p class="text-gray-500 mb-0">Sepertinya anda berusaha mengakses menu yang diperuntukan hanya untuk admin....</p>
                      <a href="<?= base_url('dashboard') ?>">&larr; Kembali ke Dashboard</a>
                  </div>

              </div>
              <!-- /.container-fluid -->

          </div>
          <!-- End of Main Content -->

          <!-- Footer -->
          <?php $this->load->view('partials/footer.php') ?>
          <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

  </div>
  <?php $this->load->view('partials/js.php') ?>
	<script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>