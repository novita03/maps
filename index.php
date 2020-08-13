<!DOCTYPE html>
<html>
<head>
	<title>Menampilkan Peta dengan LeafletJS</title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
	<style type="text/css">
		#peta{
			height:100vh;
		}
	</style>
</head>
<body>
	
	<div id="dem"></div>
	<div id="demo"></div>
	<button onclick="getLocation()">Try It</button>
	<div id="peta"></div>
	<script type="text/javascript">
		var x = document.getElementById("demo");
		var y = document.getElementById("dem");
		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			} else { 
				x.innerHTML = "Geolocation is not supported by this browser.";
			}

		}

		function showPosition(position) {
			// x.innerHTML = position.coords.latitude + ","+ position.coords.longitude;

			var mapOptions = {
				center: [x.innerHTML = position.coords.latitude,y.innerHTML = position.coords.longitude],
				zoom: 13,
				strokeColor: "red",
			}

			var peta = new L.map('peta', mapOptions);

			L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
				maxZoom: 18,
				id: 'mapbox.streets',
				accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
			}).addTo(peta);

			var marker = new L.Marker([x.innerHTML = position.coords.latitude,y.innerHTML = position.coords.longitude]);
		
			marker.addTo(peta);



		}



	</script>
</body>
</html>