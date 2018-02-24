var dictionary;
var newWindowInAnchor;
var hotelPageTargetAttribute;

//кол-во запросов
var kSending;
//кол-во принятых ответов
var kReceiving;
//временное хранилище принятых ответов
var tempPrices = new Array();

function GetShowcase()
{
	for (var i = 0; i < Showcase.length; i++)
	{
		var validateResult = Showcase[i].Validate();
		if (validateResult != "OK")
		{
			alert(validateResult);
			ToggleShowcaseWaitBox("hide");
			return;
		}
		if(Showcase[i].currency == -1)
		{
		   Showcase[i].currency = showcaseCurrencyId; 
		}
	}
	
	kSending = 0;
	kReceiving = 0;
	for (var i = 0; i < Showcase.length; i++)
	{
	    kSending++;
    	var params = [];
	    params.push([Showcase[i]]);
	
    	var priceObject = null;
	    priceObject = new Price(remoteUri + "/Price.ashx");
    	priceObject.getShowcase(params, showcase_callback);
	}
}

function showcase_callback(response)
{	
	if ((response.error == null) && (response.result != null) && (response.result.length > 0) )
	{
		var truePrices = getArrayWithoutNull(response.result);
		if(truePrices.length > 0)
		{
		    //сохраняем ответ во временное хранилище
            tempPrices.push(truePrices);
			//drawShowcase(truePrices);
		}
	} 
	else
	{
	    tempPrices.push("");
		if (response.error != null)
		{
			if (response.error.message != null)
			{
				ToggleShowcaseWaitBox("hide");
				alert(response.error.message);
			}
		}
	}
	processPrices(truePrices);
}

//Функция обрабатывает полученный ответ
function processPrices(truePrices)
{
    kReceiving++;
    //если получили последний ответ, то
    if (kSending == kReceiving)
    {
        //помещаем все полученные ответы в один массив
        var truePricesAll = new Array();
        for(var index=0; index<tempPrices.length; index++)
        {
            for (var i=0;i<AJAX.answers.length;i++)
            {
                if ((AJAX.answers[i]==index) && (tempPrices[i]!=""))
                {
                    truePricesAll = truePricesAll.concat(tempPrices[i]);
                }
            }
        }
        //отрисовываем результаты
        drawShowcase(truePricesAll);
    }
}

function drawShowcase(truePrices)
{
	ToggleShowcaseWaitBox("hide");
	var table = document.getElementById("Showcase");
	var currentTD = document.getElementById("showcaseFirstElement");
	var tourDiv = document.getElementById("Tour");
	if ((table != null) && (currentTD != null) && (tourDiv != null))
	{
		var tableBody = table.tBodies[0];
		var templateTD = currentTD.cloneNode(false);
		templateTD.id = "";
		currentTD = templateTD.cloneNode(false);
		var row = tableBody.rows[0];
		row.parentNode.removeChild(row);
		for (var tr = 0; tr < ShowcaseHeight; tr++)
		{
			for (var td = 0; td < ShowcaseWidth; td++)
			{
				var count = tr * ShowcaseWidth + td;
				if (count >= truePrices.length)
				{
					return;
				}
				if (td == 0)
				{
					var newTR = document.createElement("tr");
					newTR.appendChild(currentTD);
					tableBody.appendChild(newTR);
				}
				else
				{
					tableBody.rows[tr].appendChild(currentTD);
				}
				var cloneTour = tourDiv.cloneNode(true);
				drawTour(cloneTour, truePrices[count]);
				currentTD.appendChild(cloneTour);
				cloneTour.style.display = "block";
				currentTD = templateTD.cloneNode(false);
			}
		}
	}
}

