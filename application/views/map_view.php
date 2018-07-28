<!-- Page Title -->
<script>


</script>
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Lokasi Irtanaz Furniture</h1>
            </div>
        </div>
    </div>
</div>
<script>
    var map,infoWindow,infoWindow2;
    var irtanazFurniture = {lat: -5.373287, lng: 105.251803};
    var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Irtanaz Furniture</h1>'+
        '<div id="bodyContent">'+
        '<p><b>Irtanaz Furniture</b>, Marupakan <b>Jasa Jati ukir Modern dan Minimalis</b>, yang berlokasi di  ' +
        'Jl. Untung suropati No.25, Labuhan Ratu, Kedaton, Bandarlampung '+
        ' '+
        ''+
        ''+
        ''+
        ''+
        ''+
        ''+
        '</p>'+
        '</div>'+
        '</div>';



    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: irtanazFurniture,
            zoom: 17
        });
        infoWindow = new google.maps.InfoWindow;
        infoWindow2 = new google.maps.InfoWindow({
            content : contentString
        })

        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({
            position: irtanazFurniture,
            animation: google.maps.Animation.DROP,
            title : 'Irtanaz Furniture'});

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }
        marker.setMap(map);
        marker.addListener('click',function () {
            infoWindow2.open(map,marker);
        })


        /*
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                infoWindow.open(map);
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
        */


    }
    // initMap()
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlGsKmgrcRxV0geQFNnHrfcmU0RHcDIwU&callback=initMap">
</script>
<div id="map"></div>
<div class="section">
    <div class="container">
        <div class="row">
            <!--<div class="col-sm-12">
                <div class="basic-login">
                    Buat kasih tulisan apalah
                </div>
            </div>
            -->
        </div>
    </div>
</div>