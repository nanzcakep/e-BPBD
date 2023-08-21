<body>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Donasi Masuk Surga</h1>
<p class="mb-4">Isi data-data dibawah dengan benar.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Donasi Masuk Surga</h6>
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

            <label for="kebutuhan" class="mb-1">Jenis Kebutuhan</label>
            <input type="text" name="kebutuhan" class="form-control mb-2 w-100" value="<?= $kebutuhan->jenis_kebutuhan ?>" readonly>

            <label for="tanggal" class="mb-1">Tanggal</label>
            <input type="date" name="tanggal" class="form-control mb-2 w-100">

            <label for="bukti" class="mb-1">bukti</label>
            <input type="text" name="bukti" class="form-control mb-2 w-100">
            
            <!-- <label for="bukti" class="mb-1">Bukti</label>
            <input type="file" name="bukti" class="form-control-file mb-2" accept=".jpg, .jpeg, .png, .pdf"> -->
            
            <label for="keterangan" class="mb-1">Keterangan</label>
            <input type="text" name="keterangan" class="form-control mb-4 w-100">
            
            <button type="submit" name="donasi" class="btn btn-primary w-100">Donasi Sekarang</button>
        </form>

    </div>
</div>
</div>
</body>