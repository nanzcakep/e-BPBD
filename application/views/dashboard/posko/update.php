<body>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Update Data</h1>
<p class="mb-4">Isi data-data dibawah dengan benar.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Update Data</h6>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <label for="posko" class="mb-1">Nama</label>
            <input type="text" name="posko" class="form-control mb-2 w-100" value="<?= $data->posko; ?>">
            <label for="alamat" class="mb-1">Alamat</label>
            <input type="text" name="alamat" class="form-control mb-2 w-100" value="<?= $data->alamat; ?>">
            <label for="kota" class="mb-1">Kota</label>
            <input type="text" name="kota" class="form-control mb-2 w-100" value="<?= $data->kota; ?>">
            <label for="kapasitas" class="mb-1">Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control mb-2 w-100" value="<?= $data->kapasitas; ?>">
            <label for="id_bencana" class="mb-1">Bencana yang terjadi : </label>
            <select name="id_bencana" id="id_bencana" class="form-control mb-4 w-100">
                <option value="<?= $data->id_bencana; ?>"><?= $data->bencana.' - '.$data->lokasi; ?></option>
                <?php foreach ($bencana as $row) : ?>
                    <?php if ($row->id_bencana !== $data->id_bencana) : ?>
                        <option value="<?= $row->id_bencana; ?>"><?= $row->bencana." - ".$row->lokasi; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="update" class="btn btn-success w-100">Update Data</button>
        </form>
    </div>
</div>
</div>
</body>