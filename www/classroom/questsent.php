<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	
	if(empty($_SESSION['userid']) )
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
	<HTML>
		<head>
			<meta charset="utf-8" />
			<TITLE>歡迎使用門禁系統</TITLE>
			<link rel="stylesheet" href="../css/style.css" type="text/css">
			<link rel="Shortcut Icon" type="image/x-icon" href="../images/page.ico" />
		</head>
		<body>
			<div id="header">
				<div>
					<div id="logo">
						<a href="../classroom/writeclassroom.php"><img src="../images/logo.png" alt="LOGO"></a>
					</div>
					
					<div align="center">
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						
						<ul id="navigation">
							<li>
								<a href="../classroom/writeclassroom.php">主頁</a>
							</li>
							<li>
								<a href="javascript:void(0)" onclick="windowalert()">申請帳號</a>
							</li>
							<li>
								<a href="javascript:void(0)" onclick="windowalert()">管理者登入</a>
							</li>
							
						</ul>
					</div>
				</div>
			</div>
			<div id="contents">
				<table border="1" width="800" cellspacing="0" cellpadding="0">
					<td height="100">
						<div align="center">
							<div class="body"  id="gallery">
								<ul class="tabs">
									<li>
										<a href="../classroom/writeclassroom.php">登記借用</a>
									</li>
									<li>
										<a href="../classroom/search.php">查詢登記狀況</a>
									</li>
									<li>
										<a href="../idpass/update.php">變更個人資料</a>
									</li>
									<li class="selected">
										<a href="../classroom/questsent.php">問題回報</a>
									</li>
									<li>
										<a href="../api/outregister.php">登出</a>
									</li>
								</ul>
								<h1>歡迎使用</h1>
							<form></form>
								<form name="form" method="post" action="../api/questsent_finish.php " enctype="multipart/form-data">
								<span class="price">問題回報：</span><br>
								<textarea  rows ="20" cols="50" type="text" name="question"></textarea>
								<br>
									<input type="submit" name="button" value="送出回報" class="myButton"  />
								</form>
							
								<?php 
								} 
							?>
						</div>
					</td>
				</table>
				
			</div>
		</div>
	</body>
</html>