<div class="h-screen bg-black mt-16">
        <div class="swiper mySwiper h-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="opacity-90 object-cover object-center" src="\storage\img\Mesa de trabajo 2.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="opacity-90 object-cover object-center" src="\storage\img\Mesa de trabajo 1.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="opacity-90 object-cover object-center" src="\storage\img\Mesa de trabajo 3.png" alt="">
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