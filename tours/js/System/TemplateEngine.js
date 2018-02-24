/*  Copyright BRONNI.RU , 2002-2008  |  www.bronni.ru
 * -----------------------------------------------------------
 *
 * The DHTML TemplateEngine, version 1.0
 *
 * ���������� ��� ���������� ��������. 
 * � �������� ������� ������������ ���� HTML � ������������ ������. ������ ����� � ������ ������������� �������� �������, ����������
 * ����� �������� � ���������: ������������ ���: $row. ��������� ������� �� ��������������.
 * <��� ����������>$token - ��������� � innerHTML ����� �� ���������� (������ ������������ ��� TABLE, TBODY, TR). ������������ ������������ ��� SPAN
 * <��� �������>&row - ���������� ������ �� ���������� ������� � �������
 * <��� �������>[.<��� �������� ������� � �������>]&token - ��������� � innerHTML �������� �� ������� ��� ������ ������
 */

/* �������� element'a �� ������� �������� � name = "name" � value = "*$token" */
function getUtilValue(el)
{
    if (el.attributes == null) {return "";};
	
	var val = ""; 
	
	if(el.getAttribute("name")!=null){val = el.getAttribute("name");};
	try{if(val=="" && el.getAttribute("ext:util")!=null) {val = el.getAttribute("ext:util");};}catch(ex) {};
	
	return val;
};

//function cleanUtilValue(el)
//{
//    el.setAttribute(getUtilAttributeName(el), "");    
//};

function getUtilAttributeName(el)
{
    if (el.attributes == null) {return "";};
		
	if(el.getAttribute("name")!=null){return "name";};
	try{if(el.getAttribute("ext:util")!=null) {return "ext:util";};}catch(ex){};
	
	return val;
};

TemplateEngine = function()
{

	/* ������������ ����������� ������� ���������? */
	if(arguments.length==0)
    {
        //self.status="TemplateEngine argument error!";
    };

	/* ������ �������� ������������ */
    this.name     = arguments[0];
    /* �������� � �������� �������� ��� ������� �� ������������ ��� body */
    this.parent      = arguments[1]||document.body;
    
    this.tokens = [];
    this.rows = [];
    
    /* ��������������� �������, ������� ���������� ������� ��� ���������� */
    this.tempobjects = [];
};

TemplateEngine.$token = "$token";
TemplateEngine.$row = "$row";


/* ������ token.element.innerHtml �� token.value */
TemplateEngine.prototype.setToken = function(token)
{
	if (token.valid) {token.element.innerHTML = token.value;}
};


/* ����������� ������ �� ������ � ������ element � ������� ���������, ���������� �������� 
 * � ������ "name" � value, ���������� ��� ���������� ��������� row.regexp("prices"). 
 * ��� ���������� ����� ���������, �� value ���������� �� ������ � ������ �������. */
TemplateEngine.prototype.replaceAttribute = function(row, element, aname, index)
{
	if (element== null || !element.hasChildNodes()) {return;}
	var el, element, i, atext, ntext;
	for (i=0;i<element.childNodes.length;i++)
	{
		el = element.childNodes[i];
		if (row.isAttribute(el, aname))
		{
		    atext = el.getAttribute(aname);    
		    			
			/* ���������� ������ �� ����������� ��������� - ��������� ���������� � ����� ������� */
			ntext = atext.replace(row.regexp, function($0){ return $0 + "[" + index + "]"} );
			el.setAttribute(aname, ntext);
		};
		this.replaceAttribute(row, el, aname, index)
	}
};


/* ��� row: ������������ row.element row.obj.length ��� 
 * � ����� ��� ������� ����� - replaceAttribute()*/
TemplateEngine.prototype.setRow = function(row)
{
	var element, i;
	if (row.valid && row.obj != null)
	{		
		var arglen=row.obj.length;
		for(i=0;i<arglen;i++)
		{
			element = row.element.cloneNode(true);
			/* element - ����, i - ������ � ������� row.obj */
			row.parent.appendChild(element);
			this.replaceAttribute(row, element, getUtilAttributeName(element), i);
			this.tempobjects[this.tempobjects.length] = element;
		}
    }
    /* �������� ���������� �������� �� ������ html. ���������� ���� ��� ��� �������� ��������. */
    if(row.element.parentNode != null)
        row.element.parentNode.removeChild(row.element);
};


/* �������� ��������� �������� */
TemplateEngine.prototype.deleteTempObj = function()
{
	for (i=0;i<this.tempobjects.length;i++)
	{
		this.tempobjects[i].parentNode.removeChild(this.tempobjects[i]);
	}
	this.tempobjects = [];
};


/* �������� element'a �� ������� �������� � name = "name" � value = "*$token" */
TemplateEngine.prototype.isToken = function(el)
{
	return /\$token/i.test(getUtilValue(el));
};



