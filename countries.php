<?
include ("blocks/header.php");?>
<!-- ����� ���� -->
<li><a href="tours.php">����� �����</a></li>
<li><a href="countries.php">������� ������</a></li>
<li><a href="contrystudy.php">�������������</a></li>
<?//<!-- ����� ���� -->
$sec=-1;$t_sec = "WHERE sec=".$sec; $file = "tours.php"; $h1=FALSE;
//<!-- ������� ���� -->
include ("blocks/middle.php");?>
<!-- ������� -->
<div style="margin-top: 10px;">
        <div id="WaitingControl" style="float: right; display: none;">
                <img src="tours/Images/snake.gif" alt="" width="16" height="16" />
                ���� ��������...</div>
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
<!-- ������� -->
<div style="margin-top: 20px"></div>
<?
include ("blocks/content.php");
//<!-- ������ -->
include ("blocks/footer.php");?>
