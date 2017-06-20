<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
class Date //類別 日期

{
    public $year; //公開的
    public $month;
    public $day;
 
    public function __construct($date)// 切割日期的方法
    {
        $arr = explode('-', $date);
        //$arr = explode('/', $date);
        $this->year = $arr[0];
        $this->month = $arr[1];
        $this->day = $arr[2];
    }
    
    public function today()
    {
        if( $this->year > date('Y')){
            echo "怎麼是未來年".'今年是'.date('Y');
            echo '請重新輸入' ;
            echo("<meta http-equiv=REFRESH CONTENT=5;url=from.php>");
            //$this->mistake();
        }else if($this->month > date('m')){
            echo "怎麼是未來月".'本月是'.date('m');
            echo '請重新輸入' ;
            echo("<meta http-equiv=REFRESH CONTENT=5;url=from.php>");
        }else if($this->day > date('d')){
            echo "怎麼是未來天".'今天是'.date('d');
            echo '請重新輸入' ;
            echo("<meta http-equiv=REFRESH CONTENT=5;url=from.php>");
        }
    }
    
    public function mistake()
    {
        //echo("<meta http-equiv=REFRESH CONTENT=5;url=from.php>");
        /*
        echo "<script type='text/javascript'>";
        echo "window.location.href='https://pauiclass-paui.c9users.io/workspace/from.php'";
        echo "</script>"; 
        */
    }
    
    public function localFormat()
    {
        return $this->year . '.' .$this->month . '.' . $this->day;
    }
 
    public function englishFormat()
    {
        return $this->month . '/' .$this->day . '/' . $this->year;
    }
}

//echo "今天是 " . date("Y/m/d") . "<br>";
 
//$postDate = '2016-06-02'; # 假設資料庫取出來的發文日期長這樣
$postDate=$_POST[postDate]; 
//$TW = 1;//TWPEOPLE
$TW=$_POST[TW];

$date = new Date($postDate);

$date->today();


if ($TW >= 1) {
    echo $date->localFormat();
    echo "<br>";
    echo "台式";
} else { // 英語人士身份
    echo $date->englishFormat();
    echo "<br>";
    echo "西式";
}
