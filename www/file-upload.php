<?php


$uploadfile = "uploads/" . $_FILES['userfile']['name'];
$folder = "uploads/";
$picture_filename = $_FILES['userfile']['name'];
$picture_fileplace = $_FILES['userfile']['tmp_name'];
$picture_filetype = $_FILES['userfile']['type'];
$picture_filesize = $_FILES['userfile']['size'] / 1024;
$image = $_FILES["userfile"]["name"]; /* ���������� */
$img = "uploads/" . $image;

if (!is_dir($folder) && mkdir($folder, 0777, true)) {
    echo("���� �����");
    exit;
}

if ($_FILES["userfile"]["size"] > 1024 * 3 * 1024) {
    echo("����� ����� ��������� 3 ��");
    exit;
}

if ($_FILES["userfile"]["size"] == 0) {
    exit("������������ ���� � ������");
}

if (mb_strlen($picture_filename, "UTF-8") > 100) {
    exit("��� ����� ��������, ������������ �� ����� 100 �������");
}

$blacklist = array(".php", ".phtml", ".php3", ".php4");
foreach ($blacklist as $item) {
    if (preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
        echo "���������� ������������ php �����";
        exit;
    }
};

$imageinfo = getimagesize($_FILES['userfile']['tmp_name']);
if ($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg')
    exit("���������� ���������� ������� ���� jpg, jpeg, png ");
print "</pre>";

if (file_exists($uploadfile)) {
    exit("���� <b>$uploadfile</b>���� � ����� ������ ��� ����");
} else {
    echo "����� ����������: ";
}

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "���� ��������� � ��� ������ ������������.\n";
    $ext = substr($_FILES['userfile']['name'], 1 + strrpos($_FILES['userfile']['name'], "."));
    if (in_array($ext, array('jpeg', 'jpe', 'jpg')))
        $p = 'jpeg';
    if (in_array($ext, array('gif')))
        $p = 'gif';
    if (in_array($ext, array('png')))
        $p = 'png';
    $filetype = "���� �� ����������: " . '.' . $p;


    echo '<hr>' . '<img src= "' . $img . '">';
    echo '<hr>' . "����� ��������: " . $picture_filename;
    echo '<hr>' . $filetype;
    echo '<hr>' . "�����: " . $picture_filesize . " (Kb)";
    echo '<hr>' . "���: " . $picture_filetype;
    echo '<hr>' . "���� �� �����: " . $picture_fileplace;
} else {
    echo "������� ������� ��� ����������� �����.\n";
    echo($_FILES);
}



 

 
 