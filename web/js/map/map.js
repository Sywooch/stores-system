var markers = [];

function afterInit() {
    setStoresMarkers();
}

function setStoresMarkers() {
    $.ajax({
        url: '/store/get-all'
    }).success(function (stores) {
        var storesSize = stores.length;
        for (var i = 0; i < storesSize; i++) {
            setStoreMarker(stores[i]);
        }
    });
}

function setStoreMarker(store) {
    var latLng = new google.maps.LatLng(store['lat'], store['lng']);
    var marker = new google.maps.Marker({
        position: latLng,
        map: map
    });

    google.maps.event.addListener(marker, 'click', function () {
        window.location.replace(store['url']);
    });

    markers.push(marker);
}
