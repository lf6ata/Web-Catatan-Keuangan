<link href="production/css/style_doc.css" rel="stylesheet" type="text/css" />
<?php
error_reporting(0);
session_start();
require_once "config/koneksi.php";
require_once "config/fungsi_rupiah.php";
$day =date(d);
$month =date(M);
$mo =date(m);
$year =date(y);
$years =date(Y);
$id=mysql_fetch_array(mysql_query("SELECT * FROM identitas where id_identitas='1'"));
if($_POST['berdasar'] == "Semua Data"){
//modus delete Semua Data
	$sql = "SELECT * FROM transaksi";
  $pemasukan=mysql_fetch_array(mysql_query("SELECT SUM(pemasukan)AS total FROM transaksi"));
  $grandpemasukan=$pemasukan['total'];

  $pengeluaran=mysql_fetch_array(mysql_query("SELECT SUM(pengeluaran)AS total FROM transaksi"));
  $grandpengeluaran=$pengeluaran['total'];
							
}
else if ($_POST['berdasar'] == "Tanggal"){
	//modus tanggal
	$dari = $_POST['dari'];
	$ke = $_POST['ke'];

  $sql = "SELECT * FROM transaksi where tanggal >= '$dari' and tanggal <= '$ke'";
	
  $pemasukan=mysql_fetch_array(mysql_query("SELECT SUM(pemasukan)AS total FROM transaksi where tanggal >= '$dari' and tanggal <= '$ke'"));
  $grandpemasukan=$pemasukan['total'];

  $pengeluaran=mysql_fetch_array(mysql_query("SELECT SUM(pengeluaran)AS total FROM transaksi where tanggal >= '$dari' and tanggal <= '$ke'"));
  $grandpengeluaran=$pengeluaran['total'];

	}

  else if($_POST['berdasar'] == "Pencarian Kata"){
   //modus berdasarkan kata
  $field = $_POST['field'];
  $kata = $_POST['kata'];

  $sql = "SELECT * FROM transaksi where $field like '%$kata%'";

  $pemasukan=mysql_fetch_array(mysql_query("SELECT SUM(pemasukan)AS total FROM transaksi where $field like '%$kata%'"));
  $grandpemasukan=$pemasukan['total'];

  $pengeluaran=mysql_fetch_array(mysql_query("SELECT SUM(pengeluaran)AS total FROM transaksi where $field like '%$kata%'"));
  $grandpengeluaran=$pengeluaran['total'];
 
  }

   
$query = mysql_query($sql);

$i=mysql_fetch_array(mysql_query("SELECT * FROM identitas WHERE id_identitas='00'"));
echo"<table width='70%' border='0'>
<tr>
    <td colspan='3' align=center><b>REKAPITULASI TRANSAKSI BIAYA</b></td>
  </tr  
</table>
<table width='100%' border='0'>
<tr>
    <th align='left' width='108' scope='row'>Nama Perusahaan &nbsp;&nbsp;&nbsp;&nbsp; : $id[identitas_name]</th>
    <th align='left' width='85'>Periode &nbsp;&nbsp;&nbsp;&nbsp; : $day/$mo/$year</th>
 
  </tr>
<tr>
    <th align='left' width='108' scope='row'>Tahun &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : $years</th>
    <th align='left' width='85'>Petugas  &nbsp; &nbsp;&nbsp;&nbsp;: $_SESSION[namalengkap]</th>
	
  </tr>
  
  <tr>
    <th align='left' width='108' scope='row'></th>
   
  </tr>
  
</table>
";
?>
	
							 
						
<br/>
 <table width='80%' border='1'>
							  <thead>
								  <tr>
                    <th>TANGGAL</th>
                    <th><center>NO. TRANSAKSI</center></th>
                    <th><center>NAMA KATEGORI</center></th>
                    <th><center>PEMASUKAN</center></th>
                    <th><center>PENGELUARAN</center></th>
                    <th>DESKRIPSI</th>
                    <th>DI INPUT OLEH</th>
                    
                  </tr>

							  </thead>   
							  <tbody>
							   <?php
				 while ($d = mysql_fetch_array($query)){
				$p=mysql_fetch_array(mysql_query("SELECT * FROM kategori WHERE id_kategori='$d[id_kategori]'"));
        $m=mysql_fetch_array(mysql_query("SELECT * FROM member WHERE username='$d[username]'"));

			  ?>
				<tr>
                <td><center><?php echo $d['tanggal']; ?></center></td>
                <td><center><?php echo "$d[id_transaksi]"; ?></center></td>
                <td><?php echo "$p[kategori_name]"; ?></td>
                
                <td align="right"><center><?php echo "". format_rupiah($d[pemasukan]); ?></center></td>
                <td align="right"><center><?php echo "". format_rupiah($d[pengeluaran]); ?></center></td>
                <td><?php echo "$d[remark]"; ?></td>
                <td align="center"><?php echo "$m[nama_lengkap]"; ?></td>
               
                </tr>
			   <?php } ?>
			    <tr>
				<td style="color:#FFF; background-color:#000; border:none" colspan="" align="left">Total</td>
        <td colspan='2' style="color:#FFF; background-color:#000; border:none" align="right"></td>
        <td style="color:#FFF; background-color:#000; border:none" align="center"><?php echo "". format_rupiah($grandpemasukan); ?></td>
        <td style="color:#FFF; background-color:#000; border:none" align="center"><?php echo "". format_rupiah($grandpengeluaran); ?></td>
            <td colspan='2'style="color:#FFF; background-color:#000; border:none" colspan="" align="left"></td>
                
				
              </tr>
			  

								                                  
							  </tbody>
				
				
							  
						 </table> 
<br/>
<br/>
<br/>
<table width='80%' border='0'>
  <tr>
    <th width='201' scope='col'>Issued By</th>
    <th width='202' scope='col'>Verified By</th>
    <th width='218' scope='col'>Approved By</th>
    
  </tr>
   <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr><tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr><tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  <tr>
    <th width='201' scope='col'></th>
    <th width='202' scope='col'></th>
    <th width='218' scope='col'></th>
    
  </tr>
  </tr>
   <tr>
    <th width='201' scope='col'>(<?php echo $_SESSION['namalengkap']; ?>)</th>
    <th width='202' scope='col'>(----------------------------) </th>
    <th width='218' scope='col'>(----------------------------)</th>
    
  </tr>
  
</table>
						 
						 
							 