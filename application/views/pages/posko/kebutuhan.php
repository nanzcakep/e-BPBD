<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebutuhan Posko</title>
</head>
<body>
    <h1>Kebutuhan Posko</h1>
    <div>
        <ul>
            <form action="<?= base_url('dashboard/kebutuhan-posko/tambah'); ?>" method="post">
                <label for="kebutuhan">kebutuhan</label>
                <input type="text" name="kebutuhan">
                <label for="jumlah">jumlah</label>
                <input type="number" name="jumlah">
                <label for="posko">Pilih Posko</label>
                <select name="posko" id="posko">
                    <?php foreach($data as $posko) : ?>
                        <option value="<?= $posko->id_posko ?>"><?= $posko->posko ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Tambah</button>
            </form>
        </ul>
    </div>
</body>
</html>