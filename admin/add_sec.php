<?php
include ("lock.php");
/* Если существует в глобальном массиве $_POST['title'] опр. ячейка, то
 * мы создаем простую переменную из неё.
 * Если переменная пустая, то уничтожаем переменную.   */
if (isset($_POST['title'])) {$title = $_POST['title']; if ($title == '') {unset($title);}}
$title_here = "Обработчик"; include("header.html"); 
if (isset($title))
{
/* Здесь пишем что можно заносить информацию в базу */
$result = mysql_query ("INSERT INTO sections (title) VALUES ('$title')");

if ($result == 'true') {echo "<p>Ваш раздел успешно добавлен!</p>";}
else {echo "<p>Ваш раздел не добавлен!</p>";}
}
else
{
echo "<p>Вы ввели не всю информацию, поэтому раздел в базу не может быть добавлен.</p>";
}
include("footer.html");
?>
