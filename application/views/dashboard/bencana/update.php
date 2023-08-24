<body>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Update data bencana</h1>
<p class="mb-4">Isi data-data dibawah dengan benar.</p>
<?php if ($this->session->flashdata('success_message')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success_message') ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error_message')) : ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error_message') ?>
    </div>
<?php endif; ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Update Data</h6>
    </div>
    <div class="card-body">
    <form action="" method="post">
            <label for="bencana" class="mb-1">bencana</label>
            <input type="text" name="bencana" class="form-control mb-2 w-100" value="<?= $bencana->bencana ?>">
            <label for="tanggal"class="mb-1">tanggal</label>
            <input type="date" name="tanggal" class="form-control mb-2 w-100" value="<?= $bencana->tanggal ?>">
            <label for="lokasi" class="mb-1">lokasi</label>
            <input type="text" name="lokasi" class="form-control mb-2 w-100" value="<?= $bencana->lokasi ?>">
            <label for="keterangan" class="mb-1">keterangan</label>
            <input type="text" name="keterangan" class="form-control mb-2 w-100" value="<?= $bencana->keterangan ?>">
            <button type="submit" name="update" class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</div>
</div>
</body>