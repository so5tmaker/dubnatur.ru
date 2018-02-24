<?php
include ("lock.php");
/* Если существует в глобальном массиве $_POST['title'] опр. ячейка, то
 * мы создаем простую переменную из неё.
 * Если переменная пустая, то уничтожаем переменную.   */
if (isset($_POST['pswd'])) {$pswd = $_POST['pswd']; if ($pswd == '') {unset($pswd);}}
if (isset($_POST['pswd1']))  {$pswd1 = $_POST['pswd1']; if ($pswd1 == '') {unset($pswd1);}}
if (isset($_POST['id']))      {$id = $_POST['id'];}
if (isset($_POST['user']))      {$user = $_POST['user']; if ($user == '') {unset($user);}}
if (isset($_POST['name_dt']))      {$name_dt = $_POST['name_dt']; if ($name_dt == '') {unset($name_dt);}}
if (isset($_POST['tbl_dt']))      {$tbl_dt = $_POST['tbl_dt']; if ($tbl_dt == '') {exit("Не могу найти таблицу для добавления данных!");}}
$title_here = "Обработчик"; include("header.html"); ?>
<?php 
if (isset($user) && isset($pswd) && isset($pswd1))
{
    if ($pswd==$pswd1)
    {
        /* Здесь пишем что можно заносить информацию в базу */
        $result = mysql_query ("UPDATE ".$tbl_dt." SET user='$user', pass='$pswd' WHERE id='$id'");
        if ($result == 'true') {echo "<p>Обновление ".$name_dt." прошло успешно!</p>";}
        else {echo "<p>Обновление ".$name_dt." не прошло!</p>";}
    }
    else {echo "<p>Пароли ".$name_dt." не совпадают!</p>";}
}		 
else 
{
echo "<p>Вы ввели не всю информацию, поэтому обновления ".$name_dt." не будет!</p>";
}
include("footer.html");?>
