<?php
include ("lock.php");
/* ���� ���������� � ���������� ������� $_POST['title'] ���. ������, ��
 * �� ������� ������� ���������� �� ��.
 * ���� ���������� ������, �� ���������� ����������.   */
if (isset($_POST['title'])) {$title = $_POST['title']; if ($title == '') {unset($title);}}
if (isset($_POST['text']))  {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['sec']))      {$sec = $_POST['sec']; if ($sec == '') {unset($sec);}}
if (isset($_POST['name_dt'])){$name_dt = $_POST['name_dt']; if ($name_dt == '') {unset($name_dt);}}
$title_here = "����������"; include("header.html"); 
if (isset($title) && isset($text))
{
    /* ����� ����� ��� ����� �������� ���������� � ���� */
    $result = mysql_query ("INSERT INTO data (sec,text,title) VALUES ('$sec','$text','$title')");
    if ($result == 'true') {echo "<p>���������� ".$name_dt." ������ �������!</p>";}
    else {echo "<p>���������� ".$name_dt." �� ������!</p>";}
}		 
else 
{
    echo "<p>�� ����� �� ��� ����������, ������� ��������� ".$name_dt." �� �����!.</p>";
}
include("footer.html");?>
       
