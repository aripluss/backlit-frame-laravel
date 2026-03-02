<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['category', 'tags'])->get(); // завантажує продукти разом з категоріями і тегами
        // $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Display the specified resource.
     */

    public function show(Request $request, string $id)
    {

        if (!$id) {
            return redirect()->route('catalog');
        }

        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $product->load(['category', 'tags']);

        $product->selectedSize = $request->query('size', $product->sizes[0] ?? null);

        $product->customDesign = $request->query('custom') == '1';

        $price = $product->getPrice();
        $discountedPrice = $product->getDiscountedPrice();

        // AJAX-запит
        if ($request->query('ajax') === '1') {
            return response()->json([
                'price' => $price,
                'discountedPrice' => $discountedPrice,
                'selectedSize' => $product->selectedSize,
                'customDesign' => $product->customDesign,
            ]);
        }

        // -> Blade
        return view('product', [
            'product' => $product,
            'price' => $price,
            'discountedPrice' => $discountedPrice,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
