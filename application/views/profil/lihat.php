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
			<div id="content" data-url="<?= base_url('profil') ?>">
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
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('success') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php elseif($this->session->flashdata('error')) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('error') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif ?>
				<div class="row">
					<div class="col-md-8">
						<div class="card shadow">
							<div class="card-header d-none"><strong>Isi Form Dibawah Ini!</strong></div>
							<div class="card-body">
                <?= form_open_multipart('profil/proses_ubah'); ?>
                  <div class="row">
                    <div class="col-md-4">
                      <img class="card-img" src="<?= base_url('sb-admin/img/profile/') . $profil['image'] ?>" alt="Foto Profil">
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                        <label for="nama"><strong>Nama : </strong></label>
                        <input type="text" name="nama" id="nama" value="<?= $profil['nama'] ?>" class="form-control" readonly>
                        <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="username"><strong>Username : </strong></label>
                        <input type="text" name="username" id="username" value="<?= $profil['username'] ?>" placeholder="Masukan Username" class="form-control" readonly>
                        <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <label><strong>Foto profil : </strong></label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="foto" name="foto" disabled>
                          <label for="foto" class="custom-file-label">Pilih Foto</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                    <button type="button" class="btn btn-success" id="ubah"><i class="fa fa-pen"></i>&nbsp;&nbsp;Ubah</button>
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
	<script>
		$(document).ready(function(){
			$('#ubah').on('click', function(){
				$('#nama').prop('readonly', false)
				$('#username').prop('readonly', false)
				$('#foto').prop('disabled', false)
			})

			$('button[type="reset"]').on('click', function(){
				$('#nama').prop('readonly', true)
				$('#username').prop('readonly', true)
				$('#foto').prop('disabled', true)
			})
		})
	</script>
</body>
</html>