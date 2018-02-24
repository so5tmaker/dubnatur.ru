/* ������� ��� ���������� ������ �� ��������� � �������� (��������� ��������� ��� �� ���������� �����) */
/* ���������:
	src - ������� ����, � ������� ���������� ����������� "Sample.js"
	path - ���� � ����� �����������, �������������� �������� ����� "/library/part-one.js"
*/
function $import(src, path){
	var i, base, scripts = document.getElementsByTagName("script");
	for (i=0; i<scripts.length; i++){if (scripts[i].src.match(src)){ base = scripts[i].src.replace(src, "");break;}}
	document.write("<script src=\"" + base + path + "\"><\/script>");
};

addEvent = function(el, evname, func) {
	if (el.attachEvent) { // IE
		el.attachEvent("on" + evname, func);
	} else if (el.addEventListener) { // Gecko / W3C
		el.addEventListener(evname, func, true);
	} else {
		el["on" + evname] = func;
	}
};

/* ��������� ��������� �������� � ���� */
function setValuetoField(id, value)
{
	var field = document.getElementById(id);
	if (field && value > -1) {field.value = value}
};

/* �������������� ������ ���� abcde � ������ ���� "abcde" */
function quotesStr(str)
{
	return '"' + str + '"';
};

/* ����������� ������ � �����, � ������ ������������� ����������� ���������� -1 */
function strToInt(str)
{
	if (str != null)
	{
		var lastLocation = str.lastIndexOf("px");
		// remove the identified section, if it is a valid region
		if (lastLocation >= 0)
		{
			str = str.substring(0, lastLocation);
		}
	}
	var obj;
	obj = parseInt(str);
	if (!isNaN(obj)) {return obj;} else {return -1;}
};

/* ����������� ������ � ������ �����, � ������ ������������� ����������� ���������� [] */
function strToIntArray(str)
{
	var obj = [];
	if (str.length > 0)
	{
		obj = str.split(",");
		for (i=0; i<obj.length; i++) {obj[i] = strToInt(obj[i])}
	}
	return obj;
};

// ���������� ���� ������ ����� �������� ���� �������, ���������� �������� �������� � ����� ����
function getHref(page, newWindowInAnchor)
{
	if((newWindowInAnchor == true) || (newWindowInAnchor == "true"))
		return "javascript: windowOpen(\"" + page + "\", 950, 600, \"\", \"true\");"
	else
		return page;
}

// ���������� �������� �� ����� �� GET ������
function getParam(paramName)
{   
	var vars = new Array();      // ��� ��������������� 
	var pair = new Array();     // ������� 
	var param = new Array(); 
			
	var query = location.search;  // ������ GET ������� 
	if(query != '') 
	{ 
		vars = (query.substr(1)).split('&');   // ��������� ���������� 
		for(var i=0; i < vars.length; i++) 
		{ 
			pair = vars[i].split('=');       // ������ param ����� ��������� 
			param[pair[0]] = pair[1];       // ���� ����(��� ����������)->�������� 
		}
	}
	
	return param[paramName];
}

function CreateDictionaryFromQueryString()
{
	var dictionary;
	var query = location.search;
	if (query != "")
	{
		var vars = query.substring(1).split("&");
		var varsLength = vars.length;
		dictionary = new Array(varsLength);
		for (var index = 0; index < varsLength; index++)
		{
			var pair = vars[index].split("=");
			dictionary[pair[0]] = pair[1];
		}
	}
	else
	{
		dictionary = new Array();
	}
	return dictionary;
}

// ��������� HTML ������� <script>.
// Parameters:
//	[in] - object document, represents the HTML document  
//	[in] - string scriptSource, the URL to an external file that contains the source code or data, �������� ����� ��������� �������� src
//	[in] - string documentElementId, the string identifying the object, ������������� ��������, ������ �������� ����� ������� ������� <script> 
//	[in] - string scriptText, ����� javascript ����
// Returns: none
// �������������� HTML ������� <script> ����� ������� ������ ��������, ������� id �������� ����� documentElementId.
function CreateScript(document, scriptSource, documentElementId, scriptText)
{
	if (document != null)
	{
		var newScript = document.createElement("script");
		newScript.setAttribute("id", "documentScript");
		newScript.setAttribute("type", "text/javascript");
		if (scriptSource != "")
		{
			newScript.setAttribute("src", scriptSource);
		}
		if (scriptText != "")
		{
			newScript.text = scriptText;
		}
		var documentElementRef = document.getElementById(documentElementId);
		if (documentElementRef != null)
		{
			documentElementRef.appendChild(newScript);
		}
	}
}

