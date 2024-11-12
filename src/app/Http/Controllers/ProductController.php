<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Support\Facades\Date;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ProductController extends Controller
{
    public function products()
    {
        $seasons = Season::all();
        $products = Product::with('season')->paginate(6);

        return view('products', compact('seasons', 'products'));
    }

    /*
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Product::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{keyword}%");
        }

        $products = $query->get();

        return view('products', compact('products', 'keyword'));
    }
    */
    public function search(Request $request)
    {
        $products = Product::with('season')->KeyWordSearch($request->keyword)->get();
        $seasons = Season::all();

        return view('products', compact('products', 'seasons'));
    }


    public function detail(Request $request)
    {
        $product = Product::with('season')->find($request->product_id);
        $seasons = Season::all();
        return view('detail', compact('product', 'season'));
    }

    public function register()
    {
        return view('register');
    }

}
