<body>
    <div class="container-fluid">
        <!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Donasi </h1>
<p class="mb-4">Berikut adalah data detail donasi.</p>
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


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Detail Donasi</h6>
    </div>
    <div class="card-body">
    <div class="mb-3">
  <label class="mb-1">Tanggal</label>
  <p class="mb-0"><?= $data->tanggal_pengiriman ?></p>
</div>

<div class="mb-3">
  <label class="mb-1">Keterangan</label>
  <p class="mb-0"><?= $data->keterangan ?></p>
</div>

<label class="mb-1">Bukti</label>
<div class="mb-3 d-flex justify-content-center">
  <div class="d-flex align-items-center">
    <img src="<?= base_url($data->bukti) ?>" alt="" width="250" class="mr-2">
  </div>
</div>

        <form action="" method="post">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control w-100 mb-2">
                <?php if($data->status == 'Terkirim') : ?>
                    <option value="Terkirim">Terkirim</option>
                    <option value="Diterima">Diterima</option>
                <?php endif; ?>
                <?php if($data->status == 'Diterima') : ?>
                    <option value="Diterima">Diterima</option>
                    <option value="Terkirim">Terkirim</option>
                <?php endif; ?>
            </select>
            <button type="submit" name="update" class="btn btn-success w-100">Ubah Status</button>
        </form>
    </div>
</div>
    </div>
</body>