<?php
/*
if(!empty($_SERVER['HTTP_CLIENT_IP'])){
   $myip = $_SERVER['HTTP_CLIENT_IP'];
}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
   $myip1 = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
   $myip2= $_SERVER['REMOTE_ADDR'];
}
echo $myip."<br>";
echo $myip1."<br>";
echo $myip2."<br>";
*/ //參考資料:http://devco.re/blog/2014/06/19/client-ip-detection/
$myip = $_SERVER['HTTP_CLIENT_IP'];
$myip1 = $_SERVER['HTTP_X_FORWARDED_FOR'];
$myip2= $_SERVER['REMOTE_ADDR'];
$myip3= $_SERVER['HTTP_X_FORWARDED'];


if($myip1 != $myip2)
{
    echo $myip1;
    
}else{
    
    echo $myip2;
}

?>

