<!--管理教室申請用-->
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
			<TITLE>教室審核狀況</TITLE>
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
									<li class="selected">
										<a href="../ruler/classroommanage.php">教室申請管理</a>
									</li>
									<li>
										<a href="../ruler/registmanage.php">帳號總查詢</a>
									</li>
									<li>
										<a href="../ruler/searchpicture.php">影本查詢</a>
									</li>
									<li>
										<a href="../api/outruler.php">登出</a>
									</li>
								</ul>
								<h1>歡迎使用門禁系統</h1>
								<?php 
									mysql_connect("localhost","root","");//與localhost連線、root是帳號、密碼處輸入自己設定的密碼
									mysql_select_db("userregisterclassroom");//從userregisterclassroom這個資料庫撈資料
									mysql_query("set names utf8");//設定utf8 中文字才不會出現亂碼
									$searchstatus=mysql_query("select * from registerclassroom");//從registerclassroom中選取全部(*)的資料
									
								?>
								<div align = "center">
									<br>
									<form>
										<p><span class="price">目前審核狀況:</span>
											<select name="status" onchange="this.form.submit();"/>>
											<?php 
												if(isset($_GET['status'])){
												?>
												<option>全部名單</option>
												<option value="2" <?php if($_GET['status']=="2") echo "SELECTED"; ?> > 審核中</option>
												<option value="0" <?php if($_GET['status']=="0") echo "SELECTED"; ?> > 審核通過</option>
												<option value="1" <?php if($_GET['status']=="1") echo "SELECTED"; ?> > 審核未過</option>
												<?php 
													}else {
												?>
												<option>全部名單</option>
												<option value="2"> 審核中</option>
												<option value="0"> 審核通過</option>
												<option value="1"> 審核未過</option>
												<?php 
												}
											?>
										</select>
									</p>
								</form>
							</div>
							<?PHP 
								if(@$_GET['status']!="")
								{
									if($_GET['status']== "全部名單"){
										$searchstatus=mysql_query("select * from registerclassroom");
									}
									else{
										$status=$_GET['status'];
										$searchstatus=mysql_query("select * from registerclassroom where pass like '%$status' ");
									}
								}
							?>
							<div align = "center">
								<table width="900" border="1">
									<tr>
										<td><h6>編號</h6></td>
										<td><h6>學號</h6></td>
										<td><h6>姓名</h6></td>
										<td><h6>借用日期</h6></td>
										<td><h6>結束時間</h6></td>
										<td><h6>借用教室</h6></td>
										<td><h6>審核狀態</h6></td>
									</tr>
								</div>
								<?php 
									for($i=1;$i<=mysql_num_rows($searchstatus);$i++)
									{ $rs=mysql_fetch_row($searchstatus);?>
									<tr>
										<td><h6><?php echo $i ?></h6></td>
										<td><h6><?php echo $rs[1]?></h6></td>
										<td><h6><?php echo $rs[2]?></h6></td>
										<td><h6><?php echo $rs[3]?></h6></td>
										<td><h6><?php echo $rs[4]?></h6></td>
										<td><h6><?php echo $rs[5]?></h6></td>
										<?PHP /*去別的資料庫抓使用者信箱*/
											mysql_select_db("useriddata");
											$userdata=mysql_query("select Email from registerdata where userid = $rs[1]");
										$row = @mysql_fetch_row($userdata);?>
										
										<td><h6><?php if($rs[6]=="2") echo "審核中";
											else if($rs[6]=="0") echo "審核通過"; 
											else if($rs[6]=="1") echo "審核未過"; 
										?></h6></td>
										<td><a href="../api/pass.php?=0&id=<?php echo $rs[0]?>&name=<?php echo $rs[2]?>&email=<?PHP echo $row[0]?>">通過</a></td><td><a href="../api/delete.php?id=<?php echo $rs[0]?>&tc=<?php echo $i?>&name=<?php echo $rs[2]?>&email=<?PHP echo $row[0]?>">刪除</a></td>
									</tr>
									<?PHP	
									}
								?>
							</div>
						</table>
					<?php }?>
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
				