// ���������� ��������, ���� object, ������� ����� �������������� � �������� ����.
// �������� ����� ��������� ��������� ������.
// Parameters:
//	[in] - object window, an object representing a window or frame
// Returns: object, the data from the parent window object
function GetWindowOpenerAcquirableData(window)
{
	var data = null;
	if (window != null)
	{
		var opener = window.opener;
		if (opener != null)
		{
			data = opener.acquirableData;
		}
	}
	return data;
}

// ���������� ��������, ���� string, ������� ����� ��������� �������� SRC � HTML �������� <img>.
// �������� �������� ������� �� ���-������, ��������������� �����������, ��� �������� hotelImageType.
// Parameters:
//	[in] - string images, ������ �������� ���������� Guid �����������
//	[in] - string hotelImageType, ������������ ��� ���� �����������, ���������������� � ������
//	[in] - int width, ������������ ������ �����������
//	[in] - int height, ������������ ������ �����������
// Returns: string, ������ �� ���-������ ��������������� �����������
function getHotelImageUriOfParticularType(images, hotelImageType, width, height)
{
	var guid = "00000000-0000-0000-0000-000000000000";
	if (images.length > 0)
	{
		var hotelTypeImage = null;
		if (hotelImageType != "")
		{
			for (var hotelImage in images)
			{
				if (images[hotelImage].type.toLowerCase() == hotelImageType.toLowerCase())
				{
					hotelTypeImage = images[hotelImage];
					break;
				}
			}
		}
		if (hotelTypeImage == null)
		{
			hotelTypeImage = images[0];
		}
		guid = hotelTypeImage.guid;
	}
	var widthAttribute = "";
	if (width != "")
	{
		widthAttribute = width;
	}
	var heightAttribute = "";
	if (height != "")
	{
		heightAttribute = height;
	}
	return remoteUri + "/Handlers/HotelImageHandler.ashx?ImageGuid=" + guid + "&MaximumSize=" + widthAttribute + "," + heightAttribute;
}

// ���������� ��������, ���� string, ������� �������� �������������� HTML ��������� <img>.
// ���������� ������ �� �����������, ��� �������� hotelImageType
// Parameters:
//	[in] - string hotelImageType, ������������ ��� ���� �����������, ���������������� � ������
//	[in] - int width, ������������ ������ �����������
//	[in] - int height, ������������ ������ �����������
// Returns:
//	string, ������ - HTML ������� <img>, � ���������� WIDTH, HEIGHT, SRC
function getHotelImageOfParticularType(images, hotelImageType, width, height)
{
	var widthAttribute = "";
	if (width != "")
	{
		widthAttribute = "width='" + width + "'";
	}
	var heightAttribute = "";
	if (height != "")
	{
		heightAttribute = "height='" + height + "'";
	}
	var imageUri = getHotelImageUriOfParticularType(images, hotelImageType, width, height);
	if (imageUri.indexOf("000000")>0)
	{
		return ""  /* ����� �� ���������� ����� ������ ��������, ���� ��� ��������  */
	}
	else
	{
		return "<img " + widthAttribute + " " + heightAttribute + " border='0' src='" + imageUri + "'>"				  
	}
}
			
function ChangeFirstDate()
{
	var fe = document.getElementById("DateFromTextBox");
	var se = document.getElementById("DateToTextBox");
	var fdate = fe.value;
	var sdate = se.value;
	var fd = Date.fromFormatString(fdate);
	var sd = Date.fromFormatString(sdate);
	if (fd > sd)
	{
		se.value = fe.value;
	}
}

// ���������� ��������, ���� string, ������� �������� �������������� HTML ��������� <a>.
// �������� �������� ������������ �� ������, ������� ����� ������ � ���� ��������� ���������� target.
// Parameters:
//	[in] - string reference, ����� �������
//	[in] - string referenceText, ����� �����������
//	[in] - string color, ���� ������ �����������
//	[in] - string textDecoration, ������� text-decoration
// Returns:
//	string, �������������� HTML ������� <a>, ������� �������� ������������ �� ������, 
//	������� ����� ������ � ����� ����.
//	���� �������� reference ����� null ��� �������� ������ �������, 
//	�� ������� ���������� ������ ������.
function getReference(reference, referenceText, color, textDecoration, target)
{
	var colorAttribute = "";
	if (color != "")
	{
		colorAttribute = "color: " + color + ";";
	}
	var textDecorationAttribute = "";
	if (textDecoration != "")
	{
		textDecorationAttribute = "textDecoration: " + textDecoration + ";";
	}
	var targetAttribute = "_self";
	if (target != "")
	{
		targetAttribute = target;
	}
	var href = "";
	if (reference != null && reference != '')
	{
		href = "<a style='" + colorAttribute + " " + textDecorationAttribute + "' target='" + targetAttribute + "' href='" + reference + "'>" + referenceText + "</a>";
	}
	return href;
}
			
