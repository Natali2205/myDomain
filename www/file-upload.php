<?php
//$n= $_POST['userfile[]'];
//echo $_SERVER['HTTP_USER_AGENT'];
echo $_FILES['userfile'];
//echo 'Ви ввели такі дані: ';
//echo gettype ($m);
//if (is_int($n)){
//	echo "$n , тип- integer";
//}
//if (is_string ($n)){
//	echo "$n , тип- string";
//}
//if (is_float ($n)){
//	echo "$n , тип- float";
//}
//if (is_bool ($n)){
//	echo "$n , тип- bool";
//}
//$uploaddirec = '/myDomain/www/uploads/';

$uploadfile = "uploads/".$_FILES['userfile']['name'];
echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
   echo "Файл коректний і був успішно завантажений.\n";
    if($_FILES["filename"]["size"] > 1024*3*1024)
   {
     echo ("Розмір файла перебільшує 3 Мб");
     exit;
   }
} else {
   echo "Можлива атака за допомогою файлової загрузки!\n";
}
echo "Деяка інформація:";
print_r($uploadfile);


?>
