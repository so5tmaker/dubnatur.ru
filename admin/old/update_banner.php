<?php

$ErrorDescription = '';

function get_image($num)
{
   global $ErrorDescription;
   static $image_size=0;
  if(!empty($_FILES)){
    if($_FILES['userfile']['name'][$num]==''){
        return '';
    }
    $image_size=$_FILES['userfile']['size'][$num];
    if($image_size>1024*1024||$image_size==0){
        $ErrorDescription="<p><strong>Каждое изображение не должно привышать 1Мб! Работа в базу не может быть добавлена.</strong></p>";
        return '';}

  // Если файл пришел, то проверяем графический ли он (из соображений безопасности)

    if(substr($_FILES['userfile']['type'][$num], 0, 5)=='image'){
      // Читаем содержимое файла

      $image=file_get_contents($_FILES['userfile']['tmp_name'][$num]);

      // Экранируем специальные символы в содержимом файла

      $image=mysql_escape_string($image);
      return $image;

    }else{
        $ErrorDescription="<p>Вы загрузили не изображение, поэтому работа в базу не может быть добавлена.</p>";
        return '';
        }
  }else{
//    $ErrorDescription="<p>Вы не загрузили изображение, поэтому работа в базу не может быть добавлена.</p>";
    return '';
    }
    return $image;
}

include ("lock.php");
include ("blocks/bd.php");
if (isset($_POST['title']))       
{
$title = $_POST['title']; 

if ($title == '') 
{
unset($title);
}  

}

/* Если существует в глобальном массиве $_POST['title'] опр. ячейка, то мы создаем простую переменную из неё. Если переменная пустая, то уничтожаем переменную.   */
if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}
if (isset($_POST['date']))        {$date = $_POST['date']; if ($date == '') {unset($date);}}
if (isset($_POST['description'])) {$description = $_POST['description']; if ($description == '') {unset($description);}}
if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['author']))      {$author = $_POST['author']; if ($author == '') {unset($author);}}
if (isset($_POST['id']))      {$id = $_POST['id'];}
$image_before=get_image(0); if ($image_before == '') {unset($image_before);}
$image_after=get_image(1); if ($image_after == '') {unset($image_after);}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Обработчик</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
<!--Подключаем шапку сайта-->
<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="690" border="0" cellspacing="0" cellpadding="0">
      <tr>
<!--Подключаем левый блок сайта-->
<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
      
<?php 
if (isset($title) && isset($meta_d) && isset($meta_k) && isset($date) && isset($description) && isset($text) && isset($author))
{
/* Здесь пишем что можно заносить информацию в базу */
    $query1 = ""; $query2 = "";
    if (isset($image_before))
    { $query1 = ",img_before='$image_before'";}
    if (isset($image_after))
    {$query2 = ",img_after='$image_after'";}
    $query="UPDATE lessons SET title='$title', meta_d='$meta_d', meta_k='$meta_k', date='$date', description='$description', text='$text', author='$author'";
    $query = $query.$query1.$query2." WHERE id='$id'";

    $result = mysql_query ($query);

    if ($result == 'true') {echo "<p>Ваша работа успешно обновлена!</p>";}
    else {echo "<p>Ваша работа не обновлена!</p>";}

}		 
else 

{
echo "<p>Вы ввели не всю информацию, поэтому работа в базе не может быть обновлена.</p>";
}

?>
        </td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
