
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>
<body>

<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

<div id="map"></div>

<script>
	mapboxgl.accessToken = 'pk.eyJ1Ijoic29sYXJpc20iLCJhIjoiY2xuaTlqMGl6MW5oaTJrcmxrZzVjNW5sbCJ9.HtW3ap5WPeOfaZNXHCF4ag';
    const map = new mapboxgl.Map({
        container: 'map', 
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [125.544984, 9.6594233], 
        zoom: 12 
    });

    const marker = new mapboxgl.Marker()
        .setLngLat([125.5445722560101, 9.659274830626043]) // [lng, lat]
        .addTo(map);

    const popup = new mapboxgl.Popup()
        .setHTML("<h5>Lower Libas Alumni Association</h5>"); 
    marker.setPopup(popup);

    map.addControl(
        new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        })
    );
</script>
