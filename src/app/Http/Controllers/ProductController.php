<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\RegisterRequest;
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
        $products = Product::with('seasons')->paginate(6);

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
        $products = Product::with('seasons')->KeyWordSearch($request->keyword)->paginate(6);
        $seasons = Season::all();

        return view('products', compact('products', 'seasons'));
    }

    public function register()
    {
        return view('register');
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

}
