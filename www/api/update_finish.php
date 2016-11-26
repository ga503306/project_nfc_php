<!--使用者更新資料後資料庫同步更新-->
<?php session_start(); ?>
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
include("../api/useridpass_connect.inc.php");

$passcheck= $_POST['passcheck'];
$newpass = $_POST['passchange'];

	$userid = $_SESSION['userid'];
    $sql = "SELECT * FROM registerdata where userid = '$userid'";
	$result = mysql_query($sql);
	$row = @mysql_fetch_row($result);
	
if($_SESSION['userid'] != null && $passcheck == $row[5]&& $newpass != null )
{
        //更新資料庫資料語法
        $sql = "update registerdata set pass='$newpass' where userid='$userid'";
        if(mysql_query($sql))
        {
				?>
				<script language="JavaScript">
					window.alert('修改成功');
				</script>
		<?PHP		
                echo '<meta http-equiv=REFRESH CONTENT=0;url=../classroom/writeclassroom.php>';
        }
        else
        {
	?>
				<script language="JavaScript">
					window.alert('修改資料有錯誤請重新確認');
				</script>
	<?PHP
                echo '<meta http-equiv=REFRESH CONTENT=0;url=../idpass/update.php>';
        }
}
else
{
	?>
			<script language="JavaScript">
					window.alert('修改失敗');
			</script>
<?PHP
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../idpass/update.php>';
}
	}
?>