<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Načte všechny produkty z databáze
        $products = Product::all();

        // Předá produkty do view
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Vytvoření produktu
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validace pro obrázky
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|max:255|unique:products',
            'in_stock' => 'required|integer',
            'images' => 'nullable|array', // pro více obrázků
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validace pro každý obrázek
        ]);

        // Uložení obrázků, pokud nějaké existují
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('gallery', 'public');
            }
        }

        // Uložení produktu do databáze
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'sku' => $request->sku,
            'in_stock' => $request->in_stock,
            'images' => $imagePaths, // uložené obrázky jako pole
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(10)
            ->get();

        // Předá produkt do view
        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Vyhledávání produktů podle názvu nebo popisu
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();
    
        // Vrátí pohled s výsledky vyhledávání
        return view('products.search-results', compact('products', 'query'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Editace produktu
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Aktualizace produktu
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Odstranění produktu
    }
}
