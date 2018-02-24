<?php 
include ("lock.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
$title_here = "Страница редактирования раздела"; include("header.html");
if (!isset($id))
{
    $resultrtd = mysql_query("SELECT title,id FROM `sections`");
    $myrowrtd = mysql_fetch_array($resultrtd);
    do
    {
        printf ("<p><a href='edit_sec.php?id=%s'>%s</a></p>",$myrowrtd["id"],$myrowrtd["title"]);
    }
    while ($myrowrtd = mysql_fetch_array($resultrtd));
}
else
{
    $result = mysql_query("SELECT * FROM sections WHERE id=$id");
    $myrow = mysql_fetch_array($result);
    echo "<h3 align='center'>Редактирование раздела</h3>";
    print <<<HERE
    <form name='form1' method='post' action='update_sec.php'>
         <p>
           <label>Введите название раздела<br>
             <input value="$myrow[title]" type="text" name="title" id="title" size="$SizeOfinput">
             </label>
         </p>
         <input name="id" type="hidden" value="$myrow[id]">
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Сохранить изменения">
           </label>
         </p>
       </form>
HERE;
}
?>
<? include("footer.html");?>
