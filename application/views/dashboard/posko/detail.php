<body>
    <div>    
        <h2><?= $data->posko; ?></h2>
        <p>Alamat: <?= $data->alamat; ?></p>
        <p>Kota: <?= $data->kota; ?></p>
        <p>Kapasitas: <?= $data->kapasitas; ?></p>
        <p>Bencana Terkait: <?= $data->bencana; ?></p>
        <p>Keterangan: <?= $data->keterangan; ?></p>
    </div>
    <h3>Kebutuhan Posko</h3>
    <div>
    <ul>
        <?php foreach ($kebutuhan as $need) : ?>
            <li><p><?= $need->jenis_kebutuhan; ?> | <?= $need->jumlah; ?> | <?= $need->status; ?> | </p>
            <a href="<?= base_url('dashboard/kebutuhan-posko/detail/'.$need->id_kebutuhan) ?>">lihat bukti</a> |
            <a href="<?= base_url('donasi/'.$need->id_kebutuhan) ?>">Donasi Sekarang</a>
            </li>
        <?php endforeach; ?>    
        </ul>
    </div>
    <h3>Daftar pengungsi</h3>
    <div>
        <ul>
        <?php foreach ($pengungsi as $row) : ?>
            <li><p><?= $row->nama; ?> | <?= $row->umur; ?> year | </p>
            <a href="<?= base_url('dashboard/pengungsi/detail/'.$row->id_pengungsi); ?>">detail</a>
            </li>
        <?php endforeach; ?>    
        </ul>
    </div>
</body>