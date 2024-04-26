<?php
$this->load->view('common/auth');
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Poli</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php $this->load->view('common/navbar'); ?>
<div class="container align-items-center justify-content-center mt-5">
<div class="row">
  <div class="col">
    <h1>Poli</h1>
  </div>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    <?php foreach($polis as $poli): ?>
    <tr>
      <th scope="row"><?= $no++ ?></th>
      <td><?= $poli['nama'] ?></td>
      <td>
        <a href="<?= base_url('poli/edit/'.$poli['id']) ?>"><button class="btn btn-primary">Edit</button></a>
        <a href="<?= base_url('poli/delete/'.$poli['id']) ?>"><button class="btn btn-danger">Delete</button></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<a href="<?= base_url('poli/create') ?>"><button class="btn btn-primary">Tambah poli</button></a>
</div>
</div>
<?php $this->load->view('common/footer'); ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    <?php if($this->session->flashdata('success')): ?>
        alert("<?php echo $this->session->flashdata('success'); ?>");
    <?php elseif($this->session->flashdata('error')): ?>
        alert("<?php echo $this->session->flashdata('error'); ?>");
    <?php endif; ?>
    </script>
</body>
</html>
