<body>
    <?php foreach ($data as $row): ?>
        <li><?= $row->bencana; ?> | <a href="<?= base_url('dashboard/bencana/detail/'.$row->id_bencana) ?>">Detail</a></li>
    <?php endforeach; ?>    
</body>