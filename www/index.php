<!DOCTYPE HTML>
<html>
 <head>
  <meta  content="text/html"; charset="utf-8"/>
   <title>Uploads Forms</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" >
    
 </head>
   <body>
     <h1>Форми</h1>
     <div>
         <form action="file-upload.php" method="post" enctype="multipart/form-data"></br>
       <!--  <h3>Введіть дані: </h3> 
	   <input name="userfile" type="text"/>
           <input type="submit" name="submit" value="Відправити"/><br><hr>-->
           <h3>Завантаження зображення: </h3>
	   <input name="userfile" type="file" />
           <input type="submit" value="Відправити" />
        </form>
     </div>
   </body>
</html>

