<?php
include ("lock.php");
/* ���� ���������� � ���������� ������� $_POST['title'] ���. ������, ��
 * �� ������� ������� ���������� �� ��.
 * ���� ���������� ������, �� ���������� ����������.   */
if (isset($_POST['title'])){ $title = $_POST['title'];if ($title == ''){unset($title);}}
if (isset($_POST['id'])) {$id = $_POST['id'];}
$title_here = "����������"; include("header.html"); ?>
<?php
if (isset($title))
{
/* ����� ����� ��� ����� �������� ���������� � ���� */
$result = mysql_query ("UPDATE sections SET title='$title' WHERE id='$id'");

if ($result == 'true') {echo "<p>��� ������ ������� ��������!</p>";}
else {echo "<p>��� ������ �� ��������!</p>";}
}
else

{
echo "<p>�� ����� �� ��� ����������, ������� ������ � ���� �� ����� ���� ��������.</p>";
}
?>
<? include("footer.html");?>
