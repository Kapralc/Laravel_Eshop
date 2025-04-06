@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Výsledky vyhledávání pro: "{{ $query }}"</h1>

    @if($products->isEmpty())
        <p class="text-gray-600">Žádné produkty nebyly nalezeny.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-lg font-bold">{{ $product->name }}</h2>
                    <p class="text-gray-600">{{ $product->description }}</p>
                    <p class="text-blue-500 font-bold mt-2">{{ $product->price }} Kč</p>
                    <a href="{{ route('products.show', $product->id) }}" class="text-blue-500 hover:underline">Zobrazit detaily</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection