<body>

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Bencana</h1>
<p class="mb-4">Berikut adalah detail data bencana.</p>

<!-- Content Row -->
<div class="row">

    <!-- Jumlah Bencana Alam Card-->
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-100 py-3">
            <div class="card-body">

                <!-- Nama -->
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-3">
                        <div class="text-xl font-weight-bold text-dark mb-1">Bencana</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="text-xl font-weight-normal text-dark mb-1"><?= $data->bencana; ?></div>
                    </div>
                </div>
                <hr>

                <!-- Umur -->
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-3">
                        <div class="text-xl font-weight-bold text-dark mb-1">Keterangan</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="text-xl font-weight-normal text-dark mb-1"><?= $data->keterangan; ?></div>
                    </div>
                </div>
                <hr>

                <!-- Jenis Kelamin -->
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-3">
                        <div class="text-xl font-weight-bold text-dark mb-1">Lokasi</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="text-xl font-weight-normal text-dark mb-1"><?= $data->lokasi; ?></div>
                    </div>
                </div>
                <hr>

                <!-- Alamat -->
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-3">
                        <div class="text-xl font-weight-bold text-dark mb-1">Tanggal</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="text-xl font-weight-normal text-dark mb-1"><?= $data->tanggal; ?></div>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
    <a href="" class="btn btn-success">Update</a>
    <a href="" class="btn btn-danger">Delete</a>
</div>
</div>
</body>
