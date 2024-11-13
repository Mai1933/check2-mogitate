<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
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


    public function detail($id)
    {
        $product = Product::find($id);
        return view('detail', compact('product'));
    }

    public function register()
    {
        return view('register');
    }

    public function update(ProductRequest $request)
    {
        $product = $request->only(['name', 'price', 'season_id', 'description']);
        $file_name = $request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('public', $file_name);
        $product['image'] = $file_name;

        Product::find($request->id)->update($product);

        return redirect('/products');
    }

}
