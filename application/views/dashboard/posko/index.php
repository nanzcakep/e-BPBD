<body>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Posko</h1>
<p class="mb-4">Berikut adalah data posko-posko yang terdapat di kota Batu.</p>

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
                <?php foreach($data->result() as $row) : ?>
                    <tr>
                        <td>1</td>
                        <td><?= $row->posko ?></td>
                        <td><?= $row->alamat ?> - <?= $row->kota ?></td>
                        <td><?= $row->kapasitas ?></td>
                        <td>
                            <a href="<?= base_url('dashboard/posko/detail/'.$row->id_posko) ?>" class='btn btn-primary'>Detail</a>
                            <a href="<?= base_url('dashboard/posko/update/'.$row->id_posko) ?>" class='btn btn-success'>Update</a>
                            <a href="<?= base_url('dashboard/posko/delete/'.$row->id_posko) ?>" class='btn btn-danger'>Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
</body>