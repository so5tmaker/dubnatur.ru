<?php include ("lock.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
$name_dt = "������������";
$tbl_dt = "userlist";
$title_here = "�������� �������� ".$name_dt; include("header.html");?>
<p><strong>�������� ������� ��� �������� <? echo $name_dt;?></strong></p>
<form action="user_drop.php" method="post">
<?

$result = mysql_query("SELECT user,id FROM ".$tbl_dt);
$myrow = mysql_fetch_array($result);
$count = mysql_num_rows($result);
do
{
    printf ("<p><input name='id' type='radio' value='%s'><label> %s</label></p>",$myrow["id"],$myrow["user"]);

}
while ($myrow = mysql_fetch_array($result));
?>
<input name="name_dt" type="hidden" value="<? echo $name_dt?>">
<input name="tbl_dt" type="hidden" value="<? echo $tbl_dt?>">
<input name="count" type="hidden" value="<? echo $count?>">
<p> <input name="submit" type="submit" value="�������� <? echo $name_dt;?>"></p>
</form>
<? include("footer.html");?>