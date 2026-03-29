@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <div class="detail-content">
        <div class="detail-content__image">
            <img class="detail-image" src="{{ asset('storage/' . $product->image) }}" alt="画像">
        </div>

        <div class="detail-content__text">
            <div class="detail-group">
                <p class="detail-name">{{ $product->name }}</p>
                <p class="detail-text">{{ $product->brand }}</p>
            </div>

            <div class="detail-group">
                <div class="detail-price">
                    <span class="yen">￥</span>
                    <p class="price">{{ number_format($product->price) }}</p>
                    <span class="tax">(税込)</span>
                </div>
            </div>

            <div class="icon-group">
                <!-- いいね機能 -->
                @if($liked)
                    <form action="{{ route('products.unlike', $product->id) }}" method="POST">
                        @csrf
                        <div class="react-group">
                            <button class="unliked-button">
                                <img src="{{ asset('img/ハートロゴ_ピンク.png') }}" class="like-icon">
                            </button>
                            <p class="number-count">{{ $product->mylists->count() }}</p>
                        </div>
                    </form>
                @else
                    <form action="{{ route('products.like', $product->id) }}" method="POST">
                        @csrf
                        <div class="react-group">
                            <button class="liked-button">
                                <img src="{{ asset('img/ハートロゴ_デフォルト.png') }}" class="like-icon">
                            </button>
                            <p class="number-count">{{ $product->mylists->count() }}</p>
                        </div>
                    </form>
                @endif
                
                <div class="react-group">
                    <img src="{{ asset('img/ふきだしロゴ.png') }}" class="comment-icon">
                    <p class="number-count">{{ $product->comments->count() }}</p>
                </div>
            </div>

            <a class="purchase-button" href="/purchase/{{ $product->id }}">購入手続きへ</a>
            
            <div class="detail-group">
                <p class="detail-title">商品説明</p>
                <p class="detail-text">{{ $product->detail }}</p>
            </div>

            <p class="detail-title">商品の情報</p>

            <div class="category-group">
                <p class="category-title">カテゴリ</p>
                @foreach ($product->categories as $category)
                    <p class="category-text">{{ $category->name }}</p>
                @endforeach
            </div>

            <div class="condition-group">
                <p class="condition-title">商品の状態</p>
                <p class="condition-text">{{ $product->condition->condition }}</p>
            </div>

            <p class="comment-title">コメント({{ $product->comments->count() }})</p>

            @forelse($product->comments as $comment)
                <div class="detail-group">
                    <div class="comment-user">
                        <img class="user-image" src="{{ asset('storage/' . $comment->user->image) }}" alt="画像">
                        <p class="user-name">{{ $comment->user->name }}</p>
                    </div>
                    <p class="comment-detail">{{ $comment->detail }}</p>
                </div>
            @empty
                <div class="detail-group">
                    <p class="no-comment">まだコメントはありません。</p>
                </div>
            @endforelse

            
            <form action="{{ route('products.comment', $product->id) }}" method="POST">
            @csrf
                <p class="detail-title">商品へのコメント</p>
                <textarea class="comment-form" name="detail" rows="10"></textarea>
                <div class="form__error">
                    @error('detail')
                        {{ $message }}
                    @enderror
                </div>

                <button class="comment-button" type="submit">コメントを送信する</button>
            </form>        

        </div>
    </div>
@endsection