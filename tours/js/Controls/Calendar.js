var base = "Calendar.js";
$import(base, "calendar/calendar.js");
$import(base, "calendar/calendar-helper.js");
$import(base, "calendar/lang/calendar-ru_win_.js");
$import(base, "calendar/calendar-setup.js");


function SetupCalendar(field, button)
{
  Calendar.setup({inputField:field, ifFormat:"%d.%m.%Y", button:button,align:"TR", singleClick:true});
}