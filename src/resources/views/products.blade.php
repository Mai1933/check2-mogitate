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
        <form action="products/search">
          @csrf
          <div class="search_name">
            <input type="text" class="search_name_input" name="name" placeholder="商品名で検索">
            <button class="search_name_submit" type="submit">検索</button>
          </div>
          <div class="search_sort">
            <p class="search_sort_ttl">価格順で表示</p>
            <select name="price" id="" class="search_sort_select">
              <option value="">価格で並べ替え</option>
              <option value="">高い順に表示</option>
              <option value="">安い順に表示</option>
            </select>
          </div>
        </form>
      </div>
      <div class="products_content_cards">
        <div class="card">
          <img src="img/muscat.png" alt="fruit" class="card_img" width="374px" height="281px">
          <div class="card_names">
            <span class="card_names-name">キウイ</span>
            <span class="card_names-price">￥800</span>
          </div>
        </div>
        <div class="card">
          <img src="img/muscat.png" alt="fruit" class="card_img" width="374px" height="281px">
          <div class="card_names">
            <span class="card_names-name">キウイ</span>
            <span class="card_names-price">￥800</span>
          </div>
        </div>
        <div class="card">
          <img src="img/muscat.png" alt="fruit" class="card_img" width="374px" height="281px">
          <div class="card_names">
            <span class="card_names-name">キウイ</span>
            <span class="card_names-price">￥800</span>
          </div>
        </div>
        <div class="card">
          <img src="img/muscat.png" alt="fruit" class="card_img" width="374px" height="281px">
          <div class="card_names">
            <span class="card_names-name">キウイ</span>
            <span class="card_names-price">￥800</span>
          </div>
        </div>
        <div class="card">
          <img src="img/muscat.png" alt="fruit" class="card_img" width="374px" height="281px">
          <div class="card_names">
            <span class="card_names-name">キウイ</span>
            <span class="card_names-price">￥800</span>
          </div>
        </div>
        <div class="card">
          <img src="img/muscat.png" alt="fruit" class="card_img" width="374px" height="281px">
          <div class="card_names">
            <span class="card_names-name">キウイ</span>
            <span class="card_names-price">￥800</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection