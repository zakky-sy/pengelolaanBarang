<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col text-center">
			<h3 class="h3 text-dark"><?= $title ?></h3>
			<h4 class="h4 text-dark "><strong><?= $toko ?></strong></h4>
		</div>
	</div>
	<hr>
	<div class="row">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<td>No</td>
					<td>Sub Menu</td>
					<td>Menu</td>
					<td>Url</td>
					<td>Ikon</td>
					<td>Aktif</td>
				</tr>
			</thead>
      <hr>
			<tbody>
				<?php foreach ($all_submenu as $sm): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $sm->judul ?></td>
						<td><?= $sm->menu ?></td>
						<td><?= $sm->url ?></td>
						<td><?= $sm->ikon ?></td>
						<td><?= $sm->aktif ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>