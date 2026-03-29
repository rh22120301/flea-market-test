@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
    <div class="sell-form__content">
        <div class="sell-form__heading">商品の出品</div>
        <form class="form-group" action="/sell" method="post" enctype="multipart/form-data">    
            @csrf

            
            <p class="form-group__detail-title">商品画像</p>
            <div class="form-group__image">
                <label for="image" class="image-select-button">
                    画像を選択する
                </label>
                <input class="image-input" id="image" type="file" name="image">
                <div class="form__error">
                    @error('image')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <p class="form-group__heading">商品の詳細</p>

            <div class="form-group__detail">
                <p class="form-group__detail-title">カテゴリー</p>
                <div class="form-group__category-select">
                    @foreach($categories as $category)
                        <label class="category-select">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                            <span class="category-select__button">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
                <div class="form__error">
                    @error('categories')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-group__detail">
                <p class="form-group__detail-title">商品の状態</p>
                <div class="form-group__condition-select">
                    <select name="condition_id" class="condition-select">
                        <option value="">選択してください</option>
                        @foreach($conditions as $condition)
                            <option value="{{ $condition->id }}">{{ $condition->condition }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__error">
                    @error('condition_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <p class="form-group__heading">商品名と説明</p>

            <div class="form-group__detail">
                <p class="form-group__detail-title">商品名</p>
                <input class="form-group__detail-input" type="text" name="name">
                <div class="form__error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-group__detail">
                <p class="form-group__detail-title">ブランド名</p>
                <input class="form-group__detail-input" type="text" name="brand">
                <div class="form__error">
                    @error('brand')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-group__detail">
                <p class="form-group__detail-title">商品の説明</p>
                <input class="form-group__detail-input" type="text" name="detail">
                <div class="form__error">
                    @error('detail')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-group__detail">
                <p class="form-group__detail-title">販売価格</p>
                <input class="form-group__detail-input" type="text" name="price">
                <div class="form__error">
                    @error('price')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <button class="form__button-submit" type="submit">出品する</button>
        
        </form>
    </div>
@endsection