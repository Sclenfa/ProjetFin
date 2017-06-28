function initMap() {
    axios.get('https://maps.googleapis.com/maps/api/geocode/json', {
        params:{
            address:projectLocation,
            key:'AIzaSyCDgMrkpNBVCdZAdA1sRyl1cJXcEwpbOPs'
        }
    })
        .then(function(response){

            var lat = response.data.results[0].geometry.location.lat;
            var lng = response.data.results[0].geometry.location.lng;

            var geoCoords = {lat: lat,lng: lng};

            var options = {
                zoom:14,
                center: geoCoords
            };

            var map = new google.maps.Map(document.getElementById('map'), options);

            addMarker(geoCoords);

            function addMarker(coords){
                var marker = new google.maps.Marker({
                    position:coords,
                    map:map
                });
            }
        })
        .catch(function(error){
            console.log(error);
        });


}/**
 * Created by Etudiant on 27/06/2017.
 */
