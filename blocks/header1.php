<?include ("blocks/bd.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<meta http-equiv="Content-Language" content="ru">-->
<?

if (strstr($SERVER, 'tours.php') == TRUE)
{
    include ("blocks/tours_head.php");
    print <<<HERE
    <title>����� ������ �����</title>
HERE;
}else {
    print <<<HERE
    <!-- ��������� ���������� -->
    <script src="tours/js/System/System.js" type="text/javascript"></script>
    <!-- ���������� ��� ������ � ������ -->
    <script src="tours/js/System/DateTime.js" type="text/javascript"></script>
    <!-- ������� ��������� ���������� ���������� ������������ -->
    <script src="tours/js/ajs/AJS.js" type="text/javascript"></script>
    <script src="tours/js/ajs/AJS_fx.js" type="text/javascript"></script>
    <!-- ������������ ����� BRONNI.RU -->
    <link href="tours/Styles/Design.css" rel="stylesheet"></link>
    <!-- ���������� ������� � ������ � ����� BRONN.RU -->
    <script src="tours/js/System/Ajax.js" type="text/javascript"></script>
    <!-- ���������� ������� � ������ � ������� JSON-->
    <script src="tours/js/Json/json.js" type="text/javascript"></script>
    <!-- ������ ��� ����������� -->
    <script src="tours/js/Proxy/SecurityProxy.js" type="text/javascript"></script>
    <!-- ������ ��� ��������� ������ � ������������ -->
    <script src="tours/js/Proxy/DictionariesProxy.js" type="text/javascript"></script>
    <!-- ���������� ��������� ���������� -->
    <!-- ComboBox -->
    <script type="text/javascript" src="tours/js/Controls/ComboBox.js"></script>
    <!-- ����� ����� ��� ���� ���������� ������� -->
    <link href="tours/Styles/Controls/ComboBox.css" rel="stylesheet" />
    <!-- ������� ���������� ��������� ��������� ���������� -->
    <link id="styles" href="tours/Styles/SearchForm_std.css" type="text/css" rel="stylesheet" />
    <!-- ��������� ��������� ������ ������ -->
    <script src="tours/js/Setup.js" type="text/javascript"></script>
    <!-- ������ -->
    <script src="tours/js/DataSource/DictionariesDataSource.js" type="text/javascript"></script>
    <!-- ������� ��������� ���������� -->
    <script src="tours/js/Events.js" type="text/javascript"></script>
    <!-- ���������� jQuery -->
    <script src="tours/js/System/jquery.js" type="text/javascript"></script>
    <script src="tours/js/PageScript/SearchForm_min.js" type="text/javascript"></script>
HERE;
}
if (strstr($SERVER, 'cruize.php') == TRUE)
{
    print <<<HERE
    <title>On-line ����� �������</title>
    <link type="text/css" href="http://breeze.ru/stylesheets/export.css" rel="stylesheet" />
HERE;
}
elseif (strstr($SERVER, 'contrystudy.php') == TRUE)
{
    include ("blocks/contrystudy_head_r.php");
    print <<<HERE
    <title>�������������</title>
HERE;
}
elseif (strstr($SERVER, 'showcase.php') == TRUE)
{
    include ("blocks/showcase_head.php");
    print <<<HERE
    <title>������� �����</title>
HERE;
}
elseif (strstr($SERVER, 'riverlines.php') == TRUE)
{
    include ("blocks/riverlines_head.php");
    print <<<HERE
    <title> ������ ������, ������ ������ � �����, ����������� � ������ �� ������|</title>
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

<?
/*if (strstr($SERVER, 'tours.php') == TRUE)
{
    print <<<HERE
    <body id="docBody" onload="onloadwindow()">
HERE;
}
elseif (strstr($SERVER, 'contrystudy.php') == TRUE)
{
    print <<<HERE
    <body onload="Init()">
HERE;
}
elseif (strstr($SERVER, 'showcase.php') == TRUE)
{
    print <<<HERE
    <body onload="onloadwindow()">
HERE;
}
elseif (strstr($SERVER, 'riverlines.php') == TRUE)
{
    print <<<HERE
    <body  leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>
HERE;
}
else {
    //print <<<HERE
    //<body onload="OnLoadAllFunc()">
//HERE;
}*/
?>
<body id="docBody" onload="OnLoadAllFunc()">
<div class="top_line"></div>
<div class="box">
<div class="box_l">
<a href="index.php"><img src="img/logol.gif" alt="��������� ����������� �����-�����" class="logo"></a>
<div class="menu">
<ul>

