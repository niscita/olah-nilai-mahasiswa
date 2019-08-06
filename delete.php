<?php
// --- Tutup Fungsi Update
// --- Fungsi Delete
function hapus($connection){
    if(isset($_GET['nomor']) && isset($_GET['aksi'])){
        $nomor = $_GET['nomor'];
        $sql_hapus = "DELETE FROM `tabel_nilai_perkuliahan` WHERE `tabel_nilai_perkuliahan`.`nomor`=" . $nomor;
        $hapus = mysqli_query($connection, $sql_hapus);
        
        if($hapus){
            if($_GET['aksi'] == 'delete'){
                header('location: index.php');
            }
        }
    }
    
}