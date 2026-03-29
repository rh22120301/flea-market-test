<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>COACHTECH</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
        @yield('css')
    </head>

    <body>
        <div class="header">  
            <ul class="header-nav">
                <div class="header-title">
                    <a  href="/">
                        <img class="header__logo" src="{{ asset('img/COACHTECHヘッダーロゴ.png') }}" alt="coachtech">
                    </a>
                </div>

                <form class="search-form" action="/" method="get">
                    @csrf
                        <div class="search-form__keyword">
                            <input class="search-form__item-input" type="text" name="keyword" placeholder="なにをお探しですか？" value="{{ request('keyword') }}">
                        </div>
                </form>

                <ul class="header-action">
                    @if (Auth::check())
                    <li class="header-nav__item">
                        <form action="/logout" method="post">
                        @csrf
                        <button class="header-nav__button">ログアウト</button>
                        </form>
                    </li>
                    @else
                    <li class="header-nav__item">
                        <a class="header-nav__button" href="/login">ログイン</a>
                    </li>
                    @endif

                    <li class="header-nav__item">
                        <a class="header-nav__mypage" href="/mypage">マイページ</a>
                    </li>
                    <li class="header-nav__item">
                        <a class="header-nav__sellpage" href="/sell">出品</a>
                    </li>
                </ul>
            </ul>
        </div>

        <main>
            @yield('content')
        </main>
    </body>
</html>
