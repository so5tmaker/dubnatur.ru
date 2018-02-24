
var security = null;
var priceObject = null;
try {priceObject = new Price(remoteUri + "/Price.ashx");} catch(e) {}
var uniqueID = "";
var PageNumber = 1;
var TotalCountPage = 1;
var prices = [];
var pricesById = [];
var fullprice = null;
var actualprice = null;
var error = null;
var searchFilter;

function actualPrice(priceId, callback)
{
	function actualPrice_callback(response)
	{
		if (typeof(response.error) == "undefined")
		{
			actualprice = response.result;
			error = null;
		}
		else
		{
			actualprice = null;
			error = response.error.message;
		}
		callback();
	}

	if (!priceObject)
	{
		callback();
		return;
	}
	priceObject.getActualization(priceId, actualPrice_callback);
}

function loadPrice(dictionary, callback)
{
	var priceId = strToInt(dictionary.priceId_sm);
	var currencyId = strToInt(dictionary.currencyId_sm);

	function loadPrice_callback(response)
	{
		if (response.error == null)
		{
			fullprice = response.result;
		}
		else
		{
			requestResultMessage = response.error.message;
			if (requestResultMessage != null)
			{
				var documentElementRef = document.getElementById("requestResultMessage");
				if (documentElementRef != null)
				{
					documentElementRef.style.display = "inline";
					documentElementRef.innerHTML = requestResultMessage;
				}
			}
		}
		callback();
	}

	if (!priceObject)
	{
		callback();
		return;
	}
	priceObject.getPriceByPriceIdAndCurrencyId(priceId, currencyId, loadPrice_callback);
}

function nextPage(callback)
{
	function nextPage_callback(response)
	{
		if (typeof(response.error) == "undefined")
		{
			prices = response.result.prices;
			uniqueID = response.result.guid;
			TotalCountPage = response.result.totalCountPage;
			PageNumber++;
			error = null;
		}
		else
		{
			prices = null;
			error = response.error.message;
		}
		callback();
	}
	priceObject.getPage(uniqueID, PageNumber + 1, PriceCountPerPage, nextPage_callback);
}

function prevPage(callback)
{
	function prevPage_callback(response)
	{
		if (typeof(response.error) == "undefined")
		{
			prices = response.result.prices;
			uniqueID = response.result.guid;
			TotalCountPage = response.result.totalCountPage;
			PageNumber--;
			error = null;
		}
		else
		{
			prices = null;
			error = response.error.message;
		}
		callback();
	}
	priceObject.getPage(uniqueID, PageNumber - 1, PriceCountPerPage, prevPage_callback);
}

