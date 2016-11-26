<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?PHP
	$catchquestion=$_POST['question'];
	
	if($catchquestion==null)
	{
		echo "<script>alert('你沒填寫問題內容喔!');</script>";
		echo '<meta http-equiv=REFRESH CONTENT=0;url=../classroom/questsent.php>';
	}
	else
	{
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
		$mail->Subject = "=?UTF-8?B?".base64_encode("回報問題")."?=";    //設定郵件標題
		$mail->Body = "$catchquestion";  //設定郵件內容
		$mail->IsHTML(true);                     //設定郵件內容為HTML
		$mail->AddAddress("ga303306@gmail.com", "=?UTF-8?B?".base64_encode("楊承閎")."?="); //設定收件者郵件及名稱        
		
		if(!$mail->Send()) {
			echo "信件送出失敗: " . $mail->ErrorInfo;
		}
		else {
			echo "<script>alert('信件成功送出');</script>";
			echo '<meta http-equiv=REFRESH CONTENT=0;url=../classroom/questsent.php>';
		}
	}
?>