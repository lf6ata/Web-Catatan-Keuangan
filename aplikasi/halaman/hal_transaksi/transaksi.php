 <script language=Javascript>
function isNumberKey(evt)
//Membuat validasi hanya untuk input angka menggunakan kode javascript
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))

return false;
return true;
}

</script> 
<?php    
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1)
{
	echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	exit("Direct access not permitted.");
}

$aksi="halaman/hal_transaksi/aksi_transaksi.php";
switch($_GET[act]){
  // Tampil User
  default:

echo"<title> - All Transaction</title>";
echo "<div class='title_left'>";
if($_SESSION[level]=='admin'){ echo"<a href='tambah-transaksi.html' class='btn btn-round btn-success'>Tambah Data</a>"; } echo"</div>

  
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Transaksi</h2>
                    <ul class='nav navbar-right panel_toolbox'>
                      <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                      </li>
                      
                      <li><a class='close-link'><i class='fa fa-close'></i></a>
                      </li>
                    </ul>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    
                    <table id='datatable' class='table table-striped table-bordered' cellspacing='0' width='100%'>
                      <thead>
                        <tr>
                          <th>Tanggal</th>
                          <th>No Transaksi</th>
                          <th>Nama Kategori</th>
                          <th>Pemasukan</th>
                          <th>Pengeluaran</th>
                          <th>Remark</th>";
                          if($_SESSION[level]=='admin'){ echo"<th><center>Action</center></th>";} echo"</tr>
                      </thead>
                      <tbody>";
           
    $tampil = mysql_query("SELECT * FROM transaksi ORDER BY id_transaksi ASC");
    while($r=mysql_fetch_array($tampil)){
  $k=mysql_fetch_array(mysql_query("SELECT * FROM kategori WHERE id_kategori='$r[id_kategori]'"));
   //if ($k['tipe']==1){$total=$r['total']*-1;} else {$total=$r['total'];}


   echo "<tr>
   <td>$r[tanggal]</td>
   <td>$r[id_transaksi]</td>
   <td>$k[kategori_name]</td>
   <td>".format_rupiah($r[pemasukan])."</td>
   <td>".format_rupiah($r[pengeluaran])."</td>
   <td>$r[remark]</td>"; 
   if($_SESSION[level]=='admin'){ echo"<td><center>


<div class='btn-group'>
          <button type='button' class='btn btn-block btn-default btn-xs dropdown-toggle' data-toggle='dropdown'>
          Aksi <span class='caret'></span>
                    <span class='sr-only'>Toggle Dropdown</span>
          </button>
          <ul class='dropdown-menu' role='menu'>
          <li><a href='edit-transaksi-$r[id_transaksi].html'>Edit</a></li>
           <li><a onclick=\"return confirm('Are sure want to delete this data ??')\" href='$aksi?halamane=transaksi&act=hapus&id=$r[id_transaksi]'>Delete</a></li>
          </ul>
          </div>


    </center></td>";} echo"
   
   </tr> ";
  }
                
                echo"</tbody>
                    </table>

          </div>
        </div>
        <!-- /page content -->";

   break;  

  
  
   case "tambahtransaksi":
   if ($_SESSION[level]=='admin'){
   echo "
            </div>
            <div class=\"clearfix\"></div>
            <div class=\"row\">
              <div class=\"col-md-12 col-sm-12 col-xs-12\">
                <div class=\"x_panel\">
                  <div class=\"x_title\">
                     <h2>transaksi<small>New Record</small></h2>
                    <ul class=\"nav navbar-right panel_toolbox\">
                      <li><a class=\"collapse-link\"><i class=\"fa fa-chevron-up\"></i></a>
                      </li>
                      
                      <li><a class=\"close-link\"><i class=\"fa fa-close\"></i></a>
                      </li>
                    </ul>
                    <div class=\"clearfix\"></div>
                  </div>
                  <div class=\"x_content\">
                    <br />
                    <form id='demo-form' method='POST' action='$aksi?halamane=transaksi&act=input' enctype='multipart/form-data' data-parsley-validate class='form-horizontal form-label-left'>

                     <div class=\"form-group\">
                       <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">Kategori<span class=\"required\">*</span>
                       </label>
                       <div class=\"col-md-6 col-sm-6 col-xs-12\">
                       <select name='kategori' id=\"kategori\" class=\"select2_group form-control\" required=\"required\">
             <option value='' selected> Pilih Kategori</option>";
             $kategori=mysql_query("SELECT * FROM kategori ORDER BY id_kategori");
             while($d=mysql_fetch_array($kategori)){
             echo "<option value='$d[id_kategori]'>$d[kategori_name]</option>";}
             echo "</select>
                       </div>
             </div>

             <div class=\"form-group\">
                        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">Total<span class=\"required\">*</span>
                        </label>
                        <div class=\"col-md-6 col-sm-6 col-xs-12\">
                          <input name='total' id=\"total\" class=\"form-control col-md-7 col-xs-12\" required=\"required\" type=\"text\" onkeypress=\"return isNumberKey(event)\">
                        </div>
                      </div>

                       <div class=\"form-group\">
                        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">Remark<span class=\"required\">*</span>
                        </label>
                        <div class=\"col-md-6 col-sm-6 col-xs-12\">
                          <input name='remark' id=\"remark\" class=\"form-control col-md-7 col-xs-12\" required=\"required\" type=\"text\">
                        </div>
                      </div>

                      

                      <div class='ln_solid'></div>
                      <div class='form-group'>
                        <div class='col-md-6 col-md-offset-3'>
                          <a href='transaksi.html' class='btn btn-primary'>Cancel</a>
                          <button id='send' type='submit' class='btn btn-success' onClick=\"trimSpaces();\">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

         <!-- start form for validation -->
                    <form id=\"demo-form2\" data-parsley-validate>
                    </form>
                    <!-- end form for validations -->
            
           "; }
	  
	 
    else{
   echo "<h1>Anda tidak berhak mengakses halaman ini !</h1>";  }
	 
   break;
    
   case "edittransaksi":
   $edit=mysql_query("SELECT * FROM transaksi WHERE id_transaksi='$_GET[id]'");
   $r=mysql_fetch_array($edit);


   $k=mysql_fetch_array(mysql_query("SELECT * FROM kategori WHERE id_kategori='$r[id_kategori]'"));
   //Jika kategori pengurangan
   if ($k['tipe']==1){
    $total=$r['pengeluaran'];
   } 
   //Jika Operasi penambahan
   else {  
    $total=$r['pemasukan'];
   }


   if($_SESSION[level]=='admin'){
	  
   echo "<div class='page-title'>
              
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                     <h2>transaksi<small>Edit Record</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                      <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                      </li>
                      
                      <li><a class='close-link'><i class='fa fa-close'></i></a>
                      </li>
                    </ul>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                  
                    <form id='demo-form' method='POST' action='$aksi?halamane=transaksi&act=update' enctype='multipart/form-data' data-parsley-validate class='form-horizontal form-label-left'>

                        <input type=hidden name=id value='$r[id_transaksi]'>
                      <div class=\"form-group\">
                       <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">kategori <span class=\"required\">*</span>
                       </label>
                       <div class=\"col-md-6 col-sm-6 col-xs-12\">
                       <select name='kategori' class=\"select2_group form-control\" id=\"kategori\" required=\"required\">";
             $kategori=mysql_query("SELECT * FROM kategori ORDER BY id_kategori");
             if ($r['id_kategori']==0){
             echo "<option value=0 selected>- select kategori -</option>";}   
             while($w=mysql_fetch_array($kategori)){
             if ($r['id_kategori']==$w['id_kategori']){
             echo "<option value='$w[id_kategori]' selected>$w[kategori_name]</option>";}
             else{ echo "<option value='$w[id_kategori]'>$w[kategori_name]</option>";}
            }
             echo"</select>
                       </div>
             </div>

             <div class=\"form-group\">
                        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">Total<span class=\"required\">*</span>
                        </label>
                        <div class=\"col-md-6 col-sm-6 col-xs-12\">
                          <input name='total' id=\"total\" class=\"form-control col-md-7 col-xs-12\" required=\"required\" type=\"text\" onkeypress=\"return isNumberKey(event)\" value='$total'>
                        </div>
                      </div>

                       <div class=\"form-group\">
                        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">Remark<span class=\"required\">*</span>
                        </label>
                        <div class=\"col-md-6 col-sm-6 col-xs-12\">
                          <input name='remark' id=\"remark\" class=\"form-control col-md-7 col-xs-12\" required=\"required\" type=\"text\" value='$r[remark]'>
                        </div>
                      </div>


                    
                      <div class='ln_solid'></div>
                      <div class='form-group'>
                        <div class='col-md-6 col-md-offset-3'>
                          <a href='transaksi.html' class='btn btn-primary'>Cancel</a>
                          <button id='send' type='submit' class='btn btn-success' onClick='trimSpaces();'>Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
               <!-- start form for validation -->
                    <form id=\"demo-form2\" data-parsley-validate>
                    </form>
                    <!-- end form for validations -->";}
	
    break;  

   }
   ?>
   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>
