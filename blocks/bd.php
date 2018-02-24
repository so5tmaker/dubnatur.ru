<?
//«десь € провер€ю путь к файлу исполн€емого в данный момент скрипта,
//чтобы определить какую базу мне нужно локальную или удаленную
$SERVER = $_SERVER['SCRIPT_FILENAME'];
$USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
$rus = strstr($SERVER, 'localhost');
$HOST = $_SERVER['HTTP_HOST'];
if ($rus !== false){$url = "http://".$HOST."/dubnatur/";}else{$url = 'http://www.dubnatur.site11.com/';}
if ($rus !== false)
{
    $url = "http://".$HOST."/dubnatur/";
    $mysql_host = "localhost";
    $mysql_database = "dubnatur";
    $mysql_user = "bloguser";
    $mysql_password = "12345";
    $db=mysql_connect($mysql_host,$mysql_user,$mysql_password);
    mysql_select_db($mysql_database,$db);
}
    elseif (strstr($SERVER, 'dubnatur.site11') !== false)
{
    $url = 'http://www.dubnatur.site11.com/';
    $mysql_host = "mysql13.000webhost.com";
    $mysql_database = "a5255826_dubna";
    $mysql_user = "a5255826_dubna";
    $mysql_password = "b@sedubna";

    $db = mysql_connect ($mysql_host,$mysql_user,$mysql_password);
    mysql_select_db($mysql_database,$db);

    mysql_query("SET NAMES 'cp1251'");
 }
    elseif (strstr($HOST, 'dubnatur.ru') !== false)
{
    $url = 'http://www.dubnatur.ru/';
    $mysql_host = "mysql29.1gb.ru";
    $mysql_database = "gb_dubnatur";
    $mysql_user = "gb_dubnatur";
    $mysql_password = "48d6e492";

    $db = mysql_connect ($mysql_host,$mysql_user,$mysql_password);
    mysql_select_db($mysql_database,$db);
 }
?>