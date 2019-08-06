<?php 
    function tambah($connection){
    if (isset($_POST['btn_simpan'])){
        $urut = "SELECT nomor FROM tabel_nilai_perkuliahan ORDER BY nomor DESC LIMIT 1";
        $query = mysqli_query($connection, $urut);
        $data = mysqli_fetch_array($query);
        $nomor = $data['nomor'];
        $nomor++;
        $mt_kuliah = $_POST['mt_kuliah'];
        $nilai = $_POST['nilai'];
        $sks = $_POST['sks'];

        if(!empty($mt_kuliah) && !empty($nilai) && !empty($sks)){
            $sql = "INSERT INTO tabel_nilai_perkuliahan (nomor,mata_kuliah, nilai, sks) VALUES(".$nomor.",'".$mt_kuliah."','".$nilai."','".$sks."')";
            $simpan = mysqli_query($connection, $sql);
            if($simpan && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'create'){
                    header('location: index.php');
                }
            }
        } else {
            $pesan = "Tidak dapat menyimpan, data belum lengkap!";
            }
        }
    }
    $nomor_update = "SELECT @no:=@no+1 nomor, mata_kuliah, nilai, sks FROM tabel_nilai_perkuliahan,(SELECT @no:= 0) AS no";
?> 