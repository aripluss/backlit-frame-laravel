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
        // $items = $catalogItems;
        if ($category) {
            // $items = array_filter($items, fn($item) => ($item['category'] ?? '') === $category);
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

        // $totalItems = count($items);
        // $totalPages = max(1, ceil($totalItems / $itemsPerPage));

        // $currentPage = min($currentPage, $totalPages);

        // $offset = ($currentPage - 1) * $itemsPerPage;
        // $paginatedItems = array_slice($items, $offset, $itemsPerPage);
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
