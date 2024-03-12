

<?php
require_once ('master.php');

$q = "SELECT * FROM santri WHERE id='".$_GET['id']."'";
$query = mysqli_query ($con,$q);

echo "id ono km = ".htmlspecialchars($_GET['id']); //melawan xss dengan menggunakan htmlspesialchars

$id ="";
$nama ="";
$kota ="";
$jrs ="";


while ($hasil = mysqli_fetch_array ($query)){
    $id = $hasil['id'];
    $nama = $hasil['nama'];
    $kota = $hasil['kota_asal'];
    $jrs = $hasil['jurusan_id'];
}




?>


<form action="updatee.php" method="POST">
    <input type='hidden' name='ipId' value='<?php echo $id ?>' > <!-- didalam echho $ nya ambil dari variabel diatas,,variabel diatas ambil dari database santri  -->
    Nama : <input type='text' name='ipNama' value='<?php echo $nama ?>' ><br> <!-- didalam echho $ nya ambil dari variabel diatas,,variabel diatas ambil dari database santri  -->
    Kota Asal : <input type='text' name='ipKotaAsal' value='<?php echo $kota ?>' ><br>
    Jurusan : <select type='text' name='ipJurusan' value='<?php echo $jrs ?>' ><br>

    <?php
        $q2 = "SELECT * FROM jurusan ";
        $query2 = mysqli_query($con,$q2);

        while ($data2 = mysqli_fetch_array($query2)){
            if($jrs == $data2 ['id']){
            echo "<option value='".$data2['id']."' selected >".
                 $data2['nama_jurusan']."</option>";
                
            } else {
                echo "<option value='".$data2['id']."'>".
                $data2['nama_jurusan'] . "</option>";
            }
        }
    ?>    
</select>
<br>
<br>

    <input type='submit'>
</form>