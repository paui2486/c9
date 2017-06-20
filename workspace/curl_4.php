<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 

//設定暫存檔位置
$cookie_jar = '../cookie.txt';
//$cookie_file = '../cookief.txt';
//curl開始
$ch = curl_init();
//設定curl傳送的地方
curl_setopt($ch,CURLOPT_URL,'https://sso.smartling.com/auth/realms/Smartling/protocol/openid-connect/auth?response_type=code&client_id=wa&redirect_uri=https%3A%2F%2Fdashboard.smartling.com%2Fsso%2Flogin.htm&state=2781%2Fca66d268-74ab-433a-a17d-849c8ce2a8f2&login=true');
//模擬傳送post值
$request = 'username=chenshihfang@gmail.com&password=Smartling1!';
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
//把返回來的cookie信息保存在$cookie_jar文件中
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar);

//設定返回的數據是否自動顯示 false不顯示
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//設定是否顯示頭信息 0為不顯示
curl_setopt($ch, CURLOPT_HEADER, true);
//模擬REFERER值
curl_setopt ($ch, CURLOPT_REFERER, "");
//模擬瀏覽器程式名
curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; InfoPath.1)" );
//設定是否輸出頁面內容
curl_setopt($ch, CURLOPT_NOBODY, true);
//設定連結保持時間 可設可不設
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
//執行curl
//curl_exec($ch);
$order=curl_exec($ch);//抓取網頁
echo '<br>';
echo '<br>';
echo '<br>';
echo $order ;

//curl關閉
/*curl_close($ch); //測試關閉
$file = fopen("C4.html", 'w');    //開啟檔案
fwrite($file, $order);            //寫入檔案                                   
fclose($file);                    //關閉檔案
*/

//取得session資料後..可以在執行一次開啟網頁內容將session模擬送出
$ch2 = curl_init();
//header("Location: https://dashboard.smartling.com/");
//exit;
$request1 = 'url=/files/Package_Adventures_at_Universal_Studios_Japan_{cf7421b2-5fa3-4a03-a67d-3e25f8c46387}_02.json';
curl_setopt($ch2, CURLOPT_URL, "https://dashboard.smartling.com/projects/2e63d9aac/content/content.htm#translations/list/filter/locale:zh-HK|workflowFilters:in-progress");

curl_setopt($ch2, CURLOPT_COOKIEFILE, $cookie_jar);

curl_setopt($ch2, CURLOPT_HEADER, 1);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);// 轉指302
curl_setopt($ch2, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; InfoPath.1)" );
curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, 0);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
//模擬輸出之網站
curl_setopt($ch2, CURLOPT_POST, 1);//post?
curl_setopt($ch2, CURLOPT_POSTFIELDS, $request1);// 補充
//curl_setopt($ch2, CURLOPT_POST, "");//post? 原版
//curl_setopt($ch2, CURLOPT_COOKIEFILE, $cookie_jar);
$orders=curl_exec($ch2);
curl_close($ch2);
//輸出所取得的資料
echo '<br>';
echo '<br>';
echo '<br>';
echo $orders ;

?>