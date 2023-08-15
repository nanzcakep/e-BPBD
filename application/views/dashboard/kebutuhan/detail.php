<body>
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