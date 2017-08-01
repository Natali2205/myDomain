<?php


$uploadfile = "uploads/" . $_FILES['userfile']['name'];
$folder = "uploads/";
$picture_filename = $_FILES['userfile']['name'];
$picture_fileplace = $_FILES['userfile']['tmp_name'];
$picture_filetype = $_FILES['userfile']['type'];
$picture_filesize = $_FILES['userfile']['size'] / 1024;
$image = $_FILES["userfile"]["name"]; /* зображення  */
$img = "uploads/" . $image;

if (!is_dir($folder) && mkdir($folder, 0777, true)) {
    echo("Існує папка");
    exit;
}

if ($_FILES["userfile"]["size"] > 1024 * 3 * 1024) {
    echo("Розмір файла перебільшує 3 Мб");
    exit;
}

if ($_FILES["userfile"]["size"] == 0) {
    exit("Завантажений файл є пустим");
}

if (mb_strlen($picture_filename, "UTF-8") > 100) {
    exit("Імя файлу завелике, дозволяється не більше 100 символів");
}

$blacklist = array(".php", ".phtml", ".php3", ".php4");
foreach ($blacklist as $item) {
    if (preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
        echo "Заборонено завантаження php файлів";
        exit;
    }
};

$imageinfo = getimagesize($_FILES['userfile']['tmp_name']);
if ($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/jpg')
    exit("Розширення зображення повинно бути jpg, jpeg, png");
print "</pre>";

if (file_exists($uploadfile)) {
    exit(" Файл<b>$uploadfile</b>з такою назвою вже існує");
} else {
    echo "Деяка інформація: ";
}

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл коректний і був успішно завантажений.\n";
    $ext = substr($_FILES['userfile']['name'], 1 + strrpos($_FILES['userfile']['name'], "."));
    if (in_array($ext, array('jpeg', 'jpe', 'jpg')))
        $p = 'jpeg';
    if (in_array($ext, array('gif')))
        $p = 'gif';
    if (in_array($ext, array('png')))
        $p = 'png';
    $filetype = "Файл має розширення: " . '.' . $p;


    echo '<hr>' . '<img src= "' . $img . '">';
    echo '<hr>' . "Назва картинки: " . $picture_filename;
    echo '<hr>' . $filetype;
    echo '<hr>' . "Розмір: " . $picture_filesize . " (Kb)";
    echo '<hr>' . "Тип: " . $picture_filetype;
    echo '<hr>' . "Шлях до файлу: " . $picture_fileplace;
} else {
    echo "Сталася помилка при завантаженні файлу.\n";
    echo($_FILES);
}



 

 
 