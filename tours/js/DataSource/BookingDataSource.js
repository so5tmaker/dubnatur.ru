
var bookingObject = null;

try {bookingObject = new Booking(remoteUri + "/Booking.ashx");} catch(e) {}

var bookingMessage = "";

function sendOrder(priceId, managerEmail, obj, callback)
{
	function sendOrder_callback(response)
	{
		if (typeof(response.error) == 'undefined')
		{
			if (response.result)
			{
				bookingMessage = "��� ����� ��������� ��������� ������������."
			}
			else
			{
				bookingMessage = "������ �������� ������. ������� ����������� � ���������."
			}
		}
		else
		{
			bookingMessage = "��������� ������. ���������� ��� ���."
		}
		callback();
	}

	if (!bookingObject) {callback(); return;}
	/* ��������� ���� �������� �� ���� ������������: ��� ������, ��� ������ � ���������� ������ */	
	var contactPhone = obj.contactPhoneCountry + obj.contactPhoneCity + obj.contactPhoneNumber;
	/* �������� ������� ������� ���������� */
	var description = obj.description.substr(0, 200);
	/* �������������� ������ ��� �������� �� ������ */
	var contact = new ContactInformation(obj.contactPerson, contactPhone, obj.contactMail, description);
	bookingObject.createOrderForAgency(priceId, managerEmail, contact, sendOrder_callback);
}

ContactInformation = function(_contactPerson, _contactPhone, _contactMail, _description)
{
	this.contactPerson = _contactPerson;
	this.contactPhone = _contactPhone;
	this.contactMail = _contactMail;
	this.description = _description;
}