<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CatalogController
{
    public function index(Request $request, $id = null)
    {
        // GET
        $searchQuery = $request->query('q', '');
        $currentPage = max(1, (int) $request->query('page', 1));

        $query = Product::with(['category', 'tags']);

        // filtration
        $category = null; // дефолт для випадку без фільтра
        $categoryName = $request->query('category', null);
        if ($categoryName) {
            $category = Category::where('name', $categoryName)->firstOrFail();
            $query->where('category_id', $category->id);
        }

        // search
        if ($searchQuery) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('title', 'like', "%{$searchQuery}%")
                    ->orWhere('text', 'like', "%{$searchQuery}%")
                    ->orWhere('description', 'like', "%{$searchQuery}%");
            });
        }

        // pagination
        $itemsPerPage = 12;
        $paginatedItems = $query->orderBy('id', 'asc')
            ->paginate($itemsPerPage, ['*'], 'page', $currentPage);


        // -> Blade
        return view('catalog', [
            'catalogItems' => $paginatedItems,
            'totalPages' => $paginatedItems->lastPage(),
            'currentPage' => $paginatedItems->currentPage(),
            'category' => $category,
            'searchQuery' => $searchQuery,
        ]);
    }
}
