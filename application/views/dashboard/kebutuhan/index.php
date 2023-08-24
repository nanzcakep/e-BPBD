<body>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Kebutuhan Posko</h1>
<p class="mb-4">Berikut adalah data kebutuhan posko yang terdapat di kota Batu.</p>
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
        <h6 class="m-0 font-weight-bold text-dark">Tabel Data Kebutuhan Posko</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Jenis Kebutuhan</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Jenis Kebutuhan</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach ($kebutuhanPosko as $need) : ?>
                    <tr>
                        <td><?= $need->jenis_kebutuhan ?></td>
                        <td><?= $need->jumlah ?></td>
                        <td><?= $need->status ?></td>
                        <td>
                            <a href="<?= base_url('admin/dashboard/kebutuhan-posko/detail/'.$need->id_kebutuhan) ?>" class='btn btn-primary'>Detail</a>
                            <a href="<?= base_url('admin/dashboard/kebutuhan-posko/update/'.$need->id_kebutuhan) ?>" class='btn btn-success'>Update</a>
                            <a href="<?= base_url('admin/dashboard/kebutuhan-posko/delete/'.$need->id_kebutuhan) ?>" class='btn btn-danger'>Delete</a>
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
        <form action="<?= base_url('admin/dashboard/kebutuhan-posko/tambah'); ?>" method="post">
            <label for="kebutuhan" class="mb-1">Kebutuhan</label>
            <input type="text" name="kebutuhan" class="form-control mb-2 w-100" required>
            <label for="jumlah"class="mb-1">Jumlah</label>
            <input type="number" name="jumlah" class="form-control mb-2 w-100" required>
            <label for="posko"class="mb-1">Pilih Posko</label>
            <select name="posko" id="posko" class="form-control mb-4 w-100" required>
                <?php foreach($data as $posko) : ?>
                    <option value="<?= $posko->id_posko ?>"><?= $posko->posko ?></option>
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