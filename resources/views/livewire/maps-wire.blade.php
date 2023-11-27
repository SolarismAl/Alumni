
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
#user-list {
  position: absolute;
  top: 10px;
  left: 10px;
  background-color: white;
  padding: 10px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  max-height: 300px;
  overflow-y: auto;
}

.user-name {
  cursor: pointer;
  margin-bottom: 5px;
  color: blue;
  text-decoration: underline;
}

.user-name:hover {
  color: blue;
}

</style>
</head>
<body>

<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

<div id="map">
  <div id="user-list">
    @foreach($userLocations as $location)
      <div class="user-name" data-location="{{ $location->location }}">{{ $location->user }}</div>
    @endforeach
  </div>
</div>


<script>
	mapboxgl.accessToken = 'pk.eyJ1Ijoic29sYXJpc20iLCJhIjoiY2xuaTlqMGl6MW5oaTJrcmxrZzVjNW5sbCJ9.HtW3ap5WPeOfaZNXHCF4ag';
    const map = new mapboxgl.Map({
        container: 'map', 
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [125.544984, 9.6594233], 
        zoom: 12 
    });
    const marker = new mapboxgl.Marker()
        .setLngLat([125.5445722560101, 9.659274830626043]) 
        .addTo(map);

    const popup = new mapboxgl.Popup()
        .setHTML("<h5>Lower Libas Alumni Association</h5>"); 
    marker.setPopup(popup);

    map.addControl(
        new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
        })
    );

    const userLocations = @json($userLocations ?? []);

    userLocations.forEach((location) => {
        const [lng, lat] = location.location.split(',').map(parseFloat);

        // Create a custom HTML element for the marker
        const markerElement = document.createElement('div');
        markerElement.className = 'custom-marker';
        markerElement.innerHTML = `
            <h5>${location.user.name}</h5>
            <p>${location.location}</p>
        `;

        // Create a mapboxgl.Marker with the custom element
        const marker = new mapboxgl.Marker(markerElement)
            .setLngLat([lng, lat])
            .addTo(map);
    });
</script>


<style>
    .custom-marker {
        background-color: white;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .custom-marker h5 {
        margin: 0;
        color: blue;
        text-decoration: underline;
    }

    .custom-marker p {
        margin: 5px 0 0 0;
    }
</style>
