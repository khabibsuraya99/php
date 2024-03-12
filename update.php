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
        require_once('master.php');
        $suk = "SELECT * FROM jurusan";
        $suk1 = "SELECT * FROM santri WHERE id=$_GET[id]"; //ambil data dari database melalui url
        $truk = mysqli_query($knc,$suk);
        $truk1 = mysqli_query($knc,$suk1);
    ?>
<div class="container-fluid bg-light">
        <div class="row py-5 g-3 ">
            <div class="col-md-3 ">

                <!-- mengambil data dari index untuk data awal di update -->
                <?php
                $tangan1 = mysqli_fetch_array($truk1);
                ?>

                <h5 class="text-center display-6 mt-3">Update Data Santri Naga Hitam</h5>
                <form class="p-4 mt-2 " action='update.php' method='POST'>
                    <div class="mb-3">
                        <label class="form-label">Masukin Nama</label>
                        <input type="text" name="ipNama" value="<?=$tangan1['nama'] ?>" class="form-control" placeholder="Ganti Nama Siapa ?">
                    </div>
      
                    <div class="mb-3">
                        <label  class="form-label">Kota Asal</label>
                        <input type="text" name="ipKotaAsal" value="<?=$tangan1['kota_asal'] ?>" class="form-control" placeholder="Pindah Kota asal mana?">
                    </div>
                    <div class="mb-3">
                        <?php
                        
                        
                        echo "Ganti Jurusan Bre?";

                        echo "<select name='ipJurusan'>";
                        while ($tangan = mysqli_fetch_array($truk)){
                            if($tangan1['jurusan_id']==$tangan['id']) {
                                echo "<option selected value='".$tangan['id']."' >" . $tangan['nama_jurusan'] . "</option>";
                            } else {
                                echo "<option value='".$tangan['id']."' >" . $tangan['nama_jurusan'] . "</option>";
                            }
                        }
                        echo "</select>";
                        ?>
                        <br>
                
                    </div>
                    
                    
                    <div class="mb-3 text-center ">
                        <input type="submit" value='Update Data Bozz..!' class="btn btn-danger"></input>
                    </div>

                </form>
            </div>

            <div class="col-md-9 " style="overflow:hidden;">
                <img src="aa.jpg" class="rounded" width="100%">
            </div>
        </div>
</div>


</body>
</html>