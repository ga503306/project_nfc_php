<!--顯示剛剛登記的資料-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php session_start(); ?>	
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
			<meta charset="utf-8" />
			<TITLE>剛才登記訊息</TITLE>
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
								<h6><?php
									include("classroom_connect.php");
									$userid = $_POST["userID"];
									$username = $_POST["username"];
									
									$classroom = $_POST["classroom"];
									
									
									if(empty($_REQUEST["classtime"]))
									{
										echo '借用失敗 請重新確認'; ?>
										<script language="JavaScript">
											window.alert('借用失敗');
										</script>
										<?php
										echo '<meta http-equiv=REFRESH CONTENT=0;url=writeclassroom.php>';
									}
									else
									{
										
										if(isset($_REQUEST["classtime"])){ /*如果有資料才做以下動作*/
											$classtime=$_REQUEST["classtime"];
											$howmanyclasstime=count($classtime);
											
											for ($i=0; $i<$howmanyclasstime; $i++)
											{	
												for($j=8 ; $j<22 ; $j++) /*8點到21點 的節數*/
												{
													if($classtime[$i]== $j ){
														$hour=$j; $hourout=$j+1;
														$date =$_POST["date"]." ".$hour.":00:00";
														$dateout =$_POST["date"]." ".$hourout.":00:00";
														$sql="INSERT INTO registerclassroom(userid,username,date,dateout,classroom,appdateout) VALUES ('$userid','$username','$date','$dateout','$classroom','$dateout')";
														mysql_query($sql);	
													}
													
												}	
											}
										echo '借用成功 請等待審核結果!'; ?>
										<script language="JavaScript">
											window.alert('借用成功');
										</script>
										<?php
											echo '<meta http-equiv=REFRESH CONTENT=2;url=../classroom/writeclassroom.php>';
										}
										
										 require('../PHPMailer/PHPMailerAutoload.php'); //匯入PHPMailer類別       
											
											$mail= new PHPMailer();          //建立新物件
											$mail->IsSMTP();                 //設定使用SMTP方式寄信
											$mail->SMTPAuth = true;          //設定SMTP需要驗證
											$mail->SMTPSecure = "ssl";       // Gmail的SMTP主機需要使用SSL連線
											$mail->Host = "smtp.gmail.com";  //Gamil的SMTP主機
											$mail->Port = 465;               //Gamil的SMTP主機的SMTP埠位為465埠。
											$mail->CharSet = "big5";         //設定郵件編碼        
											
											$mail->Username = "a7s8d55f661f83";  //Gmail帳號
											$mail->Password = "a7s485910129";  //Gmail密碼        
											
											$mail->From = "a7s8d55f661f83@gmail.com"; //設定寄件者信箱
											$mail->FromName = "=?UTF-8?B?".base64_encode("楊承閎")."?=";     //設定寄件者姓名
											$mail->Subject = "=?UTF-8?B?".base64_encode("借用教室申請")."?=";    //設定郵件標題
										$mail->Body = "有一個新的借用教室資料!";  //設定郵件內容
										$mail->IsHTML(true);                     //設定郵件內容為HTML
										$mail->AddAddress("ga303306@gmail.com", "=?UTF-8?B?".base64_encode("楊承閎")."?="); //設定收件者郵件及名稱        
										
										if(!$mail->Send()) {
										echo "Mailer Error: " . $mail->ErrorInfo;
										}
										else {
										echo "Message sent!";
										}
									}
								}
								
								
								?></h6>
						</div>
					</td>
				</table>
			</div>
		</div>	
	</body>
</HTML>			