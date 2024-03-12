<?php
require_once('master.php');
//print_r($_POST);

//cek nik duplicate
$q1 = "SELECT id FROM santri WHERE nik = '".$_POST['ipNik']."'";
$query = mysqli_query($con,$q1);
$jmldata = mysqli_num_rows($query);

if ($jmldata>0){
    echo "Nik ".$_POST['ipNik']." Sudah redy";
    echo "<script>alert('NIK uda redy boloo');</script>";
    echo "<script>window.location.href='index.php';</script>";
} else{
    
echo "------>" . $_POST['ipNik'];
$q ="INSERT INTO santri (nama, tgl_lahir, nik, telp, email, kota_asal,jurusan_id) 
VALUES (
    '".addslashes($_POST['ipNama'])."',  
    '".$_POST['ipTglLahir']."',
    '".$_POST['ipNik']."',
    '".$_POST['ipTelp']."',
    '".$_POST['ipEmail']."',
    '".$_POST['ipKotaAsal']."',
    '".$_POST['ipJurusan']."'
    )";
echo "<br>";
echo $q;
echo "<br>";

$prosesSimpen = mysqli_query($con,$q);
if ($prosesSimpen==true){
    echo "<script>window.location.href='index.php';</script>";
}else{
    echo "gagal " . mysqli_error();
}

}




?>