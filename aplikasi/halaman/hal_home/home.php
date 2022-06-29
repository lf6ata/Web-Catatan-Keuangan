 <!-- price element -->
                        <div class="col-md-12 col-sm-6 col-xs-12">
                          <div class="pricing ui-ribbon-container">
                            <div class="ui-ribbon-wrapper">
                              <div class="ui-ribbon">
                                 <!-- Jam Digital -->
                                 <div id="clockDisplay" class="clockStyle"></div>
<script type="text/javascript" language="javascript">
function renderTime(){
 var currentTime = new Date();
 var h = currentTime.getHours();
 var m = currentTime.getMinutes();
 var s = currentTime.getSeconds();
 if (h == 0){
  h = 24;
   }
   if (h < 10){
    h = "0" + h;
    }
    if (m < 10){
    m = "0" + m;
    }
    if (s < 10){
    s = "0" + s;
    }
 var myClock = document.getElementById('clockDisplay');
 myClock.textContent = h + ":" + m + ":" + s + "";    
 setTimeout ('renderTime()',1000);
 }
 renderTime();
</script>
                                  <!-- Jam Digital -->
                              </div>
                            </div>
                            <div class="title">
                              <h1><?php echo"$id[identitas_name]";?></h1>
                              <p>
             <script language=JavaScript>var d = new Date();
            var h = d.getHours();
            if (h < 11) { document.write('Selamat pagi, <?php echo $_SESSION['namalengkap']; ?>...'); }
            else { if (h < 15) { document.write('Selamat siang, <?php echo $_SESSION['namalengkap']; ?>...'); }
            else { if (h < 19) { document.write('Selamat sore, <?php echo $_SESSION['namalengkap']; ?>...'); }
            else { if (h <= 23) { document.write('Selamat malam, <?php echo $_SESSION['namalengkap']; ?>...'); }
            }}}</script>
            				</p>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda. </p>
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i> Akses multi user</li>
                                    <li><i class="fa fa-check text-success"></i> Identitas Website</li>
                                    <li><i class="fa fa-check text-success"></i> Manajemen Kategori</li>
                                    <li><i class="fa fa-check text-success"></i> Manajemen transaksi</li>
                                    <li><i class="fa fa-check text-success"></i> Manajemen laporan</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                
                                
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->