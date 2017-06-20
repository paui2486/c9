<?php

//根據空格切開
$NewString1 = preg_split("/[\s,]+/", "Welcome to Wibibi.Have a good day.");
print_r($NewString1);
echo '<br>';

$NewString2 = preg_split("/[\s]|\b/m", "Welcome to Wibibi.Have a good day.");
print_r($NewString2);
echo '<br>';


$data = "Welcome to Wibibi.Have a good day.";//原始資料
$data = strip_tags($data);//過濾 程式標籤符號

$NewString3 = preg_split("/\s|,|\./", $data); // 比對字串中是否包含 任何空白字元 或 字元 , 其次是 字元 . 
print_r($NewString3);
echo '<br>';
$NewString4 = preg_split("/[\s]|,|\./", $data); // 驗證[\s] 等於 \s
print_r($NewString4);
echo '<br>';
$NewString5 = preg_split("/\s\.|,/", $data); // 比對字串中是否包含 任何空白字元 或 字元 , 或是 字元 .
print_r($NewString5);


/*$NewString4 = ("Welcome to Wibibi.Have a good day.");
print_r (explode(" ",$NewString4));
*/?>