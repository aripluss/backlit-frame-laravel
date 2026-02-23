<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController
{
    public function index(Request $request)
    {
        $catalogItems = include base_path('data/catalog-items.php');

        // GET
        $category = $request->query('category', '');
        $currentPage = max(1, (int) $request->query('page', 1));

        // filtration
        $items = $catalogItems;
        if ($category) {
            $items = array_filter($items, fn($item) => ($item['category'] ?? '') === $category);
        }

        // pagination
        $itemsPerPage = 12;

        $totalItems = count($items);
        $totalPages = max(1, ceil($totalItems / $itemsPerPage));

        $currentPage = min($currentPage, $totalPages);

        $offset = ($currentPage - 1) * $itemsPerPage;
        $paginatedItems = array_slice($items, $offset, $itemsPerPage);

        // -> Blade
        return view('catalog', [
            'catalogItems' => $paginatedItems,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
            'category' => $category,
        ]);
    }
}
