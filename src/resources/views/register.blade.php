@extends('layouts/common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<main>
  <div class="register">
    <div class="register_content">
      <p class="register_form-ttl">商品登録</p>
      <form action="" class="register_form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input_ttls_row">
          <span class="input_ttl">商品名</span>
          <span class="input_require">必須</span>
        </div>
        <input type="text" name="name" class="input_content" placeholder="商品名を入力">

        <div class="input_ttls_row">
          <span class="input_ttl">値段</span>
          <span class="input_require">必須</span>
        </div>
        <input type="number" name="price" class="input_content" placeholder="値段を入力">

        <div class="input_ttls_row">
          <span class="input_ttl">商品画像</span>
          <span class="input_require">必須</span>
        </div>
        <input type="file" name="image" accept="image/png, image/jpeg" class="input_img">

        <div class="input_ttls_row">
          <span class="input_ttl">季節</span>
          <span class="input_require">必須</span>
          <span class="input_multiple">複数選択可</span>
        </div>
        <input type="checkbox" name="season_id" class="input_season" value="1" id="check1">
        <label for="check1" class="season_label">春</label>
        <input type="checkbox" name="season_id" class="input_season" value="2" id="check2">
        <label for="check2" class="season_label">夏</label>
        <input type="checkbox" name="season_id" class="input_season" value="3" id="check3">
        <label for="check3" class="season_label">秋</label>
        <input type="checkbox" name="season_id" class="input_season" value="4" id="check4">
        <label for="check4" class="season_label">冬</label>

        <div class="input_ttls_row">
          <span class="input_ttl">商品説明</span>
          <span class="input_require">必須</span>
        </div>
        <textarea class="input_detail" name="description" placeholder="商品の説明を入力">あ</textarea>

        <div class="products_content_buttons">
          <button class="button_back" type="submit" name="back">戻る</button>
          <button class="button_store" type="submit" name="send">登録</button>
        </div>
      </form>
    </div>
  </div>

</main>
@endsection