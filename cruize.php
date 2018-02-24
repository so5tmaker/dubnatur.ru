<?include ("blocks/header.php");?>
<!-- Левое меню -->
<li><a href="cruize.php">Морские круизы</a></li>
<li><a href="http://www.riverlines.ru/base/?idx=dubna" target="_blank">Речные круизы</a></li>
<?$sec=6;$t_sec = "WHERE sec=".$sec; $file = "cruize.php"; $h1=FALSE;?>
<!-- Верхнее меню -->
<?include ("blocks/middle.php");?>
<!-- Контент -->
<div id="05b2369b969ee02f8925f5f23faa85a943d33a9f"></div>

<script src="http://breeze.ru/export/script?partner=05b2369b969ee02f8925f5f23faa85a943d33a9f" type="text/javascript" charset="utf-8"></script>

<div style="margin-top: 20px"></div>
<?
if (!isset ($_GET['action'])) {
include ("blocks/content.php");}
//<!-- Подвал -->
include ("blocks/footer.php");?>