
SearchFilter = function()
{
	this.departureCity = -1;				// ������ ������
	this.destinationCountry = -1;						// ������ ����������
	this.destinationCities = [];						// ������ ����������
	this.hotels = [];						// �����
	this.stars = [];						// ����������
	this.meals = [];						// ���� �������
	this.checkinDateFrom = "0001-01-01";	// ����� ������ ���� ������
	this.checkinDateTo = "0001-01-01";		// ����� ������� ���� ������
	this.nightsFrom = -1;					// ����������� ���������� �����
	this.nightsTo = -1;						// ������������ ���������� �����
	this.costFrom = -1;						// ����������� ���������
	this.costTo = -1;						// ������������ ���������
	this.currency = 1;						// ������
	this.adultsCount = -1;					// ���������� ��������
	this.childrenCount = -1;				// ���������� �����
	this.operators = [];					// ���������
//	this.hideToursWithoutFlights = HideToursWithoutFlights;	
	// ���� ��� ��������� -- ������ ��������� �������� ���������� � ����� �� ��������������. 
	// ��� ���� ����� ����� ���� ��� ���������, ���������� departureCity = 0; 
	this.hideToursWithoutPlaces = true;		// �� ���������� ���� ��� ����
}

SearchFilter.prototype.Validate = function()
{
	if(this.destinationCountry < 1)
		return "������ �� ������";
	if(this.checkinDateFrom < 0)
		return "���� ������ �� ������";
	if(this.checkinDateTo < 1)
		return "���� ������ �� ������";
	if(this.departureCity < 1)
		return "����� ������ �� �����";
	if(this.adult < 0)
		return "���������� �������� �� ������";
	if(this.maximumResults < 1)
		return "���������� ������� �� ������ ��� ������ 1";
		
	return "OK";
}