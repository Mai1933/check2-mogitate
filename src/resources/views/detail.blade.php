@extends('layouts/common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<main>
  <div class="products">
    <div class="products_content">
      <div class="products_content_index">
        <a href="/products" class="index_link">商品一覧</a>
        <span class="index_fruit">>キウイ</span>
      </div>
      <form action="/products/update" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="products_content_info-wrap">
          <div class="info_imgs">
            <input type="hidden" name="id" value="{{ $product->id }}">
            <img src="{{ asset('storage/' . $product->image) }}" alt="fruit" class="upload_img">
            <input type="file" name="image" accept="image/png, image/jpeg" class="input_img"
              value="{{ asset('storage/' . $product->image) }}">
            <p class="info_error-message">
              @error('image')
          {{ $message }}
        @enderror
            </p>
          </div>
          <div class="info_others">
            <p class="info_name">商品名</p>
            <input type="text" name="name" placeholder="商品名を入力" value="{{ $product->name }}" class="input_name">
            <p class="info_error-message">
              @error('name')
          {{ $message }}
        @enderror
            </p>
            <p class="info_name">値段</p>
            <input type="number" name="price" placeholder="値段を入力" value="{{ $product->price }}" class="input_name">
            <p class="info_error-message">
              @error('price')
          {{ $message }}
        @enderror
            </p>
            <p class="info_name">季節</p>
            <input type="checkbox" name="season_id" class="input_season" value="1" id="check1">
            <label for="check1" class="season_label">春</label>
            <input type="checkbox" name="season_id" class="input_season" value="2" id="check2">
            <label for="check2" class="season_label">夏</label>
            <input type="checkbox" name="season_id" class="input_season" value="3" id="check3">
            <label for="check3" class="season_label">秋</label>
            <input type="checkbox" name="season_id" class="input_season" value="4" id="check4">
            <label for="check4" class="season_label">冬</label>
            <p class="info_error-message">
              @error('season_id')
          {{ $message }}
        @enderror
            </p>
          </div>
        </div>
        <div class="products_content_info-descriptions">
          <p class="info_name">商品説明</p>
          <textarea class="input_detail" name="description"
            placeholder="商品の説明を入力">{{ $product->description }}</textarea>
          <p class="info_error-message">
            @error('detail')
        {{ $message }}
      @enderror
          </p>
        </div>
        <div class="products_content_buttons">
          <a href="/products" class="button_back" type="submit" name="back">戻る</a>
          <button class="button_store" type="submit" name="send">変更を保存</button>
          <button class="button_delete" type="submit" name="delete"><img src="{{ asset('storage/trash.png') }}"
              alt="delete" class="button_delete-img"></button>
        </div>
      </form>
    </div>
  </div>
</main>
@endsection