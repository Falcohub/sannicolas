<section>
    <div id='map' class="h-screen z-0">

        <div id="menu" class="absolute z-10 w-auto">
            <input id="satellite-v9" type="radio" name="rtoggle" value="satellite">
            <!-- See a list of Mapbox-hosted public styles at -->
            <!-- https://docs.mapbox.com/api/maps/styles/#mapbox-styles -->
            <label for="satellite-v9">satellite</label>
            <input id="light-v10" type="radio" name="rtoggle" value="light">
            <label for="light-v10">light</label>
            <input id="dark-v10" type="radio" name="rtoggle" value="dark">
            <label for="dark-v10">dark</label>
            <input id="streets-v11" type="radio" name="rtoggle" value="streets" checked="checked">
            <label for="streets-v11">streets</label>
            <input id="outdoors-v11" type="radio" name="rtoggle" value="outdoors">
            <label for="outdoors-v11">outdoors</label>
        </div>
    </div>

    <script>
        mapboxgl.accessToken =
            'pk.eyJ1Ijoic2Fubmljb2xhcyIsImEiOiJja3ZlYTF0OW9iZnM0MnFxNnl0N3RjeDE4In0.KuXH2XxGJFZyN6holZVUcw';
        var map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [-76.62967804570316, 7.88807750413972], // starting position
            zoom: 14 // starting zoom
        });
        // Add zoom and rotation controls to the map.
        map.addControl(new mapboxgl.NavigationControl());
        // Ver tipos de mapas
        const layerList = document.getElementById('menu');
        const inputs = layerList.getElementsByTagName('input');
        for (const input of inputs) {
            input.onclick = (layer) => {
                const layerId = layer.target.id;
                map.setStyle('mapbox://styles/mapbox/' + layerId);
            };
        }
        map.on('load', () => {
            // Add an image to use as a custom marker
            map.loadImage(
                'https://docs.mapbox.com/mapbox-gl-js/assets/custom_marker.png',
                (error, image) => {
                    if (error) throw error;
                    map.addImage('custom-marker', image);
                    // Add a GeoJSON source with 2 points
                    map.addSource('points', {
                        'type': 'geojson',
                        'data': {
                            'type': 'FeatureCollection',
                            'features': [{
                                    // feature for Mapbox San Nicolas
                                    'type': 'Feature',
                                    'geometry': {
                                        'type': 'Point',
                                        'coordinates': [
                                            -76.62967804570316, 7.88807750413972
                                        ]
                                    },
                                    'properties': {
                                        'title': 'San Nicolas Casa de Funerales'
                                    }
                                },
                            ]
                        }
                    });
                    // Add a symbol layer
                    map.addLayer({
                        'id': 'points',
                        'type': 'symbol',
                        'source': 'points',
                        'layout': {
                            'icon-image': 'custom-marker',
                            // get the title name from the source's "title" property
                            'text-field': ['get', 'title'],
                            'text-font': [
                                'Open Sans Semibold',
                                'Arial Unicode MS Bold'
                            ],
                            'text-offset': [0, 1.25],
                            'text-anchor': 'top'
                        }
                    });
                }
            );
        });
    </script>
</section>