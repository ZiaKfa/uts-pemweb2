<?php
$this->load->view('common/auth');
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pasien Baru</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php $this->load->view('common/navbar'); ?>
<div class="container d-flex align-items-center justify-content-center mt-5">
	<div class="row">
    	<div class="col text-center">
			<h1>Pasien Baru</h1>
		</div>
        <form action="<?= base_url('pasien/store') ?>" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <input type="hidden" name="id_user" value="<?= $this->session->userdata('user')['id'] ?>">
            <button type="submit" class="btn btn-primary mb-3">Tambah</button>
        </form>
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
