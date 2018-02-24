<?include ("blocks/header.php");?>
<!-- Левое меню -->
<li><a href="tours.php">Поиск туров</a></li>
<li><a href="countries.php">Каталог отелей</a></li>
<li><a href="contrystudy.php">Страноведение</a></li>
<!-- Верхнее меню -->
<?include ("blocks/middle.php");?>
<!-- Контент -->
<table cellspacing="0" cellpadding="0" style="width:100%">
<tbody>
<tr><td class="single_top_left"></td><td class="single_top">
    <span class="menuHeader">
        Страноведение
    </span>
</td><td class="single_top_right"></td></tr>
<tr>
<td class="single_left">

</td>
    <td>
    <!-- Контент -->
        <div style="text-align:center;width:100%">
        <!--
            <select id="countryList">
            </select>
         -->
            <div id="divLetters"></div>
        </div>
        <div id="contentWaiting" style="display:none">
            Идет загрузка информации...
        </div>

        <div id="defaultContent">
        </div>
    <!-- /Контент -->
    </td>
<td class="single_right"></td></tr>
<tr><td class="single_bottom_left"></td><td class="single_bottom"></td><td class="single_bottom_right"></td></tr></tbody>
</table>
<!-- Подвал -->
<?include ("blocks/footer.php");?>
