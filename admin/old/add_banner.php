<?php
include ("lock.php");
$path=str_replace("admin", "", getcwd());
$ErrorDescription = '';
$name_dt = "������";
include("header.html");
function get_image($name_dt,$path)
{
   global $ErrorDescription;
   static $image_size=0;
   // ��������� �� ������� ���������� ���������� $_FILES
  if(!empty($_FILES)){
   // ���� ���� ������, �� ��������� ����������� �� �� (�� ����������� ������������)

    if(substr($_FILES['userfile']['type'], 0, 5)=='image'){
      
            $valid_types = array('png');
            $ext = substr($_FILES['userfile']['name'],1 + strrpos($_FILES['userfile']['name'], '.'));
            if(!in_array($ext, $valid_types))
            {
                $ErrorDescription='<p>���������� ��������� <b>'.$_FILES['userfile']['name'].'</b>, �.�. ���������������� <b>�����������</b> ���������� �����. ���������� ����������: <b>png</b></p>';
                return '';
            }
            $max_image_width    = 700;
            $max_image_height    = 90;
            $size = getimagesize($_FILES['userfile']['tmp_name']);
            if (($size[0] <> $max_image_width) || ($size[1] <> $max_image_height))
            {
                $ErrorDescription='<p>������������ ������ ��� ������ �����!</p>';
                return '';
            }

      // � PHP ����� 4.1.0 ������ �������������� $HTTP_POST_FILES ������ $_FILES.
        if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
            move_uploaded_file($_FILES['userfile']['tmp_name'], $path.'\tours\Images\banner.png');
            return 1;
        } else {
            $ErrorDescription="<p>���������� ��������� ����. ��������: " . $_FILES['userfile']['name']."</p>";
            return '';
        }

    }else{
        $ErrorDescription="<p>�� ��������� �� �����������, ������� ".$name_dt." �� ����� ���� ��������.</p>";
        return '';
        }
  }else{
    $ErrorDescription="<p>�� �� ��������� �����������, ���� ������, ������� ".$name_dt." �� ����� ���� ��������.</p>";
    return '';
    }
    return 1;
}

$image=get_image($name_dt,$path);
if ($image == '') {unset($image);}
    
if (isset($image))
{
    echo "<p>��� ".$name_dt." ������� ��������!</p>";
}
else
{
    if ($ErrorDescription == '')
        {echo "<p>�� ����� �� ��� ����������, ������� ".$name_dt." �� ����� ���� ��������.</p>";}
    else
        {echo $ErrorDescription;}
}
include("footer.html");
?>  

