function getCountries(callback)
{   
    callService("http://remote.bronni.ru/CountryStudy/WS/Issue.asmx/GetCountries",
    "",
    callback);
}

function getRegions(countryId, callback)
{
    callService("http://remote.bronni.ru/CountryStudy/WS/Issue.asmx/GetRegions",
    "CountryId=" + countryId.toString(),
    callback);
}

function getRegionsWithSights(countryId, callback)
{
    callService("http://remote.bronni.ru/CountryStudy/WS/Issue.asmx/GetRegionsWithSigths",
    "CountryId=" + countryId.toString(),
    callback);
}
