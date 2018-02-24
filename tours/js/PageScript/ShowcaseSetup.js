
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

function SetupShowcase()
{
	/* 
	*       ��������� ������� �����
	*
	*	������������ ���� ��� ���������� �������� ����������.
	*/

	// ������ ��������� ������� - ��������� ��������
	var se1 = new ShowcaseElement();
	//* ������
	se1.destinationCountry = 3;
	//* ���� ������, �������� � ���� ��������� (� ������ �������: ������ ���� �� ������ + 7 ����)
	// ���������� ���� ������������ ������������
	se1.departureDateFromNowCount = 30;
	//* ���������� ���� �� departureDateFromNowCount
	se1.departureDateCount = 7;
	//* ����� ������
	se1.departureCity = 1;
	//* ���������� ��������
	se1.adult = 2;
	// ���������� �����
	se1.child = 0;
	//* ���������� ����� �� ����� �������, ������� ����� ����������
	se1.positionCount = 999;
	// true = ������� �� ���������� ������������� �����
	se1.filtrateIdenticalHotels = true;
	// ������ ����������
	se1.destinationCities = [];
	// ����� - � ������ �������� ������ �� ����� ��������������� (��������)
	//se1.hotels = [871,1004,3458,3811,5002,5426,5703,6970,7544,7688,9284,9310,9723,9724,9725,9727,10034,10610,10630,10642,11388,10232,11616,13269,13270,13295,13405,34445];
	// ����������
	//se1.stars = [];
	// �����������������, ����� 
	// ��
	//se1.nightsFrom = 7;
	// ��
	//se1.nightsTo = 15;
	// ������
	//se1.currency = 1;
	// ����
	// ��
	//se1.priceFrom = 500;
	// ��
	//se1.priceTo = 1500;
	// ���������
	//se1.operatorIds = [];

	// ��� ���� ��������� ������
//	var se2 = new ShowcaseElement();
//	se2.destinationCountry = 5;
//	se2.departureDateFromNowCount = 1; // ����� � ����������� ���
//	se2.departureDateCount = 7; // � ������� 7 ����
//	se2.filtrateIdenticalHotels = true; // ������� �� ���������� ������������� �����
//	se2.departureCity = 1; // ����� �� ������
//	se2.destinationCities = [];
//	se2.adult = 2; // 2 ��������
//	se2.child = 0; // 0 �����
//	se2.positionCount = 3; // ���������� ����� �� ����� �������
//	se2.nightsFrom = 7;
//	se2.nightsTo = 15;
//	se2.stars = [];
	//se2.hotels = [81918,56920,85651,82998,81860,8053,62082,82613,61802,59000,69330,83725,49341,82804,82995,63328,7679,83046,49826,89162,89495,370,48897,84419,86766,83481,83003,60303];

//	var se3 = new ShowcaseElement();
//	se3.destinationCountry = 73;
//	se3.departureDateFromNowCount = 1; // ����� � ����������� ���
//	se3.departureDateCount = 7; // � ������� 7 ����
//	se3.filtrateIdenticalHotels = true; // ������� �� ���������� ������������� �����
//	se3.departureCity = 1; // ����� �� ������
//	se3.destinationCities = [];
//	se3.adult = 2; // 2 ��������
//	se3.child = 0; // 0 �����
//	se3.positionCount = 7; // ���������� ����� �� ����� �������
//	se3.nightsFrom = 7;
//	se3.nightsTo = 15;
//	se3.stars = [];
	

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