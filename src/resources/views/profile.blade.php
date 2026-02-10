@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')

<div class="header">
    <a class="header__logo" href="/">
        COACHTECH
    </a>     
</div>

<div class="profile-form__content">
    <div class="profile-form__heading">プロフィール設定</div>
    <form >
        @csrf
        <label for="image" class="image-button">画像を選択する</label>
        <input class="image-input" id="image" type="file" name="image">
        
        <div class="form-group">
            <div class="form__title">ユーザー名</div>
                <input class="form__input" type="text" name="name">
            <div class="form__error">
            @error('name')
                {{ $message }}
            @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="form__title">郵便番号</div>
                <input class="form__input" type="text" name="postcode">
            <div class="form__error">
            @error('postcode')
                {{ $message }}
            @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="form__title">住所</div>
                <input class="form__input" type="text" name="address">
            <div class="form__error">
            @error('address')
                {{ $message }}
            @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="form__title">建物</div>
                <input class="form__input" type="text" name="building">
            <div class="form__error">
            @error('building')
                {{ $message }}
            @enderror
            </div>
        </div>

        <button class="form__button-submit" type="submit">更新する</button>


    </form>
</div>

@endsection
