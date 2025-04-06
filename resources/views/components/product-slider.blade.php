<!-- Products Horizontal Scroll Section -->
<div class="py-10 bg-gray-100 dark:bg-gray-900">
    <h2 class="text-gray-900 text-3xl font-BebasNeue text-center">Naše Produkty</h2>
    <div class="overflow-x-auto mt-6">
        <div class="flex space-x-4">
            @foreach($products as $product)
            <div class="flex-shrink-0 w-64">
    <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col justify-between h-full">
        <!-- Product Images Section -->
        <div class="flex overflow-x-auto space-x-2 mb-4">
            @if($product->images && count($product->images) > 0)
                @foreach($product->images as $image)
                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $product->name }}" class="object-cover w-full h-48 rounded-md">
                @endforeach
            @else
                <!-- Náhradní obrázek, pokud nejsou obrázky -->
                <img src="{{ asset('storage/default.jpg') }}" alt="No Image" class="object-cover w-full h-48 rounded-md">
            @endif
        </div>
        <!-- End Product Images Section -->

        <!-- Product Details Section -->
        <div class="p-4 flex flex-col flex-grow">
            <div class="flex-grow">
                <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                <p class="mt-2 text-gray-600">{{ $product->description }}</p>
                <p>
                    Hodnocení:
                    <strong>
                        {{ number_format($product->averageRating(), 1) }} ⭐
                    </strong>
                    <span class="text-gray-400">({{ $product->reviews->count() }}x)</span>
                </p>
            </div>
            <div class="mt-4">
                <p class="text-xl font-bold">{{ number_format($product->price, 2) }} Kč</p>
            </div>
        </div>

        <!-- Product Button Section -->
        <div class="p-4">
            <a href="{{ route('products.show', $product->id) }}" 
               class="btn btn-primary inline-block px-6 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-300 hover:shadow-lg transition-all duration-300">
                Zobrazit detaily
            </a>
        </div>
    </div>
</div>
            @endforeach
        </div>
    </div>
</div>
