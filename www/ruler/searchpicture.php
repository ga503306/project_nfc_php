<!--管理者使用-->
<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	if(empty($_SESSION['rulerid']))
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
			<TITLE>影本查詢</TITLE>
			<link rel="stylesheet" href="../css/lightbox.css" type="text/css" />
			<script type="text/javascript" src="../js/lightbox.js"></script>
			<link rel="stylesheet" href="../css/style.css" type="text/css">
			<link rel="Shortcut Icon" type="image/x-icon" href="../images/page.ico" />
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
						<a href="../ruler/rulerwork.php"><img src="../images/logo.png" alt="LOGO"></a>
					</div>
					
					<div align="center">
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						
						<ul id="navigation">
							<li>
								<a href="../ruler/rulerwork.php">主頁</a>
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
										<a href="../ruler/classroommanage.php">教室申請管理</a>
									</li>
									<li>
										<a href="../ruler/registmanage.php">帳號總查詢</a>
									</li>
									<li class="selected">
										<a href="../ruler/searchpicture.php">影本查詢</a>
									</li>
									<li>
										<a href="../api/outruler.php">登出</a>
									</li>
								</ul>
								<h1>歡迎使用門禁系統</h1>
								
								<div align = "center">
									<?php
										$handle = opendir('C:\wamp\www\idpass\file');
									?>
									<?PHP
										while(false!=($file=readdir($handle)))
										{
										?>
										
										<?PHP
											if (($file == ".") || ($file == ".."))
											{
												continue;
											}
											
											//echo $file . '<br/>';
										?>
										<table width="300" border="1">
											
											<tr><td align="center"><?PHP echo ("<a href='../idpass/file/$file'  rel='lightbox'  title='N.C.R.S'>$file   </a>");?></td></tr>
											<?PHP
												//echo '<a href=$file >'. "$file ".'</a>';
											}
										?>
										<?PHP closedir($handle); ?>
									</table>
									<?PHP
									}
								?>
							</div>
						</div>
					</table>
				</div>
			</td>
		</table>
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
</html>			