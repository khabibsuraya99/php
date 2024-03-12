<?php
require_once ('kunci.php');
// if ($kunci){
//     echo "sukses";
// }

//buat perintah
$spk = "INSERT INTO santri (nama, tgl_lahir, nik, telp, email, kota_asal,jurusan_id)
         VALUE ('bismo',2024-03-14,65,080808,'jihan@gmial.com','medang kamulan',3)";

//lakukan pekerjaan
$hasil = $kunci->query($spk);
//echo $hasil->rowCount(); //mendapatkan berapa baris yg dikasih info

echo "<pre";
print_r($kunci->errorInfo());
echo "</pre>";


?>