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
                <p class="mx-auto text-base font-medium leading-relaxed text-blueGray-700 lg:w-1/2">You're about to
                    launch soon and must be 100% focused on your product. Don't loose precious days designing, codingthe
                    landing page and testing.</p>
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

    {{-- Mapa y direccion --}}
    <x-mapa-inicio/>
    
</x-app-layout>