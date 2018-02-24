function getSection(sectionId, countryId, callback)
{
    callService("http://remote.bronni.ru/CountryStudy/WS/Section.asmx/GetSection",
         "SectionId=" + sectionId.toString() + "&CountryId=" + countryId.toString(),
         callback);
}
function getRootSections(callback)
{
    callService("http://remote.bronni.ru/CountryStudy/WS/Section.asmx/GetRootSections",
         "",
         callback);
}
function getSectionPreviews(sectionId, issueType, countryId, regionId, pageNum, pageSize, callback)
{
    callService("http://remote.bronni.ru/CountryStudy/WS/Section.asmx/GetContentSectionPreviews",
         "SectionId=" + sectionId.toString() + "&CountryId=" + countryId.toString()
            + "&IssueType=" + issueType.toString() + "&RegionId=" + regionId.toString()
            + "&PageSize=" + pageSize.toString() + "&PageNum=" + pageNum.toString(),
         callback);
}

function onsuccess(msg)
{
    var i = 0;
}
