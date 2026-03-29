@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <div class="profile-form__content">
        <div class="profile-form__heading">プロフィール設定</div>
        <form class="form" action="/mypage/profile" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="profile-user">
                @if($user->image)
                    <img class="user-image" src="{{ asset('storage/' . $user->image) }}" class="profile-image-preview">
                @endif
                
                <input class="image-input" id="image" type="file" name="image">
            </div>

            <div class="form__error">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            
            <div class="form-group">
                <div class="form__title">ユーザー名</div>
                    <input class="form__input" type="text" name="name" value="{{ old('name', $user->name) }}">
                <div class="form__error">
                @error('name')
                    {{ $message }}
                @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form__title">郵便番号</div>
                    <input class="form__input" type="text" name="postcode" value="{{ old('postcode', $user->postcode) }}">
                <div class="form__error">
                @error('postcode')
                    {{ $message }}
                @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form__title">住所</div>
                    <input class="form__input" type="text" name="address" value="{{ old('address', $user->address) }}">
                <div class="form__error">
                @error('address')
                    {{ $message }}
                @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form__title">建物</div>
                    <input class="form__input" type="text" name="building" value="{{ old('building', $user->building) }}">
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
