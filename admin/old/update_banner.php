<?php

$ErrorDescription = '';

function get_image($num)
{
   global $ErrorDescription;
   static $image_size=0;
  if(!empty($_FILES)){
    if($_FILES['userfile']['name'][$num]==''){
        return '';
    }
    $image_size=$_FILES['userfile']['size'][$num];
    if($image_size>1024*1024||$image_size==0){
        $ErrorDescription="<p><strong>������ ����������� �� ������ ��������� 1��! ������ � ���� �� ����� ���� ���������.</strong></p>";
        return '';}

  // ���� ���� ������, �� ��������� ����������� �� �� (�� ����������� ������������)

    if(substr($_FILES['userfile']['type'][$num], 0, 5)=='image'){
      // ������ ���������� �����

      $image=file_get_contents($_FILES['userfile']['tmp_name'][$num]);

      // ���������� ����������� ������� � ���������� �����

      $image=mysql_escape_string($image);
      return $image;

    }else{
        $ErrorDescription="<p>�� ��������� �� �����������, ������� ������ � ���� �� ����� ���� ���������.</p>";
        return '';
        }
  }else{
//    $ErrorDescription="<p>�� �� ��������� �����������, ������� ������ � ���� �� ����� ���� ���������.</p>";
    return '';
    }
    return $image;
}

include ("lock.php");
include ("blocks/bd.php");
if (isset($_POST['title']))       
{
$title = $_POST['title']; 

if ($title == '') 
{
unset($title);
}  

}

/* ���� ���������� � ���������� ������� $_POST['title'] ���. ������, �� �� ������� ������� ���������� �� ��. ���� ���������� ������, �� ���������� ����������.   */
if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}
if (isset($_POST['date']))        {$date = $_POST['date']; if ($date == '') {unset($date);}}
if (isset($_POST['description'])) {$description = $_POST['description']; if ($description == '') {unset($description);}}
if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['author']))      {$author = $_POST['author']; if ($author == '') {unset($author);}}
if (isset($_POST['id']))      {$id = $_POST['id'];}
$image_before=get_image(0); if ($image_before == '') {unset($image_before);}
$image_after=get_image(1); if ($image_after == '') {unset($image_after);}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>����������</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
<!--���������� ����� �����-->
<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="690" border="0" cellspacing="0" cellpadding="0">
      <tr>
<!--���������� ����� ���� �����-->
<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
      
<?php 
if (isset($title) && isset($meta_d) && isset($meta_k) && isset($date) && isset($description) && isset($text) && isset($author))
{
/* ����� ����� ��� ����� �������� ���������� � ���� */
    $query1 = ""; $query2 = "";
    if (isset($image_before))
    { $query1 = ",img_before='$image_before'";}
    if (isset($image_after))
    {$query2 = ",img_after='$image_after'";}
    $query="UPDATE lessons SET title='$title', meta_d='$meta_d', meta_k='$meta_k', date='$date', description='$description', text='$text', author='$author'";
    $query = $query.$query1.$query2." WHERE id='$id'";

    $result = mysql_query ($query);

    if ($result == 'true') {echo "<p>���� ������ ������� ���������!</p>";}
    else {echo "<p>���� ������ �� ���������!</p>";}

}		 
else 

{
echo "<p>�� ����� �� ��� ����������, ������� ������ � ���� �� ����� ���� ���������.</p>";
}

?>
        </td>
      </tr>
    </table></td>
  </tr>
<!--���������� ������ ����������� �������-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
