<body>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Posko</h1>
<p class="mb-4">Berikut adalah data posko-posko yang terdapat di kota Batu.</p>
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
        <h6 class="m-0 font-weight-bold text-dark">Tabel Data Posko</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kapasitas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kapasitas</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php $no = 1; // Inisialisasi nomor awal ?>
                <?php foreach($data->result() as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->posko ?></td>
                        <td><?= $row->alamat ?> - <?= $row->kota ?></td>
                        <td><?= $row->kapasitas ?></td>
                        <td>
                            <a href="<?= base_url('admin/dashboard/posko/detail/'.$row->id_posko) ?>" class='btn btn-primary'>Detail</a>
                            <a href="<?= base_url('admin/dashboard/posko/update/'.$row->id_posko) ?>" class='btn btn-success'>Update</a>
                            <a href="<?= base_url('admin/dashboard/posko/delete/'.$row->id_posko) ?>" class='btn btn-danger'>Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<hr class="mb-4 mt-4">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Tambah Data</h6>
    </div>
    <div class="card-body">
        
        <form action="<?= base_url('admin/dashboard/posko/tambah'); ?>" method="post">
            <label for="posko" class="mb-1">posko</label>
            <input type="text" name="posko" class="form-control mb-2 w-100" required>
            <label for="alamat"class="mb-1">alamat</label>
            <input type="text" name="alamat" class="form-control mb-2 w-100" required>
            <label for="kota"class="mb-1">kota</label>
            <input type="text" name="kota" class="form-control mb-2 w-100" required>
            <label for="kapasitas"class="mb-1">kapasitas</label>
            <input type="number" name="kapasitas" class="form-control mb-2 w-100" required>
            <label for="id_bencana"class="mb-1">Bencana</label>
            <select name="id_bencana" id="id_bencana" class="form-control mb-4 w-100" required>
                <?php foreach($bencana as $bencanas) : ?>
                    <option value="<?= $bencanas->id_bencana ?>"><?= $bencanas->bencana.' - '.$bencanas->lokasi ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-primary w-100">Tambah</button>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
</body>