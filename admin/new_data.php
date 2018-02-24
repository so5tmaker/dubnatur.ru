<?
$name_dt = "подраздела";
?>
<? include ("lock.php");?>
<? $title_here = "Страница добавления ".$name_dt; include("header.html");?>
<form name_dt="form1" method="post" action="add_data.php">
 <p>
   <label>Введите название <? echo $name_dt ?><br>
       <input type="text" name="title" id="title" size="<? echo $SizeOfinput ?>" >
     </label>
 </p>
  <p>
   <label>Введите полный текст <? echo $name_dt ?>
   <textarea name="text" id="text" cols="<? echo $ColsOfarea ?>" rows="30"></textarea>
   </label>
 </p>
  <p>
   <label>Выберите раздел для <? echo $name_dt ?><br>
   
   <select name="sec">
   
   <?
          $result = mysql_query("SELECT title,id FROM sections",$db);

        if (!$result)
        {
            echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@dubnatur.ru. <br> <strong>Код ошибки:</strong></p>";
            exit(mysql_error());
        }
        $num_rows = mysql_num_rows($result);
        if ($num_rows > 0)
        {
            $myrow = mysql_fetch_array($result);
            do
            {
            printf ("<option value='%s'>%s</option>",$myrow["id"],$myrow["title"]);
            }
            while ($myrow = mysql_fetch_array($result));
        }
        else
        {

            echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
            exit();
        }
        ?>

   </select>
   </label>
 </p>
 <?if ($num_rows == 0) echo "<p style='color: red' ><label>Для добавления ".$name_dt." нужно добавить хотя бы один раздел!</label></p>";?>
 <input name="name_dt" type="hidden" value="<? echo $name_dt ?>">
  <p>
   <label>
   <input type="submit" name="submit" id="submit" value="<? echo "Занесение ".$name_dt." в базу" ?>">
   </label>
 </p>
</form>
<? include("footer.html");?>
