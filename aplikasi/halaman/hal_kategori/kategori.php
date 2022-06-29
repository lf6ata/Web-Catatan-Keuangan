<?php    
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1)
{
	echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	exit("Direct access not permitted.");
}

$aksi="halaman/hal_kategori/aksi_kategori.php";
switch($_GET[act]){
  // Tampil User
  default:
echo "<div class='title_left'>";
if($_SESSION[level]=='admin'){ echo"<a href='tambah-kategori.html' class='btn btn-round btn-success'>Tambah Data</a>"; } echo"</div>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Kategori</h2>
                    <ul class='nav navbar-right panel_toolbox'>
                      <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                      </li>
                      
                      <li><a class='close-link'><i class='fa fa-close'></i></a>
                      </li>
                    </ul>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    
                    <table id='datatable-responsive' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width='100%'>
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Kategori</th>
                          <th>Remark</th>";
                          if($_SESSION[level]=='admin'){ echo"<th>Action</th>";} echo"</tr>
                      </thead>
                      <tbody>";
           
   $tampil = mysql_query("SELECT * FROM kategori ORDER BY id_kategori DESC");
    while($r=mysql_fetch_array($tampil)){
      $t=mysql_fetch_array(mysql_query("SELECT * FROM operasi WHERE id_operasi='$r[tipe]'"));      
   echo "<tr> 
   <td>$r[id_kategori]</td>
   <td>$r[kategori_name]</td>
   <td>$t[remark]</td>"; 
   if($_SESSION[level]=='admin'){ echo"<td><a href='edit-kategori-$r[id_kategori].html'><span class='badge bg-blue'>Edit</span></a>
       <a onclick=\"return confirm('Are sure want to delete this data ??')\" href='$aksi?halamane=kategori&act=hapus&id=$r[id_kategori]'><span class='badge bg-red'>Hapus</span></a></td>";} echo"
   
   </tr> ";
  }
                
                echo"</tbody>
                    </table>

          </div>
        </div>
        <!-- /page content -->";

   break;  

  
  
   case "tambahkategori":
   if ($_SESSION[level]=='admin'){
   echo "
            </div>
            <div class=\"clearfix\"></div>
            <div class=\"row\">
              <div class=\"col-md-12 col-sm-12 col-xs-12\">
                <div class=\"x_panel\">
                  <div class=\"x_title\">
                     <h2>kategori<small>New Record</small></h2>
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
                    <form id='demo-form' method='POST' action='$aksi?halamane=kategori&act=input' enctype='multipart/form-data' data-parsley-validate class='form-horizontal form-label-left'>

                    

                       <div class=\"form-group\">
                        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">Nama Kategori<span class=\"required\">*</span>
                        </label>
                        <div class=\"col-md-6 col-sm-6 col-xs-12\">
                          <input name='kategori_name' id=\"textString\" class=\"form-control col-md-7 col-xs-12\" required=\"required\" type=\"text\">
                        </div>
                      </div>

                      <div class=\"form-group\">
                       <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">Operasi<span class=\"required\">*</span>
                       </label>
                       <div class=\"col-md-6 col-sm-6 col-xs-12\">
                       <select name='operasi' id=\"operasi\" class=\"select2_group form-control\" required=\"required\">
             <option value='' selected> Pilih operasi</option>";
             $operasi=mysql_query("SELECT * FROM operasi ORDER BY id_operasi");
             while($d=mysql_fetch_array($operasi)){
             echo "<option value='$d[id_operasi]'>$d[nama_operasi]</option>";}
             echo "</select>
                       </div>
             </div>

                      

                      <div class='ln_solid'></div>
                      <div class='form-group'>
                        <div class='col-md-6 col-md-offset-3'>
                          <a href='kategori.html' class='btn btn-primary'>Cancel</a>
                          <button id='send' type='submit' class='btn btn-success'>Submit</button>
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
    
   case "editkategori":
   $edit=mysql_query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
   $r=mysql_fetch_array($edit);
   if($_SESSION[level]=='admin'){
	  
   echo "<div class='page-title'>
              
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                     <h2>kategori<small>Edit Record</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                      <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                      </li>
                      
                      <li><a class='close-link'><i class='fa fa-close'></i></a>
                      </li>
                    </ul>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                  
                    <form id='demo-form' method='POST' action='$aksi?halamane=kategori&act=update' enctype='multipart/form-data' data-parsley-validate class='form-horizontal form-label-left'>

                        <input type=hidden name=id value='$r[id_kategori]'>
                       <div class=\"form-group\">
                        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">Edit Kategori<span class=\"required\">*</span>
                        </label>
                        <div class=\"col-md-6 col-sm-6 col-xs-12\">
                          <input name='kategori_name' id=\"textString\" class=\"form-control col-md-7 col-xs-12\" required=\"required\" type=\"text\" value='$r[kategori_name]'>
                        </div>
                      </div>

                      <div class=\"form-group\">
                       <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">operasi <span class=\"required\">*</span>
                       </label>
                       <div class=\"col-md-6 col-sm-6 col-xs-12\">
                       <select name='operasi' class=\"select2_group form-control\" id=\"operasi\" required=\"required\">";
             $operasi=mysql_query("SELECT * FROM operasi ORDER BY id_operasi");
             if ($r['id_operasi']==0){
             echo "<option value=0 selected>- select operasi -</option>";}   
             while($w=mysql_fetch_array($operasi)){
             if ($r['tipe']==$w['id_operasi']){
             echo "<option value='$w[id_operasi]' selected>$w[nama_operasi]</option>";}
             else{ echo "<option value='$w[id_operasi]'>$w[nama_operasi]</option>";}
            }
             echo"</select>
                       </div>
             </div>


                    
                      <div class='ln_solid'></div>
                      <div class='form-group'>
                        <div class='col-md-6 col-md-offset-3'>
                          <a href='kategori.html' class='btn btn-primary'>Cancel</a>
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
