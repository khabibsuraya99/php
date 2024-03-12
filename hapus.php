<?php
require_once("master.php");
$q = "DELETE FROM santri WHERE id = '".$_GET['id']."'";
$query = mysqli_query($con, $q);

if ($query == true){
    echo "hapus sukses";
} else {
    echo "hapus gagal";
}

echo "<script>window.location.href='index.php';</script>";


?>