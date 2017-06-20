<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//測試 公開 私有 保護 變數

class one{
    public $X = X;
    private $Y = Y;
    protected $Z = Z;
    
    function dis(){
        echo "MYCLASS:: dis()" . $this ->X;
        echo "<br>";
        echo "MYCLASS:: dis()" . $this ->Y;
        echo "<br>";
        echo "MYCLASS:: dis()" . $this ->Z;
        echo "<br>";
        
    }
    
}
class two extends one{
    
    //public $X;
    protected $Y = YY;
    
    function dis(){
        echo "MYCLASS:: dis()" . $this ->X;
        echo "<br>";
        echo "MYCLASS:: dis()" . $this ->Y . "這個被覆寫了";
        echo "<br>";
        echo "MYCLASS:: dis()" . $this ->Z;
        echo "<br>";
    }
}

$obj = new one();
echo "<br>";
echo $obj->X ;// 公開 可以直接存取
echo "<br>";
//echo $obj->Y; // 隱私 不能直接存取
//echo $obj->Z; // 保護 不能直接存取
echo $obj->dis();
echo "<br>";
$obj = new  two();
echo "<br>";
echo $obj->X;
echo "<br>";
//echo $obj->Y;// 隱私 不能直接存取
//echo $obj->Z; // 保護 不能直接存取
echo $obj->dis();

?>