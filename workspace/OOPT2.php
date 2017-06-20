<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
 
function localFormat($date)
{
    $arr = explode('-', $date);
    $year = $arr[0];
    $month = $arr[1];
    $day = $arr[2];
    return "$year.$month.$day";
}
 
function englishFormat($date)
{
    $arr = explode('-', $date);
    $year = $arr[0];
    $month = $arr[1];
    $day = $arr[2];
    return "$month/$day/$year";
}
 
$postDate = '2016-06-02'; # 假設資料庫取出來的發文日期長這樣
$TW=1; //是不是台式

if ($TW>=1) {
    echo localFormat($postDate);
    echo "<br>";
    echo "台式";
} else { // 英語人士身份
    echo englishFormat($postDate);
	echo "<br>";
    echo "西式";
}
