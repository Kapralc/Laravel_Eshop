@extends('layouts.app')

@section('content')
<div class="h-20"> </div>
<div class="container mx-auto py-10">
    <h1 class="text-5xl font-semibold text-center mb-8 text-white">Kontaktujte nás</h1>
    <p class="text-center font-Roboto font-semibold text-gray-600 text-xl mb-12">
        Máte otázky? Vyplňte formulář níže a my se vám co nejdříve ozveme!
    </p>

    <!-- Contact Form -->
    @include('components.contact-form')

    <!-- Map Section -->
    <div class="mt-16">
        <h2 class="text-3xl font-BebasNeue text-center mb-6 text-black">Kde nás najdete</h2>
        <div class="flex justify-center">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.835434509374!2d-122.4194154846819!3d37.77492927975971!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858064f0e0b1b1%3A0x4c0b0c0b0b0b0b0b!2sYour+Business+Location!5e0!3m2!1sen!2sus!4v1616161616161!5m2!1sen!2sus" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                class="rounded-lg shadow-lg">
            </iframe>
        </div>
    </div>
</div>
@endsection