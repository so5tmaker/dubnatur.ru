<? include ("lock.php");   $name_dt = "баннера"; $title_here = "Страница добавления нового".$name_dt;
include("header.html");
?>
       <form name="form1" method="post" action="add_banner.php" enctype="multipart/form-data">
         <!--<p>
           <label>Введите название <? echo $name_dt ?><br>
             <input type="text" name="title" id="title" size="<? echo $SizeOfinput ?>">
             </label>
         </p>-->
         <p>
            <label>Изображение <? echo $name_dt ?><br>
            <input type="file" name="userfile" size="<? echo ($SizeOfinput-12) ?>"><br></label>
         </p>
         <p>
            <strong>Каждое изображение должно быть размером 700x90!</strong>
         </p>
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Сохранить">
           </label>
         </p>

       </form>
<? include("footer.html");?>