function searchPrices(dictionary, callback)
{
	function searchPrices_callback(response)
	{
		if (response.error != "null" && response.result != null)
		{
			prices = response.result.prices;
			createPricesById();
			uniqueID = response.result.guid;
			TotalCountPage = response.result.totalCountPage;
			PageNumber = 1;
			error = null;
		}
		else if(response.error != null)
		{
			prices = null;
			error = response.error.message;
		}
		else
		{
			prices = null;
			error = "ѕо данному запросу не найдено ни одной цены. ѕопробуйте изменить параметры поиска.";
		}
		callback();
	}

	if ((dictionary == null) || (dictionary == "undefined" ) || (!priceObject))
	{
		callback();
		return;
	}
	searchFilter = new SearchFilter();

	if (typeof(dictionary.departureCity_sm) != "undefined") {searchFilter.departureCity = strToInt(dictionary.departureCity_sm)};
	if (typeof(dictionary.destinationCountry_sm) != "undefined") {searchFilter.destinationCountry = strToInt(dictionary.destinationCountry_sm)};
	if (typeof(dictionary.meals_sm) != "undefined") {searchFilter.meals = strToIntArray(dictionary.meals_sm)};
	if (typeof(dictionary.stars_sm) != "undefined") {searchFilter.stars = strToIntArray(dictionary.stars_sm)};
	if (typeof(dictionary.hotels_sm) != "undefined") {searchFilter.hotels = strToIntArray(dictionary.hotels_sm)};
	if (typeof(dictionary.destinationCities_sm) != "undefined") {searchFilter.destinationCities = strToIntArray(dictionary.destinationCities_sm)};
	if (typeof(dictionary.adultsCount_sm) != "undefined") {searchFilter.adultsCount = strToInt(dictionary.adultsCount_sm)};
	if (typeof(dictionary.childrenCount_sm) != "undefined") {searchFilter.childrenCount = strToInt(dictionary.childrenCount_sm)};
	if (typeof(dictionary.nightsFrom_sm) != "undefined") {searchFilter.nightsFrom = strToInt(dictionary.nightsFrom_sm)};
	if (typeof(dictionary.nightsTo_sm) != "undefined") {searchFilter.nightsTo = strToInt(dictionary.nightsTo_sm)};
	if (typeof(dictionary.checkinDateFrom_sm) != "undefined") {searchFilter.checkinDateFrom = Date.fromFormatString(dictionary.checkinDateFrom_sm).toShortUTCString()};
	if (typeof(dictionary.checkinDateTo_sm) != "undefined") {searchFilter.checkinDateTo = Date.fromFormatString(dictionary.checkinDateTo_sm).toShortUTCString()};
	if (typeof(dictionary.costFrom_sm) != "undefined") {searchFilter.costFrom = strToInt(dictionary.costFrom_sm)};
	if (typeof(dictionary.costTo_sm) != "undefined") {searchFilter.costTo = strToInt(dictionary.costTo_sm)};
	if (typeof(dictionary.currency_sm) != "undefined") {searchFilter.currency = strToInt(dictionary.currency_sm)};
    if (typeof(dictionary.gtt_sm) != "undefined") {searchFilter.globalTourType = strToInt(dictionary.gtt_sm)};
    if (typeof(dictionary.spoId_sm) != "undefined") {searchFilter.spoId = strToInt(dictionary.spoId_sm)};
    
	searchFilter.operators = getOperators(searchFilter.destinationCountry);
	searchFilter.hideToursWithUncountedFlights = hideToursWithUncountedFlights;

	priceObject.searchFirstPage(searchFilter, PriceCountPerPage, searchPrices_callback);
}

// функци€ getOperators(destinationCountry)
// Parameters: [in] - destinationCountry, страна выбранна€ из выпадающего списка "Ќаправление" (переменна€ DestinationCountryComboBox)
// Returns: множество целых чисел (множество идентификаторов операторов)
// ќбща€ логика работы функции:
//    ≈сли страна (входной параметр функции - destinationCountry),
//    выбранна€ из выпадающего списка "Ќаправление" (переменна€ DestinationCountryComboBox),
//    присутствует в переменной OperatorCountry,
//    то функци€ вернет множество операторов (array) из переменной OperatorCountry, соответствующих этой стране.
//    ≈сли же выбранна€ из выпадающего списка страна отсутствует в переменной OperatorCountry,
//    то функци€ вернет множество операторов (array) из переменной IncludingFiltersOperators.
//    “о есть, дл€ стран, которые не указаны в переменной OperatorCountry,
//    поиск туров в эти страны будет осуществл€тьс€ среди операторов указанных в переменной IncludingFiltersOperators,
//    а дл€ стран, которые объ€влены в переменной OperatorCountry,
//    поиск туров в эти страны будет осуществл€тьс€ среди соответствующих этой стране операторов,
//    указанных в переменной OperatorCountry.

function getOperators(destinationCountry)
{
	var result = IncludingFiltersOperators;
	// —трана - операторы
	for (var i = 0; i < OperatorCountry.length; i++)
	{
		var pair = OperatorCountry[i];
		if (pair[0] == destinationCountry)
		{
			result = pair[1];
			break;
		}
	}
	return result;
}

function createPricesById()
{
    if(prices == null)
        return;
        
    for(var i=0;i<prices.length;i++)
    {
        pricesById[prices[i].id] = prices[i];
    }
}
