<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>

<h1>Update data bencana</h1>
<div>
    <ul>
        <form action="" method="post">
            <label for="bencana">bencana</label>
            <input type="text" name="bencana" value="<?= $data->bencana; ?>">
            <label for="tanggal">tanggal</label>
            <input type="date" name="tanggal">
            <label for="lokasi">lokasi</label>
            <input type="text" name="lokasi" value="<?= $data->lokasi; ?>">
            <label for="keterangan">keterangan</label>
            <input type="text" name="keterangan" value="<?= $data->keterangan; ?>">
            <button type="submit" name="update" >Update data</button>
        </form>
    </ul>
</div>
    
</body>
</html>