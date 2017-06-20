<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
    //$url = 'https://pauiclass-paui.c9users.io/workspace/index.php';
    $url = 'https://home.gamer.com.tw/creationDetail.php?sn=3603919';
    $ch = curl_init();    //初始化
    $timeout = 30;
    $useragent="Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1";
    $cookie = "cookieLangId=zh_tw;";

    curl_setopt ($ch, CURLOPT_URL, $url);                //設定抓取網址
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);//逾時時間
    curl_setopt ($ch, CURLOPT_USERAGENT, $useragent);
    curl_setopt ($ch, CURLOPT_COOKIE, $cookie);
  
    $data = curl_exec($ch);            //抓取網頁
   
    curl_close($ch);
    $file = fopen("SMARTLING.html", 'w');    //開啟檔案
    fwrite($file, $data);            //寫入檔案                                   
    fclose($file);                    //關閉檔案
?>
