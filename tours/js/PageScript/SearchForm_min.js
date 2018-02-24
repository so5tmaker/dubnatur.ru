
var DepartureCityComboBox;
var DestinationCountryComboBox;
var DestinationCitiesListBox;

function OnSelectDestinationCountryMin(value)
{
	selectedDestinationCountryId = value;
	switch(interrelationshipsOfDepartureCitiesAndDestinationCountries)
	{
		case "DepartureCitiesDependsOnDestinationCountries":
			LoadDepartureCitiesByDestinationCountry(selectedDestinationCountryId, selectedTourTypeId, LoadDepartureCities_callback);
			break;    
		default:

	}
}

function onloadSearchForm_min()
{
	ToggleWaitBox("show");
	DepartureCityComboBox = new ComboBox("DepartureCityComboBox", document.getElementById("DepartureCityComboBoxLabel"));
	DepartureCityComboBox.onChangeSelected = OnSelectDepartureCity;
	DestinationCountryComboBox = new ComboBox("DestinationCountryComboBox", document.getElementById("DestinationCountryComboBoxLabel"));
	DestinationCountryComboBox.onChangeSelected = OnSelectDestinationCountryMin;

	switch(interrelationshipsOfDepartureCitiesAndDestinationCountries)
	{
		case "NoInterrelationships":
			LoadDepartureCities(selectedTourTypeId, LoadDepartureCities_callback);
			LoadDestinationCountries(selectedTourTypeId, LoadDestinationCountries_callback);
			break;    
		case "DestinationCountriesDependsOnDepartureCities":
			LoadDepartureCities(selectedTourTypeId, LoadDepartureCities_callback);
			break;
		default:
			LoadDestinationCountries(selectedTourTypeId, LoadDestinationCountries_callback);
	}

	ToggleWaitBox("hide");
}
function onloadSearchForm()
{
	ToggleWaitBox("show");
	DepartureCityComboBox = new ComboBox("DepartureCityComboBox", document.getElementById("DepartureCityComboBoxLabel"));
	DepartureCityComboBox.onChangeSelected = OnSelectDepartureCity;
	DestinationCountryComboBox = new ComboBox("DestinationCountryComboBox", document.getElementById("DestinationCountryComboBoxLabel"));
	DestinationCountryComboBox.onChangeSelected = OnSelectDestinationCountryMin;

	switch(interrelationshipsOfDepartureCitiesAndDestinationCountries)
	{
		case "NoInterrelationships":
			LoadDepartureCities(selectedTourTypeId, LoadDepartureCities_callback);
			LoadDestinationCountries(selectedTourTypeId, LoadDestinationCountries_callback);
			break;
		case "DestinationCountriesDependsOnDepartureCities":
			LoadDepartureCities(selectedTourTypeId, LoadDepartureCities_callback);
			break;
		default:
			LoadDestinationCountries(selectedTourTypeId, LoadDestinationCountries_callback);
	}

	ToggleWaitBox("hide");
}
function OpenResults()
{
	var object = AJS.formContents(document.forms["search"]);
	var queryString = "";
	queryString += "?DepCityId=" + object.DepartureCityComboBox_hidden+ "";
	queryString += "&DestCountryId=" + object.DestinationCountryComboBox_hidden+ "";
	window.open(searchPage + queryString);
}
function OpenResultsHere()
{
	var object = AJS.formContents(document.forms["search"]);
	var queryString = "";
        queryString += "?DepCityId=" + object.DepartureCityComboBox_hidden+ "";
	queryString += "&DestCountryId=" + object.DestinationCountryComboBox_hidden+ "";
	window.open(searchPageHere + queryString);
        //win = document.getElementByName('echo');
        //e = document.body.childNodes.length;
        //"http-equiv='Refresh' content='0; URL=" + searchPageHere + queryString;
        //win = document.getElementById('echo');
        //win = window.open("","","page");
        //win.document.write(page);
        //win.innerHTML = searchPageHere + queryString;
        //win.innerHTML = "<meta http-equiv='Refresh' content='0; URL=" + searchPageHere + queryString + ">";
        //win.document.write("</head><body>");
        //win.document.write("</body></html>");
}
function OpenResultsHere()
{
	var object = AJS.formContents(document.forms["search"]);
	var queryString = "";
        queryString += "?DepCityId=" + object.DepartureCityComboBox_hidden+ "";
	queryString += "&DestCountryId=" + object.DestinationCountryComboBox_hidden+ "";
	window.open(searchPageHere + queryString);
        //win = document.getElementByName('echo');
        //e = document.body.childNodes.length;
        //"http-equiv='Refresh' content='0; URL=" + searchPageHere + queryString;
        //win = document.getElementById('echo');
        //win = window.open("","","page");
        //win.document.write(page);
        //win.innerHTML = searchPageHere + queryString;
        //win.innerHTML = "<meta http-equiv='Refresh' content='0; URL=" + searchPageHere + queryString + ">";
        //win.document.write("</head><body>");
        //win.document.write("</body></html>");
}
function OpenResultsTicket()
{
	var object = AJS.formContents(document.forms["search"]);
	var queryString = "";
        queryString += "?DepCityId=" + object.DepartureCityComboBox_hidden+ "";
	queryString += "&DestCountryId=" + object.DestinationCountryComboBox_hidden+ "";
	window.open("http://dubnatur.site11.com/tours.php" + queryString);
}
function OpenResultsTicketRU()
{
	var object = AJS.formContents(document.forms["search"]);
	var queryString = "";
        queryString += "?DepCityId=" + object.DepartureCityComboBox_hidden+ "";
	queryString += "&DestCountryId=" + object.DestinationCountryComboBox_hidden+ "";
	window.open("http://dubnatur.ru/tours.php" + queryString);
}