<?php
include ("lock.php");
if (isset($_POST['id'])) {$id = $_POST['id'];}
$name_dt = "������������"; $title_here = "�������� ���������� ������".$name_dt;
include("header.html");
if (isset($id)) {
    if (isset($_POST['title'])) {$title = $_POST['title']; if ($title == '') {unset($title);}}
    if (isset($_POST['pswd'])) {$pswd = $_POST['pswd']; if ($pswd == '') {unset($pswd);}}
    if (isset($_POST['pswd1'])) {$pswd1 = $_POST['pswd1']; if ($pswd1 == '') {unset($pswd1);}}
    if (isset($title)&& isset($pswd)&& isset($pswd1))
    {
        if ($pswd==$pswd1)
        {
            /* ����� ����� ��� ����� �������� ���������� � ���� */
            $result = mysql_query ("INSERT INTO userlist (user,pass) VALUES ('$title','$pswd')");
            if ($result == 'true') {echo "<p>���������� ".$name_dt." ������� ������!</p>";}
            else {echo "<p>���������� ".$name_dt." �� ������!</p>";}
        }
        else {echo "<p>������ ".$name_dt." �� ���������!</p>";}
    }
    else
    {
    echo "<p>�� ����� �� ��� ����������, ������� ���������� �������� ".$name_dt." � ����.</p>";
    }
} else {?>
        <h3 align='center'><?echo "���������� ".$name_dt?></h3>
	<form name="form1" method="post" action="user_add.php" enctype="multipart/form-data">
         <p>
           <label>������� ��� <? echo $name_dt ?><br>
             <input type="text" name="title" id="title" size="<? echo $SizeOfinput ?>">
             </label>
         </p>
         <p>
           <label>������� ������ <? echo $name_dt ?><br>
             <input type="password" name="pswd" id="pswd" size="<? echo $SizeOfinput ?>">
             </label>
         </p>
         <p>
           <label>��������� ������ <? echo $name_dt ?><br>
             <input type="password" name="pswd1" id="pswd1" size="<? echo $SizeOfinput ?>">
             </label>
         </p>
         <input name="id" type="hidden" value="1">
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="��������">
           </label>
         </p>

       </form>
<?}
include("footer.html");
?>

