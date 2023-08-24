<body>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pengungsi</h1>
<p class="mb-4">Berikut adalah data pengungsi yang terdapat di kota Batu.</p>

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
                        <th>Umur</th>
                        <th>Tanggal Masuk</th>
                        <th>Posko</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Tanggal Masuk</th>
                        <th>Posko</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php $no = 1; // Inisialisasi nomor awal ?>
                <?php foreach($data as $pengungsi) : ?>
                    <tr>
                        <td><?=  $no++ ?></td>
                        <td><?= $pengungsi->nama ?></td>
                        <td><?= $pengungsi->umur ?></td>
                        <td><?= $pengungsi->tanggal_masuk ?></td>
                        <td><?= $pengungsi->posko ?></td>
                        <td>
                            <a href="<?= base_url('admin/dashboard/pengungsi/detail/'.$pengungsi->id_pengungsi) ?>" class='btn btn-primary'>Detail</a>
                            <a href="<?= base_url('admin/dashboard/pengungsi/update/'.$pengungsi->id_pengungsi) ?>" class='btn btn-success'>Update</a>
                            <a href="<?= base_url('admin/dashboard/pengungsi/delete/'.$pengungsi->id_pengungsi) ?>" class='btn btn-danger'>Hapus</a>
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
        <form action="<?= base_url('admin/dashboard/pengungsi/tambah'); ?>" method="post">
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
            <label for="masuk" class="mb-1">tanggal masuk</label>
            <input type="date" name="masuk" class="form-control mb-2 w-100">
            <label for="posko"class="mb-1">Pilih Posko</label>
            <select name="posko" id="posko" class="form-control mb-4 w-100">
                <?php foreach($posko->result() as $poskos) : ?>
                    <option value="<?= $poskos->id_posko ?>"><?= $poskos->posko ?></option>
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