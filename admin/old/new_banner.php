<? include ("lock.php");   $name_dt = "�������"; $title_here = "�������� ���������� ������".$name_dt;
include("header.html");
?>
       <form name="form1" method="post" action="add_banner.php" enctype="multipart/form-data">
         <!--<p>
           <label>������� �������� <? echo $name_dt ?><br>
             <input type="text" name="title" id="title" size="<? echo $SizeOfinput ?>">
             </label>
         </p>-->
         <p>
            <label>����������� <? echo $name_dt ?><br>
            <input type="file" name="userfile" size="<? echo ($SizeOfinput-12) ?>"><br></label>
         </p>
         <p>
            <strong>������ ����������� ������ ���� �������� 700x90!</strong>
         </p>
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="���������">
           </label>
         </p>

       </form>
<? include("footer.html");?>
