<?php
	date_default_timezone_set('Asia/Taipei');
	mysql_connect('localhost','root',''); 
	mysql_select_db("userregisterclassroom");
	$sendthis = $_POST["sendthis"];
	
	$sendthis_cut = explode("_",$sendthis);
	/*$sendthis_cut[0] = 學號 $sendthis_cut[1] = in or out*/
	//echo $sendthis_cut[0];
	//echo $sendthis_cut[1];
	
	$sqldate = "SELECT date FROM `registerclassroom` WHERE userid = " . $sendthis_cut[0];
	$sqldateout = "SELECT dateout FROM `registerclassroom` WHERE userid = " . $sendthis_cut[0];
	$sqlpass = "SELECT pass FROM `registerclassroom` WHERE userid = " . $sendthis_cut[0];
	
	$date = mysql_query($sqldate);
	$dateout= mysql_query($sqldateout);
	$pass= mysql_query($sqlpass);
	/*9.29 須小改 改成mysql_fetch_array 可參考SENDTOSAMEPAGE 最後時間判斷用迴圈 可能需要用到KEY*/
	/*---以下datein---*/
	$i=0;
	while($row = @mysql_fetch_array($date))
	{	//echo '<br>';
		$temp[$i]=$row['date'];
		$i++;
		//echo $row['date'];
		
	}
	
	/*---以下dateout---*/
	$i=0;
	while($rowdateout = @mysql_fetch_array($dateout))
	{	
		$tempdateout[$i]=$rowdateout['dateout'];
		$i++;
		//echo $rowdateout['dateout'];
	}
	/*---pass---*/
	$i=0;
	while($rowpass = @mysql_fetch_array($pass))
	{	
		$temppass[$i]=$rowpass['pass'];
		$i++;
		//echo $rowpass['pass'];
	}
	$key = 0;
	$nowtime = time();
	if(mysql_num_rows($date)!=0){
		for ($i = 0,$cnt = count($tempdateout); $i < $cnt; $i++) {
			/*echo $nowtime;
			echo ' ';
			echo strtotime($tempdateout[$i]);
			echo ' ';
			echo strtotime($temp[$i]);
			echo '<br>';  */
			if($nowtime - strtotime($tempdateout[$i]) <0 && $nowtime -  strtotime($temp[$i]) >0 && $temppass[$i]==0){
				$key = 1;
				/*appin 紀錄時間*/
				if($sendthis_cut[1]=="in"){
					$datetime= date("Y-m-d H:i:s");
					$sql = "update registerclassroom set appdatein = '$datetime' where date = '$temp[$i]'";
					mysql_query($sql);
				}
				else if($sendthis_cut[1]=="out"){
					$datetime= date("Y-m-d H:i:s");
					$sql = "update registerclassroom set appdateout = '$datetime' where date = '$temp[$i]'";
					mysql_query($sql);
				}
			}
		}
	}
	
	if($key==1)
	echo "{yes}";
	else
	echo "{no}";
	
?>