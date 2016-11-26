<!--管理者登入畫面-->
<HTML>
	<head>
		<meta charset="utf-8" />
		<TITLE>管理者登入</TITLE>
		<link rel="stylesheet" href="../css/style.css" type="text/css">
		<link rel="stylesheet" href="../css/login.css" type="text/css">
		<link rel="Shortcut Icon" type="image/x-icon" href="../images/page.ico" />
	</head>
	<body>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<div id="header">
			<div>
				<div id="logo">
					<a href="../index.html"><img src="../images/logo.png" alt="LOGO"></a>
				</div>
				
				<div align="center">
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					
					<ul id="navigation">
						<li>
							<a href="../index.html">主頁</a>
						</li>
						<li>
							<a href="register.php">申請帳號</a>
						</li>
						<li class="selected">
							<a href="rulerin.php">管理者登入</a>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<div>
			<div id="details">
				
				<div>
					<form name="form" method="post" action="../api/rulerdata.php">
						<h2><span class="entypo-login"></span> 管理員登入</h2>
						
						<button class="submit"><span class="entypo-lock"></span></button>				
						<span class="entypo-user inputUserIcon"></span>
						<input type="text" class="user" placeholder="ursername" name="rulerid"/>
						<span class="entypo-key inputPassIcon"></span>
						<input type="password" class="pass"placeholder="password" name="rulerpass"/>
					</form>
					
				</div>
			</div>
			
		</div>
		<div id="footer1">
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