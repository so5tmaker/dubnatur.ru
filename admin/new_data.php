<?
$name_dt = "����������";
?>
<? include ("lock.php");?>
<? $title_here = "�������� ���������� ".$name_dt; include("header.html");?>
<form name_dt="form1" method="post" action="add_data.php">
 <p>
   <label>������� �������� <? echo $name_dt ?><br>
       <input type="text" name="title" id="title" size="<? echo $SizeOfinput ?>" >
     </label>
 </p>
  <p>
   <label>������� ������ ����� <? echo $name_dt ?>
   <textarea name="text" id="text" cols="<? echo $ColsOfarea ?>" rows="30"></textarea>
   </label>
 </p>
  <p>
   <label>�������� ������ ��� <? echo $name_dt ?><br>
   
   <select name="sec">
   
   <?
          $result = mysql_query("SELECT title,id FROM sections",$db);

        if (!$result)
        {
            echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� info@dubnatur.ru. <br> <strong>��� ������:</strong></p>";
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

            echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������.</p>";
            exit();
        }
        ?>

   </select>
   </label>
 </p>
 <?if ($num_rows == 0) echo "<p style='color: red' ><label>��� ���������� ".$name_dt." ����� �������� ���� �� ���� ������!</label></p>";?>
 <input name="name_dt" type="hidden" value="<? echo $name_dt ?>">
  <p>
   <label>
   <input type="submit" name="submit" id="submit" value="<? echo "��������� ".$name_dt." � ����" ?>">
   </label>
 </p>
</form>
<? include("footer.html");?>
