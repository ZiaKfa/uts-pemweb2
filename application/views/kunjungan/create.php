<?php
$this->load->view('common/auth');
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Kunjungan Baru</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php $this->load->view('common/navbar'); ?>
<div class="container d-flex align-items-center justify-content-center mt-5">
	<div class="row">
    	<div class="col text-center">
			<h1>Kunjungan Baru</h1>
		</div>
        <form action="<?= base_url('kunjungan/store') ?>" method="post">
            <div class="mb-3">
                <label for="id_pasien" class="form-label">Nama Pasien</label>
                <select class="form-select" name="id_pasien" id="id_pasien">
                    <option selected disabled>Pilih Pasien</option>
                    <?php foreach($pasiens as $pasien): ?>
                        <option value="<?= $pasien['id'] ?>"><?= $pasien['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_dokter" class="form-label">Nama Dokter</label>
                <select class="form-select" name="id_dokter" id="id_dokter">
                    <option selected disabled>Pilih Dokter</option>
                    <?php foreach($dokters as $dokter): ?>
                        <option value="<?= $dokter['id'] ?>"><?= $dokter['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                <input type="date" class="form-control" name="tanggal_kunjungan" id="tanggal_kunjungan">
            </div>
            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <input type="text" class="form-control" name="keluhan" id="keluhan">
            </div>
            <div class="mb-3">
                <label for="id_poli" class="form-label">Poli</label>
                <select class="form-select" name="id_poli" id="id_poli">
                    <option selected disabled>Pilih Poli</option>
                    <?php foreach($polis as $poli): ?>
                        <option value="<?= $poli['id'] ?>"><?= $poli['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
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
