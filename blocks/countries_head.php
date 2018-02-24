        <!-- Системная библиотека -->
	<script src="tours/js/System/System.js" type="text/javascript"></script>
	<!-- Библиотека для работы с датами -->
	<script src="tours/js/System/DateTime.js" type="text/javascript"></script>
	<!-- Библиотеки для обеспечения показа нового окна  -->
	<script type="text/javascript">var GB_ROOT_DIR = "tours/js/ajs/GreyBox/greybox/";</script>
	<!-- Внешняя системная библиотека стороннего разработчика -->
	<script src="tours/js/ajs/AJS.js" type="text/javascript"></script>
	<script src="tours/js/ajs/AJS_fx.js" type="text/javascript"></script>
	<!-- Оригинальный стиль BRONNI.RU -->
	<link href="tours/Styles/Design.css" rel="stylesheet"></link>
	<!-- Библиотека доступа к данным с сайта BRONN.RU -->
	<script src="tours/js/System/Ajax.js" type="text/javascript"></script>
	<!-- Библиотека доступа к данным в формате JSON-->
	<script src="tours/js/Json/json.js" type="text/javascript"></script>
	<!-- Прокси для авторизации -->
	<script src="tours/js/Proxy/SecurityProxy.js" type="text/javascript"></script>
	<!-- Прокси для получения данных о справочниках -->
	<script src="tours/js/Proxy/DictionariesProxy.js" type="text/javascript"></script>
	<!-- Прокси для получения данных по отелю -->
	<script src="tours/js/Proxy/HotelProxy.js" type="text/javascript"></script>
	<!-- Обработчик шаблонов -->
	<script src="tours/js/System/TemplateEngine.js" type="text/javascript"></script>
	<!-- Greybox -->
	<script src="tours/js/ajs/GreyBox/greybox/gb_scripts.js" type="text/javascript"></script>
	<link href="tours/js/ajs/GreyBox/greybox/gb_styles.css" type="text/css" rel="stylesheet"></link>
	<!-- Начальные установки модуля поиска -->
	<script src="blocks/country_js/Setup.js" type="text/javascript"></script>
	<!-- Данные -->
	<script src="tours/js/DataSource/DictionariesDataSource.js" type="text/javascript"></script>
	<script src="tours/js/DataSource/HotelsDataSource.js" type="text/javascript"></script>
	<!-- Библиотека jQuery -->
	<script src="tours/js/System/jquery.js" type="text/javascript"></script>
	<!-- Дизайн этой страницы: списков стран, городов и т.д. -->
	<link id="styles" href="tours/Styles/HotelCatalog.css" type="text/css" rel="stylesheet"></link>

        <?if (isset ($_GET['city_sm'])){?>
        <script src="blocks/country_js/HotelCatalog-Hotels.js" type="text/javascript"></script>
        <?}elseif (isset ($_GET['country_sm'])){?>
        <script src="blocks/country_js/HotelCatalog-Cities.js" type="text/javascript"></script>
        <?}else{?>
        <script src="blocks/country_js/HotelCatalog-Countries.js" type="text/javascript"></script>
        <?}?>
