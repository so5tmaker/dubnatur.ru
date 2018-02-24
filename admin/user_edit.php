<?php 
include ("lock.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
$name_dt = "пользователя";
$tbl_dt= "userlist";
$title_here = "Страница редактирования ".$name_dt; include("header.html"); 
if (!isset($id))
{
    $result = mysql_query("SELECT user,id FROM ".$tbl_dt);
    $myrow = mysql_fetch_array($result);
    do
    {
    printf ("<p><a href='user_edit.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["user"]);
    }
    while ($myrow = mysql_fetch_array($result));
}
else
{
    $result = mysql_query("SELECT * FROM ".$tbl_dt." WHERE id=$id");
    $myrow = mysql_fetch_array($result);
    echo "<h3 align='center'>Редактирование ".$name_dt."</h3>";
    echo "<form name='form1' method='post' action='user_update.php'>";
    print <<<HERE
         <p>
           <label>Введите имя $name_dt<br>
             <input value="$myrow[user]" type="text" name="user" id="user" size="$SizeOfinput">
             </label>
         </p>
         <p>
           <label>Введите пароль $name_dt<br>
             <input type="password" name="pswd" id="pswd" size="$SizeOfinput">
             </label>
         </p>
         <p>
           <label>Повторите пароль $name_dt<br>
             <input type="password" name="pswd1" id="pswd1" size="$SizeOfinput">
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