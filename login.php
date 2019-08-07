<?php 
/*include 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($connection,"select * from data_login where nim='$username' and password='$password'");
$cek = mysqli_num_rows($query);

if ($cek > 0) {
    echo '<h2>Selamat Anda Berhasil Login, silahkan klik <a href="http://localhost/maha"> Disini</a>';
} else {
    echo 'Gagal Login';
}*/
?>
<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'connection.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($connection,"select * from data_login where nim='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:menu.php");
}else{
    echo 'gagal';
}
?>