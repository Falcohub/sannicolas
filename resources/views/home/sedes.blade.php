<x-app-layout>
    <section class="bg-white">

            <div class="flex items-center px-5 py-8 mx-auto mt-16">
                <div class="flex flex-col w-full text-left lg:text-center">
                    <h1 class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-black lg:w-1/2 lg:text-3xl title-font">Chigorodo</h1>
                    <p class="mx-auto text-base font-medium leading-relaxed text-blueGray-700 lg:w-1/2">Cra 103 #94 - 45 Esquina/Barrio 10 de enero</p>
                </div>
            </div>        
        
        <div class="h-screen flex items-center justify-center">
            <div class="flex justify-center flex-wrap h-full w-full">
                <div class="w-96 md:w-1/2 lg:w-1/2">
                    <img class="w-full h-full object-cover" src="\storage\img\sede_chigorodo.png" alt="">
                </div>
                <div class="w-96 md:w-full lg:w-1/2">
                    <div id='map' class="h-full z-0"></div>
                </div>
            </div>
        </div>

        
        <script>
            mapboxgl.accessToken =
            'pk.eyJ1Ijoic2Fubmljb2xhcyIsImEiOiJja3ZlYTF0OW9iZnM0MnFxNnl0N3RjeDE4In0.KuXH2XxGJFZyN6holZVUcw';
        var map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [-76.68232564061357, 7.668547529129772], // starting position
            zoom: 14 // starting zoom
        });
        // Add zoom and rotation controls to the map.
        map.addControl(new mapboxgl.NavigationControl());
        
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
                                            -76.68232428895601, 7.668552874802819
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

    <section class="bg-white">

        <div class="flex items-center px-5 py-8 mx-auto">
            <div class="flex flex-col w-full text-left lg:text-center">
                <h1 class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-black lg:w-1/2 lg:text-3xl title-font">Carepa</h1>
                <p class="mx-auto text-base font-medium leading-relaxed text-blueGray-700 lg:w-1/2"> Carrera 80 # 76-42, 81-51. Barrio El Poblado</p>
            </div>
        </div>        
    
    <div class="h-screen flex items-center justify-center">
        <div class="flex justify-center flex-wrap h-full w-full">
            <div class="w-96 md:w-1/2 lg:w-1/2">
                <img class="w-full h-full object-cover" src="\storage\img\sede-carepa.jpg" alt="">
            </div>
            <div class="w-96 md:w-full lg:w-1/2">
                <div id='map1' class="h-full z-0"></div>
            </div>
        </div>
    </div>
    
    <script>
        mapboxgl.accessToken =
        'pk.eyJ1Ijoic2Fubmljb2xhcyIsImEiOiJja3ZlYTF0OW9iZnM0MnFxNnl0N3RjeDE4In0.KuXH2XxGJFZyN6holZVUcw';
    var map1 = new mapboxgl.Map({
        container: 'map1', // container ID
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-76.65966702672868, 7.756407135513135], // starting position
        zoom: 14 // starting zoom
    });
    // Add zoom and rotation controls to the map.
    map1.addControl(new mapboxgl.NavigationControl());
    
    map1.on('load', () => {
        // Add an image to use as a custom marker
        map1.loadImage(
            'https://docs.mapbox.com/mapbox-gl-js/assets/custom_marker.png',
            (error, image) => {
                if (error) throw error;
                map1.addImage('custom-marker', image);
                // Add a GeoJSON source with 2 points
                map1.addSource('points', {
                    'type': 'geojson',
                    'data': {
                        'type': 'FeatureCollection',
                        'features': [{
                                // feature for Mapbox San Nicolas
                                'type': 'Feature',
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': [
                                        -76.65966702672868, 7.756407135513135
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
                map1.addLayer({
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
</x-app-layout>
