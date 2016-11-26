<!--使用者申請帳號畫面-->
<HTML>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<link rel="stylesheet" href="../css/lightbox.css" type="text/css" />
		<script type="text/javascript" src="../js/lightbox.js"></script>
		<link href="../css/jquery-ui.css" rel="stylesheet">
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
		
		<!-- ... 判斷是否至少選一個checkbox ... -->
		<SCRIPT LANGUAGE="JavaScript">					
			function check() {  
				if(form.userid.value != "" && form.username.value != "" && form.pass.value != "" && form.date.value != "" && form.Email.value != "" && form.file.value != "") 
                {
					if(isNaN(form.userid.value)){
						alert("學號必須為數字");
						return false;
					}
					else if(form.username.value.match(/[^\u3447-\uFA29]/ig)){
						alert("姓名必須為中文");
						return false;
					}
					else if(isNaN(form.pass.value) || form.pass.value.length<4 ){
						alert("密碼必須為四個以上之數字");
						return false;
					}
					else if(form.Email.value.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/)== -1){
						alert("信箱格式錯誤");
						return false;
					}
				}
				else{
					alert("未輸入完整資訊");
					return false;
				}
			} 
			
		</script>
		
		<link rel="Shortcut Icon" type="image/x-icon" href="../images/page.ico" />
		<TITLE>申請個人資料</TITLE>
		<link rel="stylesheet" href="../css/style.css" type="text/css">
		
	</head>
	<body>
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
						<li class="selected">
							<a href="register.php">申請帳號</a>
						</li>
						<li>
							<a href="rulerin.php">管理者登入</a>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<ul id="featured">
			
			<li>
				<div>
					<a href="../images/living-room.jpg" rel="lightbox" title="N.C.R.S"><img border="0" src="../images/living-room.jpg"></a>
					
				</div>
				<div class="details">
					<h4>請填寫個人資料</h4>
					<form name="form" method="post" onsubmit="return check();" action="../api/register_finish.php " enctype="multipart/form-data">
						<p align="center">*學號：<input type="text" name="userid" /></p>
						<p align="center">*姓名：<input type="text" name="username" /></p>
						<p align="center">*密碼：<input type="password" name="pass" /></p>
						<p align="center">生日：<input id="datepicker1"  type="text" name="date" readonly="true"/>
							
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
						<p align="center">信箱：<input type="text" name="Email" /></p><br>
						<h4>請上傳影本</h4>
						<p align="center">選擇檔案：<input id="file" name="file" type="file"></p>
						<p align="center"><input type="submit" name="button" value="送出申請" class="myButton"  /></p>
					</form>	
					<p align="center"><input type ="button" onclick="javascript:location.href='../index.html'" value="取消申請" class="myButton"></input></p>
				</div>
			</ul>
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
	</body>
</HTML>				