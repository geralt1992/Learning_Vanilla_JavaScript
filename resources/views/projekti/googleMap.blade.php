@extends('master.master')

@section('content')

<h1>My Google Map</h1>
<div id="map"></div>





<script>

function initMap(){

//map options - BITNO
    var options = {
        zoom : 14,
        center : {
            lat : 45.5550,
            lng : 18.6955
            }
    }

    
//new map - BITNO
    var map = new google.maps.Map(document.getElementById('map') , options);


//user can add custom marker with click - with listener
    google.maps.event.addListener(map, 'click' , (e) => {
        addMarker({coords:event.latLng});
}); 


////////////////////////////// SINGLE MARKER

//add marker
    var marker = new google.maps.Marker({
        position:{
            lat : 45.5550,
            lng : 18.6955
        },
        map:map,
        //add custom marker
        icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png"
    });

    //custom infor window - kad klinkeš marker
    var infoWindow = new google.maps.InfoWindow({
        content : `<h2>Marin je tu!</h2>`,
    });

    marker.addListener('click' , () => {
        infoWindow.open(map, marker);
    });




////////////////////////////// MULTIPLE

//add multiple markers!

function addMarker(props){

    var marker = new google.maps.Marker({
        position: props.coords,
        map:map,
        //add custom marker
        icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png"
        
    });

    //check if is any content - add custom content to the marker
    if(props.content){
        var infoWindow = new google.maps.InfoWindow({
            content : props.content
        });

        marker.addListener('click' , () => {
            infoWindow.open(map, marker);
        });

    }

}


//sad samo dodaješ kordinate koje hoćeš i on će raditi markere!
addMarker({
            coords: {lat : 45.5550, lng : 18.6955},
            content: `<h1>Marko je tu!</h1>`
        });

addMarker({
            coords: {lat : 45.3550, lng : 18.5955},
            content: `<h1>Danijel je tu!</h1>`
        });


}

</script>



<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNwmWLrkJy1pJfHbgEvJr2UP0YzvlnM9U&callback=initMap&libraries=&v=weekly" defer> </script>



<style>

#map{
    height: 400px;
    width: 100%;
} 


</style>
@endsection