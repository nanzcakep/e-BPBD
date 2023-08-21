<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>
<body>
    <h1>Posko</h1>

    <ul>
        <?php foreach ($data->result() as $row): ?>
            <li><?= $row->posko  ?></li>
            <a href="<?= base_url('dashboard/posko/detail/'.$row->id_posko); ?>">Detail</a> | 
            <a href="<?= base_url('dashboard/posko/update/'.$row->id_posko); ?>">Update</a> |
            <a href="<?= base_url('dashboard/posko/delete/'.$row->id_posko); ?>">Delete</a>
        <?php endforeach; ?>
    </ul>

    <h2>Tambah data posko</h2>
    <ul>
        <form action="<?= base_url('dashboard/posko/tambah'); ?>" method="post">
            <label for="posko">nama</label>
            <input type="text" name="posko">
            <label for="alamat">alamat</label>
            <input type="text" name="alamat">
            <label for="kota">kota</label>
            <input type="text" name="kota">
            <label for="kapasitas">kapasitas</label>
            <input type="number" name="kapasitas">
            <label for="id_bencana">bencana yang terjadi : </label>
            <select name="id_bencana" id="id_bencana">
                <?php foreach ($bencana->result() as $row) : ?>
                    <option value="<?= $row->id_bencana; ?>"><?= $row->bencana." - ".$row->lokasi; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Tambah data</button>
        </form>
    </ul>
</body>
</html>