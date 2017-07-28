<?php
//$n= $_POST['userfile[]'];
//echo $_SERVER['HTTP_USER_AGENT'];
echo $_FILES['userfile'];

//$uploaddirec = '/myDomain/www/uploads/';

$uploadfile = "uploads/".$_FILES['userfile']['name'];
echo '<pre>';
if (!is_dir($uploadfile)){
   mkdir($folder, 0777, true);
}
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл коректний і був успішно завантажений.\n";
      if($_FILES["userfile"]["size"] > 1024*3*1024)
   {
    echo ("Розмір файла перебільшує 3 Мб");
     exit;
   }
 }else {
   echo "Сталася помилка при завантаженні файлу.
Деяка налагоджувальна інформація:\n";
   echo($_FILES);
  

if($picture_filesize == 0 ) {
   exit ("Завантажений файл є пустим");
}

$imageinfo = getimagesize($_FILES['userfile']['tmp_name']);
if($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg' )
exit ("Розширення зображення повинно бути jpg, jpeg, png ");
 print "</pre>"; 

if (file_exists($uploadfile)) {
    echo "Файл <b>$uploadfile</b>Файл з такою назвою вже існує";}
//else {
//    echo "Файл <b>$uploadfile</b> НЕ існує";}
echo "Деяка інформація:";
 }
 $extension_array=array('jpg', 'png','jpg');
 if (is_dir($uploadfile)){
	 $files=scandir($uploadfile);
	 for ($i=0; $i<count($files);$i++){
		 if($files[$i]!='.'&&$files[$i]!='..'){
			 echo "File Name-> $files[$i] <br>";
		$file=pathinfo($files[$i];
        $extension=$file['extension'];
             echo "File extension-> $extension<br>";
        if (in_array($extension, $extension_array)){
			echo "<img src='$uploadfile$files[$i]' style='width:200px; height:200px;'><br>";
			}
		 }
	 }
 }	 
$picture_filename = $_FILES['userfile']['name'];
$picture_fileplace = $_FILES['userfile']['tmp_name'];
$picture_filetype = $_FILES['userfile']['type'];
$picture_filesize = $_FILES['userfile']['size'];
 }
 echo $picture_filename;
 echo '<hr>';
 echo $picture_fileplace;
 echo '<hr>';
 echo $picture_filetype;
 echo '<hr>';
 echo $picture_filesize;
 