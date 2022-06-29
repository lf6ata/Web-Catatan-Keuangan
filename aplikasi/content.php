<?php
// Bagian Home
if ($_GET['halamane']=='home'){
	include "halaman/hal_home/home.php";
  }

  
// Bagian identitas
  elseif ($_GET['halamane']=='identitas'){
  include "halaman/hal_identitas/identitas.php";
  }

// Bagian kategori
  elseif ($_GET['halamane']=='kategori'){
  include "halaman/hal_kategori/kategori.php";
  }
// Bagian transaksi
  elseif ($_GET['halamane']=='transaksi'){
  include "halaman/hal_transaksi/transaksi.php";
  }

// Bagian member
elseif ($_GET['halamane']=='member'){
  if ($_SESSION['level']=='admin'){
    include "halaman/hal_member/member.php";
  }
}


// Bagian transaksi
  elseif ($_GET['halamane']=='laporan'){
  include "laptrans.php";
  }


// Apabila halaman tidak ditemukan
else{
  header('location:home.php');
}


?>
