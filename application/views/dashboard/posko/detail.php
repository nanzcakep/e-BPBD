<body>

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $data->posko; ?></h1>
<p class="mb-4">Berikut adalah detail data <?= $data->posko; ?>.</p>

<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">Detail Posko</h6>
            </div>
            <div class="card-body">

                <!-- Alamat -->
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-3">
                        <div class="text-xl font-weight-bold text-dark mb-1">Alamat</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="text-xl font-weight-normal text-dark mb-1"><?= $data->alamat; ?></div>
                    </div>
                </div>
                <hr>

                <!-- Kota -->
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-3">
                        <div class="text-xl font-weight-bold text-dark mb-1">Kota</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="text-xl font-weight-normal text-dark mb-1"><?= $data->kota; ?></div>
                    </div>
                </div>
                <hr>

                <!-- Kapasitas -->
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-3">
                        <div class="text-xl font-weight-bold text-dark mb-1">Kapasitas</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="text-xl font-weight-normal text-dark mb-1"><?= $data->kapasitas; ?></div>
                    </div>
                </div>
                <hr>

                <!-- Bencana Terkait -->
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-3">
                        <div class="text-xl font-weight-bold text-dark mb-1">Bencana Terkait</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="text-xl font-weight-normal text-dark mb-1"><?= $data->bencana; ?></div>
                    </div>
                </div>
                <hr>

                <!-- Keterangan -->
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-3">
                        <div class="text-xl font-weight-bold text-dark mb-1">Keterangan</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="text-xl font-weight-normal text-dark mb-1"><?= $data->keterangan; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Kebutuhan Posko</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Jenis Kebutuhan</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Bukti</th>
                        <th>Donasi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Jenis Kebutuhan</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Bukti</th>
                        <th>Donasi</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach ($kebutuhan as $need) : ?>
                    <tr>
                        <td><?= $need->jenis_kebutuhan; ?></td>
                        <td><?= $need->jumlah; ?></td>
                        <td><?= $need->status; ?></td>
                        <td><a href="<?= base_url('dashboard/kebutuhan-posko/detail/'.$need->id_kebutuhan) ?>" class='btn btn-primary'>Lihat Bukti</a></td>
                        <td><a href="<?= base_url('donasi/'.$need->id_kebutuhan) ?>" class='btn btn-success'>Donasi Sekarang</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Daftar Pengungsi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach ($pengungsi as $row) : ?>
                    <tr>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->umur; ?></td>
                        <td><a href="<?= base_url('dashboard/pengungsi/detail/'.$row->id_pengungsi); ?>" class='btn btn-primary'>detail</a></td>
                    </tr>
                <?php endforeach; ?>    
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

</body>