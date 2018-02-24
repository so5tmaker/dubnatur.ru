
var showcaseCurrencyId = DefaultCurrency;
var imageMaxWidth = "110px", imageMaxHeight = "90px";
var imageBorderWidth = "1px";
var imageMargin = "2px";
var textMaxWidth = "110px";
var textBorderWidth = "1px";
var textMargin = "2px";
var priceRepresentation = "PricePerRoom"; //"PricePerPerson" - для показа цен на человека
var textPosition = "bottom";
// Число столбцов в витрине
var ShowcaseWidth = 3;
// Число строк в витрине
var ShowcaseHeight = 3;
var Showcase;
var imageDefaultSrc = "../Images/showcaseDefault.jpg"; //Картинка по умолчанию

// Если витрина встраивается в страницу, которая находится не в каталоге "Html" модуля,
// то придется переопределить пути относительно текущей страницы.
//var viewPage = "../Html/PriceDetails.htm"; /* форма просмотра цены */
//var hotelPage = "../Html/HotelDetails.htm"; /* форма с подробностями об отеле */

function SetupShowcase(destinationCountry, departureCity)
{
	/* 
	*       Настройки витрины туров
	*
	*	Обязательные поля для заполнения помечены звездочкой.
	*/

	// Массив элементов витрины - поисковых фильтров
	var se1 = new ShowcaseElement();
	//* Страна
	se1.destinationCountry = destinationCountry;
	//* Дата вылета, задается в виде диапазона (в данном примере: начало тура от завтра + 7 дней)
	// Количество дней относительно сегодняшнего
	se1.departureDateFromNowCount = 1;
	//* Количество дней от departureDateFromNowCount
	se1.departureDateCount = 7;
	//* Город вылета
	se1.departureCity = departureCity;
	//* Количество взрослых
	se1.adult = 2;
	// Количество детей
	se1.child = 0;
	//* Количество туров по этому запросу, которые будут отображены
	se1.positionCount = 3;
	// true = удалить из результата повторяющиеся отели
	se1.filtrateIdenticalHotels = true;
	// Города назначения
	se1.destinationCities = [];
	// Отели - в данном варианте фильтр на отели закомментирован (отключен)
	//se1.hotels = [871,1004,3458,3811,5002,5426,5703,6970,7544,7688,9284,9310,9723,9724,9725,9727,10034,10610,10630,10642,11388,10232,11616,13269,13270,13295,13405,34445];
	// Звездности
	se1.stars = [];
	// Продолжительность, ночей 
	// От
	se1.nightsFrom = 7;
	// До
	se1.nightsTo = 15;
	// Валюта
	//se1.currency = 1;
	// Цена
	// От
	//se1.priceFrom = 500;
	// До
	//se1.priceTo = 1500;
	// Операторы
	//se1.operatorIds = [];

		// Массив, содержащий все поисковые запросы
	Showcase = [se1];

	/* 
	*
	*       Конец настроек витрины туров
	*
	*/
					
	var columns = dictionary.columns_sm, rows = dictionary.rows_sm;
	if (columns != null && rows != null)
	{
		ShowcaseWidth = columns;
		ShowcaseHeight = rows;
	}
	var textPositionFromQueryString = dictionary.textPosition_sm;
	if (textPositionFromQueryString != null)
	{
		textPosition = textPositionFromQueryString;
	}
	var documentElementRef;
	if (textPosition != "bottom")
	{
		documentElementRef = document.getElementById("showcaseImageDiv");
		if (documentElementRef != null)
		{
			documentElementRef.style.width = imageMaxWidth;
			documentElementRef.style.borderWidth = imageBorderWidth;
			documentElementRef.style.margin = imageMargin;
		}
		documentElementRef = document.getElementById("showcaseTextDiv");
		if (documentElementRef != null)
		{
			documentElementRef.style.width = textMaxWidth;
			documentElementRef.style.borderWidth = textBorderWidth;
			documentElementRef.style.margin = textMargin;
		}
		documentElementRef = document.getElementById("Tour");
		if (documentElementRef != null)
		{
			var pixelWidth = strToInt(imageMaxWidth) + strToInt(textMaxWidth) + (strToInt(imageBorderWidth) + strToInt(imageMargin) + strToInt(textBorderWidth) + strToInt(textMargin)) * 2;
			documentElementRef.style.pixelWidth = pixelWidth;
			documentElementRef.style.width = pixelWidth + "px";
		}
	}
	else
	{
		documentElementRef = document.getElementById("showcaseImageDiv");
		if (documentElementRef != null)
		{
			documentElementRef.style.float = "none";
			documentElementRef.style.width = imageMaxWidth;
			documentElementRef.style.borderWidth = imageBorderWidth;
			documentElementRef.style.margin = imageMargin;
		}
		documentElementRef = document.getElementById("showcaseTextDiv");
		if (documentElementRef != null)
		{
			documentElementRef.style.float = "none";
			documentElementRef.style.width = imageMaxWidth;
			documentElementRef.style.borderWidth = textBorderWidth;
			documentElementRef.style.margin = textMargin;
		}
		documentElementRef = document.getElementById("Tour");
		if (documentElementRef != null)
		{
			var pixelWidth = strToInt(imageMaxWidth) + (strToInt(imageBorderWidth) + strToInt(imageMargin)) * 2;
			documentElementRef.style.pixelWidth = pixelWidth;
			documentElementRef.style.width = pixelWidth + "px";
		}
	}
	GetShowcase();
}