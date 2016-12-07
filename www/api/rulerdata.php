<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	//資料庫設定
	//資料庫位置
	$db_server = "localhost";
	//資料庫名稱
	$db_name = "ruler";
	//資料庫管理者帳號
	$db_user = "root";
	//資料庫管理者密碼
	$db_passwd = "";
	
	//對資料庫連線
	if(!@mysql_connect($db_server, $db_user, $db_passwd))
	die("無法對資料庫連線");
	
	//資料庫連線採UTF8
	mysql_query("SET NAMES utf8");
	
	//選擇資料庫
	if(!@mysql_select_db($db_name))
	die("無法使用資料庫");
	
?>
<?php
	//連接資料庫
	//只要此頁面上有用到連接MySQL就要include它
	$rulerid = $_POST['rulerid'];
	$rulerpass = $_POST['rulerpass'];
	
	//搜尋資料庫資料
	$sql = "SELECT * FROM rulerdata where rulerid = '$rulerid'";
	$result = mysql_query($sql);
	$row = @mysql_fetch_row($result);
	
	//判斷帳號與密碼是否為空白
	//以及MySQL資料庫裡是否有這個會員
	if($rulerid != null && $rulerpass != null && $row[1] == $rulerid && $row[2]== $rulerpass)
	{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['rulerid'] = $rulerid;
	?>
	<script language="JavaScript">
		window.alert('登入成功');
	</script>
	<?PHP
        echo '<meta http-equiv=REFRESH CONTENT=0;url=../ruler/rulerwork.php>';
	}
	else
	{		//echo $row[0];	
	?>
	<script language="JavaScript">
		window.alert('登入失敗');
	</script>
	<?PHP
		echo '<meta http-equiv=REFRESH CONTENT=0;url=../idpass/rulerin.php>';
	}
	
?>		