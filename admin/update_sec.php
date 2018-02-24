<?php
include ("lock.php");
/* Если существует в глобальном массиве $_POST['title'] опр. ячейка, то
 * мы создаем простую переменную из неё.
 * Если переменная пустая, то уничтожаем переменную.   */
if (isset($_POST['title'])){ $title = $_POST['title'];if ($title == ''){unset($title);}}
if (isset($_POST['id'])) {$id = $_POST['id'];}
$title_here = "Обработчик"; include("header.html"); ?>
<?php
if (isset($title))
{
/* Здесь пишем что можно заносить информацию в базу */
$result = mysql_query ("UPDATE sections SET title='$title' WHERE id='$id'");

if ($result == 'true') {echo "<p>Ваш раздел успешно обновлен!</p>";}
else {echo "<p>Ваш раздел не обновлен!</p>";}
}
else

{
echo "<p>Вы ввели не всю информацию, поэтому раздел в базе не может быть обновлен.</p>";
}
?>
<? include("footer.html");?>
