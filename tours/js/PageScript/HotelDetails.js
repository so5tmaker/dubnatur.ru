
var DepartureCityComboBox;
var CurrencyComboBox;
var newWindowInAnchor;
var countriesListPageTargetAttribute;
var citiesListPageTargetAttribute;
var hotelsListPageTargetAttribute;
var screenWidth = 640, screenHeight = 480;
var requestResultMessage;
var dictionary;
var hotelId;
if (parseInt(navigator.appVersion) > 3)
{
	screenWidth = screen.availWidth;
	screenHeight = screen.availHeight;
	
	if ((countriesListPageMaximized == "true") || (countriesListPageMaximized == true))
	{
		countriesListPageWidth = screenWidth;
		countriesListPageHeight = screenHeight;
	}
	if ((citiesListPageMaximized == "true") || (citiesListPageMaximized == true))
	{
		citiesListPageWidth = screenWidth;
		citiesListPageHeight = screenHeight;
	}
	if ((hotelsListPageMaximized == "true") || (hotelsListPageMaximized == true))
	{
		hotelsListPageWidth = screenWidth;
		hotelsListPageHeight = screenHeight;
	}
	if ((satellitePicturePageMaximized == "true") || (satellitePicturePageMaximized == true))
	{
		satellitePicturePageWidth = screenWidth;
//		satellitePicturePageHeight = screenHeight;
	}
	if ((resultsPageMaximized == "true") || (resultsPageMaximized == true))
	{
		resultsPageWidth = screenWidth;
		resultsPageHeight = screenHeight;
	}
}

function onloadHotelDetails()
{
	dictionary = CreateDictionaryFromQueryString();
	if ((hotelPageShouldBeResized == "true") || (hotelPageShouldBeResized == true))
	{
		var windowWidth = dictionary.windowWidth_sm, windowHeight = dictionary.windowHeight_sm;
		if (windowWidth != null && windowHeight != null)
		{
			window.resizeTo(windowWidth, windowHeight)
			window.moveTo(0, 0);
		}
	}
	if (showExternalHotelReferences.toLowerCase() == "true".toLowerCase())
	{
		var externalHotelSourcesTableRef = document.getElementById("externalHotelSourcesTable");
		if (externalHotelSourcesTableRef != null)
		{
			externalHotelSourcesTableRef.style.display="";
		}
	}

	var itemName;
	newWindowInAnchor = dictionary.newWindowInAnchor_sm;
	if (newWindowInAnchor == null)
	{
		countriesListPageTargetAttribute = openCountriesInNewWindow;
		citiesListPageTargetAttribute = openCitiesInNewWindow;
		hotelsListPageTargetAttribute = openHotelsInNewWindow;
	}
	else
	{
		countriesListPageTargetAttribute = newWindowInAnchor;
		citiesListPageTargetAttribute = newWindowInAnchor;
		hotelsListPageTargetAttribute = newWindowInAnchor;
	}
	countriesListPageTargetAttribute = openCountriesInNewWindow;
	citiesListPageTargetAttribute = openCitiesInNewWindow;
	hotelsListPageTargetAttribute = openHotelsInNewWindow;
	if (dictionary.itemName_sm != null)
	{
		itemName = unescape(dictionary.itemName_sm);
	}
	if (itemName == null)
	{
		itemName = "";
	}
	$("#PageTitle").html(itemName);

	hotelId = dictionary.hotelId_sm;
	if (hotelId == null) hotelId = 3617;
	if (interrelationshipsOfDepartureCitiesAndDestinationCountries == "DestinationCountriesDependsOnDepartureCities")
	{
		interrelationshipsOfDepartureCitiesAndDestinationCountries = "DepartureCitiesDependsOnDestinationCountries";
	}
	getHotelDescription(hotelId, getHotelDescription_callback);

	DepartureCityComboBox = new ComboBox("DepartureCityComboBox", document.getElementById("DepartureCityComboBoxLabel"));
	CurrencyComboBox = new ComboBox("CurrencyComboBox", document.getElementById("CurrencyComboBoxLabel"));

	SetupCalendar("DateFromTextBox", "DateFromImage");
	SetupCalendar("DateToTextBox", "DateToImage");

	document.getElementById("DateFromTextBox").value = BeginDate.toFormatString();
	document.getElementById("DateToTextBox").value = EndDate.toFormatString();

	setValuetoField("AdultTextBox", AdultCount);
	setValuetoField("ChildTextBox", ChildCount);
	setValuetoField("PriceFromTextBox", BeginCost);
	setValuetoField("PriceToTextBox", EndCost);
	setValuetoField("NightsFromTextBox", BeginNights);
	setValuetoField("NightsToTextBox", EndNights);
	
	LoadCurrencies(Currencies, LoadCurrencies_callback);
}

