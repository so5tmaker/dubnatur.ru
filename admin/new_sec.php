<? include ("lock.php");?>
<? $title_here = "Страница добавления нового раздела";
include("header.html"); 
echo "<h3 align='center'>Добавление раздела</h3>";?>
<form name="form1" method="post" action="add_sec.php">
 <p>
   <label>Введите название раздела<br>
     <input type="text" name="title" id="title" size="<? echo $SizeOfinput ?>">
     </label>
 </p>
 <p>
   <label>
   <input type="submit" name="submit" id="submit" value="Занести раздел в базу">
   </label>
 </p>
 </form>
<? include("footer.html");?>