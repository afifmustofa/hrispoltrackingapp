<?php
//melakukan koneksi ke database
// host = localhost, user = root, password = '', database = latihan
$koneksi        = mysqli_connect("localhost", "root", "", "hrispoltracking");

//ambil data mahasiswa dimana jenis kelamin adalah laki-laki
$lakilaki       = mysqli_query($koneksi, "SELECT jen_kel FROM tb_karyawan WHERE jen_kel = 'L' ");

//ambil data mahasiswa dimana jenis kelamin adalah perempuan
$perempuan      = mysqli_query($koneksi, "SELECT jen_kel FROM tb_karyawan WHERE jen_kel = 'P' ");
?>

<html>
    <head>

        <!-- import library chart menggunakan cdn -->
        <script src="assets/vendor/chart.js/chart.min.js"></script>
        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <canvas id="myChart" ></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart").getContext("2d");
            var myChart = new Chart(ctx, {
                // tipe chart
                type: 'pie',
                data: {

                    //karena hanya menggunakan 2 batang
                    //maka buat dua lebel, yaitu lebel laki-laki dan perempuan
                    labels: ['Laki-laki', 'Perempuan'],

                    //dataset adalah data yang akan ditampilkan
                    datasets: [{
                            label: 'jumlah jenis kelamin',

                            //karena hanya menggunakan 2 batang/bar
                            //maka 2 sql yang dibutuhkan
                            //hitung jumlah mahasiswa laki-laki dan jumlah mahasiswa perempuan
                            data: [
                                <?php echo mysqli_num_rows($lakilaki); ?>,
                                <?php echo mysqli_num_rows($perempuan);?>,
                            ],

                            //atur background barchartnya
                            //karena cuma dua, maka 2 saja yang diatur
                            backgroundColor: [
                                'rgb(6, 57, 112)',
                                'rgb(242, 29, 129)'
                            ],

                            //atur border barchartnya
                            //karena cuma dua, maka 2 saja yang diatur
                            borderColor: [
                                'rgb(6, 57, 112)',
                                'rgb(242, 29, 129)',
                                
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
    </body>
</html>