<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="">
        <link href="<?= base_url('public/assets/css/style_landing.css') ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('public/assets/css/responsive.css') ?>" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

        <!-- Title -->
        <link href="<?= base_url('public/assets/img/logo.png') ?>" rel="icon" type="image/x-icon">
        <title>BPBD Kota Batu</title>
    </head>

    <body>
    
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark w-100 fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/index.html">
                    <div class="d-flex align-items-center">
                        <div>
                            <img src="<?= base_url('public/assets/img/logo.png') ?>" alt="" width="43" height="43" class="d-inline-block align-text-top me-3">

                        </div>
                        <div>
                            <p class="nama1 my-0">BPBD</p>
                            <p class="nama2 my-0">Kota Batu</p>
                        </div>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-2">
                            <a href="#pagetitle" class="nav-link active">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="#posko" class="nav-link active">Posko</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="#peta" class="nav-link active">Alamat Kantor</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="#link" class="nav-link active">Link Terkait</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="#footer" class="nav-link active">Kontak</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="<?= base_url('/login') ?>" class="nav-link active">login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Title Section -->
        <section id="pagetitle" style="background-image: url('<?= base_url('public/assets/img/hero.png') ?>');
        background-size: cover;
        background-repeat: no-repeat;">
        <div class="black-transparent-layer">
            <div class="container w-100 h-100">
                <div class="row justify-content-center ">
                    <div class="col-md-12 text-center">
                        <h2>SELAMAT DATANG DI WEBSITE RESMI</h2>
                        <h1>Badan Penanggulangan Bencana Daerah</h1>
                        <h1>Kota Batu</h1>
                    </div>
                </div>
            </div>
        </div>
        </section>

        <!-- Posko Section -->
        <section id="posko">
            <div class="container h-auto">
                <div class="col-md-12 text-center">
                    <h1 class="h3 mb-1">Data Posko</h1>
                    <p class="mb-5">Berikut adalah data posko-posko yang terdapat di kota Batu.</p>
                </div>
                <div class="col-md-12 card-posko rounded-3 p-5 shadow-lg">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Posko</th>
                            <th>Alamat</th>
                            <th>Kapasitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataPosko->result() as $posko) : ?>
                            <tr>
                                <td>1</td>
                                <td><?= $posko->posko ?></td>
                                <td><?= $posko->alamat ?></td>
                                <td><?= $posko->kapasitas ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </section>

        <!-- Peta Section -->
        <section id="peta">
            <div class="container h-auto">
                <div class="col-md-12 text-center">
                    <h1 class="h3 mb-1">Alamat Kantor</h1>
                    <p class="mb-5">Jl. Panglima Sudirman No.507, Pesanggrahan, Kec. Batu, Kota Batu, Jawa Timur 65313</p>
                </div>
                <div class="col-md-12 card-peta rounded-3 p-5 shadow-lg">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3952.283886452018!2d112.5174711!3d-7.8653321!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7887481c10aaa3%3A0x72d1ee5fca449d5d!2sBalai%20Kota%20Among%20Tani%20Kota%20Batu!5e0!3m2!1sid!2sid!4v1692542216498!5m2!1sid!2sid" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>

        <!-- Link Terkait Section -->
        <section id="link">
            <div class="container h-auto">
                <div class="col-md-12 text-center">
                    <h1 class="h3 mb-1">Link Terkait</h1>
                    <p class="mb-5">Berikut beberapa link yang terkait dengan website ini.</p>
                </div>
                <div class="row gx-5">
                    <div class="col-md-3 mb-4">
                        <a href="https://bnpb.go.id/" style="text-decoration: none;">
                            <div class="card-peta rounded-2 p-4 shadow text-center">
                                <img src="<?= base_url('public/assets/img/bnpb.png') ?>" height="110px" class="mb-3 mt-2">
                                <h2>BNPB</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-4">
                        <a href="https://bmkg.go.id/" style="text-decoration: none;">
                            <div class="card-peta rounded-2 p-4 shadow text-center">
                                <img src="<?= base_url('public/assets/img/bmkg.png') ?>" height="110px" class="mb-3 mt-2">
                                <h2>BMKG</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-4">
                        <a href="https://vsi.esdm.go.id/" style="text-decoration: none;">
                            <div class="card-peta rounded-2 p-4 shadow text-center">
                                <img src="<?= base_url('public/assets/img/BadanGeologi.png') ?>" height="110px" class="mb-3 mt-2">
                                <h2>PVMBG</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-4">
                        <a href="https://jatimprov.go.id/" style="text-decoration: none;">
                            <div class="card-peta rounded-2 p-4 shadow text-center">
                                <img src="<?= base_url('public/assets/img/jatim.png') ?>" height="110px" class="mb-3 mt-2">
                                <h2>Pemprov. Jawa Timur</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <section id="footer">
            <div class="container h-auto">
                <div class="col-md-12 d-flex w-100 mb-4">
                    <img src="<?= base_url('public/assets/img/logo.png') ?>"  width="60px" height="60px">
                    <div class="ms-3">
                        <h1>BPBD</h1>
                        <h1>Kota Batu</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 p-4">
                        <h6 class="mb-3 ">Kantor BPBD Kota Batu - Jl. Panglima Sudirman No.507, Pesanggrahan, Kec. Batu, Kota Batu, Jawa Timur 65313</h6>
                        <div class="mb-2">
                            <i class="fa fa-phone" style="font-size:14px; color:white;">
                                <span class="ms-3">03415106734</span></i>
                        </div>
                        <i class="fa fa-envelope mb-2" style="font-size:14px; color:white;">
                            <span class="ms-3 mb-2">bpbdkotawisatabatu@gmail.com</span></i>
                    </div>
                    <div class="col-md-4 p-4">
                        <h6 class="mb-3 ">Posko Penanggulangan Bencana - Jl. Raya Punten No.8A, Punten, Kec. Bumiaji, Kota Batu, Jawa Timur 65338</h6>
                        <div class="mb-2">
                            <i class="fa fa-phone" style="font-size:14px; color:white;">
                                <span class="ms-3">081217104099</span></i>
                        </div>
                        <i class="fa fa-envelope mb-2" style="font-size:14px; color:white;">
                            <span class="ms-3 mb-2">pusdalopsbpbdkwb@gmail.com</span></i>
                    </div>
                    <div class="col-md-4 p-4">
                        <h6 class="mb-2">Kontak Kami</h6>
                        <div class="mb-2">
                            <a href="wa.me/6281217104099" style="text-decoration: none;">
                                <i class="fa fa-whatsapp" style="font-size:14px; color:white;">
                                    <span class="ms-3">081217104099</span></i>
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="https://www.instagram.com/bpbd.kotabatu/" style="text-decoration: none;">
                                <i class="fa fa-instagram" style="font-size:14px; color:white;">
                                    <span class="ms-3">bpbd.kotabatu</span></i>
                            </a>
                        </div>
                        <div>
                            <a href="https://twitter.com/BPBD_Batu" style="text-decoration: none;">
                                <i class="fa fa-twitter" style="font-size:14px; color:white;">
                                    <span class="ms-3">@BPBD_Batu</span></i>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="new1 mb-4 mt-4">
                <div class="col-md-12 text-center">
                    <h5 class="copyright mb-3">© Copyright BPBD Kota Batu. All Rights Reserved</h5>
                </div>
            </div>
        </section>

        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

        <script>
            new DataTable('#example', {
                responsive: true,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                }
            });
        </script>

    </body>
</html>