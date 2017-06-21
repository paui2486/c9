<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<title>上傳檔案詳情</title>
</head>
<body>
<h2>上傳檔案詳情</h2>
 <!-- <input type="file" name="uploadFile"> -->
<?php
// display file details

//變數區 開始

//$filename = md5(uniqid(rand()));//$filename可以用隨機md5來產生32位的不規則檔名 封印
$target_dir = "/home/ubuntu/workspace/workspace/";//存檔路徑
$temp = explode(".", $_FILES["uploadFile"]["name"]);//explode把檔名跟副檔名用 " . “分開
$startX = $temp[0];//[0]選取array第一個元素也就是檔名
$extension = end($temp);//end選取array最後一個元素也就是副檔名
//變數區 結束

function info() { //資訊
echo "Filename: " . $_FILES['uploadFile']['name'] . "<br>";//案在客戶端電腦上的檔案名稱
echo "Temporary Name: " . $_FILES['uploadFile']['tmp_name'] . "<br>";//上傳檔案儲存在伺服器端的暫存檔案名
echo "Size: ". $_FILES['uploadFile']['size']/1024 . "KB<br>";//上傳檔案的檔案大小
echo "Type: ". $_FILES['uploadFile']['type'] . "<br>";//檔案的 MIME 類型
}
function check($extension,$target_dir) { //先檢查上傳檔案有無錯誤 在檢查副檔名 MIME
   
if($_FILES['uploadFile']['error']>0){//檢測是否有錯誤
  echo ("檔案上傳失敗！");//如果出現錯誤則停止程式
  echo "Error: " . $_FILES["file"]["error"];
  echo("<meta http-equiv=REFRESH CONTENT=5;url=up.html>");//5秒後跳轉up.html
  exit;
}
if($extension != "xlsx"){ //副檔名判斷
    echo ("檔案上傳失敗！");//如果出現錯誤則停止程式
  echo "錯誤:這不是excel或是非xlsx副檔名<br>";
  //echo $extension;
  echo("<meta http-equiv=REFRESH CONTENT=5;url=up.html>");//5秒後跳轉up.html
  exit;
}
if($_FILES['uploadFile']['type'] != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'){ //檢測檔案類型 MIME判斷
  echo ("檔案上傳失敗！");//如果出現錯誤則停止程式
  echo "錯誤:這不是excel<br>";
  echo("<meta http-equiv=REFRESH CONTENT=5;url=up.html>");//5秒後跳轉up.html
  exit;
}   
//檢查檔案是否重複 根據檔案位置 名稱
if (file_exists("$target_dir" . $_FILES["uploadFile"]["name"])){
    echo "檔案已經存在，請勿重覆上傳相同檔案";
    echo "五秒後跳轉";
    echo("<meta http-equiv=REFRESH CONTENT=5;url=up.html>");//5秒後跳轉up.html
    exit;
}   
}// 檢查結束
// 正式開始
check($extension,$target_dir);

info();//資訊

// copy file here
if (@copy($_FILES['uploadFile']['tmp_name'], "$target_dir" . $_FILES['uploadFile']['name'])) {
    echo "<b>檔案上傳成功</br>";
    echo "$target_dir" . $_FILES['uploadFile']['name'].'<BR>';
    $newxlsx = $_FILES['uploadFile']['name'];
    $startX = $startX ;
    include("match6.php");
} else {
    echo "<b>Error: 檔案上傳失敗</br>";
    echo "Error: " . $_FILES["file"]["error"];
    echo("<meta http-equiv=REFRESH CONTENT=5;url=up.html>");//5秒後跳轉up.html
    exit;
}
?>
 
</body>
</html>