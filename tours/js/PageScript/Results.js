
var engine = new TemplateEngine();

function prevPageIcon()
{
	if (PageNumber>1)
		return "<a href=\"#\" onclick=\"getPrevPage();\"><img src=\"../Images/button_prev.gif\" border=\"0\" title=\"Предыдущая страница:" + (PageNumber -1)  + "\" vspace=\"0\" align=\"absBottom\"></a>";
	else return "&nbsp;";
}

function nextPageIcon()
{
	if (PageNumber < TotalCountPage)
		return "<a href=\"#\" onclick=\"getNextPage();\"><img src=\"../Images/button_next.gif\" border=\"0\" title=\"Следующая страница:" + (PageNumber+1) + "\" vspace=\"0\" align=\"absBottom\"></a>";
	else return "&nbsp;";
}

function actualizationIcon(priceId, flag)
{
	if (flag) {return "<a href=\"#\" onclick=\"javascript:actualization(" + priceId + ");\"></span><img src=\"../Images/ic_actual.gif\" border=\"0\" title=\"Актуализация цены\" vspace=\"0\" align=\"absBottom\"></a>"};
}

function operatorPrice(cost, rurPrice)
{
    if (rurPrice == '0,00' || dictionary["currency_sm"] != "4")
    {
        return PriceCorrectionFun(cost);
    }
    return "<span style=\"color:Red; font-style:oblique\">*</span>"+ PriceCorrectionFun(cost);
}


function detailsIcon(priceId)
{
	return "<a href=\"#\" onclick=\"javascript:openPrice(" + priceId + ");\"><img src=\"../Images/ic_information.gif\" border=\"0\" title=\"Детальная информация по цене\" vspace=\"0\" align=\"absBottom\"></a>"
}

function callbackAfterLoadData()
{
	var span = document.getElementById("WaitingControl");
	engine.run();
	var e = document.getElementById("requestResultMessage");
	if (prices == null)
	{
		if(error != null && error != "")
			e.innerHTML = error;
		else
			e.innerHTML = "По данному запросу не найдено ни одной цены. Попробуйте изменить параметры поиска.";
	}
	else
	{
		if (prices.length == 0)
		{
			e.innerHTML = "Не найдено ни одной цены. Попробуйте расширить параметры поиска тура.";
		}
	}
	span.style.display = "none";
}

var dictionary;
function onloadResults()
{
	var screenWidth = 640, screenHeight = 480;
	if (parseInt(navigator.appVersion) > 3)
	{
		screenWidth = screen.availWidth;
		screenHeight = screen.availHeight;
		
		if ((hotelPageMaximized == "true") || (hotelPageMaximized == true))
		{
			hotelPageWidth = screenWidth;
			hotelPageHeight = screenHeight;
		}
		
		if ((viewPageMaximized == "true") || (viewPageMaximized == true))
		{
			viewPageWidth = screenWidth;
			viewPageHeight = screenHeight;
		}
	}
	dictionary = CreateDictionaryFromQueryString();
	if ((resultsPageShouldBeResized == "true") || (resultsPageShouldBeResized == true))
	{
		var windowWidth = dictionary.windowWidth_sm, windowHeight = dictionary.windowHeight_sm;
		if (windowWidth != null && windowHeight != null)
		{
			window.resizeTo(windowWidth, windowHeight)
			window.moveTo(0, 0);
		}
	}
	var span = document.getElementById("WaitingControl");
	span.style.display = "";
	
	var documentElementRef = document.getElementById("disclaimer");
	var currency;
	if (typeof(dictionary.currency_sm) != "undefined") {currency = strToInt(dictionary.currency_sm)};
	if (currency == 4)
	{
	    if (documentElementRef != null)
	    {
	        documentElementRef.style.display = "";
	    }
	}
	
	searchPrices(dictionary, callbackAfterLoadData);
}

function getHotelLink(hotel)
{
	var targetAttribute;
	if((openHotelPageInNewWindow == true) || (openHotelPageInNewWindow == "true"))
	{
		targetAttribute = "_blank";
	}
	else
	{
		targetAttribute = "_self";
	}
	var queryString = "";
	queryString += "?hotelId_sm=" + hotel.id;
	queryString += "&itemName_sm=" + "";
	queryString += "&windowWidth_sm=" + hotelPageWidth;
	queryString += "&windowHeight_sm=" + hotelPageHeight;
	var href = "<a target=\"" + targetAttribute + "\" href=\"" + hotelPage + queryString + "\">" + hotel.russianName + "</a>";
	return href;
}

function openPrice(priceId)
{
	if (priceId > 0)
	{
		var currencyId = dictionary.currency_sm;
		var queryString = "";
		queryString += "?priceId_sm=" + priceId;
		queryString += "&currencyId_sm=" + getPriceCurrency(priceId);
		queryString += "&windowWidth_sm=" + viewPageWidth;
		queryString += "&windowHeight_sm=" + viewPageHeight;
		windowOpen(viewPage + queryString, viewPageWidth, viewPageHeight, openViewPageInNewWindow);
	}
}

function getPriceCurrency(priceId)
{
    if(typeof(currencyId) != "undefined")
    {
        return currencyId;
    }
    else
    {
        return pricesById[priceId].operatorCurrency.id;
    }
}

function getNextPage()
{
	var span = document.getElementById("WaitingControl");
	span.style.display = "";
	nextPage(callbackAfterLoadData);
}

function getPrevPage()
{
	var span = document.getElementById("WaitingControl");
	span.style.display = "";
	prevPage(callbackAfterLoadData);
}

function actualization(priceId)
{
	if (priceId > 0) 
	{
		var queryString = "";
		queryString += "?priceId_sm=" + priceId;
		GB_showCenter("Актуализация цены", actualPage + queryString, 350, 650, null);
	}
}