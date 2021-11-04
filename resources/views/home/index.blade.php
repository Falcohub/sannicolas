<x-app-layout>
    {{-- carrusel de Imagenes --}}
    @livewire('carrusel')

    {{-- Planes --}}
    <section>
        <div class="flex flex-col items-center px-5 py-8 mx-auto bg-white">
            <div class="flex flex-col w-full text-left lg:text-center">
                <h1
                    class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-black lg:w-1/2 lg:text-3xl title-font">
                    Nuestros planes preexequiales</h1>
                <p class="mx-auto text-base font-medium leading-relaxed text-blueGray-700 lg:w-1/2">You're about to
                    launch soon and must be 100% focused on your product. Don't loose precious days designing, codingthe
                    landing page and testing.</p>
            </div>
        </div>

        <!-- Swiper Slider Planes -->
        <x-slider-planes />

        {{-- Alianzas --}}
        <section class="mx-auto">
            <div class="flex flex-col items-center px-5 py-8 mx-auto bg-white">
                <div class="flex flex-col w-full text-left lg:text-center">
                    <h1
                        class="mx-auto text-2xl font-semibold leading-none tracking-tighter text-black lg:w-1/2 lg:text-3xl title-font">
                        Nuestros aliados</h1>
                </div>
            </div>

            <div class="px-5 mx-auto lg:px-24 lg:py-20 bg-white">
                <div class="flex flex-wrap">
                    <div class="flex flex-col w-full mb-12 text-left lg:text-center lg:w-1/2">
                        <img alt="testimonial"
                            class="inline-block object-cover object-center w-60 h-40 mx-auto mb-8 rounded"
                            src="https://funerarialainmaculada.com.co/wp-content/uploads/elementor/thumbs/logo-remanso1.fw_-nunz4vl5kb2jgrr4kvko1fwt4k47y0pzjp14yuorhk.png">
                        <p class="mx-auto text-base font-medium leading-relaxed text-blueGray-700 lg:w-1/2">You're about
                            to launch soon and must be 100% focused on your product. Don't loose precious days
                            designing, coding the landing page and testing . </p>
                        <h2 class="mt-4 text-xs font-semibold tracking-widest text-black uppercase title-font"> Rasmu
                            Doe
                            <span href="#" class="font-semibold text-blueGray-500 lg:mb-0">Acme's HR </span>
                        </h2>
                    </div>
                    <div class="flex flex-col w-full mb-12 text-left lg:text-center lg:w-1/2">
                        <img alt="testimonial"
                            class="inline-block object-cover object-center w-40 h-40 mx-auto mb-8 rounded-full"
                            src="https://dummyimage.com/302x302/F3F4F7/8693ac">
                        <p class="mx-auto text-base font-medium leading-relaxed text-blueGray-700 lg:w-1/2">You're about
                            to launch soon and must be 100% focused on your product. Don't loose precious days
                            designing, coding the landing page and testing . </p>
                        <h2 class="mt-4 text-xs font-semibold tracking-widest text-black uppercase title-font"> Rasmus
                            Doe
                            <span href="#" class="font-semibold text-blueGray-500 lg:mb-0">Acme's HR </span>
                        </h2>
                    </div>
                </div>
            </div>
        </section>

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
                    zoom: 16 // starting zoom
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
</x-app-layout>