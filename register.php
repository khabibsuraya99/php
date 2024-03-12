<form action='register.php' method='POST'>
    user : <input type='text' name='rgsUser' required><br>
    password : <input type='password' name='rgsPw' id='rgsPw' required ><br>
    retype pass : <input type='password' name='rgsRePw' id='rgsRePw' onblur='cek_pw()' required><br>
 <input type='submit' value='daftar'><br>
</form>

<script>
    function cek_pw(){
        var pw1 = document.getElementById('rgsPw').value;
        var pw2 = document.getElementById('rgsRePw').value;

        if (pw1 != pw2){
            alert("Password Gak Saama BosZZz");

            document.getElementById('rgsRePw').value='';
        }

    }

</script>


<?php
require_once('master.php');

// print_r ($_POST);

if (isset($_POST['rgsUser'])){
    $q = "INSERT INTO user (username, password) VALUES ('".addslashes($_POST['rgsUser'])."','".md5(addslashes($_POST['rgsPw'].$kataRahasia))."')";  //md5 digunakan untuk enkripsi sandi biar morat marit, sama tambahkan di proses login pda proses login pada $q nya..abilan data $_POST ...selain md5 bisa juga pake sha1
    $query = mysqli_query($con,$q);

    if($query){
    
        echo "<script>alert('berhasil daftar ya bang');</script>";
       header("location:login.php");
    }else {
        echo "gagal bang". mysqli_error();
    }
}






?>