/* �������� element'a �� ������� �������� � name = "name" � value = "*$row" */
TemplateEngine.prototype.isRow = function(el)
{
	return /\$row/i.test(getUtilValue(el));
};



/* RUN */
TemplateEngine.prototype.run = function()
{
	if (this.tempobjects.length > 0) this.deleteTempObj();
	/* ����� ���� row � ���������� �� � this.rows */
	if (this.rows.length == 0) this.scanRow();
	/* ��� ������� row - ������������� �������� � �������� �������� � ������ ������� */
	this.generateRow();
	/* ����� ���� token � ���������� �� � this.tokens */
	this.scanToken();
	/* ������ �� ���� ���������-������� innerHtml �� �������� */
	this.generateToken();
};


/* ����� �� ���� ��������� document'� - row; */
/* ���������� ��������� row �� ���������� ������. */
TemplateEngine.prototype.scanRow = function()
{
	var i;
	var elements = [];
	var element = null;
	
	elements = document.getElementsByTagName('*');
	
	for (i=0; i<elements.length; i++)
	{
		element = elements[i];
		if (this.isRow(element))
		{
			this.addRow(new Row(element))
		}
	}
};


/* ����� �� ���� ��������� document'� - token; */
/* ���������� ��������� token �� ���������� ������. */
TemplateEngine.prototype.scanToken = function()
{
	var i;
	var elements = [];
	var element = null;
	
	elements = document.getElementsByTagName('*');
	
	for (i=0; i<elements.length; i++)
	{
		element = elements[i];
		if (this.isToken(element))
		{
			this.addToken(new Token(element))
		}
	}
};

/* ��� ������� token � this.tokens ����� setToken(token)*/
TemplateEngine.prototype.generateToken = function()
{
	var token, i;
	for (i=0; i<this.tokens.length; i++)
	{
		token = this.tokens[i];
		this.setToken(token);
	}
};

/* ��� ������� row � this.rows ����� setRow(row) */
TemplateEngine.prototype.generateRow = function()
{
	var row, i;
	for (i=0; i<this.rows.length; i++)
	{
		row = this.rows[i];
		this.setRow(row);
	}
};

/* ���������� token'� � ������ this.tokens */
TemplateEngine.prototype.addToken = function()
{
    var i,arglen;
    arglen=arguments.length;
    for(i=0;i<arglen;i++)
    {
        this.tokens[this.tokens.length]=arguments[i]
    }
};

/* ���������� row � ������ this.rows */
TemplateEngine.prototype.addRow = function()
{
    var i,arglen;
    arglen=arguments.length;
    for(i=0;i<arglen;i++)
    {
        this.rows[this.rows.length]=arguments[i]
    }
};


/* �������-������ ��� ������ �� �������� �� row.obj */
Token = function(element)
{	
	/* [name] - �������� �������� "name" � element'� */
	this.name = getUtilValue(element);
	/* ���������� ������� ���������� ��������� */
	//cleanUtilValue(element);
	/* [exp] - ���������, ������� ����� ���������, ����� �������� �������� ��� ����������� */
	this.exp = this.name.split("$")[0];
	/* [value] - �������� ��� ����������� */
	var v = "";
	try	{v = eval(this.exp);} catch(ex) {}
	if (v != null && v != 'undefined') {this.value = v; this.valid = true;} else {this.value = ""; this.valid = false;};
	/* [element] */
	this.element = element;
};

/* ������-������ ��� ������������. */
Row = function(element)
{
	/* [name] - �������� �������� "name" */
	this.name = getUtilValue(element);
	/* ���������� ������� ���������� ��������� */
	//cleanUtilValue(element);
	/* [nameObject] - ��� ������� ��� ������������ */
	this.nameObject = this.name.split("$")[0];
	/* [regexp] - ��������� ��� �������� ��������� � ������ ����� ������� �� ��� ������� � �������� */
	this.regexp = new RegExp(this.nameObject,"gi");
	/* [obj] - ������ ������ �� �������� ����� ����������� ������� ��� ������������ */
	var v = null;
	try	{v = eval(this.nameObject);} catch(ex) {};
	if (v != null && v != 'undefined') {this.obj = v; this.valid = true;} else {this.obj = null; this.valid = false;};
	/* [element] */
	this.element = element;
	/* [parent] */
	this.parent = element.parentNode;
};


/* ���� �� � �������� ������� � name = "name" � value = "*nameObject*" */
Row.prototype.isAttribute = function(el, aname)
{
	if (el.getAttribute) 
	{
		/* �����-�� ������ ���� IE - ���� � ��������� ����� ����� ��������� regexp �� ������ ������ ���������� �� ���� � ���� ������� ����� ��� */
		/* ������� ������� regexp ������ ��� ����� ��������� - ������ ��������� ������� */
		var regexp = new RegExp(this.nameObject,"gi");
		//return this.regexp.test(el.getAttribute(aname));
		var result = regexp.exec(el.getAttribute(aname)) != null;
		return result;
	}
	return false;
};
