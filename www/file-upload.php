<?php
//echo $_FILES['userfile'];
$uploadfile = "uploads/" . $_FILES['userfile']['name'];
$folder = "uploads/";
//echo '<pre>';
if (!is_dir($folder)&& mkdir($folder, 0777, true)){
    echo("���� �����");
    exit;
}
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "���� ��������� � ��� ������ ������������.\n";
    if ($_FILES["userfile"]["size"] > 1024 * 3 * 1024) {
        echo("����� ����� ��������� 3 ��");
        exit;
    }
} else {
    echo "������� ������� ��� ����������� �����.\n";
    echo($_FILES);


    if ($picture_filesize == 0) {
        exit ("������������ ���� � ������");
    }

    $imageinfo = getimagesize($_FILES['userfile']['tmp_name']);
    if ($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg')
        exit ("���������� ���������� ������� ���� jpg, jpeg, png ");
    print "</pre>";

    if (file_exists($uploadfile)) {
        echo "���� <b>$uploadfile</b>���� � ����� ������ ��� ����";
    }
    echo "����� ����������:";
}
/* $extension_array = array('jpg', 'png', 'jpg');
 if (is_dir($folder)) {
     $files = scandir($folder);
    for ($i = 0; $i < count($files); $i++) {
         if ($files[$i] != '.' && $files[$i] != '..') {
             echo "File Name-> $files[$i]" . "" . " <br>";
               $file = pathinfo($files[$i]);
      //       $filem=end($files);
             $extension = $filem['extension'];
             echo "File extension-> $extension<br>";
             if (in_array($extension, $extension_array)) {
                 echo "<img src='" . $folder . $files[$i] . "' style='width:200px; height:200px;'><br>";
            }
         }
     }
 }*/

$image=$_FILES["file"]["name"]; /* �����������*/
$img="uploads/".$image;
    echo '<img src= "'.$img.'">'; 
/*if(is_dir($folder)){
     if($open=opendir($folder))
        {
         while(($file=readdir($open)) !=false)
         {
             if($file== '.' || $file== '..') continue;
            echo '<img src="upload/"' . $file . '"width=150px height =150px>';
         }
         closedir($open);
        }
     }*/
$picture_filename = $_FILES['userfile']['name'];
$picture_fileplace = $_FILES['userfile']['tmp_name'];
$picture_filetype = $_FILES['userfile']['type'];
$picture_filesize = $_FILES['userfile']['size']/1024;
 echo '<hr>';
 echo "����� ��������: " . $picture_filename;
 echo '<hr>';
 echo "���� �� �����: " . $picture_fileplace;
 echo '<hr>';
 echo "���: " . $picture_filetype;
 echo '<hr>';
 echo "�����: " . $picture_filesize . " (��)";
 
 