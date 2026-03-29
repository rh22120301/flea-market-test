@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
    <div class="purchase-content">
        <div class="content-left">
            <div class="product-detail">
                <div class="purchase-content__image">
                    <img class="product-image" src="{{ asset('storage/' . $product->image) }}" alt="画像" width="400px">
                </div>

                <div class="purchase-content__product">
                    <p class="product-name">{{ $product->name }}</p>
                    <p class="product-price">￥{{ number_format($product->price) }}（税込）</p>
                </div>
            </div>

            <!-- 支払い方法選択 -->
            <div class="purchase-group">
                <p class="purchase-group__title">支払い方法</p>
                <div class="purchase-group__detail">
                    <form action="{{ route('purchase.pay.store') }}" method="post">
                        @csrf
                        <select class="pay-select" name="pay_id" onchange="this.form.submit()">
                            <option value="">選択してください</option>
                            @foreach($pays as $pay)
                                <option value="{{ $pay->id }}"
                                    {{ session('purchase_pay_id') == $pay->id ? 'selected' : '' }}>
                                    {{ $pay->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                    <div class="form__error">
                    @error('pay_id')
                        {{ $message }}
                    @enderror
                    </div>
                </div>
            </div>

            <div class="purchase-group">
                <div class="purchase-group__title">
                    配送先
                    <a class="update-address" href="{{ route('address', ['product_id' => $product->id]) }}">変更する</a>
                </div>
                <div class="purchase-group__detail">
                    <p>〒{{ $postcode }}</p>
                    <p>{{ $address }}</p>
                    <p>{{ $building }}</p>
                </div>
                <div class="form__error">
                    @error('postcode')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form__error">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>

        </div>


        <div class="content-right">
            <table class="price-table">
                <tr class="price-tr">
                    <td class="price-td__title">商品代金</td>
                    <td class="price-td__detail">￥{{ number_format($product->price) }}</td>
                </tr>
                <tr class="price-tr">
                    <td class="price-td__title">支払い方法</td>
                    <td class="price-td__detail">
                        {{ session('purchase_pay_id') 
                            ? $pays->firstWhere('id', session('purchase_pay_id'))->name 
                            : '未選択' }}
                    </td>
                </tr>
            </table>

            <form action="{{ route('purchase.store', ['product_id' => $product->id]) }}" method="post">
                @csrf
                <input type="hidden" name="pay_id" value="{{ session('purchase_pay_id') }}">
                <input type="hidden" name="postcode" value="{{ $postcode }}">
                <input type="hidden" name="address" value="{{ $address }}">
                <input type="hidden" name="building" value="{{ $building }}">
                <button class="button-submit" type="submit">購入する</button>
            </form>

            @if ($errors->has('product'))
                <div class="error-box">
                    <p class="error-message">{{ $errors->first('product') }}</p>
                </div>
            @endif

        </div>
    </div>
@endsection
