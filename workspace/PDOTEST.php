<?php
//$connection = new PDO('mysql:host=localhost;dbname=c9;charset=utf8', 'paui', '28835328');//連接DB 本地 資料庫名稱 連線編碼都用UTF-8 即可

try {
    $connection = new PDO('mysql:host=localhost;dbname=c9;charset=utf8', 'paui', '28835328');
    echo 'Connection SUCCESS: ';
    $connection = null;// 事情最後最完記得消除痕跡
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die();
}



?>