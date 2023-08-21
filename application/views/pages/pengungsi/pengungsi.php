<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>
</head>
<body>
    <h1>Data Posko dan Pengungsi</h1>
    <div>
        <ul>
            <?php foreach ($data as $row) : ?>
            <li><p><?= $row->nama; ?> | <?= $row->posko; ?> |  
            <a href="<?= base_url('admin/dashboard/pengungsi/detail/'.$row->id_pengungsi); ?>">detail</a> </p></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="">
        <form action="" method="">

        </form>
    </div>
    
    
</body>
</html>
