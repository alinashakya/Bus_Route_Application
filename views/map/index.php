<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	var map;
	var geocoder;
	var centerChangedLast;
	var reverseGeocodedLast;
	var currentReverseGeocodeResponse;

	function initialize() {
		var latlng = new google.maps.LatLng(27.6477546, 85.333388);
		var myOptions = {
			zoom: 17,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		geocoder = new google.maps.Geocoder();

		var marker = new google.maps.Marker({
			position: latlng,
			map: map,
			title: "location!"
		});

	}

</script>
<?php die('hey'); ?>
<body onload="initialize()">
	<div id="map" style="width:1000px; height:600px">
		<div id="map_canvas" style="width:100%; height:100%"></div>
		<div id="crosshair"></div>
	</div>


</body>