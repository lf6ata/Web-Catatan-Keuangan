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
// Hapus kategori
if ($halamane=='kategori' AND $act=='hapus'){
mysql_query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");
header('location:../../index.php?halamane='.$halamane);
}

// Input kategori
elseif ($halamane=='kategori' AND $act=='input'){
  //buat kategori otomatis
	$query = "select max(id_kategori) as maksi from kategori";
    $hasil = mysql_query($query);
    $data_oto     = mysql_fetch_array($hasil);
	  
	$data_potong = substr($data_oto['maksi'],3,5);
	$data_potong++;
	$kode="";
	for ($i=strlen($data_potong); $i<=4; $i++)
	$kode = $kode."0";
	$kategori_id = "K-$kode$data_potong";

	$kategori_name=trim(htmlspecialchars($_POST['kategori_name']));
	mysql_query("INSERT INTO kategori(id_kategori,kategori_name,tipe) VALUES('$kategori_id','$kategori_name','$_POST[operasi]')");
	header('location:../../index.php?halamane='.$halamane);
}


// Update kategori
elseif ($halamane=='kategori' AND $act=='update') {
  $kategori_name=trim(htmlspecialchars($_POST['kategori_name']));
  mysql_query("UPDATE kategori SET kategori_name = '$kategori_name',tipe = '$_POST[operasi]' WHERE id_kategori = '$_POST[id]'");

 header('location:../../index.php?halamane='.$halamane);
  }
  


}
?>
