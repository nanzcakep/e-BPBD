<body>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Update data pengungsi</h1>
<p class="mb-4">Isi data-data dibawah dengan benar.</p>
<?php if ($this->session->flashdata('success_message')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success_message') ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error_message')) : ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error_message') ?>
    </div>
<?php endif; ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Update Data</h6>
    </div>
    <div class="card-body">
    <form action="" method="post">
            <label for="nama" class="mb-1">nama</label>
            <input type="text" name="nama" class="form-control mb-2 w-100" value="<?= $pengungsi->nama ?>">
            <label for="umur"class="mb-1">umur</label>
            <input type="number" name="umur" class="form-control mb-2 w-100" value="<?= $pengungsi->umur ?>">
            <label for="gender"class="mb-1">jenis kelamin</label>
            <select name="gender" id="gender" class="form-control mb-4 w-100">
                 <option value="Laki-laki">Laki-laki</option>
                 <option value="Perempuan">Perempuan</option>
            </select>
            <label for="alamat" class="mb-1">alamat</label>
            <input type="text" name="alamat" class="form-control mb-2 w-100" value="<?= $pengungsi->alamat ?>">
            <label for="masuk" class="mb-1">tanggal masuk</label>
            <input type="date" name="masuk" class="form-control mb-2 w-100">
            <label for="posko"class="mb-1">Pilih Posko</label>
            <select name="posko" id="posko" class="form-control mb-4 w-100">
                <?php foreach($data->result() as $posko) : ?>
                    <option value="<?= $posko->id_posko ?>"><?= $posko->posko ?></option>
                <?php endforeach; ?>
            </select>
            <label>
                Disabilitas
                <input type="checkbox" name="disabilitas" value="Yes" <?php echo $pengungsi->is_disabilitas === "Yes" ? 'checked' : ''; ?>>
            </label>
            <button type="submit" name="update" class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</div>
</div>
</body>