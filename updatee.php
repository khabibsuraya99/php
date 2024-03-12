<?php
require_once('master.php');


$q = "UPDATE santri SET
    nama='".$_POST['ipNama']."',
    kota_asal='".$_POST['ipKotaAsal']."',
    jurusan_id='".$_POST['ipJurusan']."'
    WHERE id='".$_POST['ipId']."'";



$query = mysqli_query ($con,$q);


echo "<script>window.location.href='index.php';</script>";
    

?>