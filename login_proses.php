<?php
session_start();



require_once('master.php');

$q = "SELECT id FROM user 
      WHERE username='".$_POST['ipUser']."'
      AND password='".md5($_POST['ipPw'].$kataRahasia)."'";  //disini md5 dari enkripsi register. selain md5 bisa juga pake sha1
echo $q;

      $query=mysqli_query($con,$q);

// injection php (' or ''=')
// xss insert kodingan lewat form


// kita akan menggunakan bind param untuk mencegah input true, keamanan website dari sql injection
// $username = $_POST['ipUser'];
// $password = $_POST['ipPw'];

// $statement = $con->prepare("SELECT * FROM user WHERE username=? AND password=?");
// $statement -> bind_param("ss", $username, $password); // ngambil data dari atas ini, "ss" merupakan statement merepresentasikan type data didalam tanda tanya (?), karenA Diatas itu pake string jadi"s". kemudian diikuti dua variabel sesuai urutannya
// $statement -> execute(); //eksekusi query diatas
// $query = $statement->get_result();


      $bykdata = mysqli_num_rows($query);
      if ($bykdata>0){
        echo "ok masuk login sukses";
        $_SESSION['uname'] = $_POST['ipUser'];
        header("location:index.php");

        setcookie("username",$_POST['ipUser']); //menyimpan cookie dalam browser usermasing-masing
        setcookie("password",$_POST['ipPw']);


      } else {
        echo "gagal";
      }
      
    

?>