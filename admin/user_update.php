<?php
include ("lock.php");
/* ���� ���������� � ���������� ������� $_POST['title'] ���. ������, ��
 * �� ������� ������� ���������� �� ��.
 * ���� ���������� ������, �� ���������� ����������.   */
if (isset($_POST['pswd'])) {$pswd = $_POST['pswd']; if ($pswd == '') {unset($pswd);}}
if (isset($_POST['pswd1']))  {$pswd1 = $_POST['pswd1']; if ($pswd1 == '') {unset($pswd1);}}
if (isset($_POST['id']))      {$id = $_POST['id'];}
if (isset($_POST['user']))      {$user = $_POST['user']; if ($user == '') {unset($user);}}
if (isset($_POST['name_dt']))      {$name_dt = $_POST['name_dt']; if ($name_dt == '') {unset($name_dt);}}
if (isset($_POST['tbl_dt']))      {$tbl_dt = $_POST['tbl_dt']; if ($tbl_dt == '') {exit("�� ���� ����� ������� ��� ���������� ������!");}}
$title_here = "����������"; include("header.html"); ?>
<?php 
if (isset($user) && isset($pswd) && isset($pswd1))
{
    if ($pswd==$pswd1)
    {
        /* ����� ����� ��� ����� �������� ���������� � ���� */
        $result = mysql_query ("UPDATE ".$tbl_dt." SET user='$user', pass='$pswd' WHERE id='$id'");
        if ($result == 'true') {echo "<p>���������� ".$name_dt." ������ �������!</p>";}
        else {echo "<p>���������� ".$name_dt." �� ������!</p>";}
    }
    else {echo "<p>������ ".$name_dt." �� ���������!</p>";}
}		 
else 
{
echo "<p>�� ����� �� ��� ����������, ������� ���������� ".$name_dt." �� �����!</p>";
}
include("footer.html");?>
