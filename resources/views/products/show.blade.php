@extends('layouts.app')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen pt-20">
    <div class="container px-4 sm:px-6 lg:px-8 mx-auto py-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Domů
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('products.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-indigo-600 md:ml-2 dark:text-gray-300 dark:hover:text-indigo-400">Produkty</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Product Details -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <div class="flex flex-col lg:flex-row">
                <!-- Product Images Section -->
                <div class="lg:w-1/2 p-6">
                    <div class="relative group">
                        @if (!empty($product->images))
                            <img id="main-image" 
                                src="{{ asset('storage/' . $product->images[0]) }}" 
                                alt="{{ $product->name }}" 
                                class="w-full h-auto object-cover rounded-lg shadow-md transition-all duration-300 group-hover:shadow-xl"
                                style="max-height: 500px;">
                            
                            <!-- Zoom Indicator -->
                            <div class="absolute top-4 right-4 bg-white dark:bg-gray-700 rounded-full p-2 shadow-md opacity-70 transition-opacity duration-300 group-hover:opacity-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                </svg>
                            </div>
                        @else
                            <div class="w-full h-64 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Thumbnail Carousel -->
                    <div class="mt-6 relative">
                        <div class="flex items-center">
                            <button id="prev-image" class="absolute left-0 z-10 bg-white dark:bg-gray-700 rounded-full p-2 shadow-md hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            
                            <div class="overflow-hidden mx-10 w-full">
                                <div class="flex space-x-4 transition-transform duration-300" id="image-carousel">
                                    @if(count($product->images) > 0)
                                        @foreach ($product->images as $index => $image)
                                            <div class="flex-shrink-0 cursor-pointer image-thumbnail {{ $index === 0 ? 'ring-2 ring-indigo-500 dark:ring-indigo-400' : '' }}" data-index="{{ $index }}">
                                                <img src="{{ asset('storage/' . $image) }}"
                                                    alt="{{ $product->name }} - Image {{ $index + 1 }}"
                                                    class="w-20 h-20 object-cover rounded-md hover:opacity-90 transition-opacity duration-200"
                                                    loading="lazy">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="flex-shrink-0">
                                            <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded-md flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <button id="next-image" class="absolute right-0 z-10 bg-white dark:bg-gray-700 rounded-full p-2 shadow-md hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Info Section -->
                <div class="lg:w-1/2 p-6 lg:border-l border-gray-200 dark:border-gray-700 flex flex-col">
                    <!-- Product Header -->
                    <div class="mb-6">
                        <div class="flex items-center mb-2">
                            <span class="px-2.5 py-0.5 text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 rounded-full">
                                Na skladě
                            </span>
                            <div class="flex items-center ml-4">
                                <div class="flex text-yellow-400">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= round($product->averageRating()))
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300 dark:text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                                    {{ number_format($product->averageRating(), 1) }} ({{ $product->reviews->count() }} {{ $product->reviews->count() == 1 ? 'recenze' : 'recenzí' }})
                                </span>
                            </div>
                        </div>
                        
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">{{ $product->name }}</h1>
                        
                        <div class="mt-4 flex items-baseline">
                            <span class="text-3xl font-extrabold text-gray-900 dark:text-white">{{ number_format($product->price, 0, ',', ' ') }} Kč</span>
                            @if(isset($product->original_price) && $product->original_price > $product->price)
                                <span class="ml-4 text-lg text-gray-500 dark:text-gray-400 line-through">{{ number_format($product->original_price, 0, ',', ' ') }} Kč</span>
                                <span class="ml-2 px-2.5 py-0.5 bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300 text-xs font-medium rounded-full">
                                    -{{ round((1 - $product->price / $product->original_price) * 100) }}%
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Product Description -->
                    <div class="prose prose-sm dark:prose-invert max-w-none mb-6">
                        <p class="text-gray-700 dark:text-gray-300">{{ $product->description }}</p>
                    </div>
                    
                    <!-- Product Details -->
                    <div class="space-y-4 mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">
                                    <span class="font-medium">Dostupnost:</span> 
                                    @if($product->in_stock > 10)
                                        <span class="text-green-600 dark:text-green-400">Skladem ({{ $product->in_stock }} ks)</span>
                                    @elseif($product->in_stock > 0)
                                        <span class="text-yellow-600 dark:text-yellow-400">Poslední kusy ({{ $product->in_stock }} ks)</span>
                                    @else
                                        <span class="text-red-600 dark:text-red-400">Momentálně nedostupné</span>
                                    @endif
                                </span>
                            </div>
                            
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">
                                    <span class="font-medium">Kód produktu:</span> {{ $product->sku }}
                                </span>
                            </div>
                            
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">
                                    <span class="font-medium">Cena s DPH:</span> {{ number_format($product->price * 1.21, 0, ',', ' ') }} Kč
                                </span>
                            </div>
                            
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">
                                    <span class="font-medium">Doprava:</span> Zdarma od 1 000 Kč
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quantity and Add to Cart -->
                    <div class="mt-auto">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="space-y-4">
                            @csrf
                            <div class="flex items-center space-x-3">
                                <label for="quantity" class="text-sm font-medium text-gray-700 dark:text-gray-300">Množství:</label>
                                <div class="flex items-center border border-gray-300 dark:border-gray-600 rounded-md">
                                    <button type="button" class="decrement-quantity px-3 py-1 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-l-md transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                        </svg>
                                    </button>
                                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->in_stock }}" class="w-12 text-center border-0 focus:ring-0 dark:bg-gray-800 dark:text-white">
                                    <button type="button" class="increment-quantity px-3 py-1 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-r-md transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3">
                                <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Přidat do košíku
                                </button>
                                
                                <button type="button" class="flex-none bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-medium py-3 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                                
                                <button type="button" class="flex-none bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 font-medium py-3 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                        
                        <!-- Additional Benefits -->
                        <div class="mt-6 grid grid-cols-2 gap-4">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-sm text-gray-600 dark:text-gray-400">Rychlé doručení</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-sm text-gray-600 dark:text-gray-400">Bezpečný nákup</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-sm text-gray-600 dark:text-gray-400">Záruka 24 měsíců</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-sm text-gray-600 dark:text-gray-400">Vrácení do 14 dnů</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Tabs -->
        <div class="mt-12 bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <div class="border-b border-gray-200 dark:border-gray-700">
                <nav class="flex -mb-px" aria-label="Tabs">
                    <button class="tab-button active border-indigo-500 text-indigo-600 dark:text-indigo-400 whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm" data-tab="description">
                        Popis produktu
                    </button>
                    <button class="tab-button border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm" data-tab="specifications">
                        Specifikace
                    </button>
                    <button class="tab-button border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm" data-tab="reviews">
                        Recenze ({{ $product->reviews->count() }})
                    </button>
                    <button class="tab-button border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm" data-tab="shipping">
                        Doprava a platba
                    </button>
                </nav>
            </div>
            
            <!-- Tab Content -->
            <div class="p-6">
                <!-- Description Tab -->
                <div id="description-tab" class="tab-content active">
                    <div class="prose prose-indigo max-w-none dark:prose-invert">
                        <p>{{ $product->description }}</p>
                        
                        <!-- Additional description content can be added here -->
                        <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl vel ultricies lacinia, nisl nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl. Sed euismod, nisl vel ultricies lacinia, nisl nisl aliquam nisl, eget aliquam nisl nisl sit amet nisl.</p>
                        
                        <h3 class="mt-6 text-xl font-semibold">Hlavní výhody</h3>
                        <ul>
                            <li>Vysoká kvalita zpracování</li>
                            <li>Dlouhá životnost</li>
                            <li>Snadná údržba</li>
                            <li>Moderní design</li>
                        </ul>
                    </div>
                </div>
                
                <!-- Specifications Tab -->
                <div id="specifications-tab" class="tab-content hidden">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-900 w-1/3">Výrobce</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $product->manufacturer ?? 'Neuvedeno' }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-900">Kód produktu</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $product->sku }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-900">Záruka</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">24 měsíců</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-900">Hmotnost</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $product->weight ?? 'Neuvedeno' }} kg</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-900">Rozměry</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $product->dimensions ?? 'Neuvedeno' }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-900">Barva</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $product->color ?? 'Neuvedeno' }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-900">Materiál</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $product->material ?? 'Neuvedeno' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Reviews Tab -->
                <div id="reviews-tab" class="tab-content hidden">
                    <div class="space-y-8">
                        <!-- Reviews Summary -->
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="flex items-center mb-4 md:mb-0">
                                <div class="flex mr-4">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= round($product->averageRating()))
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-300 dark:text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <div>
                                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($product->averageRating(), 1) }} z 5</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Na základě {{ $product->reviews->count() }} {{ $product->reviews->count() == 1 ? 'recenze' : 'recenzí' }}</p>
                                </div>
                            </div>
                            
                            @auth
                                @php
                                    $existingReview = $product->reviews->where('user_id', Auth::id())->first();
                                @endphp
                                
                                @if(!$existingReview)
                                    <button id="write-review-button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Napsat recenzi
                                    </button>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                    Přihlásit se pro přidání recenze
                                </a>
                            @endauth
                        </div>
                        
                        <!-- Review Form (Hidden by default) -->
                        @auth
                            @if(!$existingReview)
                                <div id="review-form" class="hidden bg-gray-50 dark:bg-gray-900 p-6 rounded-lg border border-gray-200 dark:border-gray-700 mt-6">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Napište svou recenzi</h3>
                                    <form action="{{ route('reviews.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        
                                        <div class="mb-4">
                                            <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Vaše hodnocení</label>
                                            <div class="flex items-center">
                                                <div class="rating-stars flex">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <button type="button" class="rating-star p-1" data-rating="{{ $i }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-300 dark:text-gray-600 hover:text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                            </svg>
                                                        </button>
                                                    @endfor
                                                </div>
                                                <input type="hidden" name="rating" id="rating" value="5" required>
                                                <span class="ml-2 text-sm text-gray-500 dark:text-gray-400" id="rating-text">Výborné</span>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label for="comment" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Váš komentář</label>
                                            <textarea name="comment" id="comment" rows="4" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white rounded-md"></textarea>
                                        </div>
                                        
                                        <div class="flex justify-end">
                                            <button type="button" id="cancel-review" class="mr-3 inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Zrušit
                                            </button>
                                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Odeslat recenzi
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        @endauth
                        
                        <!-- Reviews List -->
                        <div class="space-y-6">
                            @if($product->reviews->count() > 0)
                                @foreach($product->reviews as $review)
                                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border border-gray-100 dark:border-gray-700">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <div class="w-12 h-12 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center text-indigo-600 dark:text-indigo-300 text-xl font-bold">
                                                    {{ substr($review->user->name ?? 'Anonym', 0, 1) }}
                                                </div>
                                            </div>
                                            <div class="ml-4 flex-1">
                                                <div class="flex items-center justify-between">
                                                    <h4 class="text-lg font-medium text-gray-900 dark:text-white">{{ $review->user->name ?? 'Anonymní uživatel' }}</h4>
                                                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $review->created_at->format('d.m.Y') }}</span>
                                                </div>
                                                <div class="flex items-center mt-1">
                                                    <div class="flex text-yellow-400">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $review->rating)
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                </svg>
                                                            @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300 dark:text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                                </svg>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <span class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">{{ $review->rating }}/5</span>
                                                </div>
                                                <div class="mt-3 text-gray-700 dark:text-gray-300">
                                                    <p>{{ $review->comment }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>
                                    <p class="mt-2 text-gray-500 dark:text-gray-400">Zatím žádné recenze. Buďte první, kdo ohodnotí tento produkt!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Shipping Tab -->
                <div id="shipping-tab" class="tab-content hidden">
                    <div class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Shipping Options -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Možnosti dopravy</h3>
                                <ul class="space-y-4">
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-base font-medium text-gray-900 dark:text-white">Kurýrní služba</p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Doručení do 1-2 pracovních dnů</p>
                                            <p class="text-sm font-medium text-gray-900 dark:text-white mt-1">99 Kč (zdarma nad 1 000 Kč)</p>
                                        </div>
                                    </li>
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-base font-medium text-gray-900 dark:text-white">Česká pošta</p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Doručení do 2-3 pracovních dnů</p>
                                            <p class="text-sm font-medium text-gray-900 dark:text-white mt-1">89 Kč (zdarma nad 1 000 Kč)</p>
                                        </div>
                                    </li>
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-base font-medium text-gray-900 dark:text-white">Osobní odběr</p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Vyzvednutí na naší prodejně</p>
                                            <p class="text-sm font-medium text-gray-900 dark:text-white mt-1">Zdarma</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- Payment Options -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Možnosti platby</h3>
                                <ul class="space-y-4">
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-base font-medium text-gray-900 dark:text-white">Platební karta online</p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Visa, Mastercard, Maestro</p>
                                            <p class="text-sm font-medium text-gray-900 dark:text-white mt-1">Zdarma</p>
                                        </div>
                                    </li>
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-base font-medium text-gray-900 dark:text-white">Bankovní převod</p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Platba předem na účet</p>
                                            <p class="text-sm font-medium text-gray-900 dark:text-white mt-1">Zdarma</p>
                                        </div>
                                    </li>
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-base font-medium text-gray-900 dark:text-white">Dobírka</p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Platba při převzetí zboží</p>
                                            <p class="text-sm font-medium text-gray-900 dark:text-white mt-1">+29 Kč</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Shipping Information -->
                        <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Důležité informace</h3>
                            <div class="prose prose-sm max-w-none dark:prose-invert">
                                <p>Objednávky přijaté do 14:00 expedujeme ještě tentýž den. Zboží je odesíláno v pracovní dny pondělí až pátek.</p>
                                <p>V případě, že zboží není skladem, budeme vás kontaktovat s informací o předpokládaném termínu dodání.</p>
                                <p>Při osobním odběru vás budeme informovat e-mailem nebo SMS zprávou, jakmile bude zboží připraveno k vyzvednutí.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Související produkty</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <x-infinite_slider :products="$relatedProducts" />
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Product Page -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Image carousel functionality
        const mainImage = document.getElementById('main-image');
        const carousel = document.getElementById('image-carousel');
        const thumbnails = document.querySelectorAll('.image-thumbnail');
        const prevButton = document.getElementById('prev-image');
        const nextButton = document.getElementById('next-image');
        
        if (thumbnails.length > 0) {
            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    const index = this.getAttribute('data-index');
                    const imgSrc = this.querySelector('img').src;
                    
                    // Update main image
                    mainImage.src = imgSrc;
                    
                    // Update active thumbnail
                    thumbnails.forEach(t => t.classList.remove('ring-2', 'ring-indigo-500', 'dark:ring-indigo-400'));
                    this.classList.add('ring-2', 'ring-indigo-500', 'dark:ring-indigo-400');
                });
            });
            
            // Carousel navigation
            let currentPosition = 0;
            const thumbnailWidth = 88; // 80px width + 8px margin
            const visibleThumbnails = Math.floor(carousel.offsetWidth / thumbnailWidth);
            const maxPosition = Math.max(0, thumbnails.length - visibleThumbnails);
            
            prevButton.addEventListener('click', function() {
                if (currentPosition > 0) {
                    currentPosition--;
                    updateCarouselPosition();
                }
            });
            
            nextButton.addEventListener('click', function() {
                if (currentPosition < maxPosition) {
                    currentPosition++;
                    updateCarouselPosition();
                }
            });
            
            function updateCarouselPosition() {
                carousel.style.transform = `translateX(-${currentPosition * thumbnailWidth}px)`;
            }
        }
        
        // Quantity selector
        const quantityInput = document.getElementById('quantity');
        const decrementBtn = document.querySelector('.decrement-quantity');
        const incrementBtn = document.querySelector('.increment-quantity');
        
        if (quantityInput && decrementBtn && incrementBtn) {
            decrementBtn.addEventListener('click', function() {
                const currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });
            
            incrementBtn.addEventListener('click', function() {
                const currentValue = parseInt(quantityInput.value);
                const maxValue = parseInt(quantityInput.getAttribute('max'));
                if (currentValue < maxValue) {
                    quantityInput.value = currentValue + 1;
                }
            });
        }
        
        // Tab functionality
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');
                
                // Update active tab button
                tabButtons.forEach(btn => {
                    btn.classList.remove('active', 'border-indigo-500', 'text-indigo-600', 'dark:text-indigo-400');
                    btn.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300', 'dark:text-gray-400', 'dark:hover:text-gray-300');
                });
                
                this.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300', 'dark:text-gray-400', 'dark:hover:text-gray-300');
                this.classList.add('active', 'border-indigo-500', 'text-indigo-600', 'dark:text-indigo-400');
                
                // Show active tab content
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });
                
                document.getElementById(`${tabId}-tab`).classList.remove('hidden');
            });
        });
        
        // Review form toggle
        const writeReviewButton = document.getElementById('write-review-button');
        const reviewForm = document.getElementById('review-form');
        const cancelReviewButton = document.getElementById('cancel-review');
        
        if (writeReviewButton && reviewForm) {
            writeReviewButton.addEventListener('click', function() {
                reviewForm.classList.remove('hidden');
                writeReviewButton.classList.add('hidden');
            });
            
            if (cancelReviewButton) {
                cancelReviewButton.addEventListener('click', function() {
                    reviewForm.classList.add('hidden');
                    writeReviewButton.classList.remove('hidden');
                });
            }
        }
        
        // Star rating functionality
        const ratingStars = document.querySelectorAll('.rating-star');
        const ratingInput = document.getElementById('rating');
        const ratingText = document.getElementById('rating-text');
        
        if (ratingStars.length > 0 && ratingInput) {
            const ratingTexts = [
                'Hrozné',
                'Slabé',
                'Průměrné',
                'Dobré',
                'Výborné'
            ];
            
            ratingStars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = parseInt(this.getAttribute('data-rating'));
                    ratingInput.value = rating;
                    
                    // Update stars appearance
                    ratingStars.forEach((s, index) => {
                        const starSvg = s.querySelector('svg');
                        if (index < rating) {
                            starSvg.classList.remove('text-gray-300', 'dark:text-gray-600');
                            starSvg.classList.add('text-yellow-400');
                        } else {
                            starSvg.classList.remove('text-yellow-400');
                            starSvg.classList.add('text-gray-300', 'dark:text-gray-600');
                        }
                    });
                    
                    // Update rating text
                    if (ratingText) {
                        ratingText.textContent = ratingTexts[rating - 1];
                    }
                });
            });
        }
    });
</script>
@endsection