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
    
    protected function dise(){
        echo "MYCLASS:: dise()" . $this ->X;
        echo "<br>";
        echo "MYCLASS:: dise()" . $this ->Y;
        echo "<br>";
        echo "MYCLASS:: dise()" . $this ->Z;
        echo "<br>";
        
    }
    
    private function disx(){
        echo "MYCLASS:: disx()" . $this ->X;
        echo "<br>";
        echo "MYCLASS:: disx()" . $this ->Y;
        echo "<br>";
        echo "MYCLASS:: disx()" . $this ->Z;
        echo "<br>";
        
    }
    function Foo() // 保護及私有 CLASS 不能直接用 需要利用其他公有當中界
    {
        $this -> dise();
        $this -> disx();
    }
}
class two extends one{
    
    //public $X;
    protected $Y = YY;
    
    function dis(){
        echo "TWO:: dis()" . $this ->X;
        echo "<br>";
        echo "TWO:: dis()" . $this ->Y . "這個被覆寫了";
        echo "<br>";
        echo "TWO:: dis()" . $this ->Z;
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
echo $obj->Foo();
echo "<br>";
$obj = new  two();
echo "<br>";
echo $obj->X;

echo "<br>";
//echo $obj->Y;// 隱私 不能直接存取
//echo $obj->Z; // 保護 不能直接存取
echo $obj->dis(); //這是複寫的
echo $obj->dise();// 保護
echo $obj->disx();// 隱私 

?>