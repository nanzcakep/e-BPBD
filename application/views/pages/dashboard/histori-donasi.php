<body>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Histori Donasi</h1>

<?php if ($this->session->flashdata('success_message')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success_message') ?>
    </div>
<?php endif; ?> 


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Amal yang terkumpul</h6>
    </div>
    <ul class="list-group">
        <?php foreach($histories as $histori) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="status"><?= $histori->jenis_kebutuhan ?></span>
                <span class="badge badge-pill status <?= $histori->status == 'Terkirim' ? 'badge-warning' : 'badge-success' ?>">
                    <?= $histori->status ?>
                </span>
                <span class="tanggal"><?= $histori->tanggal_pengiriman ?></span>
                <a href="histori-donasi/<?= $histori->id_pengiriman;   ?>" class="btn btn-primary">Detail</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</div>
</body>