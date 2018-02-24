<?include ("blocks/bd.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style type="text/css" media="screen">
                /*html, body	{ height:100%; }
                body { margin:0; padding:0; overflow:auto; text-align:center;
                       background-color: #ffffff; }*/
                #flashContent { display:none; }
</style>
<script type="text/javascript" src="banner/swfobject.js"></script>
<?
$file = "index.php"; $h1=TRUE;
if (isset($_GET['sec'])) {$sec = $_GET['sec']; $t_sec = "WHERE sec=".$sec;}else{$t_sec = "";$sec = 1;}
if (strstr($SERVER, 'index.php') == TRUE)
{
    print <<<HERE
    <title>Dubnatur Агентство Путешествий Визит-Центр</title>
HERE;
}
if (strstr($SERVER, 'tours.php') == TRUE)
{
    include ("blocks/tours_head.php");
    print <<<HERE
    <title>Форма поиска туров</title>
HERE;
}else {
    //include ("blocks/banners_head.php");
}
if (strstr($SERVER, 'cruize.php') == TRUE)
{
    print <<<HERE
    <title>On-line поиск круизов</title>
    <link type="text/css" href="css/export.css" rel="stylesheet" />
HERE;
}
elseif (strstr($SERVER, 'countries.php') == TRUE)
{
    if (isset ($_GET['hotelId_sm']))
    {
        include ("blocks/hotels_head.php");
        print <<<HERE
        <title>Детальная информация об отеле</title>
HERE;
    }else {
        include ("blocks/countries_head.php");
        print <<<HERE
    <title>Каталог стран</title>
HERE;
    }
}
elseif (strstr($SERVER, 'contrystudy.php') == TRUE)
{
    include ("blocks/contrystudy_head.php");
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

//$funcs="onloadSearchForm_min();";
if (strstr($SERVER, 'tours.php') == TRUE)
{
    $funcs = "onloadSearchForm();";
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
<div id="echo"></div>
<div class="top_line"></div>
<div class="box">
<div class="box_l">
<a href="index.php"><img src="img/logol.gif" alt="Агентство путешествий Визит-Центр" class="logo"></a>
<div class="menu">
<ul>
