<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>This Page Update</h1>
    <div>
        <ul>
            <form action="" method="post">
                <label for="posko">nama</label>
                <input type="text" name="posko" value="<?= $data->posko; ?>">
                <label for="alamat">alamat</label>
                <input type="text" name="alamat"  value="<?= $data->alamat; ?>">
                <label for="kota">kota</label>
                <input type="text" name="kota"  value="<?= $data->kota; ?>">
                <label for="kapasitas">kapasitas</label>
                <input type="number" name="kapasitas"  value="<?= $data->kapasitas; ?>">
                <label for="id_bencana">bencana yang terjadi : </label>
                <select name="id_bencana" id="id_bencana">
                    <option value="<?= $data->id_bencana; ?>"><?= $data->bencana.' - '.$data->lokasi; ?></option>
                    <?php foreach ($bencana->result() as $row) : ?>
                        <?php if ($row->id_bencana !== $data->id_bencana) : ?>
                            <option value="<?= $row->id_bencana; ?>"><?= $row->bencana." - ".$row->lokasi; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="update" >Update data</button>
            </form>
        </ul>
    </div>
</body>
</html>