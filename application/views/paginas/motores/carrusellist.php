<!DOCTYPE html>
<html>
<head>
    <title>Carrusel</title>
</head>
<body>
    <object type="text/html" data="" id="objMotor" style="width: 100%; height: 800px"></object>
    <script type="text/javascript">
        url = "http://lineafacil.com/es/microsite/bc-perutravel/list-";
        function parseParamsFromUrl() {
            var params = {};
            var parts = window.location.search.substr(1).split("&");
            for (var i = 0; i < parts.length; i++) {
                var keyValuePair = parts[i].split("/");
                var key = decodeURIComponent(keyValuePair[0]);
                params[key] = keyValuePair[1] ?
                decodeURIComponent(keyValuePair[1].replace(/\+/g, " ")) :
                keyValuePair[1];
            }
            return params;
        }
        var urlParams = parseParamsFromUrl();
        var querySearch = "s";
        var queryProduct = "p";
        if (urlParams[querySearch] && urlParams[queryProduct]) {
            var objres = document.getElementById("objMotor");
            objres.data = url + urlParams[queryProduct] + "/" + urlParams[querySearch] ;
        }
    </script>
</body>
</html>