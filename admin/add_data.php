<?php
include ("lock.php");
/* Если существует в глобальном массиве $_POST['title'] опр. ячейка, то
 * мы создаем простую переменную из неё.
 * Если переменная пустая, то уничтожаем переменную.   */
if (isset($_POST['title'])) {$title = $_POST['title']; if ($title == '') {unset($title);}}
if (isset($_POST['text']))  {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['sec']))      {$sec = $_POST['sec']; if ($sec == '') {unset($sec);}}
if (isset($_POST['name_dt'])){$name_dt = $_POST['name_dt']; if ($name_dt == '') {unset($name_dt);}}
$title_here = "Обработчик"; include("header.html"); 
if (isset($title) && isset($text))
{
    /* Здесь пишем что можно заносить информацию в базу */
    $result = mysql_query ("INSERT INTO data (sec,text,title) VALUES ('$sec','$text','$title')");
    if ($result == 'true') {echo "<p>Добавление ".$name_dt." прошло успешно!</p>";}
    else {echo "<p>Добавление ".$name_dt." не прошло!</p>";}
}		 
else 
{
    echo "<p>Вы ввели не всю информацию, поэтому добаления ".$name_dt." не будет!.</p>";
}
include("footer.html");?>
       
