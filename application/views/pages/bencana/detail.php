<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=  $title ?></title>
</head>
<body>

    <h1>Detail bencana yang terjadi</h1>
        <ul>
            <li><?= $data->bencana; ?></li>
            <li><?= $data->tanggal; ?></li>
            <li><?= $data->lokasi; ?></li>
            <li><?= $data->keterangan; ?></li>
        </ul>
</body>
</html>