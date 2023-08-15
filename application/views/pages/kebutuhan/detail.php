<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kebutuhan</title>
</head>
<body>

    <h1>Detail Kebutuhan <?= $kebutuhanPosko->jenis_kebutuhan ?> - <?php echo $nama_posko->posko ?> </h1>
    <ul>
        <form action="" method="post">
            <label for="kebutuhan">kebutuhan</label>
            <input type="text" name="kebutuhan" value="<?= $kebutuhanPosko->jenis_kebutuhan ?>">
            <label for="jumlah">jumlah</label>
            <input type="number" name="jumlah" value="<?= $kebutuhanPosko->jumlah ?>">
            <label for="status">Pilih status</label>
            <select name="status" id="status">
                <option value="Dibutuhkan">Dibutuhkan</option>
                <option value="Selesai">Selesai</option>
            </select>
            <label for="posko">Pilih Posko</label>
            <select name="posko" id="posko">
                <?php foreach($posko as $row) : ?>
                    <option value="<?= $row->id_posko ?>"><?= $row->posko ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="update">Update</button>
        </form>
    </ul>
    <h1>Bukti Pengiriman</h1>
    <ul>
        <?php foreach($bukti as $bakti) : ?>
            <li>
                <img src="https://th.bing.com/th?id=OSK.cdda3e50229507ddbb0c9e644c7184c6&w=188&h=132&c=7&o=6&pid=SANGAM" alt="" width="100">
                <ul>
                    <li>User : Nanda</li>
                    <li>Tanggal Pengiriman: <?= $bakti->tanggal_pengiriman; ?></li>
                    <li>Keterangan: <?= $bakti->keterangan; ?></li>
                    <li>Status: <?= $bakti->status; ?></li>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>