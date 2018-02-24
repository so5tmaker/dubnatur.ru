<?
include ("blocks/header.php");?>
<!-- Левое меню -->
<li><a href="tours.php">Поиск туров</a></li>
<li><a href="countries.php">Каталог отелей</a></li>
<li><a href="contrystudy.php">Страноведение</a></li>
<?//<!-- Левое меню -->
$sec=-1;$t_sec = "WHERE sec=".$sec; $file = "tours.php"; $h1=FALSE;
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

<?if (isset ($_GET['hotelId_sm'])){
    include ("blocks/hotel_details.php");
}elseif (isset ($_GET['city_sm'])){?>
    <div style="height: auto;">
    <div id="HotelsList" style="height: auto;"></div>
    </div><script>onloadHotelCatalogHotels();</script>
<?}elseif (isset ($_GET['country_sm'])){?>
    <div style="height: auto;">
    <div id="CitiesList" style="height: auto;"></div>
    </div><script>onloadHotelCatalogCities();</script>
<?}else{?>
    <div style="height: auto;">
    <div id="CountriesList" style="height: auto;"></div>
    </div><script>onloadHotelCatalogCountries();</script>
<?}?>
<!-- Контент -->
<div style="margin-top: 20px"></div>
<?
include ("blocks/content.php");
//<!-- Подвал -->
include ("blocks/footer.php");?>
