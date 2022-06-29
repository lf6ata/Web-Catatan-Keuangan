<?php    
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1)
{
	echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	exit("Direct access not permitted.");
}

$aksi="halaman/hal_identitas/aksi_identitas.php";
switch($_GET[act]){
  // Tampil User
  default:
 $edit=mysql_query("SELECT * FROM identitas WHERE id_identitas='1'");
   $r=mysql_fetch_array($edit);
   if($_SESSION[level]=='admin'){
    
   echo "<div class='page-title'>
              
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                     <h2>identitas<small>Edit Record</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                      <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                      </li>
                      
                      <li><a class='close-link'><i class='fa fa-close'></i></a>
                      </li>
                    </ul>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                  
                    <form id='demo-form' method='POST' action='$aksi?halamane=identitas&act=update' enctype='multipart/form-data' data-parsley-validate class='form-horizontal form-label-left'>

                        <input type=hidden name=id value='$r[id_identitas]'>
                       <div class=\"form-group\">
                        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">Nama Aplikasi <span class=\"required\">*</span>
                        </label>
                        <div class=\"col-md-6 col-sm-6 col-xs-12\">
                          <input name='identitas_name' id=\"textString\" class=\"form-control col-md-7 col-xs-12\" required=\"required\" type=\"text\" value='$r[identitas_name]'>
                        </div>
                      </div>

                    
                      <div class='ln_solid'></div>
                      <div class='form-group'>
                        <div class='col-md-6 col-md-offset-3'>
                          <a href='identitas.html' class='btn btn-primary'>Cancel</a>
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
