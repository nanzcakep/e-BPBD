<body>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detail Donasi</h1>
        <!-- Tampilan Data Donasi -->
        <?php if (!empty($detailDonasi)) { ?>
            <div class="card">
                <div class="card-body">
                    <p><strong>Posko:</strong> <?= $detailDonasi->posko ?></p>
                    <p><strong>Tanggal Pengiriman:</strong> <?= $detailDonasi->tanggal_pengiriman ?> </p>
                    <p></strong> <img src="<?= base_url(''.$detailDonasi->bukti) ?>" alt="Bukti Donasi"></p>
                    <p><strong>Keterangan:</strong> <?= $detailDonasi->keterangan ?> </p>
                    <p><strong>Status:</strong> <?= $detailDonasi->status ?></p>
                    <p><strong>Jenis Kebutuhan: </strong> <?= $detailDonasi->jenis_kebutuhan ?> </p>
                </div>
            </div>
        <?php } else { ?>
            <p>Data donasi tidak ditemukan.</p>
        <?php } ?>

</div>
</body>