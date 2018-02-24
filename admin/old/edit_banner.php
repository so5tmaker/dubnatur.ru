<?php 
include ("lock.php");
include ("blocks/bd.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Страница редактирования работы</title>
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
      
<? 

if (!isset($id))

{
    $result = mysql_query("SELECT title,id FROM lessons");
    $num_rows = mysql_num_rows($result);
    if ($num_rows==0)
    {
        echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
    }
    else
    {
        $myrow = mysql_fetch_array($result);

        do
        {
        printf ("<p><a href='edit_lesson.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
        }

        while ($myrow = mysql_fetch_array($result));

    }

}

else

{

$result = mysql_query("SELECT * FROM lessons WHERE id=$id");      
$myrow = mysql_fetch_array($result);

print <<<HERE

<form name="form1" enctype="multipart/form-data" method="post" action="update_lesson.php">
         <p>
           <label>Введите название работы<br>
             <input value="$myrow[title]" type="text" name="title" id="title">
             </label>
         </p>
         <p>
           <label>Введите краткое описание работы<br>
           <input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d">
           </label>
         </p>
         <p>
           <label>Введите ключевые слова для работы<br>
           <input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k">
           </label>
         </p>
         <p>
           <label>Введите дату добавления работы<br>
           <input value="$myrow[date]" name="date" type="text" id="date" value="2007-01-27">
           </label>
         </p>
         <p>
           <label>Ведите краткое описание работы с тэгами абзацев
           <textarea name="description" id="description" cols="40" rows="5">$myrow[description]</textarea>
           </label>
         </p>
         <p>
           <label>Введите полный текст работы с тэгами
           <textarea name="text" id="text" cols="40" rows="20">$myrow[text]</textarea>
           </label>
         </p>
         <p>
           <label>Введите автора работы<br>
           <input value="$myrow[author]" type="text" name="author" id="author">
           </label>
         </p>
		 <input name="id" type="hidden" value="$myrow[id]">
		 <p>
            <label>(Изображение авто до обработки)<br>
            <input type="file" name="userfile[]"><br></label>
            <label>(Изображение авто после обработки)<br>
            <input type="file" name="userfile[]"><br></label>
         </p>
             <p>
                <strong>Каждое изображение не должно привышать 1Мб!</strong>
             </p>
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Сохранить изменения">
           </label>
         </p>
       </form>



HERE;
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
