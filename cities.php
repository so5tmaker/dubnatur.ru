<?
include ("blocks/header.php");?>
<!-- ����� ���� -->
<li><a href="tours.php">����� �����</a></li>
<li><a href="countries.php">������</a></li>
<!-- <li><a href="contrystudy.php">��������������</a></li> -->
<?//include ("blocks/lefttd.php");
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
<div style="height: auto;">
        <div id="CountriesList" style="height: auto;">
        </div>
</div>
<script>
    onloadHotelCatalogCountries();
</script>

<!-- ������� -->
<div style="margin-top: 20px"></div>
<?
include ("blocks/content.php");
//<!-- ������ -->
include ("blocks/footer.php");?>
