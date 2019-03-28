# project_nfc_php

大學專題 （網頁部分）<br/>
<首頁><br/>
![image](https://github.com/ga503306/project_nfc_php/blob/fix-api/Readmefile/%E4%B8%BB%E9%A0%81%E9%9D%A2.jpg)<br/>
<帳號申請><br/>
![image](https://github.com/ga503306/project_nfc_php/blob/fix-api/Readmefile/%E5%B8%B3%E8%99%9F%E7%94%B3%E8%AB%8B.jpg)<br/>
<管理員登入><br/>
![image](https://github.com/ga503306/project_nfc_php/blob/fix-api/Readmefile/%E7%AE%A1%E7%90%86%E5%93%A1%E7%99%BB%E5%85%A5.jpg)<br/>
<使用者介面><br/>
![image](https://github.com/ga503306/project_nfc_php/blob/fix-api/Readmefile/%E4%BD%BF%E7%94%A8%E8%80%85%E4%BB%8B%E9%9D%A2.jpg)<br/>
<查詢登記狀況><br/>
![image](https://github.com/ga503306/project_nfc_php/blob/fix-api/Readmefile/%E6%9F%A5%E8%A9%A2%E7%99%BB%E8%A8%98%E7%8B%80%E6%B3%81.jpg)<br/>
<變更密碼><br/>
![image](https://github.com/ga503306/project_nfc_php/blob/fix-api/Readmefile/%E8%AE%8A%E6%9B%B4%E5%AF%86%E7%A2%BC.jpg)<br/>
<問題回報><br/>
![image](https://github.com/ga503306/project_nfc_php/blob/fix-api/Readmefile/%E5%95%8F%E9%A1%8C%E5%9B%9E%E5%A0%B1.jpg)<br/>
<信箱寄信><br/>
![image](https://github.com/ga503306/project_nfc_php/blob/fix-api/Readmefile/%E4%BF%A1%E7%AE%B1%E5%AF%84%E4%BF%A1.png)<br/>
<管理者主頁面><br/>
![image](https://github.com/ga503306/project_nfc_php/blob/fix-api/Readmefile/%E7%AE%A1%E7%90%86%E8%80%85%E4%B8%BB%E9%A0%81%E9%9D%A2.jpg)<br/>
<審核申請教室><br/>
![image](https://github.com/ga503306/project_nfc_php/blob/fix-api/Readmefile/%E5%AF%A9%E6%A0%B8%E7%94%B3%E8%AB%8B.jpg)<br/>
<審核申請者影本><br/>
![image](https://github.com/ga503306/project_nfc_php/blob/fix-api/Readmefile/%E5%AF%A9%E6%A0%B8%E7%94%B3%E8%AB%8B%E8%80%85%E5%BD%B1%E6%9C%AC.jpg)<br/>
<審核申請帳號.jpg><br/>
![image](https://github.com/ga503306/project_nfc_php/blob/fix-api/Readmefile/%E5%AF%A9%E6%A0%B8%E7%94%B3%E8%AB%8B%E5%B8%B3%E8%99%9F.jpg)<br/>


api:連接傳送資料
censoridpass.php:審核帳號並寄郵件

classroom_connect.php:連接userregisterclassroom資料庫

classroom_sql.php:借教室連接資料庫

outregister.php:借用者登出

show.php:連接資料庫傳送借用成功資料

outregister.php:借用者登出

outruler.php:管理者登出

register_finish.php:申請權限的資料送出會跳到這裡並傳到資料庫判斷是否有重複

ruler_connect.inc.php:連接ruler資料庫

rulerdata.php:執行管理者登入的動作

useridpass_connect.inc.php:連接useriddata資料庫

useridpass_sql.php:使用者登入網頁時連接資料庫判斷有無此帳號

update_finish.php:傳送修改資料

delete.php:刪除該筆教室借用資料

delete_finish.php:刪除該筆教室借用資料同時刪除資料庫該筆資料

pass.php:該筆借用資料通過或不通過

censoridpass.php:讓管理者審核申請帳號是否通過
---------------------------------------------------------
classroom:教室借用

questsent.php:回報問題

search.php:查詢教室

writeclassroom.php:借用教室

---------------------------------------------------------
idpass:帳號密碼管理

file:儲放申請者影本

register.php:申請借用權限

rulerin.php:管理者登入頁面

update.php:讓使用者可以變更密碼

---------------------------------------------------------
img:裡面放網頁背景圖
---------------------------------------------------------
PHPMalier:
---------------------------------------------------------
ruler:管理者動作

classroommanage.php:管理者管理教室借用狀況

registmanage.php:管理申請帳號狀況

rulerwork.php:管理者選擇執行工作

searchpicture:管理者執行查詢圖片動作 (readdir 回傳. ..)
---------------------------------------------------------
applogin.php:

index.html:主頁面
