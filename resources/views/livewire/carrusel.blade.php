<div class="h-screen bg-black">
    <div class="swiper mySwiper h-full">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img class="opacity-70 w-full object-contain" src="https://images.unsplash.com/photo-1523463695703-81670ed104a2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=871&q=80" alt="">
            </div>
            <div class="swiper-slide">
                <img class="opacity-70 w-full object-cover" src="https://images.unsplash.com/photo-1574808146141-fbd663cfb174?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
            </div>
            <div class="swiper-slide">
                <img class="opacity-70 w-full object-cover" src="https://images.unsplash.com/photo-1575580450516-2028255d6911?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="">
            </div>
            <div class="swiper-slide">
            <img class="opacity-70 w-full h-full object-cover" src="\storage\img\prueba2.jpeg" alt="">
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
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
</div>
