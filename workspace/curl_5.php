<?php


//設定post的資料 
 $post = array ( 
 'username' => 'chenshihfang@gmail.com', // 帳號
 'password' => 'Smartling1!'// 密碼
    ); 
//登入網址
$url = "https://sso.smartling.com/auth/realms/Smartling/protocol/openid-connect/auth?response_type=code&client_id=wa&redirect_uri=https%3A%2F%2Fdashboard.smartling.com%2Fsso%2Flogin.htm&state=2781%2Fca66d268-74ab-433a-a17d-849c8ce2a8f2&login=true"; //登入網址
//設定cookie保存路徑 
$cookie = dirname(__FILE__) . '/cookie.txt'; 
//$cookie = dirname(__FILE__) . '../cookie.txt'; 
//登录后要获取信息的地址 
$url2 = "https://dashboard.smartling.com/projects/2e63d9aac/content/content.htm#translations/list/filter/locale:zh-HK|url:%2Ffiles%2FPackage_Adventures_at_Universal_Studios_Japan_%7Bcf7421b2-5fa3-4a03-a67d-3e25f8c46387%7D_02.json|workflowFilters:in-progress";// 登入後要幹資料的地方


login_post($url, $cookie, $post);
get_content($url2, $cookie);
//模拟登录 
function login_post($url, $cookie, $post) { 
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HEADER, 1);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie);
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
  curl_exec($curl); 
  curl_close($curl);
}
//登录成功后获取数据 
function get_content($url, $cookie) { 
  $ch = curl_init(); 
  curl_setopt($ch, CURLOPT_URL, $url); 
  curl_setopt($ch, CURLOPT_HEADER, 1); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); 
  $rs = curl_exec($ch); 
  curl_close($ch); 
  return $rs; 
}

?>