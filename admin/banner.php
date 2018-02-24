<?php
include ("lock.php");
$name_dt = "баннера"; $title_here = "Страница добавления нового ".$name_dt;
include("header.html");
if (isset($_FILES["userfile"])) {
    $path=str_replace("admin", "", getcwd());
    $ErrorDescription = '';
    $name_dt = "баннер";
    function get_image($name_dt,$path)
    {
       global $ErrorDescription;
       static $image_size=0;
       // Проверяем не пустали глобальная переменная $_FILES
      if(!empty($_FILES)){
       // Если файл пришел, то проверяем графический ли он (из соображений безопасности)

        if(substr($_FILES['userfile']['type'], 0, 5)=='image'){

                $valid_types = array('png');
                $ext = substr($_FILES['userfile']['name'],1 + strrpos($_FILES['userfile']['name'], '.'));
                if(!in_array($ext, $valid_types))
                {
                    $ErrorDescription='<p>Невозможно загрузить <b>'.$_FILES['userfile']['name'].'</b>, т.к. инициализировано <b>неизвестное</b> расширение файла. Допустимые расширения: <b>png</b></p>';
                    return '';
                }
                $max_image_width    = 700;
                $max_image_height    = 90;
                $size = getimagesize($_FILES['userfile']['tmp_name']);
                if (($size[0] <> $max_image_width) || ($size[1] <> $max_image_height))
                {
                    $ErrorDescription='<p>Неправильная высота или ширина файла!</p>';
                    return '';
                }
                $tmp_name = $_FILES['userfile']['tmp_name'];
          // В PHP ранее 4.1.0 должна использоваться $HTTP_POST_FILES вместо $_FILES.
            if (is_uploaded_file($tmp_name)) {
                     //Считываем файл в строку
                    $data = file_get_contents($tmp_name);
                    $data_filename = $path.'tours/Images/banner.png';
                    if ( !empty($data) && ($fp = @fopen($data_filename, 'wb'))  )
                    {
                        @fwrite($fp, $data);
                        @fclose($fp);
                    } else {
                        $ErrorDescription="<p>Не удалось загрузить файл. Название: " . $_FILES['userfile']['name']."</p> ".$path.'tours/Images/banner.png';
                        return '';
                    }
                    unset($data);
                    return 1;
            } else {
                $ErrorDescription="<p>Невозможно загрузить файл. Название: " . $_FILES['userfile']['name']."</p>";
                return '';
            }

        }else{
            $ErrorDescription="<p>Вы загрузили не изображение, поэтому ".$name_dt." не может быть добавлен.</p>";
            return '';
            }
      }else{
        $ErrorDescription="<p>Вы не загрузили изображение, поле пустое, поэтому ".$name_dt." не может быть добавлен.</p>";
        return '';
        }
        return 1;
    }


    $image=get_image($name_dt,$path);
    if ($image == '') {unset($image);}
    if (isset($image))
    {
        echo "<p>Ваш ".$name_dt." успешно добавлен!</p>";
    }
    else
    {
        if ($ErrorDescription == '')
            {echo "<p>Вы ввели не всю информацию, поэтому ".$name_dt." не может быть добавлен.</p>";}
        else
            {echo $ErrorDescription;}
    }
} else {?>
	<form name="form1" method="post" action="banner.php" enctype="multipart/form-data">
         <p>
            <label>Изображение <? echo $name_dt ?><br>
            <input type="file" name="userfile" size="<? echo ($SizeOfinput-12) ?>"><br></label>
         </p>
         <p>
            <strong>Каждое изображение должно быть размером 700x90!</strong>
         </p>
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Сохранить">
           </label>
         </p>

       </form>
<?}
include("footer.html");
?>

