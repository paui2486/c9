<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 

$cookie_jar = '../cookie.txt' ;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://nadesign-paui.c9users.io/20160126/index.php');
curl_setopt($ch, CURLOPT_POST, 1);
$request = 'username=chenshihfang@gmail.com&password=Smartling1!';
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
//把返回來的cookie保存在$cookie_jar文件中
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar);
//設定返回的資料是否自動顯示
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//設定是否顯示頭訊息
curl_setopt($ch, CURLOPT_HEADER, true);
//設定是否輸出頁面內容
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_exec($ch);
curl_close($ch);
//get data after login
echo $cookie_jar;
$tar = '';

$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, 'https://nadesign-paui.c9users.io/20160126/member.html');//'要爬的網址'
curl_setopt($ch2, CURLOPT_HEADER, true);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_COOKIEFILE, $cookie_jar);
$orders = curl_exec($ch2);
echo '<pre>';
echo strip_tags($orders);
echo '</pre>';

//$data = curl_exec($ch2);
$data = strip_tags($orders);
curl_close($ch2);

$file = fopen("SMARTLING.html", 'w');   //開啟檔案
fwrite($file, $data);            //寫入檔案                                   
fclose($file);                    //關閉檔案
    ?>