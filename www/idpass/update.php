<!--使用者可以在此更改密碼-->
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
	<HTML>
		<head>
			<link rel="stylesheet" href="../css/style.css" type="text/css">
			<link rel="Shortcut Icon" type="image/x-icon" href="../images/page.ico" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>變更個人資料</title>
			<script language="JavaScript">
				function windowalert() { 
					window.alert('請先登出');
				}
			</script>
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
					<tr>
					</tr>
					<tr>
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
										<li class="selected">
											<a href="../idpass/update.php">變更個人資料</a>
										</li>
										<li>
										<a href="../classroom/questsent.php">問題回報</a>
									</li>
										<li>
											<a href="../api/outregister.php">登出</a>
										</li>
									</ul>
									<h1>歡迎使用</h1>
									<div align="center">
										<span class="price">學號 :</span><span class="price1"><?php
											include("../api/useridpass_connect.inc.php");
											
											if($_SESSION['userid'] != null)
											{
												$userid = $_SESSION['userid'];
												$sql = "SELECT * FROM registerdata where userid = '$userid'";
												$result = mysql_query($sql);
												$row = @mysql_fetch_row($result);
												echo $row[1];
											?></span>
											
											<form name="form" method="post" action="../api/update_finish.php">
												<span class="price">姓名：</span>	<?PHP 
													require_once('../api/useridpass_connect.inc.php');
													
													if($_SESSION['userid'] != null)
													{
														$userid = $_SESSION['userid'];
														$sql = "SELECT * FROM registerdata where userid = '$userid'";
														$result = mysql_query($sql);
														$row = @mysql_fetch_row($result);
													}					
												?>
												<span class="price1"><?php echo "$row[2]";?></span><br>
												<span class="price">信箱：</span>	<?PHP 
													require_once('../api/useridpass_connect.inc.php');
													
													if($_SESSION['userid'] != null)
													{
														$userid = $_SESSION['userid'];
														$sql = "SELECT * FROM registerdata where userid = '$userid'";
														$result = mysql_query($sql);
														$row = @mysql_fetch_row($result);
													}					
												?>
												<span class="price1"><?php echo "$row[4]";?></span><br><br>
												<span class="price">生日：	</span><?PHP 
													require_once('../api/useridpass_connect.inc.php');
													
													if($_SESSION['userid'] != null)
													{
														$userid = $_SESSION['userid'];
														$sql = "SELECT * FROM registerdata where userid = '$userid'";
														$result = mysql_query($sql);
														$row = @mysql_fetch_row($result);
													}					
												?>
												<span class="price1"><?php echo "$row[3]";?><br><br></span>
												<span class="price">舊密碼：	<input type="password" name="passcheck"  /></span> <br>
												<span class="price">新密碼：	<input type="password" name="passchange"  /></span> 
												<br><br>
												<input type="submit" name="button" value="確認修改"class="myButton" />
											</form>
											<?php
											}
											else
											{
												echo '登入時發生錯誤';
												echo '<meta http-equiv=REFRESH CONTENT=2;url=../index.html>';
											}
										}?>
										
										
										
										
								</div>
							</table>
						</div>
					</div>
					<div id="footer">
						<div>
							<div id="connect">
								<a href="https://www.facebook.com/nhucsie/" target="_blank" class="facebook"></a>
							</div>
							
							<p id="footnote">
								© Copyright 2016. hzt.
							</p>
						</div>
					</div>
				</body>		
			</HTML>					