<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredProducts = Product::where('is_featured', true)
            ->latest()
            ->take(4)
            ->get();

        $categories = Product::query()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('home', [
            'featuredProducts' => $featuredProducts,
            'categories' => $categories,
        ]);
    }
}
