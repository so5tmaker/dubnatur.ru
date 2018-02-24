<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
<?

if (strstr($SERVER, 'tours.php') == TRUE)
{
    include ("blocks/tours_head.php");
    print <<<HERE
    <title>Форма поиска туров</title>
HERE;
}else {
    include ("blocks/banners_head.php");
}
if (strstr($SERVER, 'cruize.php') == TRUE)
{
    print <<<HERE
    <title>On-line поиск круизов</title>
    <link type="text/css" href="http://breeze.ru/stylesheets/export.css" rel="stylesheet" />
HERE;
}
elseif (strstr($SERVER, 'contrystudy.php') == TRUE)
{
    include ("blocks/contrystudy_head_r.php");
    print <<<HERE
    <title>Страноведение</title>
HERE;
}
elseif (strstr($SERVER, 'showcase.php') == TRUE)
{
    include ("blocks/showcase_head.php");
    print <<<HERE
    <title>Витрина туров</title>
HERE;
}
elseif (strstr($SERVER, 'riverlines.php') == TRUE)
{
    include ("blocks/riverlines_head.php");
    print <<<HERE
    <title> Речные круизы, водный туризм и отдых, путешествия и круизы по России|</title>
HERE;
}
else {
    print <<<HERE
    <title>Dubnatur</title>
HERE;
}

$funcs="onloadSearchForm();";
if (strstr($SERVER, 'tours.php') <> TRUE)
{
    //$funcs = $funcs." onloadwindow();";
}
elseif (strstr($SERVER, 'contrystudy.php') == TRUE)
{
    $funcs = $funcs." Init();";
}
elseif (strstr($SERVER, 'showcase.php') == TRUE)
{
    $funcs = $funcs." onloadwindow();";
}

print <<<HERE
<script type="text/javascript">
    function OnLoadAllFunc() {
        $funcs
    }
  </script>
HERE;
?>
<link href="css/s.css" rel="stylesheet" type="text/css">
</head>
<body id="docBody" onload="OnLoadAllFunc()">
<div class="top_line"></div>
<div class="box">
<div class="box_l">
<a href="index.php"><img src="img/logol.gif" alt="Агентство путешествий Визит-Центр" class="logo"></a>
<div class="menu">
<ul>
</ul>
</div>
</div>
<div class="box_r">

<?include ("blocks/topmenu.php");?>

<div class="content">

</div><!-- content -->

</div><!-- box_r -->

</div><!-- box -->

<div class="footer">
    <span style=" visibility: hidden">Программирование сайта  -  <a href="">www.softmaker.kz</a></span>
    <span>Дизайн сайта  -  <a href="">www.creasign.ru</a></span>
    <p>Copyright &copy; 2009, Агентство  Путешествий - Визит Центр</p>

</div>

<div class="rec">
<div class="stat">
<img src="img/stat.jpg" alt="">
<img src="img/stat.jpg" alt="">
<img src="img/stat.jpg" alt="">
<img src="img/stat.jpg" alt="">
</div>

<div class="banners">
<table id="Table" border="0" style="background-image: url('tours/Images/banner.png');
        width: 700; height: 90; border-style: hidden">
        <tr>
            <td id="DepartureCityComboBoxLabel" style="padding-left: 366; padding-top: 25">
            </td>
            <td rowspan="2" style="padding-top: 28; padding-right: 15">
                <div style="width: 105; height: 38; border-style: hidden; cursor: pointer" onclick="javascript:OpenResults()">
                </div>
            </td>
        </tr>
        <tr>
            <td id="DestinationCountryComboBoxLabel" style="padding-left: 366;">
            </td>
        </tr>
    </table>
</div>
</div>
</body>
</html>
