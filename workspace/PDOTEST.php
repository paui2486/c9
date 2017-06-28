<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//$connection = new PDO('mysql:host=localhost;dbname=c9;charset=utf8', 'paui', '28835328');//連接DB 本地 資料庫名稱 連線編碼都用UTF-8 即可

try {
    $pdo = new PDO('mysql:host=localhost;dbname=c9;charset=utf8', 'paui', '28835328');
    echo 'Connection SUCCESS: ';
    
    $stmt = $pdo->prepare('SELECT * FROM translation');
    
    
    $sql="Select * from translation";
    $result=$pdo->query($sql);    
    while($row=$result->fetch(PDO::FETCH_OBJ)){    
    //PDO::FETCH_OBJ 指定取出資料的型態
        /*
        PDO::FETCH_NUM--數字索引數組形式
        PDO::FETCH_ASSOC--關聯數組形式
        PDO::FETCH_OBJ--按照對象的形式
        */
    echo $row->eng."\n";  
    echo $row->chi."\n<br>";   
    }
    
    
    $stmt->execute();
    $stmt->closeCursor();
    $stmt = null; // 消除指令
    //$pdo = null; // 消除PDO 事情最後最完記得消除痕跡
    
    //PDO::ATTR_PERSISTENT => true // 持久化连接 quary 將會被DB緩存 
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die();
}



?>