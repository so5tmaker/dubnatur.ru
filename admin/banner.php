<?php
include ("lock.php");
$name_dt = "�������"; $title_here = "�������� ���������� ������ ".$name_dt;
include("header.html");
if (isset($_FILES["userfile"])) {
    $path=str_replace("admin", "", getcwd());
    $ErrorDescription = '';
    $name_dt = "������";
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
                $tmp_name = $_FILES['userfile']['tmp_name'];
          // � PHP ����� 4.1.0 ������ �������������� $HTTP_POST_FILES ������ $_FILES.
            if (is_uploaded_file($tmp_name)) {
                     //��������� ���� � ������
                    $data = file_get_contents($tmp_name);
                    $data_filename = $path.'tours/Images/banner.png';
                    if ( !empty($data) && ($fp = @fopen($data_filename, 'wb'))  )
                    {
                        @fwrite($fp, $data);
                        @fclose($fp);
                    } else {
                        $ErrorDescription="<p>�� ������� ��������� ����. ��������: " . $_FILES['userfile']['name']."</p> ".$path.'tours/Images/banner.png';
                        return '';
                    }
                    unset($data);
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
} else {?>
	<form name="form1" method="post" action="banner.php" enctype="multipart/form-data">
         <p>
            <label>����������� <? echo $name_dt ?><br>
            <input type="file" name="userfile" size="<? echo ($SizeOfinput-12) ?>"><br></label>
         </p>
         <p>
            <strong>������ ����������� ������ ���� �������� 700x90!</strong>
         </p>
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="���������">
           </label>
         </p>

       </form>
<?}
include("footer.html");
?>

