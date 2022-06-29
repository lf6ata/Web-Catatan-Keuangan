<div class='page-title'>
              
            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                     <h2>Laporan <small>by Criteria</small></h2>
                    <ul class='nav navbar-right panel_toolbox'>
                      <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                      </li>
                      
                      <li><a class='close-link'><i class='fa fa-close'></i></a>
                      </li>
                    </ul>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                  
                  <form method="post" action="report_transaksi.php">
						<table class="table table-bordered table-striped">
							<tr>
								<td align="center"><input type="radio" name="berdasar" class="flat-red" value="Semua Data" checked="">
								<td>Semua Data</td>
							</tr>
							<tr>
								<td align="center"><input type="radio" name="berdasar" class="flat-red" value="Tanggal"></td>
								<td>Tanggal<br/><br/>
								 <div class="col-xs-5">
                			 <input type="text" placeholder='Dari Tanggal' class="form-control datepicker" id="birthday" name="dari" readonly="yes">
               					 </div>

               					  <div class="col-xs-5">
                			 <input type="text" placeholder='Sampai Tanggal' class="form-control datepicker" id="birthday2" name="ke" readonly="yes">
               					 </div>
									
									</td>
							</tr>

							<tr>
								<td align="center"><input type="radio" name="berdasar" class="flat-red" value="Pencarian Kata"></td>
								<td>Pencarian Kriteria<br/><br/>
			<div class="col-xs-3">					
		<select name="field" class="form-control">
        <option>Pilih Field</option>
          <option value="id_transaksi">No Transaksi</option>
          <option value="id_kategori">Kode Kategori</option>
      </select> 
 </div>
 <div class="col-xs-3">
      <input name="kata" type="text" class="form-control" maxlength="7" />
       </div>
								</td>
							</tr>

							

							
							<tr>
								<td></td>
								<td><input type="submit" name="Submit" class="btn btn-primary" value="Tampilkan" /></td>
								
							</tr>
							
						</table>
						</form>
                    
                  </div>
                </div>
              </div>
             </div></div>