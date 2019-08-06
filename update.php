<?php
function ubah($connection){
    // ubah data
    if(isset($_POST['btn_ubah'])){
        $nomor = $_POST['nomor'];
        $mt_kuliah = $_POST['mt_kuliah'];
        $nilai = $_POST['nilai'];
        $sks = $_POST['sks'];
        
        
        if(!empty($mt_kuliah) && !empty($nilai) && !empty($sks)){
            $perubahan = "mata_kuliah='".$mt_kuliah."',nilai=".$nilai.",sks=".$sks."";
            $sql_update = "UPDATE tabel_nilai_perkuliahan SET ".$perubahan." WHERE nomor=$nomor";
            $update = mysqli_query($connection, $sql_update);
            if($update && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'update'){
                    header('location: index.php');
                }
            }
        } else {
            $pesan = "Data tidak lengkap!";
        }
    }
    if(isset($_GET['nomor'])){
        ?>    
        
            <a href="index.php"> &laquo; Home</a> | 
            <a href="index.php?aksi=create"> (+) Tambah Data</a>
            <hr>
            <div class="form-group form-inline align-self-center">
            <form action="" method="POST" class="form-ubah ">
            <fieldset>
                <legend><center><h2>Ubah Data</h2></center></legend>
                <input type="hidden" name="nomor" value="<?php echo $_GET['nomor'] ?>"/>
                 <p>Mata Kuliah</p>
                <input type="text" name="mt_kuliah" value="<?php echo $_GET['nama'] ?>"/>
                 <p>Nilai</p>
                <input type="number" name="nilai" value="<?php echo $_GET['nilai'] ?>"/>
                 <p>SKS</p>
                <input type="number" name="sks" value="<?php echo $_GET['sks'] ?>"/>
                <p>a</p>              
                <label>
                    <input type="submit" class="btn-warning" name="btn_ubah" value="Simpan Perubahan"/>
                </label>
                <br>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
                
            </fieldset>
            </form>
        </div>
        <?php
    }
    
}