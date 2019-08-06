<!DOCTYPE html>
<html>
<head>
    <title>CRUD Petani Kode</title>
    <link rel="icon" href="http://www.petanikode.com/favicon.ico" />
</head>
<body>

<?php
// --- koneksi ke database
$koneksi = mysqli_connect("localhost:3304","root","","perkuliahan") or die(mysqli_error());
// --- Fngsi tambah data (Create)
function tambah($koneksi){
    
    if (isset($_POST['btn_simpan'])){
        $id = time();
        $mt_kuliah = $_POST['mt_kuliah'];
        $nilai = $_POST['nilai'];
        $sks = $_POST['sks'];
        
        
        if(!empty($mt_kuliah) && !empty($nilai) && !empty($sks)){
            $sql = "INSERT INTO tabel_nilai_perkuliahan (id,mata_kuliah, nilai, sks) VALUES(".$id.",'".$mt_kuliah."','".$nilai."','".$sks."')";
            $simpan = mysqli_query($koneksi, $sql);
            if($simpan && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'create'){
                    header('location: index.php');
                }
            }
        } else {
            $pesan = "Tidak dapat menyimpan, data belum lengkap!";
        }
    }
    ?> 
        <form action="" method="POST">
            <fieldset>
                <legend><h2>Tambah data</h2></legend>
                <label>Mata Kuliah <input type="text" name="mt_kuliah" /></label> <br>
                <label>Nilai <input type="number" name="nilai" /> </label><br>
                <label>SKS <input type="number" name="sks" /> </label> <br>
                
                <br>
                <label>
                    <input type="submit" name="btn_simpan" value="Simpan"/>
                    <input type="reset" name="reset" value="Besihkan"/>
                </label>
                <br>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
            </fieldset>
        </form>
    <?php
}
// --- Tutup Fngsi tambah data
// --- Fungsi Baca Data (Read)
function tampil_data($koneksi){
    $sql = "SELECT * FROM tabel_nilai_perkuliahan";
    $query = mysqli_query($koneksi, $sql);
    
    echo "<fieldset>";
    echo "<legend><h2>Data Panen</h2></legend>";
    
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>ID</th>
            <th>Mata Kuliah</th>
            <th>Nilai</th>
            <th>SKS</th>
            <th>Tindakan</th>
          </tr>";
    
    while($data = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['mata_kuliah']; ?></td>
                <td><?php echo $data['nilai']; ?> </td>
                <td><?php echo $data['sks']; ?> </td>
                <td>
                    <a href="index.php?aksi=update&id=<?php echo $data['id']; ?>&nama=<?php echo $data['mata_kuliah']; ?>&nilai=<?php echo $data['nilai']; ?>&sks=<?php echo $data['sks'];?>">Ubah</a> |
                    <a href="index.php?aksi=delete&id=<?php echo $data['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php
    }
    echo "</table>";
    echo "</fieldset>";
}
// --- Tutup Fungsi Baca Data (Read)
// --- Fungsi Ubah Data (Update)
function ubah($koneksi){
    // ubah data
    if(isset($_POST['btn_ubah'])){
        $id = $_POST['id'];
        $mt_kuliah = $_POST['mt_kuliah'];
        $nilai = $_POST['nilai'];
        $sks = $_POST['sks'];
        
        
        if(!empty($mt_kuliah) && !empty($nilai) && !empty($sks)){
            $perubahan = "mata_kuliah='".$mt_kuliah."',nilai=".$nilai.",sks=".$sks."";
            $sql_update = "UPDATE tabel_nilai_perkuliahan SET ".$perubahan." WHERE id=$id";
            $update = mysqli_query($koneksi, $sql_update);
            if($update && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'update'){
                    header('location: index.php');
                }
            }
        } else {
            $pesan = "Data tidak lengkap!";
        }
    }
    
    // tampilkan form ubah
    if(isset($_GET['id'])){
        ?>
            <a href="index.php"> &laquo; Home</a> | 
            <a href="index.php?aksi=create"> (+) Tambah Data</a>
            <hr>
            
            <form action="" method="POST">
            <fieldset>
                <legend><h2>Ubah data</h2></legend>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
                <label>Mata Kuliah <input type="text" name="mt_kuliah" value="<?php echo $_GET['nama'] ?>"/></label> <br>
                <label>Nilai <input type="number" name="nilai" value="<?php echo $_GET['nilai'] ?>"/> </label><br>
                <label>SKS <input type="number" name="sks" value="<?php echo $_GET['sks'] ?>"/> </label> <br>
                
                <label>
                    <input type="submit" name="btn_ubah" value="Simpan Perubahan"/> atau <a href="index.php?aksi=delete&id=<?php echo $_GET['id'] ?>"> (x) Hapus data ini</a>!
                </label>
                <br>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
                
            </fieldset>
            </form>
        <?php
    }
    
}
// --- Tutup Fungsi Update
// --- Fungsi Delete
function hapus($koneksi){
    if(isset($_GET['id']) && isset($_GET['aksi'])){
        $id = $_GET['id'];
        $sql_hapus = "DELETE FROM tabel_nilai_perkuliahan WHERE id=" . $id;
        $hapus = mysqli_query($koneksi, $sql_hapus);
        
        if($hapus){
            if($_GET['aksi'] == 'delete'){
                header('location: index.php');
            }
        }
    }
    
}
// --- Tutup Fungsi Hapus
// ===================================================================
// --- Program Utama
if (isset($_GET['aksi'])){
    switch($_GET['aksi']){
        case "create":
            echo '<a href="index.php"> &laquo; Home</a>';
            tambah($koneksi);
            break;
        case "read":
            tampil_data($koneksi);
            break;
        case "update":
            ubah($koneksi);
            tampil_data($koneksi);
            break;
        case "delete":
            hapus($koneksi);
            break;
        default:
            echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidaka ada!</h3>";
            tambah($koneksi);
            tampil_data($koneksi);
    }
} else {
    tambah($koneksi);
    tampil_data($koneksi);
}
?>
</body>
</html>