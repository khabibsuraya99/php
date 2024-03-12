<?php
$con = mysqli_connect("localhost","root",""); //hubungkan php ke mysql
$db = mysqli_select_db($con,"darisantri"); // ambil database (masukkan nama database)
$knc = mysqli_connect("localhost","root","","darisantri");

$kataRahasia = "programBib";
?>