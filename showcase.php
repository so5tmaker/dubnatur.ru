<?include ("blocks/header.php");?>
<!-- Левое меню -->
<li><a href="showcase.php?columns_sm=7&rows_sm=1&textPosition_sm=bottom">Витрина туров</a></li>
<?$sec=7;$t_sec = "WHERE sec=".$sec; $file = "showcase.php"; $h1=FALSE;?>
<!-- Верхнее меню -->
<?include ("blocks/middle.php");?>
<!-- Контент -->
<div id="ShowcaseWaitBox">
        <img src="tours/Images/snake.gif" alt="" width="16" height="16" />
        Идет загрузка ...</div>
<table id="Showcase">
        <tr>
                <td id="showcaseFirstElement" class="showcaseFirstElement">
                </td>
        </tr>
</table>
<div id="Tour" class="Tour">
        <div id="showcaseImageDiv" class="showcaseImageDivClass">
                <a class="anchorPrice" href="">
                        <img class="image" border="0" src="" /></a>
        </div>
        <div id="showcaseTextDiv" class="showcaseTextDivClass">
                <span class="destinationCountry"></span>
                <br>
                <a class="anchorPrice" style="color: red"><span class="price"></span></a>
                <br>
                Отель: <a class="anchorHotel"><span class="hotel"></span></a>
                <br>
                Вылет: <span class="departureDate"></span>
                <br>
                Ночей: <span class="duration"></span>
                <br>
                Туристов: <span class="touristsCount"></span>
                <br>
        </div>
</div>
<script>
                function onloadwindow()
                {
                        SetupShowcase();
                }
</script>
<div style="margin-top: 20px"></div>
<?
include ("blocks/content.php");
//<!-- Подвал -->
include ("blocks/footer.php");?>
