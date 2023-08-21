<body>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Histori Donasi</h1>
<p class="mb-4">Isi data-data dibawah dengan benar.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Amal yang terkumpul</h6>
    </div>
    <ul>
        <?php foreach($histories as $histori) : ?>
            <li><?= $histori->tanggal_pengiriman ?></li>
        <?php endforeach; ?>
    </ul>
</div>
</div>
</body>