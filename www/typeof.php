<?php
$n= $_POST['alltype'];

echo 'Ви ввели такі дані: ';
//echo gettype ($m);


if (is_int($n)){
	echo "$n , тип- integer";
}
if (is_string ($n)){
	echo "$n , тип- string";
}
if (is_float ($n)){
	echo "$n , тип- float";
}
if (is_bool ($n)){
	echo "$n , тип- bool";
}
   
?>
