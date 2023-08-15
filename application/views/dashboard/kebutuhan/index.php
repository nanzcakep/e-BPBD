<body>
    <h1>Kebutuhan Posko</h1>
    <div class="">
        <ul>
            <?php foreach ($kebutuhanPosko as $need) : ?>
                <li><?= $need->jenis_kebutuhan ?></li>
                <li><?= $need->jumlah ?></li>
                <li><?= $need->status ?></li>
                <a href="<?= base_url('dashboard/kebutuhan-posko/detail/'.$need->id_kebutuhan) ?>">Detail</a> | 
                <a href="<?= base_url('dashboard/kebutuhan-posko/edit/'.$need->id_kebutuhan) ?>">Edit</a>
                <br><br>
            <?php endforeach; ?>
            
        </ul>
    </div>
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