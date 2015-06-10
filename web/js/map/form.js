var marker = new google.maps.Marker();

function afterInit() {
    setMarker(getFormLatLng());
    initClickHandle();
}

function initClickHandle() {
    google.maps.event.addListener(map, 'click', function (e) {
        setFormLatLng(e.latLng);
        setMarker(e.latLng);
    });
}

function setMarker(latLng) {
    marker.setMap(null);
    marker = new google.maps.Marker({
        position: latLng,
        map: map
    });
}

function setFormLatLng(latLng) {
    $('#coordinate-lat').val(latLng.lat());
    $('#coordinate-lng').val(latLng.lng());
}

function getFormLatLng() {
    return new google.maps.LatLng(getFormLat(), getFormLng());
}

function getFormLat() {
    return $('#coordinate-lat').val();
}

function getFormLng() {
    return $('#coordinate-lng').val();
}
