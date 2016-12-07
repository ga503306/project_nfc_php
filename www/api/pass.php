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
	<?php
		
		$link=mysqli_connect("localhost","root","") or die("無法連接");  // 建立MySQL的資料庫連結
		
		mysqli_select_db($link,"userregisterclassroom")or die ("無法選擇資料庫"); // 選擇school資料庫
		mysqli_query($link, 'SET CHARACTER SET utf8');
		mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
		
		$linkuser=mysqli_connect("localhost","root","") or die("無法連接");  // 建立MySQL的資料庫連結
		mysqli_select_db($linkuser,"useriddata")or die ("無法選擇資料庫"); // 選擇school資料庫
		mysqli_query($linkuser, 'SET CHARACTER SET utf8');
		mysqli_query($linkuser,  "SET collation_connection = 'utf8_general_ci'");
		
		$id = $_GET['id'];
		$email = @$_GET['email'];
		$name = @$_GET['name'];
		$pass = @$_GET['pass'];
		
		mysql_connect("localhost","root","");
		mysql_select_db("userregisterclassroom");
		$data=mysql_query("select * from registerclassroom");
		
		$rs = @mysql_fetch_row($data);
		/*
			echo $rs[1];學號
			echo $rs[2];姓名
			echo $rs[3];借用日期
			echo $rs[4];結束時間
			echo $rs[5];教室
		*/
		
		$sql ="UPDATE registerclassroom SET pass=0 where AI = $id";  //更新資料
		
		
		/*
			echo $id;
			echo $email;
			echo $name;
			echo $pass;
		*/
		
		if (mysqli_query($link,$sql)){
			echo '更新成功';
			echo '<meta http-equiv=REFRESH CONTENT=1;url=../ruler/classroommanage.php>';
		}else 
		echo '更新失敗'; //執行sql語法
		echo '<meta http-equiv=REFRESH CONTENT=1;url=../ruler/classroommanage.php>';
		
		@mysql_close($link); //關閉資料庫連結
		//echo '<meta http-equiv=REFRESH CONTENT=1;url=../classroommanage.php>';
		
	?>
	<?php 
		
		
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
			$mail->Subject = "=?UTF-8?B?".base64_encode("審核通過通知")."?=";    //設定郵件標題
			if($pass==0){
			$mail->Body = "$name 你 $rs[3] 到 $rs[4] 教室 $rs[5] 借用成功!!";
			}
			else
			$mail->Body = "借用失敗";//設定郵件內容
			
			$mail->IsHTML(true);                     //設定郵件內容為HTML
			$mail->AddAddress($email, "=?UTF-8?B?".base64_encode("$name")."?="); //設定收件者郵件及名稱        
			
			if(!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
			}
			else {
			//echo "信件已送出";
			echo"<script>alert('信件已送出!');</script>";
			//echo '<meta http-equiv=REFRESH CONTENT=1;url=registmanage.php>';
		}
		
	}
?>