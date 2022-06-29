<?php
session_start();
require_once "config/koneksi.php";
$id=mysql_fetch_array(mysql_query("SELECT * FROM identitas where id_identitas='1'"));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo"$id[identitas_name]";?></title>
    <link rel="shortcut icon" href="foto_user/favicon.png">
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
    
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="cek_login.php" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" name="email" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
              </div>

              <div class="clearfix"></div>

              <br/>
                  <p>©2017 All Rights Reserved. <?php echo"$id[identitas_name]";?></p>
                </div>
              </div>
            </form>
          </section>
        </div>

       
        </div>
      </div>
    </div>
  </body>
</html>