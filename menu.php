<!DOCTYPE html>
<html>
<head>
    <title>Input Nilai Mahasiswa</title>
    <link rel="icon" href="http://www.petanikode.com/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/vendor/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/flat-ui.css">
    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</head>
<body>
<?php 
    session_start();
    if($_SESSION['status']=="login"){
        echo "Selamat datang";
    }
    ?>
<!-- Konfigurasi Koneksi Database -->
<?php include('connection.php'); ?>
<!-- Fungsi Tambah Data(Create) -->
<?php include('create.php'); ?>
        <!-- Form Tambah Data -->
        <div class="form-group form-inline align-self-center">
            <form action="" method="POST" class="form-create">
                <legend><h2><p>Tambah Data</p></h2></legend>
                <br>
                <p>Mata Kuliah</p>
                <input type="text" name="mt_kuliah" /><br>
                <p>Nilai</p>
                <input type="number" name="nilai" /> <br>
                <p>SKS</p>
                <input type="number" name="sks" />  <br>
                
                <br>
                <label>
                    <center>
                        <input type="reset" name="reset" value="Reset" class="btn-danger" />
                        <input type="submit" name="btn_simpan" value="Simpan" class="btn-primary" />
                    </center>
                </label>
                <br>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
        </form> 
        </div>
       
<!-- Fungsi Membaca Data Pada Database dan Menampilkan -->
<?php include('read.php'); ?>
<!-- Ubah -->
<?php include('update.php') ?>
<!-- Delete -->
<?php include('delete.php') ?>
<?php
//include('logika-ip.php'); 
// --- Tutup Fungsi Hapus
// ===================================================================
// --- Program Utama
if (isset($_GET['aksi'])){
    switch($_GET['aksi']){
        case "create":
            echo '<a href="index.php"> &laquo; Home</a>';
            tambah($connection);
            break;
        case "read":
            tampil_data($connection);
            break;
        case "update":
            ubah($connection);
            tampil_data($connection);
            break;
        case "delete":
            hapus($connection);
            break;
        default:
            echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidaka ada!</h3>";
            tambah($connection);
            tampil_data($connection);
    }
} else {
    tambah($connection);
    tampil_data($connection);
}
?>
</body>
</html>