
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