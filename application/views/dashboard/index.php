

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Jumlah Bencana Alam Card-->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Jumlah Bencana Alam</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dataDashboard['jumlahBencana']; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jumlah Pengungsi Card -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Jumlah Pengungsi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dataDashboard['jumlahPengungsi']; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Presentase Jumlah Bantuan Card -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Jumlah Posko</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dataDashboard['jumlahPosko']; ?></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
<canvas id="kebutuhanPoskoChart" width="400" height="150"></canvas>
</div>

</div>
</div>

<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
        // Data hasil perhitungan dari controller
        var jumlahDisabilitas = <?php echo json_encode($dataDashboard['jumlahDisabilitas']); ?>;
        var jumlahPengungsi = <?php echo json_encode($dataDashboard['jumlahPengungsi']); ?>;
        var jumlahBencana = <?php echo json_encode($dataDashboard['jumlahBencana']); ?>;
        var jumlahKorban = <?php echo json_encode($dataDashboard['jumlahKorban']); ?>;
        // Ambil elemen canvas
        var ctx = document.getElementById('kebutuhanPoskoChart').getContext('2d');

        // Buat grafik dengan Chart.js
        var myChart = new Chart(ctx, {
            type: 'bar', // Tipe grafik (misalnya bar, line, dll.)
            data: {
                labels: ["BPBD KOTA BATU"], // Label sumbu x
                datasets: [
                {
                    label: 'Jumlah Korban', // Label dataset kedua
                    data: [jumlahKorban], // Data kedua
                    backgroundColor: 'rgba(255, 255, 0, 0.2)', // Warna latar belakang dataset kedua (kuning)
                    borderColor: 'rgba(255, 255, 0, 1)', // Warna garis dataset kedua (kuning)
                    borderWidth: 1 // Lebar garis dataset kedua
                },  
                {
                    label: 'Jumlah Pengungsi', // Label dataset kedua
                    data: [jumlahPengungsi], // Data kedua
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Warna latar belakang dataset kedua
                    borderColor: 'rgba(255, 99, 132, 1)', // Warna garis dataset kedua
                    borderWidth: 1 // Lebar garis dataset kedua
                },  
                {
                    label: 'Disabilitas', // Label dataset
                    data: [jumlahDisabilitas], // Data dari perhitungan
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang dataset
                    borderColor: 'rgba(75, 192, 192, 1)', // Warna garis dataset
                    borderWidth: 1 // Lebar garis dataset
                }
                
                // {
                //     label: 'Jumlah Bencana', // Label dataset kedua
                //     data: [jumlahBencana], // Data kedua
                //     backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna latar belakang dataset kedua
                //     borderColor: 'rgba(54, 162, 235, 1)', // Warna garis dataset kedua
                //     borderWidth: 1 // Lebar garis dataset kedua
                // },
                
            ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true // Mulai dari nol pada sumbu Y
                    }
                }
            }
        });
    </script>





