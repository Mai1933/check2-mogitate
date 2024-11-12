@extends('layouts/common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
<main>
  <div class="products">
    <div class="products_ttls">
      <span class="products_ttls-ttl">商品一覧</span>
      <a href="/products/register" class="products_ttls-register">+商品を追加</a>
    </div>
    <div class="products_content">
      <div class="products_content_search">
        <form action="products/search" method="=get">
          @csrf
          <div class="search_name">
            <input type="text" class="search_name_input" name="keyword" placeholder="商品名で検索"
              value="{{ old('keyword') }}">
            <button class="search_name_submit" type="submit">検索</button>
          </div>
          <!--<div class="search_sort">
            <p class="search_sort_ttl">価格順で表示</p>
            <select name="price" id="" class="search_sort_select">
              <option value="">価格で並べ替え</option>
              <option value="">高い順に表示</option>
              <option value="">安い順に表示</option>
            </select>
          </div>-->
        </form>
      </div>
      <div class="products_content_cards">
        @foreach ($products as $product)
      <div class="card">
        <form action="products/" method="get">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button type="submit" class="card_button">
          <img src="{{ asset('images/' . $product->image) }}" alt="fruit" class="card_img"
          style="width: 100%; height: auto;">
          <div class="card_names">
          <span class="card_names-name">{{ $product->name }}</span>
          <span class="card_names-price">￥{{ $product->price }}</span>
          </div>
        </button>
        </form>
      </div>
    @endforeach
        @if (count($products) > '6')
      {{ $products->links() }}
    @endif
      </div>
    </div>
  </div>
</main>
@endsection