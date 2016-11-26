<!--使用者申請帳戶完後傳送資料到資料庫-->
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	include("../api/useridpass_connect.inc.php");
	
	$userid = $_POST['userid'];
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$birth = $_POST["date"];
	$Email = $_POST['Email'];
	
	$sql = "SELECT * FROM registerdata where userid = '$userid'";
	$result = mysql_query($sql);
	$row = @mysql_fetch_row($result);
	
	//判斷申請資料是否為空值
	//if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $Email))
	//{
	//	echo '此信箱格式有誤';
	//echo '<meta http-equiv=REFRESH CONTENT=2;url=../index.html>';
	//}
	if($userid==$row[1] && $userid != null && $username != null ){
		echo "<script>alert('新增失敗 使用者帳號重複!');</script>";
        echo '<meta http-equiv=REFRESH CONTENT=0;url=../idpass/register.php>';
	}
	else if($userid != null && $username != null && $pass != null )
	{
        //新增資料進資料庫語法
        $sql = "INSERT INTO registerdata(userid,username,pass,birth,Email) values('$userid', '$username' ,'$pass','$birth' , '$Email')";
        if(mysql_query($sql))
        {
			$_SESSION['userid'] = $userid;
			updatefile();
			sendmail();
			echo '<meta http-equiv=REFRESH CONTENT=0;url=../index.html>';
			echo "<script>alert('新增成功! 請等待審核通知!');</script>";
		}
		
	}
	else
	{
		echo "<script>alert('新增失敗!');</script>";
		echo '<meta http-equiv=REFRESH CONTENT=0;url=../idpass/register.php>';
	}
?>
<?php
	function updatefile(){
		$filename = $_POST['userid'];//接收申請者學號
		//$name=$filename;
		if($_FILES['file']['error']>0)
		{
			exit("檔案上傳失敗！");//如果出現錯誤則停止程式
		}
		else  if($_FILES['file']['type']=="image/jpeg"||$_FILES['file']['type']=="image/png"||$_FILES['file']['type']=="image/gif")
		{
			move_uploaded_file($_FILES['file']['tmp_name'],'../idpass/file/'.$filename);//複製檔案
		}
		
		
		//echo '<a href="file/'.$_FILES['file']['name'].'">file/'.$_FILES['file']['name'].'</a>';//顯示檔案路徑
	}
?>

<?php
	function sendmail(){
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
		$mail->Subject = "=?UTF-8?B?".base64_encode("新使用者申請")."?=";    //設定郵件標題
		$mail->Body = "有一個新的申請者!";  //設定郵件內容
		$mail->IsHTML(true);                     //設定郵件內容為HTML
		$mail->AddAddress("ga303306@gmail.com", "=?UTF-8?B?".base64_encode("楊承閎")."?="); //設定收件者郵件及名稱        
		
		if(!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		}
		else {
		//	echo "<script>alert('新增成功! 請等待審核通知!');</script>";
		}
	}
?>  