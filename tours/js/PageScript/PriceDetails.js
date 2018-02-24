
var Page_Validators;
var Page_ValidationActive;
var requestResultMessage;
var dictionary;

function ValidatorOnSubmit() 
{
	if (Page_ValidationActive) 
	{
		return ValidatorCommonOnSubmit();
	}
	return true;
}

function showmessage()
{
	var span = document.getElementById("WaitingControl");
	span.style.display = "none";
	var span = document.getElementById("BookingMessage");
	span.innerHTML = bookingMessage;
}

function send()
{
	if (fullprice != null)
	{
		var span = document.getElementById("WaitingControl");
		span.style.display = "";
		var priceId = strToInt(dictionary.priceId_sm);
		var managerEmail = getManagerEmail(countriesEmail, fullprice.price.country.id);
		var object = AJS.formContents(document.forms["booking"]);
		sendOrder(priceId, managerEmail, object, showmessage)
	}
	else
	{
		if (requestResultMessage != null)
		{
			alert(requestResultMessage);
		}
	}
}

function getDateByDay(day, diff)
{
	var date = Date.fromUTCString(fullprice.price.checkinDate);
	var d = date.getDate();
	date.setDate(d + day - 1 + diff);
	return date;
}

// Возвращает email назначенный группе стран в которую входит страна aCountry.
// Если страна aCountry не найдена ни в одной из групп стран, то функция возвращает значение переменной defaultManagerEmail.
function getManagerEmail (countriesEmail, aCountry)
{
	var managerEmail = "";
	var found = false;
	var countryList;
	for(var ii=0; ii<countriesEmail.length; ii++)
	{
		countryList = countriesEmail[ii].countryList
		for(var jj=0; jj<countryList.length; jj++)
		{
			if(aCountry == countryList[jj])
			{
				managerEmail = countriesEmail[ii].managerEmail;
				found = true;
				break;
			}
		}
		if(found)
		{
			break;
		}
	}
	if(!found)
	{
		managerEmail = defaultManagerEmail;
	}
	return managerEmail;
}

function loadPrice_callback()
{
	if (fullprice != null)
	{
		var engine = new TemplateEngine();
		engine.run();
		var documentElementRef;
		if (fullprice.price.operatorRURPrice != '0,00')
		{
			documentElementRef = document.getElementById("operatorRurPrice");
			if (documentElementRef != null)
			{
				documentElementRef.style.display = "";
			}
		}
		else 
		{
			documentElementRef = document.getElementById("referenceRurPrice");
			if (documentElementRef != null)
			{
				documentElementRef.style.display = "";
			}
		}
		
		if (fullprice.price.operatorCurrency.id != fullprice.convertedCurrency.id && fullprice.convertedCurrency.id != 4)
		{
			documentElementRef = document.getElementById("convertedPrice");
			if (documentElementRef != null)
			{
				documentElementRef.style.display = "";
			}
		}
		
		documentElementRef = document.getElementById("price");
		if (documentElementRef != null)
		{
			documentElementRef.style.display = "inline";
		}
		documentElementRef = document.getElementById("buttonSend");
		if (documentElementRef != null)
		{
			documentElementRef.style.display = "inline";
		}
	}
	var span = document.getElementById("WaitingLoading");
	span.style.display = "none";
}

function onloadPriceDetails()
{
	var span = document.getElementById("WaitingLoading");
	span.style.display = "";
	Page_Validators = new Array
		(
			document.all["NameRequiredFieldValidator"], 
			document.all["NameRegularExpressionValidator"], 
			document.all["Phone1RequiredFieldValidator"], 
			document.all["Phone2RequiredFieldValidator"], 
			document.all["Phone3RequiredFieldValidator"], 
			document.all["Phone1RegularExpressionValidator"],
			document.all["Phone2RegularExpressionValidator"],
			document.all["Phone3RegularExpressionValidator"],
			document.all["MailRequiredFieldValidator"], 
			document.all["MailRegularExpressionValidator"]
		);
	Page_ValidationActive = false;
	ValidatorOnLoad();
	dictionary = CreateDictionaryFromQueryString();
	if ((viewPageShouldBeResized == "true") || (viewPageShouldBeResized == true))
	{
		var windowWidth = dictionary.windowWidth_sm, windowHeight = dictionary.windowHeight_sm;
		if (windowWidth != null && windowHeight != null)
		{
			window.resizeTo(windowWidth, windowHeight)
			window.moveTo(0, 0);
		}
	}
	document.getElementById("contactPhoneCountry").value = DefaultCountryCode;
	document.getElementById("contactPhoneCity").value = DefaultCityCode;
	document.getElementById("contactPhoneNumber").value = DefaultPhoneNumber;
	loadPrice(dictionary, loadPrice_callback);
}

function contactPhoneNumber_onclick()
{

}

function contactPhoneCountry_onclick()
{

}