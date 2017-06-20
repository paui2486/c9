<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
    $url = 'https://tw.yahoo.com/';
    //$url = 'https://dashboard.smartling.com/projects/2e63d9aac/content/content.htm#translations/list/filter/locale:zh-CN|url:%2Ffiles%2FPackage_Adventures_at_Universal_Studios_Japan_%7Bcf7421b2-5fa3-4a03-a67d-3e25f8c46387%7D_02.json|workflowFilters:in-progress';
    $ch = curl_init();    //初始化
    $timeout = 30;
    $useragent="Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1";
    $cookie = "cookieLangId=zh_tw;";
    //$request = 'username=chenshihfang@gmail.com&password=Smartling1!';
    
    curl_setopt ($ch, CURLOPT_URL, $url);                //設定抓取網址
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, CURLOPT_POST, 1);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    //把返回來的cookie信息保存在$cookie_jar文件中
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);//逾時時間
    curl_setopt ($ch, CURLOPT_USERAGENT, $useragent);
    curl_setopt ($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    //設定是否顯示頭信息 0為不顯示
    curl_setopt($ch, CURLOPT_HEADER, true);
    //模擬瀏覽器程式名
    curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; InfoPath.1)" );
    //設定是否輸出頁面內容
    curl_setopt($ch, CURLOPT_NOBODY, true);
    //設定連結保持時間 可設可不設
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
  
    $data = curl_exec($ch);            //抓取網頁
   
    curl_close($ch);
    $file = fopen("SMARTLING.html", 'w');    //開啟檔案
    fwrite($file, $data);            //寫入檔案                                   
    fclose($file);                    //關閉檔案
?>
