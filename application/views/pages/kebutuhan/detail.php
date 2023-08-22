<body>
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Detail Kebutuhan <?= $kebutuhanPosko->jenis_kebutuhan ?> - <?php echo $nama_posko->posko ?></h1>
<p class="mb-4">Berikut adalah data detail kebutuhan posko yang terdapat di kota Batu.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Update Data</h6>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <label for="kebutuhan" class="mb-1">Kebutuhan</label>
            <input type="text" name="kebutuhan" class="form-control mb-2" value="<?= $kebutuhanPosko->jenis_kebutuhan ?>">
            <label for="jumlah" class="mb-1">Jumlah</label>
            <input type="number" name="jumlah" class="form-control mb-2" value="<?= $kebutuhanPosko->jumlah ?>">
            <label for="status" class="mb-1">Pilih Status</label>
            <select name="status" id="status" class="form-control w-100 mb-2">
                <option value="Dibutuhkan">Dibutuhkan</option>
                <option value="Selesai">Selesai</option>
            </select>
            <label for="posko" class="mb-1">Pilih Posko</label>
            <select name="posko" id="posko" class="form-control w-100 mb-4">
                <?php foreach($posko as $row) : ?>
                    <option value="<?= $row->id_posko ?>"><?= $row->posko ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="update" class="btn btn-success w-100">Update</button>
        </form>
    </div>
</div>

<hr class="mb-4 mt-4">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Bukti Pengiriman</h1>
<p class="mb-4">Berikut adalah data bukti pengiriman kebutuhan.</p>

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
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Foto</th>
                        <th>User</th>
                        <th>Tanggal Pengiriman</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($bukti as $bakti) : ?>
                        <tr>
                            <td><img src="https://th.bing.com/th?id=OSK.cdda3e50229507ddbb0c9e644c7184c6&w=188&h=132&c=7&o=6&pid=SANGAM" alt="" width="100"></td>
                            <td>Nanda</td>
                            <td><?= $bakti->tanggal_pengiriman; ?></td>
                            <td><?= $bakti->keterangan; ?></td>
                            <td>
                                <select name="" id="statuskebutuhan<?= $bakti->id_kebutuhan ?>" class='form-control' onchange="updateStatus(<?= $bakti->id_kebutuhan ?>)">
                                    <?php if ($bakti->status == 'Diterima') : ?>
                                        <option value="1" selected>Diterima</option>
                                        <option value="2">Terkirim</option>
                                    <?php else : ?>
                                        <option value="2" selected>Terkirim</option>
                                        <option value="1">Diterima</option>
                                    <?php endif; ?>
                                </select>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>  
<script src="<?= base_url('public/assets/js/izitoast.min.js') ?>"></script>
<script>
    function updateStatus(id) {
        iziToast.show({
        title: "Loading..",
        color: "blue",
        position: "topRight",
        close: false,
        overlay: true,
        class: 'loadingrefresh'
        })
        var status = $('#statuskebutuhan'+id).val();
        $.ajax({
            url: "<?= base_url('kebutuhan/updateStatus/') ?>"+id,
            type: "POST",
            data: {
                status: status
            },
            success: function(data) {
                iziToast.hide({},document.getElementsByClassName('loadingrefresh')[0])
                iziToast.show({
                    title:'sukses',
                    message:'status berhasil diubah',
                    close:true,
                    overlay:false
                })
            },
            error:function(xhr){
                iziToast.hide({},document.getElementsByClassName('loadingrefresh')[0])
                iziToast.show({
                    title:'gagal',
                    color:'red',
                    message:'ada kesalahan pada server',
                    close:true,
                    overlay:false
                })
            }
        });
    }
</script>
</body>