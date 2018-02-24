<?
include ("blocks/header.php");?>
<!-- Левое меню -->
<li><a href="tours.php">Поиск туров</a></li>
<li><a href="countries.php">Каталог отелей</a></li>
<li><a href="contrystudy.php">Страноведение</a></li>
<?//<!-- Левое меню -->
$sec=2;$t_sec = "WHERE sec=".$sec; $file = "tours.php"; $h1=FALSE;
//include ("blocks/lefttd.php");
//<!-- Верхнее меню -->
include ("blocks/middle.php");?>
<!-- Контент -->
<form name="search" id="search" method="post">
        <table cellSpacing="0" cellPadding="0" border="0" ID="Table1">
                <tr vAlign="bottom">
                        <td height="14"><IMG height="3" src="tours/Images/bg12.gif" width="15" border="0"></td>
                        <td style="BACKGROUND: url(tours/Images/bg13.gif) repeat-x left bottom"><span class="h1"><IMG height="7" src="tours/Images/ic1.gif" width="7" border="0">&nbsp;&nbsp;ПОИСК ЦЕН</span></td>
                        <td><IMG height="3" src="tours/Images/bg14.gif" width="15" border="0"></td>
                </tr>
                <tr bgColor="#f4f4f4">
                        <td height="11"><IMG height="11" src="tours/Images/bg9.gif" width="15" border="0"></td>
                        <td><IMG height="1" src="tours/Images/e.gif" width="1" border="0"></td>
                        <td><IMG height="11" src="tours/Images/bg11.gif" width="15" border="0"></td>
                </tr>
                <tr vAlign="top">
                        <td width="15" style="BACKGROUND: url(tours/Images/bg4.gif) #f4f4f4 repeat-y left top"><img src="tours/Images/e.gif" width="15" height="1" border="0"></td>
                        <td bgColor="#f4f4f4">
                                <table id="Table2" cellSpacing="0" cellPadding="0" align="center" border="0">
                                        <tr width="800pt">
                                                <td valign="top">
                                                        <table>
                                                            <tr><td id="TourTypeComboBoxLabel"></td></tr>
                                                                <tr><td id="DepartureCityComboBoxLabel"></td></tr>
                                                                <tr class="betweenDepartureAndCountry"><td></td></tr>
                                                                <tr><td id="DestinationCountryComboBoxLabel"></td></tr>
                                                                <tr class="betweenCountryAndCities"><td></td></tr>
                                                                <tr><td id="DestinationCitiesListBoxLabel"></td></tr>

                                                        </table>
                                                </td>
                                                <td width="5"><IMG height="1" src="tours/Images/e.gif" width="5" border="0"></td>
                                                <td valign="top">
                                                        <table>
                                                                <tr>
                                                                        <td id="StarsListBoxLabel"></td>
                                                                        <td width="5"><IMG height="1" src="tours/Images/e.gif" width="5" border="0"></td>
                                                                        <td id="MealsListBoxLabel"></td>
                                                                </tr>
                                                        </table>
                                                        <table>
                                                                <tr height="7"><td></td></tr>
                                                                <tr><td id="HotelsListBoxLabel"></td></tr>
                                                        </table>
                                                </td>
                                                <td bordercolor=red align="left" width="5"><IMG height="1" src="tours/Images/e.gif" width="5" border="0"></td>
                                                <td valign="top" align="left" width="295px">
                                                        <div>Дата заезда c:&nbsp;&nbsp;&nbsp;<input name="DateFromTextBox" id="DateFromTextBox" class="date-from-text" onchange="ChangeFirstDate()"/><img id="DateFromImage" src="tours/Images/calendar.gif" style="CURSOR:pointer" alt="Открыть календарь" />&nbsp;&nbsp;&nbsp;по:&nbsp;&nbsp;&nbsp;<input name="DateToTextBox" id="DateToTextBox" class="date-to-text" /><img id="DateToImage" src="tours/Images/calendar.gif" style="CURSOR:pointer" alt="Открыть календарь" /></div>
                                                        <br/>
                                                        <div style="float:left;">Цена от:&nbsp;&nbsp;&nbsp;<input name="PriceFromTextBox" id="PriceFromTextBox" class="price-from-text" />&nbsp;до:&nbsp;<input name="PriceToTextBox" id="PriceToTextBox" class="price-to-text" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                        <div align="left" id="CurrencyComboBoxLabel"></div>
                                                        <br/>
                                                        <div>Ночей от:&nbsp;&nbsp;&nbsp;<input name="NightsFromTextBox" id="NightsFromTextBox" class="nights-from-text" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;до:&nbsp;&nbsp;&nbsp;<input name="NightsToTextBox" id="NightsToTextBox" class="nights-to-text" /></div>
                                                        <br/>
                                                        <div>Взрослые:&nbsp;&nbsp;&nbsp;<input name="AdultTextBox" id="AdultTextBox" class="adult-text" />&nbsp;&nbsp;&nbsp;Дети:&nbsp;&nbsp;&nbsp;<input name="ChildTextBox" id="ChildTextBox" class="child-text" /></div>
                                                        <br/>
                                                        <div align="right"><a href="javascript:OpenResults()"><IMG height="18" alt="ИСКАТЬ" src="tours/Images/button_search.gif" width="58" border="0"></a></div>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td colspan="8" align="right">
                                                        <div id="WaitingControl"><img src="tours/Images/snake.gif" alt=""/></div>
                                                </td>
                                        </tr>
                                </table>
                        </td>
                        <td width="15" style="BACKGROUND: url(tours/Images/bg5.gif) #f4f4f4 repeat-y left top"><img src="tours/Images/e.gif" width="15" height="1" border="0"></td>
                </tr>
                <tr bgColor="#f4f4f4">
                        <td height="14"><img src="tours/Images/bg6.gif" width="15" height="14" border="0"></td>
                        <td style="BACKGROUND: url(tours/Images/bg8.gif) #f4f4f4 repeat-x left top"><img src="tours/Images/e.gif" width="1" height="1" border="0"></td>
                        <td><IMG height="14" src="tours/Images/bg7.gif" width="15" border="0"></td>
                </tr>
        </table>
</form>
<script>
        function onloadwindow()
        {
                onloadSearchForm();
        }
</script>

<!-- Контент -->
<div style="margin-top: 20px"></div>
<?
include ("blocks/content.php");
//<!-- Подвал -->
include ("blocks/footer.php");?>