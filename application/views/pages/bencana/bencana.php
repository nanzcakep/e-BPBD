<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <h1>Bencana yang terjadi</h1>
    <ul>
        <?php foreach ($data->result() as $row): ?>
            <li><?= $row->bencana." - ".$row->tanggal; ?></li>
            <a href="<?= base_url('admin/dashboard/bencana/detail/'.$row->id_bencana); ?>">Detail</a> | 
            <a href="<?= base_url('admin/dashboard/bencana/update/'.$row->id_bencana); ?>">Update</a> |
            <a href="<?= base_url('admin/dashboard/bencana/delete/'.$row->id_bencana); ?>">Delete</a>
        <?php endforeach; ?>
    </ul>
    <h2>Tambah data bencana</h2>
    <ul>
        <form action="<?= base_url('admin/dashboard/bencana/tambah'); ?>" method="post">
            <label for="bencana">bencana</label>
            <input type="text" name="bencana">
            <label for="tanggal">tanggal</label>
            <input type="date" name="tanggal">
            <label for="lokasi">lokasi</label>
            <input type="text" name="lokasi">
            <label for="keterangan">keterangan</label>
            <input type="text" name="keterangan">
            <button type="submit">Tambah data</button>
        </form>
    </ul>
</body>
</html>