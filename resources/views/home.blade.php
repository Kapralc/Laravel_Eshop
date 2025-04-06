@extends('layouts.app')

@section('content')
   <!-- Hero Section with Image and Gradient -->
<div class="relative h-screen" data-aos="fade-up">
    <!-- Hodinky obrázek -->
    <img src="http://127.0.0.1:8000/images/pozadi.jpg" alt="Vítejte" class="object-cover w-full h-full z-10">
    
    <!-- Gradient overlay (šedý přechod pro lepší kontrast) -->
    <div class="absolute inset-0 bg-gradient-to-b from-gray-800 via-gray-500 to-transparent opacity-60"></div>
    
    <!-- Vylepšený nadpis a text -->
<div class="flex flex-col items-center justify-center h-full absolute top-0 left-0 right-0 bottom-0 z-20">
    <!-- Překryv za textem a tlačítky -->
    <div class="absolute inset-0 bg-black bg-opacity-50 z-0"></div>

   <!-- Nadpis -->
<h1 class="text-blue-500 text-5xl font-BebasNeue font-bold z-10 animate-flicker tracking-widest transition-all duration-500 ease-in-out hover:translate-x-4 hover:text-red-500"
    style="text-shadow: 1px 1px 2px black;" data-aos="zoom-in" data-aos-duration="1500">
    Vítejte na naší stránce!
</h1>
    <!-- Text (se změněným kontrastem a zvětšeným fontem) -->
    <p class="bg-black bg-opacity-70 text-white text-lg mt-4 z-10 opacity-90 max-w-lg px-4 text-center rounded-lg py-2 shadow-lg">
        Každý trénink je krokem k silnější verzi tebe. Vyber si to nejlepší vybavení pro maximální výsledky!
    </p>

    <!-- Tlačítka -->
    <div class="mt-8 flex justify-center z-10">
        <a href="/products" 
           class="bg-blue-500 text-white px-6 py-3 rounded-full text-lg font-semibold hover:shadow-lg transition-all duration-300 ease-in-out"
           style="text-shadow: 1px 1px 2px black;">
            Více o našich produktech 
        </a>
    </div>
</div>
</div>

    <!-- Why Choose Us Section -->
    <div id="why-choose-us" class="py-10 text-center bg-gray-100 dark:bg-gray-800" data-aos="fade-up" data-aos-duration="1500">
        <h2 class="text-3xl font-semibold font-BebasNeue text-gray-900 dark:text-white">Proč nakupovat u nás?</h2>
        <p class="mt-4 text-lg font-Roboto font-semibold text-gray-700 dark:text-gray-300">Nabízíme nejlepší produkty za nejlepší ceny!</p>
        <div class="mt-6 flex flex-wrap justify-center gap-6">
            <div class="bg-white dark:bg-gray-700 shadow-md rounded-lg p-6 max-w-xs" data-aos="fade-right" data-aos-duration="1500">
                <div class="flex justify-center">
                    <x-heroicon-o-truck class="h-16 w-16 text-gray-900 dark:text-gray-300"></x-heroicon-o-truck>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Rychlá Doprava</h3>
                <p class="mt-2 font-Roboto font-semibold text-gray-700 dark:text-gray-300">Zaručujeme rychlé dodání vašich objednávek.</p>
            </div>
            <div class="bg-white dark:bg-gray-700 shadow-md rounded-lg p-6 max-w-xs" data-aos="fade-up" data-aos-duration="1500">
                <div class="flex justify-center">
                    <x-iconsax-bro-sidebar-right class="h-16 w-16 text-gray-900 dark:text-gray-300"></x-iconsax-bro-sidebar-right>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Kvalitní Produkty</h3>
                <p class="mt-2 font-Roboto font-semibold text-gray-700 dark:text-gray-300">Naše produkty procházejí důkladným výběrem kvality.</p>
            </div>
            <div class="bg-white dark:bg-gray-700 shadow-md rounded-lg p-6 max-w-xs" data-aos="fade-left" data-aos-duration="1500">
                <div class="flex justify-center">
                    <x-gmdi-support-agent-o class="h-16 w-16 text-gray-900 dark:text-gray-300"></x-gmdi-support-agent-o>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Zákaznická Podpora</h3>
                <p class="mt-2 font-Roboto font-semibold text-gray-700 dark:text-gray-300">Jsme tu pro vás, abychom zodpověděli všechny vaše dotazy.</p>
            </div>
        </div>
    </div>


   
    <!-- Products Horizontal Scroll Section -->
    @include('components.product-slider')

    <!-- Reviews Section (Now under the slider) -->
    @include('components.reviews')

    <!-- Contact Form Section -->
    @include('components.contact-form')
@endsection

@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@latest/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script> <!-- AOS JS -->
    <script>
        const swiper = new Swiper('.mySwiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
            },
            loop: true, // Přidá loop efekt
        });

        // AOS initialization
        AOS.init({
            duration: 1200, // Doba trvání animace
            easing: 'ease-in-out', // Typ animace
            once: true, // Animace pouze při prvním zobrazení
        });

        // Přepínání dark mode
        
    </script>
@endpush
