<?php
include ("lock.php");
if (isset($_POST['id'])) {$id = $_POST['id'];}
$name_dt = "пользователя"; $title_here = "Страница добавления нового".$name_dt;
include("header.html");
if (isset($id)) {
    if (isset($_POST['title'])) {$title = $_POST['title']; if ($title == '') {unset($title);}}
    if (isset($_POST['pswd'])) {$pswd = $_POST['pswd']; if ($pswd == '') {unset($pswd);}}
    if (isset($_POST['pswd1'])) {$pswd1 = $_POST['pswd1']; if ($pswd1 == '') {unset($pswd1);}}
    if (isset($title)&& isset($pswd)&& isset($pswd1))
    {
        if ($pswd==$pswd1)
        {
            /* Здесь пишем что можно заносить информацию в базу */
            $result = mysql_query ("INSERT INTO userlist (user,pass) VALUES ('$title','$pswd')");
            if ($result == 'true') {echo "<p>Добавление ".$name_dt." успешно прошло!</p>";}
            else {echo "<p>Добавление ".$name_dt." не прошло!</p>";}
        }
        else {echo "<p>Пароли ".$name_dt." не совпадают!</p>";}
    }
    else
    {
    echo "<p>Вы ввели не всю информацию, поэтому невозможно добавить ".$name_dt." в базу.</p>";
    }
} else {?>
        <h3 align='center'><?echo "Добавление ".$name_dt?></h3>
	<form name="form1" method="post" action="user_add.php" enctype="multipart/form-data">
         <p>
           <label>Введите имя <? echo $name_dt ?><br>
             <input type="text" name="title" id="title" size="<? echo $SizeOfinput ?>">
             </label>
         </p>
         <p>
           <label>Введите пароль <? echo $name_dt ?><br>
             <input type="password" name="pswd" id="pswd" size="<? echo $SizeOfinput ?>">
             </label>
         </p>
         <p>
           <label>Повторите пароль <? echo $name_dt ?><br>
             <input type="password" name="pswd1" id="pswd1" size="<? echo $SizeOfinput ?>">
             </label>
         </p>
         <input name="id" type="hidden" value="1">
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Добавить">
           </label>
         </p>

       </form>
<?}
include("footer.html");
?>

