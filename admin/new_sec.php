<? include ("lock.php");?>
<? $title_here = "�������� ���������� ������ �������";
include("header.html"); 
echo "<h3 align='center'>���������� �������</h3>";?>
<form name="form1" method="post" action="add_sec.php">
 <p>
   <label>������� �������� �������<br>
     <input type="text" name="title" id="title" size="<? echo $SizeOfinput ?>">
     </label>
 </p>
 <p>
   <label>
   <input type="submit" name="submit" id="submit" value="������� ������ � ����">
   </label>
 </p>
 </form>
<? include("footer.html");?>