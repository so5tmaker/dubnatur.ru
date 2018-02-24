<?php include ("lock.php");?>
<? $title_here = "Страница удаления раздела"; include("header.html"); ?>
<p><strong>Выберите раздел для удаления</strong></p>
<form action="drop_sec.php" method="post">
<?
$result = mysql_query("SELECT title,id FROM sections".$tbl_dt);
$myrow = mysql_fetch_array($result);
do
{
    printf ("<p><input name='id' type='radio' value='%s'><label> %s</label></p>",$myrow["id"],$myrow["title"]);
}
while ($myrow = mysql_fetch_array($result));
?>
<p><input name="submit" type="submit" value="Удалить раздел"></p>
</form>
<? include("footer.html");?>
