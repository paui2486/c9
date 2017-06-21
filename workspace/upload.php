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

$target_dir = "/home/ubuntu/workspace/workspace/";//存檔路徑

if($_FILES['uploadFile']['error']>0){//檢測是否有錯誤
  echo ("檔案上傳失敗！");//如果出現錯誤則停止程式
  echo "Error: " . $_FILES["file"]["error"];
  echo("<meta http-equiv=REFRESH CONTENT=5;url=up.html>");//5秒後跳轉up.html
  exit;
}

$temp = explode(".", $_FILES["uploadFile"]["name"]);//explode把檔名跟副檔名用 " . “分開
$extension = end($temp);//end選取array最後一個元素也就是副檔名

if($extension != "xlsx"){
    echo ("檔案上傳失敗！");//如果出現錯誤則停止程式
  echo "錯誤:這不是excel或是非xlsx副檔名<br>";
  echo $extension;
  //echo "Type: ". $_FILES['uploadFile']['type'] . "<br>";
  echo("<meta http-equiv=REFRESH CONTENT=5;url=up.html>");//5秒後跳轉up.html
  exit;
}

/*if($_FILES['uploadFile']['type'] != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'){ //檢測檔案類型 MIME
  echo ("檔案上傳失敗！");//如果出現錯誤則停止程式
  echo "錯誤:這不是excel<br>";
  echo "Type: ". $_FILES['uploadFile']['type'] . "<br>";
  //echo("<meta http-equiv=REFRESH CONTENT=5;url=up.html>");//5秒後跳轉up.html
  exit;
}*/

echo "Filename: " . $_FILES['uploadFile']['name'] . "<br>";//案在客戶端電腦上的檔案名稱
echo "Temporary Name: " . $_FILES['uploadFile']['tmp_name'] . "<br>";//上傳檔案儲存在伺服器端的暫存檔案名
echo "Size: ". $_FILES['uploadFile']['size']/1024 . "<br>";//上傳檔案的檔案大小
echo "Type: ". $_FILES['uploadFile']['type'] . "<br>";//檔案的 MIME 類型

// copy file here
if (@copy($_FILES['uploadFile']['tmp_name'], "$target_dir" . $_FILES['uploadFile']['name'])) {
    echo "<b>File successfully upload</br>";
    echo "$target_dir" . $_FILES['uploadFile']['name'];
} else {
    echo "<b>Error: failed to upload file</br>";
    echo "Error: " . $_FILES["file"]["error"];
}
?>
 
</body>
</html>