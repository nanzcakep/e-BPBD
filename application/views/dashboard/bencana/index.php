<body id="page-top">
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Bencana</h1>
<p class="mb-4">Berikut adalah data bencana yang terdapat di kota Batu.</p>
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

<!-- Content Row -->
<div class="row">

    <?php foreach ($data as $row): ?>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-dark text-uppercase mb-1"><?= $row->bencana; ?></div>
                            <div class="h5 mb-0 mt-2">
                                <a href="<?= base_url('admin/dashboard/bencana/detail/'.$row->id_bencana) ?>" class="btn btn-dark">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?> 

</div>
<hr class="mb-4 mt-4">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Tambah Data</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/dashboard/bencana/tambah'); ?>" method="post">
            <label for="bencana" class="mb-1">bencana</label>
            <input type="text" name="bencana" class="form-control mb-2 w-100">
            <label for="tanggal"class="mb-1">tanggal</label>
            <input type="date" name="tanggal" class="form-control mb-2 w-100">
            <label for="lokasi"class="mb-1">lokasi</label>
            <input type="text" name="lokasi" class="form-control mb-2 w-100">
            <label for="keterangan"class="mb-1">keterangan</label>
            <input type="text" name="keterangan" class="form-control mb-2 w-100">
            <button type="submit" class="btn btn-primary w-100">Tambah</button>
        </form>
    </div>
</div>
</div>
</body>