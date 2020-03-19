var $_GET = {};
if (document.location.toString().indexOf('?') !== -1) {
    var query = document.location
        .toString()
        // get the query string
        .replace(/^.*?\?/, '')
        // and remove any existing hash string (thanks, @vrijdenker)
        .replace(/#.*$/, '')
        .split('&');

    for (var i = 0, l = query.length; i < l; i++) {
        var aux = decodeURIComponent(query[i]).split('=');
        $_GET[aux[0]] = aux[1];
    }
}

var southWest = L.latLng(-59.9, -100.1),
    northEast = L.latLng(19.9, -20.2),
    bounds = L.latLngBounds(southWest, northEast);

if ($_GET['lat'] != undefined && $_GET['lng'] != undefined) {
    var coronamap = L.map('coronamap', { maxBounds: bounds }).setView([$_GET['lat'], $_GET['lng']], 11);
} else {
    var coronamap = L.map('coronamap', { maxBounds: bounds }).setView([-15.453680, -49.526367], 4);
}

L.tileLayer('https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}.png', {
    attribution: 'Mapa pela comunidade &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagens por <a href="https://foundation.wikimedia.org/wiki/Maps_Terms_of_Use">Wikimedia Maps</a>',
    maxZoom: 11,
    minZoom: 4,
    tileSize: 256,
    zoomOffset: 0,
}).addTo(coronamap);

$.ajax({
    url: "/infections",
    type: 'get',
    dataType: "json",
    success: function(data) {
        var markers = data;

        var markerClusters = L.markerClusterGroup({
            iconCreateFunction: function(cluster) {
                var markers = cluster.getAllChildMarkers();
                var cases = 0;

                markers.forEach(function(marker) {
                    cases += marker.options.cases;
                });

                var c = ' marker-cluster-';
                if (cases < 50) {
                    c += 'small';
                } else if (cases < 100) {
                    c += 'medium';
                } else {
                    c += 'large';
                }

                return new L.DivIcon({
                    html: '<div><span>' + cases + '</span></div>',
                    className: 'marker-cluster' + c,
                    iconSize: new L.Point(40, 40)
                });
            }
        });

        for (var i = 0; i < markers.length; ++i) {
            var popup = markers[i].city.name +
                '<br/><b>Casos:</b> ' + markers[i].cases +
                '<br/><b>Mortes:</b> ' + markers[i].deaths +
                '<br/><b>Recuperados:</b> ' + markers[i].recovered +
                '<br/><b>Casos Graves (UTI):</b> ' + markers[i].serious +
                '<br/><b>Primeiro Caso:</b> ' + moment(markers[i].first_case).format("DD [de] MMMM [de] YYYY");

            if (markers[i].cases < 50) {
                var color = "#b5e28c";
            } else if (markers[i].cases < 100) {
                var color = "#f1d357";
            } else {
                var color = "#fd9c73";
            }

            var m = L.circleMarker([markers[i].city.lat, markers[i].city.lng], { color: color, radius: markers[i].city.radius, cases: markers[i].cases }).bindPopup(popup);
            markerClusters.addLayer(m);
        }

        coronamap.addLayer(markerClusters);
    }
});