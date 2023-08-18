<body>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Bencana</h1>
<p class="mb-4">Berikut adalah detail data bencana yang pernah terjadi di kota Batu.</p>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Tabel Detail Data Bencana</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Bencana</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Bencana</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Keterangan</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td><?= $data->bencana; ?></td>
                        <td><?= $data->tanggal; ?></td>
                        <td><?= $data->lokasi; ?></td>
                        <td><?= $data->keterangan; ?></td>
                    </tr>
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