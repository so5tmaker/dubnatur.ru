<?php 
include ("lock.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
$name_dt = "подраздела";
$tbl_dt= "data";
$title_here = "Страница редактирования ".$name_dt; include("header.html"); 
if (!isset($id))
{
    $result = mysql_query("SELECT title,id FROM ".$tbl_dt);
    $myrow = mysql_fetch_array($result);
    do
    {
    printf ("<p><a href='edit_data.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
    }
    while ($myrow = mysql_fetch_array($result));
}
else
{
    $result = mysql_query("SELECT * FROM ".$tbl_dt." WHERE id=$id");
    $myrow = mysql_fetch_array($result);

    $result2 = mysql_query("SELECT id,title FROM sections");
    $myrow2 = mysql_fetch_array($result2);

    $count = mysql_num_rows($result2);
    echo "<h3 align='center'>Редактирование ".$name_dt."</h3>";
    echo "<form name='form1' method='post' action='update_data.php'>
 <p>Выберите категорию для ".$name_dt."<br><select name='sec' size='$count'>";
    do
    {
        if ($myrow['sec'] == $myrow2['id'])
        {
            printf ("<option value='%s' selected>%s</option>",$myrow2["id"],$myrow2["title"]);
        }
        else
        {
            printf ("<option value='%s'>%s</option>",$myrow2["id"],$myrow2["title"]);
        }
    }
    while ($myrow2 = mysql_fetch_array($result2));
    echo "</select></p>";
    print <<<HERE
         <p>
           <label>Введите название $name_dt<br>
             <input value="$myrow[title]" type="text" name="title" id="title" size="$SizeOfinput">
             </label>
         </p>
         <p>
           <label>Введите полный текст $name_dt
           <textarea name="text" id="text" cols="$ColsOfarea" rows="30">$myrow[text]</textarea>
           </label>
         </p>
         <input name="id" type="hidden" value="$myrow[id]">
         <p>
         <input name="name_dt" type="hidden" value="$name_dt">
         <input name="tbl_dt" type="hidden" value="$tbl_dt">
         <label>
           <input type="submit" name="submit" id="submit" value="Сохранить изменения">
         </label>
         </p>
       </form>
HERE;
}
?>
<? include("footer.html");?>