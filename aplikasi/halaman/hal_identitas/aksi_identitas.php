<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<center>Untuk mengakses halaman, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../config/koneksi.php";
include "../../config/fungsi_thumb_luar.php";

$halamane=$_GET[halamane];
$act=$_GET[act];


// Update identitas
if ($halamane=='identitas' AND $act=='update') {
  $identitas_name=trim(htmlspecialchars($_POST['identitas_name']));
  mysql_query("UPDATE identitas SET identitas_name  = '$identitas_name' WHERE id_identitas = '$_POST[id]'");

 header('location:../../index.php?halamane='.$halamane);
  }
  


}
?>