function windowOpen(url, width, height, newWindow) 
{
	var targetAttribute;
	if((newWindow == true) || (newWindow == "true"))
	{
		targetAttribute = "_blank";
	}
	else
	{
		targetAttribute = "_self";
	}
	window.open(url, targetAttribute, "resizable=yes,scrollbars=yes,menubar=no,left=0,top=0,width=" + width + ",height=" + height + "");
};

function windowOpenSelf(url)
{
	window.open(url, '_self');
};

sys = function(){};

sys.$isIe = function() {
        return (navigator.userAgent.toLowerCase().indexOf("msie") != -1 && navigator.userAgent.toLowerCase().indexOf("opera") == -1);
    };
    
sys.$isNetscape7 = function() {
        return (navigator.userAgent.toLowerCase().indexOf("netscape") != -1 && navigator.userAgent.toLowerCase().indexOf("7.") != -1);
    };
    
sys.$isSafari = function() {
        return (navigator.userAgent.toLowerCase().indexOf("khtml") != -1);
    };
    
sys.$isOpera = function() {
        return (navigator.userAgent.toLowerCase().indexOf("opera") != -1);
    };
    
sys.$isMozilla = function() {
        return (navigator.userAgent.toLowerCase().indexOf("gecko") != -1 && navigator.productSub >= 20030210);
    };
    
sys.$isFireFox = function() {
		return /Firefox/i.test(navigator.userAgent);
	};

sys.$isArray = function(obj) {
        return obj instanceof Array;
    };
    
sys.$isObject = function(obj) {
        return (typeof obj == 'object');
    };


// ������ � ���������

// ���������� true, ���� value ���� � array.
function contains(array, value)
{
	for(var i = 0; i < array.length; i++)
	{
		if(array[i] == value)
			return true;
	}
	return false;
}

// ��������� �� ������� ��������� �������
function exclude(array, value)
{
	if(array == null || array.length == null)
		return array;

	for(var i = 0; i < array.length; i++)
	{
		var temp1 = array[i];
		var temp2 = value;
		if(array[i] == value)
			array.remove(i);
	}
	
	return array;
}

// ���������� ������ ��� ��������� null
function getArrayWithoutNull(array)
{
	var result = new Array();
	for (var i = 0; i < array.length; i++)
		if (array[i] != null)
			result.push(array[i]);
	return result;
}

// ���������� true, ���� ������ ������
function arrayIsEmpty(array)
{
	if (array != null && array.length != null && array.length != 0)
		return false;
	else
		return true;
}

// ���������� ����������� ��������
var gWaitBoxCounter = 0;
ToggleWaitBox = function (state) 
{
	if ($("#WaitingControl") == null)
	{
		return;
	}

	if (state == 'show')
	{
		gWaitBoxCounter++;
	}
	else if (state == 'hide')
	{
		gWaitBoxCounter--;
	}

	if (gWaitBoxCounter > 0)
	{
		$("#WaitingControl:not(:visible)").fadeIn();
	}
	else
	{
		$("#WaitingControl:visible").fadeOut();
	}
}

// ������� ��� ������������� ��������� ����
// ��������� � ����������� �� ��������� PriceRoundLevel
// �������� �� ����������� ����������� PriceCorrection
function PriceCorrectionFun(value)
{
	//alert(value);
	var reR= /(\S{3})?(\S{3})?(\S{3})?(\S{3})?(\S{3})?(\S{3})?(\S{3})?$/;
	var seR= "\u00A0$1\u00A0$2\u00A0$3\u00A0$4\u00A0$5\u00A0$6\u00A0$7";

	var num = parseFloat(String(value).replace(/(\u00A0|\s)/g, "").replace(/(\u002C|\u002E|,)/g, "."))*PriceCorrection;
	var numStrArr = String(num).split(".");
	numStrArr.push("00");

	if (PriceRoundLevel == 0)
	{
		var temp1 = numStrArr[1] + "0";
		return [numStrArr[0].replace(reR,seR).replace(/^\u00A0+/, '').replace(/\u00A0+$/, ''), ".", temp1.substr(0,2)].join('');
	}
	else
	{
		var temp2 = Math.round(parseFloat(numStrArr[0])/PriceRoundLevel)*PriceRoundLevel;
		return String(temp2).replace(reR,seR).replace(/^\u00A0+/, '').replace(/\u00A0+$/, '');
	}
}