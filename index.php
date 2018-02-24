<?
include ("blocks/header.php");

//<!-- Левое меню -->
include ("blocks/lefttd.php");
//<!-- Верхнее меню -->
include ("blocks/middle.php");

//<!-- Контент -->
include ("blocks/content.php");

if ($sec==4) {?>
    <!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту  (начало) -->
<script src="http://api-maps.yandex.ru/1.1/?key=ADv6lEsBAAAAFcKdDgIAROIeK5s5-c0IFW5BaiiJmTjLsP0AAAAAAAAAAADWW-0lgti6W6LKattcl4hqfCZkrg==&wizard=constructor" type="text/javascript"></script>
<script type="text/javascript">
    YMaps.jQuery(function () {
        var map = new YMaps.Map(YMaps.jQuery("#YMapsID-4244")[0]);
        map.setCenter(new YMaps.GeoPoint(37.067726,56.822069), 10, YMaps.MapType.MAP);
        map.addControl(new YMaps.Zoom());
        map.addControl(new YMaps.ToolBar());
        map.addControl(new YMaps.TypeControl());

        YMaps.Styles.add("constructor#pmlbl1Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmlbl1.png",
                size : new YMaps.Point(36,41),
                offset: new YMaps.Point(-13,-40)
            }
        });


        YMaps.Styles.add("constructor#pmlbm2Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmlbm2.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });

       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(37.154329,56.734614), "constructor#pmlbl1Placemark", "Агентство путешествий Визит Центр, проспект Боголюбова 26, офис 6"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(37.13639,56.761211), "constructor#pmlbm2Placemark", "Агентство Путешествий Визит Центр, улица Тверская 9"));

        function createObject (type, point, style, description) {
            var allowObjects = ["Placemark", "Polyline", "Polygon"],
                index = YMaps.jQuery.inArray( type, allowObjects),
                constructor = allowObjects[(index == -1) ? 0 : index];
                description = description || "";

            var object = new YMaps[constructor](point, {style: style, hasBalloon : !!description});
            object.description = description;

            return object;
        }
    });
</script>

<div id="YMapsID-4244" style="width:450px;height:350px"></div>
<div style="width:450px;text-align:right;font-family:Arial"><a href="http://api.yandex.ru/maps/tools/constructor/" style="color:#1A3DC1">Создано с помощью инструментов Яндекс.Карт</a></div>
<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (конец) -->
<?}
//<!-- Подвал -->
include ("blocks/footer.php");
?>



