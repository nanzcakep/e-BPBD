<body>
    <div class="container-fluid">
        <!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Kebutuhan <?= $kebutuhanPosko->jenis_kebutuhan ?> - <?php echo $nama_posko->posko ?></h1>
<p class="mb-4">Berikut adalah data detail kebutuhan posko yang terdapat di kota Batu.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Update Data</h6>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <label for="kebutuhan" class="mb-1">Kebutuhan</label>
            <input type="text" name="kebutuhan" class="form-control mb-2" value="<?= $kebutuhanPosko->jenis_kebutuhan ?>">
            <label for="jumlah" class="mb-1">Jumlah</label>
            <input type="number" name="jumlah" class="form-control mb-2" value="<?= $kebutuhanPosko->jumlah ?>">
            <label for="status" class="mb-1">Pilih Status</label>
            <select name="status" id="status" class="form-control w-100 mb-2">
                <option value="Dibutuhkan">Dibutuhkan</option>
                <option value="Selesai">Selesai</option>
            </select>
            <label for="posko" class="mb-1">Pilih Posko</label>
            <select name="posko" id="posko" class="form-control w-100 mb-4">
                <?php foreach($posko as $row) : ?>
                    <option value="<?= $row->id_posko ?>"><?= $row->posko ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="update" class="btn btn-success w-100">Update</button>
        </form>
    </div>
</div>
    </div>
</body>