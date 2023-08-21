<body>

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Pengungsi</h1>
<p class="mb-4">Berikut adalah detail data pengungsi.</p>

<!-- Content Row -->
<div class="row">

    <!-- Jumlah Bencana Alam Card-->
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-100 py-3">
            <div class="card-body">

                <!-- Nama -->
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-3">
                        <div class="text-xl font-weight-bold text-dark mb-1">Nama</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="text-xl font-weight-normal text-dark mb-1"><?= $data->nama; ?></div>
                    </div>
                </div>
                <hr>

                <!-- Umur -->
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-3">
                        <div class="text-xl font-weight-bold text-dark mb-1">Umur</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="text-xl font-weight-normal text-dark mb-1"><?= $data->umur; ?></div>
                    </div>
                </div>
                <hr>

                <!-- Jenis Kelamin -->
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-3">
                        <div class="text-xl font-weight-bold text-dark mb-1">Jenis Kelamin</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="text-xl font-weight-normal text-dark mb-1"><?= $data->jenis_kelamin; ?></div>
                    </div>
                </div>
                <hr>

                <!-- Alamat -->
                <div class="row no-gutters align-items-center">
                    <div class="col-sm-3">
                        <div class="text-xl font-weight-bold text-dark mb-1">Alamat</div>
                    </div>
                    <div class="col-sm-9">
                        <div class="text-xl font-weight-normal text-dark mb-1"><?= $data->alamat; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
