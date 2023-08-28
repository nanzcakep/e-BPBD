<body>
<div class="container-fluid">


<hr class="mb-4 mt-4">
<h1 class="h3 mb-2 text-gray-800">Detail Kebutuhan <?= $kebutuhanPosko->jenis_kebutuhan ?> - <?php echo $nama_posko->posko ?></h1>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Bukti Pengiriman</h1>
<p class="mb-4">Berikut adalah data bukti pengiriman kebutuhan.</p>
<?php if ($this->session->flashdata('success_message')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success_message') ?>
    </div>
<?php endif; ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Tabel Bukti Pengiriman</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>User</th>
                        <th>Tanggal Pengiriman</th>
                      
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Foto</th>
                        <th>User</th>
                        <th>Tanggal Pengiriman</th>
                        
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($bukti as $bakti) : ?>
                        <tr>
                            <td><img src="<?= base_url(''.$bakti->bukti) ?>" alt="" width="100"></td>
                            <td><?= $bakti->username ?></td>
                            <td><?= $bakti->tanggal_pengiriman; ?></td>
                            <td><?= $bakti->status; ?></td>
                            <td>
                                <a href="<?= base_url('admin/dashboard/donasi/detail/'.$bakti->id_pengiriman) ?>">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>  

</body>