<?php
//konek kan databse
define('DB_HOST','localhost');
define('DB_NAME','darisantri');
define('DB_USER','root');
define('DB_PASS','');

$alamat_gudang = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
$kunci = new PDO ($alamat_gudang,DB_USER,DB_PASS);

?>