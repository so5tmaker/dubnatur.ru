<?php
include ("lock.php");
/* ���� ���������� � ���������� ������� $_POST['title'] ���. ������, ��
 * �� ������� ������� ���������� �� ��.
 * ���� ���������� ������, �� ���������� ����������.   */
if (isset($_POST['title'])) {$title = $_POST['title']; if ($title == '') {unset($title);}}
$title_here = "����������"; include("header.html"); 
if (isset($title))
{
/* ����� ����� ��� ����� �������� ���������� � ���� */
$result = mysql_query ("INSERT INTO sections (title) VALUES ('$title')");

if ($result == 'true') {echo "<p>��� ������ ������� ��������!</p>";}
else {echo "<p>��� ������ �� ��������!</p>";}
}
else
{
echo "<p>�� ����� �� ��� ����������, ������� ������ � ���� �� ����� ���� ��������.</p>";
}
include("footer.html");
?>
