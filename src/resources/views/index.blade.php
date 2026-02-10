@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="header">
    
    <ul class="header-nav">
        <div class="header-title">
            <a class="header__logo" href="/">COACHTECH</a>
        </div>

        <form class="search-form">
            <input class="search-form__item-input" type="text" name="keyword" placeholder="何をお探しですか？">
        </form>

        <div class="header-action">
            @if (Auth::check())
            <li class="header-nav__item">
                <form action="/logout" method="post">
                @csrf
                <button class="header-nav__button">ログアウト</button>
                </form>
            </li>
            @else
            <li class="header-nav__item">
                <a href="/login">ログイン</a>
            </li>
            @endif

            <li class="header-nav__item">
                <a class="header-nav__link" href="/mypage">マイページ</a>
            </li>
            <li class="header-nav__item">
                <a class="header-nav__link" href="/sell">出品</a>
            </li>
        </div>
    </ul>
</div>

<div class="tabs">
    <a href="/?tab=default" class="tab {{ $tab === 'default' ? 'active' : '' }}">おすすめ</a>
    <a href="/?tab=mylist" class="tab {{ $tab === 'mylist' ? 'active' : '' }}">マイリスト</a>
</div>

<div class="tab-content">
    @if ($tab === 'default')
        @include('tabs.default')
    @elseif ($tab === 'mylist')
        @include('tabs.mylist')
    @endif
</div>

@endsection
