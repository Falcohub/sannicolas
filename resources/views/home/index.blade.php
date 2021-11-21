<x-app-layout>

    {{-- Carrusel de imagenes --}}
    <x-carrusel-inicio/>

    {{-- Planes --}}
    <section>
        <div class="flex flex-col items-center px-5 py-8 mx-auto bg-white">
            <div class="flex flex-col w-full text-left lg:text-center">
                <h1
                    class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-black lg:w-1/2 lg:text-3xl title-font">
                    Nuestros planes preexequiales</h1>
                <p class="mx-auto text-base font-medium leading-relaxed text-blueGray-700 lg:w-1/2">San Nicolás tiene para ti diferentes planes que se acomodan a tu necesidad.</p>
            </div>
        </div>

    <x-slider-planes/>

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
                <div class="flex flex-col w-full mb-12 text-left lg:text-center lg:w-full">
                    <img alt="remanso"
                        class="inline-block object-cover object-center w-60 h-40 mx-auto mb-8 rounded"
                        src="https://funerarialainmaculada.com.co/wp-content/uploads/elementor/thumbs/logo-remanso1.fw_-nunz4vl5kb2jgrr4kvko1fwt4k47y0pzjp14yuorhk.png">
                    <p class="mx-auto text-base font-medium leading-relaxed text-blueGray-700 lg:w-1/2">Pertenecemos a la corporación Remanso, la red nacional de servicios exequiales más grande que tiene Colombia, con más de 2.000 salas de velación a su disposición en todo el territorio nacional.</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="flex flex-col items-center px-5 py-8 mx-auto bg-white">
            <div class="flex flex-col w-full text-left lg:text-center">
                <h1
                    class="mx-auto mb-8 text-2xl font-semibold leading-none tracking-tighter text-black lg:w-1/2 lg:text-3xl title-font">Estamos ubicados en</h1>
                <p class="mx-auto text-base font-medium leading-relaxed text-blueGray-700 lg:w-1/2">Carrera 98# 103B - 35 Avenida Hospital Apartadó - Antioquia</p>
            </div>
        </div>
    </section>
    {{-- Mapa y direccion --}}
    <x-mapa-inicio/>
    
</x-app-layout>