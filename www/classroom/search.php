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
		mysql_connect("localhost","root","");//與localhost連線、root是帳號、密碼處輸入自己設定的密碼
		mysql_select_db("userregisterclassroom");//從userregisterclassroom這個資料庫撈資料
		mysql_query("set names utf8");//設定utf8 中文字才不會出現亂碼
		$searchdata=mysql_query("select * from registerclassroom");//從registerclassroom中選取全部(*)的資料
		
	?>
	<HTML>
		<head>
			<link rel="stylesheet" href="../css/style.css" type="text/css">
			<link rel="Shortcut Icon" type="image/x-icon" href="../images/page.ico" />
			<!-- ... javascript萬年曆 ... -->
			<link href="../css/jquery-ui.css" rel="stylesheet">
			<script type="text/javascript" src="../js/jquery.min.js"></script>
			<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>目前借用狀況</title>
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
										<li class="selected">
											<a href="../classroom/search.php">查詢登記狀況</a>
										</li>
										<li>
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
									
									<div align = "center">
										<br>
										<form>
											<p><span class="price">教室查詢:</span>
												<select name="classroom" onchange="this.form.submit();"/>>
												<?php 
													if(isset($_GET['classroom'])){
													?>
													<option>全部教室</option>
													<option value="c219" <?php if($_GET['classroom']=="c219") echo "SELECTED"; ?> > C219</option>
													<option value="h110" <?php if($_GET['classroom']=="h110") echo "SELECTED"; ?> > H110</option>
													<option value="w100" <?php if($_GET['classroom']=="w100") echo "SELECTED"; ?> > W100</option>
													<?php 
														}else {
													?>
													<option>全部教室</option>
													<option value="c219"> C219</option>
													<option value="h110"> H110</option>
													<option value="w100"> W100</option>
													<?php 
													}
												?>
											</select>
										</p>
										<p><span class="price">借用日期及時間:</span>
											<input id="datepicker1"  type="text" name="date" 
											value = "<?php if(isset($_GET['date'])){ echo $_GET['date'];}?>" onchange="this.form.submit();"  readonly="true"/>
											<script language="JavaScript">
												$(document).ready(function(){ 
													$.datepicker.regional['zh-TW']={
														dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
														dayNamesMin:["日","一","二","三","四","五","六"],
														monthNames:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
														monthNamesShort:["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
														prevText:"上月",
														nextText:"次月",
														weekHeader:"週"
													};
													$.datepicker.setDefaults($.datepicker.regional["zh-TW"]);
													$("#datepicker1").datepicker({dateFormat:"yy-mm-dd",changeYear: true, changeMonth: true, yearRange:"-50:+0"});
												});
											</script>
										</p>
									</form>
									
								</div>
								<?PHP 
									
									if(isset($_GET['classroom']))
									{
										$classroom=$_GET['classroom'];
										$searchdata=mysql_query("select * from registerclassroom where classroom like '%$classroom' ");
									}
									
									if(@$_GET['classroom']!="" && @$_GET['date']!="")
									{
										if($_GET['classroom']== "全部教室"){
											$today=$_GET['date'];
											$tomorrow=date("Y-m-d",strtotime("$today +1 day"));
											$searchdata=mysql_query("select * from registerclassroom where dateout between '$today' and '$tomorrow' ");
											}
										else{
											$classroom=$_GET['classroom'];
											$today=$_GET['date'];
											$tomorrow=date("Y-m-d",strtotime("$today +1 day"));
											$searchdata=mysql_query("select * from registerclassroom where dateout between '$today' and '$tomorrow' && classroom = '$classroom' ");
										}
									}
								?>
								
								<div align = "center">
									<table width="900" border="2">
										<tr>
											<td><h6>學號</h6></td>
											<td><h6>姓名</h6></td>
											<td><h6>借用日期</h6></td>
											<td><h6>結束時間</h6></td>
											<td><h6>借用教室</h6></td>
											<td><h6>審核狀況</h6></td>
										</tr>
									</div>
									<?php
										for($i=1;$i<=mysql_num_rows($searchdata);$i++)
										{ $rs=mysql_fetch_row($searchdata);
											?><tr>
											<td><h6><?php echo $rs[1]?></h6></td>
											<td><h6><?php echo $rs[2]?></h6></td>
											<td><h6><?php echo $rs[3]?></h6></td>
											<td><h6><?php echo $rs[4]?></h6></td>
											<td><h6><?php echo $rs[5]?></h6></td>
											<td><h6><?php
												$sql = "SELECT * FROM registerclassroom where pass";
												if($rs[6]==1)
												{
													echo '審核不通過';
												}
												else if($rs[6]==2){
													echo '審核中';
												}
												else
												{
													echo '審核通過';
												}
												
											?></h6></td>
										</tr>
										<?php }
									}?>
							</table>
							<input type ="button" onclick="javascript:location.href='../classroom/search.php'" value="顯示全部" class="myButton"></input>
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
		