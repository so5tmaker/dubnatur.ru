<?php 
include ("lock.php");
include ("blocks/bd.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>�������� �������� ������</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
<!--���������� ����� �����-->
<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="690" border="0" cellspacing="0" cellpadding="0">
      <tr>
<!--���������� ����� ���� �����-->
<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
 
          <p><strong>�������� ������ ��� ��������</strong></p>
          <form action="drop_lesson.php" method="post">
<? 

$result = mysql_query("SELECT title,id FROM lessons");
$num_rows = mysql_num_rows($result);
if ($num_rows!=0)
{

    $myrow = mysql_fetch_array($result);
    do
    {
    printf ("<p><input name='id' type='radio' value='%s'><label> %s</label></p>",$myrow["id"],$myrow["title"]);
    }
    while ($myrow = mysql_fetch_array($result));
    echo "<p> <input name='submit' type='submit' value='������� ������!!!'></p>";
}
else
{
    echo "<p>� ���� ��� �� ����� ������!</p>";
}
    ?>


</form>
       
       
       </td>
      </tr>
    </table></td>
  </tr>
<!--���������� ������ ����������� �������-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
