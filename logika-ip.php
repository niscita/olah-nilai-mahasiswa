<?php 
    include 'connection.php';
    $sql_nilai = "SELECT nilai FROM tabel_nilai_perkuliahan";
    $query_nilai = mysqli_query($connection, $sql_nilai);
    $mutu_sks = "INSERT INTO tabel_nilai_perkuliahan (mutu_sks) VALUES";
    $a = 4; $b = 3; $c = 2; $d = 1; $e = 0;
    $sks = "SELECT sks FROM tabel_nilai_perkuliahan";

    while ($data_nilai = $sql_nilai) {
        if ($data_nilai) {
            switch ($data_nilai) {
                case $data_nilai >= 85:
                $mutu_sks1 = "INSERT INTO tabel_nilai_perkuliahan (mutu_sks) VALUES(".$a*floatval($sks).")";
                    break;
                case $data_nilai >= 70:
                $mutu_sks2 = "INSERT INTO tabel_nilai_perkuliahan (mutu_sks) VALUES(".$b*floatval($sks).")";
                    break;
                case $data_nilai >= 60:
                $mutu_sks3 = "INSERT INTO tabel_nilai_perkuliahan (mutu_sks) VALUES(".$c*floatval($sks).")";
                    break;
                case $data_nilai >= 50:
                $mutu_sks4 = "INSERT INTO tabel_nilai_perkuliahan (mutu_sks) VALUES(".$d*floatval($sks).")";
                    break;
                case $data_nilai >= 0:
                $mutu_sks5 = "INSERT INTO tabel_nilai_perkuliahan (mutu_sks) VALUES(".$e*floatval($sks).")";
                    break;
             }
        }
    }



 ?>