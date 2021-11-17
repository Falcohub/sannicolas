<section class="bg-white h-screen py-36">
    <div class="swiper mySwiper h-80 shadow-xl bg-gray-100">
        <div class="swiper-wrapper max-w-md rounded-xl shadow-md md:max-w-2xl">
            <div class="swiper-slide md:flex">
                <div class="md:flex-shrink-0">
                    <img class="h-full w-full object-cover" src="https://www.sannicolascasadefunerales.com/wp-content/uploads/2018/08/IM-10-Landing-Casa-de-Funerales-San-Nicolas-compressor.jpg"
                        alt="">
                </div>
                <div class="p-20">
                    <h3 class="uppercase tracking-wide text-lg sm:text-2xl md:text-4xl font-bold mb-4 text-indigo-500">Destacada Responsabilidad Social</h3>
                    <p class="mt-2 text-justify text-gray-600">En 2010 en el Simposio Regional de Comerciantes y Empresarios la Federación Nacional de Comerciantes FENALCO, a través de su corporación FENALCO Solidario, entrega por primera vez en el Urabá antioqueño, un reconocimiento a la buena gestión en materia de Responsabilidad Social, un homenaje a nuestra primera década de trabajo comunitario, destacando nuestras prácticas socialmente responsables en la región y su impacto en desarrollo social.</p>
                </div>
            </div>
            <div class="swiper-slide md:flex">
                <div class="md:flex-shrink-0">
                    <img class="h-80 w-full object-cover" src="https://www.sannicolascasadefunerales.com/wp-content/uploads/2018/08/IM-10-Landing-Casa-de-Funerales-San-Nicolas-compressor.jpg"
                        alt="">
                </div>
                <div class="p-20">
                    <h3 class="uppercase tracking-wide text-lg sm:text-2xl md:text-4xl font-bold mb-4 text-indigo-500">Nota de estilo</h3>
                    <p class="mt-2 text-justify text-gray-600">Una condecoración departamental por ser ejemplo de gestión y empresarismo en el departamento de Antioquia, nos fue otorgado por la Asamblea Departamental de Antioquia a través de la Resolución 049 del 2011.</p>
                </div>
            </div>
            <div class="swiper-slide md:flex">
                <div class="md:flex-shrink-0">
                    <img class="h-80 w-full object-cover" src="https://www.sannicolascasadefunerales.com/wp-content/uploads/2018/08/IM-10-Landing-Casa-de-Funerales-San-Nicolas-compressor.jpg"
                        alt="">
                </div>
                <div class="p-20">
                    <h3 class="uppercase tracking-wide text-lg sm:text-2xl md:text-4xl font-bold mb-4 text-indigo-500">Antena de oro</h3>
                    <p class="mt-2 text-justify text-gray-600">La Emisora Comunitaria Antena Stereo en el año 2011 durante la entrega del estímulo para líderes e instituciones que contribuyen al progreso de Urabá, nos entrega la Antena de Oro al Mérito Empresarial, reconociéndonos como una organización socialmente responsable que genera condiciones de empleo digno en la zona y por hacer del duelo un acto de amor y de unión.</p>
                </div>
            </div>
            <div class="swiper-slide md:flex">
                <div class="md:flex-shrink-0">
                    <img class="h-80 w-full object-cover" src="https://www.sannicolascasadefunerales.com/wp-content/uploads/2018/08/IM-10-Landing-Casa-de-Funerales-San-Nicolas-compressor.jpg"
                        alt="">
                </div>
                <div class="p-20">
                    <h3 class="uppercase tracking-wide text-lg sm:text-2xl md:text-4xl font-bold mb-4 text-indigo-500">Galardon a la excelencia</h3>
                    <p class="mt-2 text-justify text-gray-600">El periódico Pregonero del Darién nos entregó el Galardón a la Excelencia en el año 2012, resaltando la integralidad y humanización en los servicios ofrecidos por nuestra empresa en toda región de Urabá.</p>
                </div>
            </div>
            <div class="swiper-slide md:flex">
                <div class="md:flex-shrink-0">
                    <img class="h-80 w-full object-cover" src="https://www.sannicolascasadefunerales.com/wp-content/uploads/2018/08/IM-10-Landing-Casa-de-Funerales-San-Nicolas-compressor.jpg"
                        alt="">
                </div>
                <div class="p-20">
                    <h3 class="uppercase tracking-wide text-lg sm:text-2xl md:text-4xl font-bold mb-4 text-indigo-500">Comerciante Distinguido Urabá</h3>
                    <p class="mt-2 text-justify text-gray-600">Después de 25 años de trabajo sociocomunitario en la región, en el 2017 la Federación Nacional de Comerciantes FENALCO en su evento “La Noche de los Mejores” le confiere nuevamente otro homenaje a nuestra gerente por su liderazgo y tenacidad, reconociendo su aporte al desarrollo social y económico del Urabá antioqueño con gestión caracterizada por la honestidad, el compromiso y profesionalismo.</p>
                </div>
            </div>
            <div class="swiper-slide md:flex">
                <div class="md:flex-shrink-0">
                    <img class="h-80 w-full object-cover" src="https://www.sannicolascasadefunerales.com/wp-content/uploads/2018/08/IM-10-Landing-Casa-de-Funerales-San-Nicolas-compressor.jpg"
                        alt="">
                </div>
                <div class="p-20">
                    <h3 class="uppercase tracking-wide text-lg sm:text-2xl md:text-4xl font-bold mb-4 text-indigo-500">Destacada Gestión en Responsabilidad Social</h3>
                    <p class="mt-2 text-justify text-gray-600">En agradecimiento por su Responsabilidad Social Empresarial, en 2016 SINTRAINAGRO seccional Turbo hace reconocimiento especial a nuestra gerente y todo su equipo de trabajo, exaltando su permanente acompañamiento a las comisiones obreras y su entrega a la comunidad.</p>
                </div>
            </div>
            

        </div>
        {{-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> --}}
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>