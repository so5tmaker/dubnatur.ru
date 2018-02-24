
var showcaseCurrencyId = DefaultCurrency;
var imageMaxWidth = "110px", imageMaxHeight = "90px";
var imageBorderWidth = "1px";
var imageMargin = "2px";
var textMaxWidth = "110px";
var textBorderWidth = "1px";
var textMargin = "2px";
var priceRepresentation = "PricePerRoom"; //"PricePerPerson" - ��� ������ ��� �� ��������
var textPosition = "bottom";
// ����� �������� � �������
var ShowcaseWidth = 3;
// ����� ����� � �������
var ShowcaseHeight = 3;
var Showcase;
var imageDefaultSrc = "../Images/showcaseDefault.jpg"; //�������� �� ���������

// ���� ������� ������������ � ��������, ������� ��������� �� � �������� "Html" ������,
// �� �������� �������������� ���� ������������ ������� ��������.
//var viewPage = "../Html/PriceDetails.htm"; /* ����� ��������� ���� */
//var hotelPage = "../Html/HotelDetails.htm"; /* ����� � ������������� �� ����� */

function SetupShowcase(destinationCountry, departureCity)
{
	/* 
	*       ��������� ������� �����
	*
	*	������������ ���� ��� ���������� �������� ����������.
	*/

	// ������ ��������� ������� - ��������� ��������
	var se1 = new ShowcaseElement();
	//* ������
	se1.destinationCountry = destinationCountry;
	//* ���� ������, �������� � ���� ��������� (� ������ �������: ������ ���� �� ������ + 7 ����)
	// ���������� ���� ������������ ������������
	se1.departureDateFromNowCount = 1;
	//* ���������� ���� �� departureDateFromNowCount
	se1.departureDateCount = 7;
	//* ����� ������
	se1.departureCity = departureCity;
	//* ���������� ��������
	se1.adult = 2;
	// ���������� �����
	se1.child = 0;
	//* ���������� ����� �� ����� �������, ������� ����� ����������
	se1.positionCount = 3;
	// true = ������� �� ���������� ������������� �����
	se1.filtrateIdenticalHotels = true;
	// ������ ����������
	se1.destinationCities = [];
	// ����� - � ������ �������� ������ �� ����� ��������������� (��������)
	//se1.hotels = [871,1004,3458,3811,5002,5426,5703,6970,7544,7688,9284,9310,9723,9724,9725,9727,10034,10610,10630,10642,11388,10232,11616,13269,13270,13295,13405,34445];
	// ����������
	se1.stars = [];
	// �����������������, ����� 
	// ��
	se1.nightsFrom = 7;
	// ��
	se1.nightsTo = 15;
	// ������
	//se1.currency = 1;
	// ����
	// ��
	//se1.priceFrom = 500;
	// ��
	//se1.priceTo = 1500;
	// ���������
	//se1.operatorIds = [];

		// ������, ���������� ��� ��������� �������
	Showcase = [se1];

	/* 
	*
	*       ����� �������� ������� �����
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