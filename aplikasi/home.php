   <?phpsession_start();require_once "config/koneksi.php";$id=mysql_fetch_array(mysql_query("SELECT * FROM identitas where id_identitas='1'"));?>   <title><?php echo"$id[identitas_name]";?></title>   <link rel="shortcut icon" href="foto_user/favicon.png"><frameset>	<frame src="index.php" name="index"/></frameset><noframes></noframes>