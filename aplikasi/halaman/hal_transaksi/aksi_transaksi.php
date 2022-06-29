<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<center>Untuk mengakses halaman, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../config/koneksi.php";
include "../../config/fungsi_thumb_luar.php";
include "../../config/library.php";

$halamane=$_GET[halamane];
$act=$_GET[act];
// Hapus transaksi
if ($halamane=='transaksi' AND $act=='hapus'){
mysql_query("DELETE FROM transaksi WHERE id_transaksi='$_GET[id]'");
header('location:../../index.php?halamane='.$halamane);
}

// Input transaksi
elseif ($halamane=='transaksi' AND $act=='input'){
  //buat transaksi otomatis
	$query = "select max(id_transaksi) as maksi from transaksi";
    $hasil = mysql_query($query);
    $data_oto     = mysql_fetch_array($hasil);
	  
	$data_potong = substr($data_oto['maksi'],3,5);
	$data_potong++;
	$kode="";
	for ($i=strlen($data_potong); $i<=4; $i++)
	$kode = $kode."0";
	$transaksi_id = "T-$kode$data_potong";
	
$k=mysql_fetch_array(mysql_query("SELECT * FROM kategori WHERE id_kategori='$_POST[kategori]'"));
$remark=trim(htmlspecialchars($_POST['remark']));
   //Jika kategori pengurangan
   if ($k['tipe']==1){

   mysql_query("INSERT INTO transaksi(id_transaksi,id_kategori,pengeluaran,remark,username,tanggal) VALUES('$transaksi_id','$_POST[kategori]','$_POST[total]','$remark','$_SESSION[username]','$tgl_sekarang')");

   } 
   //Jika Operasi penambahan
   else {
   	mysql_query("INSERT INTO transaksi(id_transaksi,id_kategori,pemasukan,remark,username,tanggal) VALUES('$transaksi_id','$_POST[kategori]','$_POST[total]','$remark','$_SESSION[username]','$tgl_sekarang')");

   }


	
	header('location:../../index.php?halamane='.$halamane);
}


// Update transaksi
elseif ($halamane=='transaksi' AND $act=='update') {
  
  $k=mysql_fetch_array(mysql_query("SELECT * FROM kategori WHERE id_kategori='$_POST[kategori]'"));
  $remark=trim(htmlspecialchars($_POST['remark']));
   //Jika kategori pengurangan
   if ($k['tipe']==1){
mysql_query("UPDATE transaksi SET id_kategori = '$_POST[kategori]',
                    pemasukan = '0',
  									pengeluaran = '$_POST[total]',

  									remark = '$remark',
  									username = '$_SESSION[username]'
								WHERE id_transaksi = '$_POST[id]'");

   } 
   //Jika Operasi penambahan
   else {  
mysql_query("UPDATE transaksi SET id_kategori = '$_POST[kategori]',
  									pemasukan = '$_POST[total]',
                    pengeluaran = '0',
  									remark = '$remark',
  									username = '$_SESSION[username]'
								WHERE id_transaksi = '$_POST[id]'");
   }

  

 header('location:../../index.php?halamane='.$halamane);
  }
  


}
?>
