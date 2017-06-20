<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$postDate=$_POST[postDate]; 
// $postDate = '2016-06-02'; # 假設資料庫取出來的發文日期長這樣
$TW=$_POST[TW]; 
// $TW = 1;//是不是臺式
if ($TW >= "1") {
    # 轉換成這樣 2016.6.2
    $arr = explode('-', $postDate);
    $year = $arr[0];
    $month = $arr[1];
    $day = $arr[2];
    echo "$year.$month.$day";
    echo "<br>";
    echo "台式";
} else { // 西方格式
    # 轉換成這樣 6/2/2016
    $arr = explode('-', $postDate);
    $year = $arr[0];
    $month = $arr[1];
    $day = $arr[2];
    echo "$month/$day/$year";
    echo "<br>";
    echo "西式";
}

require 'footer.php';
