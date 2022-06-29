<?php
// PAGING LOCATION////////////////////////////////////////////////////////////////////////////////////
class PagingLocation{
function cariPosisi($batas){
if(empty($_GET['hallocation'])){
	$posisi=0;
	$_GET['hallocation']=1;
}
else{
	$posisi = ($_GET['hallocation']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href='hallocation-$_GET[id]-1.html'>Awal</a></li>
                    <li><a href='hallocation-$_GET[id]-$prev.html'>Kembali</a></li>";
}
else{ 
$link_halaman .= "<li><a>Awal</a></li>
<li><a>Kembali</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<li>...</li>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href='hallocation-$_GET[id]-$i.html'>$i</a></li>";
  }
	 $angka .= "<li><a><b>$halaman_aktif</b></a></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href='hallocation-$_GET[id]-$i.html'>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li>...</li><li><a href='hallocation-$_GET[id]-$jmlhalaman.html'>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href='hallocation-$_GET[id]-$next.html'>Lanjut</a></li>
                     <li><a href='hallocation-$_GET[id]-$jmlhalaman.html'>Akhir</a></li>";
}
else{
	$link_halaman .= "<li><a>Lanjut</a></li>
	<li><a>Akhir</a></li>";
}
return $link_halaman;
}
}


// PAGING LOCATION SEARCH ////////////////////////////////////////////////////////////////////////////////////
class PagingLocationSearch{
function cariPosisi($batas){
if(empty($_GET['hallocation'])){
	$posisi=0;
	$_GET['hallocation']=1;
}
else{
	$posisi = ($_GET['hallocation']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href='hallocation-$_POST[search]-1.html'>Awal</a></li>
                    <li><a href='hallocation-$_POST[search]-$prev.html'>Kembali</a></li>";
}
else{ 
$link_halaman .= "<li><a>Awal</a></li>
<li><a>Kembali</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<li>...</li>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href='hallocation-$_POST[search]-$i.html'>$i</a></li>";
  }
	 $angka .= "<li><a><b>$halaman_aktif</b></a></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href='hallocation-$_POST[search]-$i.html'>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li>...</li><li><a href='hallocation-$_POST[search]-$jmlhalaman.html'>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Lanjut) dan terakhir (Akhir) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href='hallocation-$_POST[search]-$next.html'>Lanjut</a></li>
                     <li><a href='hallocation-$_POST[search]-$jmlhalaman.html'>Akhir</a></li>";
}
else{
	$link_halaman .= "<li><a>Lanjut</a></li>
	<li><a>Akhir</a></li>";
}
return $link_halaman;
}
}



function paginate_one($reload, $page, $tpages) {
	
	$firstlabel = "&laquo;&nbsp;";
	$prevlabel  = "&lsaquo;&nbsp;";
	$nextlabel  = "&nbsp;&rsaquo;";
	$lastlabel  = "&nbsp;&raquo;";
	
	$out = "<ul class=\"pagination\">";
	
	// first
	if($page>1) {
		$out.= "<li><a href=\"" . $reload . "\">" . $firstlabel . "</a></li>";
	}
	else {
		$out.= "<li><span>" . $firstlabel . "</span></li>";
	}
	
	// previous
	if($page==1) {
		$out.= "<li><span>" . $prevlabel . "</span></li>";
	}
	elseif($page==2) {
		$out.= "<li><a href=\"" . $reload . "\">" . $prevlabel . "</a></li>";
	}
	else {
		$out.= "<li><a href=\"" . $reload . "&amp;page=" . ($page-1) . "\">" . $prevlabel . "</a></li>";
	}
	
	// current
	$out.= "<li><span class=\"current\">Page " . $page . " of " . $tpages ."</span></li>";
	
	// next
	if($page<$tpages) {
		$out.= "<li><a href=\"" . $reload . "&amp;page=" .($page+1) . "\">" . $nextlabel . "</a></li>";
	}
	else {
		$out.= "<li><span>" . $nextlabel . "</span></li>";
	}
	
	// last
	if($page<$tpages) {
		$out.= "<li><a href=\"" . $reload . "&amp;page=" . $tpages . "\">" . $lastlabel . "</a></li>";
	}
	else {
		$out.= "<li><span>" . $lastlabel . "</span></li>";
	}
	
	$out.= "</ul>";
	
	return $out;
}
?>