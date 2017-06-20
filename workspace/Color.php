
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
class Color //顏色 X車種?

{
    public $R; //公開的
    public $G;
    public $B;
    public $one;
    public $two;
    public $three;
    public $four;
    public $five;
    public $six;
 
    public function __construct($code)// 切割日期的方法
    {
        //$arr = explode('-', $date);
        $arr = preg_split('//', $code, -1, PREG_SPLIT_NO_EMPTY);
        
        $this->R = $arr[0].$arr[1];
        $this->G = $arr[2].$arr[3];
        $this->B = $arr[4].$arr[5];
        
        $this->one = $arr[0];
        $this->two = $arr[1];
        $this->three = $arr[2];
        $this->four = $arr[3];
        $this->five = $arr[4];
        $this->six = $arr[5];
    }
   
    public function positive()//
    {
        return $this->R . $this->G . $this->B;
        
    }
 
    public function Reverse()
    {
        return $this->B . $this->G . $this->R;
    }
    public function R()
    {
       return $this->R;
    }
    public function G()
    {
       return $this->G;
    }
    public function B()
    {
       return $this->B;
    }
    public function one()
    {
       return $this->one;
    }
    public function two()
    {
       return $this->two;
    }
    public function three()
    {
       return $this->three;
    }
    public function four()
    {
       return $this->four;
    }
    public function five()
    {
       return $this->five;
    }
    public function six()
    {
       return $this->six;
    }
    public function Hex()
    {
        return $this->B . '/' .$this->G . '/' . $this->R;
    }
}
 
$post = 'F00078'; # 假設資料庫取出來的資料長這樣
 
$code = new Color($post);
$Ch = 1;//TWPEOPLE
{
        $R = $code->R();
        $G = $code->G();
        $B = $code->B();
        $one = $code->one();
        $one = base_convert($one,16,10)*16;
        $two = $code->two();
        $two = base_convert($two,16,10);
        $three = $code->three();
        $three = base_convert($three,16,10)*16;
        $four = $code->four();
        $four = base_convert($four,16,10);
        $five = $code->five();
        $five = base_convert($five,16,10)*16;
        $six = $code->six();
        $six = base_convert($six,16,10);
        $H = $one+$two;
        $E = $three+$four;
        $X = $five+$six;
    if ($Ch >= 1) {
        echo $code->positive();
        echo "<br>";

        echo "<font color='$R.$G.$B'>文字顏色為紫紅色</font>";
        echo "<br>";
        
        echo "RGB $R.$G.$B 轉換 HEX 等於 $H.$E.$X";
        
    } else {
        echo $code->Reverse();
        echo "<br>";
        
        echo "<font color='$B.$G.$R'>文字顏色為深紫色</font>";
}
}