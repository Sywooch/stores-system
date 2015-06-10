var map;
var defaultLocation = new google.maps.LatLng(49.8500, 24.0167);

function initialize() {
    var mapOptions = {
        zoom: 12,
        center: defaultLocation
    };

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    afterInit();
}

function afterInit() {
}

google.maps.event.addDomListener(window, 'load', initialize);
