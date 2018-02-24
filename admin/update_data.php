<?php
include ("lock.php");
/* Если существует в глобальном массиве $_POST['title'] опр. ячейка, то
 * мы создаем простую переменную из неё.
 * Если переменная пустая, то уничтожаем переменную.   */
if (isset($_POST['title'])) {$title = $_POST['title']; if ($title == '') {unset($title);}}
if (isset($_POST['text']))  {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['id']))      {$id = $_POST['id'];}
if (isset($_POST['sec']))      {$sec = $_POST['sec']; if ($sec == '') {unset($sec);}}
if (isset($_POST['name_dt']))      {$name_dt = $_POST['name_dt']; if ($name_dt == '') {unset($name_dt);}}
if (isset($_POST['tbl_dt']))      {$tbl_dt = $_POST['tbl_dt']; if ($tbl_dt == '') {exit("Не могу найти таблицу для добавления данных!");}}
$title_here = "Обработчик"; include("header.html"); ?>
<?php 
if (isset($title) && isset($text) && isset($sec))
{
/* Здесь пишем что можно заносить информацию в базу */
$result = mysql_query ("UPDATE ".$tbl_dt." SET title='$title', text='$text', sec='$sec' WHERE id='$id'");
if ($result == 'true') {echo "<p>Обновление ".$name_dt." прошло успешно!</p>";}
else {echo "<p>Обновление ".$name_dt." не прошло!</p>";}
}		 
else 
{
echo "<p>Вы ввели не всю информацию, поэтому обновления ".$name_dt." не будет!</p>";
}
?>
<? include("footer.html");?>
