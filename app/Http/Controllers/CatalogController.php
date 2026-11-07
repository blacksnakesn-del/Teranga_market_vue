<?php
namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CatalogController extends Controller
{
    public function index(Request $request) {
        $categories = Categories::orderBy('name')
            ->get()
            ->map(fn ($categories) => $categories->toCatalogArray());
        
        $products = Products::where('active', true)
            ->orderBy('name')
            ->get()
            ->map(fn($products) => $products->toCatalogArray());

        return Inertia::render('home/Catalog', [
            'categories' => $categories,
            'products' => $products,
            'isHome' => $request->routeIs('home'),
            'initialSearch' =>(string) $request->query('q', ''),
            'initialCategorie' => (string) $request->query('categories', '')
        ]);
    }
}
