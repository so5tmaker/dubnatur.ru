<?php
if ($sec<>-1){
    if (isset($_GET['id'])) {$text_q = "WHERE (id=".$_GET['id'].")and(sec=".$sec.")";}else{$text_q = "WHERE sec=".$sec." LIMIT 0 , 1";}
    $index_res = mysql_query("SELECT * FROM data ".$text_q, $db);

    if (!$index_res)
    {
    echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� info@dubnatur.ru. <br> <strong>��� ������:</strong></p>";
    exit(mysql_error());
    }

    if (mysql_num_rows($index_res) > 0)
    {
        $index_row = mysql_fetch_array($index_res);
        if ($h1) {echo "<h1>".$index_row["title"]."</h1>";}
        echo $index_row["text"];
    }
    else
    {
        echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������.</p>";
        //exit();
    }
}
?>
