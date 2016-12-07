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
			<link rel="stylesheet" href="../css/lightbox.css" type="text/css" />
			<script type="text/javascript" src="../js/lightbox.js"></script>
			<link rel="stylesheet" href="../css/style.css" type="text/css">
			<link rel="Shortcut Icon" type="image/x-icon" href="../images/page.ico" />
			<!-- ... javascript萬年曆 ... -->
			<link href="../css/jquery-ui.css" rel="stylesheet">			
			<script type="text/javascript" src="../js/jquery.min.js"></script>
			<script type="text/javascript" src="../js/jquery-ui.min.js"></script>			
			<!-- ... 判斷是否至少選一個checkbox ... -->
			<SCRIPT LANGUAGE="JavaScript">					
				function check() {  
					var f = document.forms[1];  
					for (var i=0;i<f.elements.length;i++) {  
						
						var e = f.elements[i]; 
						if (e.type == "checkbox" && e.checked)  
						return true;  
					}  
					
					alert("請至少選擇一個時段");  
					return false;  
				} 
				
			</script>
			<!-- ... 登出才能進行 ... -->
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
					<td height="100">
						<div align="center">
							<div class="body"  id="gallery">
								<ul class="tabs">
									<li class="selected">
										<a href="../classroom/writeclassroom.php">登記借用</a>
									</li>
									<li>
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
								<div class="frame">
									<?php 
										if(isset($_GET['classroom'])){
										?> 
										<?php if($_GET['classroom']=="請選擇"){?>  <a href="../images/ncrs.png" rel="lightbox" title="N.C.R.S"><img border="0" src="../images/ncrs.png"></a> <?php }?>
										<?php if($_GET['classroom']=="c219"){?>  <a href="../images/c219.png" rel="lightbox" title="c219"><img border="0" src="../images/c219.png"></a> <?php }?>
										<?php if($_GET['classroom']=="h110"){?>  <a href="../images/h110.png" rel="lightbox" title="h110"><img border="0" src="../images/h110.png"></a> <?php }?>
									    <?php if($_GET['classroom']=="w100"){?>  <a href="../images/w100.png" rel="lightbox" title="w100"><img border="0" src="../images/w100.png"></a> <?php }?>
									<?php }else {?>
										<img src="../images/ncrs.png" alt="Img"> 
										<?php }?>
								</div>
								<h2></h2>
								<h3>教室借用注意事項</h3>
								<h4>
									借用教室之使用時間最晚至22點00分止，即關閉教室。<br>
									請於使用前兩天完成網路上借用手續。<br>
									
									</h4>
										<h2></h2>
										<div class="details">
											<h5><span class="price">*借用人學號:</span>
											<span class="price1">	<?PHP
													$userID=$_SESSION['userid'];
													echo  "　$userID" ;
													
												?></span>
											</h5>
											<h5><span class="price">*借用人姓名:</span>
												<?PHP 
													require_once('../api/useridpass_connect.inc.php');
													
													if($userID != null)
													{
														//$userid = $_SESSION['userid'];
														$sql = "SELECT * FROM registerdata where userid = '$userID'";
														$result = mysql_query($sql);
														$row = @mysql_fetch_row($result);
														$_SESSION['username']=$row[2];
													}					
											?>
											<span class="price1"><?php echo "　$row[2]";
												
											?></span>
											</h5>
											<form method="GET" action="writeclassroom.php">
												
												
												
												<p><h5><span class="price">*借用日期及時間:</span>
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
															$("#datepicker1").datepicker({dateFormat:"yy-mm-dd",changeYear: true, changeMonth: true, minDate: 'today'+2});
														});
													</script>
												</p></h4>
												<p><h5><span class="price">*借用教室:</span>
													<?php	/*10/1 傳送到自己 刷新之後 決定初始標籤*/ ?>
													<?php	/*10/2 修正寫法 更簡短*/ ?>
													<select name="classroom" onchange="this.form.submit();"/>>
													
													<?php 
														if(isset($_GET['classroom'])){
														?>
														<option>請選擇</option>
														<option value="c219" <?php if($_GET['classroom']=="c219") echo "SELECTED"; ?> > C219</option>
														<option value="h110" <?php if($_GET['classroom']=="h110") echo "SELECTED"; ?> > H110</option>
														<option value="w100" <?php if($_GET['classroom']=="w100") echo "SELECTED"; ?> > W100</option>
														<?php 
															}else {
														?>
														<option>請選擇</option>
														<option value="c219"> C219</option>
														<option value="h110"> H110</option>
														<option value="w100"> W100</option>
														<?php 
														}
													?>
													
												</select>
												
												</p></h5>
												
										</form>
									</div>
									<?php
										date_default_timezone_set('Asia/Taipei');
										mysql_connect('localhost','root',''); 
										mysql_select_db("userregisterclassroom");
									?>
									<?php
										
										/*	-------以下DATEin-------------*/
										if(isset($_GET['date']))
										{	$today=$_GET['date'];
											$tomorrow=date("Y-m-d",strtotime("$today +1 day"));
											$classroom=$_GET['classroom'];
											//	echo $today;
											//	echo $tomorrow;
											/* 10/1 增加日期判斷 && classroom = '$classroom'*/
											$sql = "SELECT date FROM registerclassroom where date between '$today' and '$tomorrow' && classroom = '$classroom' ";
											
											$i=0;
											
											$result = mysql_query($sql);
											while($row = @mysql_fetch_array($result))
											{	//echo '<br>';
												$temp[$i]=$row['date'];
												$i++;
												//echo $row['date'];
												
											}
											//echo '<br>';
											/*判斷那天是否資料庫裡有資料mysql_num_rows($result)!=0*/
											if(mysql_num_rows($result)!=0){
												for ($i = 0, $cnt = count($temp); $i < $cnt; $i++) {
													$alreadyhour[$i]=date("H",strtotime($temp[$i]));
													//print($alreadyhour[$i]);
												}
											}
											/*	-------以下DATEOUT-------------*/
											$sqldateout = "SELECT dateout FROM registerclassroom where dateout between '$today' and '$tomorrow' && classroom = '$classroom' ";
											
											$resultdateout = mysql_query($sqldateout);
											$i=0;
											while($rowdateout = @mysql_fetch_array($resultdateout))
											{	
												$tempdateout[$i]=$rowdateout['dateout'];
												$i++;
												//echo $rowdateout['dateout'];
												
											}
											//echo '<br>';
											if(mysql_num_rows($resultdateout)!=0){
												for ($i = 0, $cnt = count($tempdateout); $i < $cnt; $i++) {
													$alreadyhourdateout[$i]=date("H",strtotime($tempdateout[$i]));
													//print($alreadyhourdateout[$i]);
												}
											}
											/*如果所有教室都借完*/
											if(mysql_num_rows($result)!=0){
												$cnt = count($temp);
												if($cnt== 14){ 
													echo'<br>';
													
													echo "notime";
												}
											}
										?>
										
										<script type="javascript">
											function senddata()
											{
												if(senddata.date.value=="")
												{
													alert("請填寫時間");
												}
												
												
											}
										</script>
										
										<form name="senddata" method="POST" onsubmit="return check();" action="../api/show.php">
											
											<input hidden  name="date" value=" <?php echo $_GET['date'] ?>" >
											<input hidden name="userID" value="<?PHP echo $_SESSION['userid'] ?>">
											<input hidden name="username" value="<?PHP echo $_SESSION['username'] ?>">
											<input hidden name="classroom" value="<?PHP echo $_GET['classroom'] ?>">
											
											<?php
												for($keyindex = 8 ; $keyindex<22 ; $keyindex++){
													$key[$keyindex]=0;
												}
												/*都印*/
												if(mysql_num_rows($result)!=0){
													for($keyindex = 8 ; $keyindex<22 ; $keyindex++){
														for ($i = 0,$cnt = count($tempdateout); $i < $cnt; $i++) { 
															if($alreadyhour[$i]== $keyindex && $alreadyhourdateout[$i]== $keyindex+1)
															$key[$keyindex]=1;
														}
													}
												}
											?>
											
											<?php 
												/*http://forum.twbts.com/viewthread.php?tid=3152 以下陣列寫法 */
												/*10.1 修正 隨便選擇其中一個 就會跑出check box 和 送出按鈕*/
												if($_GET['classroom']!="請選擇" && $_GET['date']!=""){
												?>
												
												<?PHP
													for($i = 8 ; $i<22 ; $i++){
														if($key[$i]==0){
														?>
														
														<table width="300" border="1">
															
														<tr><td align="center"><input type="checkbox" value="<?php echo $i ?>" name="classtime[]"style="WIDTH: 30px; HEIGHT: 30px"> </label> </td> <td align="center"><h6>第<?PHP echo+$i-7?>節<?php echo " - " ?><?php echo $i ?>:00:00~<?php echo $i+1 ?>:00:00</h6></td></tr>
													</table>
													
													<?PHP	
													}
												?>
												
												<?PHP		
												}
												
											?>
											<BR>	
											<BR>
											<input type="submit"  name="submit" value="資料送出" class="myButton">
											<?php 
											}
										?>
									</form>
									
									<?php
									}
									
								?>
								<?php 
								} 
							?>
						</div>
					</td>
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
	</bODY>
</HTML>																																																																																																																																																								