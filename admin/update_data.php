<?php
include ("lock.php");
/* ���� ���������� � ���������� ������� $_POST['title'] ���. ������, ��
 * �� ������� ������� ���������� �� ��.
 * ���� ���������� ������, �� ���������� ����������.   */
if (isset($_POST['title'])) {$title = $_POST['title']; if ($title == '') {unset($title);}}
if (isset($_POST['text']))  {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['id']))      {$id = $_POST['id'];}
if (isset($_POST['sec']))      {$sec = $_POST['sec']; if ($sec == '') {unset($sec);}}
if (isset($_POST['name_dt']))      {$name_dt = $_POST['name_dt']; if ($name_dt == '') {unset($name_dt);}}
if (isset($_POST['tbl_dt']))      {$tbl_dt = $_POST['tbl_dt']; if ($tbl_dt == '') {exit("�� ���� ����� ������� ��� ���������� ������!");}}
$title_here = "����������"; include("header.html"); ?>
<?php 
if (isset($title) && isset($text) && isset($sec))
{
/* ����� ����� ��� ����� �������� ���������� � ���� */
$result = mysql_query ("UPDATE ".$tbl_dt." SET title='$title', text='$text', sec='$sec' WHERE id='$id'");
if ($result == 'true') {echo "<p>���������� ".$name_dt." ������ �������!</p>";}
else {echo "<p>���������� ".$name_dt." �� ������!</p>";}
}		 
else 
{
echo "<p>�� ����� �� ��� ����������, ������� ���������� ".$name_dt." �� �����!</p>";
}
?>
<? include("footer.html");?>
