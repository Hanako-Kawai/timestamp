@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('header')
<header class="header">
    <div class="header__inner">
        <a class="header__logo" href="/login">
        Atte
        </a>
    </div>
</header>
@endsection

@section('content')
<div class="login__content">
    <form class="form" method="POST" action="{{ route('login.custom') }}">
        @csrf
        <div class="form__group">
            <div class="login__heading">
                <h2>ログイン</h2>
            </div>

            <div class="inputbox">
                <input type="email" name="email" id="email" placeholder="メールアドレス" required />
                <div class="form__error">
                    @error('email')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <input type="password" name="password" id="password" placeholder="パスワード" required />
                <div class="form__error">
                    @error('password')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
        </div>
    </form>
</div>

<div class="no_account">
    <p>アカウントをお持ちでない方はこちらから</p>
    <a href="{{ route('register') }}">会員登録</a>
</div>

@endsection