function drawTour(view, tour)
{
	var tourChilds = view.childNodes;
	var tourChild;
	for(var i = 0; i < tourChilds.length; i++)
	{
		tourChild = tourChilds[i];
		if (tourChild.className != null)
		{
			switch (tourChild.className)
			{
				case "anchorHotel": 
				{
					var queryString = "";
					queryString += "?hotelId_sm=" + tour.price.hotel.id;
					queryString += "&itemName_sm=" + tour.price.hotel.russianName;
					queryString += "&windowWidth_sm=" + hotelPageWidth;
					queryString += "&windowHeight_sm=" + hotelPageHeight;
					queryString = escape(queryString);
					tourChild.href = "javascript:windowOpen(\"" + hotelPage1 + queryString + "\", " + hotelPageWidth + ", " + hotelPageHeight + ", \"" + hotelPageTargetAttribute + "\")";
					break;
				}	
				case "image":
				{
					if (tour.imageGuid == "00000000-0000-0000-0000-000000000000")
					{
						tourChild.attributes.src.value = imageDefaultSrc;
						tourChild.alt = "К сожалению, нет фото";
					} 
					else
					{
						tourChild.attributes.src.value = remoteUri + "/Handlers/HotelImageHandler.ashx?ImageGuid=" + tour.imageGuid + "&MaximumSize=" + imageMaxWidth + "," + imageMaxHeight + "";
						tourChild.alt = tour.price.hotel.russianName + ", " + tour.price.star.russianName;
					}
					break;
				}
				case "anchorPrice": 
				{
					var queryString = "";
					queryString += "?priceId_sm=" + tour.price.id;
					queryString += "&currencyId_sm=" + showcaseCurrencyId;
					queryString += "&windowWidth_sm=" + viewPageWidth;
					queryString += "&windowHeight_sm=" + viewPageHeight;
					tourChild.href = "javascript: windowOpen(\"" + viewPage1 + queryString + "\", " + viewPageWidth + ", " + viewPageHeight + ", " + openViewPageInNewWindow + ");";
					break;
				}
				case "destinationCountry":
				{
					tourChild.innerHTML = tour.price.country.russianName;
					break;
				}							
				case "hotel":
				{
					tourChild.innerHTML = tour.price.hotel.russianName + ", " + tour.price.star.russianName;
					break;
				}
				case "price":
				{
					if (priceRepresentation != "PricePerPerson")
					{
						tourChild.innerHTML = PriceCorrectionFun(tour.price.operatorPrice) + " " + tour.price.operatorCurrency.key;
					}
					else
					{
						tourChild.innerHTML = PriceCorrectionFun(tour.price.operatorPricePerPerson) + " " + tour.price.operatorCurrency.key;
					}
					break;
				}
				case "departureDate":
				{
					tourChild.innerHTML = (Date.fromUTCString(tour.price.checkinDate)).toRUString();
					break;
				}
				case "duration":
				{
					tourChild.innerHTML = tour.price.duration;
					break;
				}
				case "touristsCount":
				{
					var touristsCount = tour.price.adultCount + tour.price.childrenCount;
					tourChild.innerHTML = touristsCount;
					break;
				}
			}
		}
		drawTour(tourChild, tour);
	}
}

ToggleShowcaseWaitBox = function (state) 
{
	var documentElementRef = document.getElementById("ShowcaseWaitBox");
	if (documentElementRef != null)
	{
		if (state == "show")
		{
			documentElementRef.style.display = "inline";
		}
		else if (state == "hide")
		{
			documentElementRef.style.display = "none";
		}
	}
}

function SetupPageSize()
{
	ToggleShowcaseWaitBox("show");
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
	if ((showcasePageShouldBeResized == "true") || (showcasePageShouldBeResized == true))
	{
		var windowWidth = dictionary.windowWidth_sm, windowHeight = dictionary.windowHeight_sm;
		if (windowWidth != null && windowHeight != null)
		{
			window.resizeTo(windowWidth, windowHeight)
			window.moveTo(0, 0);
		}
	}
	newWindowInAnchor = dictionary.newWindowInAnchor_sm;
	if (newWindowInAnchor == null)
	{
		hotelPageTargetAttribute = openHotelPageInNewWindow;
	}
	else
	{
		hotelPageTargetAttribute = newWindowInAnchor;
	}
}

SetupPageSize();
