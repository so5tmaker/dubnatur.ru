/*  Copyright BRONNI.RU , 2002-2008  |  www.bronni.ru
 * -----------------------------------------------------------
 *
 * AJAX library, version 1.0
 * ���������� ������ ��� ��������� ������ �� ������� ������
 * ��������� ������: http://<�����>/<��� ������>/<��� ������>?<������������� ���������>&<���������� ���������>
 */

AJAX = function(url)
{
	this.uri = url;
	this.createTransport();
	this.nextId = 0;
};

AJAX.prototype.createTransport = function()
{
	this.transport = document.createElement("SCRIPT");
	this.type = "text/javascript";
	this.transport.setAttribute("parent", this.name);
};

AJAX.prototype.call = function(method, params_v, params_n, callback)
{
	if (this.transport.parentElement) {	document.body.removeChild(this.transport);}
	
	var res = "AJAX_" + Math.round(Math.random()*1000000) + "_response";
	var ci,cj;
	var uri = this.uri + "/" + method + "?client=JScript&resultObject=" + res + "&enc=" + responseEncoding + "&key=" + encodeURIComponent(searchModuleKey);
	
	// ��� ������� ���������, ������� ���� ������������� � JSON
	for (ci=0; ci<params_v.length; ci++)
	{
		// ���� �������� �������� ��������
		if (sys.$isArray(params_v[ci]))
		{
			// ������ �������� � �������
			for (cj=0; cj<params_v[ci].length; cj++)
			{
				// ������������� � JSON
				uri = uri + "&" + params_n[ci]+ "=" + encodeURIComponent(JSON.stringify(params_v[ci][cj]));
			}
		}
		// �������� �� �������� ��������
		else
		{
			// ���� �������� �������� ��������
			if (sys.$isObject(params_v[ci]))
			{
				// ������������� � JSON
				uri = uri + "&" + params_n[ci]+ "=" + encodeURIComponent(JSON.stringify(params_v[ci]));
			}
			// �������� �������� ������� �����
			else
				uri = uri + "&" + params_n[ci]+ "=" + encodeURIComponent(params_v[ci]);
		}
	}
	
	var sender = this;
	AJAX.requests.push(res);
	
	if ((sys.$isFireFox()) || (sys.$isSafari()))
	{
		this.transport.onload = function() {AJAX.onreadystatechange(sender, res, callback)}
	}
	else
	{
		this.transport.onreadystatechange = function()
		{
			if (/loaded|complete/.test(this.readyState))
			{
				AJAX.onreadystatechange(sender, res, callback);
			}
		}
	}
	
	this.transport.src = uri;
	document.body.appendChild(this.transport);
};

AJAX.onreadystatechange = function(sender, res, callback)
{
    //��������� �� ����� ������ ������ �����
    var index = AJAX.hasRequest(res);
	if (index > -1)
	{
		AJAX.requests[index] = "";
	    AJAX.answers.push(index);
	} else return;
				
	var response = null;
	try {response = eval(res);} catch(e) {response = {"error": e}}

	if (callback) callback(response);
};

AJAX.requests = new Array();

//������ � ����������� �������� �������
AJAX.answers = new Array();

AJAX.hasRequest = function(key)
{
	for (i=0;i<AJAX.requests.length;i++)
	 if (AJAX.requests[i] == key)
		return i;
	return -1;
}