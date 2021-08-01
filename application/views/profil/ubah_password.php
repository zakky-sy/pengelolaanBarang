<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('profil/ubah_password') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
					<div class="float-right">
						<a href="<?= base_url('dashboard') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
				</div>
				<hr>
				<?php if ($this->session->flashdata('error')) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('error') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php elseif($this->session->flashdata('success')) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('success') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif ?>
				<div class="row">
					<div class="col-md-6">
						<div class="card shadow">
							<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
							<div class="card-body">
                <form action="<?= base_url('profil/ubah_password') ?>" method="POST">
                  <div class="row">
                    <div class="col-md">
                      <div class="form-group">
                        <label for="password_lama"><strong>Password Lama : </strong></label>
                        <input type="text" name="password_lama" id="password_lama" class="form-control" autocomplete="off">
                        <?= form_error('password_lama', '<small class="text-danger pl-1">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="password_baru"><strong>Password Baru : </strong></label>
                        <input type="text" name="password_baru" id="password_baru" class="form-control" autocomplete="off">
                        <?= form_error('password_baru', '<small class="text-danger pl-1">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="password_baru2"><strong>Ulangi Password Baru : </strong></label>
                        <input type="text" name="password_baru2" id="password_baru2" class="form-control" autocomplete="off">
                        <?= form_error('password_baru2', '<small class="text-danger pl-1">', '</small>'); ?>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                  </div>
                </form>
							</div>				
						</div>
					</div>
				</div>
				</div>
			</div>
			<!-- load footer -->
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
</body>
</html>