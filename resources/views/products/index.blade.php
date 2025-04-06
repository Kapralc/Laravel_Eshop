@extends('layouts.app')

@section('content')
<div class="h-20"></div>
<div class="container py-10 mx-auto mt-8">
    <h1 class="text-3xl font-semibold font-BebasNeue text-center mb-8 text-black mt-8">Naše Produkty</h1>

    <style>
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .product-card {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-card .product-description {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .btn-primary {
            display: block;
            text-align: center;
            padding: 10px;
            background-color: blue; 
            color: white;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;     
        }

        .btn-primary:hover {
            background-color: blue;
        }
    </style>

<div class="mb-6">
    <!-- Tlačítko pro zobrazení/skrytí filtrování -->
    <button id="toggleFilter" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition flex items-center space-x-2">
        <!-- Ikona filtru -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707v4.586a1 1 0 01-.293.707l-2 2A1 1 0 0110 20v-6.586a1 1 0 00-.293-.707L3.293 6.707A1 1 0 013 6V4z" />
        </svg>
        <span></span>
    </button>

    <!-- Filtrovací formulář (skrytý ve výchozím stavu) -->
    <form id="filterForm" method="GET" action="{{ route('products.index') }}" class="mt-4 p-4 bg-gray-100 rounded-lg shadow-md w-full sm:w-1/3 hidden">
        <!-- Třídění -->
        <div class="mb-4">
            <label for="sort_by" class="block text-lg font-semibold mb-2">Seřadit podle:</label>
            <select name="sort_by" id="sort_by" class="p-2 border font-semibold font-Roboto border-gray-300 rounded w-full">
                <option value="name_asc" {{ request('sort_by') == 'name_asc' ? 'selected' : '' }}>Název (A-Z)</option>
                <option value="name_desc" {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Název (Z-A)</option>
                <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Cena (nejnižší)</option>
                <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Cena (nejvyšší)</option>
            </select>
        </div>

        <!-- Filtrování podle ceny -->
        <div class="mb-4">
            <label for="price_range" class="block text-lg font-semibold mb-2">Rozsah ceny:</label>
            <div class="flex items-center space-x-4">
                <input type="number" name="min_price" id="min_price" value="{{ request('min_price', 0) }}" 
                       class="p-2 border font-semibold font-Roboto border-gray-300 rounded w-1/2" placeholder="Min">
                <input type="number" name="max_price" id="max_price" value="{{ request('max_price', 10000) }}" 
                       class="p-2 border font-semibold font-Roboto border-gray-300 rounded w-1/2" placeholder="Max">
            </div>
        </div>

        <!-- Tlačítko pro odeslání -->
        <div class="flex justify-end">
            <button type="submit" class="btn-primary font-semibold font-Roboto px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                Filtrovat
            </button>
        </div>
    </form>
</div>

<script>
    // JavaScript pro zobrazení/skrytí filtrovacího formuláře
    document.getElementById('toggleFilter').addEventListener('click', function () {
        const filterForm = document.getElementById('filterForm');
        filterForm.classList.toggle('hidden'); // Přepíná třídu 'hidden'
    });
</script>

    <div class="product-grid font-semibold font-Roboto">
    @foreach($products as $product)
    <div class="product-card flex flex-col justify-between">
        <img src="{{ isset($product->images[0]) ? asset('storage/' . $product->images[0]) : asset('storage/default.png') }}" 
             alt="{{ $product->name }}" 
             class="product-image">
        <div class="p-4 flex-grow">
            <h2 class="text-xl font-BebasNeue mb-2 text-center">{{ $product->name }}</h2>
            <p class="text-gray-600 mb-4 product-description">{{ $product->description }}</p>
            <p>
                Hodnocení:
                <strong class="flex-col justify-between">
                    {{ $product->reviews->count() > 0 ? number_format($product->averageRating(), 1) . '⭐' : 'Neohodnoceno⭐' }}
                </strong>
                <span class="text-gray-400">
                    ({{ $product->reviews->count() }}x)
                </span>
            </p>
        </div>
        <div class="p-4">
            <p class="font-bold text-lg text-black mb-4 text-center">Cena: {{ $product->price }} Kč</p>
            <a href="{{ route('products.show', $product->id) }}" class="btn-primary">Zobrazit detaily</a>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection
