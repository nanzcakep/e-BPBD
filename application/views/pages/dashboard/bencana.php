<body id="page-top">
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Bencana</h1>
<p class="mb-4">Berikut adalah data bencana yang terdapat di kota Batu.</p>

<!-- Content Row -->
<div class="row">

    <?php foreach ($data as $row): ?>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-dark text-uppercase mb-1"><?= $row->bencana; ?></div>
                            <div class="h5 mb-0 mt-2">
                                <a href="<?= base_url('dashboard/bencana/detail/'.$row->id_bencana) ?>" class="btn btn-dark">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?> 

</div>


<!-- DataTales Example -->

</div>
</body>