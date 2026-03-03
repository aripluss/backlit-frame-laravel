<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController
{
    public function index(Request $request)
    {
        // GET
        $category = $request->query('category', '');
        $searchQuery = $request->query('q', '');
        $currentPage = max(1, (int) $request->query('page', 1));

        $query = Product::with(['category', 'tags']);

        // filtration
        if ($category) {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('name', $category);
            });
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
