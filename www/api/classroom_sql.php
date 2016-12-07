<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	if(empty($_SESSION['userid']))
	{
        echo '<meta http-equiv=REFRESH CONTENT=0;url=../index.html>';
	?>
	<script language="JavaScript">
		window.alert('登入時發生錯誤!');
	</script>
	<?php
	}
	else{
	?>
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("../api/classroom_connect.php");



//搜尋資料庫資料
$sql = "SELECT * FROM idpass where userid = '$userid'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($userid != null && $pw != null && $row[0] == $userid && $row[1] == $pw)
{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['userid'] = $userid;
        echo '登入成功!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
}
else
{
        echo '借用失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=../index.html>';
		//echo $row[0];
		//echo $row[1];
		//echo $result;
		//echo $sql;
}
	}
?>