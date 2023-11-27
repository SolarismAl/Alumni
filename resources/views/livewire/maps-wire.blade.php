<style>
    body { margin: 0; padding: 0; }
    #map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>

<div id="map"></div>

<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

<script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoic29sYXJpc20iLCJhIjoiY2xuaTlqMGl6MW5oaTJrcmxrZzVjNW5sbCJ9.HtW3ap5WPeOfaZNXHCF4ag';
    const map = new mapboxgl.Map({
        container: 'map', 
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [125.544984, 9.6594233], 
        zoom: 12 
    });

    // Loop through user locations and add markers
    @foreach($userLocations as $location)
    @if($location->user) {{-- Check if the user relationship exists --}}
        new mapboxgl.Marker()
            .setLngLat([{{ explode(',', $location->location)[1] }}, {{ explode(',', $location->location)[0] }}])
            .setPopup(new mapboxgl.Popup().setHTML('<h5>' + '{{ $location->user->name ?? 'Unknown'}}' + '</h5>'))
            .addTo(map);
    @endif
@endforeach


    map.addControl(
        new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
        })
    );
</script>
