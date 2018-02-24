<?php
if ($sec==8){?>
<li><a href="http://affiliate.bilet.ru/avia-order-3041.htm">Оформить заказ</a></li>
<li><a href="http://affiliate.bilet.ru/affiliate-3041.htm">Расписание</a></li>
<li><a href="http://affiliate.bilet.ru/aviastat-table-3041.htm">Табло аэропортов</a></li>
<li><a href="http://affiliate.bilet.ru/aviastat-spec-3041.htm">Специальные предложения</a></li>
<li><a href="http://dubnatur.ru/index.php?id=51&sec=8">VIP-залы в аэропортах Москвы</a></li>
<li><a href="http://affiliate.bilet.ru/aviastat-pay-3041.htm">Как оплачивать билеты</a></li>
<li><a href="http://affiliate.bilet.ru/aviastat-ship-3041.htm">Доставка билетов</a></li>
<li><a href="http://dubnatur.ru/index.php?id=52&sec=8">Как читать авиабилет</a></li>
<li><a href="http://affiliate.bilet.ru/affiliate-3042.htm">Чартерные авиабилеты</a></li>
<?}
elseif ($sec==9) {?>
<li><a href="http://affiliate.bilet.ru/affiliate-3043.htm">Отели по всему миру</a>
<li><a href="http://affiliate.bilet.ru/hotelrus-mow-3043.htm">Гостиницы в Москве</a>
<li><a href="http://affiliate.bilet.ru/hotelrus-led-3043.htm">Гостиницы в Санкт-Петербурге</a>
<li><a href="http://affiliate.bilet.ru/hotelrus-russia-3043.htm">Гостиницы в других городах России</a>
<li><a href="http://affiliate.bilet.ru/hotels-cis-3043.htm">Гостиницы в городах СНГ</a>
<li><a href="http://affiliate.bilet.ru/hotels-rule-3044.htm">Правила бронирования</a>
<li><a href="http://dubnatur.ru/index.php?id=53&sec=9">Как оплачивать</a>
<li><a href="http://dubnatur.ru/index.php?id=54&sec=9">Визовая поддержка</a>
<li><a href="http://dubnatur.ru/index.php?id=51&sec=8">VIP-залы в аэропортах Москвы</a>
<?}
else {
    $data_res = mysql_query("SELECT * FROM data ".$t_sec, $db);

    if (!$data_res)
    {
    echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@dubnatur.ru. <br> <strong>Код ошибки:</strong></p>";
    exit(mysql_error());
    }

    if (mysql_num_rows($data_res) > 0)
    {
        $data_row = mysql_fetch_array($data_res);
    do
    {
        if (($data_row["sec"]<>1)and($t_sec == "")){continue;}
        printf ("
                     <li><a href='%s?id=%s&sec=%s'>%s</a></li>
                     ",$file,$data_row["id"],$sec,$data_row["title"]);
    }
        while ($data_row = mysql_fetch_array($data_res));
    }
    else
    {
        echo "<p>Информация по запросу не может быть извлечена для данного раздела нет записей подразделов.</p>";
        //exit();
    }
}
?>
