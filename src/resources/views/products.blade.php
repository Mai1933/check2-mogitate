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
        <form action="products/search" method="post" id="search">
          @csrf
          <div class="search_name">
            <input type="text" class="search_name_input" name="keyword" placeholder="商品名で検索"
              value="{{ old('keyword') }}">
            <button class="search_name_submit" type="submit">検索</button>
          </div>
        <!--</form>
        <form action="products/sort" method="post">
          @csrf-->
          <p class="search_sort_ttl">価格順で表示</p>
          <select name="sort" id="" class="search_sort_select" onchange="submit(this.form)">
            <option value="" disabled selected>価格で並べ替え</option>
            <option value="1" name="sort">高い順</option>
            <option value="2" name="sort">安い順</option>
          </select>
        </form>
      </div>
      <div class="products_content_cards">
        @foreach ($products as $product)
      <div class="card">
        <a class="card_button" href="{{ route('product.detail', ['id' => $product->id]) }}">
        <img src="{{ asset('storage/' . $product->image) }}" alt="fruit" class="card_img"
          style="width: 100%; aspect-ratio: 1.38/1;">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="card_names">
          <span class="card_names-name">{{ $product->name }}</span>
          <span class="card_names-price">￥{{ $product->price }}</span>
        </div>
        </a>
      </div>
    @endforeach
        {{ $products->links() }}
      </div>
    </div>
</main>
@endsection