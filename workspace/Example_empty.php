<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
$var = 0;

// Evaluates to true because $var is empty
if (empty($var)) {
    echo '$var is either 0, empty, or not set at all'.'<br>';
}

// Evaluates as true because $var is set
if (isset($var)) {
    echo '$var is set even though it is empty'.'br';
}



$expected_array_got_string = 'somestring';
var_dump(empty($expected_array_got_string['some_key']));
echo '<br>';
var_dump(empty($expected_array_got_string[0]));
echo '<br>';
var_dump(empty($expected_array_got_string['0']));
echo '<br>';
var_dump(empty($expected_array_got_string[0.5]));
echo '<br>';
var_dump(empty($expected_array_got_string['0.5']));
echo '<br>';
var_dump(empty($expected_array_got_string['0 Mostel']));

?>