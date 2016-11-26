<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	if(empty($_SESSION['userid']))
	{
        echo '<meta http-equiv=REFRESH CONTENT=0;url=../index.html>';
	?>
	<script language="JavaScript">
		window.alert('登入時發生錯誤!');
		echo '<meta http-equiv=REFRESH CONTENT=0;url=../index.html>';
	</script>
	<?php
	}
	else{

//將session清空
unset($_SESSION['userid']);
?>
			<script language="JavaScript">
			window.alert('登出成功');
			</script>
			<?PHP
echo '<meta http-equiv=REFRESH CONTENT=0;url=../index.html>';
	}
?>