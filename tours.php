<?
include ("blocks/header.php");?>
<!-- Левое меню -->
<li><a href="tours.php">Поиск туров</a></li>
<li><a href="countries.php">Каталог отелей</a></li>
<li><a href="contrystudy.php" target="_blank" >Страноведение</a></li>
<?//<!-- Левое меню -->
$sec=2;$t_sec = "WHERE sec=".$sec; $file = "tours.php"; $h1=FALSE;
//include ("blocks/lefttd.php");
//<!-- Верхнее меню -->
include ("blocks/middle.php");?>
<!-- Контент -->
<form name="search" id="search" method="post">
		<table cellspacing="0" cellpadding="0" width="100%" border="0">
			<tr valign="bottom">
				<td height="14">
					<img height="3" src="tours/Images/bg12.gif" width="15" border="0"></td>
				<td style="background: url(tours/Images/bg13.gif) repeat-x left bottom">
					<span class="h1">
						<img height="7" src="tours/Images/ic1.gif" width="7" border="0">&nbsp;&nbsp;ПОИСК ЦЕН</span></td>
				<td>
					<img height="3" src="tours/Images/bg14.gif" width="15" border="0"></td>
			</tr>
			<tr bgcolor="#f4f4f4">
				<td height="11">
					<img height="11" src="tours/Images/bg9.gif" width="15" border="0"></td>
				<td>
					<img height="1" src="tours/Images/e.gif" width="1" border="0"></td>
				<td>
					<img height="11" src="tours/Images/bg11.gif" width="15" border="0"></td>
			</tr>
			<tr valign="top">
				<td width="15" style="background: url(tours/Images/bg4.gif) #f4f4f4 repeat-y left top">
					<img src="tours/Images/e.gif" width="15" height="1" border="0"></td>
				<td width="100%" bgcolor="#f4f4f4"><table id="Table2" cellspacing="0" cellpadding="0" align="center" border="0">
					<tr valign="top">
						<td width="5"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>
						<td id="DestinationCountryComboBoxLabel">&nbsp;Направление:<br/></td>
					<tr valign="top" colspan="2">
						<td>&nbsp;</td>
						<td id="DepartureCityComboBoxLabel">&nbsp;Город вылета:<br/></td>
						<td width="5" rowspan="2"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>
						<td id="TourTypeComboBoxLabel">&nbsp;Тип тура:<br/></td>
						<td width="5" rowspan="2"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>
					</tr>
	<tr>
		<td width="5" rowspan="2"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>
		<td id="DestinationCitiesListBoxLabel">&nbsp;Города:<br/></td>
		<td rowspan="1" id="StarsListBoxLabel">&nbsp;Звездность:<br/></td>
		<td rowspan="" id="MealsListBoxLabel">&nbsp;Питание:<br/></td>
		<td width="5"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>
		<td rowspan="" id="HotelsListBoxLabel">&nbsp;Отель:<br/></td>
		<td width="5"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>

	</tr>
	<tr>
		<td colspan="10"><img height="7" src="tours/Images/e.gif" width="1" border="0"></td>
	</tr>
	<tr valign="middle">
		<td colspan="5"> Продолжительность (ночей) от&nbsp;
			<input name="NightsFromTextBox" id="NightsFromTextBox" class="nights-from-text" />
			&nbsp;до&nbsp;
			<input name="NightsToTextBox" id="NightsToTextBox" class="nights-to-text" /></td>
			<td colspan="1" align="right">Взрослые:
			<input name="AdultTextBox" id="AdultTextBox" class="adult-text" />
			</td>
			<td width="5"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>
			<td colspan="1">
			&nbsp;&nbsp;Дети:
			<input name="ChildTextBox" id="ChildTextBox" class="child-text" />
			</td>
			<td width="5"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>
	</tr>
	<tr valign="middle">

	</tr>
	<tr>
		<td colspan="10"><img height="7" src="tours/Images/e.gif" width="1" border="0"></td>
	</tr>
	<tr valign="middle">
		<td colspan="5"> Дата заезда c&nbsp;
			<input name="DateFromTextBox" id="DateFromTextBox" class="date-from-text" onChange="ChangeFirstDate()" />
			<img id="DateFromImage" src="tours/Images/calendar.gif" style="cursor: pointer" alt="Открыть календарь" />&nbsp;по&nbsp;
			<input name="DateToTextBox" id="DateToTextBox" class="date-to-text" />
			<img id="DateToImage" src="tours/Images/calendar.gif" style="cursor: pointer" alt="Открыть календарь" /></td>
		<td colspan="1" align="right">Цена&nbsp;от&nbsp;&nbsp;&nbsp;&nbsp;
			<input name="PriceFromTextBox" id="PriceFromTextBox" class="price-from-text" />
		</td>
		<td width="5"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>
		<td colspan="1">&nbsp;&nbsp;&nbsp;&nbsp;до&nbsp;&nbsp;&nbsp;&nbsp;
			<input name="PriceToTextBox" id="PriceToTextBox" class="price-to-text" />
		</td>
		<td width="5"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>
	</tr>
	<tr>
		<td colspan="10"><img height="7" src="tours/Images/e.gif" width="1" border="0"></td>
	</tr>
	<tr>
		<td width="5"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>
		<td width="5"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>
		<td width="5"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>
		<td colspan="2" align="right"><div id="WaitingControl"> <img src="tours/Images/snake.gif" alt="" /></div></td>
		<td align="left">
			<div>
			<div style="float: right; padding-top: 2px"> <a href="javascript:OpenResults()"> <img height="18" alt="ИСКАТЬ" src="tours/Images/button_search.gif" width="58" border="0"></a> </div>
			</div>
		</td>
		<td width="5"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>
		<td align="center" id="CurrencyComboBoxLabel"></td>
		<td width="5"><img height="1" src="tours/Images/e.gif" width="5" border="0"></td>
	</tr>
				</table></td>
				<td width="15" style="background: url(tours/Images/bg5.gif) #f4f4f4 repeat-y left top">
					<img src="tours/Images/e.gif" width="15" height="1" border="0"></td>
			</tr>
			<tr bgcolor="#f4f4f4">
				<td height="14">
					<img src="tours/Images/bg6.gif" width="15" height="14" border="0"></td>
				<td style="background: url(tours/Images/bg8.gif) #f4f4f4 repeat-x left top">
					<img src="tours/Images/e.gif" width="1" height="1" border="0"></td>
				<td>
					<img height="14" src="tours/Images/bg7.gif" width="15" border="0"></td>
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