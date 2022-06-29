<?php
error_reporting(0);
  session_start();
  include "config/koneksi.php";
  
  mysql_query("UPDATE member SET status='N' WHERE email='$_SESSION[namauser]'");
  session_destroy();
  
  echo "<script>alert('Logout Berhasil'); window.location = 'login.php'</script>";
?>
