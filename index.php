<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <?php
        session_start();
        echo "<div>";
        echo "hai " . $_SESSION['uname'];
        echo "</div>";
    ?>

<div class="container-fluid bg-light">
        <div class="row py-5 g-3 ">
            <div class="col-md-3 ">
                <h5 class="text-center display-6 mt-3">Daftar Santri Naga Hitam</h5>
                <form class="p-4 mt-2 " action='simpan.php' method='POST'>
                    <div class="mb-3">
                        <label class="form-label">Masukin Nama</label>
                        <input type="text" name="ipNama" class="form-control" placeholder="Namamu Siapa ?">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Tanggal Lahir</label>
                        <input type="date" name="ipTglLahir" class="form-control" placeholder="Kapan Lahir?">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">NIK</label>
                        <input type="number" name="ipNik" class="form-control" placeholder="Nomor Induk Kependudukan?">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Telp</label>
                        <input type="number" name="ipTelp" class="form-control" placeholder="Telp?">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Email</label>
                        <input type="email" name="ipEmail" class="form-control" placeholder="Email?">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Kota Asal</label>
                        <input type="text" name="ipKotaAsal" class="form-control" placeholder="Kota asal mana?">
                    </div>
                    <div class="mb-3">
                        <Select name='ipJurusan'><b>Jurusan</b>  <br>
                        <option value="1" > Ilmu Falak<br>
                        <option  value="3"> Ilmu Sejarah <br>
                        <option  value="4"> DKV <br>
                        <option  value="5"> Kedokteran Kodok <br>
                        <option value="6"> Kedokteran Hewan <br>
                        <option  value="7"> Teknik Nonton <br>
                
                    </div>
                    <br>
                    
                    <div class="mb-3 text-center mt-5">
                        <input type="submit" value='simpan bos' class="btn btn-danger mt-5"></input>
                    </div>

                </form>
            </div>

            <div class="col-md-9 " style="overflow:hidden;">
                <img src="aa.jpg" class="rounded" width="100%">
            </div>
        </div>
</div>


    <div class="container text-center mb-1 mt-5">
        <h1 class="display-6">
            Santri Pondok Naga Hitam
        </h1>
    </div>

<?php

require_once('kunci.php'); //koneksi ke php database

// if ($kunci){
// echo "sukses maze";
// }

// 2. buat surat perintah kerja (SQL QUERY)
$spk = "SELECT * FROM santri"; // nama tabel

//3. lakukan pekerjaan
$hasil = $kunci->query($spk);

//4. tampilkan hasil pekerjaan
// echo "<pre>";
// print_r($kunci->errorInfo());
// echo $hasil->rowCount(); // jumlah data yg ditampilkan

 $data = $hasil->fetchAll();

// var_dump($data);
// echo "</pre>";










?>

<div class="container-fluid">

    <table  class="table  mt-2" border='1'  rules='all'>
        <tr class="table-danger">
            <th>id</th>
            <th>Nama</th>
            <th>Kota Asal</th>
            <th>Tanggal Lahir</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Kick Santri</th>

        </tr>
        <?php
            foreach($data as $baris){
        ?>
        <tr>
            <td><?=$baris['id']?></td>
            <td><?=$baris['nama']?></td>
            <td><?=$baris['kota_asal']?></td>
            <td><?=$baris['tgl_lahir']?></td>
            <td><?=$baris['email']?></td>
            <td><?=$baris['jurusan_id']?></td>
            <?php
                echo "<td> <a title='hapus' href='hapus.php?id=".$baris['id']."'>kick</a> </td>"
            ?>
            

        
        </tr>
        <?php
        }
        ?>
    </table> 

</div>

<div class="container r mb-1 mt-5" >
        <h1 class="display-6">
           Daftar Pendidikan Santri Naga Hitam
        </h1>
   
<?php
require_once('master.php');
// buat surat perintah untuk mengisi angka id jurusan dengan nama jurusan
$spok = "SELECT 
                santri.id,
                santri.nama AS nama_santri,
                kota_asal,
                jurusan.nama_jurusan as jurusan
        FROM santri
        JOIN jurusan
        ON santri.jurusan_id = jurusan.id";
//lakukan pekerjaan
$truk = mysqli_query($knc,$spok);


$jumlahDataPerhamalan = 5;
$jumlahData = mysqli_num_rows($truk);
$jumlahHalaman = ceil($jumlahData/$jumlahDataPerhamalan);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerhamalan * $halamanAktif) - $jumlahDataPerhamalan;


$spok = "SELECT 
                santri.id,
                santri.nama AS nama_santri,
                kota_asal,
                jurusan.nama_jurusan as jurusan
        FROM santri
        JOIN jurusan
        ON santri.jurusan_id = jurusan.id LIMIT $awalData, $jumlahDataPerhamalan";
//lakukan pekerjaan
$truk = mysqli_query($knc,$spok);


?>   

<form action='index.php' method='POST'>
        <input type='text' name='cari' placeholder='cari apa?' >
        <input type='submit' value='cari'>
</form>

<?php
    if (isset($_POST['cari'])){
        $cari=$_POST['cari'];

        $spok = "SELECT 
                santri.id,
                santri.nama AS nama_santri,
                kota_asal,
                jurusan.nama_jurusan as jurusan
        FROM santri
        JOIN jurusan
        ON santri.jurusan_id = jurusan.id WHERE santri.nama LIKE '%$cari%'";
        $truk = mysqli_query($knc,$spok);

    }
?>



<table  class="table  mt-2" border='1'  rules='all'>
        <tr class="table-danger">
            <th>No.</th>
            <th>Nama Santri</th>
            <th>Kota Asal</th>
            <th>Jurusan</th>
            <th>Kick Santri??</th>
        </tr>

        <!-- menampilkan data santri & djurusan -->
        <?php
            $n = 1;
            while($tangan = mysqli_fetch_array($truk)){
        ?>
        <tr>
            <td><?= $n++ ?></td>
            <td><?= $tangan['nama_santri']?></td>
            <td><?= $tangan['kota_asal']?></td>
            <td><?= $tangan['jurusan']?></td>
            <td>
                <a href="update.php?id=<?= $tangan['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $tangan['id'] ?>">Delete</a>
                <a href="edit.php?id=<?= $tangan['id'] ?>">Edit_PW</a>
            </td>
            </tr>
        <?php
        }
        ?>             
</table>

<?php
    for ($i=1;$i<=$jumlahHalaman;$i++){
            echo "<a href='?halaman=$i'>$i</a>";
    }

?>
</div>

<a href='#' onclick='getcookie();' > klik aku mas</a>
<script>
    function getcookie (){
        alert ("cokie kamu: " + document.cookie);
    }

</script>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
<svg  class="scg container-fluid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#c1b678" fill-opacity="1" d="M0,128L48,149.3C96,171,192,213,288,208C384,203,480,149,576,138.7C672,128,768,160,864,192C960,224,1056,256,1152,234.7C1248,213,1344,139,1392,101.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>

</body>
</html>

