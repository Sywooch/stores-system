var marker = new google.maps.Marker();

function afterInit() {
    setMarker(getFormLatLng());
}

function setMarker(latLng) {
    marker.setMap(null);
    marker = new google.maps.Marker({
        position: latLng,
        map: map
    });
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
