<body>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data korban jiwa</h1>
<p class="mb-4">Berikut adalah data korban jiwa yang terdapat di kota Batu.</p>
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
        <h6 class="m-0 font-weight-bold text-dark">Korban Jiwa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <?php $no = 1; // Inisialisasi nomor awal ?>
                <?php foreach($korbanjiwa as $data) : ?>
                <tbody>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data->nama ?></td>
                        <td><?= $data->umur ?></td>
                        <td><?= $data->jenis_kelamin ?></td>
                        <td><?= $data->alamat ?></td>    
                        <td><?= $data->keterangan ?></td>
                        <td>
                            <a href="<?= base_url('admin/dashboard/korban-jiwa/detail/'.$data->id) ?>" class="btn btn-primary">Detail</a>
                            <a href="<?= base_url('admin/dashboard/korban-jiwa/update/'.$data->id) ?>" class="btn btn-success">Update</a>
                            <a href="<?= base_url('admin/dashboard/korban-jiwa/delete/'.$data->id) ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
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
        <form action="<?= base_url('admin/dashboard/korban-jiwa/tambah'); ?>" method="post">
            <label for="nama" class="mb-1">nama</label>
            <input type="text" name="nama" class="form-control mb-2 w-100">
            <label for="umur"class="mb-1">umur</label>
            <input type="number" name="umur" class="form-control mb-2 w-100">
            <label for="gender"class="mb-1">jenis kelamin</label>
            <select name="gender" id="gender" class="form-control mb-4 w-100">
                 <option value="Laki-laki">Laki-laki</option>
                 <option value="Perempuan">Perempuan</option>
            </select>
            <label for="alamat" class="mb-1">alamat</label>
            <input type="text" name="alamat" class="form-control mb-2 w-100">
            <label for="keterangan" class="mb-1">keterangan</label>
            <input type="text" name="keterangan" class="form-control mb-2 w-100">
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