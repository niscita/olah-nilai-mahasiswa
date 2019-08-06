<?php
    function tampil_data($connection){
    $sql = "SELECT * FROM tabel_nilai_perkuliahan";
    $sql_tambah =  "SELECT SUM(sks) AS jumlah FROM tabel_nilai_perkuliahan";
    $sql_rata = "SELECT AVG(nilai) AS rata FROM tabel_nilai_perkuliahan";
    $query = mysqli_query($connection, $sql);
    $query_tambah = mysqli_query($connection, $sql_tambah);
    $query_rata = mysqli_query($connection, $sql_rata);

    echo "<legend><h2>Daftar Nilai</h2><br>";
    
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>Nomor</th>
            <th>Mata Kuliah</th>
            <th>Nilai</th>
            <th>Huruf Mutu</th>
            <th>SKS</th>
            <th>Tindakan</th>
          </tr>";
    
    while($data = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $data['nomor']; ?></td>
                <td><?php echo $data['mata_kuliah']; ?></td>
                <td><?php echo $data['nilai']; ?> </td>
                <td><?php 
                        if ($data['nilai']) {
                            switch($data['nilai']){
                                case $data['nilai'] >= 85:
                                    echo 'A';
                                    break;
                                case $data['nilai'] >= 70:
                                    echo 'B';
                                    break;
                                case $data['nilai'] >= 60:
                                    echo 'C';
                                    break;
                                case $data['nilai'] >= 50:
                                    echo 'D';
                                    break;
                                case $data['nilai'] >= 0:
                                    echo 'E';
                                    break;
                            }
                        }
                ?></td>
                <td><?php echo $data['sks']; ?> </td>
                <td>
                    <a href="index.php?aksi=update&nomor=<?php echo $data['nomor']; ?>&nama=<?php echo $data['mata_kuliah']; ?>&nilai=<?php echo $data['nilai']; ?>&sks=<?php echo $data['sks'];?>"><div class="btn-success">Ubah</div></a>
                    <a href="index.php?aksi=delete&nomor=<?php echo $data['nomor']; ?>"><div class="btn-danger">Hapus</div></a>
                </td>
            </tr>
        <?php
    }
    echo "</table>";
    echo '<br>';
    echo '<table border="1" cellpadding="10">';
    $data_tambah = mysqli_fetch_array($query_tambah);
    $data_rata = mysqli_fetch_array($query_rata);
    ?>
        <td>Jumlah SKS</td>
        <td>Rata - Rata</td>
        <td>IP Semester</td>
        <tr>
            <td><?php echo $data_tambah['jumlah']; ?></td>
            <td><?php echo $data_rata['rata']; ?></td>
        </tr>
    <?php
}
?>