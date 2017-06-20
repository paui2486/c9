<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$int = 123.5;

if(!filter_var($int, FILTER_VALIDATE_INT))//驗證是否為整數 FILTER_VALIDATE_INT 驗證函數 要驗證其他東西 請去google filter
 {
 echo("Integer is not valid");
 }
else
 {
 echo("Integer is valid");
 }
 
 echo '<br>';
 function convertSpace($string)
  { 
  return str_replace("_", " ", $string);
  //return str_replace("_", " ", $str); 
  }

 $string = "Peter_is_a_great_guy!";
 $str = "Paul_is_a_good_god!";

 echo filter_var($str, FILTER_CALLBACK, array("options"=>"convertSpace")) ;
?>