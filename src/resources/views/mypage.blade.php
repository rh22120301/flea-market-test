@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    <div class="mypage-top">
        <div class="mypage-user">
            <img class="user-image" src="{{ asset('storage/' . $user->image) }}" alt="画像">
            <p class="user-name">{{ $user->name }}</p>
        </div>
        <a class="profile-page" href="/mypage/profile">プロフィールを編集</a>

    </div>

    <div class="tabs">
        <a href="/mypage?tab=selluser" class="tab {{ $tab === 'selluser' ? 'active' : '' }}">出品した商品</a>
        <a href="/mypage?tab=buyuser" class="tab {{ $tab === 'buyuser' ? 'active' : '' }}">購入した商品</a>
    </div>

    <div class="tab-content">
        @if ($tab === 'selluser')
            @include('mypage.tabs.selluser')
        @elseif ($tab === 'buyuser')
            @include('mypage.tabs.buyuser')
        @endif
    </div>



@endsection