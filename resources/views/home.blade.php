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
<section id="why-choose-us" class="py-16 bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-4xl font-BebasNeue font-bold text-gray-900 dark:text-white mb-4">Proč nakupovat u nás?</h2>
            <div class="w-24 h-1 bg-indigo-600 dark:bg-indigo-400 mx-auto mb-6"></div>
            <p class="text-xl font-Roboto text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">Nabízíme nejlepší produkty za nejlepší ceny s garancí spokojenosti!</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Fast Delivery Card -->
            <div class="group relative overflow-hidden rounded-xl bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute top-0 left-0 w-2 h-full bg-indigo-600 dark:bg-indigo-400"></div>
                <div class="p-8">
                    <div class="flex justify-center mb-6">
                        <div class="p-4 rounded-full bg-indigo-50 dark:bg-gray-700 text-indigo-600 dark:text-indigo-400 transform group-hover:scale-110 transition-transform duration-300">
                            <x-heroicon-o-truck class="h-12 w-12"></x-heroicon-o-truck>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 text-center">Rychlá Doprava</h3>
                    <p class="text-gray-700 dark:text-gray-300 text-center font-Roboto">Zaručujeme rychlé dodání vašich objednávek po celé České republice do 24-48 hodin.</p>
                </div>
            </div>
            
            <!-- Quality Products Card -->
            <div class="group relative overflow-hidden rounded-xl bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute top-0 left-0 w-2 h-full bg-indigo-600 dark:bg-indigo-400"></div>
                <div class="p-8">
                    <div class="flex justify-center mb-6">
                        <div class="p-4 rounded-full bg-indigo-50 dark:bg-gray-700 text-indigo-600 dark:text-indigo-400 transform group-hover:scale-110 transition-transform duration-300">
                            <x-iconsax-bro-sidebar-right class="h-12 w-12"></x-iconsax-bro-sidebar-right>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 text-center">Kvalitní Produkty</h3>
                    <p class="text-gray-700 dark:text-gray-300 text-center font-Roboto">Naše produkty procházejí důkladným výběrem kvality a testováním, abychom zajistili vaši spokojenost.</p>
                </div>
            </div>
            
            <!-- Customer Support Card -->
            <div class="group relative overflow-hidden rounded-xl bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                <div class="absolute top-0 left-0 w-2 h-full bg-indigo-600 dark:bg-indigo-400"></div>
                <div class="p-8">
                    <div class="flex justify-center mb-6">
                        <div class="p-4 rounded-full bg-indigo-50 dark:bg-gray-700 text-indigo-600 dark:text-indigo-400 transform group-hover:scale-110 transition-transform duration-300">
                            <x-gmdi-support-agent-o class="h-12 w-12"></x-gmdi-support-agent-o>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 text-center">Zákaznická Podpora</h3>
                    <p class="text-gray-700 dark:text-gray-300 text-center font-Roboto">Jsme tu pro vás 7 dní v týdnu, abychom zodpověděli všechny vaše dotazy a pomohli vám s výběrem.</p>
                </div>
            </div>
        </div>
        
        <!-- Additional Trust Indicators -->
        <div class="flex flex-wrap justify-center gap-8 mt-12" data-aos="fade-up" data-aos-delay="400">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 dark:text-green-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-700 dark:text-gray-300 font-Roboto">Bezpečná platba</span>
            </div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 dark:text-green-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-700 dark:text-gray-300 font-Roboto">Záruka vrácení peněz</span>
            </div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 dark:text-green-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-gray-700 dark:text-gray-300 font-Roboto">100% originální produkty</span>
            </div>
        </div>
    </div>
</section>


   
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
