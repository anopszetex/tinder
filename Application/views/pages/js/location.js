$(function(){

	var myLat  = $('.lat-text').html();
	var myLong = $('.long-text').html();

	myLat  = myLat.split(':');
	myLong = myLong.split(':');

	$('li').each(function(){
		var lat_coord  = $(this).find('.lat-user').html();
		var long_coord = $(this).find('.long-user').html();

		var distance = Math.round(getDistanceFromLatLonInKm(myLat[1],  myLong[1], lat_coord, long_coord) * 100) /100;
		$(this).find('.user-distance').html('Distância: ' + distance);

	});

	function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
		var R    = 6371;
	    var dLat = deg2rad(lat2-lat1);
	    var dLon = deg2rad(lon2-lon1); 
	    var a    = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
	    		   Math.sin(dLon/2) * Math.sin(dLon/2); 
	    var c 	 = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
	    var d 	 = R * c;
	    return d;
	}

	function deg2rad(deg) {
  		return deg * (Math.PI/180)
	}

})


function getLocation() {
  if(navigator.geolocation) {
    	navigator.geolocation.getCurrentPosition(showPosition);
  	}
}

function showPosition(position) {
	$('p.lat-text').html("Latitude: " + position.coords.latitude);
	$('p.long-text').html("Longitude: " + position.coords.longitude);

	atualizarCoordenadas(position.coords.latitude, position.coords.longitude);
}

function atualizarCoordenadas(latitudePar, longitudePar) {
	$.ajax({
		url: '/tinder/Application/views/pages/ajax/atualizar-coord.php',
		method:'post',
		data: {latitude:latitudePar, longitude:longitudePar}
	}).done(function(data){
		alert("Atualizado com sucesso");
	});
}