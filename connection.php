<!-- File konfigurasi koneksi MySQL -->
<?php
    $server = "localhost:3304"; //lokasi server MySQL
    $username = "root"; // Nama Pengguna MySQL
    $password = "";  // Kata Sandi untuk pengguna MySQL, jika tidak memakai kata sandi kosongkan saja
    $database = "perkuliahan"; // Nama Database
    //Variabel untuk koneksi ke database
    $connection = mysqli_connect($server, $username, $password, $database );
?>