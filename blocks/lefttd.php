<?php
if ($sec==8){?>
<li><a href="http://affiliate.bilet.ru/avia-order-3041.htm">�������� �����</a></li>
<li><a href="http://affiliate.bilet.ru/affiliate-3041.htm">����������</a></li>
<li><a href="http://affiliate.bilet.ru/aviastat-table-3041.htm">����� ����������</a></li>
<li><a href="http://affiliate.bilet.ru/aviastat-spec-3041.htm">����������� �����������</a></li>
<li><a href="http://dubnatur.ru/index.php?id=51&sec=8">VIP-���� � ���������� ������</a></li>
<li><a href="http://affiliate.bilet.ru/aviastat-pay-3041.htm">��� ���������� ������</a></li>
<li><a href="http://affiliate.bilet.ru/aviastat-ship-3041.htm">�������� �������</a></li>
<li><a href="http://dubnatur.ru/index.php?id=52&sec=8">��� ������ ���������</a></li>
<li><a href="http://affiliate.bilet.ru/affiliate-3042.htm">��������� ����������</a></li>
<?}
elseif ($sec==9) {?>
<li><a href="http://affiliate.bilet.ru/affiliate-3043.htm">����� �� ����� ����</a>
<li><a href="http://affiliate.bilet.ru/hotelrus-mow-3043.htm">��������� � ������</a>
<li><a href="http://affiliate.bilet.ru/hotelrus-led-3043.htm">��������� � �����-����������</a>
<li><a href="http://affiliate.bilet.ru/hotelrus-russia-3043.htm">��������� � ������ ������� ������</a>
<li><a href="http://affiliate.bilet.ru/hotels-cis-3043.htm">��������� � ������� ���</a>
<li><a href="http://affiliate.bilet.ru/hotels-rule-3044.htm">������� ������������</a>
<li><a href="http://dubnatur.ru/index.php?id=53&sec=9">��� ����������</a>
<li><a href="http://dubnatur.ru/index.php?id=54&sec=9">������� ���������</a>
<li><a href="http://dubnatur.ru/index.php?id=51&sec=8">VIP-���� � ���������� ������</a>
<?}
else {
    $data_res = mysql_query("SELECT * FROM data ".$t_sec, $db);

    if (!$data_res)
    {
    echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� info@dubnatur.ru. <br> <strong>��� ������:</strong></p>";
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
        echo "<p>���������� �� ������� �� ����� ���� ��������� ��� ������� ������� ��� ������� �����������.</p>";
        //exit();
    }
}
?>
