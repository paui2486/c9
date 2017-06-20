<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

$var = '';

// 结果为 TRUE，所以后边的文本将被打印出来。
if (isset($var)) {
    echo "This var is set so I will print.";
}

// 在后边的例子中，我们将使用 var_dump 输出 isset() 的返回值。
// the return value of isset().

$a = "test";
$b = "anothertest";

var_dump(isset($a));      // TRUE
var_dump(isset($a, $b)); // TRUE

unset ($a);

var_dump(isset($a));     // FALSE
var_dump(isset($a, $b)); // FALSE

$foo = NULL;
var_dump(isset($foo));   // FALSE

?>