function getHotelDescription_callback()
{
	if (HotelDescription != null)
	{
		var currentCountry = HotelDescription.hotel.country.id;
		selectedDestinationCountryId = currentCountry;
		
		if(HotelDescription.hasVirtualTours)
		{
		    var lnkHotelPanoramas = document.getElementById("lnkHotelPanoramas");
		    var rowHotelPanoramasLink = document.getElementById("rowHotelPanoramasLink");

		    rowHotelPanoramasLink.style.display = "";
		    lnkHotelPanoramas.href = "HotelPanoramas.htm?hotelId=" + HotelDescription.hotel.id;
		}
		
		switch(interrelationshipsOfDepartureCitiesAndDestinationCountries)
		{
			case "NoInterrelationships":
				LoadDepartureCities(selectedTourTypeId, LoadDepartureCities_callback);
				break;    
			default:
				LoadDepartureCitiesByDestinationCountry(selectedDestinationCountryId, selectedTourTypeId, LoadDepartureCities_callback);
		}
		var currentCity = HotelDescription.hotel.city.id;
		var countryName = HotelDescription.hotel.country.russianName;
		var cityName = HotelDescription.hotel.city.russianName;
		var itemName = HotelDescription.hotel.russianName;
		$("#PageTitle").html(itemName);
		var showNavigationBar = dictionary.showNavigationBar_sm;
		if (showNavigationBar == "true")
		{
			var queryString = "";
			queryString += "?newWindowInAnchor_sm=" + countriesListPageTargetAttribute;
			queryString += "&windowWidth_sm=" + countriesListPageWidth;
			queryString += "&windowHeight_sm=" + countriesListPageHeight;
			queryString = escape(queryString);
			var navigationBar = getReference("javascript:windowOpen(\"" + countriesListPage + queryString + "\", " + countriesListPageWidth + ", " + countriesListPageHeight + ", \"" + countriesListPageTargetAttribute + "\")", "[вернутьс€ к списку стран]", "", "", "_self");
			queryString = "";
			queryString += "?country_sm=" + currentCountry;
			queryString += "&itemName_sm=" + countryName;
			queryString += "&newWindowInAnchor_sm=" + citiesListPageTargetAttribute;
			queryString += "&windowWidth_sm=" + citiesListPageWidth;
			queryString += "&windowHeight_sm=" + citiesListPageHeight;
			queryString = escape(queryString);
			navigationBar += " | " + getReference("javascript:windowOpen(\"" + citiesListPage + queryString + "\", " + citiesListPageWidth + ", " + citiesListPageHeight + ", \"" + citiesListPageTargetAttribute + "\")", countryName, "", "", "_self");
			queryString = "";
			queryString += "?country_sm=" + currentCountry;
			queryString += "&countryName_sm=" + countryName;
			queryString += "&city_sm=" + currentCity;
			queryString += "&itemName_sm=" + cityName;
			queryString += "&newWindowInAnchor_sm=" + hotelsListPageTargetAttribute;
			queryString += "&windowWidth_sm=" + hotelsListPageWidth;
			queryString += "&windowHeight_sm=" + hotelsListPageHeight;
			queryString = escape(queryString);
			navigationBar += " | " + getReference("javascript:windowOpen(\"" + hotelsListPage + queryString + "\", " + hotelsListPageWidth + ", " + hotelsListPageHeight + ", \"" + hotelsListPageTargetAttribute + "\")", cityName, "", "", "_self");
			$("#NavigationBar").html(navigationBar);
		}
		var engine = new TemplateEngine();
		engine.run();
	}
	else
	{
		if (requestResultMessage != null)
		{
			alert(requestResultMessage);
		}
	}
}

function LoadCurrencies_callback()
{
	RenderItemsComboBox(currenciesDS, CurrencyComboBox, []);
	/* ¬ыбираем валюту по умолчанию */
	CurrencyComboBox.setValue(selectedCurrencyId, false);
}

function OpenResults()
{
	if (HotelDescription != null)
	{
		var object = AJS.formContents(document.forms["search"]);
		object.DestinationCountryComboBox_hidden = HotelDescription.hotel.country.id.toString();
		object.DestinationCitiesListBox_hidden = HotelDescription.hotel.city.id.toString();
		object.HotelsListBox_hidden = HotelDescription.hotel.id.toString();
		object.MealsListBox_hidden = "";
		object.StarsListBox_hidden = "";
		var queryString = CreateQueryString(object);
		queryString += "&windowWidth_sm=" + resultsPageWidth + "";
		queryString += "&windowHeight_sm=" + resultsPageHeight + "";
		windowOpen(resultPage + queryString, resultsPageWidth, resultsPageHeight, openResultsPageInNewWindow);
	}
	else
	{
		if (requestResultMessage != null)
		{
			alert(requestResultMessage);
		}
	}
}

function showGallery()
{
	if (HotelDescription != null)
	{
		if (HotelDescription.imageCount > 0)
		{
			GB_showImageSet(getImageSet(), 1);
		}
	}
}

function GetSatellitePicturePageReference(hotelDescription)
{
	var href = "";
	if (hotelDescription != null)
	{
		if ((hotelDescription.latitude != 0) && (hotelDescription.longitude != 0))
		{
			href = getReference("javascript:OpenSatellitePicturePage(HotelDescription.hotel)", "ѕосмотреть на карте", "red", "none", "_self");
		}
	}
	return href;
}

function OpenSatellitePicturePage(hotel)
{
	var queryString = "";
	queryString += "?hotelId_sm=" + hotel.id + "";
	queryString += "&windowWidth_sm=" + satellitePicturePageWidth + "";
	queryString += "&windowHeight_sm=" + satellitePicturePageHeight + "";
	windowOpen(satellitePicturePage + queryString, satellitePicturePageWidth, satellitePicturePageHeight, openSatellitePicturePageInNewWindow);
}

function getAttribute(attribute)
{
	if (attribute.requiresPayment)
	{
		return "<span class=\"t_red\">" + attribute.name + "</span>";
	}
	else
	{
		return "<span>" + attribute.name + "</span>";
	}
}

function ShowAllComments()
{
	var element1 = document.getElementById("HotelCommentCell");
	element1.setAttribute("rowSpan","3");
	var element2 = document.getElementById("HotelDescriptionCell");
	element2.setAttribute("colSpan","2");
	var element3 = document.getElementById("HotelCommentDiv");
	element3.style.height = "100%";
}

function AddComment()
{
	var path = "http://bronni.ru/BlankPage.aspx?Page=AddHotelCommentPage.ascx&HotelId=" + hotelId + "&RemoveReturnBack=true";
	windowOpen(path, 800, 600, "true");
}
