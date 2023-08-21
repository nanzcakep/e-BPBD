<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengungsi</title>
</head>
<body>
    <h1>Detail Pengungsi</h1>
    <ul>
        <li><p><?= $data->nama; ?></p></li>
        <li><p><?= $data->umur; ?></p></li>
        <li><p><?= $data->jenis_kelamin; ?></p></li>
        <li><p><?= $data->alamat; ?></p></li>
    </ul>
</body>
</html>