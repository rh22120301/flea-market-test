@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="tabs">
        <a href="/?tab=default&keyword={{ request('keyword') }}" class="tab {{ $tab === 'default' ? 'active' : '' }}">おすすめ</a>
        <a href="/?tab=mylist&keyword={{ request('keyword') }}" class="tab {{ $tab === 'mylist' ? 'active' : '' }}">マイリスト</a>
    </div>

    <div class="tab-content">
        @if ($tab === 'default')
            @include('tabs.default')
        @elseif ($tab === 'mylist')
            @include('tabs.mylist')
        @endif
    </div>

@endsection
