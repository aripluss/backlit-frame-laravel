<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductPageController extends Controller
{
    public function show(Request $request, $id)
    {
        $catalogItems = include base_path('data/catalog-items.php');

        $productData = collect($catalogItems)->firstWhere('id', (int) $id);

        if (!$id) {
            return redirect()->route('catalog');
        }

        if (!$productData) {
            abort(404);
            // return redirect()->route('catalog');
        }

        $product = new Product(
            $productData['id'],
            $productData['title'],
            $productData['category'],
            $productData['image'],
            $productData['origin'],
            $productData['benefit'],
            $productData['description'],
            $productData['basePrice'],
            $productData['sizes']
        );

        $product->selectedSize = $request->query('size', $product->selectedSize);

        $product->customDesign = $request->query('custom') == '1';
        // $product->customDesign = $request->boolean('custom');

        $price = $product->getPrice();

        // AJAX-запит
        if ($request->query('ajax') === '1') {
            return response()->json([
                'price' => $price,
                'selectedSize' => $product->selectedSize,
                'customDesign' => $product->customDesign,
            ]);
        }

        // -> Blade
        return view('product', [
            'product' => $product,
            'price' => $price,
        ]);
    }
}
