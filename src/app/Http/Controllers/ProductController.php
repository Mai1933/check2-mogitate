<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ProductController extends Controller
{
    public function products()
    {
        $seasons = Season::all();
        $products = Product::with('seasons')->paginate(6);
        $sort = null;

        return view('products', compact('seasons', 'products', 'sort'));
    }

    public function search(Request $request)
    {
        $query = Product::with('seasons')->KeyWordSearch($request->keyword);

        if ($request->has('sort')) {
            if ($request->sort === '1') {
                $query->orderBy('price', 'desc');
            } elseif ($request->sort === '2') {
                $query->orderBy('price', 'asc');
            }
        }

        $products = $query->paginate(6)->withQueryString();
        $seasons = Season::all();
        $sort = $request->sort;

        return view('products_result', compact('products', 'seasons', 'sort'));
    }

    public function register()
    {
        return view('register');
    }

    public function detail($id)
    {
        $product = Product::find($id);
        $seasons = $product->seasons;
        return view('detail', compact('product', 'seasons'));
    }

    public function update(ProductRequest $request)
    {
        if ($request->has('delete')) {
            Product::find($request->id)->delete();
            return redirect('/products');
        }

        $productData = $request->only(['name', 'price', 'description']);
        $file_name = $request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('public', $file_name);
        $productData['image'] = $file_name;

        $product = Product::find($request->id);
        $product->update($productData);
        $product->seasons()->sync($request->season_id);

        return redirect('/products');
    }


    public function create(RegisterRequest $request)
    {
        $product = $request->only(['name', 'price', 'description']);
        $file_name = $request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('public', $file_name);
        $product['image'] = $file_name;

        Product::create($product);
        $product->seasons()->sync($request->season_id);
        return redirect('/products');
    }
}
