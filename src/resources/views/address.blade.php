@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection

@section('content')
    <div class="address-form__content">
        <div class="address-form__heading">住所の変更</div>
        <form class="form" action="{{ route('address.update', ['product_id' => $product_id]) }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product_id }}">

            
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
                <div class="form__title">建物名</div>
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
