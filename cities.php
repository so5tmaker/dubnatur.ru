<?
include ("blocks/header.php");?>
<!-- Левое меню -->
<li><a href="tours.php">Поиск туров</a></li>
<li><a href="countries.php">Страны</a></li>
<!-- <li><a href="contrystudy.php">Странноведение</a></li> -->
<?//include ("blocks/lefttd.php");
//<!-- Верхнее меню -->
include ("blocks/middle.php");?>
<!-- Контент -->
<div style="margin-top: 10px;">
        <div id="WaitingControl" style="float: right; display: none;">
                <img src="tours/Images/snake.gif" alt="" width="16" height="16" />
                Идет загрузка...</div>
        <div id="NavigationBar" style="height: 20px;">
        </div>
</div>
<div id="PageTitle" style="height: 20px;">
</div>
<div style="height: auto;">
        <div id="CountriesList" style="height: auto;">
        </div>
</div>
<script>
    onloadHotelCatalogCountries();
</script>

<!-- Контент -->
<div style="margin-top: 20px"></div>
<?
include ("blocks/content.php");
//<!-- Подвал -->
include ("blocks/footer.php");?>
